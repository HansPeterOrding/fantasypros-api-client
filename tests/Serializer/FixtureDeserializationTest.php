<?php

declare(strict_types=1);

namespace HansPeterOrding\FantasyProsApiClient\Tests\Serializer;

use HansPeterOrding\FantasyProsApiClient\ApiClient\FantasyProsApiClientFactory;
use HansPeterOrding\FantasyProsApiClient\Dto\FpConsensusRankingsResponse;
use HansPeterOrding\FantasyProsApiClient\Dto\FpExpertsResponse;
use HansPeterOrding\FantasyProsApiClient\Dto\FpInjuriesResponse;
use HansPeterOrding\FantasyProsApiClient\Dto\FpNewsResponse;
use HansPeterOrding\FantasyProsApiClient\Dto\FpPlayersResponse;
use HansPeterOrding\FantasyProsApiClient\Dto\FpProjectionsResponse;
use HansPeterOrding\FantasyProsApiClient\Dto\FpRankingBoardResponse;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Deserializes the committed live fixtures (captured 2026-08-19 with a
 * dev-tier key - shapes are authoritative, list lengths are truncated to 10)
 * through the exact production serializer configuration.
 */
final class FixtureDeserializationTest extends TestCase
{
    private static SerializerInterface $serializer;

    public static function setUpBeforeClass(): void
    {
        self::$serializer = FantasyProsApiClientFactory::createSerializer();
    }

    private function fixture(string $name): string
    {
        $path = __DIR__ . '/../fixtures/' . $name;
        self::assertFileExists($path, sprintf('Fixture %s is missing', $name));

        return (string)file_get_contents($path);
    }

    public function testPlayersResponse(): void
    {
        $response = self::$serializer->deserialize(
            $this->fixture('01-players-full.json'),
            FpPlayersResponse::class,
            'json'
        );

        self::assertSame('NFL', $response->getSport());
        self::assertSame(502, $response->getCount());
        self::assertSame(2026, $response->getSeason());
        self::assertSame(0, $response->getWeek());
        self::assertTrue($response->getPublicApiLimited());

        $players = $response->getPlayers();
        self::assertNotEmpty($players);

        $first = $players[0];
        self::assertSame(8010, $first->getPlayerId());
        self::assertSame('Atlanta Falcons', $first->getPlayerName());
        self::assertSame('DST', $first->getPositionId());
        self::assertSame(['DST'], $first->getPositions());
        self::assertSame('ATL', $first->getTeamId());
        self::assertSame('e6aa13a4-0055-48a9-bc41-be28dc106929', $first->getSportsdataPlayerId());
        self::assertSame(287, $first->getRankEcr());
        self::assertSame(309, $first->getRankAdp());
        self::assertSame('', $first->getBirthdate());
    }

    public function testRankingBoardResponse(): void
    {
        $response = self::$serializer->deserialize(
            $this->fixture('03-rankings-board-full.json'),
            FpRankingBoardResponse::class,
            'json'
        );

        self::assertSame(1699, $response->getCount());
        self::assertIsArray($response->getExperts());
        self::assertIsArray($response->getEcrExperts());
        self::assertArrayHasKey('STD', $response->getEcrExperts());

        $first = $response->getPlayers()[0];
        self::assertSame(8000, $first->getId());
        self::assertSame('Arizona Cardinals', $first->getPlayerName());

        $rank = $first->getRank();
        self::assertNotNull($rank);
        self::assertSame(32, $rank->getEcr()['STD']['DST']);
        self::assertSame(25, $rank->getEcrMin()['PPR']['DST']);
        self::assertEqualsWithDelta(31.3, $rank->getEcrAvg()['STD']['DST'], 0.001);
    }

    public function testRankingBoardMinVariant(): void
    {
        $response = self::$serializer->deserialize(
            $this->fixture('04-rankings-board-min.json'),
            FpRankingBoardResponse::class,
            'json'
        );

        $first = $response->getPlayers()[0];
        self::assertSame(8000, $first->getId());
        self::assertNull($first->getPlayerName());
        self::assertNotNull($first->getRank());
        self::assertArrayHasKey('BB-HALF', $first->getRank()->getAdp() ?? []);
    }

    public function testConsensusRankingsResponse(): void
    {
        $response = self::$serializer->deserialize(
            $this->fixture('06-consensus-draft-std-rb.json'),
            FpConsensusRankingsResponse::class,
            'json'
        );

        self::assertSame('Draft', $response->getType());
        self::assertSame('draft', $response->getRankingTypeName());
        self::assertSame(2026, $response->getYear());
        self::assertSame(0, $response->getWeek());
        self::assertSame('RB', $response->getPositionId());
        self::assertSame('STD', $response->getScoring());
        self::assertSame(162, $response->getCount());
        self::assertSame(83, $response->getTotalExperts());
        self::assertSame(1787110512, $response->getLastUpdatedTs());
        self::assertNotSame('', $response->getFilters());

        $first = $response->getPlayers()[0];
        self::assertSame(22968, $first->getPlayerId());
        self::assertSame('Jahmyr Gibbs', $first->getPlayerName());
        self::assertSame('fef9457e-6497-47de-9bf2-cc3b95929375', $first->getSportsdataId());
        self::assertSame('40059', $first->getPlayerYahooId());
        self::assertSame('6', $first->getPlayerByeWeek());
        // String-to-number coercion of the API's stringified numerics:
        self::assertSame(1, $first->getRankEcr());
        self::assertSame(1, $first->getRankMin());
        self::assertSame(3, $first->getRankMax());
        self::assertEqualsWithDelta(1.31, $first->getRankAve(), 0.001);
        self::assertEqualsWithDelta(0.51, $first->getRankStd(), 0.001);
        self::assertSame('RB1', $first->getPosRank());
        self::assertSame(1, $first->getTier());
        self::assertNull($first->getPlayerEcrDelta());
        self::assertEqualsWithDelta(99.5, $first->getPlayerOwnedAvg(), 0.001);
    }

    public function testConsensusRankingsExpertsShowVariant(): void
    {
        $response = self::$serializer->deserialize(
            $this->fixture('12-consensus-draft-std-rb-experts.json'),
            FpConsensusRankingsResponse::class,
            'json'
        );

        self::assertIsArray($response->getExpertNames());
        self::assertNotEmpty($response->getExpertNames());
        self::assertIsArray($response->getExpertTwitter());
        self::assertIsArray($response->getExpertPub());
    }

    public function testEmptyConsensusSliceIsValid(): void
    {
        $response = self::$serializer->deserialize(
            $this->fixture('19-consensus-rookies-std-dst.json'),
            FpConsensusRankingsResponse::class,
            'json'
        );

        self::assertSame(0, $response->getCount());
        self::assertSame([], $response->getPlayers());
    }

    public function testExpertsResponse(): void
    {
        $response = self::$serializer->deserialize(
            $this->fixture('20-experts-rb.json'),
            FpExpertsResponse::class,
            'json'
        );

        $experts = $response->getExperts();
        self::assertNotEmpty($experts);

        $first = $experts[0];
        self::assertSame(22, $first->getExpertId());
        self::assertSame('Pat Fitzmaurice', $first->getName());
        self::assertSame('FantasyPros', $first->getSource());
        self::assertIsArray($first->getAccuracyWeekly());
        self::assertArrayHasKey('RB', $first->getAccuracyDraft() ?? []);
        self::assertIsArray($first->getPositions());
        self::assertSame(['RB' => true], $first->getDefault());
    }

    public function testProjectionsResponse(): void
    {
        $response = self::$serializer->deserialize(
            $this->fixture('23-projections-rb-w0.json'),
            FpProjectionsResponse::class,
            'json'
        );

        // count arrives as string "131" on this endpoint (int elsewhere)
        self::assertSame(131, $response->getCount());
        self::assertSame(2026, $response->getSeason());
        self::assertSame('RB', $response->getPositions());

        $first = $response->getPlayers()[0];
        self::assertSame(22968, $first->getFpid());
        self::assertSame(16162, $first->getMflid());
        self::assertSame('Jahmyr Gibbs', $first->getName());

        $stats = $first->getStats();
        self::assertNotNull($stats);
        self::assertEqualsWithDelta(301.65, $stats->getPoints(), 0.001);
        self::assertEqualsWithDelta(372.92, $stats->getPointsPpr(), 0.001);
        self::assertEqualsWithDelta(337.28, $stats->getPointsHalf(), 0.001);
        self::assertEqualsWithDelta(71.27, $stats->getRecRec(), 0.001);
        self::assertEqualsWithDelta(0.0, $stats->getTwoPtTds(), 0.001);
    }

    public function testQbProjectionStats(): void
    {
        $response = self::$serializer->deserialize(
            $this->fixture('22-projections-qb-w0.json'),
            FpProjectionsResponse::class,
            'json'
        );

        $stats = $response->getPlayers()[0]->getStats();
        self::assertNotNull($stats);
        self::assertNotNull($stats->getPassYds());
        self::assertNotNull($stats->getPassYds300());
    }

    public function testRosProjectionsWithNullPlayers(): void
    {
        $response = self::$serializer->deserialize(
            $this->fixture('26-projections-rb-ros.json'),
            FpProjectionsResponse::class,
            'json'
        );

        self::assertTrue($response->getRosProjections());
        self::assertSame(0, $response->getCount());
        // "players": null in the raw JSON must coalesce to an empty list
        self::assertSame([], $response->getPlayers());
    }

    public function testNewsResponse(): void
    {
        $response = self::$serializer->deserialize(
            $this->fixture('28-news.json'),
            FpNewsResponse::class,
            'json'
        );

        $items = $response->getItems();
        self::assertNotEmpty($items);

        $first = $items[0];
        self::assertSame(603230, $first->getId());
        self::assertSame('2026-08-19 07:41:07', $first->getCreated());
        self::assertSame('Ari Koslow', $first->getAuthor());
        self::assertSame(19347, $first->getPlayerId());
        self::assertContains('News', $first->getCategories() ?? []);
        self::assertNotNull($first->getImpact());
    }

    public function testInjuriesResponse(): void
    {
        $response = self::$serializer->deserialize(
            $this->fixture('30-injuries.json'),
            FpInjuriesResponse::class,
            'json'
        );

        $injuries = $response->getInjuries();
        self::assertNotEmpty($injuries);

        $first = $injuries[0];
        self::assertSame(11180, $first->getPlayerId());
        self::assertSame('Russell Wilson', $first->getName());
        self::assertSame('OUT', $first->getStatus());
        self::assertSame('O', $first->getStatusShort());
        self::assertNull($first->getPractice1());
        self::assertNull($first->getProbabilityOfPlaying());
        self::assertFalse($first->getTeamPractice1Submitted());
        self::assertSame([], $first->getIrWeeks() ?? []);
    }
}

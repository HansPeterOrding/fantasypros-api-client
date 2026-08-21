<?php

declare(strict_types=1);

namespace HansPeterOrding\FantasyProsApiClient\Tests\Serializer;

use HansPeterOrding\FantasyProsApiClient\ApiClient\FantasyProsApiClientFactory;
use HansPeterOrding\FantasyProsApiClient\Dto\FpInjuriesResponse;
use HansPeterOrding\FantasyProsApiClient\Dto\FpPlayersResponse;
use PHPUnit\Framework\TestCase;

/**
 * Regression: the production key serves different JSON types than the
 * dev-tier key for the same fields (first observed 2026-08-21: dev key
 * sends birthdatetime as "", prod key as a unix-timestamp int). Every
 * scalar DTO property therefore disables serializer type enforcement and
 * relies on PHP's coercive setter call from the (non-strict) serializer.
 */
final class ProdKeyTypeFlipTest extends TestCase
{
    public function testNumericsArrivingForStringPropertiesAreCoerced(): void
    {
        $json = json_encode([
            'sport' => 'NFL',
            'count' => '2',
            'season' => 2026,
            'week' => '0',
            'players' => [
                [
                    'player_id' => '22968',
                    'player_name' => 'Jahmyr Gibbs',
                    'birthdate' => 736560000,
                    'birthdatetime' => 736560000,
                    'team_id' => 'DET',
                    'rank_ecr' => '1',
                ],
            ],
        ], JSON_THROW_ON_ERROR);

        $response = FantasyProsApiClientFactory::createSerializer()
            ->deserialize($json, FpPlayersResponse::class, 'json');

        self::assertSame(2, $response->getCount());
        self::assertSame(0, $response->getWeek());

        $player = $response->getPlayers()[0];
        self::assertSame(22968, $player->getPlayerId());
        self::assertSame('736560000', $player->getBirthdatetime());
        self::assertSame('736560000', $player->getBirthdate());
        self::assertSame(1, $player->getRankEcr());
    }

    public function testIntsArrivingForBoolAndIdStringProperties(): void
    {
        $json = json_encode([
            'sport' => 'NFL',
            'count' => 1,
            'public_api_limited' => 0,
            'injuries' => [
                [
                    'player_id' => 11180,
                    'yahoo_id' => 40059,
                    'name' => 'Russell Wilson',
                    'team_practice_1_submitted' => 1,
                ],
            ],
            'covids' => [],
        ], JSON_THROW_ON_ERROR);

        $response = FantasyProsApiClientFactory::createSerializer()
            ->deserialize($json, FpInjuriesResponse::class, 'json');

        self::assertFalse($response->getPublicApiLimited());

        $injury = $response->getInjuries()[0];
        self::assertSame('40059', $injury->getYahooId());
        self::assertTrue($injury->getTeamPractice1Submitted());
    }
}

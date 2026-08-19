<?php

declare(strict_types=1);

namespace HansPeterOrding\FantasyProsApiClient\Dto;

use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;

/**
 * One item of /consensus-rankings. rank_min/rank_max/rank_ave/rank_std arrive as strings, player_owned_* as int|float - type enforcement is disabled to coerce.
 */
final class FpConsensusRankingPlayer
{
    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?int $playerId = null;

    private ?string $playerName = null;

    private ?string $sportsdataId = null;

    private ?string $playerTeamId = null;

    private ?string $playerPositionId = null;

    private ?string $playerPositions = null;

    private ?string $playerShortName = null;

    private ?string $playerEligibility = null;

    private ?string $playerYahooPositions = null;

    private ?string $playerPageUrl = null;

    private ?string $playerFilename = null;

    private ?string $playerYahooId = null;

    private ?string $cbsPlayerId = null;

    private ?string $playerByeWeek = null;

    private ?string $playerAge = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?float $playerOwnedAvg = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?float $playerOwnedEspn = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?float $playerOwnedYahoo = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?int $playerEcrDelta = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?int $rankEcr = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?int $rankMin = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?int $rankMax = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?float $rankAve = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?float $rankStd = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?int $rankPoints = null;

    private ?string $posRank = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?int $tier = null;

    /** @var array<string, mixed>|null per-expert ranks, present with experts=show */
    private ?array $experts = null;

    public function getPlayerId(): ?int
    {
        return $this->playerId;
    }

    public function setPlayerId(?int $playerId): static
    {
        $this->playerId = $playerId;
        return $this;
    }

    public function getPlayerName(): ?string
    {
        return $this->playerName;
    }

    public function setPlayerName(?string $playerName): static
    {
        $this->playerName = $playerName;
        return $this;
    }

    public function getSportsdataId(): ?string
    {
        return $this->sportsdataId;
    }

    public function setSportsdataId(?string $sportsdataId): static
    {
        $this->sportsdataId = $sportsdataId;
        return $this;
    }

    public function getPlayerTeamId(): ?string
    {
        return $this->playerTeamId;
    }

    public function setPlayerTeamId(?string $playerTeamId): static
    {
        $this->playerTeamId = $playerTeamId;
        return $this;
    }

    public function getPlayerPositionId(): ?string
    {
        return $this->playerPositionId;
    }

    public function setPlayerPositionId(?string $playerPositionId): static
    {
        $this->playerPositionId = $playerPositionId;
        return $this;
    }

    public function getPlayerPositions(): ?string
    {
        return $this->playerPositions;
    }

    public function setPlayerPositions(?string $playerPositions): static
    {
        $this->playerPositions = $playerPositions;
        return $this;
    }

    public function getPlayerShortName(): ?string
    {
        return $this->playerShortName;
    }

    public function setPlayerShortName(?string $playerShortName): static
    {
        $this->playerShortName = $playerShortName;
        return $this;
    }

    public function getPlayerEligibility(): ?string
    {
        return $this->playerEligibility;
    }

    public function setPlayerEligibility(?string $playerEligibility): static
    {
        $this->playerEligibility = $playerEligibility;
        return $this;
    }

    public function getPlayerYahooPositions(): ?string
    {
        return $this->playerYahooPositions;
    }

    public function setPlayerYahooPositions(?string $playerYahooPositions): static
    {
        $this->playerYahooPositions = $playerYahooPositions;
        return $this;
    }

    public function getPlayerPageUrl(): ?string
    {
        return $this->playerPageUrl;
    }

    public function setPlayerPageUrl(?string $playerPageUrl): static
    {
        $this->playerPageUrl = $playerPageUrl;
        return $this;
    }

    public function getPlayerFilename(): ?string
    {
        return $this->playerFilename;
    }

    public function setPlayerFilename(?string $playerFilename): static
    {
        $this->playerFilename = $playerFilename;
        return $this;
    }

    public function getPlayerYahooId(): ?string
    {
        return $this->playerYahooId;
    }

    public function setPlayerYahooId(?string $playerYahooId): static
    {
        $this->playerYahooId = $playerYahooId;
        return $this;
    }

    public function getCbsPlayerId(): ?string
    {
        return $this->cbsPlayerId;
    }

    public function setCbsPlayerId(?string $cbsPlayerId): static
    {
        $this->cbsPlayerId = $cbsPlayerId;
        return $this;
    }

    public function getPlayerByeWeek(): ?string
    {
        return $this->playerByeWeek;
    }

    public function setPlayerByeWeek(?string $playerByeWeek): static
    {
        $this->playerByeWeek = $playerByeWeek;
        return $this;
    }

    public function getPlayerAge(): ?string
    {
        return $this->playerAge;
    }

    public function setPlayerAge(?string $playerAge): static
    {
        $this->playerAge = $playerAge;
        return $this;
    }

    public function getPlayerOwnedAvg(): ?float
    {
        return $this->playerOwnedAvg;
    }

    public function setPlayerOwnedAvg(?float $playerOwnedAvg): static
    {
        $this->playerOwnedAvg = $playerOwnedAvg;
        return $this;
    }

    public function getPlayerOwnedEspn(): ?float
    {
        return $this->playerOwnedEspn;
    }

    public function setPlayerOwnedEspn(?float $playerOwnedEspn): static
    {
        $this->playerOwnedEspn = $playerOwnedEspn;
        return $this;
    }

    public function getPlayerOwnedYahoo(): ?float
    {
        return $this->playerOwnedYahoo;
    }

    public function setPlayerOwnedYahoo(?float $playerOwnedYahoo): static
    {
        $this->playerOwnedYahoo = $playerOwnedYahoo;
        return $this;
    }

    public function getPlayerEcrDelta(): ?int
    {
        return $this->playerEcrDelta;
    }

    public function setPlayerEcrDelta(?int $playerEcrDelta): static
    {
        $this->playerEcrDelta = $playerEcrDelta;
        return $this;
    }

    public function getRankEcr(): ?int
    {
        return $this->rankEcr;
    }

    public function setRankEcr(?int $rankEcr): static
    {
        $this->rankEcr = $rankEcr;
        return $this;
    }

    public function getRankMin(): ?int
    {
        return $this->rankMin;
    }

    public function setRankMin(?int $rankMin): static
    {
        $this->rankMin = $rankMin;
        return $this;
    }

    public function getRankMax(): ?int
    {
        return $this->rankMax;
    }

    public function setRankMax(?int $rankMax): static
    {
        $this->rankMax = $rankMax;
        return $this;
    }

    public function getRankAve(): ?float
    {
        return $this->rankAve;
    }

    public function setRankAve(?float $rankAve): static
    {
        $this->rankAve = $rankAve;
        return $this;
    }

    public function getRankStd(): ?float
    {
        return $this->rankStd;
    }

    public function setRankStd(?float $rankStd): static
    {
        $this->rankStd = $rankStd;
        return $this;
    }

    public function getRankPoints(): ?int
    {
        return $this->rankPoints;
    }

    public function setRankPoints(?int $rankPoints): static
    {
        $this->rankPoints = $rankPoints;
        return $this;
    }

    public function getPosRank(): ?string
    {
        return $this->posRank;
    }

    public function setPosRank(?string $posRank): static
    {
        $this->posRank = $posRank;
        return $this;
    }

    public function getTier(): ?int
    {
        return $this->tier;
    }

    public function setTier(?int $tier): static
    {
        $this->tier = $tier;
        return $this;
    }

    public function getExperts(): ?array
    {
        return $this->experts;
    }

    public function setExperts(?array $experts): static
    {
        $this->experts = $experts;
        return $this;
    }
}

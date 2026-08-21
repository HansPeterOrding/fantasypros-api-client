<?php

declare(strict_types=1);

namespace HansPeterOrding\FantasyProsApiClient\Dto;

use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;

final class FpConsensusRankingsResponse
{
    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?string $sport = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?string $type = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?string $rankingTypeName = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?int $year = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?int $week = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?string $positionId = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?string $scoring = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?string $filters = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?int $count = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?int $totalExperts = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?string $lastUpdated = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?int $lastUpdatedTs = null;

    /** @var FpConsensusRankingPlayer[]|null */
    private ?array $players = null;

    /** @var array<string, string>|null expert id => name, present with experts=show */
    private ?array $expertNames = null;

    /** @var array<string, string>|null expert id => twitter handle, present with experts=show */
    private ?array $expertTwitter = null;

    /** @var array<string, string>|null expert id => last publish datetime, present with experts=show */
    private ?array $expertPub = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?int $limit = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?bool $publicApiLimited = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?string $tier = null;

    public function getSport(): ?string
    {
        return $this->sport;
    }

    public function setSport(?string $sport): static
    {
        $this->sport = $sport;
        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): static
    {
        $this->type = $type;
        return $this;
    }

    public function getRankingTypeName(): ?string
    {
        return $this->rankingTypeName;
    }

    public function setRankingTypeName(?string $rankingTypeName): static
    {
        $this->rankingTypeName = $rankingTypeName;
        return $this;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(?int $year): static
    {
        $this->year = $year;
        return $this;
    }

    public function getWeek(): ?int
    {
        return $this->week;
    }

    public function setWeek(?int $week): static
    {
        $this->week = $week;
        return $this;
    }

    public function getPositionId(): ?string
    {
        return $this->positionId;
    }

    public function setPositionId(?string $positionId): static
    {
        $this->positionId = $positionId;
        return $this;
    }

    public function getScoring(): ?string
    {
        return $this->scoring;
    }

    public function setScoring(?string $scoring): static
    {
        $this->scoring = $scoring;
        return $this;
    }

    public function getFilters(): ?string
    {
        return $this->filters;
    }

    public function setFilters(?string $filters): static
    {
        $this->filters = $filters;
        return $this;
    }

    public function getCount(): ?int
    {
        return $this->count;
    }

    public function setCount(?int $count): static
    {
        $this->count = $count;
        return $this;
    }

    public function getTotalExperts(): ?int
    {
        return $this->totalExperts;
    }

    public function setTotalExperts(?int $totalExperts): static
    {
        $this->totalExperts = $totalExperts;
        return $this;
    }

    public function getLastUpdated(): ?string
    {
        return $this->lastUpdated;
    }

    public function setLastUpdated(?string $lastUpdated): static
    {
        $this->lastUpdated = $lastUpdated;
        return $this;
    }

    public function getLastUpdatedTs(): ?int
    {
        return $this->lastUpdatedTs;
    }

    public function setLastUpdatedTs(?int $lastUpdatedTs): static
    {
        $this->lastUpdatedTs = $lastUpdatedTs;
        return $this;
    }

    /** @return FpConsensusRankingPlayer[] */
    public function getPlayers(): array
    {
        return $this->players ?? [];
    }

    /** @param FpConsensusRankingPlayer[]|null $players */
    public function setPlayers(?array $players): static
    {
        $this->players = $players;
        return $this;
    }

    public function getExpertNames(): ?array
    {
        return $this->expertNames;
    }

    public function setExpertNames(?array $expertNames): static
    {
        $this->expertNames = $expertNames;
        return $this;
    }

    public function getExpertTwitter(): ?array
    {
        return $this->expertTwitter;
    }

    public function setExpertTwitter(?array $expertTwitter): static
    {
        $this->expertTwitter = $expertTwitter;
        return $this;
    }

    public function getExpertPub(): ?array
    {
        return $this->expertPub;
    }

    public function setExpertPub(?array $expertPub): static
    {
        $this->expertPub = $expertPub;
        return $this;
    }

    public function getLimit(): ?int
    {
        return $this->limit;
    }

    public function setLimit(?int $limit): static
    {
        $this->limit = $limit;
        return $this;
    }

    public function getPublicApiLimited(): ?bool
    {
        return $this->publicApiLimited;
    }

    public function setPublicApiLimited(?bool $publicApiLimited): static
    {
        $this->publicApiLimited = $publicApiLimited;
        return $this;
    }

    public function getTier(): ?string
    {
        return $this->tier;
    }

    public function setTier(?string $tier): static
    {
        $this->tier = $tier;
        return $this;
    }
}

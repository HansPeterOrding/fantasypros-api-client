<?php

declare(strict_types=1);

namespace HansPeterOrding\FantasyProsApiClient\Dto;

use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;

/**
 * Shape verified against a live prod-key fixture (2026-08-21,
 * tests/fixtures/33-compare-players-rb.json). Unlike every other rankings
 * endpoint this one returns PER-EXPERT ranks: for each scoring variant a map
 * of player fpid => list of {expert_id, rank} entries. Notes:
 *  - Requested players that are unknown or unranked for the slice are
 *    silently omitted (no error) - do not assume the response echoes the
 *    request's player set.
 *  - An entry with expert_id "_0" appears alongside real expert ids and is
 *    a sentinel (consensus row), not an expert.
 *  - Without a ranking_type parameter the API answered ranking_type
 *    "weekly" with the upcoming week.
 * The rankings map keys are dynamic (fpids), so the property stays a raw
 * array by the same rationale as the board rank maps.
 */
final class FpComparePlayersResponse
{
    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?string $sport = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?int $year = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?int $week = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?string $positionId = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?string $rankingType = null;

    /** @var array<string, array<string, list<array{expert_id: string, rank: string}>>>|null scoring => player fpid => per-expert ranks */
    private ?array $rankings = null;

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

    public function getRankingType(): ?string
    {
        return $this->rankingType;
    }

    public function setRankingType(?string $rankingType): static
    {
        $this->rankingType = $rankingType;

        return $this;
    }

    public function getRankings(): ?array
    {
        return $this->rankings;
    }

    public function setRankings(?array $rankings): static
    {
        $this->rankings = $rankings;

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

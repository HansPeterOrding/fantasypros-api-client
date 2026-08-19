<?php

declare(strict_types=1);

namespace HansPeterOrding\FantasyProsApiClient\Dto;

use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;

final class FpRankingBoardResponse
{
    private ?string $sport = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?int $count = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?int $season = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?int $week = null;

    /** @var array<string, array<string, mixed>>|null expert counts per type-scoring => position */
    private ?array $experts = null;

    /** @var array<string, array<string, mixed>>|null contributing expert ids per type-scoring => position */
    private ?array $ecrExperts = null;

    /** @var FpRankingBoardPlayer[]|null */
    private ?array $players = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?int $limit = null;

    private ?bool $publicApiLimited = null;

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

    public function getCount(): ?int
    {
        return $this->count;
    }

    public function setCount(?int $count): static
    {
        $this->count = $count;
        return $this;
    }

    public function getSeason(): ?int
    {
        return $this->season;
    }

    public function setSeason(?int $season): static
    {
        $this->season = $season;
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

    public function getExperts(): ?array
    {
        return $this->experts;
    }

    public function setExperts(?array $experts): static
    {
        $this->experts = $experts;
        return $this;
    }

    public function getEcrExperts(): ?array
    {
        return $this->ecrExperts;
    }

    public function setEcrExperts(?array $ecrExperts): static
    {
        $this->ecrExperts = $ecrExperts;
        return $this;
    }

    /** @return FpRankingBoardPlayer[] */
    public function getPlayers(): array
    {
        return $this->players ?? [];
    }

    /** @param FpRankingBoardPlayer[]|null $players */
    public function setPlayers(?array $players): static
    {
        $this->players = $players;
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

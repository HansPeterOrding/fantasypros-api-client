<?php

declare(strict_types=1);

namespace HansPeterOrding\FantasyProsApiClient\Dto;

use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;

final class FpProjectionsResponse
{
    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?int $season = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?int $week = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?int $count = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?string $positions = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?string $scoring = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?bool $rosProjections = null;

    /** @var FpProjectionPlayer[]|null */
    private ?array $players = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?int $limit = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?bool $publicApiLimited = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?string $tier = null;

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

    public function getCount(): ?int
    {
        return $this->count;
    }

    public function setCount(?int $count): static
    {
        $this->count = $count;
        return $this;
    }

    public function getPositions(): ?string
    {
        return $this->positions;
    }

    public function setPositions(?string $positions): static
    {
        $this->positions = $positions;
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

    public function getRosProjections(): ?bool
    {
        return $this->rosProjections;
    }

    public function setRosProjections(?bool $rosProjections): static
    {
        $this->rosProjections = $rosProjections;
        return $this;
    }

    /** @return FpProjectionPlayer[] */
    public function getPlayers(): array
    {
        return $this->players ?? [];
    }

    /** @param FpProjectionPlayer[]|null $players */
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

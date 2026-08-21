<?php

declare(strict_types=1);

namespace HansPeterOrding\FantasyProsApiClient\Dto;

use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;

/**
 * PROVISIONAL shape. The capture probe returned 400 (position parameter is required). Kept loose (raw arrays) until a successful fixture is captured; do not build entity mappings on this DTO yet.
 */
final class FpComparePlayersResponse
{
    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?string $sport = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?int $count = null;

    /** @var array<int, array<string, mixed>>|null PROVISIONAL - no successful live fixture captured yet; refine once one exists */
    private ?array $players = null;

    /** @var array<int, array<string, mixed>>|null PROVISIONAL */
    private ?array $experts = null;

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

    public function getCount(): ?int
    {
        return $this->count;
    }

    public function setCount(?int $count): static
    {
        $this->count = $count;
        return $this;
    }

    public function getPlayers(): ?array
    {
        return $this->players;
    }

    public function setPlayers(?array $players): static
    {
        $this->players = $players;
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

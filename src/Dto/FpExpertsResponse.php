<?php

declare(strict_types=1);

namespace HansPeterOrding\FantasyProsApiClient\Dto;

use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;

final class FpExpertsResponse
{
    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?string $sport = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?int $count = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?int $season = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?int $week = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?int $accuracyWeeklySeason = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?int $accuracyDraftSeason = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?int $accuracyWeeklyLastSeason = null;

    /** @var FpExpert[]|null */
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

    public function getAccuracyWeeklySeason(): ?int
    {
        return $this->accuracyWeeklySeason;
    }

    public function setAccuracyWeeklySeason(?int $accuracyWeeklySeason): static
    {
        $this->accuracyWeeklySeason = $accuracyWeeklySeason;
        return $this;
    }

    public function getAccuracyDraftSeason(): ?int
    {
        return $this->accuracyDraftSeason;
    }

    public function setAccuracyDraftSeason(?int $accuracyDraftSeason): static
    {
        $this->accuracyDraftSeason = $accuracyDraftSeason;
        return $this;
    }

    public function getAccuracyWeeklyLastSeason(): ?int
    {
        return $this->accuracyWeeklyLastSeason;
    }

    public function setAccuracyWeeklyLastSeason(?int $accuracyWeeklyLastSeason): static
    {
        $this->accuracyWeeklyLastSeason = $accuracyWeeklyLastSeason;
        return $this;
    }

    /** @return FpExpert[] */
    public function getExperts(): array
    {
        return $this->experts ?? [];
    }

    /** @param FpExpert[]|null $experts */
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

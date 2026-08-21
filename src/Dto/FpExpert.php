<?php

declare(strict_types=1);

namespace HansPeterOrding\FantasyProsApiClient\Dto;

use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;

final class FpExpert
{
    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?int $expertId = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?string $name = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?string $source = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?string $url = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?string $twitter = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?string $bio = null;

    /** @var array<string, mixed>|null position => accuracy rank */
    private ?array $accuracyWeekly = null;

    /** @var array<string, mixed>|null position => accuracy rank */
    private ?array $accuracyDraft = null;

    /** @var array<string, mixed>|null position => accuracy rank */
    private ?array $accuracyWeeklyLastSeason = null;

    /** @var array<string, string>|null position => last update datetime */
    private ?array $positions = null;

    /** @var array<string, bool>|null position => part of default consensus */
    private ?array $default = null;

    public function getExpertId(): ?int
    {
        return $this->expertId;
    }

    public function setExpertId(?int $expertId): static
    {
        $this->expertId = $expertId;
        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;
        return $this;
    }

    public function getSource(): ?string
    {
        return $this->source;
    }

    public function setSource(?string $source): static
    {
        $this->source = $source;
        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): static
    {
        $this->url = $url;
        return $this;
    }

    public function getTwitter(): ?string
    {
        return $this->twitter;
    }

    public function setTwitter(?string $twitter): static
    {
        $this->twitter = $twitter;
        return $this;
    }

    public function getBio(): ?string
    {
        return $this->bio;
    }

    public function setBio(?string $bio): static
    {
        $this->bio = $bio;
        return $this;
    }

    public function getAccuracyWeekly(): ?array
    {
        return $this->accuracyWeekly;
    }

    public function setAccuracyWeekly(?array $accuracyWeekly): static
    {
        $this->accuracyWeekly = $accuracyWeekly;
        return $this;
    }

    public function getAccuracyDraft(): ?array
    {
        return $this->accuracyDraft;
    }

    public function setAccuracyDraft(?array $accuracyDraft): static
    {
        $this->accuracyDraft = $accuracyDraft;
        return $this;
    }

    public function getAccuracyWeeklyLastSeason(): ?array
    {
        return $this->accuracyWeeklyLastSeason;
    }

    public function setAccuracyWeeklyLastSeason(?array $accuracyWeeklyLastSeason): static
    {
        $this->accuracyWeeklyLastSeason = $accuracyWeeklyLastSeason;
        return $this;
    }

    public function getPositions(): ?array
    {
        return $this->positions;
    }

    public function setPositions(?array $positions): static
    {
        $this->positions = $positions;
        return $this;
    }

    public function getDefault(): ?array
    {
        return $this->default;
    }

    public function setDefault(?array $default): static
    {
        $this->default = $default;
        return $this;
    }
}

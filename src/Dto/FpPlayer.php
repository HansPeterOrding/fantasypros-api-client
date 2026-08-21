<?php

declare(strict_types=1);

namespace HansPeterOrding\FantasyProsApiClient\Dto;

use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;

/**
 * One item of the /players list. Field inventory derived from live fixtures (2026-08-19).
 */
final class FpPlayer
{
    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?int $playerId = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?string $playerName = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?string $shortName = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?string $firstName = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?string $lastName = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?string $reverseName = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?string $positionId = null;

    /** @var string[]|null */
    private ?array $positions = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?string $teamId = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?string $filename = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?string $sportsdataPlayerId = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?int $rankEcr = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?int $rankAdp = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?int $rankEcrPos = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?int $rankEcrPpr = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?int $rankAdpPpr = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?int $rankEcrHalf = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?string $birthdate = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?string $birthdatetime = null;

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

    public function getShortName(): ?string
    {
        return $this->shortName;
    }

    public function setShortName(?string $shortName): static
    {
        $this->shortName = $shortName;
        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): static
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): static
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function getReverseName(): ?string
    {
        return $this->reverseName;
    }

    public function setReverseName(?string $reverseName): static
    {
        $this->reverseName = $reverseName;
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

    public function getPositions(): ?array
    {
        return $this->positions;
    }

    public function setPositions(?array $positions): static
    {
        $this->positions = $positions;
        return $this;
    }

    public function getTeamId(): ?string
    {
        return $this->teamId;
    }

    public function setTeamId(?string $teamId): static
    {
        $this->teamId = $teamId;
        return $this;
    }

    public function getFilename(): ?string
    {
        return $this->filename;
    }

    public function setFilename(?string $filename): static
    {
        $this->filename = $filename;
        return $this;
    }

    public function getSportsdataPlayerId(): ?string
    {
        return $this->sportsdataPlayerId;
    }

    public function setSportsdataPlayerId(?string $sportsdataPlayerId): static
    {
        $this->sportsdataPlayerId = $sportsdataPlayerId;
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

    public function getRankAdp(): ?int
    {
        return $this->rankAdp;
    }

    public function setRankAdp(?int $rankAdp): static
    {
        $this->rankAdp = $rankAdp;
        return $this;
    }

    public function getRankEcrPos(): ?int
    {
        return $this->rankEcrPos;
    }

    public function setRankEcrPos(?int $rankEcrPos): static
    {
        $this->rankEcrPos = $rankEcrPos;
        return $this;
    }

    public function getRankEcrPpr(): ?int
    {
        return $this->rankEcrPpr;
    }

    public function setRankEcrPpr(?int $rankEcrPpr): static
    {
        $this->rankEcrPpr = $rankEcrPpr;
        return $this;
    }

    public function getRankAdpPpr(): ?int
    {
        return $this->rankAdpPpr;
    }

    public function setRankAdpPpr(?int $rankAdpPpr): static
    {
        $this->rankAdpPpr = $rankAdpPpr;
        return $this;
    }

    public function getRankEcrHalf(): ?int
    {
        return $this->rankEcrHalf;
    }

    public function setRankEcrHalf(?int $rankEcrHalf): static
    {
        $this->rankEcrHalf = $rankEcrHalf;
        return $this;
    }

    public function getBirthdate(): ?string
    {
        return $this->birthdate;
    }

    public function setBirthdate(?string $birthdate): static
    {
        $this->birthdate = $birthdate;
        return $this;
    }

    public function getBirthdatetime(): ?string
    {
        return $this->birthdatetime;
    }

    public function setBirthdatetime(?string $birthdatetime): static
    {
        $this->birthdatetime = $birthdatetime;
        return $this;
    }
}

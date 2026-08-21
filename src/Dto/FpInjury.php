<?php

declare(strict_types=1);

namespace HansPeterOrding\FantasyProsApiClient\Dto;

use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;

final class FpInjury
{
    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?int $playerId = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?string $yahooId = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?string $name = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?string $status = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?string $statusShort = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?string $injuryType = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?string $comment = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?string $injuryUpdateDate = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?string $teamId = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?string $positionId = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?int $rank = null;

    /** @var mixed[]|null */
    private ?array $irWeeks = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?float $probabilityOfPlaying = null;

    #[SerializedName('practice_1')]
    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?string $practice1 = null;

    #[SerializedName('practice_2')]
    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?string $practice2 = null;

    #[SerializedName('practice_3')]
    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?string $practice3 = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?string $practiceReportInjuryType = null;

    #[SerializedName('team_practice_1_submitted')]
    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?bool $teamPractice1Submitted = null;

    #[SerializedName('team_practice_2_submitted')]
    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?bool $teamPractice2Submitted = null;

    #[SerializedName('team_practice_3_submitted')]
    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?bool $teamPractice3Submitted = null;

    public function getPlayerId(): ?int
    {
        return $this->playerId;
    }

    public function setPlayerId(?int $playerId): static
    {
        $this->playerId = $playerId;
        return $this;
    }

    public function getYahooId(): ?string
    {
        return $this->yahooId;
    }

    public function setYahooId(?string $yahooId): static
    {
        $this->yahooId = $yahooId;
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

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): static
    {
        $this->status = $status;
        return $this;
    }

    public function getStatusShort(): ?string
    {
        return $this->statusShort;
    }

    public function setStatusShort(?string $statusShort): static
    {
        $this->statusShort = $statusShort;
        return $this;
    }

    public function getInjuryType(): ?string
    {
        return $this->injuryType;
    }

    public function setInjuryType(?string $injuryType): static
    {
        $this->injuryType = $injuryType;
        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): static
    {
        $this->comment = $comment;
        return $this;
    }

    public function getInjuryUpdateDate(): ?string
    {
        return $this->injuryUpdateDate;
    }

    public function setInjuryUpdateDate(?string $injuryUpdateDate): static
    {
        $this->injuryUpdateDate = $injuryUpdateDate;
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

    public function getPositionId(): ?string
    {
        return $this->positionId;
    }

    public function setPositionId(?string $positionId): static
    {
        $this->positionId = $positionId;
        return $this;
    }

    public function getRank(): ?int
    {
        return $this->rank;
    }

    public function setRank(?int $rank): static
    {
        $this->rank = $rank;
        return $this;
    }

    public function getIrWeeks(): ?array
    {
        return $this->irWeeks;
    }

    public function setIrWeeks(?array $irWeeks): static
    {
        $this->irWeeks = $irWeeks;
        return $this;
    }

    public function getProbabilityOfPlaying(): ?float
    {
        return $this->probabilityOfPlaying;
    }

    public function setProbabilityOfPlaying(?float $probabilityOfPlaying): static
    {
        $this->probabilityOfPlaying = $probabilityOfPlaying;
        return $this;
    }

    public function getPractice1(): ?string
    {
        return $this->practice1;
    }

    public function setPractice1(?string $practice1): static
    {
        $this->practice1 = $practice1;
        return $this;
    }

    public function getPractice2(): ?string
    {
        return $this->practice2;
    }

    public function setPractice2(?string $practice2): static
    {
        $this->practice2 = $practice2;
        return $this;
    }

    public function getPractice3(): ?string
    {
        return $this->practice3;
    }

    public function setPractice3(?string $practice3): static
    {
        $this->practice3 = $practice3;
        return $this;
    }

    public function getPracticeReportInjuryType(): ?string
    {
        return $this->practiceReportInjuryType;
    }

    public function setPracticeReportInjuryType(?string $practiceReportInjuryType): static
    {
        $this->practiceReportInjuryType = $practiceReportInjuryType;
        return $this;
    }

    public function getTeamPractice1Submitted(): ?bool
    {
        return $this->teamPractice1Submitted;
    }

    public function setTeamPractice1Submitted(?bool $teamPractice1Submitted): static
    {
        $this->teamPractice1Submitted = $teamPractice1Submitted;
        return $this;
    }

    public function getTeamPractice2Submitted(): ?bool
    {
        return $this->teamPractice2Submitted;
    }

    public function setTeamPractice2Submitted(?bool $teamPractice2Submitted): static
    {
        $this->teamPractice2Submitted = $teamPractice2Submitted;
        return $this;
    }

    public function getTeamPractice3Submitted(): ?bool
    {
        return $this->teamPractice3Submitted;
    }

    public function setTeamPractice3Submitted(?bool $teamPractice3Submitted): static
    {
        $this->teamPractice3Submitted = $teamPractice3Submitted;
        return $this;
    }
}

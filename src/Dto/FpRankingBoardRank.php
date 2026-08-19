<?php

declare(strict_types=1);

namespace HansPeterOrding\FantasyProsApiClient\Dto;

use Symfony\Component\Serializer\Attribute\SerializedName;

/**
 * Nested rank object of a rankings-board player. Keys are type-scoring identifiers (STD, PPR, HALF, DYN, WK1-STD, BB-HALF, DRAFTERS, ...) mapping position => value. Kept as raw arrays because the key set is dynamic and season-dependent.
 */
final class FpRankingBoardRank
{
    /** @var array<string, array<string, mixed>>|null keyed type-scoring => position => rank */
    #[SerializedName('ECR')]
    private ?array $ecr = null;

    /** @var array<string, array<string, mixed>>|null */
    #[SerializedName('ECR_MIN')]
    private ?array $ecrMin = null;

    /** @var array<string, array<string, mixed>>|null */
    #[SerializedName('ECR_MAX')]
    private ?array $ecrMax = null;

    /** @var array<string, array<string, mixed>>|null */
    #[SerializedName('ECR_AVG')]
    private ?array $ecrAvg = null;

    /** @var array<string, array<string, mixed>>|null */
    #[SerializedName('ECR_STD')]
    private ?array $ecrStd = null;

    /** @var array<string, array<string, mixed>>|null */
    #[SerializedName('ADP')]
    private ?array $adp = null;

    public function getEcr(): ?array
    {
        return $this->ecr;
    }

    public function setEcr(?array $ecr): static
    {
        $this->ecr = $ecr;
        return $this;
    }

    public function getEcrMin(): ?array
    {
        return $this->ecrMin;
    }

    public function setEcrMin(?array $ecrMin): static
    {
        $this->ecrMin = $ecrMin;
        return $this;
    }

    public function getEcrMax(): ?array
    {
        return $this->ecrMax;
    }

    public function setEcrMax(?array $ecrMax): static
    {
        $this->ecrMax = $ecrMax;
        return $this;
    }

    public function getEcrAvg(): ?array
    {
        return $this->ecrAvg;
    }

    public function setEcrAvg(?array $ecrAvg): static
    {
        $this->ecrAvg = $ecrAvg;
        return $this;
    }

    public function getEcrStd(): ?array
    {
        return $this->ecrStd;
    }

    public function setEcrStd(?array $ecrStd): static
    {
        $this->ecrStd = $ecrStd;
        return $this;
    }

    public function getAdp(): ?array
    {
        return $this->adp;
    }

    public function setAdp(?array $adp): static
    {
        $this->adp = $adp;
        return $this;
    }
}

<?php

declare(strict_types=1);

namespace HansPeterOrding\FantasyProsApiClient\Dto;

use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;

/**
 * Union of all per-position stat keys observed in live fixtures (QB/RB/WR/TE/K/DST) plus the IDP keys (def_tackle, def_assist, def_pd, def_tlost) confirmed by the 2026-08-25 DL projections probe (DL/LB/DB). All nullable - only the keys relevant to the requested position are present. points/points_ppr/points_half are always delivered together, so one request covers all scorings.
 */
final class FpProjectionStats
{
    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?float $points = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?float $pointsPpr = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?float $pointsHalf = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?float $passAtt = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?float $passCmp = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?float $passYds = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?float $passTds = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?float $passInts = null;

    #[SerializedName('pass_yds_300')]
    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?float $passYds300 = null;

    #[SerializedName('pass_yds_400')]
    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?float $passYds400 = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?float $rushAtt = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?float $rushYds = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?float $rushTds = null;

    #[SerializedName('rush_yds_100')]
    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?float $rushYds100 = null;

    #[SerializedName('rush_yds_200')]
    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?float $rushYds200 = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?float $recRec = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?float $recYds = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?float $recTds = null;

    #[SerializedName('rec_yds_100')]
    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?float $recYds100 = null;

    #[SerializedName('rec_yds_200')]
    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?float $recYds200 = null;

    #[SerializedName('scrimage_yards_100')]
    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?float $scrimageYards100 = null;

    #[SerializedName('scrimage_yards_200')]
    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?float $scrimageYards200 = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?float $fumbles = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?float $retTds = null;

    #[SerializedName('2pt_tds')]
    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?float $twoPtTds = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?float $fg = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?float $fga = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?float $xpt = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?float $defSack = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?float $defInt = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?float $defFr = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?float $defFf = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?float $defTd = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?float $defSafety = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?float $defRetd = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?float $defPaA = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?float $defPaB = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?float $defPaC = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?float $defPaD = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?float $defPaE = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?float $defPaF = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?float $defPaG = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?float $defTackle = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?float $defAssist = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?float $defPd = null;

    #[Context(denormalizationContext: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true])]
    private ?float $defTlost = null;

    public function getPoints(): ?float
    {
        return $this->points;
    }

    public function setPoints(?float $points): static
    {
        $this->points = $points;
        return $this;
    }

    public function getPointsPpr(): ?float
    {
        return $this->pointsPpr;
    }

    public function setPointsPpr(?float $pointsPpr): static
    {
        $this->pointsPpr = $pointsPpr;
        return $this;
    }

    public function getPointsHalf(): ?float
    {
        return $this->pointsHalf;
    }

    public function setPointsHalf(?float $pointsHalf): static
    {
        $this->pointsHalf = $pointsHalf;
        return $this;
    }

    public function getPassAtt(): ?float
    {
        return $this->passAtt;
    }

    public function setPassAtt(?float $passAtt): static
    {
        $this->passAtt = $passAtt;
        return $this;
    }

    public function getPassCmp(): ?float
    {
        return $this->passCmp;
    }

    public function setPassCmp(?float $passCmp): static
    {
        $this->passCmp = $passCmp;
        return $this;
    }

    public function getPassYds(): ?float
    {
        return $this->passYds;
    }

    public function setPassYds(?float $passYds): static
    {
        $this->passYds = $passYds;
        return $this;
    }

    public function getPassTds(): ?float
    {
        return $this->passTds;
    }

    public function setPassTds(?float $passTds): static
    {
        $this->passTds = $passTds;
        return $this;
    }

    public function getPassInts(): ?float
    {
        return $this->passInts;
    }

    public function setPassInts(?float $passInts): static
    {
        $this->passInts = $passInts;
        return $this;
    }

    public function getPassYds300(): ?float
    {
        return $this->passYds300;
    }

    public function setPassYds300(?float $passYds300): static
    {
        $this->passYds300 = $passYds300;
        return $this;
    }

    public function getPassYds400(): ?float
    {
        return $this->passYds400;
    }

    public function setPassYds400(?float $passYds400): static
    {
        $this->passYds400 = $passYds400;
        return $this;
    }

    public function getRushAtt(): ?float
    {
        return $this->rushAtt;
    }

    public function setRushAtt(?float $rushAtt): static
    {
        $this->rushAtt = $rushAtt;
        return $this;
    }

    public function getRushYds(): ?float
    {
        return $this->rushYds;
    }

    public function setRushYds(?float $rushYds): static
    {
        $this->rushYds = $rushYds;
        return $this;
    }

    public function getRushTds(): ?float
    {
        return $this->rushTds;
    }

    public function setRushTds(?float $rushTds): static
    {
        $this->rushTds = $rushTds;
        return $this;
    }

    public function getRushYds100(): ?float
    {
        return $this->rushYds100;
    }

    public function setRushYds100(?float $rushYds100): static
    {
        $this->rushYds100 = $rushYds100;
        return $this;
    }

    public function getRushYds200(): ?float
    {
        return $this->rushYds200;
    }

    public function setRushYds200(?float $rushYds200): static
    {
        $this->rushYds200 = $rushYds200;
        return $this;
    }

    public function getRecRec(): ?float
    {
        return $this->recRec;
    }

    public function setRecRec(?float $recRec): static
    {
        $this->recRec = $recRec;
        return $this;
    }

    public function getRecYds(): ?float
    {
        return $this->recYds;
    }

    public function setRecYds(?float $recYds): static
    {
        $this->recYds = $recYds;
        return $this;
    }

    public function getRecTds(): ?float
    {
        return $this->recTds;
    }

    public function setRecTds(?float $recTds): static
    {
        $this->recTds = $recTds;
        return $this;
    }

    public function getRecYds100(): ?float
    {
        return $this->recYds100;
    }

    public function setRecYds100(?float $recYds100): static
    {
        $this->recYds100 = $recYds100;
        return $this;
    }

    public function getRecYds200(): ?float
    {
        return $this->recYds200;
    }

    public function setRecYds200(?float $recYds200): static
    {
        $this->recYds200 = $recYds200;
        return $this;
    }

    public function getScrimageYards100(): ?float
    {
        return $this->scrimageYards100;
    }

    public function setScrimageYards100(?float $scrimageYards100): static
    {
        $this->scrimageYards100 = $scrimageYards100;
        return $this;
    }

    public function getScrimageYards200(): ?float
    {
        return $this->scrimageYards200;
    }

    public function setScrimageYards200(?float $scrimageYards200): static
    {
        $this->scrimageYards200 = $scrimageYards200;
        return $this;
    }

    public function getFumbles(): ?float
    {
        return $this->fumbles;
    }

    public function setFumbles(?float $fumbles): static
    {
        $this->fumbles = $fumbles;
        return $this;
    }

    public function getRetTds(): ?float
    {
        return $this->retTds;
    }

    public function setRetTds(?float $retTds): static
    {
        $this->retTds = $retTds;
        return $this;
    }

    public function getTwoPtTds(): ?float
    {
        return $this->twoPtTds;
    }

    public function setTwoPtTds(?float $twoPtTds): static
    {
        $this->twoPtTds = $twoPtTds;
        return $this;
    }

    public function getFg(): ?float
    {
        return $this->fg;
    }

    public function setFg(?float $fg): static
    {
        $this->fg = $fg;
        return $this;
    }

    public function getFga(): ?float
    {
        return $this->fga;
    }

    public function setFga(?float $fga): static
    {
        $this->fga = $fga;
        return $this;
    }

    public function getXpt(): ?float
    {
        return $this->xpt;
    }

    public function setXpt(?float $xpt): static
    {
        $this->xpt = $xpt;
        return $this;
    }

    public function getDefSack(): ?float
    {
        return $this->defSack;
    }

    public function setDefSack(?float $defSack): static
    {
        $this->defSack = $defSack;
        return $this;
    }

    public function getDefInt(): ?float
    {
        return $this->defInt;
    }

    public function setDefInt(?float $defInt): static
    {
        $this->defInt = $defInt;
        return $this;
    }

    public function getDefFr(): ?float
    {
        return $this->defFr;
    }

    public function setDefFr(?float $defFr): static
    {
        $this->defFr = $defFr;
        return $this;
    }

    public function getDefFf(): ?float
    {
        return $this->defFf;
    }

    public function setDefFf(?float $defFf): static
    {
        $this->defFf = $defFf;
        return $this;
    }

    public function getDefTd(): ?float
    {
        return $this->defTd;
    }

    public function setDefTd(?float $defTd): static
    {
        $this->defTd = $defTd;
        return $this;
    }

    public function getDefSafety(): ?float
    {
        return $this->defSafety;
    }

    public function setDefSafety(?float $defSafety): static
    {
        $this->defSafety = $defSafety;
        return $this;
    }

    public function getDefRetd(): ?float
    {
        return $this->defRetd;
    }

    public function setDefRetd(?float $defRetd): static
    {
        $this->defRetd = $defRetd;
        return $this;
    }

    public function getDefPaA(): ?float
    {
        return $this->defPaA;
    }

    public function setDefPaA(?float $defPaA): static
    {
        $this->defPaA = $defPaA;
        return $this;
    }

    public function getDefPaB(): ?float
    {
        return $this->defPaB;
    }

    public function setDefPaB(?float $defPaB): static
    {
        $this->defPaB = $defPaB;
        return $this;
    }

    public function getDefPaC(): ?float
    {
        return $this->defPaC;
    }

    public function setDefPaC(?float $defPaC): static
    {
        $this->defPaC = $defPaC;
        return $this;
    }

    public function getDefPaD(): ?float
    {
        return $this->defPaD;
    }

    public function setDefPaD(?float $defPaD): static
    {
        $this->defPaD = $defPaD;
        return $this;
    }

    public function getDefPaE(): ?float
    {
        return $this->defPaE;
    }

    public function setDefPaE(?float $defPaE): static
    {
        $this->defPaE = $defPaE;
        return $this;
    }

    public function getDefPaF(): ?float
    {
        return $this->defPaF;
    }

    public function setDefPaF(?float $defPaF): static
    {
        $this->defPaF = $defPaF;
        return $this;
    }

    public function getDefPaG(): ?float
    {
        return $this->defPaG;
    }

    public function setDefPaG(?float $defPaG): static
    {
        $this->defPaG = $defPaG;
        return $this;
    }

    public function getDefTackle(): ?float
    {
        return $this->defTackle;
    }

    public function setDefTackle(?float $defTackle): static
    {
        $this->defTackle = $defTackle;
        return $this;
    }

    public function getDefAssist(): ?float
    {
        return $this->defAssist;
    }

    public function setDefAssist(?float $defAssist): static
    {
        $this->defAssist = $defAssist;
        return $this;
    }

    public function getDefPd(): ?float
    {
        return $this->defPd;
    }

    public function setDefPd(?float $defPd): static
    {
        $this->defPd = $defPd;
        return $this;
    }

    public function getDefTlost(): ?float
    {
        return $this->defTlost;
    }

    public function setDefTlost(?float $defTlost): static
    {
        $this->defTlost = $defTlost;
        return $this;
    }
}

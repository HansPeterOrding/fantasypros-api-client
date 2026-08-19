<?php

declare(strict_types=1);

namespace HansPeterOrding\FantasyProsApiClient\ApiClient\Endpoints;

use HansPeterOrding\FantasyProsApiClient\Dto\FpComparePlayersResponse;

/**
 * /{sport}/compare-players - head-to-head comparison (response shape provisional).
 */
class FpComparePlayers extends AbstractEndpoint
{
    /**
     * Compare players head-to-head. $position is required by the API
     * (undocumented in the spec; live-verified via its 400 response:
     * one of ALL,QB,RB,WR,TE,K,DST,FLX). The response DTO is PROVISIONAL -
     * no successful fixture has been captured yet.
     *
     * @param int[] $playerIds FantasyPros player ids
     * @param int[]|null $expertIds restrict to specific experts
     */
    public function get(
        array   $playerIds,
        string  $position,
        ?array  $expertIds = null,
        ?string $rankingType = null,
        ?string $details = null,
    ): ?FpComparePlayersResponse
    {
        $url = $this->uri(sprintf('%s/compare-players', $this->sport()), [
            'players' => implode(':', $playerIds),
            'position' => $position,
            'experts' => null !== $expertIds ? implode(':', $expertIds) : null,
            'ranking_type' => $rankingType,
            'details' => $details,
        ]);

        return $this->fantasyProsApiClient->get($url, FpComparePlayersResponse::class);
    }
}

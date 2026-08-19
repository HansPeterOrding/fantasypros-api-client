<?php

declare(strict_types=1);

namespace HansPeterOrding\FantasyProsApiClient\ApiClient\Endpoints;

use HansPeterOrding\FantasyProsApiClient\Dto\FpConsensusRankingsResponse;

/**
 * /{sport}/{season}/consensus-rankings - one fully detailed consensus slice per request.
 */
class FpConsensusRankings extends AbstractEndpoint
{
    /**
     * One (type, scoring, position, week) consensus slice with rich
     * per-player detail. Invalid combinations do not fail - they return a
     * response with count = 0 and an empty player list (live-verified).
     * $filters restricts the server-side consensus to the given expert ids
     * (colon separated).
     */
    public function get(
        int     $season,
        string  $type,
        string  $scoring,
        string  $position,
        ?int    $week = null,
        bool    $showExperts = false,
        ?string $filters = null,
    ): ?FpConsensusRankingsResponse
    {
        $url = $this->uri(sprintf('%s/%d/consensus-rankings', $this->sport(), $season), [
            'type' => $type,
            'scoring' => $scoring,
            'position' => $position,
            'week' => $week,
            'experts' => $showExperts ? 'show' : null,
            'filters' => $filters,
        ]);

        return $this->fantasyProsApiClient->get($url, FpConsensusRankingsResponse::class);
    }
}

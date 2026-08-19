<?php

declare(strict_types=1);

namespace HansPeterOrding\FantasyProsApiClient\ApiClient\Endpoints;

use HansPeterOrding\FantasyProsApiClient\Dto\FpProjectionsResponse;

/**
 * /nfl/{season}/projections - aggregated expert projections per position.
 */
class FpProjections extends AbstractEndpoint
{
    /**
     * Projections for one position. One response always carries all three
     * scoring point totals (points / points_ppr / points_half), so a single
     * request per position covers every scoring variant (live-verified).
     * ROS projections may deliver "players": null in the preseason - the
     * response DTO's getPlayers() coalesces that to an empty array.
     */
    public function get(
        int     $season,
        string  $position,
        ?int    $week = null,
        bool    $ros = false,
        ?string $filters = null,
    ): ?FpProjectionsResponse
    {
        $url = $this->uri(sprintf('%s/%d/projections', $this->sport(), $season), [
            'position' => $position,
            'week' => $week,
            'ros' => $ros ? true : null,
            'filters' => $filters,
        ]);

        return $this->fantasyProsApiClient->get($url, FpProjectionsResponse::class);
    }
}

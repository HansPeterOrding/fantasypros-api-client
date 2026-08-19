<?php

declare(strict_types=1);

namespace HansPeterOrding\FantasyProsApiClient\ApiClient\Endpoints;

use HansPeterOrding\FantasyProsApiClient\Dto\FpRankingBoardResponse;

/**
 * /{sport}/{season}/rankings - the compact multi-type ECR board.
 */
class FpRankings extends AbstractEndpoint
{
    /**
     * The full ECR board: every player with ECR values across all ranking
     * types, scorings and positions in a single request. By far the most
     * request-efficient rankings feed. $type switches to a board variant
     * (e.g. FantasyProsApiClientInterface::BOARD_TYPE_DRAFTERS).
     */
    public function get(
        int     $season,
        int     $week = 0,
        ?string $type = null,
        bool    $range = false,
        bool    $rankStats = false,
        bool    $min = false,
    ): ?FpRankingBoardResponse
    {
        $url = $this->uri(sprintf('%s/%d/rankings', $this->sport(), $season), [
            'week' => $week,
            'type' => $type,
            'range' => $range ? true : null,
            'rankstats' => $rankStats ? true : null,
            'min' => $min ? true : null,
        ]);

        return $this->fantasyProsApiClient->get($url, FpRankingBoardResponse::class);
    }
}

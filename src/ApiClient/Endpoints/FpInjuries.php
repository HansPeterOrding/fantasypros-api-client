<?php

declare(strict_types=1);

namespace HansPeterOrding\FantasyProsApiClient\ApiClient\Endpoints;

use HansPeterOrding\FantasyProsApiClient\Dto\FpInjuriesResponse;

/**
 * /{sport}/injuries - current injury report snapshot including practice participation.
 */
class FpInjuries extends AbstractEndpoint
{
    public function list(?int $year = null, ?int $week = null): ?FpInjuriesResponse
    {
        $url = $this->uri(sprintf('%s/injuries', $this->sport()), [
            'year' => $year,
            'week' => $week,
        ]);

        return $this->fantasyProsApiClient->get($url, FpInjuriesResponse::class);
    }
}

<?php

declare(strict_types=1);

namespace HansPeterOrding\FantasyProsApiClient\ApiClient\Endpoints;

use HansPeterOrding\FantasyProsApiClient\Dto\FpExpertsResponse;

/**
 * /{sport}/{season}/rankings/experts - expert metadata: accuracy, update timestamps, position coverage.
 */
class FpExperts extends AbstractEndpoint
{
    public function list(
        int     $season,
        ?string $position = null,
        bool    $includeOverall = false,
    ): ?FpExpertsResponse
    {
        $url = $this->uri(sprintf('%s/%d/rankings/experts', $this->sport(), $season), [
            'position' => $position,
            'include_overall' => $includeOverall ? true : null,
        ]);

        return $this->fantasyProsApiClient->get($url, FpExpertsResponse::class);
    }
}

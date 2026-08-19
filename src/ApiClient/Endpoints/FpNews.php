<?php

declare(strict_types=1);

namespace HansPeterOrding\FantasyProsApiClient\ApiClient\Endpoints;

use HansPeterOrding\FantasyProsApiClient\Dto\FpNewsResponse;

/**
 * /{sport}/news - editorial news items with fantasy impact analysis.
 */
class FpNews extends AbstractEndpoint
{
    /**
     * Latest news items. There is no "since" parameter - incremental
     * consumption means polling ordered by creation and de-duplicating by
     * item id; more than $limit items between polls are silently missed.
     */
    public function list(
        ?int    $limit = null,
        ?string $category = null,
        ?string $orderBy = null,
        ?int    $playerId = null,
    ): ?FpNewsResponse
    {
        $url = $this->uri(sprintf('%s/news', $this->sport()), [
            'limit' => $limit,
            'category' => $category,
            'order_by' => $orderBy,
            'fpid' => $playerId,
        ]);

        return $this->fantasyProsApiClient->get($url, FpNewsResponse::class);
    }
}

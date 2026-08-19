<?php

declare(strict_types=1);

namespace HansPeterOrding\FantasyProsApiClient\ApiClient\Endpoints;

use HansPeterOrding\FantasyProsApiClient\Dto\FpPlayersResponse;

/**
 * /{sport}/players - the full FantasyPros player catalog including cross-provider ids.
 */
class FpPlayers extends AbstractEndpoint
{
    /**
     * Full player list. Pass $update (YYYY-MM-DD) to restrict to players
     * changed since that date. NOTE: with the limited dev key the update
     * variant returned MORE players than the unfiltered call - verify the
     * parameter's semantics against a production key before relying on it
     * for incremental syncs.
     */
    public function list(
        ?string $update = null,
        bool    $includeEcr = true,
        ?string $show = null,
    ): ?FpPlayersResponse
    {
        $url = $this->uri(sprintf('%s/players', $this->sport()), [
            'ecr' => $includeEcr ? 'included' : null,
            'show' => $show,
            'update' => $update,
        ]);

        return $this->fantasyProsApiClient->get($url, FpPlayersResponse::class);
    }
}

<?php

declare(strict_types=1);

namespace HansPeterOrding\FantasyProsApiClient\ApiClient\Endpoints;

use HansPeterOrding\FantasyProsApiClient\ApiClient\FantasyProsApiClientInterface;
use Psr\Http\Message\UriInterface;

abstract class AbstractEndpoint
{
    public function __construct(
        protected readonly FantasyProsApiClientInterface $fantasyProsApiClient,
    )
    {
    }

    /**
     * Build a request URI below the API base. Null query values are dropped,
     * booleans are rendered as "true"/"false" (matching the API's own
     * examples), everything else is cast to string.
     *
     * @param array<string, mixed> $query
     */
    protected function uri(string $path, array $query = []): UriInterface
    {
        $filtered = [];

        foreach ($query as $key => $value) {
            if (null === $value) {
                continue;
            }

            if (\is_bool($value)) {
                $filtered[$key] = $value ? 'true' : 'false';

                continue;
            }

            $filtered[$key] = (string)$value;
        }

        $uri = FantasyProsApiClientInterface::BASE_URI . ltrim($path, '/');

        if ([] !== $filtered) {
            $uri .= '?' . http_build_query($filtered, '', '&', PHP_QUERY_RFC3986);
        }

        return $this->fantasyProsApiClient->getUriFactory()->createUri($uri);
    }

    protected function sport(): string
    {
        return $this->fantasyProsApiClient->getSport();
    }
}

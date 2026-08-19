<?php

declare(strict_types=1);

namespace HansPeterOrding\FantasyProsApiClient\ApiClient;

use HansPeterOrding\FantasyProsApiClient\ApiClient\Endpoints\FpComparePlayers;
use HansPeterOrding\FantasyProsApiClient\ApiClient\Endpoints\FpConsensusRankings;
use HansPeterOrding\FantasyProsApiClient\ApiClient\Endpoints\FpExperts;
use HansPeterOrding\FantasyProsApiClient\ApiClient\Endpoints\FpInjuries;
use HansPeterOrding\FantasyProsApiClient\ApiClient\Endpoints\FpNews;
use HansPeterOrding\FantasyProsApiClient\ApiClient\Endpoints\FpPlayers;
use HansPeterOrding\FantasyProsApiClient\ApiClient\Endpoints\FpProjections;
use HansPeterOrding\FantasyProsApiClient\ApiClient\Endpoints\FpRankings;
use HansPeterOrding\FantasyProsApiClient\ApiClient\Exception\BadRequestException;
use HansPeterOrding\FantasyProsApiClient\ApiClient\Exception\ClientErrorException;
use HansPeterOrding\FantasyProsApiClient\ApiClient\Exception\ForbiddenException;
use HansPeterOrding\FantasyProsApiClient\ApiClient\Exception\NotFoundException;
use HansPeterOrding\FantasyProsApiClient\ApiClient\Exception\ServerErrorException;
use HansPeterOrding\FantasyProsApiClient\ApiClient\Exception\TooManyRequestsException;
use HansPeterOrding\FantasyProsApiClient\ApiClient\Exception\UnauthorizedException;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UriFactoryInterface;
use Psr\Http\Message\UriInterface;
use Symfony\Component\Serializer\SerializerInterface;

readonly class FantasyProsApiClient implements FantasyProsApiClientInterface
{
    public function __construct(
        private ClientInterface         $client,
        private UriFactoryInterface     $uriFactory,
        private RequestFactoryInterface $requestFactory,
        private SerializerInterface     $serializer,
        #[\SensitiveParameter]
        private string                  $apiKey,
        private string                  $sport = self::SPORT_NFL,
    )
    {
    }

    public function players(): FpPlayers
    {
        return new FpPlayers($this);
    }

    public function rankings(): FpRankings
    {
        return new FpRankings($this);
    }

    public function consensusRankings(): FpConsensusRankings
    {
        return new FpConsensusRankings($this);
    }

    public function experts(): FpExperts
    {
        return new FpExperts($this);
    }

    public function projections(): FpProjections
    {
        return new FpProjections($this);
    }

    public function news(): FpNews
    {
        return new FpNews($this);
    }

    public function injuries(): FpInjuries
    {
        return new FpInjuries($this);
    }

    public function comparePlayers(): FpComparePlayers
    {
        return new FpComparePlayers($this);
    }

    public function get(UriInterface $uri, string $type): ?object
    {
        $content = $this->request($uri);

        if (null === $content) {
            return null;
        }

        return $this->serializer->deserialize($content, $type, 'json');
    }

    public function decodeJson(UriInterface $uri): array
    {
        $content = $this->request($uri);

        if (null === $content) {
            return [];
        }

        $data = json_decode($content, true, 512, JSON_THROW_ON_ERROR);

        return \is_array($data) ? $data : [];
    }

    public function getUriFactory(): UriFactoryInterface
    {
        return $this->uriFactory;
    }

    public function getSport(): string
    {
        return $this->sport;
    }

    /**
     * Perform the request, map error statuses to typed exceptions, and
     * return the raw body - or null when the API delivered a literal
     * null body (which FantasyPros does not treat as an error).
     */
    private function request(UriInterface $uri): ?string
    {
        $request = $this->buildRequest($uri);
        $response = $this->client->sendRequest($request);

        $this->assertSuccess($request, $response);

        $content = (string)$response->getBody();

        if ('' === $content || 'null' === trim($content)) {
            return null;
        }

        return $content;
    }

    private function buildRequest(UriInterface $uri): RequestInterface
    {
        return $this->requestFactory
            ->createRequest('GET', $uri)
            ->withHeader('Accept', self::ACCEPT_JSON)
            ->withHeader('x-api-key', $this->apiKey);
    }

    private function assertSuccess(RequestInterface $request, ResponseInterface $response): void
    {
        $status = $response->getStatusCode();

        if ($status < 400) {
            return;
        }

        throw match (true) {
            400 === $status => BadRequestException::create($request, $response),
            401 === $status => UnauthorizedException::create($request, $response),
            403 === $status => ForbiddenException::create($request, $response),
            404 === $status => NotFoundException::create($request, $response),
            429 === $status => TooManyRequestsException::create($request, $response),
            $status < 500 => ClientErrorException::create($request, $response),
            default => ServerErrorException::create($request, $response),
        };
    }
}

<?php

declare(strict_types=1);

namespace HansPeterOrding\FantasyProsApiClient\ApiClient\Exception;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

abstract class AbstractRequestException extends \RuntimeException
{
    protected ?RequestInterface $request = null;

    protected ?ResponseInterface $response = null;

    public static function create(RequestInterface $request, ResponseInterface $response): static
    {
        $exception = new static(sprintf(
            'FantasyPros API request to "%s" failed with status %d (%s)',
            (string)$request->getUri(),
            $response->getStatusCode(),
            $response->getReasonPhrase()
        ), $response->getStatusCode());

        $exception->request = $request;
        $exception->response = $response;

        return $exception;
    }

    public function getRequest(): ?RequestInterface
    {
        return $this->request;
    }

    public function getResponse(): ?ResponseInterface
    {
        return $this->response;
    }
}

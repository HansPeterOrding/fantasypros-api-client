<?php

declare(strict_types=1);

namespace HansPeterOrding\FantasyProsApiClient\ApiClient\Exception;

/**
 * HTTP 429. The FantasyPros API enforces a daily request quota per key.
 * This client is deliberately rate-limit agnostic - budget enforcement is
 * the consumer's responsibility (e.g. a counting PSR-18 decorator). This
 * exception exists so consumers can distinguish quota exhaustion from
 * other client errors and stop dispatching instead of retrying.
 */
class TooManyRequestsException extends AbstractRequestException
{
}

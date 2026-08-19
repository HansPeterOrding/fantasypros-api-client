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
use Psr\Http\Message\UriFactoryInterface;
use Psr\Http\Message\UriInterface;

interface FantasyProsApiClientInterface
{
    public const string BASE_URI = 'https://api.fantasypros.com/public/v2/json/';

    public const string ACCEPT_JSON = 'application/json';
    public const string USER_AGENT = 'hans-peter-ording/fantasypros-api-client';

    public const string SPORT_NFL = 'nfl';

    /**
     * Consensus ranking types (query parameter "type").
     * Live-verified 2026-08-19: WW and WAIVER return byte-identical
     * responses - they are aliases for the same "Waiver Wire" ranking.
     * ROS resolves to DRAFT while week = 0 (preseason); it only becomes a
     * distinct ranking once the season has started.
     */
    public const string RANKING_TYPE_DRAFT = 'DRAFT';
    public const string RANKING_TYPE_ROS = 'ROS';
    public const string RANKING_TYPE_DYNASTY = 'DYNASTY';
    public const string RANKING_TYPE_ROOKIES = 'ROOKIES';
    public const string RANKING_TYPE_ADP = 'ADP';
    public const string RANKING_TYPE_WW = 'WW';
    public const string RANKING_TYPE_WAIVER = 'WAIVER';

    /**
     * Rankings-board type variants (query parameter "type" on /rankings).
     */
    public const string BOARD_TYPE_DRAFTERS = 'DRAFTERS';

    /**
     * Scoring variants. Live-verified 2026-08-19: PPR/HALF only produce
     * distinct data for reception positions (RB/WR/TE and the FLX/OP
     * aggregates). For QB/K/DST the API accepts the parameter but returns
     * data identical to STD.
     */
    public const string SCORING_STD = 'STD';
    public const string SCORING_PPR = 'PPR';
    public const string SCORING_HALF = 'HALF';

    public const string POSITION_ALL = 'ALL';
    public const string POSITION_QB = 'QB';
    public const string POSITION_RB = 'RB';
    public const string POSITION_WR = 'WR';
    public const string POSITION_TE = 'TE';
    public const string POSITION_K = 'K';
    public const string POSITION_DST = 'DST';
    public const string POSITION_FLX = 'FLX';
    public const string POSITION_OP = 'OP';
    public const string POSITION_IDP = 'IDP';
    public const string POSITION_DL = 'DL';
    public const string POSITION_LB = 'LB';
    public const string POSITION_DB = 'DB';

    public function players(): FpPlayers;

    public function rankings(): FpRankings;

    public function consensusRankings(): FpConsensusRankings;

    public function experts(): FpExperts;

    public function projections(): FpProjections;

    public function news(): FpNews;

    public function injuries(): FpInjuries;

    public function comparePlayers(): FpComparePlayers;

    /**
     * Fetch a resource and deserialize it into the given DTO class.
     * Returns null when the API answers with a literal null body.
     *
     * @template T of object
     * @param class-string<T> $type
     * @return T|null
     */
    public function get(UriInterface $uri, string $type): ?object;

    /**
     * Fetch a resource and decode it into an associative array.
     * Returns an empty array when the API answers with a literal null body.
     */
    public function decodeJson(UriInterface $uri): array;

    public function getUriFactory(): UriFactoryInterface;

    public function getSport(): string;
}

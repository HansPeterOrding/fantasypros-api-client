#!/usr/bin/env bash
#
# FantasyPros API fixture capture (Phase 1)
# =========================================
# Captures real API responses (body + headers) for every endpoint variant the
# client and bundle will consume. Fixtures are the source of truth for DTO
# typing and become permanent serializer test fixtures.
#
# Usage:
#   FP_API_KEY=xxx ./tools/capture-fixtures.sh [output-dir]
#
# Optional env:
#   FP_SEASON        Season year for season-scoped endpoints (default: 2026)
#   FP_EXPERT_ID     A single expert ID for the projections-filter probe.
#                    If unset, that probe is skipped (run the script once,
#                    pick an ID from 20-experts-rb.json, re-run only that
#                    probe manually or set the var and re-run — requests are
#                    skipped for fixtures that already exist).
#
# Budget: ~32 requests on a full run. Existing fixture files are NOT
# re-fetched, so re-runs only cost what is missing.
#
# Verification goals encoded in the probe set:
#   - WW vs WAIVER alias check            (17 vs 18)
#   - scoring variants for QB/K/DST       (05 vs 11; expect 400 or fallback)
#   - ROOKIES position edge behavior      (19)
#   - rate-limit response headers         (all .headers files)
#   - numeric-as-string reality check     (all bodies)
#   - single-expert projections semantics (27)

set -u

BASE="https://api.fantasypros.com/public/v2/json"
SEASON="${FP_SEASON:-2026}"
OUT="${1:-tests/fixtures/live}"
COUNT=0
SKIPPED=0
FAILED=0

if [ -z "${FP_API_KEY:-}" ]; then
    echo "ERROR: FP_API_KEY is not set." >&2
    exit 1
fi

mkdir -p "$OUT"

fetch() {
    local name="$1"
    local path="$2"
    local body="$OUT/$name.json"
    local headers="$OUT/$name.headers"

    if [ -s "$body" ]; then
        echo "SKIP   $name (fixture exists)"
        SKIPPED=$((SKIPPED + 1))
        return 0
    fi

    COUNT=$((COUNT + 1))
    local http_code
    http_code=$(curl -sS \
        -H "x-api-key: $FP_API_KEY" \
        -H "Accept: application/json" \
        -D "$headers" \
        -o "$body" \
        -w "%{http_code}" \
        "$BASE$path")

    if [ "$http_code" -ge 400 ]; then
        # Keep the body: 4xx payloads (e.g. "Invalid Position") are fixtures
        # too — they document error shapes and invalid parameter combinations.
        mv "$body" "$OUT/$name.error-$http_code.json"
        mv "$headers" "$OUT/$name.error-$http_code.headers"
        echo "HTTP$http_code $name  ($path)"
        FAILED=$((FAILED + 1))
    else
        echo "OK     $name  ($path)"
    fi

    # Gentle pacing; also keeps bursts away from any per-minute limit.
    sleep 1
}

echo "== FantasyPros fixture capture — season $SEASON — output: $OUT =="
echo

# --- Players ---------------------------------------------------------------
fetch "01-players-full"          "/nfl/players?ecr=included&show=pos_rank"
fetch "02-players-update-probe"  "/nfl/players?update=$(date -d 'yesterday' +%F 2>/dev/null || date -v-1d +%F)"

# --- Rankings board (/rankings) ---------------------------------------------
fetch "03-rankings-board-full"   "/nfl/$SEASON/rankings?week=0&range=true&rankstats=true"
fetch "04-rankings-board-min"    "/nfl/$SEASON/rankings?week=0&min=true"
fetch "32-rankings-board-drafters" "/nfl/$SEASON/rankings?week=0&type=DRAFTERS"

# --- Consensus rankings: scoring/position matrix probes (DRAFT) -------------
fetch "05-consensus-draft-std-qb"   "/nfl/$SEASON/consensus-rankings?type=DRAFT&scoring=STD&position=QB"
fetch "06-consensus-draft-std-rb"   "/nfl/$SEASON/consensus-rankings?type=DRAFT&scoring=STD&position=RB"
fetch "07-consensus-draft-ppr-rb"   "/nfl/$SEASON/consensus-rankings?type=DRAFT&scoring=PPR&position=RB"
fetch "08-consensus-draft-half-rb"  "/nfl/$SEASON/consensus-rankings?type=DRAFT&scoring=HALF&position=RB"
fetch "09-consensus-draft-std-k"    "/nfl/$SEASON/consensus-rankings?type=DRAFT&scoring=STD&position=K"
fetch "10-consensus-draft-std-dst"  "/nfl/$SEASON/consensus-rankings?type=DRAFT&scoring=STD&position=DST"
fetch "11-consensus-draft-ppr-qb"   "/nfl/$SEASON/consensus-rankings?type=DRAFT&scoring=PPR&position=QB"

# --- Consensus rankings: expert metadata ------------------------------------
fetch "12-consensus-draft-std-rb-experts" "/nfl/$SEASON/consensus-rankings?type=DRAFT&scoring=STD&position=RB&experts=show"

# --- Consensus rankings: remaining ranking types -----------------------------
fetch "13-consensus-ros-std-rb"     "/nfl/$SEASON/consensus-rankings?type=ROS&scoring=STD&position=RB"
fetch "14-consensus-rookies-std-rb" "/nfl/$SEASON/consensus-rankings?type=ROOKIES&scoring=STD&position=RB"
fetch "15-consensus-dynasty-std-rb" "/nfl/$SEASON/consensus-rankings?type=DYNASTY&scoring=STD&position=RB"
fetch "16-consensus-adp-std-rb"     "/nfl/$SEASON/consensus-rankings?type=ADP&scoring=STD&position=RB"
fetch "17-consensus-ww-std-rb"      "/nfl/$SEASON/consensus-rankings?type=WW&scoring=STD&position=RB&week=0"
fetch "18-consensus-waiver-std-rb"  "/nfl/$SEASON/consensus-rankings?type=WAIVER&scoring=STD&position=RB&week=0"
fetch "19-consensus-rookies-std-dst" "/nfl/$SEASON/consensus-rankings?type=ROOKIES&scoring=STD&position=DST"

# --- Experts -----------------------------------------------------------------
fetch "20-experts-rb"            "/nfl/$SEASON/rankings/experts?position=RB&include_overall=true"
fetch "21-experts-all"           "/nfl/$SEASON/rankings/experts?include_overall=true"

# --- Projections -------------------------------------------------------------
fetch "22-projections-qb-w0"     "/nfl/$SEASON/projections?position=QB&week=0"
fetch "23-projections-rb-w0"     "/nfl/$SEASON/projections?position=RB&week=0"
fetch "24-projections-k-w0"      "/nfl/$SEASON/projections?position=K&week=0"
fetch "25-projections-dst-w0"    "/nfl/$SEASON/projections?position=DST&week=0"
fetch "26-projections-rb-ros"    "/nfl/$SEASON/projections?position=RB&ros=true"
fetch "34-projections-dl-w0"     "/nfl/$SEASON/projections?position=DL&week=0"

if [ -n "${FP_EXPERT_ID:-}" ]; then
    fetch "27-projections-rb-single-expert" "/nfl/$SEASON/projections?position=RB&week=0&filters=$FP_EXPERT_ID"
else
    echo "SKIP   27-projections-rb-single-expert (FP_EXPERT_ID not set)"
fi

# --- News & injuries (client completeness; not scheduled in v1) --------------
fetch "28-news"                  "/nfl/news?limit=5"
fetch "29-news-injury-category"  "/nfl/news?limit=5&category=injury"
fetch "30-injuries"              "/nfl/injuries?year=$SEASON&week=0"

# --- Compare players ----------------------------------------------------------
fetch "31-compare-players"       "/nfl/compare-players?players=6880:7354"

echo
echo "== Done. Requests made: $COUNT, skipped (existing): $SKIPPED, HTTP>=400: $FAILED =="
echo
echo "Next steps:"
echo "  1. Inspect *.headers for rate-limit information (grep -i 'ratelimit\\|limit' $OUT/*.headers)"
echo "  2. Diff 17 vs 18 to settle the WW/WAIVER alias question"
echo "  3. Check 11 and 19 (.error-* if 400) for scoring/position matrix constraints"
echo "  4. If not done yet: pick an expert ID from 20, set FP_EXPERT_ID, re-run for probe 27"
echo "  5. Commit the fixture set (move curated files out of tests/fixtures/live/,"
echo "     which is gitignored, into tests/fixtures/)"

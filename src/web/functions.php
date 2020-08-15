<?php
/**
 * The $airports variable contains array of arrays of airports (see airports.php)
 * What can be put instead of placeholder so that function returns the unique first letter of each airport name
 * in alphabetical order
 *
 * Create a PhpUnit test (GetUniqueFirstLettersTest) which will check this behavior
 *
 * @param  array  $airports
 * @return string[]
 */
function getUniqueFirstLetters(array $airports)
{
    $letters = array_map(function ($airport) {
        return $airport["name"][0];
    }, $airports
    );

    $letters = array_unique($letters);
    sort($letters);

    return $letters;
}

/**
 * Filter Airports by first letter
 *
 * @param array $airports
 * @param $letter
 * @return array
 *
 */
function filterByFirstLetter($airports, $letter) {
    return array_filter($airports, function ($airport) use ($letter) {
        if ($airport['name'][0] === $letter) {
            return true;
        }
        return false;
    });
}

/**
 * Filter Airports by state
 *
 * @param array $airports
 * @param $state
 *
 * @return array
 */
function filterByState($airports, $state) {
    return $airports = array_filter($airports, function ($airport) use ($state) {
        if ($airport['state'] === $state) {
            return true;
        }
        return false;
    });
}

/**
 * Sort Airports by sorting key
 *
 * @param array $airports
 * @param $sortKey
 *
 * @return array
 */
function sortAirports($airports, $sortKey)
{
    $sortColumn = array_column($airports, $sortKey);
    array_multisort($sortColumn, SORT_ASC, $airports);

    return $airports;
}

/**
 * Slice array of airports
 *
 * @param array $airports
 * @param int $countPerPage
 * @param int $currentPage
 *
 * @return array
 */
function pagination($airports, $countPerPage = 5, $currentPage = 1)
{
    $from = ($currentPage - 1) * $countPerPage;
    return array_slice($airports, $from, $countPerPage);
}

/**
 * Get count of pages
 *
 * @param array $airports
 *
 * @return int
 */
function getPages($airports)
{
    $count = count($airports);
    return ceil($count / AIRPORTS_PER_PAGE);
}

function getCurrentPage($get)
{
    if (key_exists('page', $get)) {
        return $get['page'];
    }

    return 1;
}

/**
 * Generate URL based on chosen filters and sorting column
 *
 * @param array $params
 *
 * @return string
 */
function getUri($params)
{
    return count($params) != 0 ? '/?'.http_build_query(array_merge($_GET, $params)) : '';
}
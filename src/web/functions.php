<?php
define('AIRPORTS_PER_PAGE', 5);

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
 * Check and apply filters
 *
 * @param array $airports
 */
function checkFilters(&$airports)
{
    if (key_exists('filter_by_first_letter', $_GET)) {
        $airports = array_filter($airports, function ($airport) {
            if ($airport['name'][0] === $_GET['filter_by_first_letter']) {
                return true;
            }

            return false;
        });
    }

    if (key_exists('filter_by_state', $_GET)) {
        $airports = array_filter($airports, function ($airport) {
            if ($airport['state'] === $_GET['filter_by_state']) {
                return true;
            }

            return false;
        });
    }
}

/**
 * Sort Airports by sorting key
 *
 * @param array $airports
 */
function sortAirports(&$airports)
{
    if (key_exists('sort', $_GET)) {
        $names = array_column($airports, 'name');
        $codes = array_column($airports, 'code');
        $states = array_column($airports, 'state');
        $cities = array_column($airports, 'city');

        switch ($_GET['sort']) {
            case 'name' :
                array_multisort($names, SORT_ASC, $airports);
                break;
            case 'code' :
                array_multisort($codes, SORT_ASC, $airports);
                break;
            case 'state' :
                array_multisort($states, SORT_ASC, $airports);
                break;
            case 'city' :
                array_multisort($cities, SORT_ASC, $airports);
                break;
            default:
                break;
        }
    }
}

/**
 * Slice array of airports
 *
 * @param array $airports
 */
function pagination(&$airports)
{
    $from = 0;
    if (key_exists('page', $_GET)) {
        $from = ($_GET['page'] - 1) * AIRPORTS_PER_PAGE;
    }

    $airports = array_slice($airports, $from, AIRPORTS_PER_PAGE);

}

/**
 * Get count of pages
 *
 * @param array $airports
 */
function getPages($airports)
{
    $count = count($airports);
    return ceil($count / AIRPORTS_PER_PAGE);
}

function getCurrentPage()
{
    if (key_exists('page', $_GET)) {
        return $_GET['page'];
    }

    return 1;
}

/**
 * Generate URL based on chosen filters and sorting column
 * @param string $key
 * @param string $value
 */
function getUri($key, $value)
{
    if (trim($key) == '' || trim($value == '')) {
        return '';
    }

    if (key_exists('page', $_GET) && $key != 'page') {
        $_GET['page'] = 1;
    }

    $uri = '/?';

    $uri .= $key.'='.$value.'&';

    foreach ($_GET as $get_key => $value) {
        if ($get_key == $key) {
            continue;
        }
        $uri .= $get_key.'='.$value.'&';
    }

    return trim($uri, '&');
}
<?php

/**
 * Very simple dereferer script
 */

$queryString = $_SERVER['QUERY_STRING'] ?? '';
$url = '';
$error = '';

if ($queryString !== '') {
    if (strpos($queryString, '=') !== false) {
        parse_str($queryString, $params);
        $url = $params['url'] ?? '';
        if ($url === '') {
            $url = $queryString;
        }
    } else {
        $url = $queryString;
    }
}

$url = trim($url);

if ($url !== '') {
    if (!preg_match('#^https?://#i', $url)) {
        $url = 'https://' . $url;
    }

    $validatedUrl = filter_var($url, FILTER_VALIDATE_URL);

    if ($validatedUrl && preg_match('#^https?://#i', $validatedUrl)) {
        $url = $validatedUrl;
        require('../pages/redirect.php');
        exit;
    }

    $error = 'Please provide a valid http or https URL.';
}

require('../pages/welcome.php');

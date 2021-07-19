<?php

/**
 * Very simple dereferer script
 */

if(($pos = strpos($_SERVER['REQUEST_URI'], '?')) !== false) {

    $url = trim(substr($_SERVER['REQUEST_URI'], $pos + 1));

    if(!empty($url)) {
        require('../pages/redirect.php');
        exit;
    }
}

require('../pages/welcome.php');

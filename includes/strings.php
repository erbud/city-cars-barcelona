<?php
    // Global variables
    $path            = $_SERVER['DOCUMENT_ROOT'].'/locales/'.$lang.'.php';
    $queryStringLang = '';

    // Control language
    langControl();

    if (file_exists($path)) {
        include $path;
    } else {
        include $_SERVER['DOCUMENT_ROOT'].'/locales/en.php';
    }

    // Return the literal translated
    function _str($token) {
        global $translation;

        if (!array_key_exists($token, $translation)) {
            return $token;
        } else {
            return $translation[$token];
        }
    }
?>
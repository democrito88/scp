<?php

function getURLPadrao() {
    if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
        $protocol = 'https://';
    } else {
        $protocol = 'http://';
    }
    $url = $protocol . $_SERVER['HTTP_HOST'] . '/scp';
    return $url;
}

function limparString($string) {
    $string = str_replace('-', '', $string);
    $string = str_replace('.', '', $string);
    return $string;
}

function getIpDoCliente() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP'])) {
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    } else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else if (isset($_SERVER['HTTP_X_FORWARDED'])) {
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    } else if (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    } else if (isset($_SERVER['HTTP_FORWARDED'])) {
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    } else if (isset($_SERVER['REMOTE_ADDR'])) {
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    } else {
        $ipaddress = 'DESCONHECIDO';
    }
    return $ipaddress;
}
function issetGetOuPostComRetorno($getOuPost) {
    if (isset($_GET[$getOuPost])) {
        return $_GET[$getOuPost];
    } else if (isset($_POST[$getOuPost])) {
        return $_POST[$getOuPost];
    } else {
        return '';
    }
}
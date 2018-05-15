<?php
session_start();
include("function.php");
logout($SESSION['username']);
//session_destroy();
//header("Location: {$_SERVER['HTTP_REFERER']}");
/*
$url = "http://192.168.1.54:12108/verify";
$data = array('username' => '', 'password' => '');

// use key 'http' even if you send the request to https://...
$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data)
    )
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);*/
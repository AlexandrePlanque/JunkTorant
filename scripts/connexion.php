<?php
session_start();
include("function.php");
getUser($_POST['username']);
//$_SESSION['username'] = $_POST['username'];
//header("Location: {$_SERVER['HTTP_REFERER']}");
//echo $_COOKIE['username'];


/* function login(){
$json = json_decode(file_get_contents('/home/alexandreplanque/ServeurWeb/PhP/php-decouverte.bwb/data/message.json'), true);
$result = "";
foreach($json as $key => $value){
    if($_POST['username'] === $value){
        
        echo "MaBite";
    }else{
        echo "NOP";
    }
};
return $result; */
//}; 
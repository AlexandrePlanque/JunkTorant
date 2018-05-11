<?php
session_start();

/* $file ="/home/alexandreplanque/ServeurWeb/PhP/php-decouverte.bwb/data/message.json";
$arr_data = array();
$formdata = array(
    'username'-> $_SESSION['username'],
    'date' -> date("F j, Y, g:i a"),
    'message' -> $_POST['message']
    );

$jsondata = file_get_contents($file);

$arr_data = json_decode($jsondata, true);

array_push($arr_data,$formdata);

$jsondata = json_encode($arr_data, JSON_PRETTY_PRINT);
echo $file;
echo $jsondata;
file_put_contents($file, $jsondata);  */

//file_put_contents($handle, $person, FILE_APPEND);


/* $messages = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/data/message.json"), true);
if($messages === null){
    $messages = array();
}
$message = array(
    'username'=> $_SESSION['username'],
    'date' => date("F j, Y, g:i a"),
    'message' => $_POST['message']
    );

    array_push($messages, $message);

    file_put_contents($_SERVER['DOCUMENT_ROOT']. "/data/message.json", json_encode($messages), FILE_APPEND);
    header("Location: {$_SERVER['HTTP_REFERER']}"); */

    //Recup des messages precedents
   $json_source = file_get_contents('/home/alexandreplanque/ServeurWeb/PhP/php-decouverte.bwb/data/message.json');
   var_dump($json_source);
   $listeMessages = json_decode($json_source, true);
   if($listeMessages === NULL){
       $listeMessages = array();
   }

   //Recup des infos
   $dateMessage = date("d/m/Y, à H:i.");
   $user = $_SESSION['username'];
   $message = $_POST['message'];

   //Determiner le nouvel ID
   $newID = end($listeMessages)['id'] + 1;

   //Creation du post au format tableau
   $postTableau = ['id' => $newID, 'user' => $user, 'date' => $dateMessage, 'message' => $message];

   //Integration au tableau en cours
   array_push($listeMessages, $postTableau);

   //Conversion au format JSON
   $listePostsJson = json_encode($listeMessages, JSON_PRETTY_PRINT); //This parameter will format our JSON object and store it in json file
   
   //Recup du fichier d'origine
   $file = "/home/alexandreplanque/ServeurWeb/PhP/php-decouverte.bwb/data/message.json";
   var_dump($listePostsJson);
   //Ecrire la nouvelle liste dans le fichier messages.json
   file_put_contents($file, $listePostsJson);
   header("Location: {$_SERVER['HTTP_REFERER']}");
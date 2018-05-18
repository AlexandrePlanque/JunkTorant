<?php

session_start();
function getMessage(){
//$json = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT']."/data/message.json"), true);
$json = json_decode(file_get_contents('/home/alexandreplanque/ServeurWeb/PhP/JunkTorant/data/message.json'), true);
$result = "";
foreach($json as $message){
    echo '<div class="goldenbook">
    <div class="msg">
    <h4>Message n°'.$message['id'].'</h4>
    <p>'.$message['message'].'</p>
    </div>
    <div class="msgfooter">
    <h6>Publié par '.$message['user'].', le '.$message['date'].'</h6>
    </div>
</div>';     
};
return $result;
};

function getNav(){
    $dir = scandir("/var/www/html/serveurweb/PhP/JunkTorant/contents");
    foreach ($dir as $files){
        if ($files!== "." && $files!==".."){
            
            if(strpos($files,"_") !== FALSE){
                $done = ucfirst(implode('.',explode(".",str_replace ( "_", "", substr_replace(substr_replace($files, "'", strrpos($files,"_",-1), 0), " ", strrpos($files,"_",-9), 0)),-1)));
                //echo '<li><a href="http://php-decouv.bwb/?content='.$done.'">'.$done.'</a></li>';
                echo '<li><a id="'.implode('.',explode(".",$files,-1)).'" href="http://localhost/serveurweb/PhP/JunkTorant/?content='.implode('.',explode(".",$files,-1)).'">'.$done.'</a></li>';
            }else{
                //echo '<li><a href="http://php-decouv.bwb/?content=' . implode('.',explode(".",$files,-1)) . '">' . ucfirst(implode('.',explode(".",$files,-1))) . '</a></li>';
                echo '<li><a id="'.implode('.',explode(".",$files,-1)).'" href="http://localhost/serveurweb/PhP/JunkTorant/?content=' . implode('.',explode(".",$files,-1)) . '">' . ucfirst(implode('.',explode(".",$files,-1))) . '</a></li>';
            }
        }
    };
    if(isset($_COOKIE['username'])){
        echo '<li><form action="./scripts/deconnexion.php">Bonjour, '.$_COOKIE['username'].'<button><small>logout</small></button></p></form></li>';
    }/*elseif(isLogged()){
        echo '<li><form action="./scripts/deconnexion.php">Bonjour, '.$_COOKIE['username'].'<button><small>logout</small></button></p></form></li>';
    }*/else{
        echo '<li><form action="./scripts/connexion.php" method="post">
        <input type="text" placeholder="Veuillez taper votre nom d\'utilisateur" name="username">
        <input type="submit" value="Connexion">
      </form></li>';
    }

}

function saveUserData(){
    header("Location: {$_SERVER['HTTP_REFERER']}");
    $json_source = file_get_contents('/home/alexandreplanque/ServeurWeb/PhP/JunkTorant/data/users.json');
    $bool;
//si le json est vide on déclare users_list en tant qu'array vide pour éviter le NULL
$users_list = json_decode($json_source, true);
if($users_list === NULL){
    $users_list = array();
}
foreach($users_list as $users){
    if($users['username'] === $_POST['user_name']){
        $bool = false;
    }else{
        $bool = true;
    }
}
if($bool){
   //Recup des infos à stocker
   $username = $_POST['user_name'];
   $userfn = $POST['user_fn'];
   $email = $_POST['user_mail'];
   $newID = end($users_list)['id'] + 1;
   $isConnected = true;
   setcookie('username', $username, time()+3600, "/");

//Creation du post au format tableau
$postUser = ['id' => $newID, 'username' => $username, 'userfirstname' => $userfn, 'email' => $email, 'connected' => $isConnected];

//Integration au tableau en cours
array_push($users_list, $postUser);

//Conversion au format JSON
$UserListJson = json_encode($users_list); //This parameter will format our JSON object and store it in json file

echo "là";
//Ecrire la nouvelle liste dans le fichier message.json
$file = '/home/alexandreplanque/ServeurWeb/PhP/JunkTorant/data/users.json';
file_put_contents($file, $UserListJson);
$_SESSION['username'] = $postUser['username'];
}else{
    $_SESSION['test'] = "yeah";
    echo "fail";
    return false;
    //header("Location: {$_SERVER['HTTP_REFERER']}");
};


};

function login(){
    $json = json_decode(file_get_contents('/home/alexandreplanque/ServeurWeb/PhP/JunkTorant/data/users.json'), true);

    foreach($json as $shit){
        if($shit['username'] === $_POST['username']){
            
            $_SESSION['username'] = $_POST['username'];
            echo $_SESSION['username'];
            header("Location: {$_SERVER['HTTP_REFERER']}");
            return;
        }
    };
    return;
    };

function logout(){
    setcookie('username', '',time()-7000000, '/');
    $json_source = file_get_contents('/home/alexandreplanque/ServeurWeb/PhP/JunkTorant/data/users.json');

    $users_list = json_decode($json_source, true);

    $i = 0;
    $test = array();
    foreach ($users_list as &$user){

/*if qui permet de pointer l'element souhaiter et d'y rester le temps d'effectuer le traitement si les 
username sont identiques*/
    if($_COOKIE['username'] === $user['username']){
        
        //on stock les données du user courant dans une variable afin d'y changer l'état du booléen
        $test = $user;
        $test['connected'] = FALSE;
        $replacements = array($i => $test);
        //on enleve l'utilisateur et on y insere au même endroits le nouveau avec les modifs
        array_splice($users_list, $i, 1, $replacements);
    }
    $i++;
}
    //on effectue les traitements d'encodage et de réécriture du fichier 
    $UserListJson = json_encode($users_list, JSON_PRETTY_PRINT);
    $file = '/home/alexandreplanque/ServeurWeb/PhP/JunkTorant/data/users.json';
    file_put_contents($file, $UserListJson);
    //Puisque l'utilisateur s'est déconnecté on détruit la session courante avant de rediriger
    session_destroy();
    header("Location: {$_SERVER['HTTP_REFERER']}");
}

function getUser($username){ // ajouter $pass si besoin d'un mdp
//on effectue la même démarche qu'auparavant juste ici on souhaite passé le booléen à true
    $json_source = file_get_contents('/home/alexandreplanque/ServeurWeb/PhP/JunkTorant/data/users.json');

    $users_list = json_decode($json_source, true);
    
    $i = 0;
    $test = array();
    foreach ($users_list as $user){
        if($user['username']===$username){/*AND $user['password']===$pass*/
            //$_SESSION['username'] = $username;  //$_SESSION['password'] = $pass;

            $test = $user;

            $test['connected'] = TRUE;
 
            $replacements = array(0 => $test);
            array_splice($users_list,$i, 1, $replacements);
            $UserListJson = json_encode($users_list, JSON_PRETTY_PRINT);
            $file = '/home/alexandreplanque/ServeurWeb/PhP/JunkTorant/data/users.json';
            file_put_contents($file, $UserListJson);
            setcookie('username', $username, time()+3600, "/");
            //echo $_COOKIE['username'];
            header("Location: {$_SERVER['HTTP_REFERER']}");
            //header('Location: http://localhost/serveurweb/PhP/php-decouverte.bwb/?content=inscription');
            return;
        }
        $i++;
}
//si la fonction ne trouve pas d'équivalence avec l'argument passé dans la fonction on redirige vers la page d'inscription

header('Location: http://localhost/serveurweb/PhP/JunkTorant/?content=inscription');

}

/* function isLogged(){
    if(isset($_COOKIE['username'])){

    } */
//cette fonction à pour but de permettre de rester connecter malgrè un changement de navigateur 
    //$json_source = file_get_contents('/home/alexandreplanque/ServeurWeb/PhP/php-decouverte.bwb/data/users.json');

/*     $users_list = json_decode($json_source, true);
/*On vérifie l'état des booléens du fichier users.json si on trouve un booléen sur true on initialise la clé
username de la session avec le username courant
    foreach ($users_list as $user){
        if($user['connected'] === true){
            $_SESSION['username'] = $user['username'];
            return true;
        }
}
return false; */
//}



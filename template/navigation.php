<?php $dir = scandir("/var/www/html/serveurweb/PhP/php-decouverte.bwb/contents"); ?>

<header>
		<div class="wrapper">
			<div class="logo">
				<a href=""><img src="img/logo.png" alt="Resto" title=""/></a>
			</div>

			<nav>
				<ul>
                <?php 
                include("scripts/function.php");
                getNav();
/*     $dir = scandir("/var/www/html/serveurweb/PhP/php-decouverte.bwb/contents");
    foreach ($dir as $files){
        if ($files!== "." && $files!==".."){
            
            if(strpos($files,"_") !== FALSE){
                $done = ucfirst(implode('.',explode(".",str_replace ( "_", "", substr_replace(substr_replace($files, "'", strrpos($files,"_",-1), 0), " ", strrpos($files,"_",-9), 0)),-1)));
                //echo '<li><a href="http://php-decouv.bwb/?content='.$done.'">'.$done.'</a></li>';
                echo '<li><a href="http://localhost/serveurweb/PhP/php-decouverte.bwb/?content='.implode('.',explode(".",$files,-1)).'">'.$done.'</a></li>';
            }else{
                //echo '<li><a href="http://php-decouv.bwb/?content=' . implode('.',explode(".",$files,-1)) . '">' . ucfirst(implode('.',explode(".",$files,-1))) . '</a></li>';
                echo '<li><a href="http://localhost/serveurweb/PhP/php-decouverte.bwb/?content=' . implode('.',explode(".",$files,-1)) . '">' . ucfirst(implode('.',explode(".",$files,-1))) . '</a></li>';
            }
        }
    };
    if(isset($_SESSION['username'])){
        echo '<li><form action="./scripts/deconnexion.php">Bonjour, '.$_SESSION['username'].'<button><small>logout</small></button></p></form></li>';
    }else{

        echo '<li><form action="./scripts/connexion.php" method="post">
        <input type="text" placeholder="Veuillez taper votre nom d\'utilisateur" name="username">
        <input type="submit" value="Connexion">
      </form></li>';
    } */
        
?>
<!--http://localhost/serveurweb/PhP/php-decouverte.bwb/-->
    
					<!--<a href="#" class="login_btn">Login</a>-->
					</ul>
			</nav>
		</div>
	</header>

<!--
        if($_SERVER['REQUEST_URI'] === "/".$files){

        }

-->
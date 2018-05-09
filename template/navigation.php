<?php $dir = scandir("/var/www/html/serveurweb/PhP/php-decouverte.bwb/contents"); ?>

<header>
		<div class="wrapper">
			<div class="logo">
				<a href=""><img src="img/logo.png" alt="Resto" title=""/></a>
			</div>

			<nav>
				<ul>
                <?php 
    $dir = scandir("/var/www/html/serveurweb/PhP/php-decouverte.bwb/contents");
    foreach ($dir as $files){
        if ($files!== "." && $files!==".."){
            if(strpos($files,"_") !== FALSE){
                $modif = ucfirst(str_replace('_', ' ', implode('.',explode(".",substr_replace($files, "'", strrpos($files,"_",-1), 0),-1))));
                $done = substr_replace($modif, "", strrpos($modif," ", -1),0);
                //echo '<li><a href="http://php-decouv.bwb/?content='.$done.'">'.$done.'</a></li>';
                echo '<li><a href="http://localhost/serveurweb/PhP/php-decouverte.bwb/?content='.$done.'">'.$done.'</a></li>';
            }else{
                //echo '<li><a href="http://php-decouv.bwb/?content=' . implode('.',explode(".",$files,-1)) . '">' . ucfirst(implode('.',explode(".",$files,-1))) . '</a></li>';
                echo '<li><a href="http://localhost/serveurweb/PhP/php-decouverte.bwb/?content=' . implode('.',explode(".",$files,-1)) . '">' . ucfirst(implode('.',explode(".",$files,-1))) . '</a></li>';
            }
        }
    }
?>
<!--http://localhost/serveurweb/PhP/php-decouverte.bwb/-->
    
					<a href="#" class="login_btn">Login</a>
					</ul>
			</nav>
		</div>
	</header>

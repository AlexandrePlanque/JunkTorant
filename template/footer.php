<?php include("header.php"); ?>
	<!--  start footer  -->
	<footer>
		<div class="wrapper">
			<!-- adresse1  -->
			<section class="adress">
				<p>New York Restaurant</p> 
				<p class="location">3926 Anmoore Road<br/>
				New York, NY 10014</p>
				<p class="phone">718-749-1714</p>
			</section>

			<!--  adress2  -->
			<section class="adress">
				<p>France Restaurant</p>
				<p class="location">68, rue  de la Couronne<br/>
				75002 PARIS </p>
				<p class="phone">02.94.23.69.56</p>
			</section>

			<!--  footer navigation  -->
			<section class="footer_nav">
				<nav>
					<ul>
                    <?php
                    $dir = scandir("/var/www/html/serveurweb/PhP/php-decouverte.bwb/contents");
    foreach ($dir as $files){
        if ($files!== "." && $files!==".."){
            if(strpos($files,"_") !== FALSE){
                $modif = ucfirst(str_replace('_', ' ', implode('.',explode(".",substr_replace($files, "'", strrpos($files,"_",-1), 0),-1))));
                $done = substr_replace($modif, "", strrpos($modif," ", -1),0);
                echo '<li><a href="#">'.$done.'</a></li>';
            }else{
                echo '<li><a href="./mondossier/' . $files . '">' . ucfirst(implode('.',explode(".",$files,-1))) . '</a></li>';
            }
        }
    }
?>
					</ul>
				</nav>
			</section>

			<!--  footer copyrights  -->
			<section class="copyrights">
				<img src="img/footer_logo.png" class="footer_logo" alt="" title="">
				<p>© All Rights Reserved 2014.</p>
				<p>Find  More at <a href="http://NudesOfLoic.com" target="_blank">NudesOfLoic.com</a></p>	
			</section>
		</div>
	</footer><!--  end footer  -->
    <script src='../ga.js'></script>

</body>
</html>
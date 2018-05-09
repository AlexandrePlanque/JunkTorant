<?php
$banner = '<section class="hero">
<div class="caption">
	<h3>Resto..</h3>
	<h4>
		<span class="rsep"></span>
		test
		<span class="lsep"></span>
	</h4>
	
</div>
</section>';
if(!isset($_GET['content'])){
	echo $banner;
};
?>
<?php
if($_GET['content'] === "carte"){
	echo $banner;
	include("./contents/carte.php");
}elseif($_GET['content'] === "contact"){
	echo $banner;
	include("./contents/contact.php");
}elseif($_GET['content'] === "login"){
	include('./contents/login.php');
	echo $banner;
}elseif($_GET['content'] === "livre d' or"){
	include('./contents/livre_d_or.php');
}elseif($_GET['content'] === "accueil"){
	echo $banner;
	include('./contents/accueil.php');
}
?>



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
	//echo $banner;
};
?>
<?php
if(!isset($_GET['content'])){
	echo $banner;
}else{
	include('./contents/'.$_GET['content'].'.php');
	echo $banner;
}/* elseif($_GET['content'] === "livre_d_or"){
	echo $banner;
	include('./contents/livre_d_or.php');
}elseif($_GET['content'] === "accueil"){
	echo $banner;
	include('./contents/accueil.php');
} */
?>



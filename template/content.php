
<!--  start hero  -->
<section class="hero">
<div class="caption">
	<h3>Resto..</h3>
	<h4>
		<span class="rsep"></span>
		test
		<span class="lsep"></span>
	</h4>
	
</div>
</section><!--  end hero  -->   
<?php
if($_GET['content'] === "carte"){
	include("./contents/carte.php");
}elseif($_GET['content'] === "contact"){
	include("./contents/contact.php");
}elseif($_GET['content'] === "login"){
	include('./contents/login.php');
}elseif($_GET['content'] === "livre d' or"){
	include('./contents/livre_d_or.php');
}
?>



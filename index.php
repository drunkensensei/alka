<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Alaskan" />
<meta name="description" content="Alaskan dog" />
<meta name="author" content="Maks Utah" />
<meta name="robots" content="all" />
<link rel="stylesheet" media="screen" type="text/css" title="Style" href="css/style.css">
<title>Alaskan</title>
<script type="text/javascript" src="highslide/highslide-with-gallery.js"></script>
<script type="text/javascript" src="highslide/highslide.config.js" charset="utf-8"></script>
<link rel="stylesheet" type="text/css" href="highslide/highslide.css" />
<!--[if lt IE 7]>
<link rel="stylesheet" type="text/css" href="highslide/highslide-ie6.css" />
<![endif]-->
</head>
<?php
Error_Reporting(E_ALL & ~E_NOTICE);
require_once ("config.php");
session_start();
?>
<body>
	<div id=content>
<div id=menu>
	<div class=menu>
		<a class=amenu title="Foto1" href="index.php?all=1">Все фото</a>
	</div>
	<div class=menu>
		<a class=amenu title="Foto2" href="index.php?all=2">Альбомы</a>
	</div>
	<div class=menu>
		<a class=amenu title="Foto3" href="#foto1">Галлерея 3</a>
	</div>
<div id=upload class=menu>
<?php

if (isset($_SESSION['user_id'])) {
  include ("forms/upload_form.php");
}
else {include ("forms/login_form.php");}
?>
</div>

<?php
if ($_GET['error'] == 1)
{
?>
<div class=menu>
		Неверный фомат файла или превышен размер
	</div>
<?php
}
else { 
		
if (isset($_SESSION['user_id'])) {
?>
	<div class=menu>
<a title="Exit" href="forms/exit.php">Выход</a>
 </div>
 <?php
}}?>
		

	<div id=contacts class=menu>
		<p class=contacts>Наши контакты:</p>
	</div>
	
</div>
<div id=photo>
<?php
if (isset($_GET['all'])) {
	if ($_GET['all'] == 1){
	include ("photo-slide.php");
	}
else {
include ("blocks/albums.php");
include ("photo-slide.php");
}}
else {
include ("blocks/albums.php");
}

?>

</div>
</div>
</div>	
</body>
</html>
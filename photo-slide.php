<?php 
if (isset($_GET['album'])) { ?>
<h3>Альбом <?php print_r ($_GET['album']);?></h3>
<?php }
else { ?>
<h3>Все фото</h3>
<?php } ?>
<div class="highslide-gallery">
	<ul>
<?php
session_start();
$albums = mysql_query("SELECT * FROM photo WHERE album={$_GET['album']}",$dbcnx);
$all = mysql_query("SELECT * FROM photo",$dbcnx);
$albums_row = mysql_fetch_array($albums);
$all_row = mysql_fetch_array($all);
$num_rows = mysql_num_rows($albums);
//if  ($num_rows !== 0) {
if (isset($_GET['album'])) {
do {
	
?>
	<li>
	<a href="uploads/<?php echo $albums_row['name']; ?>" class="highslide" 
			title="Alka" 
			onclick="return hs.expand(this, config1 )">
		<img src="uploads/preview/<?php echo $albums_row['name']; ?>"  alt=""/>
	</a>
				 		
<?php	
		if (isset($_SESSION['user_id'])) {?>
 </br>
 <a title="Delete" href="blocks/delete.php?name=<?php echo $album_row['name']; ?>">Удалить</a>
 <?php } ?>
	</li>
<?php } 
while ($albums_row = mysql_fetch_array($albums));
}
else { 
do {
?>
	<li>
	<a href="uploads/<?php echo $all_row['name']; ?>" class="highslide" 
			title="Alka" 
			onclick="return hs.expand(this, config1 )">
		<img src="uploads/preview/<?php echo $all_row['name']; ?>"  alt=""/>
	</a>
				 		
<?php	
		if (isset($_SESSION['user_id'])) {?>
 </br>
 <a title="Delete" href="blocks/delete.php?name=<?php echo $all_row['name']; ?>">Удалить</a>
 <?php } ?>
	</li>
<?php } 
while ($all_row = mysql_fetch_array($all));
}
?>
	
	</ul>
<div style="clear:both"></div></div>

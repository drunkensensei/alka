<div id=photo>
	<ul>
	 
<?php
session_start();
$result = mysql_query("SELECT * FROM photo",$dbcnx);
$myrow = mysql_fetch_array($result);
$num_rows = mysql_num_rows($result);
do {
	
?>

		<li><a href="blocks/show.php?name=<?php echo $myrow['name']; ?>">
			<img src="uploads/preview/<?php echo $myrow['name']; ?>" />
			</a>
			</br>
			  <?php
			if  ($num_rows == 0) {
			echo "Нет фоток";
			}
 else { if (isset($_SESSION['user_id'])) {?>
 <a title="Delete" href="blocks/delete.php?name=<?php echo $myrow['name']; ?>">Удалить</a>
 <?php }} ?>
		</li>
		
<?php } 
while ($myrow = mysql_fetch_array($result));
?>
</ul>
</div>	 
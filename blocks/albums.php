  <div id=albums>
<h3>Альбомы</h3>
<ul>
<?php
session_start();
$result = mysql_query("SELECT * FROM photo GROUP BY album;",$dbcnx);
$myrow = mysql_fetch_array($result);
$num_rows = mysql_num_rows($result);
do { 
	
?>

		<li class="album<?php echo $myrow['album']==$_GET['album'] ? " selected" : ""; ?>"><a href="index.php?album=<?php echo $myrow['album']; ?>&all=2">
			<img src="uploads/preview/<?php echo $myrow['name']; ?>" width="100" height="100"/>
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
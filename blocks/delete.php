<?php
include ("../config.php");
$result = mysql_query("DELETE FROM photo WHERE name='{$_GET['name']}'");
unlink('../uploads/'.$_GET['name'].'');
unlink('../uploads/preview/'.$_GET['name'].'');
if (!$result) {
    die('Error: ' . mysql_error());
}
header("Location: ../index.php");
?>
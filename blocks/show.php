<?php
header('Content-type: image/jpeg');
$image = new Imagick('../uploads/'.$_GET['name'].'');
echo $image;
?>
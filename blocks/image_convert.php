<?php
header('Content-type: image/jpeg');
$image = new Imagick('uploads/$filename');
$image->thumbnailImage(100, 0);
$image->writeImage('uploads/preview/$filename');
?>
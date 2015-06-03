<?php
require_once ("config.php");
$uploaddir = 'C:\Windows\Temp';
//$uploadfile = '/var/www/html/alaskan/uploads/' . basename($_FILES['userfile']['tmp_name']);
$uploadfile = 'D:/www/alyaska/uploads/' . basename($_FILES['userfile']['tmp_name']);
$filename = basename($_FILES['userfile']['tmp_name']);
print_r($filename);
echo $uploadfile;
echo '<pre>';
if ($_FILES['userfile']['type'] !== "image/jpeg") {header("Location: index.php?error=1"); exit();}
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    echo "Файл корректен и был успешно загружен.\n";
$result = mysql_query("INSERT INTO photo (name) VALUES ('$filename')");
if ($result == 'true') {
	echo "Информация в базу занесена";
}
else {
	echo "Информация не добавленна в базу";
	}
} else {
    echo "Возможная атака с помощью файловой загрузки!\n";
}

echo 'Некоторая отладочная информация:';
print_r($_FILES);

print "</pre>";
//header('Content-type: image/jpeg');
$image = new Imagick("$uploadfile");
$image->thumbnailImage(0,80);
$image->writeImage("uploads/preview/$filename");
//include (blocks/image_convert.php);
//header("Location: index.php");
?>
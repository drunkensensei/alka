<?php
session_start();
$db = mysql_connect("localhost","saitest","sas");
mysql_select_db("saitest") or die("Не могу подключиться к базе.");

if (isset($_POST['login']) && isset($_POST['password']))
{
    $login = mysql_real_escape_string($_POST['login']);
    $password = md5($_POST['password']);

    // делаем запрос к БД
    // и ищем юзера с таким логином и паролем

    $query = "SELECT `id`
            FROM `users`
            WHERE `login`='{$login}' AND `password`='{$password}'
            LIMIT 1";
       
	$sql = mysql_query($query) or die(mysql_error());
	
    // если такой пользователь нашелся
    if (mysql_num_rows($sql) == 1) {
        // то мы ставим об этом метку в сессии (допустим мы будем ставить ID пользователя)
         
        $row = mysql_fetch_assoc($sql);
        $_SESSION['user_id'] = $row['id'];
        header("Location: index.php");
		 
        // не забываем, что для работы с сессионными данными, у нас в каждом скрипте должно присутствовать session_start();
    }
    else {
		//header("Location: index.php");
        header("Location: index.php?login=enter&error=1&side=enter-side");
		//die('Такой логин с паролем не найдены в базе данных.');
    }
}
?>
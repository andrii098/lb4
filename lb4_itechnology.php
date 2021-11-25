<!DOCTYPE HTML>
<html>
<head>
<title>lb4_itechology</title>
</head>
    <h2>Лабораторная робота №4</h2>
    <h3>Вход</h3>
    <form id="form" method="post" action="">
        <p>Логин:<input type="text" name="mname" required="required" /></p>
        <p>Пароль:<input type="password" name="mpassword" required="required" /></p>
        <input type="submit" value="Войти"/>
    </form>

<?php
if (count($_POST)){
    $loginData = file('logs.txt');
    $accessData = array();
    foreach ($loginData as $line) {
        list($username, $password) = explode(',', $line);
        $accessData[trim($username)] = trim($password);
    }
    
    $mname = isset($_POST['mname']) ? $_POST['mname'] : '';
    $mpassword = isset($_POST['mpassword']) ? $_POST['mpassword'] : '';


    if (array_key_exists($mname, $accessData) && $mpassword == $accessData[$mname]) {

        echo "<br>Welcome, " . htmlspecialchars($_POST["mname"]) . "!";;
    } else {
        echo "<br>Неверные данные для входа";
    }
}
?>
</body>
</html>
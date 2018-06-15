<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Вход</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="background: linear-gradient(to right,#ffce85,#30d5c8);">
<?php 
include_once "bd.php";
 ?>
<form class="formlog" method="POST" action="vxod.php">
        <h1>Вход</h1>
        <label for="log-email">Логин</label>
        <input type="email" name="log-email" id="a1" required><br><br>
        <label for="pass">Пароль</label>
        <input type="password" name="pass" id="a1" required><br><br>
        <input type="submit" name="do_post" value="Вход">
</form>
<?php 
if (isset($_POST['do_post'])){
$login=$_POST['log-email'];
$pass=$_POST['pass'];

$result= mysqli_query($connect,"SELECT * FROM users WHERE email = '$login' AND password= '$pass'");
$admins=mysqli_fetch_assoc($result);
$admins=$admins['admin'];
if(mysqli_num_rows($result)!=0)
    {if($admins==0) echo "Вы успешно вошли на сайт! <a href='news.php'>Главная страница</a>";
     else echo "Вы успешно зашли как Админ.<a href='admin1.php'>Войти в админ панель</a>";
                
    }

else{echo "Вы не зарегистрированы!!!";}
}
 ?>
</body>
</html>
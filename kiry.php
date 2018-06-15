<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Кіру</title>
    <link rel="stylesheet" href="style.css">
</head>
<body >
<?php 
include_once "bd.php";
 ?>
<form class="formlog" method="POST" action="kiry.php">
        <h1>Кіру</h1>
        <label for="log-email">Логин</label>
        <input type="email" name="log-email" id="a1" required><br><br>
        <label for="pass">Құпия сөз</label>
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
    {if($admins==0) echo "Сіз сайтқа кірдіңіз! <a href='news.php'>Негізгі бет</a>"."<a href='add.php'>Туынды қосу</a><br>";
     else echo "Сіз админ ретінде кірдіңіз.<a href='admin1.php'>Админ панелге кіргу</a>";
                
    }

else{echo "Сіз тіркелмегенсіз!!!";}
}
 ?>

</body>
</html>
</body>
</html>
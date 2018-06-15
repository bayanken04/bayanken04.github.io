<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Тіркелу</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php 
include_once "bd.php";
 ?>
<h1>Тіркелу</h1>
<form class="formreg" method="POST" action="regis.php">
        <div>
           <label for="name" >Аты</label><br><br>
           <input type="text" id="a1" name="name" required><br><br>
           <label for="surname">Жөні</label><br><br>
           <input type="text" name="surname" id="a1" required><br><br>
           <label for="pass">Құпия сөз</label><br><br>
            <input type="password" name="password" id="a1" required><br><br>
           <label for="email">Почта</label><br><br>
              <input type="email" name="email" id="a1"  required><br><br>
        </div>
        <div>
          <input type="submit" name="do_post" value="Тіркелу">   
        </div>s
        
</form>
<?php 
if (isset($_POST['do_post'])){
mysqli_query($connect, "INSERT INTO users (name,surname,password,email) VALUES ('".$_POST['name']."','".$_POST['surname']."','".$_POST['password']."','".$_POST['email']."')");
echo "Сіз тіркелдіңіз! Сіз сайтқа кіре аласыз! Сәтілік!!! <a href='news.php'>Негізгі бет.</a>";
}
 ?>
</body>
</html>
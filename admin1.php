<!doctype html>
<html lang="ru">
<head>
<title>Админ-панель</title>
</head>
<body style="background: linear-gradient(to right,#ffce85,#30d5c8);">
<?php
    $host="localhost";    
    $user="root";    
    $pass="";            
    $db_name="bayan04";    
    $link=mysql_connect($host,$user,$pass);
    mysql_select_db($db_name,$link); 
    
    if (isset($_GET['del2_id'])) {
        $sql2= mysql_query('DELETE FROM `users` WHERE `id` = '.$_GET['del2_id']);
    }
?> 
Сайтқа тіркелгендердің тізімі
<table border='1'>
<tr>
    <td>Идентификатор</td>
    <td>Аты</td>
    <td>Жөні</td>
    <td>Почта</td>
    <td>Құпия сөз</td>
    <td>Админ</td>
</tr>
<?php
$sql2 = mysql_query("SELECT `id`, `name`, `surname`, `email`, `password`, `admin` FROM `users`", $link);
while ($result2 = mysql_fetch_array($sql2)) {
    echo     '<tr><td>'.$result2['id'].'</td>'.
             '<td>'.$result2['name'].'</td>'.
             '<td>'.$result2['surname'].'</td>'.
             '<td>'.$result2['email'].'</td>'.
             '<td>'.$result2['password'].'</td>'.
             '<td>'.$result2['admin'].'</td>'.
             '<td><a href="?del2_id='.$result2['id'].'">Удалить</a></td>'.
             '<td><a href="?red2_id='.$result2['id'].'">Редактировать</a></td></tr>';
}
?>
</table>

<?php
    if (isset($_GET['red2_id'])) { //Если передана переменная на редактирование
        //Достаем запсись из БД
        $sql2 = mysql_query("SELECT `id`, `name`, `surname`, `admin` FROM `users` WHERE `id`=".$_GET['red2_id'], $link);
        $result2 = mysql_fetch_array($sql2); 
        ?>
<table>
<form action="" method="post">
    <tr>
        <td>Аты:</td>
        <td><input type="text" name="name" value="<?php echo ($result2['name']); ?>"></td>
    </tr>
    <tr>
        <td>Жөні:</td>
        <td><input type="text" name="surname"  value="<?php echo ($result2['surname']); ?>"> </td>
    </tr>
     <tr>
        <td>Админ:</td>
        <td><input type="text" name="admin"  value="<?php echo ($result2['admin']); ?>"> </td>
    </tr>
    <tr>
        <td colspan="2"><input type="submit" value="OK" name="ok"></td>
    </tr>
</form>
</table>
        <?php
    }  
     include_once("connect.php");
    $id=$_GET['red2_id'];
 $result2=mysql_query(" SELECT  id,name,surname FROM users 
    WHERE id='$id' 
    ");
    $row2=mysql_fetch_assoc($result2);
    if (isset($_POST['ok']))
    {
        $name=strip_tags(trim($_POST["name"]));
        $admin=strip_tags(trim($_POST["admin"]));
        $surname=strip_tags(trim($_POST["surname"]));
        mysql_query(" UPDATE users SET name='$name',surname='$surname',admin='$admin' WHERE id='$id' ");
    }
    mysql_close(); 

?>
<form method="post">
<input type="submit" name="export" value="Экспорт"></form>
<?php
  if (isset($_POST['export'])) {
    $fh = fopen('data.txt', 'w');
    $con = mysql_connect("localhost","root","");
    mysql_select_db("bayan04", $con);

    /* insert field values into data.txt */

    $result = mysql_query("SELECT * FROM users");   
    while ($row= mysql_fetch_array($result)) {          
        $last = end($row);          
        $num = mysql_num_fields($result) ;    
        for($i = 0; $i < $num; $i++) {            
            fwrite($fh, $row[$i]);                      
            if ($row[$i] != $last)
               fwrite($fh, ", ");
        }                                                                 
        fwrite($fh, "\r\n");
    }
    fclose($fh);
}
?>
<?php
    $host="localhost";    
    $user="root";    
    $pass="";            
    $db_name="bayan04";    
    $link=mysql_connect($host,$user,$pass);
    mysql_select_db($db_name,$link); 
    
    if (isset($_GET['del1_id'])) {
        $sql1= mysql_query('DELETE FROM `news` WHERE `id` = '.$_GET['del1_id']);
    }
?> 
Список позьзователей
<table border='1'>
<tr>
    <td>Идентификатор</td>
    <td>Аты</td>
    <td>Жөні</td>
</tr>
<?php
$sql1 = mysql_query("SELECT `id`, `title`, `author` FROM `news`", $link);
while ($result1 = mysql_fetch_array($sql1)) {
    echo     '<tr><td>'.$result1['id'].'</td>'.
             '<td>'.$result1['title'].'</td>'.
             '<td>'.$result1['author'].'</td>'.
             '<td><a href="?del1_id='.$result1['id'].'">Өшіру</a></td>'.
             '<td><a href="?red1_id='.$result1['id'].'">Редактировать</a></td></tr>';
}
?>
</table>

<?php
    if (isset($_GET['red1_id'])) { //Если передана переменная на редактирование
        //Достаем запсись из БД
        $sql1 = mysql_query("SELECT `id`, `title`, `author` FROM `news` WHERE `id`=".$_GET['red1_id'], $link);
        $result1 = mysql_fetch_array($sql1); 
        ?>
<table>
<form action="" method="post">
    <tr>
        <td>Имя:</td>
        <td><input type="text" name="id" value="<?php echo ($result1['id']); ?>"></td>
    </tr>
    <tr>
        <td>Фамилия:</td>
        <td><input type="text" name="title"  value="<?php echo ($result1['title']); ?>"> </td>
    </tr>
     <tr>
        <td>Админ:</td>
        <td><input type="text" name="author"  value="<?php echo ($result1['author']); ?>"> </td>
    </tr>
    <tr>
        <td colspan="2"><input type="submit" value="OK" name="ok"></td>
    </tr>
</form>
</table>
        <?php
    }  
     include_once("connect.php");
    $id1=$_GET['red1_id'];
 $result1=mysql_query(" SELECT  id,title,author FROM news 
    WHERE id='$id1' 
    ");
    $row2=mysql_fetch_assoc($result1);
    if (isset($_POST['ok']))
    {
        $id=strip_tags(trim($_POST["id"]));
        $title=strip_tags(trim($_POST["title"]));
        $author=strip_tags(trim($_POST["author"]));
        mysql_query(" UPDATE news SET id='$id1',title='$title',author='$author' WHERE id='$id1' ");
    }
    mysql_close(); 

?>
<form method="post">
<input type="submit" name="export1" value="Экспорт"></form>
<?php
  if (isset($_POST['export1'])) {
    $fh = fopen('data.txt', 'w');
    $con = mysql_connect("localhost","root","");
    mysql_select_db("bayan04", $con);

    /* insert field values into data.txt */

    $result = mysql_query("SELECT * FROM news");   
    while ($row= mysql_fetch_array($result)) {          
        $last = end($row);          
        $num = mysql_num_fields($result) ;    
        for($i = 0; $i < $num; $i++) {            
            fwrite($fh, $row[$i]);                      
            if ($row[$i] != $last)
               fwrite($fh, "| ");
        }                                                                 
        fwrite($fh, "\r\n");
    }
    fclose($fh);
}
?>
<a href="add.php">Туынды қосу</a><br>
</body>
</html>
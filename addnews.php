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
    <td>Имя</td>
    <td>Фамилия</td>
</tr>
<?php
$sql1 = mysql_query("SELECT `id`, `title`, `author` FROM `news`", $link);
while ($result1 = mysql_fetch_array($sql1)) {
    echo     '<tr><td>'.$result1['id'].'</td>'.
             '<td>'.$result1['title'].'</td>'.
             '<td>'.$result1['author'].'</td>'.
             '<td><a href="?del1_id='.$result1['id'].'">Удалить</a></td>'.
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
<input type="submit" name="export1" value="Export"></form>
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
<!DOCTYPE html>
<html>
<head>
	<title>Туынды қосу</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body >
<form method="post" action="add.php">
	Туындының аты <br >
	<input type="text" name="title" /><br >
	Мәтінің аты <br >
	<textarea cols="40" rows="10" name="text"></textarea><br >
	Туынды автор <br >
	<input type="text" name="author" ><br >
	<input type="hidden" name="date" value="<?php echo date("Y-m-d");?>"><br>
	<input type="submit" value="Қосу" name="add">
<?php
include_once("connect.php");
if (isset($_POST["add"]))
{
$title=strip_tags(trim($_POST["title"]));
$text=strip_tags(trim($_POST["text"]));
$author=strip_tags(trim($_POST["author"]));
$date=$_POST["date"];
mysql_query("
	INSERT INTO news(title,text,date,author) 
	VALUES('$title','$text','$date','$author')
	");
mysql_close();
echo "Туынды қосылды!";
}
?>
</form>
</body>
</html>
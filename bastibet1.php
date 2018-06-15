<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body >
<?php
include_once("connect.php");
$result=mysql_query(" SELECT id,title,text,date,author FROM news 
	ORDER BY id DESC
	");
while ( $row=mysql_fetch_assoc($result)) 
	{?>
<h1><?php echo $row["title"]?></h1>
<p><?php echo $row["text"]?></p>
<p>Шығарылған күні:<?php echo $row["date"]?></p>
<p>Туындының автор:<?php echo $row["author"]?></p> 
<hr />
<?php } ?>
</body>
</html>
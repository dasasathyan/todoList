<html>
<head><link rel="stylesheet" href="css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="js/bootstrap.min.js"></script>
		<link type="text/css" rel="stylesheet" href="stylesheet.css"/>
		<title>TODO List</title></head>
<body style="background-color:#00ccff">
<?php


$dbConnect = mysql_connect("localhost", "root", "zaqwer123");
if (!$dbConnect) {
    die("Not connected : " . mysql_error());
}
//echo nl2br("Logged into \r\n MySql");

$db_selected = mysql_select_db("todo", $dbConnect);
if (!$db_selected) {
    die ("Can't use christ : " . mysql_error());
}
//echo "\nChrist Database selected\n";
$echo= mysql_query("SELECT no,todo,creation FROM todo");
while($rows=mysql_fetch_array($echo)){
  ?>
  <div class="row container">
<div class="col-md-3"></div>
    <div class="col-md-9">
  	<h1>
<?php
echo $rows['no'].". "  ;
echo $rows['todo']." was created on ";
echo $rows['creation'];
}
?></h1>
</div>
</div>

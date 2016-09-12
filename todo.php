<html>
<head><link rel="stylesheet" href="css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="js/bootstrap.min.js"></script>
		<link type="text/css" rel="stylesheet" href="stylesheet.css"/>
		<title>TODO List</title>

  </head>

<?php

$dbConnect = mysql_connect("localhost", "root", "zaqwer123");
if (!$dbConnect) {
    die("Not connected : " . mysql_error());
}
echo ("Logged into MySql");

$db_selected = mysql_select_db("todo", $dbConnect);
if (!$db_selected) {
    die ("Can't use christ : " . mysql_error());
}
echo "\nChrist Database selected\n";
if (isset($_REQUEST['sub'])){
  echo "\ngoing to add\n";
	$todo=$_REQUEST["todo"];
	mysql_query("INSERT INTO todo(todo,creation) values ('$todo',now()) ");
	?>
	<script>
	alert("data added to DB");
	document.location="echodb.php";
	</script>
	<?php
	}
?>
<body style="background-color:#00ccff">
  <div class="row">
  <form class="form-horizontal" method="post">
    <div class="form-group">
      <label for="todo" class="col-sm-4 control-label">Name</label>
    <div class="col-sm-4">
    <input type="text" name="todo" class="form-control" placeholder="Enter what do you want to do"/>
  </div>
</div></div>
<div class="row">
<div class="col-md-4"></div>
<div class="col-md-4">
<input class="btn btn-default" type="submit" name ="sub" value="Create a to-do list" >
</div>
</div>
</body>

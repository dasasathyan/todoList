<html>
<head><link rel="stylesheet" href="css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="js/bootstrap.min.js"></script>
		<link type="text/css" rel="stylesheet" href="stylesheet.css"/>
		<title>TODO List</title>
<style>
.create{
	display: none;
}
.complete{
	display: none;
}
</style>
  </head>
	<script src="jquery.js"></script>
  <script>
  $(document).ready(function(){
    $(".createButton").click(function(){
  		$(".create").toggle(0);
			return false;
  	});
		$(".removeButton").click(function(){
  		$(".complete").toggle(00);
			return false;
  	});
  });
  </script>
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
if (isset($_REQUEST['add'])){
  echo "\ngoing to add\n";
	$todo=$_REQUEST["todo"];
	mysql_query("INSERT INTO todo(todo,creation) values ('$todo',now()) ");
	?>
	<script>
	alert("data added to DB");
	document.location="list.php";
	</script>
	<?php
	}
?>
<body style="background-color:#00ccff">
  <div class="row">
  <form class="form-horizontal" method="post">
    <div class="form-group">
      <label for="todo" class="col-sm-4 control-label">What do you want to do?</label>
    <p><div class="col-sm-4">
			<input class="btn btn-default createButton" type="submit" name ="add" value="Create a to-do list" >
		</div>
		<div class="col-sm-4">
			<input class="btn btn-default removeButton" type="submit" name ="finish" value="Complete a to-do" >
  </div></p>
</div></div>
<form method="post">
<div class="row create">
<div class="col-md-4"></div>
<div class="col-md-4">
	<input type="text" name="todo" class="form-control" placeholder="Create a to do list"/>
<input class="btn btn-default" type="submit" name ="add" value="Create a to-do list" >

</div>
</div>
</form>
<!--<form>
<div class="row complete">
	<div class="col-md-4"></div>
<div class="col-md-4">
	<input class="btn btn-default" type="submit" name ="finish" value="Create a to-do list" >
</div>
</div>
</form>-->

<?php
$echo= mysql_query("SELECT no,todo,creation FROM todo");
while($rows=mysql_fetch_array($echo)){
  ?>
	<p>
<?php
echo $rows['no'].". "  ;
echo $rows['todo']." was created on ";
echo $rows['creation'];
$check=$rows['no'];
if(isset($_REQUEST[$check])){
	echo "checkbox ". $check;
	mysql_query("UPDATE todo SET completed=now() WHERE no=$check");
}
?>
<form method="post">
<input type="checkbox" class="complete" name="<?php echo $check;?>" />
<?php
}
?>
</p>
<input class="btn btn-default complete" type="submit" name ="sub" value="Completed" >
</form>

</body>

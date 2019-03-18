<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1, shrink-to-fit=no">
  <meta name="theme-color" content="#18BC9C">
  <link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css"/>
	<title>View Entries | IRAPL</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <a class="navbar-brand" href="./index.php">IRAPL</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="./index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./add.html">Add Client</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="./view.php">View</a>
          </li>
        </ul>
      </div>
    </nav>
<?php

$server = "localhost";
$user = "root";
$pass = "";
$db = "IRAPL";

$conn = new mysqli($server,$user,$pass,$db);
if($conn) echo "<script>console.log('Connection to Database Successful!')</script>";

echo "<br><br><div class='container'>";
$sql = "DELETE FROM `feedback` WHERE `id` = ".$_POST['array_id'].";";
if (mysqli_query($conn, $sql)) {
    echo '<div class="alert alert-success"> 
<strong>Deletion Successful!</strong></div><br>';
} else {
    echo "<div class='alert alert-dismissible alert-warning'>
<button type='button' class='close' data-dismiss='alert'>&times;</button>
Error deleting record: ".mysqli_error($conn)."</div><br>";
}
echo "<br><a class='btn btn-success' href='view.php'> Go Back</a>";

/* Reset the numbering in ID after an entry being deleted */

$count = 0;
$sql  = "ALTER TABLE feedback AUTO_INCREMENT = 1";
$result = mysqli_query($conn,$sql);
$sql = "SELECT * FROM feedback";
$result = mysqli_query($conn,$sql);
$array = mysqli_fetch_all($result,MYSQLI_ASSOC);
foreach($array as $arr) {
  $count++;
  if($count != $arr["id"]) {
    $sql = "UPDATE `feedback` SET `id` = '".$count."' WHERE `feedback`.`id` = ".$arr["id"];
    mysqli_query($conn,$sql);
  }
}
if(mysqli_query($conn,$sql)) echo "<script>console.log('ID Reset Successful!')</script>";
else echo '<script>console.log("'.mysqli_error($conn).'")</script>';

/* Reset the numbering in ID after an entry being deleted */

mysqli_close($conn);
?> 
</body>
</html>

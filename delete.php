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
    echo '<div class="alert alert-dismissible alert-success">
<button type="button" class="close" data-dismiss="alert">&times;</button>
<strong>Deletion Successful!</strong></div><br>';
} else {
    echo '<div class="alert alert-dismissible alert-warning">
<button type="button" class="close" data-dismiss="alert">&times;</button>
Error deleting record: '.mysqli_error($conn).'</div><br>';
}
echo "<br><a class='btn btn-success' href='view.php'> Go Back</a>";
mysqli_close($conn);
?> 
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>

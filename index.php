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
            <ul class="navbar-nav mr-auto ">
            <li class="nav-item active">
                <a class="nav-link" href="./index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./add.html">Add Client</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="./view.php">View</a>
            </li>
            </ul>
        </div>
    </nav>
    <div class="jumbotron" style="background-color: #fff;border-radius: 0;color: white;">
        <center><img src="./logo.png" width="300px" ></center>
        <div class="container">
            <form method="get" action="index.php">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="org_name" placeholder="Organization Name" style="border: 1px solid black;color: black;text-align: center; " aria-label="Organization Name" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary btn-success" type="submit" style="border: 1px solid green;color: white;" id="button-addon2">Go &#x27A4;</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

<?php

$server = "localhost";
$user = "root";
$pass = "";
$db = "IRAPL";

$conn = new mysqli($server,$user,$pass,$db);
if($conn) echo "<script>console.log('Connection to Database Successful!')</script>";

@$org_name = $_GET['org_name'];

$sql  = "select id,org_name from feedback where org_name like '%".$org_name."%'";

$result = $conn->query($sql);

$array = mysqli_fetch_all($result,MYSQLI_ASSOC);
echo "<div class='container'>";
foreach($array as $arr) {
    echo "<div class='alert alert-info'>".$arr["id"]." - ".$arr["org_name"]."</div>";
}
echo "</div>";  

?>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1, shrink-to-fit=no">
  <meta name="theme-color" content="#18BC9C">
  <link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css"/>
	<title>Generated List | IRAPL</title>
</head>
<body>

<?php

$server = "localhost";
$user = "root";
$pass = "";
$db = "IRAPL";

$conn = new mysqli($server,$user,$pass,$db);
if($conn) echo "<script>console.log('Connection to Database Successful!')</script>";

$category =  $_GET['category'];

$sql  = "select org_name,salutation,name,designation,mobile from feedback where org_category = '".$category."'";

$result = $conn->query($sql);

$array = mysqli_fetch_all($result,MYSQLI_ASSOC);
echo "<table class='table table-hover'>
<thead>
  <tr>
    <th scope='col'>S.No</th>
    <th scope='col'>Organization Name</th>
    <th scope='col'>Contact Person</th>
    <th scope='col'>Designation</th>
    <th scope='col'>Mobile</th>
  </tr>
</thead><tbody>";
$count = 1;
foreach($array as $arr) {
    echo "<tr><td>".$count++.
    "</td><td>".$arr["org_name"].
    "</td><td>".$arr["salutation"].$arr["name"].
    "</td><td>".$arr["designation"].
    "</td><td>".$arr["mobile"]."</td></tr>";
}
echo "</tbody></table>";  
mysqli_close($conn);
?>


    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>
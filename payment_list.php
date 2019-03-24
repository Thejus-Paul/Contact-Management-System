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

$payment_type =  $_GET['payment_type'];

$sql  = "select * from feedback where payment_type = '".$payment_type."'";

$result = $conn->query($sql);

$array = mysqli_fetch_all($result,MYSQLI_ASSOC);
echo "<hr><center><h3>".$payment_type." Payments</h3></center><hr><br>";
echo "<table class='table table-hover'>
<thead>";

$count = 1;

switch ($payment_type) {
    case 'No':
    {
        echo "<tr>
        <th scope='col'>S.No</th>
        <th scope='col'>Organization ID</th>
        <th scope='col'>Organization Name</th>
        </tr></thead><tbody>";
        foreach($array as $arr) {
            echo "<tr><td>".$count++.
            "</td><td>".$arr["id"].
            "</td><td>".$arr["org_name"]."</td></tr>";
        }
    }break;
    
    case 'Full':
    {
        echo "<tr>
            <th scope='col'>S.No</th>
            <th scope='col'>Organization ID</th>
            <th scope='col'>Organization Name</th>
            <th scope='col'>Total Cash Paid</th>
        </tr>
        </thead><tbody>";
        foreach($array as $arr) {
            echo "<tr><td>".$count++.
            "</td><td>".$arr["id"].
            "</td><td>".$arr["org_name"].
            "</td><td>&#8377; ".$arr["total_cash"].
            "</td></tr>";
        }
    }break;

    case 'Advanced':
    {
        echo "<tr>
            <th scope='col'>S.No</th>
            <th scope='col'>Organization ID</th>
            <th scope='col'>Organization Name</th>
            <th scope='col'>Total Cash</th>
            <th scope='col'>Cash Paid</th>
            <th scope='col'>Balance Payment</th>
        </tr>
        </thead><tbody>";
        foreach($array as $arr) {
            echo "<tr><td>".$count++.
            "</td><td>".$arr["id"].
            "</td><td>".$arr["org_name"].
            "</td><td>&#8377; ".$arr["total_cash"].
            "</td><td>&#8377; ".$arr["adv_cash_paid"].
            "</td><td>&#8377; ".$arr["pending_pay"].
            "</td></tr>";
        }
    }break;
}
echo "</tbody></table>";
mysqli_close($conn);
?>


</body>
</html>
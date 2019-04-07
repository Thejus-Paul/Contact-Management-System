<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1, shrink-to-fit=no">
  <meta name="theme-color" content="#18BC9C">
  <link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css"/>
  <title>Generated List | IRAPL</title>
  <style>
  .close {
      text-decoration: none;
      color: black;
      opacity: 1;
      margin-top: -45px;
      margin-right: 25px;
  }
  .close:hover{
      color: #128f76;
  }
  </style>  
</head>
<body style="background-color: #2C3E50;">
<br><br>
<?php

$server = "localhost";
$user = "root";
$pass = "";
$db = "IRAPL";

$conn = new mysqli($server,$user,$pass,$db);
if($conn) echo "<script>console.log('Connection to Database Successful!')</script>";

$id =  $_GET['id'];

$sql  = "select * from feedback where id = ".$id;

$result = $conn->query($sql);

$array = mysqli_fetch_all($result,MYSQLI_ASSOC);
foreach($array as $arr) {
echo '<div class="container" style="background-color: #fff;box-shadow: 0px 1px 10px rgba(0,0,0,0.4);border-radius: 10px;"><br>'.
'<h2 class="text-center">'.$arr["org_name"].'</h2><a class="close" href="index.php">&#x2716;</a><hr>'
.'<label><strong>Organisation Category &nbsp;:&nbsp;</strong></label>'.@$arr["org_category"].
'<br><label><strong>Organisation Name &nbsp;:&nbsp;</strong></label>'.@$arr["org_name"].
'<br><label><strong>State &nbsp;:&nbsp;</strong></label>'.@$arr["state"].
'<br><label><strong>Address &nbsp;:&nbsp;</strong></label>'.@$arr["address"].
'<br><label><strong>Pincode &nbsp;:&nbsp;</strong></label>'.@$arr["pincode"].
'<br><label><strong>Website &nbsp;:&nbsp;</strong></label><a href="http://'.$arr["website"].'">'.@$arr["website"].
'</a><br><label><strong>Organisation Email &nbsp;:&nbsp;</strong></label>'.@$arr["org_email"];
echo '<hr><h5><strong>Contact Details</strong></h5><hr>'.
'<label><strong>Name &nbsp;:&nbsp;</strong></label>'.@$arr["salutation"].@$arr["name"].
', <em>'.@$arr["designation"].
'</em><br><label><strong>Mobile &nbsp;:&nbsp;</strong></label>'.@$arr["mobile"];
if(@$arr["email"] != ' ' || @$arr["email"] != '') echo '<br><label><strong>Email &nbsp;:&nbsp;</strong></label>'.@$arr["email"];
if(@$arr["landline"] != 0) echo '<br><label><strong>Landline &nbsp;:&nbsp;</strong></label>'.@$arr["landline"];
if(@$arr["fax"] != 0) echo '<br><label><strong>Fax &nbsp;:&nbsp;</strong></label>'.@$arr["fax"];
if(@$arr["remarks"] != ' ') echo '<br><label><strong>Remarks &nbsp;:&nbsp;</strong></label>'.@$arr["remarks"];
echo "<hr><h5><strong>Payment Details</strong></h5><hr>";
if(@$arr["total_cash"] != 0) echo '<label><strong>Total Cash &nbsp;:&nbsp;</strong></label>'.@$arr["total_cash"].'<br>';
echo '<label><strong>Payment Type &nbsp;:&nbsp;</strong></label>'.@$arr["payment_type"];
if(@$arr["payment_type"]=="Full") if(@$arr["date_of_full_pay"] != "0000-00-00") echo '<br><label><strong>Date of Full Payment &nbsp;:&nbsp;</strong></label>'.@$arr["date_of_full_pay"];
if(@$arr["payment_type"]=="Advanced") if(@$arr["date_of_adv_pay"] != "0000-00-00") echo '<br><label><strong>Date of Advance Payment &nbsp;:&nbsp;</strong></label>'.@$arr["date_of_adv_pay"];
if(@$arr["payment_type"]=="Advanced") if(@$arr["adv_cash_paid"] != 0) echo '<br><label><strong>Advanced Cash Paid &nbsp;:&nbsp;</strong></label>'.@$arr["adv_cash_paid"];
if(@$arr["payment_type"]=="Advanced") if(@$arr["pending_pay"] != 0) echo '<br><label><strong>Pending Payment &nbsp;:&nbsp;</strong></label>'.@$arr["pending_pay"];
'</div>';
}
mysqli_close($conn);
?>
</div><br><br>
</body>
</html>
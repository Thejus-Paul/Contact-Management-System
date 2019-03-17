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


$sql = "SELECT * FROM feedback";
$result = $conn->query($sql);

@$option = $_GET['option'];

$arr = mysqli_fetch_all($result,MYSQLI_ASSOC);

echo "<br><div class='container'><h1> Client Details </h1><br><form method='get' action='view.php'><select class='form-control' name='option' size='10' multiple>";
$count = 0;
foreach($arr as $result) { 
    echo '<option value='.$count.'>'.$result["id"].'. '.$result["org_name"].'</option>';
    $count++;
}

echo "</select><br><input class='btn btn-info' type='submit' value='SELECT'></form><br>";
@$array_id = $arr[$option]['id'];
echo '<form method="post" action="delete.php"><input type="hidden" name="array_id" value='.$array_id.'><button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">VIEW</button>
<input type="submit" class="btn btn-danger" value="DELETE"></form>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title">'.@$arr[$option]["org_name"].'</h4>
        <button type="button" class="close " data-dismiss="modal">&times;</button>

      </div>
      <div class="modal-body">'
        .'<label><strong>Organisation Category &nbsp;:&nbsp;</strong></label>'.@$arr[$option]["org_category"].
        '<br><label><strong>Organisation Name &nbsp;:&nbsp;</strong></label>'.@$arr[$option]["org_name"].
        '<br><label><strong>State &nbsp;:&nbsp;</strong></label>'.@$arr[$option]["state"].
        '<br><label><strong>Address &nbsp;:&nbsp;</strong></label>'.@$arr[$option]["address"].
        '<br><label><strong>Pincode &nbsp;:&nbsp;</strong></label>'.@$arr[$option]["pincode"].
        '<br><label><strong>Website &nbsp;:&nbsp;</strong></label>'.@$arr[$option]["website"].
        '<br><label><strong>Organisation Email &nbsp;:&nbsp;</strong></label>'.@$arr[$option]["org_email"].
        '<hr><h5>Contact Details</h5><hr>'.
        '<label><strong>Name &nbsp;:&nbsp;</strong></label>'.@$arr[$option]["salutation"].@$arr[$option]["name"].
        ', <em>'.@$arr[$option]["designation"].
        '</em><br><label><strong>Mobile &nbsp;:&nbsp;</strong></label>'.@$arr[$option]["mobile"].
        '<br><label><strong>Email &nbsp;:&nbsp;</strong></label>'.@$arr[$option]["email"].
        '<br><label><strong>Landline &nbsp;:&nbsp;</strong></label>'.@$arr[$option]["landline"].
        '<br><label><strong>Fax &nbsp;:&nbsp;</strong></label>'.@$arr[$option]["fax"].
        '<br><label><strong>Remarks &nbsp;:&nbsp;</strong></label>'.@$arr[$option]["remarks"].
        '<hr><h5>Payment Details</h5><hr><label><strong>Total Cash &nbsp;:&nbsp;</strong></label>'.@$arr[$option]["total_cash"].
        '<br><label><strong>Payment Type &nbsp;:&nbsp;</strong></label>'.@$arr[$option]["payment_type"].
        '<br><label><strong>Date of Full Payment &nbsp;:&nbsp;</strong></label>'.@$arr[$option]["date_of_full_pay"].
        '<br><label><strong>Date of Advance Payment &nbsp;:&nbsp;</strong></label>'.@$arr[$option]["date_of_adv_pay"].
        '<br><label><strong>Advanced Cash Paid &nbsp;:&nbsp;</strong></label>'.@$arr[$option]["adv_cash_paid"].
        '<br><label><strong>Pending Payment &nbsp;:&nbsp;</strong></label>'.@$arr[$option]["pending_pay"].
      '</div>
    </div>

  </div>
</div>
</div>';
$conn->close();
?>
<br><br><br>  
<footer class="footer mt-auto py-4 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; IRAPL 2019</p>
    </div>
</footer>
 
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>

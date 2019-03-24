<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1, shrink-to-fit=no">
  <meta name="theme-color" content="#18BC9C">
  <link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css"/>
	<title>IRAPL | Client Management System</title>
    <style>
    form{
        margin-top:-6px !important;
        margin-right: 5px !important;
    }
    .alert-info{
        background-color: #2C3E50;
    }

    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="./index.php">IRAPL | <strong>Client Management System</strong> </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto ">
                <li class="nav-item active" >
                    <a class="nav-link"  href="./index.php">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./add.html">ADD</a>
                </li>

                <li class="nav-item">
                    <a data-toggle="modal" class="nav-link modal-category" href="#cat-report">CATEGORY REPORT</a>
                </li>
                <li class="nav-item">
                    <a data-toggle="modal" class="nav-link modal-category" href="#payment-report">PAYMENTS</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="jumbotron" style="border-radius: 0;color: white;">
        <center><img src="./IRAPL.svg" width="200px" ></center><br><br>
        <div class="container">
            <form method="get" action="index.php">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="org_name" placeholder="Enter Org.Name/ID to lookup an organization" style="border: 1px solid black;color: black;text-align: center; " aria-label="Organization Name" aria-describedby="button-addon2">
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

$sql  = "select id,org_name from feedback where org_name like '%".$org_name."%' or id like '".$org_name."' order by org_name asc";

$result = $conn->query($sql);

$array = mysqli_fetch_all($result,MYSQLI_ASSOC);
echo "<div class='container'>";
$count = 1;
foreach($array as $arr) {
    echo "<div class='alert alert-info'>".$count++." - ".$arr["org_name"]."
    <form class='float-right' style='display: inline;' method='post' action='delete.php'>
    <input type='hidden' name='array_id' value='".$arr["id"]."'>
    <input class='btn btn-danger' type='submit' value='Delete'></form>
    <form class='float-right' style='display: inline;' method='get' action='view_details.php'>
    <input type='hidden' name='id' value='".$arr["id"]."'>
    <input class='btn btn-success' type='submit' value='View'></form></div>";
}
echo "</div>";  

?>

<div class="modal category" id="cat-report" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  	<div class="modal-dialog modal-dialog-centered" role="document">
   		 <div class="modal-content ">
      		<div class="modal-header">
       		 <h5 class="modal-title" id="cat-report">Category Report</h5>
       		 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         		 <span aria-hidden="true">&times;</span>
            </button>
            </div>

    <div class="modal-body col-xs-10">
        <p>Which catergory's report do you want to generate?.</p>
        <form method="get" action="category_list.php">
            <select name='category' class='form-control text-center'>
<?php 
$sql  = "select distinct org_category from feedback";
$result = $conn->query($sql);
$array = mysqli_fetch_all($result,MYSQLI_ASSOC);

foreach($array as $arr) echo "<option value='".$arr["org_category"]."'>".$arr["org_category"]."</option>";

mysqli_close($conn);
?>
            </select><br>
            <center><input type="submit" class="btn btn-success" value="Generate Category Report"/></center>
        </form>
    		</div>
          </div>
</div>
</div>  

<!-- Modal (PAYMENT)-->
<div class="modal category" id="payment-report" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  	<div class="modal-dialog modal-dialog-centered" role="document">
   		 <div class="modal-content ">
      		<div class="modal-header">
       		 <h5 class="modal-title" id="cat-report">Payments</h5>
       		 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         		 <span aria-hidden="true">&times;</span>
        	</button>

     	</div>

    <div class="modal-body col-xs-10">
        <p>Which payments do you want to view?</p>
        <form class="form-inline" method="get" action="payment_list.php">
            <div class="custom-control custom-radio">
                <input name="payment_type" id="No" class="custom-control-input" value="No" type="radio" checked>
                <label class="custom-control-label" for="No"> No Payment </label>
            </div> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <div class="custom-control custom-radio">
            <input name="payment_type" id="Full" class="custom-control-input" value="Full" type="radio">
            <label class="custom-control-label" for="Full"> Full Payment </label>
          </div> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <div class="custom-control custom-radio">
            <input name="payment_type" id="Adv" class="custom-control-input" value="Advanced" type="radio">
            <label class="custom-control-label" for="Adv"> Advanced Payment </label></div><br><br>
            <div class="block" style="display: block;width: 100%">
                <center><button type="submit" class="btn btn-success">View Payments</button></center>
            </div>
        </form>

    		</div>
      	</div>
  	</div>
</div>


<!-- Footer -->
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
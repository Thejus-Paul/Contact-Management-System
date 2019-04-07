<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1, shrink-to-fit=no">
  <meta name="theme-color" content="#18BC9C">
  <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan" rel="stylesheet">
  <link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css"/>
  <title>Add Entry | IRAPL</title>
  <style>
  .form-control{color:black;}
  .company-details,.contact-details,.payment-details {
    background: silver;
    padding: 50px;
  }
  h2{
    font-family: 'Baloo Chettan', cursive;
  }
  label{
    font-weight: bold;
  }
  .btn-next {
    float: right;
  }
  </style>
</head>

<body style="background-color #eee;"> 
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="./index.php">IRAPL | <strong>Client Management System</strong></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
        <a class="nav-link" href="index.php">HOME</a>
        </li>

        <li class="nav-item active">
        <a class="nav-link" href="add.html">ADD</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container">

  <?php

$server = "localhost";
$user = "root";
$pass = "";
$db = "IRAPL";

$conn = new mysqli($server,$user,$pass,$db);
if($conn) echo "<script>console.log('Connection to Database Successful!')</script>";

@$id = $_GET["id"];

$sql  = "select * from feedback where id=".$id;

$result = $conn->query($sql);

$array = mysqli_fetch_all($result,MYSQLI_ASSOC);

$count = 1;

foreach($array as $arr) {
  echo '<form method="POST" action="modify_action.php?id='.$id.'"><br>
        <div class="company-details">
        <h2> Company Information</h2><br>
  
        <!-- Organization Category -->
        <label>Organization Category  </label>
        <input list="org_category" value="'.$arr["org_category"].'" class="form-control" name="org_category">
        <datalist id="org_category">
          <option value="Corporate/Companies/BE">Corporate/Companies/BE</option>
          <option value="Educational Institution">Educational Institution</option>
          <option value="Hospitals">Hospitals</option>
          <option value="NGO">NGO</option>
          <option value="Study Abroad">Study Abroad</option>
        </datalist><br>

        <!-- Organization Name -->
        <label>Name of Organization  <input type="text" value="'.$arr["org_name"].'" class="form-control" name="org_name" size="200"></label><br>

        <!--State-->
    
        <label>State</label>
        <input list="state" class="form-control" value="'.$arr["state"].'" name="state">
        <datalist id="state">
          <option value="Andhra Pradesh">Andhra Pradesh</option>
          <option value="Arunachal Pradesh">Arunachal Pradesh</option>
          <option value="Assam">Assam</option>
          <option value="Bihar">Bihar</option>
          <option value="Chattisgarh">Chattisgarh</option>
          <option value="Goa">Goa</option>
          <option value="Gujarat">Gujarat</option>
          <option value="Haryana">Haryana</option>
          <option value="Himachal Pradesh">Himachal Pradesh</option>
          <option value="Jammu and Kashmir">Jammu and Kashmir</option>
          <option value="Jharkhand">Jharkhand</option>
          <option value="Karnataka">Karnataka</option>
          <option value="Kerala">Kerala</option>
          <option value="Madhya Pradesh">Madhya Pradesh</option>
          <option value="Maharashtra">Maharashtra</option>
          <option value="Manipur">Manipur</option>
          <option value="Meghalaya">Meghalaya</option>
          <option value="Mizoram">Mizoram</option>
          <option value="Nagaland">Nagaland</option>
          <option value="Odisha">Odisha</option>
          <option value="Punjab">Punjab</option>
          <option value="Rajasthan">Rajasthan</option>
          <option value="Sikkim">Sikkim</option>
          <option value="Tamil Nadu">Tamil Nadu</option>
          <option value="Telangana">Telangana</option>
          <option value="Tripura">Tripura</option>
          <option value="Uttar Pradesh">Uttar Pradesh</option>
          <option value="Utarakhand">Utarakhand</option>
          <option value="West Bengal">West Bengal</option>
          <option value="Andaman and Nicobar Islands (UT)">Andaman and Nicobar Islands (UT)</option>
          <option value="Chandigarh (UT)">Chandigarh (UT)</option>
          <option value="Dadar and Nagar Haveli (UT)">Dadar and Nagar Haveli (UT)</option>
          <option value="Damman and Diu (UT)">Damman and Diu (UT)</option>
          <option value="Delhi (UT)">Delhi (UT)</option>
          <option value="Lakshadweep (UT)">Lakshadweep (UT)</option>
          <option value="Pondicherry (UT)">Pondicherry (UT)</option>
        </datalist><br>

        <!-- Address -->
        <label>Address  <textarea class="form-control" value="'.$arr["address"].'" name="address" cols="200"> </textarea></label><br>

        <!--Pincode-->
        <label>Pincode  <input type="number" class="form-control" value="'.$arr["pincode"].'" name="pincode" maxlength="12" max="999999999999" min="0"></label><br>

        <!--Website-->
        <label>Website  <input type="text" value="'.$arr["website"].'" size="60" class="form-control website" name="website"></label>

        <!--Email--> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label>Email  <input type="email" value="'.$arr["org_email"].'" size="50" class="form-control" name="org_email"></label><br>

        <button type="button" class="btn btn-back btn-primary">Back</button>
        <button type="button" class="btn btn-next btn-info">Next</button>
      </div>
      
      <div class="contact-details">
        <h2> Contact Information </h2><br>
        
        <!--Salutation-->
       
        <label for="salutation">Salutation  </label>
        <input list="salutation" class="form-control" value="'.$arr["salutation"].'" name="salutation">
        <datalist id="salutation">
          <option value="Mr.">Mr.</option>
          <option value="Ms.">Ms.</option>
          <option value="Shri.">Shri.</option>
          <option value="Smt.">Smt.</option>
          <option value="Prof.">Prof.</option>
          <option value="Dr.">Dr.</option>
        </datalist><br>

        <!--Contact Person-Name-->
        <label>Name  <input type="name" value="'.$arr["name"].'" size="200" class="form-control" name="name"></label><br>

        <!--Designation-->
        <label>Designation  <input type="text" value="'.$arr["designation"].'" size="200" class="form-control" name="designation"></label><br>

        <!--Mobile-->
        <label>Mobile  <input type="number" value="'.$arr["mobile"].'" class="form-control" name="mobile"></label>

        <!--Landline-1--> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label>Landline  <input type="number" value="'.$arr["landline"].'" class="form-control" name="landline"></label>

        <!--Fax--> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
        <label>Fax  <input type="number" value="'.$arr["fax"].'" class="form-control" name="fax"></label><br>

        <!--Email-1-->
        <label>Email  <input type="email" value="'.$arr["email"].'" size="200" class="form-control" name="email"></label><br> 

        <!--Remarks-->
        <label>Remarks  <textarea value="'.$arr["remarks"].'" class="form-control" cols="200" name="remarks"> </textarea></label><br>
        
        <button class="btn btn-back btn-primary" type="button" class="btn-back">Back</button>
        <button class="btn btn-next btn-info" type="button" class="btn-next">Next</button>
      </div>

      <div class="payment-details">
        <h2> Payment Information</h2><br>
        

        <label>Payment Type </label>
        <div class="form-group form-inline">
            <div class="custom-control custom-radio">';
            if($arr["payment_type"] == "No") {
                echo '<input name="payment_type" id="No" class="custom-control-input" value="No" type="radio" checked>
                <label class="custom-control-label" for="No"> No Payment </label>';
            } else {
              echo '<input name="payment_type" id="No" class="custom-control-input" value="No" type="radio">
              <label class="custom-control-label" for="No"> No Payment </label>';
            }
              
            echo '</div> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <div class="custom-control custom-radio">';
          if($arr["payment_type"] == "Full") {
            echo '<input name="payment_type" id="Full" class="custom-control-input" value="Full" type="radio" checked>
            <label class="custom-control-label" for="Full"> Full Payment </label>';
          }else {
            echo '<input name="payment_type" id="Full" class="custom-control-input" value="Full" type="radio">
            <label class="custom-control-label" for="Full"> Full Payment </label>';
          }
          echo'</div> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <div class="custom-control custom-radio">';
          if($arr["payment_type"] == "Adv") {
            echo '<input name="payment_type" id="Adv" class="custom-control-input" value="Advanced" type="radio" checked>
            <label class="custom-control-label" for="Adv"> Advance Payment </label>';
          } else {
            echo '<input name="payment_type" id="Adv" class="custom-control-input" value="Advanced" type="radio">
            <label class="custom-control-label" for="Adv"> Advance Payment </label>';
          }
          echo '</div>
        </div><br>

        <!--Cash Payment(Total)-->
        <div class="total-cash">
        <label>Total Cash  </label>
        <div class="input-group ">
          <div class="input-group-prepend">
            <span class="input-group-text">&#x20B9;</span>
          </div>
          <input type="number" value="'.$arr["total_cash"].'" class="form-control" name="total_cash">
        </div><br>
        </div>


        <div class="full-pay">
          <!--Date of Payment(Full Cash)-->
          <label>Date of Full Payment   <input type="date" value="'.$arr["date_of_full_pay"].'" class="form-control" name="date_of_full_pay"></label><br>
        </div>

        
        <div class="adv-pay">

          <!--Cash Paid in Advance-->
          <div class="total-cash">
              <label>Advance Cash Paid  </label>
              <div class="input-group ">
                <div class="input-group-prepend">
                  <span class="input-group-text">&#x20B9;</span>
                </div>
                <input type="number" value="0" class="form-control" name="adv_cash_paid">
              </div><br>
          </div>

          <!--Date of Payment(Advance Cash)-->
          <label>Date of Advance Payment   <input type="date" value="0001-01-01" class="form-control" name="date_of_adv_pay"></label><br>


          <!--Pending Payment
          <label>Pending Payment   <input type="number" value="0"   class="form-control" name="pending_pay"></label><br><br>
          -->
        </div>';

      }
?>        
        
        <button class="btn btn-back btn-primary" type="button" class="btn-back">Back</button>
        <button class="btn btn-next btn-info" type="button" class="btn-next">Next</button>

      </div><br>
        <input type="submit" class="btn btn-block btn-success" value="SUBMIT"><br>
    </form>
  </div>
  <footer class="footer mt-auto py-4 bg-dark">
      <div class="container">
          <p class="m-0 text-center text-white">Copyright &copy; IRAPL 2019</p>
      </div>
  </footer>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function(){
      // Initial Conditions 
      $('.contact-details').hide();
      $('.payment-details').hide();
      $('.btn-success').hide();
      $('.btn-back').hide();
      $('.adv-pay').hide();
      $('.total-cash').hide();
      $('.full-pay').hide();
      $count = 0;

      $('.website').click(function(){
        $('.website')[0].defaultValue = '';
      })

      $('.btn-next').click(function(){
        $('.btn-back').show();
        if($count<2 && $count>=0)$count++;
        switch ($count) {
          case 0:{
            $('.company-details').show();
            $('.contact-details').hide();
            $('.payment-details').hide();
          }break;
          case 1: {
            $('.company-details').hide();
            $('.contact-details').show();
            $('.payment-details').hide();
          }break;
          case 2: {
            $('.company-details').hide();
            $('.contact-details').hide();
            $('.payment-details').show();
            $('.btn-success').show();
            $('.btn-next').hide();
          }break;
          default:
            break;
        }
      })
      $('.btn-back').click(function(){
        if($count<=3 && $count>0) $count--;
        else {$count = 0; $(this).hide();}
        switch ($count) {
          case 0:{
            $('.btn-back').hide();
            $('.company-details').show();
            $('.contact-details').hide();
            $('.payment-details').hide();
          }break;
          case 1: {
            $('.company-details').hide();
            $('.contact-details').show();
            $('.payment-details').hide();
            $('.btn-next').show();
          }break;
          case 2: {
            $('.company-details').hide();
            $('.contact-details').hide();
            $('.payment-details').show();
          }break;
          default:
            break;
        }
      })
      $("#No").click(function() {
        $('.adv-pay').hide();
        $('.full-pay').hide();
        $('.total-cash').hide();
        document.getElementsByName('date_of_full_pay')[0].defaultValue = "0001-01-01";
        document.getElementsByName('date_of_adv_pay')[0].defaultValue = "0001-01-01";
      })

      $("#Full").click(function(){
        $('.adv-pay').hide();
        $('.full-pay').show();
        $('.total-cash').show();
        document.getElementsByName('date_of_adv_pay')[0].defaultValue = "0001-01-01";
      })

      $("#Adv").click(function(){
        $('.adv-pay').show();
        $('.full-pay').hide();
        $('.total-cash').show();
        document.getElementsByName('date_of_full_pay')[0].defaultValue = "0001-01-01";
      })
 
    })
  </script>
</body>
</html>
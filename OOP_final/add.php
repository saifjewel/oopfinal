<?php 

session_start();

if (isset($_COOKIE['user']) && isset($_COOKIE['pass'])) {
    $name = $_COOKIE['user'];
    $pass = $_COOKIE['pass'];
  }

if (!isset($_SESSION['login_success'])) {
  $uri .= "/OOP_final";        
  header('Location: '.$uri.'/login.php'); // redirect to the login page if data not match. 
}
  
  $fname = $lname = $mail = $city = $state = $zip = $phoneNo ="";       // variable.

  if ($_SERVER ["REQUEST_METHOD"] == "POST") {

  $fname = test_input($_POST["firstname"]);
 
  if (empty($fname)) {
    $_SESSION['error'] ="Firstname field is empty.";
  }
  else{
    $_SESSION['firstnameApprove']=1;
  } 

  $lname = test_input($_POST["lastname"]);
  
  if (empty($lname)) {
    $_SESSION['error'] ="Lastname field is empty.";
  }
  else{
    $_SESSION['lastnameApprove']=1;
  } 

  $mail = test_input($_POST["mail"]);
  
  if (empty($mail)) {
    $_SESSION['error'] ="Mail field is empty.";
  }
  else{
    $_SESSION['mailApprove']=1;
  } 


  $city = test_input($_POST["city"]);
  
  if (empty($city)) {
    $_SESSION['error'] ="City field is empty.";
  }
  else{
    $_SESSION['cityApprove']=1;
  } 


  $state = test_input($_POST["state"]);
  
  if (empty($state)) {
    $_SESSION['error'] ="State field is empty.";
  }
  else{
    $_SESSION['stateApprove']=1;
  } 

  $zip = test_input($_POST["zip"]);
  
  if (empty($zip)) {
    $_SESSION['error'] ="Zip field is empty.";
  }
  else{
    $_SESSION['zipApprove']=1;
  } 


  $phoneNo = test_input($_POST["phone"]);
  
  if (empty($phoneNo)) {
    $_SESSION['error'] ="Phone No field is empty.";
  }
  else{
    $_SESSION['phoneNoApprove']=1;
  } 


  }


  function test_input($data){
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

    if (!isset($_SESSION['submit']) && isset($_SESSION['firstnameApprove'])==1 && isset($_SESSION['lastnameApprove'])==1 && isset($_SESSION['mailApprove'])==1 && isset($_SESSION['cityApprove'])==1 && isset($_SESSION['stateApprove'])==1 && isset($_SESSION['zipApprove'])==1 && isset($_SESSION['phoneNoApprove'])==1) {
      // remove all session variables
   unset($_SESSION['firstnameApprove'],$_SESSION['lastnameApprove'],$_SESSION['mailApprove'],$_SESSION['cityApprove'],$_SESSION['stateApprove'],$_SESSION['zipApprove'],$_SESSION['phoneNoApprove']);

    
    $servername = "localhost";
    $username = "root";
    $passw = "";
    $dbname = "addressBook";    // database name.
    $conn = new mysqli($servername, $username, $passw, $dbname);  // connect to the database.

    if ($conn->connect_error ) {
        die("Connection failed: " . $conn->connect_error );   // database connection problem or failed.
    } 

    $sql = "INSERT INTO `tb_info`(`id`, `firstname`, `lastname`, `email`, `city`, `state`, `zip`, `phoneNo`, `added_at`) VALUES (Null, '$fname','$lname','$mail','$city','$state','$zip','$phoneNo',CURRENT_TIMESTAMP)"; //sql query.

    if ($conn->query($sql) == TRUE) {     // successfully connected to the database.
        $_SESSION['success'] = "Contact added successfully.";
    } 
    else {
      $_SESSION['error']  = "Error!! , contact can't add."; // if not connect with database, it will show the _SESSION['error']  message.
    }
    
    $conn->close(); // close database connection.
    }

?>
<!doctype html>
<html lang="en">
  <head>
    <title>AddressBook</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <style>
       a{
      text-decoration: none;
    }
    a:hover{
      text-decoration: none;
    }
    </style>
  </head>
  <body>
  <ul class="nav justify-content-end navbar navbar-dark bg-dark">
<div class="container"><a href="index.php"><h2 style="color: #fff;">Address Book System</h2></a>
 
    <a  href="#" ></a></h2>
 
  <li class="nav-item">
    <a class="nav-link" href="#"></a>
  </li>
  <li class="nav-item">
    <a href="contact.php">Show Contact</a>
  </li>
  <li class="nav-item">
    <a  href="logout.php">Logout</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" href="#"></a>
  </li>
</ul>
  
  
  <form class="container" id="needs-validation" method="POST" novalidate>
    <?php 
      if (isset($_SESSION['success'])) {
        ?>
        <div class="alert alert-success">
          <?php echo $_SESSION['success']; 
          unset($_SESSION['success']);
          ?>
        </div>
        <?php
      }
      if (isset($_SESSION['error'] )) {
       ?>

       <div class="alert alert-danger">
         <?php echo $_SESSION['error']; 
         unset($_SESSION['error']);

         ?>

       </div>

       <?php
      }
     ?>
  <div >
    <div class="col-md-6 mb-3">
      <label for="validationCustom01">First name</label>
      <input type="text" class="form-control" id="validationCustom01" name="firstname" placeholder="Enter First name" value=" " required>
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationCustom02">Last name</label>
      <input type="text" class="form-control" id="validationCustom02" name="lastname" placeholder="Enter Last name" value=" " required>
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationCustom02">Email</label>
      <input type="email" class="form-control" id="validationCustom02" name="mail" placeholder="Enter Email" value=" " required>
    </div>
  </div>
  <div >
    <div class="col-md-6 mb-3">
      <label for="validationCustom03">City</label>
      <input type="text" class="form-control" id="validationCustom03" name="city" placeholder="Please Enter City...." value="" required>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationCustom04">State</label>
	   <select class="form-control" id="state" name="state" required>
	            <option value="Dhaka">Dhaka</option>
	            <option value="Noakhali">Noakhali</option>
	            <option value="Chittagong">Chittagong</option>
	            <option value="KL">Khulna</option>
	            <option value="RP">Rongpur</option>
	            <option value="SL">Sylhet</option>
	            <option value="BR">Borishal</option>
    			    <option value="AL">Alabama</option>
    			    <option value="AK">Alaska</option>
    			    <option value="AZ">Arizona</option>
    			    <option value="AR">Arkansas</option>
    			    <option value="CA">California</option>
    			    <option value="CO">Colorado</option>
    			    <option value="CT">Connecticut</option>
    			    <option value="DE">Delaware</option>
    			    <option value="FL">Florida</option>
    			    <option value="GA">Georgia</option>
    			    <option value="HI">Hawaii</option>
    			    <option value="ID">Idaho        </option>
    			    <option value="IL">Illinois     </option>
    			    <option value="IN">Indiana      </option>
    			    <option value="IA">Iowa         </option>
    			    <option value="KS">Kansas       </option>
    			    <option value="KY">Kentucky     </option>
    			    <option value="LA">Louisiann    </option>
    			    <option value="ME">Maine        </option>
    			    <option value="MD">Maryland     </option>
    			    <option value="MA">Massachusetts</option>
    			    <option value="MI">Michigan</option>
    			    <option value="MN">Minnesota</option>
    			    <option value="MS">Mississippi</option>
    			    <option value="MO">Missouri</option>
    			    <option value="MT">Montana</option>
    			    <option value="NE">Nebraska</option>
    			    <option value="NV">Nevada</option>
    			    <option value="NH">New Hampshire</option>
    			    <option value="NJ">New Jersey</option>
    			    <option value="NM">New Mexico</option>
    			    <option value="NY">New York</option>
    			    <option value="NC">North Carolina</option>
    			    <option value="ND">North Dakota</option>
    			    <option value="OH">Ohio</option>
    			    <option value="OK">Oklahoma</option>
    			    <option value="OR">Oregon</option>
    			    <option value="PA">Pennsylvania </option>
    			    <option value="RI">Rhode Island</option>
    			    <option value="SC">South Carolina</option>
    			    <option value="SD">South Dakota</option>
    			    <option value="TN">Tennessee</option>
    			    <option value="TX">Texas</option>
    			    <option value="UT">Utah</option>
    			    <option value="VT">Vermont</option>
    			    <option value="VA">Verginia</option>
    			    <option value="WA">Washington</option>
    			    <option value="WV">West Virginia</option>
    			    <option value="WI">Wisconsin</option>
    			    <option value="WA">Washington</option>
    			    <option value="WV">West Virginia</option>
    			    <option value="WI">Wisconsin</option>
    			    <option value="WA">Washington</option>
    			    <option value="WV">West Virginia</option>
    			    <option value="WI">Wisconsin</option>
    			    <option value="WY">Wyoming</option>
				
			</select>	
		
	 
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationCustom05">Zip</label>
      <input type="int" class="form-control" id="validationCustom05" name="zip" placeholder="Please Enter Zip...." value="" required>
	  </div>
	  <div class="col-md-3 mb-3">
      <label for="validationCustom05">Phone</label>
      <input type="text" class="form-control" id="validationCustom05" name="phone" placeholder="Please Enter Phone Number...." value="" required>
    </div>
  </div>
  <button class="btn btn-primary" type="submit">Submit</button>
</form>

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';

  window.addEventListener('load', function() {
    var form = document.getElementById('needs-validation');
    form.addEventListener('submit', function(event) {
      if (form.checkValidity() === false) {
        event.preventDefault();
        event.stopPropagation();
      }
      form.classList.add('was-validated');
    }, false);
  }, false);
})();
</script>
  


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>
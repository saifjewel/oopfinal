<?php 
  session_start();
  
  $name = $pass = $error ="";       // variable.

  if (isset($_COOKIE['user']) && isset($_COOKIE['pass'])) {
    $name = $_COOKIE['user'];
    $pass = $_COOKIE['pass'];
  }
  if (isset($_SESSION['login_success'])) {
    $uri .= "/OOP_final";        
    header('Location: '.$uri.'/index.php'); // redirect to the another page if data match. 
  }


  if ($_SERVER ["REQUEST_METHOD"] == "POST") {

  $name = test_input($_POST["username"]);
  if (!preg_match("/^[a-zA-Z0-9]*$/", $name)) {
    $error ="Only letters and numbers are allowed";
  }
  else{
    if (empty($name)) {
      $error="Username field is empty.";
    }
    else{
      $_SESSION['usernameApprove']=1;
    } 
  }


  $pass = $_POST["password"];
  $pass = stripslashes( $pass );
  if (empty($pass)) {
    $error="Password field is empty.";
  }
  else{
      if (preg_match('/^[0-9]*$/', $pass)) {
        
        $en_pass = $pass;
        $_SESSION['passApprove']= 1;
      }
      else{
        $error ="Incorrect input !";
      }    
  }
  }


  function test_input($data){
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

    if (!isset($_SESSION['submit']) && isset($_SESSION['usernameApprove'])==1 && isset($_SESSION['passApprove'])==1) {
      // remove all session variables
    session_unset();

    // destroy the session 
    session_destroy();
    session_start();

    
    $servername = "localhost";
    $username = "root";
    $passw = "";
    $dbname = "addressBook";    // database name.
    $error= "";
    $conn = new mysqli($servername, $username, $passw, $dbname);  // connect to the database.

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);   // database connection problem or failed.
    } 

    $sql = "SELECT `username`, `password` FROM `users` WHERE `username`='$name'  AND `password`= '$en_pass'"; //sql query.
    $result= $conn ->query($sql);
    if ($conn->query($sql) == TRUE) {     // successfully connected to the database.
        if ($result-> num_rows >0) {    // checking data row.if true than num_rows > 0.

          setcookie('user',$name,time()+(86400*10),"","", 0); //this piece of code are newly added.
          setcookie('pass',$en_pass,time()+(86400*10),"","", 0); //this piece of code are newly added. also,if block.

          $_SESSION['user'] = $name;

          $_SESSION['login_success']='yes';

          $uri .= "/OOP_final";        
          header('Location: '.$uri.'/add.php'); // redirect to the another page if data match. 
          exit;
          $_SESSION['submit'] = $_POST['submit'];
        } 
        else {
          $error= "Username or Password is incorrect."; // if username & password is not found in database show this error message.
        }

    } 
    else {
      $error = "Incorrect input in username or password field !"; // if not connect with database, it will show the error message.
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
  .container{text-align:center;}
  .maincontainer{cursor:pointer;}

    a{
      text-decoration: none;
    }
    a:hover{
      text-decoration: none;
    }

    #tt{
      font-size: 20px;
      text-align: center;
      font-family: "Times New Roman", Times, Baskerville, Georgia, serif;
      color: white;
    }
    #fm{
      background:white;
      margin: 0 auto;
      width: 450px;
      padding: 25px;
      background: rgba(3, 40, 109, 0.45);
      border-radius:5px;
    }
    #ps{
      
    }
    #lbp{
      margin-top: 9px;
      margin-left: 43%;
      border: 1px solid white;
    }
    #pst{
      margin-left: 26%;
    }
    #ca{
      color:rgb(207, 255, 255);
      font-size: 16px;
    }
    #emsg{
      margin-left: 22%;
      color: red;
    }
    #bgcl{
      background-color: rgba(113, 113, 113, 0.29);
    }
    #fpst{
      margin-top: 6%;
    }
    #tgf{
      text-align: center;
      font-family: cursive;
    }
  </style>
 </head>
  <body>
  
   
 
<ul class="nav justify-content-end navbar navbar-dark bg-dark">
<div class="container"> <a href="index.php"><h2 style="color: #fff;">Address Book System</h2></a>
 
    <a  href="#" ></a></h2>
 
  <li class="nav-item">
    <a class="nav-link" href="#"></a>
  </li>
  <li class="nav-item">
    <a  href=" ">Login</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" href="#"></a>
  </li>
</ul>
  
<div class="row">
    <div class="col-sm-12 col-md-12" id="ps">
      <br><br><br>
      <form action="" method="post" id="fm">
        <div class="col-md-12">
          <p id="tt">LOGIN</p>
        </div>
        <span id="emsg"><?php echo $error; ?></span>
        <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></span>
            <input id="username" type="text" class="form-control" name="username" value="<?php echo $name;?>" placeholder="Username" required>
          </div>

          <br>

          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></span>
            <input id="password" type="password" class="form-control" name="password" value="<?php echo $pass;?>" placeholder="Password" required>
          </div>
          
        <button type="submit" class="btn btn-primary btn-md" id="lbp">Login</button>
  
      </form>
    </div>
</div>
  


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>
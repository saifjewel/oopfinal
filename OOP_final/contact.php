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

  
  <table class="table table-striped">  

  <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>City</th>
        <th>State</th>
        <th>Zip Code</th>
        <th>Phone Number</th>
        <th>Added at</th>
      </tr>
  </thead>  
    <?php
    $check = "no";
    $conn = new PDO('mysql:host=localhost; dbname=addressbook','root', '');
    $result = $conn->prepare("SELECT * FROM `tb_info` ORDER BY `id`");
    $result->execute();
      
    for($i=0; $row = $result->fetch(); $i++)
    {
      $check = "yes";
      ?>
      <tr>
        <td><?php echo $row['firstname']; ?></td>
        <td><?php echo $row['lastname']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['city']; ?></td>
        <td><?php echo $row['state']; ?></td>
        <td><?php echo $row['zip']; ?></td>
        <td><?php echo $row['phoneNo']; ?></td>
        <td><?php echo $row['added_at']; ?></td>
      </tr>
      <?php
    
    }
  
    ?>
    <?php if($check == "no"){
    echo '<tr style="text-align: center;"><h3><font color ="green">No Contact to display.<a href=add.php>Add Contact</a></h3></tr>';
    } ?>
    
  </table>
 </div> 

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
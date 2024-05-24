<?php
  include("conn.php");

  $con=new connec();

  if(!isset($_SESSION)) 
  { 
    session_start(); 
  } 

  if (isset($_GET["action"]) && $_GET["action"] == "logout") {
    session_unset(); 
    session_destroy(); 
    header("Location: index.php"); 
    exit; 
}

  if(empty($_SESSION["username"]))
  {
    $_SESSION["ul"]='<li class="nav-item"> <a class="nav-link"  data-toggle="modal" data-target="#modelId">Register</a></li><li class="nav-item"><a class="nav-link" data-toggle="modal" data-target="#modelId1">Login</a></li>';
  }

  if(isset($_POST["btn_login"]))
  {
    $email=$_POST["log_email"];
    $password=$_POST["log_password"];
    $result=$con->select_login("customer", $email);

    if($result->num_rows>0)
    {
      $row=$result->fetch_assoc();
      if($row["email"]==$email && $row["password"]==$password)
      {
        $_SESSION["username"]=$email;
        $_SESSION["firstname"]=$row["first_name"];
        $_SESSION["lastname"]=$row["last_name"];
        $_SESSION["customer_id"]=$row["customer_id"];
        $_SESSION["ul"]='<li class="nav-item"> <a class="nav-link"> Hello '. $_SESSION["username"].'</a></li> <li class="nav-item"> <a class="nav-link" href="index.php?action=logout">Logout</a></li>';
      }
      else
      {
        echo '<script> alert("Invalid password.")</script>';
      }
    }
  else{
    echo '<script> alert("Invalid email.")</script>';
  }
  }

  if(isset($_POST["btn_register"]))
  {
    $first_name = $_POST["reg_first_name"];
    $last_name =  $_POST["reg_last_name"];
    $email =  $_POST["regemail"];
    $ph_no =  $_POST["regph_no"];
    $password =  $_POST["regpassword"];
    $password_confirm =  $_POST["regpassword_confirm"];

    if($password==$password_confirm){
      $sql="insert into customer values(0,'$first_name','$last_name','$email','$ph_no','$password')";

      $con->insert($sql, "Registered Successfully!");

    }
    else
    {
      echo "Please check your password.";
    }
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <title>Flight Booking System</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    

</head>
<body>
    
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Flight Booking System</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="index.php">Home</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="flights.php"></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#"></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"></a>
        </li>
      </ul>



      <div class="d-flex">
        <button type="button" class="btn btn-primary btn-dark me-lg-3 me-3" data-bs-toggle="modal" data-bs-target="#loginModal">
         Login
        </button>
        <button type="button" class="btn btn-primary btn-dark" data-bs-toggle="modal" data-bs-target="#registerModal">
         Register
        </button>
        <button type="button" class="btn btn-primary btn-dark me-lg-2 ml-4 me-3">
        <a class="nav-link ml-0 mr-0" style="color: white;" href="index.php?action=logout">Logout</a>
        </button>
        
      </div>


      <!-- <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
    </div>
  </div>
</nav>  


<!--Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
          User Login
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label class="form-label" >Email address</label>
          <input type="email" id="email" name="log_email" class="form-control" >
        </div>
        <div class="mb-3">
          <label class="form-label" >Password</label>
          <input type="password" name="log_password" class="form-control" >
        </div>
        <div>
          <button type="submit" name="btn_login" class="btn btn-dark shadow-none mr-0">LOGIN</button>

        </div>
        
      </div>

      </form>
      
    </div>
  </div>
</div>

<!--Register Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form method="post">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
          User Registration
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="container-fluid">

        <div class="row">
          <div class="col-md-6">
            <label class="form-label">First Name</label>
            <input type="text" name="reg_first_name" class="form-control" >
          </div>

          <div class="col-md-6">
            <label class="form-label">Last Name</label>
            <input type="text" name="reg_last_name" class="form-control" >
          </div>

          <div class="col-md-6">
            <label class="form-label" >Email address</label>
            <input type="email" name="regemail" class="form-control" >
          </div>

          <div class="col-md-6">
            <label class="form-label">Phone Number</label>
            <input type="number" name="regph_no" class="form-control" >
          </div>

          <div class="col-md-6">
            <label class="form-label" >Password</label>
            <input type="password" name="regpassword" class="form-control" >
          </div>

          <div class="col-md-6">
            <label class="form-label">Confirm Password</label>
            <input type="password" name="regpassword_confirm" class="form-control" >
          </div>

        </div>

        <div class="text-center my-3">
          <button type="submit" name="btn_register" class="btn btn-dark shadow-none">REGISTER</button>
        </div>
        <div>
          <p>Already have an account? <a data-toggle="modal" data-target="#loginModal" data-bs-dismiss="modal" aria-label="Close" data-dismiss="modal">Log In</a></p>
        </div>

      </div>        
      </div>
      </form>
      
    </div>
  </div>
</div>
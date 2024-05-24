<?php
    include("../conn.php");
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


    <title>Admin Dashboard</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    

</head>
<body>
    
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Admin Dashboard</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="view_bookings.php">Bookings</a>
        </li>

        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="view_flights.php">Flights</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="view_airlines.php">Airlines</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="view_customers.php">Customers</a>
        </li>
        
        <!-- <li class="nav-item">
          <a class="nav-link" href="f#">Airlines</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#">Customers</a>
        </li>
 -->
      </ul>



      <div class="d-flex">
        <button type="button" class="btn btn-primary btn-dark me-lg-2 ml-4 me-3">
        <a class="nav-link ml-0 mr-0" style="color: white;" href="../admin/index.php?action=logout">Logout</a>
        </button>
        
      </div>
    </div>
  </div>
</nav>  

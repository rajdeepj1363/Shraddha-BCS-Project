<?php
    include 'dbms/dbh.inc.php';
    session_start();
    $sql = "SELECT * FROM results WHERE email ='".$_SESSION['EMAIL']."'";
    $result = $conn->query($sql);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results</title>
    <!-- Bootstrap CSS Link CDN -->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

</head>
<body>

<!-- Bootstrap Navigation Bar Code -->
<section id="navigation">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">SMS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="dashboard.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="information.php">Information</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Others
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="viewAttendance.php">View Attendance</a></li>
            <li><a class="dropdown-item" href="viewResult.php">View Result</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="PaytmKit/pay.php">Pay Fees</a></li>
            <li><a class="dropdown-item" href="#">Extra Curricular</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact Us</a>
        </li>
      </ul>
      
    </div>
  </div>
</nav>
</section>

<section id="result">
<div>
	<h2>RESULTS</h2>
</div>
	<table class="table">
  <thead>
    <tr>
      <th scope="col">Sr.No</th>
      <th scope="col">Name</th>
      <th scope="col">Exam Name</th>
      <th scope="col">Date Uploaded</th>
      <th scope="col">Result</th>
    </tr>
  </thead>
  <tbody>
   <?php 
    $counter = 1;
    
    while($row = $result->fetch_assoc())
    {  
        echo "<tr><th scope='col'>".$counter."</th>";
        echo "<th scope='col'>".$row['name']."</th>";
        echo "<th scope='col'>".$row['exam']."</th>";
        echo "<th scope='col'>".$row['date']."</th>";
        echo "<th scope='col'><a href='admission/documents/results/".$row['result']."'>View</a></th></tr>";
        $counter= $counter + 1;  
    }
   ?>
  </tbody>
</table>
</section>




    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</html>
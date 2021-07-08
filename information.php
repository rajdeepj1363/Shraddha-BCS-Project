<?php
  include "dbms/dbh.inc.php";
  session_start();
  if($_SESSION['EMAIL'] == null)
  {
    header("Location:index.php");
  }
  $emailID = $_SESSION['EMAIL'];
  $sql = "SELECT * FROM studentinfo WHERE (email = '".$_SESSION['EMAIL']."')";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
 
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- bootstrap link file-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
   <link href="css/styles.css" rel="stylesheet">
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
            <li><a class="dropdown-item" href="#">News</a></li>
            <li><a class="dropdown-item" href="events.php">Institute Events</a></li>
            <li><hr class="dropdown-divider"></li>
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
    <div class="basicinfo">
        <div class="selfinfo">
            <h5>NAME: <?php echo $row["fname"] ." ".$row["middleName"]." ".$row["lname"] ?></h5>
            <h5>ADDRESS: <?php echo $row["address"] ?></h5>
            <h5>PHONE NO: <?php echo $row["phone"] ?></h5>
            <h5>DOB: <?php echo $row["dob"] ?></h5>
            <h5>AADHAR NO: </h5> 
</div>
<hr>
    <div class="parentinfo">
        <h5>FATHER'S NAME: <?php echo $row["fatherName"] ?></h5>
        <h6>OCCUPATION: <?php echo $row["fOccupation"] ?></h6>
        <h5>MOTHER'S NAME: <?php echo $row["motherName"] ?></h5>
        <h6>OCCUPATION: <?php echo $row["mOccupation"] ?></h6>
        <h5>ADDRESS: <?php echo $row["parentAddress"] ?></h5>
        <h5>PHONE NO: <?php echo $row["parentPhone"] ?></h5>
</div>
<hr>
    <div class="collegeinfo">
        <h5>PRN: <?php echo $row["PRN"] ?></h5>
        <h5>COURSE/YEAR/DIV: <?php echo $row["COURSE"]." ".$row["STD_YEAR"]." ".$row["DIVISION"] ?></h5>
        <h5>CURRENT ROLL NO: <?php echo $row["ROLLNO"] ?></h5>
</div>
</div>

<div id="footer">
  <div class="row">
    <div class="col-4">
    <div class="footerinfo">
      <h2>CONTACT US</h2>
      <h4>Address:</h4>
      <p>Vivekanand College Nagala Park Kolhapur,416012</p>
      <h4>Contact No:<a class="contactinfo" href="tel:+917066309797">7066309797</a></h4>
      <h4>Email:<a class="contactinfo" href="mailto:shraddhapatil10dec@gmail.com">shraddhapatil10dec@gmail.com</a></h4>
</div>
    </div>
    <div class="col-4">
    <div class="footerinfo">
      <h2>QUICK LINKS</h2>
      <ul>
        <li><a href="dashboard.php">HOME</a></li>
        <li><a href="information.php">INFORMATION</a></li>
        <li><a href="events.php">EVENTS</a></li>
        <li><a href="results.php">RESULTS</a></li>
</ul>

</div>
    </div>
    <div class="col-4">
    <h3>name</h3>
    </div>
  </div>
</div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</html>

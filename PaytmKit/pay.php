<?php
  header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");
  
  include "../dbms/dbh.inc.php";
  session_start();
  if($_SESSION['EMAIL'] == null)
  {
    header("Location:index.php");
  }
  $emailID = $_SESSION['EMAIL'];
  $sql = "SELECT * FROM feepayment WHERE CUSTID = '".$emailID."' AND PAID = 'NO'";
  $result = $conn->query($sql);
  

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>College Fee Payment Section</title>
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

    <h1>PENDING FEE PAYMENTS</h1>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Sr No</th>
      <th scope="col">Fee Detail</th>
      <th scope="col">Fee Amount</th>
      <th scope="col">Link</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $counter = 1;
    
    while($row = $result->fetch_assoc())
    {
      echo "<tr>";
      echo "<th scope='row'>".$counter."</th>";
      echo "<td>".$row['FEE_NAME']."</td>";
      echo "<td>".$row['FEE_AMT']."</td>";
      echo "<td>
            <form action='TxnTest.php' method='post'>
            <input name='fee_name' value='".$row['FEE_NAME']."' hidden>
            <input name='fee_amt' value='".$row['FEE_AMT']."' hidden>
            <input name='custid' value='".$row['CUSTID']."' hidden>
            <input name='custname' value='".$row['CUSTNAME']."' hidden>
            <button class='btn btn-primary' name='paymentBtn'>Pay Now</button>
            </form>
            ";
      echo "</tr>";
      $counter++;
    }
    ?>
  </tbody>
</table>


  </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  <script>

  </script>
</html>

<?php

  include "../dbms/dbh.inc.php";
  session_start();
  if($_SESSION['EMAIL'] == null)
  {
    header("Location:index.php");
  }
  $emailID = $_SESSION['EMAIL'];
  $sql = "SELECT * FROM feepayment WHERE CUSTID = '".$emailID."'";
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
      echo "<td>Link</td>";
      echo "</tr>";
      $counter++;
    }
    ?>
  </tbody>
</table>


  </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</html>

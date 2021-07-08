<?php
session_start();
include 'dbms/dbh.inc.php';
if($_SESSION['ADMIN_UNAME'] == null)
  {
    header("Location:adminLogin.php");
  }
  $USER="";
  $email = "";
  if($_POST){
      $USER=$_POST['user'];
      echo $USER;
  }
  
  if(isset($_POST['editInfo_searchBtn']))
    {
        $USER=$_POST['user'];
        $email=$_POST['email'];
        if($USER == "teacher"){
          $sql="SELECT * FROM teachers WHERE uname='".$email."'";
          $result=$conn->query($sql) or die($conn->error);
        }
        if($USER == "student"){
            $sql="SELECT * FROM studentInfo WHERE email='".$email."'";
            $result=$conn->query($sql) or die($conn->error);
        }
      
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 <form action="" method="post">
 <input type="text" name="user" value=<?php echo $USER ?> hidden>
 <input type="text" name="email" placeholder="enter your email" required>
 <button name="editInfo_searchBtn">search</button>
 </form>  
 <div id="searchedInfo">
 <form action="dbms/validateUser.php" method="post">
    <input type="text" name="user" value=<?php echo $USER ?> hidden>
    
 <table>

 <?php
 if(isset($_POST['editInfo_searchBtn']))
 {
  while($USER=="student" && $row=$result->fetch_assoc())
  {
    
    echo "<tr><th>Name</th><td><input name='name' value='".$row["name"]."'></td></tr>";
    echo "<tr><th>Address</th><td><input name='address' value='".$row["address"]."'></td></tr>";
    echo "<tr><th>Phone</th><td><input name='phone' value='".$row["phone"]."'></td></tr>";
    echo "<tr><th>Email</th><td><input name='email' value='".$row["email"]."'></td></tr>";
    echo "<tr><th>DOB</th><td><input name='dob' value='".$row["dob"]."'></td></tr>";
    echo "<tr><th>Father Name</th><td><input name='fatherName' value='".$row["fatherName"]."'></td></tr>";
    echo "<tr><th>Father Occupation</th><td><input name='fOccupation' value='".$row["fOccupation"]."'></td></tr>";
    echo "<tr><th>Mother Name</th><td><input name='motherName' value='".$row["motherName"]."'></td></tr>";
    echo "<tr><th>Mother Occupation</th><td><input name='mOccupation' value='".$row["mOccupation"]."'></td></tr>";
    echo "<tr><th>Parent Address</th><td><input name='parentADD' value='".$row["parentADD"]."'></td></tr>";
    echo "<tr><th>Parent's Phone</th><td><input name='parentPHONE' value='".$row["parentPHONE"]."'></td></tr>";
    echo "<tr><th>PRN</th><td><input name='PRN' value='".$row["PRN"]."'></td></tr>";
    echo "<tr><th>Current Roll No</th><td><input name='ROLLNO' value='".$row["ROLLNO"]."'></td></tr>";
    echo "<tr><th>Course</th><td><input name='COURSE' value='".$row["COURSE"]."'></td></tr>";
    echo "<tr><th>Current Year</th><td><input name='STD_YEAR' value='".$row["STD_YEAR"]."'></td></tr>";
    echo "<tr><th>Current Division</th><td><input name='DIVISION' value='".$row["DIVISION"]."'></td></tr>";
    echo "</table>";
    echo "<button type='submit' name='editInfoBtn'>Submit</button>";
  }
  
  while($USER=="teacher" && $row=$result->fetch_assoc())
  {
    echo "<input type='text' name='oldEmail' value='".$row["uname"]."' hidden>";
    echo "<tr><th>Name</th><td><input name='name' value='".$row["name"]."'></td></tr>";
    echo "<tr><th>Address</th><td><input name='address' value='".$row["address"]."'></td></tr>";
    echo "<tr><th>Phone</th><td><input name='mobile' value='".$row["mobile"]."'></td></tr>";
    echo "<tr><th>Email</th><td><input name='uname' value='".$row["uname"]."'></td></tr>";
    echo "<tr><th>DOB</th><td><input name='dob' value='".$row["dob"]."'></td></tr>";
    echo "<tr><th>Qualification</th><td><input name='qualification' value='".$row["qualification"]."'></td></tr>";
    echo "<tr><th>Designation</th><td><input name='designation' value='".$row["designation"]."'></td></tr>";
    echo "<tr><th>Class Teacher</th><td><input name='classTeacher' value='".$row["classTeacher"]."'></td></tr>";
    echo "<tr><th>Teaching Divisions</th><td><input name='teachingDivisions' value='".$row["teachingDivisions"]."'></td></tr>";
    echo "<tr><th>Teaching Subjects</th><td><input name='teachingSubjects' value='".$row["teachingSubjects"]."'></td></tr>";
    echo "</table>";
    echo "<button type='submit' name='editInfoBtn'>Submit</button>";
  }

}
 
 ?>

 </form>
 </div> 
</body>
</html>
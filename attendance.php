<?php
    session_start();
    
    if($_SESSION['USER'] != "teacher")
    {
        header("Location:index.php?unauthorizedUser");
    }
    include "dbms/dbh.inc.php";
    if(isset($_POST['getClass']))
    {
            $course = $_POST['course_name'];
            $year = $_POST['year'];
            $division = $_POST['division'];
            $sql = "SELECT * FROM studentinfo WHERE COURSE='$course' AND STD_YEAR = '$year' AND DIVISION = '$division'";
            $result = $conn->query($sql);
            $rownumber=mysqli_num_rows($result);
            if($rownumber == 0)
            {
                echo "No valid data found";
            }
         
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance</title>
    <!-- Bootstrap Link -->
    <link href="css/styles.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    
</head>
<style>
    #afterSearch{
        display:none;
    }
</style>
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
          <a class="nav-link active" aria-current="page" href="dashboardTeacher.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="information.php">Information</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="attendance.php">Upload Attendance</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="result.php">Upload Result</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact Us</a>
        </li>
      </ul>
      
    </div>
  </div>
</nav>
</section>

    <div id="attendanceMain">
    <form  method="post">
            <div id="beforeSearch">
            <label for="">COURSE</label><br>
            <select name="course_name">
                <option value="">--select--</option>
                <option value="BCS">BCS</option>
            </select><br>
            <label for="">YEAR</label><br>
            <select name="year" >
                <option value="">--select--</option>
                <option value="FY">FY</option>
                <option value="SY">SY</option>
                <option value="TY">TY</option>
            </select><br>
            <label for="">DIVISION</label><br>
            <select name="division" id="">
                <option value="">--select--</option>
                <option value="A">A</option>
                <option value="B">B</option>
            </select><br>
            <button name="getClass" type="submit" class="searchBtn" >SEARCH</button>
            </div>
            

            <div id="afterSearch">
            <label>STUDENT LIST</label><br>
            <select name="student_name">
                <option value="">--select--</option>
                <?php
                    while(isset($_POST['getClass']) && $row=$result->fetch_assoc())
                    {
                        echo '<option value=
                        "'.$row['email'].'">'.$row['fname']." ".$row['middleName']." ".$row['lname'].'</option>';
                                                
                    }
                ?>
            </select><br>
            
            <label for="" >TOTAL LECTURES</label><br>
            <input type="text" name="totalLectures"><br>
            <label for="" >ATTENDED LECTURES</label><br>
            <input type="text" name="attendedLectures"><br>
    
            <button name="insertAttendance" type="button" id="insertBtn">INSERT ATTENDANCE</button>

            </div>
           
        </form>
        <?php
        if(isset($_POST['getClass']))
        {
            echo "<script type='text/javascript'>document.querySelector('#beforeSearch').style.display='none';</script>";

            echo "<script type='text/javascript'>document.querySelector('#afterSearch').style.display='block';</script>";
        }
        
            ?>

    </div>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script type="text/javascript">
    var insertBtn = document.querySelector("#insertBtn");
    var form = document.querySelector("#attendanceMain form");
    insertBtn.addEventListener("click",function(){
        form.action="dbms/validateUser.php";
        console.log(form.action);
        console.log(insertBtn);
        insertBtn.type="submit";
        insertBtn.submit();
    });
</script>
</html>

        
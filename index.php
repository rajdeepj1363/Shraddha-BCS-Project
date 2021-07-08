<?php
    include "dbms/dbh.inc.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Login form</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">


</head>
<body>
    <div id="backbtnDiv_Login">
        <a href="college.php"><img class="backBtn_Login" src="images/back_arrow.png" alt="Back button to College Main site" width="100px" height="50px"></a>
    </div>
    
    <div class="loginbox">
        <form class="loginform" action="dbms/validateUser.php" method="post">
        <div class="row">
                <div class="col-6 LoginTab">
                    <div ><button id="student" type="button">STUDENT</button></div>
                </div>
                <div class="col-6 LoginTab">
                    <div ><button id="teacher" type="button">TEACHER</button></div>
                </div>
            </div>
            <input type="text" placeholder="enter your username" name="username" required><br>
            <input type="password" placeholder="enter password" name="pwd" required><br>
            <input type="text" name="student_teacher" value="student" hidden>
            <button name="dashboardSubmit">login</button><br>
            <a href="https://www.google.com">forgot password?</a>
        </form>
    </div> 
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script type="text/javascript">
    if(document.querySelector("input[name=student_teacher").value==="student")
    {
        $("#student").css("background-color","grey");
        $("#teacher").css("background-color","white");
    }
    if(document.querySelector("input[name=student_teacher").value==="teacher"){
        $("#teacher").css("background-color","grey");
        $("#student").css("background-color","white");
       
    }
    document.querySelector("#student").addEventListener("click",function(){
        console.log("Student activated");
        document.querySelector("input[name=student_teacher").value="student";
        console.log(document.querySelector("input[name=student_teacher").value);
        $("#student").css("background-color","grey");
        $("#teacher").css("background-color","white");
    });
    document.querySelector("#teacher").addEventListener("click",function(){
        console.log("Teacher activated");
        document.querySelector("input[name=student_teacher").value="teacher";
        console.log(document.querySelector("input[name=student_teacher").value);
        $("#teacher").css("background-color","grey");
        $("#student").css("background-color","white");
       
    });
</script>
</html>
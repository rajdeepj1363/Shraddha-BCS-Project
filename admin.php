<?php  

  session_start();
  if($_SESSION['ADMIN_UNAME'] == null)
  {
    header("Location:adminLogin.php");
  }
  include "dbms/dbh.inc.php";
 
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap Link -->
    <link href="css/styles.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    
    <title>Admin Dashboard</title>
</head>
<style>
    .cursor-class:hover{
        cursor:pointer;
    }
    #admissionVerify{
        position:absolute;
        top:42%;
        left:38vw;
        padding:50px;
        border-style:solid;
        border-width:3px;
    }
    .close_box,.close_box2{
        position:absolute;
        top:5%;
        right:2%;
    }
    #insertTeacher,#deletionBox{
      	background-color:#fff;
        position:absolute;
        top:50%;
        left:50%;
        -ms-transform: translateX(-50%) translateY(-50%);
   	    -webkit-transform: translate(-50%,-50%);
   	    transform: translate(-50%,-50%);
        padding:50px;
        border-style:solid;
        border-width:3px;
        z-index:9999;
    }
    #insertTeacher input{
    	margin:5px auto;
    }
    #closeDelBox{
    position:absolute;
        top:5%;
        right:2%;
    }
    .editBtn{
      border-style:none;
      border-width:0;
      background-color:#fff;
    }
</style>
<body>

  <form id="admissionVerify" action="dbms/validateUser.php" method="post" style="display:none">
    <button class="close_box" type="button">X</button>
    <input type="text" placeholder="Enter candidate's Email" name="candidate_email" required>
    <button name="verifyCandidate">CHECK</button>
  </form>


  <form id="insertTeacher" action="dbms/validateUser.php" method="post" style="display:none">
    <button class="close_box2" type="button">X</button>
    <div class="row">
    	<div class="col-6">
    	<input type="text" placeholder="Enter Name" name="teacher_name" required><br>
   		 <input type="text" placeholder="Enter Mobile" name="teacher_mobile" required><br>
    	</div>
    	<div class="col-6">
    	 <input type="text" placeholder="Enter Email" name="teacher_email" required><br>
    <input type="text" placeholder="Enter Address" name="teacher_address" required><br>
    	</div>
    	<div class="col-6">
    	<label>Date of Birth</label><br>
    	<input type="date" placeholder="Enter Date of Birth" name="teacher_dob" required><br>
    	<input type="text" placeholder="Enter Qualification" name="teacher_qualification" required><br>
    	</div>
    	<div class="col-6">
    	<input type="text" placeholder="Enter Designation" name="teacher_designation" required><br>
    <input type="text" placeholder="Enter Class Teacher Div" name="teacher_classTeacher" required><br>
    	</div>
    	<div class="col-6">
    	<input type="text" placeholder="Enter Teaching Div" name="teacher_divisions" required><br>
    	<input type="text" placeholder="Enter Teaching Subjects" name="teacher_subjects" required><br>
    	</div>
    </div>
   <button name="insertTeacher">INSERT</button>
</form>


<form id="deletionBox" action="dbms/validateUser.php" method="post" style="display:none">
    <button id="closeDelBox" type="button">X</button>
    <input type="text" placeholder="Enter candidate's Email" name="email" required>
    <input type="text" name="user" value="" hidden>
   
    <button name="deleteUser" type="button">DELETE</button>
</form>



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
          <a class="nav-link active" aria-current="page" href="admin.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link admission_form_toggle cursor-class" >Admissions</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Others
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item AddTeacherForm cursor-class" >Add Teacher</a></li>
            <li><a class="dropdown-item cursor-class deleteStudent">Delete Student</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item cursor-class deleteTeacher">Delete Teacher</a></li>
            <li><form class="dropdown-item cursor-class deleteTeacher" action="editInfo.php" method="post"><input type="text" value="teacher" name="user" hidden><button  class="editBtn">Edit Teacher Info</button></form> </li>
            <li><form class="dropdown-item cursor-class deleteTeacher" action="editInfo.php" method="post"><input type="text" value="student" name="user" hidden><button  class="editBtn">Edit Student Info</button ></form> </li>
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


<h1>Hi admin !</h1>
<form action="dbms/logout.php" method="post">
<button type="submit">LOGOUT</button>
</form>
    
</body>
<footer>
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
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script type="text/javascript">
    document.querySelector(".admission_form_toggle").addEventListener("click",function(){
        document.querySelector("#admissionVerify").style.display="block";
    });
    document.querySelector(".close_box").addEventListener("click",function(){
        document.querySelector("#admissionVerify").style.display="none";
    })
    document.querySelector(".AddTeacherForm").addEventListener("click",function(){
      document.querySelector("#insertTeacher").style.display="block";

    })
    document.querySelector(".close_box2").addEventListener("click",function(){
    document.querySelector("#insertTeacher").style.display="none";
});


document.querySelector(".deleteStudent").addEventListener("click",function(){
	console.log("Del St");
	$("#deletionBox").css("display","block");
	document.querySelector("#deletionBox input[name=user]").value = "student";
	var s = document.querySelector("#deletionBox input[name=user]").value;
	console.log(s);
});
document.querySelector(".deleteTeacher").addEventListener("click",function(){
	console.log("del teach");
	$("#deletionBox").css("display","block");
	document.querySelector("#deletionBox input[name=user]").value = "teacher";
	var s = document.querySelector("#deletionBox input[name=user]").value;
	console.log(s);
});
document.querySelector("#closeDelBox").addEventListener("click",function(){
    document.querySelector("#deletionBox").style.display="none";
});
document.querySelector("#deletionBox button[name=deleteUser]").addEventListener("click",function(){
	if(confirm("Are you sure you want to delete?"))
	{
    document.querySelector("button[name=deleteUser]").type="submit";
		document.querySelector("button[name=deleteUser]").click();
	}
	else
	{
		console.log("Cancelled");
		window.location = "admin.php";
	}
});

</script>
</html>
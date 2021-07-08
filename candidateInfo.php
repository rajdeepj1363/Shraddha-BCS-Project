<?php
    session_start();
    include 'dbms/dbh.inc.php';
    if(isset($_SESSION['CANDIDATE_EMAIL']))
    {
        $candidate_email = $_SESSION['CANDIDATE_EMAIL'];
        //echo "<script type='text/javascript'>alert(".$candidate_email.");</script>";
        $sql = "SELECT * FROM admissiondata WHERE (email = '".$candidate_email."')";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }
    $verification = $row['verification'];

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="css/admission.css" rel="stylesheet" >
</head>
<style>
    body{
        background-color:#48426d;
    }
    h1{
        color:#00af91;
    }

</style>
<body>

<div id="admissionForm">
    <div class="tab1">
    <h1>BASIC DETAILS</h1>
    <div class="row"><br>
        <div class="col-6 ">
            <label>Title</label><br>
            <input type="text" name="title" value = <?php echo '"'.$row['title'].'"' ?> readonly><br>
            <label>First Name</label><span class="required-mark">*</span><br> 
            <input type="text" name="fname" value = <?php echo '"'.$row['fname'].'"' ?> readonly><br>
            <label>Middle Name</label><br> 
            <input type="text" name="middleName" value = <?php echo '"'.$row['middleName'].'"' ?> readonly><br>
            <label>Last Name/Surname</label><span class="required-mark">*</span> <br>
            <input type="text" name="lname" value = <?php echo '"'.$row['lname'].'"' ?> readonly><br>         
            <label>Gender</label><span class="required-mark">*</span><br> 
            <input type="text" value = <?php echo '"'.$row['gender'].'"'?> readonly><br>
            <label>Mobile</label><span class="required-mark">*</span><br> 
            <input type="tel" name="mobile" value = <?php echo '"'.$row['mobile'].'"' ?> readonly><br>
            
            <label>Phone</label><br> 
            <input type="tel" name="phone" value = <?php echo '"'.$row['phone'].'"' ?> readonly><br>
            <label>Email</label><span class="required-mark">*</span><br> 
            <input type="email" name="email" value = <?php echo '"'.$row['email'].'"' ?> readonly><br>
            <label>Date of Birth</label><span class="required-mark">*</span><br>
            <input type="date" name="dob" value = <?php echo '"'.$row['dob'].'"' ?> readonly><br>
            <label>Place of Birth </label><br> 
            <input type="text" name="pob" value = <?php echo '"'.$row['pob'].'"' ?> readonly><br>
            <label>Marital Status</label><br> 
            <input type="text" name="marital_status" value = <?php echo '"'.$row['marital_status'].'"' ?> readonly><br>
        </div>

        <div class="col-6">
            <label>Father Name</label><span class="required-mark">*</span><br>
            <input type="text" name="fatherName" value = <?php echo '"'.$row["fatherName"].'"' ?> readonly><br>
            <label>Father Occupation</label><br> 
            <input type="text" name="fOccupation" value = <?php echo '"'.$row['fOccupation'].'"' ?> readonly><br>
            <label>Mother Name</label><span class="required-mark">*</span><br> 
            <input type="text" name="motherName" value = <?php echo '"'.$row['motherName'].'"' ?> readonly><br>
            <label>Mother Occupation</label><br> 
            <input type="text" name="mOccupation" value = <?php echo '"'.$row['mOccupation'].'"' ?> readonly><br>
            <label>Parent's Phone</label><span class="required-mark">*</span><br> 
            <input type="text" name="parentPhone" value = <?php echo $row['parentPhone'].'"' ?> readonly><br>
            
            <label>Caste Category</label><span class="required-mark">*</span><br> 
            <input type="text" name="casteCategory" value = <?php echo '"'.$row['casteCategory'].'"' ?> readonly><br>
            <label>Sub Caste</label><br> 
            <input type="text" name="sub_caste" value = <?php echo '"'.$row['sub_caste'].'"' ?> readonly><br>
            <label>Nationality </label><span class="required-mark">*</span><br> 
            <input type="text" name="nationality" value = <?php echo '"'.$row['nationality'].'"' ?> readonly><br>
            <label>Religion </label><span class="required-mark">*</span><br> 
            <input type="text" name="religion" value = <?php echo '"'.$row['religion'].'"' ?> readonly><br>
            <label>Handicap</label><span class="required-mark">*</span><br> 
            <input type="text" name="handicap" value = <?php echo '"'.$row['handicap'].'"' ?> readonly><br>

            <!-- For storing document names -->

            <input type="text" name="up_aadhar" value = <?php echo '"'.$row['up_aadhar'].'"' ?> hidden><br>
            <input type="text" name="up_pan" value = <?php echo '"'.$row['up_pan'].'"' ?> hidden><br>
            <input type="text" name="up_tenth" value = <?php echo '"'.$row['up_tenth'].'"'?> hidden><br>
            <input type="text" name="up_twelveth" value = <?php echo '"'.$row['up_twelveth'].'"' ?> hidden><br>
            
        </div>
        </div>
    </div>
    
    <div class="tab2">
        <h1>UPLOAD DOCUMENTS</h1>
        <label>Aadhar Card</label><span class="required-mark">*</span><br>
        <a href=<?php echo "admission/documents/aadhar/".$row['up_aadhar'] ?> target="_blank">Click Here</a><br>
        <label>PAN Card</label><span class="required-mark">*</span><br>
        <a href=<?php echo "admission/documents/pan/".$row['up_pan'] ?> target="_blank">Click Here</a><br>
        <label>10th Marksheet</label><span class="required-mark">*</span><br>
        <a href=<?php echo "admission/documents/10th_marksheet/".$row['up_tenth'] ?> target="_blank">Click Here</a><br>
        <label>12th Marksheet</label><span class="required-mark">*</span><br>
        <a href=<?php echo "admission/documents/12th_marksheet/".$row['up_twelveth'] ?> target="_blank">Click Here</a><br>
    </div>

    <div class="tab3">
        <h1>ASSIGN CLASS DETAILS</h1>
        <label>PRN</label><span class="required-mark">*</span><br>
        <input type="text" name="prn" required><br>
        <label>COURSE</label><span class="required-mark">*</span><br>
        <input type="text" name="course" value="BCS" readonly><br>
        <label>STD YEAR</label><span class="required-mark">*</span><br>
        <select name="std_year" required>
            <option value="FY">FY</option>
            <option value="SY">SY</option>
            <option value="TY">TY</option>
        </select><br>
        <label>DIVISION</label><span class="required-mark">*</span><br>
        <input type="text" name="division" required><br>
        <label>Roll No</label><span class="required-mark">*</span><br>
        <input type="text" name="rollno" required><br>

        </div>

    <button class="next" type="button">NEXT</button>
    <button class="verifyCandidateBtn" type="button" <?php if($verification == "DONE"){?> disabled <?php } ?> >VERIFY</button>
    
    
</div>
    
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script type="text/javascript">
    
    document.querySelector(".next").addEventListener("click",function(){
    
    if(document.querySelector(".tab2").style.display == "none" || document.querySelector(".tab2").style.display == "" )
    {
        console.log("first");
        document.querySelector(".next").innerHTML = "BACK";
        document.querySelector("#admissionForm .tab2").style.display = "block";
        document.querySelector("#admissionForm .tab3").style.display = "block";
        document.querySelector("#admissionForm .tab1").style.display = "none";
        if(document.querySelector(".submitBtn") != null)
        document.querySelector(".submitBtn").style.display="inline";
       
    }
    else
    {
        console.log("second");
        document.querySelector(".next").innerHTML = "NEXT";
        document.querySelector("#admissionForm .tab1").style.display = "block";
        document.querySelector("#admissionForm .tab3").style.display = "none";
        document.querySelector("#admissionForm .tab2").style.display = "none";
        if(document.querySelector(".submitBtn") != null)
        document.querySelector(".submitBtn").style.display="none";
    }
    
});



    document.querySelector(".verifyCandidateBtn").addEventListener("click",function(){

        var email = document.querySelector("input[name=email]").value;
        var title = document.querySelector("input[name=title]").value;
        var fname = document.querySelector("input[name=fname]").value;
        var middleName = document.querySelector("input[name=middleName]").value;
        var lname = document.querySelector("input[name=lname]").value;
        var mobile = document.querySelector("input[name=mobile]").value;
        var phone = document.querySelector("input[name=phone]").value;
        var dob = document.querySelector("input[name=dob]").value;
        var pob = document.querySelector("input[name=pob]").value;
        var marital_status = document.querySelector("input[name=marital_status]").value;
        var fatherName = document.querySelector("input[name=fatherName]").value;
        var fOccupation = document.querySelector("input[name=fOccupation]").value;
        var motherName = document.querySelector("input[name=motherName]").value;
        var mOccupation = document.querySelector("input[name=mOccupation]").value;
        var parentPhone = document.querySelector("input[name=parentPhone]").value;
        var casteCategory = document.querySelector("input[name=casteCategory]").value;
        var sub_caste = document.querySelector("input[name=sub_caste]").value;
        var nationality = document.querySelector("input[name=nationality]").value;
        var religion = document.querySelector("input[name=religion]").value;
        var handicap = document.querySelector("input[name=handicap]").value;
        var up_aadhar = document.querySelector("input[name=up_aadhar]").value;
        var up_pan = document.querySelector("input[name=up_pan]").value;
        var up_tenth = document.querySelector("input[name=up_tenth]").value;
        var up_twelveth = document.querySelector("input[name=up_twelveth]").value;
        var prn = document.querySelector("input[name=prn]").value;
        var course = document.querySelector("input[name=course]").value;
        var std_year = document.querySelector("select[name=std_year]").value;
        var division = document.querySelector("input[name=division]").value;
        var rollno = document.querySelector("input[name=rollno]").value;
        
    
        if(confirm("Are you sure you want to verify?"))
        {
            $.post("dbms/validateUser.php",
                {
                    emailID: email,
                    firstName:fname,
                    middleName:middleName,
                    lastName:lname,
                    mobile:mobile,
                    phone:phone,
                    dob:dob,
                    pob:pob,
                    marital_status:marital_status,
                    fatherName:fatherName,
                    fOccupation:fOccupation,
                    motherName:motherName,
                    mOccupation:mOccupation,
                    parentPhone:parentPhone,
                    sub_caste:sub_caste,
                    nationality:nationality,
                    religion:religion,
                    handicap:handicap,
                    up_aadhar:up_aadhar,
                    up_pan:up_pan,
                    up_tenth:up_tenth,
                    up_twelveth:up_twelveth,
                    prn:prn,
                    course:course,
                    std_year:std_year,
                    division:division,
                    rollno:rollno
                
                }
            );
            window.location="admin.php?verification=success";
        }
       
    });
</script>
</html>
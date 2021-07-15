<?php
    include "dbh.inc.php";
    if(isset($_POST['adminSubmit']))
    {
        $UNAME=$_POST['username'];
        $PWD=$_POST['passkey'];
        $SQL="SELECT * FROM admincredentials WHERE username='$UNAME' AND passkey='$PWD'";
        $result=$conn->query($SQL);
        $rownumber=mysqli_num_rows($result);
        if($rownumber==1){
            session_start();
            $_SESSION['ADMIN_UNAME']=$UNAME;
            $_SESSION['ADMIN_PWD']=$PWD;
            header('Location:../admin.php');
        }
        else{
            echo "invaliduser";
        }
    }
    if(isset($_POST["dashboardSubmit"]))
    {
        $UNAME=$_POST['username'];
        $PWD=$_POST['pwd'];
        $user=$_POST['student_teacher'];
        echo $user;
        if($user=="student")
        {
            $SQL="SELECT * FROM studentinfo WHERE email='$UNAME' AND pwd='$PWD' limit 1";
            $result=$conn->query($SQL);
            $rownumber=mysqli_num_rows($result);
            if($rownumber==1){
                session_start();
                $_SESSION['EMAIL']=$UNAME;
                $_SESSION['PWD']=$PWD;
                $_SESSION['USER']="student";
                header('Location:../dashboard.php');
            }
            else{
                echo "invaliduser";
            }
        }
        if($user=="teacher")
        {
            echo "\nentered 2nd block";
            $SQL="SELECT * FROM teachers WHERE uname='$UNAME' AND pwd='$PWD' limit 1";
            $result=$conn->query($SQL);
            $rownumber=mysqli_num_rows($result);
            echo "row numbers= ".$rownumber;
            if($rownumber==1){
                session_start();
                $_SESSION['EMAIL']=$UNAME;
                $_SESSION['PWD']=$PWD;
                $_SESSION['USER']="teacher";
                header('Location:../dashboardTeacher.php');
            }
            else{
                echo "invaliduser";
            }
        }
       
    }
    if(isset($_POST["verifyCandidate"]))
    {
        $CANDIDATE_EMAIL=$_POST['candidate_email'];
        
        $SQL="SELECT * FROM admissiondata WHERE email='$CANDIDATE_EMAIL'";
        $result=$conn->query($SQL);
        $rownumber=mysqli_num_rows($result);
        if($rownumber==1){
            session_start();
            $_SESSION['CANDIDATE_EMAIL']=$CANDIDATE_EMAIL;
            header('Location:../candidateInfo.php');
        }
        else{
            echo "<script type='text/javascript'>alert('No such registration found');window.location='../admin.php';</script>";
        }
    }
    
    if(isset($_POST['emailID']))
    {
        $title= $_POST['title'];
        $fname = $_POST['firstName'];
        $lname = $_POST['lastName'];
        $middleName = $_POST['middleName'];
        $gender = $_POST['gender'];
        $mobile = $_POST['mobile'];
        $phone = $_POST['phone'];
        $dob = $_POST['dob'];
        $pob = $_POST['pob'];
        $marital_status = $_POST['marital_status'];
        $fatherName = $_POST['fatherName'];
        $fOccupation = $_POST['fOccupation'];
        $motherName = $_POST['motherName'];
        $mOccupation = $_POST['mOccupation'];
        $parentPhone = $_POST['parentPhone'];
        $casteCategory = $_POST['casteCategory'];
        $sub_caste = $_POST['sub_caste'];
        $nationality = $_POST['nationality'];
        $religion = $_POST['religion'];
        $handicap = $_POST['handicap'];
        $up_aadhar = $_POST['up_aadhar'];
        $up_pan = $_POST['up_pan'];
        $up_tenth = $_POST['up_tenth'];
        $up_twelveth = $_POST['up_twelveth'];
        $prn = $_POST['prn'];
        $course = $_POST['course'];
        $std_year = $_POST['std_year'];
        $division = $_POST['division'];
        $rollno = $_POST['rollno'];
        echo($title . " " . $fname);
        $candidateEmail = $_POST['emailID'];
        $pwd = uniqid($fname);
        $sql = "UPDATE admissiondata SET verification = 'DONE' WHERE (email = '".$_POST['emailID']."')";
        $result = $conn->query($sql);
        $sql = "INSERT INTO studentinfo(title,fname,middleName,lname,gender,mobile,phone,email,dob,pob,marital_status,fatherName,fOccupation,motherName,mOccupation,parentPhone,casteCategory,sub_caste,nationality,religion,handicap,up_aadhar,up_pan,up_tenth,up_twelveth,pwd,PRN,COURSE,STD_YEAR,DIVISION,ROLLNO) VALUES('$title','$fname','$middleName','$lname','$gender','$mobile','$phone','$candidateEmail','$dob', '$pob','$marital_status','$fatherName','$fOccupation', '$motherName','$mOccupation','$parentPhone','$casteCategory','$sub_caste','$nationality','$religion','$handicap','$up_aadhar','$up_pan','$up_tenth','$up_twelveth','$pwd','$prn','$course','$std_year','$division','$rollno')";  
        $result = $conn->query($sql);
        //$result = $conn->query($sql);
        //echo "<script type='text/javascript'>console.log('Username:'".$candidateEmail."'\nPassword:'".$pwd."');</script>";
    }
    if(isset($_POST['insertAttendance']))
    {
        $student_email = $_POST['student_name'];
        $total_lectures = $_POST['totalLectures'];
        $attended_lectures = $_POST['attendedLectures'];
        $sql = "UPDATE studentinfo SET TOTALLECTURES = '$total_lectures',ATTENDEDLECTURES='$attended_lectures' WHERE email='".$student_email."'"; 
        $result = $conn->query($sql);
        echo "<script type='text/javascript'>alert('Attendance Recorded');</script>";
        header('Location:../dashboardTeacher.php?attendanceUploaded');
        
    }
    if(isset($_POST['insertTeacher'])){
        $teacher_name=$_POST['teacher_name'];
        $teacher_email=$_POST['teacher_email'];
        $teacher_mobile=$_POST['teacher_mobile'];
        $teacher_address=$_POST['teacher_address'];
        $teacher_dob=$_POST['teacher_dob'];
        $teacher_qualification=$_POST['teacher_qualification'];
        $teacher_designation=$_POST['teacher_designation'];
        $teacher_classTeacher=$_POST['teacher_classTeacher'];
        $teacher_divisions=$_POST['teacher_divisions'];
        $teacher_subjects=$_POST['teacher_subjects'];
        $teacher_pwd=substr($teacher_name,0,4)."".substr($teacher_mobile,0,5);
        $sql="INSERT INTO teachers(name,mobile,address,dob,qualification,designation,classTeacher,teachingDivisions,teachingSubjects,uname,pwd ) VALUES('$teacher_name','$teacher_mobile','$teacher_address','$teacher_dob','$teacher_qualification','$teacher_designation','$teacher_classTeacher','$teacher_divisions','$teacher_subjects','$teacher_email','$teacher_pwd')";
        $result=$conn->query($sql);
        echo "<script type='text/javascript'>alert('Faculty added');</script>";
        header('Location:../admin.php?facultyadded=success');
        
    }
    if(isset($_POST['deleteUser']))
    {
        echo "none";
        if($_POST['user']=="student"){
            $email=$_POST['email'];
            $sql="DELETE FROM stud WHERE  UNAME='".$email."'";
            $result=$conn->query($sql);
            $sql="DELETE FROM studentinfo WHERE  email='".$email."'";
            $result=$conn->query($sql);
            echo "<script type='text/javascript'>alert('Student deleted');</script>";
            header('Location:../admin.php?studentdeleted=success');
        }
        if($_POST['user']=="teacher"){
            $email=$_POST['email'];
            $sql="DELETE FROM teachers WHERE uname='".$email."'";
            $result=$conn->query($sql);
            echo "<script type='text/javascript'>alert('Faculty deleted');</script>";
            header('Location:../admin.php?facultydeleted=success');
            
        }
    }
    if(isset($_POST['editInfoBtn']))
    {
        $user = $_POST['user'];
        if($user == "student")
        {
            
            $name = $_POST['name'];
            $address = $_POST['gender'];
            $phone = $_POST['mobile'];
            $email = $_POST['phone'];
            $dob = $_POST['email'];
            $fatherName = $_POST['dob'];
            $fOccupation = $_POST['pob'];
            $motherName = $_POST['marital_status'];
            $mOccupation = $_POST['father_name'];
            $parentADD = $_POST['father_occupation'];
            $parentPHONE = $_POST['mother_name'];
            $PRN = $_POST['mother_occupation'];
            $ROLLNO = $_POST['parent_phone'];
            $COURSE = $_POST['caste_category'];
            $STD_YEAR = $_POST['sub_caste'];
            $DIVISIONS = $_POST['nationality'];
            
           
        }
        if($user == "teacher")
        {
            $teacher_name=$_POST['name'];
            $teacher_oldEmail = $_POST['oldEmail'];
            $teacher_email=$_POST['uname'];
            $teacher_mobile=$_POST['mobile'];
            $teacher_address=$_POST['address'];
            $teacher_dob=$_POST['dob'];
            $teacher_qualification=$_POST['qualification'];
            $teacher_designation=$_POST['designation'];
            $teacher_classTeacher=$_POST['classTeacher'];
            $teacher_divisions=$_POST['teachingDivisions'];
            $teacher_subjects=$_POST['teachingSubjects'];
            $sql = "UPDATE teachers SET name='$teacher_name',uname='$teacher_email',mobile='$teacher_mobile',address='$teacher_address',dob='$teacher_dob',qualification='$teacher_qualification',designation='$teacher_designation',classTeacher='$teacher_classTeacher',teachingDivisions='$teacher_divisions',teachingSubjects='$teacher_subjects' WHERE uname ='".$teacher_oldEmail."'";
            $result= $conn->query($sql);
            echo "<script type='text/javascript'>alert('Information Updated!')</script>";
            header('Location:../admin.php?informationupdated=success');
        }
    }
    
    echo "none";
    ?>

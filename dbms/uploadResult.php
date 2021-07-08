<?php

    include 'dbh.inc.php';

    if(isset($_POST['insertResult']))
    {
        $student_email = $_POST['studentEmail'];
        $sql = "SELECT name FROM studentinfo WHERE email='".$student_email."'";
        $result=$conn->query($sql);
        $row = $result->fetch_assoc();
        $student_name = $row['name'];
        $exam_name = $_POST['examname'];
        $date = date("Y-m-d");
        $file = $_FILES["resultFile"];
        $fileName = $_FILES["resultFile"]['name'];
        $fileTmpName = $_FILES["resultFile"]['tmp_name'];
        $fileSize = $_FILES["resultFile"]['size'];
        $fileError = $_FILES["resultFile"]['error'];
        $fileType = $_FILES["resultFile"]['type'];
        $fileExt = explode('.',$fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array('jpg','jpeg','png','pdf');
        if(in_array($fileActualExt, $allowed))
        {
          if($fileError === 0){
            if($fileSize < 2000000){
              $fileNewName = uniqid('',true).".".$fileActualExt;
              $fileDestination = '../admission/documents/results/'.$fileNewName;
              
              move_uploaded_file($fileTmpName,$fileDestination);
        }
        else {
          echo "File Size exceeds 2MB! Upload a file of smaller size";
        }
      }
      else {
        echo "There was some error uploading your file, please retry";
      }
    }
    else {
      echo "You cannot upload a file of this type!";
    }
    $sql = "INSERT INTO results(email,name,exam,date,result) VALUES('$student_email','$student_name','$exam_name','$date','$fileNewName')";

          $result = $conn->query($sql);
          
          echo "<script type='text/javascript'>alert('Result Successfully Uploaded!');
          window.location='../dashboardTeacher.php?ResultUpload=success';</script>";
    }

?>
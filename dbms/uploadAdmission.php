<?php
  include 'dbh.inc.php';

  if(isset($_POST['submit']))
  {
    //Form VALUES
    $TITLE = $_POST['title'];
    $FIRST_NAME = $_POST['fname'];
    $MIDDLE_NAME = $_POST['mname'];
    $LAST_NAME = $_POST['lname'];
    $GENDER = $_POST['gender'];
    $MOBILE = $_POST['mobile'];
    $PHONE = $_POST['phone'];
    $EMAIL = $_POST['email'];
    $DOB = $_POST['dob'];
    $POB = $_POST['pob'];
    $MARITAL_STATUS = $_POST['marital_status'];
    $FATHER_NAME = $_POST['father_name'];
    $FATHER_OCC = $_POST['father_occupation'];
    $MOTHER_NAME = $_POST['mother_name'];
    $MOTHER_OCC = $_POST['mother_occupation'];
    $PARENT_PHONE = $_POST['parent_phone'];
    $CASTE_CATEGORY = $_POST['caste_category'];
    $SUB_CASTE = $_POST['sub_caste'];
    $NATIONALITY = $_POST['nationality'];
    $RELIGION = $_POST['religion'];
    $HANDICAP = $_POST['handicap'];
    

    //aadhar,pan,10th,12th
    $document_list = array("up_aadhar","up_PAN","up_tenth","up_twelve");
    $uploaded_docNames = array();
    $i = 0;
    while($i<4)
    {
     
      $file = $_FILES[$document_list[$i]];
      $fileName = $_FILES[$document_list[$i]]['name'];
      $fileTmpName = $_FILES[$document_list[$i]]['tmp_name'];
      $fileSize = $_FILES[$document_list[$i]]['size'];
      $fileError = $_FILES[$document_list[$i]]['error'];
      $fileType = $_FILES[$document_list[$i]]['type'];
      $fileExt = explode('.',$fileName);
      $fileActualExt = strtolower(end($fileExt));
      $allowed = array('jpg','jpeg','png','pdf');
      if(in_array($fileActualExt, $allowed))
      {
        if($fileError === 0){
          if($fileSize < 2000000){
            $fileNewName = uniqid('',true).".".$fileActualExt;
            if($i == 0)
              $fileDestination = '../admission/documents/aadhar/'.$fileNewName;
            elseif($i == 1)
              $fileDestination = '../admission/documents/pan/'.$fileNewName;
            elseif($i == 2)
              $fileDestination = '../admission/documents/10th_marksheet/'.$fileNewName;
            elseif($i == 3)
              $fileDestination = '../admission/documents/12th_marksheet/'.$fileNewName;
            array_push($uploaded_docNames,$fileNewName);
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
  $i = $i+1;
}
    
$sql = "INSERT INTO admissiondata(title,fname,middleName,lname,gender,mobile,phone,email,dob,pob,marital_status,fatherName,fOccupation,motherName,mOccupation,parentPhone,casteCategory,sub_caste,nationality,religion,handicap,up_aadhar,up_pan,up_tenth,up_twelveth) VALUES('$TITLE','$FIRST_NAME','$MIDDLE_NAME','$LAST_NAME','$GENDER','$MOBILE','$PHONE','$EMAIL','$DOB','$POB','$MARITAL_STATUS','$FATHER_NAME','$FATHER_OCC','$MOTHER_NAME','$MOTHER_OCC','$PARENT_PHONE','$CASTE_CATEGORY','$SUB_CASTE','$NATIONALITY','$RELIGION','$HANDICAP','$uploaded_docNames[0]','$uploaded_docNames[1]','$uploaded_docNames[2]','$uploaded_docNames[3]')";

          $result = $conn->query($sql);
          
          echo "<script type='text/javascript'>alert('Form Successfully Uploaded!');
          window.location='../index.php?uploadsuccess';</script>";

        }
        

     



 ?>

 <!-- CREATE TABLE testimonial(
	ID int PRIMARY KEY AUTO_INCREMENT,
    FIRSTNAME VARCHAR(15) NOT NULL,
    LASTNAME VARCHAR(15) NOT NULL,
    EMAIL VARCHAR(30) NOT NULL,
    COMPANY VARCHAR (40) NOT NULL,
    JOBTITLE VARCHAR(15) NOT NULL,
    SERVICE VARCHAR(20) NOT NULL,
    MESSAGE TEXT NOT NULL,
    PERMISSION VARCHAR(4) NOT NULL,
    IMAGE VARCHAR(30) NOT NULL,
    CD VARCHAR(4)
); -->

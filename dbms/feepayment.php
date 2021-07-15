<?php
    include "dbh.inc.php";
    
    if(isset($_POST['introduceFee']))
    {
        $fee_name = $_POST['FEE_NAME'];
        $fee_amt = $_POST['FEE_AMT'];
        $course = "BCS";
        $division = $_POST['divisions'];

        $sql = "INSERT INTO feepayment(FEE_NAME,FEE_AMT,CUSTID,CUSTNAME) 
                SELECT '$fee_name','$fee_amt',studentinfo.email, CONCAT(studentinfo.fname,' ',studentinfo.middleName,' ',studentinfo.lname) as Name FROM studentinfo 
                WHERE studentinfo.STD_YEAR = '".$division."'";
        $result = $conn->query($sql);
        header('Location:../admin.php?FeeSegment=Added');
        
    }
    

?>
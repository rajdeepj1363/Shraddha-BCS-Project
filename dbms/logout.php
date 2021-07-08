<?php
    include "dbh.inc.php";
    session_start();
    if(isset($_SESSION['ADMIN_UNAME']))
    {
        session_destroy();
        header('Location:../adminLogin.php');
    }
    if(isset($_SESSION['EMAIL']))
    {
        session_destroy();
        header('Location:../index.php');
    }
    else
    {
        header('Location:../college.php');
    }
    
?>
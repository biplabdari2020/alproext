<?php
    include('checkSession.php');
    include('UserDefinedLibrary.php');
    $txtEmpNo=$_GET['id'];  
    $delete_query = "Delete from alpro_prod.mst_employee where txtEmpNo = '$txtEmpNo'";
    //echo("<br>".$delete_query."<br>");
    $execute_status = executeQuery($delete_query);
    if($execute_status == 'pass'){
        header("Location: ../php/MasterEmployeeView.php");  
    }
    else{
        echo("<br>".$execute_status."<br>");
    }
?>
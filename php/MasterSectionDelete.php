<?php
include('checkSession.php');
    include('UserDefinedLibrary.php');
    $txtSectionNo=$_GET['id'];  
    $delete_query = "Delete from alpro_prod.mst_section where txtSectionNo = '$txtSectionNo'";
    //echo("<br>".$delete_query."<br>");
    $execute_status = executeQuery($delete_query);
    if($execute_status == 'pass'){
        header("Location: ../php/MasterSectionView.php");  
    }
    else{
        echo("<br>".$execute_status."<br>");
    }
?>
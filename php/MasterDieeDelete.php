<?php
    include('checkSession.php');
    include('UserDefinedLibrary.php');
    $txtSectionNo=$_GET['id1'];
    $txtDieNo=$_GET['id2'];
    $txtDieNo=str_replace('***',' ',$txtDieNo);
    $delete_query = "delete from alpro_prod.mst_die where txtSectionNo = '$txtSectionNo' and txtDieNo = '$txtDieNo'";
    //echo("<br>".$delete_query."<br>");
    $execute_status = executeQuery($delete_query);
    if($execute_status == 'pass'){
        header("Location: ../php/MasterDieeView.php");  
    }
    else{
        echo("<br>".$execute_status."<br>");
    }
?>
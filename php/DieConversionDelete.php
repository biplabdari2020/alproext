<?php
    include('checkSession.php');
    include('UserDefinedLibrary.php');
    $txtDieNo=$_GET['id1'];
    $txtDieNo=str_replace("||"," ",$txtDieNo);
    $txtCompCode=$_GET['id2'];
    $txtCompCode=str_replace("||"," ",$txtCompCode);
    $delete_query = "Delete from alpro_prod.trn_die_conversion where txtDieNo = '$txtDieNo' And txtComponent='$txtCompCode'";
    echo("<br>".$delete_query."<br>");
    $execute_status = executeQuery($delete_query);
    if($execute_status == 'pass'){
        header("Location: ../php/DieConversionView.php");  
    }
    else{
        echo("<br>".$execute_status."<br>");
    }
?>
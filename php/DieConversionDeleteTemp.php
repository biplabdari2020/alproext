<?php
    include('checkSession.php');
    include('UserDefinedLibrary.php');
    $pkdieconv=$_GET['id'];
    $delete_query = "Delete from alpro_prod.trn_die_conversion_temp where pkdieconv = '$pkdieconv'";
    echo("<br>".$delete_query."<br>");
    $execute_status = executeQuery($delete_query);
    if($execute_status == 'pass'){
        header("Location: ../php/DieConversionEntry.php");  
    }
    else{
        echo("<br>".$execute_status."<br>");
    }
?>
<?php
    include('checkSession.php');
    include('UserDefinedLibrary.php');
    $txtLogNo=$_GET['id1'];  
    $delete_query = "Delete from alpro_prod.mst_hot_die_steel where txtLogNo = '$txtLogNo'";
    //echo("<br>".$delete_query."<br>");
    $execute_status = executeQuery($delete_query);
    //echo("<br>".$execute_status."<br>");
    if($execute_status == 'pass'){
        header("Location: ../php/MasterHotDieSteelView.php");  
    }
    else{
        echo("<br>".$execute_status."<br>");
    }
?>
<?php
include('checkSession.php');
include('UserDefinedLibrary.php');
    echo("<br>SUBMITTED<br>");   
    $update_qry = "update alpro_prod.trn_die_conversion set txtDieNoConv = '".$_POST['txtDieNoConv']."', txtComponentConv = '".$_POST['txtComponentConv']."', txtRemarks = '".$_POST['txtRemarks']."',  dtDateTime = now() where txtDieNo = '".$_POST['txtDieNo']."' and txtComponent = '".$_POST['txtDieCompCode']."'";
    //echo("<br>".$update_qry."<br>");
    $txtComponentConv=$_POST['txtComponentConv'];
    $txtDieNoConv=$_POST['txtDieNoConv'];
    $txtRemarks=$_POST['txtRemarks'];
    $execute_status = executeQuery($update_qry);
//    $insert_qry = "INSERT INTO alpro_prod.mst_die_comp (txtDieNo, txtCompCode, txtCompName) values ('$txtDieNo','$txtCompCode','$txtComp')";
 //   $execute_status = executeQuery($update_qry);
    if($execute_status != 'pass'){
        echo("<br>".$execute_status."<br>");
        echo $update_qry;
    }
    else
    {
        echo("<br>".$execute_status."<br>");
        //echo $update_qry;
        header("Location: ../php/DieConversionView.php");  
   }

?>
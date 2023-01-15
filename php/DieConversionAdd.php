<?php
include('checkSession.php');
include('UserDefinedLibrary.php');
$txtSessionId = session_id();
$pkdieconv = generatePk('CON','trn_die_conversion_temp','pkdieconv');
if (isset($_POST['Add'])){
    echo("<br>SUBMITTED<br>");   
    $txtDieNo =$_POST['txtDieNo'];
    $txtComponent =$_POST['txtCompCode'];    
    $txtDieNoConv =$_POST['txtDieNoConv'];
    $txtComponentConv =$_POST['txtComponentConv'];    
    $txtRemarks =$_POST['txtRemarks'];
    
    $insert_qry = "insert into alpro_prod.trn_die_conversion_temp (pkdieconv, txtDieNo, txtComponent, txtDieNoConv, txtComponentConv, txtRemarks, txtSessionId) values ('$pkdieconv','$txtDieNo', '$txtComponent', '$txtDieNoConv', '$txtComponentConv', '$txtRemarks','$txtSessionId')";
    //echo("<br>".$update_qry."<br>");
    $execute_status = executeQuery($insert_qry);
    if($execute_status != 'pass'){
        echo("<br>".$execute_status."<br>");
        //echo $update_qry;
    }
    else
    {
        echo("<br>".$execute_status."<br>");
        //echo $update_qry;
        header("Location: ../php/DieConversionEntry.php");  
   }

}
if (isset($_POST['Submit'])){
    echo("<br>SUBMITTED<br>");   
    $txtDieNo =$_POST['txtDieNo'];
    $txtComponent =$_POST['txtCompCode'];
    $txtDieNoConv =$_POST['txtDieNoConv'];
    $txtComponentConv =$_POST['txtComponentConv'];
    $txtRemarks =$_POST['txtRemarks'];
    $txtStatus ="Rejected";

    $insert_qry = "insert into alpro_prod.trn_die_conversion (txtDieNo, txtComponent, txtDieNoConv, txtComponentConv, txtRemarks)  select txtDieNo, txtComponent, txtDieNoConv, txtComponentConv, txtRemarks from alpro_prod.trn_die_conversion_temp where txtSessionId='".$txtSessionId."'";;
    //echo("<br>".$update_qry."<br>");
    $execute_status = executeQuery($insert_qry);
    if($execute_status != 'pass'){
        echo("<br>".$execute_status."<br>");
        echo $update_qry;
    }
    else
    {
        echo("<br>".$execute_status."<br>");
        //echo $update_qry;
        $DeleteQry = "Delete from alpro_prod.trn_die_conversion_temp where txtSessionId='".$txtSessionId."'";
        $execute_status = executeQuery($DeleteQry);
        header("Location: ../php/DieConversionView.php");  
   }

}

else{
    echo("<br>Not SUBMITTED<br>");
}
?>

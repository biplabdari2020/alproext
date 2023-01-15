<?php
include('checkSession.php');
include('UserDefinedLibrary.php');
$out_list = getListDynamicTable($_POST);
$cnt = count($out_list['txtDieNo']);

$attribute_list = array('txtDieNo','txtCompCode','txtCompName');
$pk = 'txtDieNo';
$pk1 = 'txtDieNo';
$db_table_name = "mst_die_comp";

$db_insert_obj = masterDataInsertDB($out_list,$attribute_list,$db_table_name,$pk);
$pass_insert_qry = $db_insert_obj["pass_insert_qry"];
$fail_insert_qry = $db_insert_obj["fail_insert_qry"];
$pass_insert_cnt = $db_insert_obj["pass_insert_cnt"];
$fail_insert_cnt = $db_insert_obj["fail_insert_cnt"];
$error_msg = $db_insert_obj["error_msg"];

//echo("<br> pass qury : ".$pass_insert_qry."<br>");
//echo("<br> FAIL qury : ".$fail_insert_qry."<br>");

//execute select query
if($pass_insert_cnt > 0){
    echo($pass_insert_qry);
    $pass_insert_data = getDataFromDB($pass_insert_qry);
    
}
if($fail_insert_cnt > 0){
    //echo($fail_insert_qry);
    $fail_insert_data = getDataFromDB($fail_insert_qry);
}


//echo($db_insert_obj["fail_insert_cnt"]);

?>

<!-- HTML -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Section Master Data Entry</title>
	<link rel="icon" href="../staticfiles/img/logo.png">
	<link rel="stylesheet" href="../staticfiles/css/style.css">
	<script src="../staticfiles/js/jquery-3.3.1.js"></script>
	<script src="../staticfiles/js/reusable.js"></script>
</head>

<body>
    <!-- Start : for menu bar -->
	<div id="menu_bar_php"></div>    
	<!-- End for menu bar -->
    <div class="myDiv">
        <div class="container">
            <div class="contact-form medium-padding120">
            <td><a href="../php/MasterDieCompEntry.php" class="myButton">Back</a></td>
            
            <!-- Start : for Failed data  -->
                <?php
                    if($fail_insert_cnt > 0){
                        ?>
                        <h1 style="color:red;">No of Record Insertion Failed : <?php echo($fail_insert_cnt); ?></h1>
                        <br>
                        <p><?php echo($error_msg); ?></p>
                        <p>Below <b>(Die No & Component No)</b> already present. Please add unique <b>(Die No & Component No)</b></p>
                        <br>
                            <table id="dataTable" border="2">
                                <tr>                                    
                                    <th>Die No</th>
                                    <th>Component No</th>
                                    <th>Component Name</th>
                                </tr>
                                <?php
                                    while($row = $fail_insert_data->fetch_assoc()){
                                        ?>
                                            <tr>
                                                <td><?php echo $row['txtDieNo']; ?> </td>
                                                <td><?php echo $row['txtCompCode']; ?> </td>
                                                <td><?php echo $row['txtCompName']; ?> </td>
                                            </tr>
                                        <?php
                                    }
                                ?>
                            </table>
                        <?php
                    }
                ?>
                <!-- END : for Failed data  -->
                <br><br>
                <!-- Start : for PASS data  -->
                <?php
                    if($pass_insert_cnt > 0){
                        ?>
                        <h1 style="color:green;">No of Record Insertion Passed : <?php echo($pass_insert_cnt); ?></h1><br>
                            <table id="dataTable" border="2">
                                <tr>
                                    <th>Die No</th>
                                    <th>Component No</th>
                                    <th>Component Name</th>
                                </tr>
                                <?php
                                    while($row = $pass_insert_data->fetch_assoc()){
                                        ?>
                                            <tr>
                                                <td><?php echo $row['txtDieNo']; ?> </td>
                                                <td><?php echo $row['txtCompCode']; ?> </td>
                                                <td><?php echo $row['txtCompName']; ?> </td>
                                            </tr>
                                        <?php
                                    }
                                ?>
                            </table>
                        <?php
                    }
                ?>
                <!-- END : for PASS data  -->
            </div>    
        </div>
    </div>
</body>
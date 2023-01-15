<?php
include('checkSession.php');
if (isset($_POST['Submit'])){
include('UserDefinedLibrary.php');
//FiLE Upload Start
$target = "uploads/";
$target_dir = "uploads/";
$target = $target . basename( $_FILES['txtDrawingFile']['name']);
$filename = $_FILES['txtDrawingFile']['name'];
$filesize = $_FILES['txtDrawingFile']['size'];
$location = $target_dir;
if(!is_dir($location)){
    mkdir($location, 0755);
}
$location .= "/".$filename;
move_uploaded_file($_FILES['txtIdentificationNo']['tmp_name'],$location);

//File uPLOAD eND
$out_list = getListDynamicTable($_POST);
$cnt = count($out_list['txtSectionNo']);
$attribute_list = array('txtSectionNo','txtNewSection','txtIdentificationNo','txtSectionDesc','txtTypeOfSection','txtSectionCategoryCode','txtNormalWt','txtMaxWtRange','txtMinWtRange');
$pk = 'txtSectionNo';
$db_table_name = "mst_section";

$db_insert_obj = masterDataInsertDB($out_list,$attribute_list,$db_table_name,$pk);
$update_qry = "update alpro_prod.mst_section set txtDrawingFile='".$filename."' where txtSectionNo='".$_POST['txtSectionNo']."'";
$execute_status = executeQuery($update_qry);
$pass_insert_qry = $db_insert_obj["pass_insert_qry"];
$fail_insert_qry = $db_insert_obj["fail_insert_qry"];
$pass_insert_cnt = $db_insert_obj["pass_insert_cnt"];
$fail_insert_cnt = $db_insert_obj["fail_insert_cnt"];
$error_msg = $db_insert_obj["error_msg"];

//echo("<br> pass qury : ".$pass_insert_qry."<br>");
//echo("<br> FAIL qury : ".$fail_insert_qry."<br>");

//execute select query
if($pass_insert_cnt > 0){
    //echo($pass_insert_qry);
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
            <td><a href="../php/MasterSectionEntry.php" class="myButton">Back</a></td>
            
            <!-- Start : for Failed data  -->
                <?php
                    if($fail_insert_cnt > 0){
                        ?>
                        <h1 style="color:red;">No of Record Insertion Failed : <?php echo($fail_insert_cnt); ?></h1>
                        <br>
                        <p><?php echo($error_msg); ?></p>
                        <p>Below <b>Section No</b> already present. Please add unique <b>Section No</b></p>
                        <br>
                            <table id="dataTable" border="2">
                                <tr>
                                    <th>Section No</th>
                                    <th>New Section No</th>
                                    <th>Identification No</th>
                                    <th>Section Descriprtion</th>
                                    <th>Type Of Section</th>
                                    <th>Section Category</th>
                                    <th>Normal Weight Kg/Mtr</th>
                                    <th>Max Weight Range Kg/Ft</th>
                                    <th>Min Weight Range Kg/Ft</th>
                                    <th>Trasaction Date</th>
                                </tr>
                                <?php
                                    while($row = $fail_insert_data->fetch_assoc()){
                                        ?>
                                            <tr>
                                                <td><?php echo $row['txtSectionNo']; ?> </td>
                                                <td><?php echo $row['txtNewSection']; ?> </td>
                                                <td><?php echo $row['txtIdentificationNo']; ?> </td>
                                                <td><?php echo $row['txtSectionDesc']; ?> </td>
                                                <td><?php echo $row['txtTypeOfSection']; ?> </td>
                                                <td><?php echo $row['txtSectionCategoryCode']; ?> </td>
                                                <td><?php echo $row['txtNormalWt']; ?> </td>
                                                <td><?php echo $row['txtMaxWtRange']; ?> </td>
                                                <td><?php echo $row['txtMinWtRange']; ?> </td>
                                                <td><?php echo $row['dtDateTime']; ?> </td>
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
                                    <th>Section No</th>
                                    <th>New Section No</th>
                                    <th>Identification No</th>
                                    <th>Section Descriprtion</th>
                                    <th>Type Of Section</th>
                                    <th>Section Category</th>
                                    <th>Normal Weight Kg/Mtr</th>
                                    <th>Max Weight Range Kg/Ft</th>
                                    <th>Min Weight Range Kg/Ft</th>
                                    <th>Trasaction Date</th>
                                </tr>
                                <?php
                                    while($row = $pass_insert_data->fetch_assoc()){
                                        ?>
                                            <tr>
                                                <td><?php echo $row['txtSectionNo']; ?> </td>
                                                <td><?php echo $row['txtNewSection']; ?> </td>
                                                <td><?php echo $row['txtIdentificationNo']; ?> </td>
                                                <td><?php echo $row['txtSectionDesc']; ?> </td>
                                                <td><?php echo $row['txtTypeOfSection']; ?> </td>
                                                <td><?php echo $row['txtSectionCategoryCode']; ?> </td>
                                                <td><?php echo $row['txtNormalWt']; ?> </td>
                                                <td><?php echo $row['txtMaxWtRange']; ?> </td>
                                                <td><?php echo $row['txtMinWtRange']; ?> </td>
                                                <td><?php echo $row['dtDateTime']; ?> </td>
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

<?php
}
?>
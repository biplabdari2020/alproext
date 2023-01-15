<?php
include('checkSession.php');
include('UserDefinedLibrary.php');
$qry = "select *  from alpro_prod.mst_hot_die_steel";

$data = getDataFromDB($qry);
//echo($data);
?>
<!-- HTML -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Hot Die Steel Master Data View</title>
	<link rel="icon" href="../staticfiles/img/logo.png">
	<link rel="stylesheet" href="../staticfiles/css/style.css">
	<script src="../staticfiles/js/jquery-3.3.1.js"></script>
	<script src="../staticfiles/js/reusable.js"></script>
    <script>
        function clicked(){
            return confirm('Do you want to continue ..');
        }
    </script>

</head>
<body>
    <!-- Start : for menu bar -->
	<div id="menu_bar_php"></div>    
	<!-- End for menu bar -->
    <div class="myDiv">
        <div class="container">
            <div class="contact-form medium-padding120">
            <h1>Hot Die Steel Master Data View</h1><br><br>
            <input type="text" size="20" id="myInput_1" class="myInputCSS" onkeyup="myFunction('myInput_1','2')" placeholder="Search for Log No">

                <?php
                if ($data) {
                    ?>
                    <table id="dataTable" border="2">
                        <tr>
                            <th></th>
                            <th></th>
                            <th>Log No</th>
                            <th>Log Type</th>
                            <th>Diameter</th>
                            <th>Length</th>
                            <th>Weight</th>
                            <th>Make</th>
                            <th>Supplier Name</th>
                            <th>Invoice No</th>
                            <th>Log Received</th>
                            <th>Hardness</th>                            
                            <th>Transaction Date</th>
                        </tr>
                    <?php
                    // output data of each row
                    while($row = $data->fetch_assoc()) {
                    $param = 'id1='.$row['txtLogNo'];
                ?>
                    <tr>
                         <!-- <td><a href="../php/MasterHotDieSteelUpdate.php?<?php echo $param; ?>" class="myButton">Edit</a></td>
                        <td><a href="../php/MasterHotDieSteelDelete.php?<?php echo $param; ?>" class="myButton" onclick="return clicked();">Delete</a></td> -->
                        <?php
                        $td_obj = edit_delete_role_based("MasterHotDieSteelUpdate","MasterHotDieSteelDelete",$param,"ToolroomUser,Admin");
                        echo($td_obj);
                        ?>
                        <td><?php echo $row['txtLogNo']; ?> </td>
                        <td><?php echo $row['txtLogType']; ?> </td>
                        <td><?php echo $row['numDia']; ?> </td>
                        <td><?php echo $row['numLength']; ?> </td>
                        <td><?php echo $row['numLogWt']; ?> </td>
                        <td><?php echo $row['txtMake']; ?> </td>
                        <td><?php echo $row['txtSuppName']; ?> </td>
                        <td><?php echo $row['txtInvNo']; ?> </td>
                        <td><?php echo $row['dtLogRecv']; ?> </td>
                        <td><?php echo $row['numHardness']; ?> </td>
                        <td><?php echo $row['dtDateTime']; ?> </td>
                    </tr>
                <?php
                    }
                }
                else{
                    ?>
                    <p style="color:red;">No Record Found</p>
                    <?php
                }
                ?>
                <br><br>
            </div>
        </div>
    </div>

</body>
<?php
include('checkSession.php');
include('UserDefinedLibrary.php');
$qry = "select txtMachineNo, txtMachineName, txtMake, case when txtActiveFlag = 'Y' then 'Active' else 'Inactive' end txtActiveFlag, dtDateTime  from alpro_prod.mst_machine";

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
	<title>Machine Master Data View</title>
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
            <h1>View Machine Master Data</h1><br><br>
            <input type="text" size="20" id="myInput_1" class="myInputCSS" onkeyup="myFunction('myInput_1','2')" placeholder="Search for Machine ID" title="Type in a ID">
            <input type="text" size="20" id="myInput_2" class="myInputCSS" onkeyup="myFunction('myInput_2','3')" placeholder="Search for Machine Name" title="Type in a name">

                <?php
                if ($data) {
                    ?>
                    <table id="dataTable" border="2">
                        <tr>
                            <th></th>
                            <th></th>
                            <th>Machine No</th>
                            <th>Machine Name</th>
                            <th>Make</th>
                            <th>Machine Status</th>                            
                            <th>Transaction Date</th>
                        </tr>
                    <?php
                    // output data of each row
                    while($row = $data->fetch_assoc()) {
                ?>
                    <tr>
                        <!-- <td><a href="../php/MasterMachineUpdate.php?id=<?php echo $row['txtMachineNo']; ?>" class="myButton">Edit</a></td>
                        <td><a href="../php/MasterMachineDelete.php?id=<?php echo $row['txtMachineNo']; ?>" class="myButton" onclick="return clicked();">Delete</a></td> -->
                        <?php
                        $td_obj = edit_delete_role_based("MasterMachineUpdate","MasterMachineDelete",$param,"ToolroomUser,Admin");
                        echo($td_obj);
                        ?>
                        <td><?php echo $row['txtMachineNo']; ?> </td>
                        <td><?php echo $row['txtMachineName']; ?> </td>
                        <td><?php echo $row['txtMake']; ?> </td>
                        <td><?php echo $row['txtActiveFlag']; ?> </td>
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
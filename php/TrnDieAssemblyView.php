<?php
include('checkSession.php');
include('UserDefinedLibrary.php');
$qry = "select * from alpro_prod.trn_die_assembly order by dtDateTime desc";

$data = getDataFromDB($qry);
//echo($data);
?>
<!-- HTML -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Die Assembly View</title>
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
            <h1>Die Assembly View</h1><br><br>
            <input type="text" size="20" id="myInput_1" class="myInputCSS" onkeyup="myFunction('myInput_1','2')" placeholder="Search for Assembly Srl No">
            <input type="text" size="20" id="myInput_2" class="myInputCSS" onkeyup="myFunction('myInput_2','3')" placeholder="Search for Die No">

                <?php
                if ($data) {
                    ?>
                    <table id="dataTable" border="2">
                        <tr>
                            <th></th>
                            <th></th>
                            <th>Assembly Serial</th>
                            <th>Die No</th>
                            <th>Die Plate</th>
                            <th>Backer</th>
                            <th>Insert Bolster</th>
                            <th>Feeder</th>
                            <th>Mandrel</th>
                            <th>Backer Insert</th>
                            <th>Bolster Ring</th>
                            <th>Die Adopter</th>
                            <th>Die Insert</th>
                            <th>Die Ring </th>
                        </tr>
                    <?php
                    // output data of each row
                    while($row = $data->fetch_assoc()) {
                    $param = 'id='.$row['PkAssemblyNo'];                    
                ?>
                    <tr>
                         <!-- <td><a href="../php/TrnDieAssemblyUpdate.php?<?php echo $param; ?>" class="myButton">Edit</a></td>
                        <td><a href="../php/TrnDieAssemblyDelete.php?<?php echo $param; ?>" class="myButton" onclick="return clicked();">Delete</a></td> -->
                        <?php
                        $td_obj = edit_delete_role_based("TrnDieAssemblyUpdate","TrnDieAssemblyDelete",$param,"ToolroomUser,Admin");
                        echo($td_obj);
                        ?>
                        <td><?php echo $row['PkAssemblyNo']; ?> </td>
                        <td><?php echo $row['txtDieNo']; ?> </td>
                        <td><?php echo $row['txtDiePlate']; ?> </td>
                        <td><?php echo $row['txtBacker']; ?> </td>
                        <td><?php echo $row['txtIB']; ?> </td>
                        <td><?php echo $row['txtFeeder']; ?> </td>
                        <td><?php echo $row['txtMandrel']; ?> </td>
                        <td><?php echo $row['txtInsertBacker']; ?> </td>
                        <td><?php echo $row['txtBolstarRing']; ?> </td>
                        <td><?php echo $row['txtDieAdopter']; ?> </td>
                        <td><?php echo $row['txtDieInsert']; ?> </td>
                        <td><?php echo $row['txtDieRing']; ?> </td>
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
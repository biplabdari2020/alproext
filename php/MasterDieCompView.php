<?php
include('checkSession.php');
include('UserDefinedLibrary.php');
$qry = "select txtDieNo, txtDieCompName, a.txtCompName,txtCompStatus, dtDateTime  from alpro_prod.mst_die_comp a left join alpro_prod.mst_const_diecomp b on (a.txtCompCode = b.txtDieCompCode) order by a.dtDateTime desc";

$data = getDataFromDB($qry);
//echo($data);
?>
<!-- HTML -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Die Component Master View</title>
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
            <h1>Die Component Master View</h1><br><br>
            <input type="text" size="20" id="myInput_1" class="myInputCSS" onkeyup="myFunction('myInput_1','2')" placeholder="Search for Die No">
            <input type="text" size="20" id="myInput_2" class="myInputCSS" onkeyup="myFunction('myInput_2','3')" placeholder="Search for Component">

                <?php
                if ($data) {
                    ?>
                    <table id="dataTable" border="2">
                        <tr>
                            <th></th>
                            <th></th>
                            <th>Die No</th>
                            <th>Component</th>
                            <th>Component ID</th>
                            <th>Status</th>
                            <th>Transaction Date</th>
                        </tr>
                    <?php
                    // output data of each row
                    while($row = $data->fetch_assoc()) {
                    $param = 'id='.$row['txtDieNo'].'&id2='.str_replace(" ","||",$row['txtCompName']);
                    
                    
                ?>
                    <tr>
                         <!-- <td><a href="../php/MasterDieCompUpdate.php?<?php echo $param; ?>" class="myButton">Edit</a></td>
                        <td><a href="../php/MasterDieCompDelete.php?<?php echo $param; ?>" class="myButton" onclick="return clicked();">Delete</a></td> -->
                        <?php
                        $td_obj = edit_delete_role_based("MasterDieCompUpdate","MasterDieCompDelete",$param,"ToolroomUser,Admin");
                        echo($td_obj);
                        ?>
                        <td><?php echo $row['txtDieNo']; ?> </td>
                        <td><?php echo $row['txtDieCompName']; ?> </td>
                        <td><?php echo $row['txtCompName']; ?> </td>
                        <td><?php echo $row['txtCompStatus']; ?> </td>
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
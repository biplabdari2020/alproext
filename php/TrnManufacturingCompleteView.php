<?php
include('checkSession.php');
include('UserDefinedLibrary.php');
$qry = "SELECT txtDieNo, txtComponent,txtCompleteFlag from alpro_prod.trn_mfg_complete ";
//echo $qry ;
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
	<title>Manufacturing Complete View</title>
    <link rel="icon" href="../staticfiles/img/logo.png">
	<link rel="stylesheet" href="../staticfiles/css/style.css">
	<script src="../staticfiles/js/jquery-3.3.1.js"></script>
	<script src="../staticfiles/js/reusable.js"></script>
    <script>
        function clicked(){
            return confirm('Do you want to continue ..');                                               
        }
        function Checked(flag){
            
                alert("Already Received. Cannot "+flag+" Entry");
            
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
            <h1>Manufacturing Complete View</h1><br><br>
            <input type="text" size="20" id="myInput_1" class="myInputCSS" onkeyup="myFunction('myInput_1','1')" placeholder="Search for Die" title="Type in a name">
            <input type="text" size="20" id="myInput_2" class="myInputCSS" onkeyup="myFunction('myInput_2','2')" placeholder="Search for Component" title="Type in a name">
                <?php
                if ($data) {
                    ?>
                    <br>
                    <input onclick = "exportDatatoCSV('dataTable','ManufacturingComplete')" type="submit" name="Submit" id="Submit" value="Download Report" class="submit-btn">
                    <!-- <input onclick = "printPage('dataTable')" type="submit" name="Submit" id="Submit" value="Print" class="submit-btn"> -->
                    <br><br>
                    <Center><table id="dataTable" border="2">
                        <tr>
                            <th></th>
                            <th>Die No</th>
                            <th>Component No</th>
                            <th>Completed?</th>
                        </tr>
                    <?php
                    // output data of each row
                    while($row = $data->fetch_assoc()) {
                ?>
                    <tr>
                    
                    <td><a href="../php/TrnManufacturingCompleteDelete.php?id=<?php echo $row['txtDieNo']; ?>" class="myButton" onclick="return clicked();">Delete</a></td>
                        <td><?php echo $row['txtDieNo']; ?></td>
                        <td><?php echo $row['txtComponent']; ?></td>
                        <td><?php echo $row['txtCompleteFlag']; ?></td>
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
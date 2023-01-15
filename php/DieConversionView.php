<?php
include('checkSession.php');
include('UserDefinedLibrary.php');
$qry = "select * from alpro_prod.trn_die_conversion";
$data = getDataFromDB($qry);
//echo($data);
?>
<!-- HTML -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Die Conversion</title>
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
            <h1>Die Conversion</h1><br><br>
            <input type="text" size="20" id="myInput_1" class="myInputCSS" onkeyup="myFunction('myInput_1','2')" placeholder="Search for Die No" title="Type Die No">

                <?php
                if ($data) {
                    ?>
                    <table id="dataTable" border="2">
                        <tr>
                            <th></th> 
                            <th></th>                        
							<th>Rejected Die No</th>
							<th>Rejected Component</th>
							<th>Converted Die No</th>
							<th>Converted Component</th>
							<th>Remarks</th>
                            <th>Last Updated</th>
                        </tr>
                    <?php
                    // output data of each row
                    $qry = "select * from alpro_prod.trn_die_conversion";
                    $data = getDataFromDB($qry);

                    while($row = $data->fetch_assoc()) {
                    $param = 'id1='.$row['txtDieNo'].'&id2='.str_replace(" ","||",$row['txtComponent']);
                    
                ?>
                    <tr>
                    <?php
                        $td_obj = edit_delete_role_based("DieConversionUpdate","DieConversionDelete",$param,"ToolroomUser,Admin");
                        echo($td_obj);
                        ?>
                        <td><?php echo $row['txtDieNo']; ?> </td>
                        <td><?php echo $row['txtComponent']; ?> </td>
                        <td><?php echo $row['txtDieNoConv']; ?> </td>
                        <td><?php echo $row['txtComponentConv']; ?> </td>
                        <td><?php echo $row['txtRemarks']; ?> </td>
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
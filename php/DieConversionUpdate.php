<?php
include('checkSession.php');
include('UserDefinedLibrary.php');
//if (strlen($_GET['id'])>0 and strlen($_GET['id2'])>0){
$txtDieNo=$_GET['id1'];
$txtCompCode=$_GET['id2'];
// echo "<br>".$txtDieNo;
// echo "<br>".$txtCompCode;
$txtCompCode=str_replace("||"," ",$txtCompCode);
$qry = "select * from alpro_prod.trn_die_conversion where txtDieNo = '".$txtDieNo."' and txtComponent = '".$txtCompCode."'";
$data = getDataFromDB($qry);

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
        function getComponentConv(){
			var id = document.getElementById("txtDieNoConv").value;
			console.log(id);
			console.log("welcome")
			$.ajax({
				url: 'dependantDataAjax.php',
				dataType: "json",
				data: {'action': 'getCompCodefromDieNo2','id':id},
				success: function(return_data){
					console.log(return_data);
					$('select[name="txtComponentConv"]').empty();					
					$.each(return_data,function(key,value){
						$('select[name="txtComponentConv"]').append('<option value="'+ value +'">'+ value +'</option>');						
					});
				}
			});
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
                
                <?php
                    if ($data) {
                    ?>
                    <form name="DieConversionUpdate" method="post" action="../php/DieConversionUpdateDB.php">
                        <table id="dataTable" border="2">
                            <tr>
                            <th>Rejected Die No</th>
							<th>Rejected Component</th>
							<th>Converted Die No</th>
							<th>Converted Component</th>
							<th>Remarks</th>
                           
                            </tr>
                        <?php
                        // output data of each row
                        while($row = $data->fetch_assoc()) {
                ?>
                            <tr> 
                                <td><?php echo $row['txtDieNo']; ?> </td>
                                <td><?php echo $row['txtComponent'];?></td>   
                                <td>
                                <select name="txtDieNoConv" id="txtDieNoConv" onclick="getComponentConv()">
                                <option value="<?php echo $row['txtDieNoConv']; ?>"><?php echo $row['txtDieNoConv']; ?></option>
                                    <?php
									$qry = "select distinct txtDieNo from alpro_prod.mst_die where txtDieStatus in ('NEW','OK') and txtDieNo !="."'".$row['txtDieNoConv']."'";
									$data = getDataFromDB($qry);
									while($row2 = $data->fetch_assoc()) {
									?>
										<option value="<?php echo $row2['txtDieNo']; ?>"><?php echo $row2['txtDieNo']; ?></option>
									<?php	
									}
									?>
								</select>
                                </td>
                                <td>
								<select name="txtComponentConv" id="txtComponentConv">
									<option value="<?php echo $row['txtComponentConv']; ?>"><?php echo $row['txtComponentConv']; ?></option>
								
								</select>
							</td>
                                                              
                            <td><input type="textarea" rows="5" style="width:200px; height:35px;"  name="txtRemarks" id="txtRemarks" value="<?php echo $row['txtRemarks']; ?>" ></td>
                                <!-- <td><input type="text" name="txtCompName" id="txtCompName" value="<?php echo $row['txtCompName']; ?>" required></td> -->
                                
                                
                            </tr>
				        </table>
                        <input type="hidden" name="txtDieNo" id="txtDieNo" value="<?php echo($txtDieNo); ?>">
                        <input type="hidden" name="txtDieCompCode" id="txtDieCompCode" value="<?php echo($txtCompCode); ?>">
                        <br><br>
				        <input type="submit" name="Submit" id="Submit" value="Update" class="myButton">
                        <a href="../php/DieConversionView.php" class="myButton">Back</a>

				        <br><br>
				    </form>
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




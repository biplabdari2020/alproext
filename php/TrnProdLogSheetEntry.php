<?php
include('checkSession.php');
include('UserDefinedLibrary.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Production Log Sheet</title>
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
				<form name="MasterProdLogSheetEntry" method="post" action="../php/MasterProdLogSheetEntry.php">
					<h2>Production Log Sheet</h2><br><br>
					<!-- <INPUT type="button" class="myButton" value="Delete Row" onclick="delRow()" /> -->
					<!-- <INPUT type="button" class="myButton" value="Add Row" onclick="addRow()" /><br><br> -->
					<table id="dataTable" border="2">
						<tr></tr>
						<tr>
							<!-- <td><INPUT type="checkbox" name="checkbox_name" id="checkbox_id" /></td> -->
							 
							<td><center>             
							Press<input type="text" name="txtLogNo" id="txtLogNo" placeholder="Press" value="" >
                            </center></td>
							 
							 
							<td><center>
							Date<input type="datetime-local" name="txtLogNo" id="txtLogNo" placeholder="" value="" >
							</center></td>
							 
							 
							<td> <center>                
							Shift Detail<input type="text" name="txtLogNo" id="txtLogNo" placeholder="" value="" >
                            </center></td>
							 
							 
							<td><center> 
							Lot No<input type="text" name="txtLogNo" id="txtLogNo" placeholder="" value="" >
							</center></td>

						</tr>
						<tr></tr>
						<tr>
                             
							<td><center> 
							Die No<input type="text" name="txtLogNo" id="txtLogNo" placeholder="" value="" >
							</center></td>
							 
							 
							<td><center> 
							No Of Holes (Cavity)<input type="text" name="txtLogNo" id="txtLogNo" placeholder="" value="" >
							</center></td>
							 
							 
							<td> <center>                
							QuenchingMedia(Water/Air)<input type="text" name="txtLogNo" id="txtLogNo" placeholder="" value="" >
                            </center></td>
							 
							 
							<td><center> 
							Start Time<input type="datetime-local" name="txtLogNo" id="txtLogNo" placeholder="" value="" >
							</center></td>
						</tr>
						<tr></tr>

						<tr>
                             
							<td><center> 
							End Time<input type="datetime-local" name="txtLogNo" id="txtLogNo" placeholder="" value="" >
							</center></td>
							 
							 
							<td><center> 
							Running Hour<input type="text" name="txtLogNo" id="txtLogNo" placeholder="" value="" >
							</center></td>
							 
							 
							<td>  <center>               
							Log Alloy Cast No (Billet)<input type="text" name="txtLogNo" id="txtLogNo" placeholder="" value="" >
                            </center></td>
							 
							 
							<td><center> 
							Alloy Temper (Billet)<input type="text" name="txtLogNo" id="txtLogNo" placeholder="" value="" >
							</center></td>
						</tr>
						<tr></tr>
						<tr>
                             
							<td><center> 
							Billet Temp<input type="text" name="txtLogNo" id="txtLogNo" placeholder="" value="" >
							</center></td>
							 
							 
							<td><center> 
							Billet Size<input type="text" name="txtLogNo" id="txtLogNo" placeholder="" value="" >
							</center></td>
							 
							 
							<td>  <center>               
							No Of Billet<input type="text" name="txtLogNo" id="txtLogNo" placeholder="" value="" >
                            </center></td>
							 
							 
							<td><center> 
							Input (KG)<input type="text" name="txtLogNo" id="txtLogNo" placeholder="" value="" >
							</center></td>
						</tr>
						<tr></tr>

						<tr>
                             
							<td><center> 
							Discharge Thickness (mm)<input type="text" name="txtLogNo" id="txtLogNo" placeholder="" value="" >
							</center></td>
							 
							 
							<td><center> 
							Cutting Length (Mtr)<input type="text" name="txtLogNo" id="txtLogNo" placeholder="" value="" >
							</center></td>
							 
							 
							<td> <center>                
							Wt./ Pc (KG)<input type="text" name="txtLogNo" id="txtLogNo" placeholder="" value="" >
                            </center></td>
							 
							 
							<td><center> 
							No Of Good Pcs<input type="text" name="txtLogNo" id="txtLogNo" placeholder="" value="" >
							</center></td>
						</tr>
						<tr></tr>

						<tr>
                             
							<td><center> 
							OutPut Weight (KG)<input type="text" name="txtLogNo" id="txtLogNo" placeholder="" value="" >
							</center></td>
							 
							 
							<td><center> 
							Recovery %<input type="text" name="txtLogNo" id="txtLogNo" placeholder="" value="" >
							</center></td>
							 
							 
							<td> <center>                
							Output /Hr (KG)<input type="text" name="txtLogNo" id="txtLogNo" placeholder="" value="" >
                            </center></td>
							 
							 
							<td><center> 
							Remarks<input type="txtmessage" name="txtLogNo" id="txtLogNo" placeholder="" value="" >
							</center></td>
						</tr>
					</table>
					<br><br>
					<input type="submit" name="Submit" id="Submit" value="Submit" class="submit-btn">
					<br><br>
				</form>
			</div>
		</div>
	</div>
</body>

</html>
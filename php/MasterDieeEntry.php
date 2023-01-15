<?php
include('checkSession.php');
include('UserDefinedLibrary.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Die Master Data Entry</title>
	<link rel="icon" href="../staticfiles/img/logo.png">
	<link rel="stylesheet" href="../staticfiles/css/style.css">
	<script src="../staticfiles/js/jquery-3.3.1.js"></script>
	<script src="../staticfiles/js/reusable.js"></script>

	<script>
function getNextDie(){
	var id = document.getElementById("txtSectionNo").value;	
	var id1 = document.getElementById("txtPress").value;	
        console.log(id)
        $.ajax({
            url: 'dependantDataAjax.php',
            dataType: "json",
            data: {'action': 'jsgetNextDieNo','id':id,'id1':id1},
            success: function(return_data){
                console.log(return_data)
                document.getElementById("txtDieNo").value=id + "/" + id1 + "/" + return_data.txtDieNo;				
            }
        });
		}
	function getNominalWt(){
	var id = document.getElementById("txtSectionNo").value;	
        console.log(id)
        $.ajax({
            url: 'dependantDataAjax.php',
            dataType: "json",
            data: {'action': 'jsgetNominalWt','id':id},
            success: function(return_data){
                console.log(return_data)
                document.getElementById("numDieWt").value=return_data.txtNormalWt;				
                document.getElementById("txtNewSection").innerText=return_data.txtNewSection;	
                document.getElementById("txtMinWtRange").innerText=return_data.txtMinWtRange;	
                document.getElementById("txtMaxWtRange").innerText=return_data.txtMaxWtRange;	

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
				<form name="MasterDieeAdd" method="post" action="../php/MasterDieeAdd.php">
					<h2>Die Master Data Entry</h2><br><br>
					<!-- <INPUT type="button" class="myButton" value="Delete Row" onclick="delRow()" /> -->
					<!-- <INPUT type="button" class="myButton" value="Add Row" onclick="addRow()" /><br><br> -->
					<table id="dataTable" border="2">
						<tr>
							<!-- <th></th> -->
							<th>Section No</th>	
							<th>New Section No</th>						
							<th>Press</th>
							<th>Die No</th>
							<th>Cavity</th>
							<th>Alloy</th>
							<th>Nominal Weight (Kg/mtr)</th>
							<th>Min Weight (Section) (Kg/12Ft)</th>
							<th>Max Wight (Section) (Kg/12Ft)</th>
							<th>Est. Die Life (MT)</th>
							<th>Est. Die Trial</th>
							<th>Est. Input Rate (Kg/Hr)</th>
							<th>Est. Output Rate (Kg/Hr)</th>
							<th>Nitriding Frequency (Kg)</th>
							<!-- <th>Last Run Weight (wt/mtr)</th> -->
							<th>Manufactured by</th>
						</tr>
						<tr>
							<!-- <td><INPUT type="checkbox" name="checkbox_name" id="checkbox_id" /></td> -->
							<td>
								<!-- create single level drop down -->
								<select name="txtSectionNo" id="txtSectionNo" onclick="getNominalWt();">
									<option value="">--Select--</option>
									<?php
									$qry = "select distinct txtSectionNo, txtSectionDesc from alpro_prod.mst_section order by txtSectionNo";
									$data = getDataFromDB($qry);
									while($row = $data->fetch_assoc()) {
									?>
										<option value="<?php echo $row['txtSectionNo']; ?>"><?php echo $row['txtSectionNo']; ?></option>
									<?php	
									}
									?>
								</select>
								<!-- create single level drop down -->

							</td>		
							<td id="txtNewSection"></td>					
							<td>
							<select name="txtPress" id="txtPress" onclick ="getNextDie();">
									<option value="">--Select--</option>
									<option value="P1">P1</option>
									<option value="P2">P2</option>
									<option value="P3">P3</option>
									<option value="P1&P2">P1&P2</option>
								</select>
							</td>
							<td>
								<input type="text" style="width: 10em" name="txtDieNo" id="txtDieNo" placeholder="" 
									required>
							</td>
							<td>
								<input type="number" style="width: 4em" name="NumCavity" id="NumCavity" placeholder="" value=""
									required>
							</td>
							<td>
								<input type="text" size="5" name="txtAlloy" id="txtAlloy" placeholder="" value=""
									required>
							</td>
							<td>
								<input type="float" size="4" name="numDieWt" id="numDieWt" placeholder="" value=""
									required>
							</td>
							<td id="txtMinWtRange"></td>
							<td id="txtMaxWtRange"></td>
							<td>
								<input type="float" size="6" name="numEstLife" id="numEstLife" placeholder="" value=""
									required>
							</td>
							<td>
								<input type="number" style="width: 4em" name="numEstTrial" id="numEstTrial" placeholder="" value="0">
							</td>
							<td>
								<input type="number" style="width: 4em"  name="numEstInputRate" id="numEstInputRate" placeholder="" value="0">
							</td>
							<td>
								<input type="number" style="width: 4em"  name="numEstOutputRate" id="numEstOutputRate" placeholder="" value="0">
							</td>
							<td>
								<input type="float" size="4" name="numNitdrFreq" id="numNitdrFreq" placeholder="" value=""
									required>
							</td>
							<!-- <td>
								<input type="float" size="6" name="numLastRunWt" id="numLastRunWt" placeholder="" value=""
									required>
							</td> -->
							<td>
								<input type="text" size="8" name="txtMfgBy" id="txtMfgBy" placeholder="" value=""
									required>
							</td>
							
							
						</tr>
					</table>
					 <td>
								<input type="hidden" size="6" name="numLastRunWt" id="numLastRunWt" placeholder="" value="0"
									required>
							</td> 
					<td>
								<input type="hidden" size="8" name="txtDieStatus" id="txtDieStatus" placeholder="" value="New"
									required>
							</td>
					<br><br>
					<input type="submit" name="Submit" id="Submit" value="Submit" class="submit-btn">
					<br><br>
				</form>
			</div>
		</div>
	</div>
</body>

</html>
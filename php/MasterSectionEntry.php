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
	<title>Section Master Data Entry</title>
	<link rel="icon" href="../staticfiles/img/logo.png">
	<link rel="stylesheet" href="../staticfiles/css/style.css">
	<script src="../staticfiles/js/jquery-3.3.1.js"></script>
	<script src="../staticfiles/js/reusable.js"></script>
	<script>
		function getFilePath(){
var input = document.getElementById( 'file-upload' );
var infoArea = document.getElementById( 'file-upload-filename' );

input.addEventListener( 'change', showFileName );

function showFileName( event ) {
  
  // the change event gives us the input it occurred in 
  var input = event.srcElement;
  
  // the input has an array of files in the `files` property, each one has a name that you can use. We're just using the name here.
  var fileName = input.files[0].name;
  
  // use fileName however fits your app best, i.e. add it into a div
  infoArea.textContent = 'File name: ' + fileName;
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
				<form name="MasterSectionAdd" method="post" action="../php/MasterSectionAdd.php" enctype='multipart/form-data'>
					<h2>Section Master Data Entry</h2><br><br>
					<!-- <INPUT type="button" class="myButton" value="Delete Row" onclick="delRow()" /> -->
					<!-- <INPUT type="button" class="myButton" value="Add Row" onclick="addRow()" /><br><br> -->
					<table id="dataTable" border="2">
						<tr>
							<th></th>							
							<th>New Section No</th>
							<th>Section No</th>
							<th>Drawing No</th>
							<th>Section Descriprtion</th>
							<th>Type Of Section</th>
							<th>Section Category</th>
							<th>Nominal Weight (Kg/Mtr)</th>							
							<th>Min Weight Range (Kg/12Ft)</th>
							<th>Max Weight Range (Kg/12Ft)</th>
							<th>Drawing File</th>
						</tr>
						<tr>
							<td><INPUT type="checkbox" name="checkbox_name" id="checkbox_id" /></td>
							
							<td>
								<input type="text" size=6 name="txtNewSection" id="txtNewSection" placeholder="" value=""
									required>
							</td>
							<td>
								<input type="text" size=6 name="txtSectionNo" id="txtSectionNo" placeholder="" value=""
									required>
							</td>
							<td><input type="text" id="txtIdentificationNo" name="txtIdentificationNo"  value=""></td>							
							<!-- <td>
								<input type="text" size=10 name="txtIdentificationNo" id="txtIdentificationNo" placeholder=""
									value="" required>
							</td> -->
							<td>
								<input type="txtMessage" size=40 name="txtSectionDesc" id="txtSectionDesc" placeholder=""
									value="" required>
							</td>
							<td>
							<select name="txtTypeOfSection" id="txtTypeOfSection">
									<option value="">--Select--</option>
									<?php
									$qry = "select distinct txtTypeOfSection, txtTypeOfSectionDesc from alpro_prod.mst_cons_sectiontype order by txtTypeOfSection";
									$data = getDataFromDB($qry);
									while($row = $data->fetch_assoc()) {
									?>
										<option value="<?php echo $row['txtTypeOfSection']; ?>"><?php echo $row['txtTypeOfSectionDesc']; ?></option>
									<?php	
									}
									?>
								</select>
							</td>
							<td>
							<select name="txtSectionCategoryCode" id="txtSectionCategoryCode">
									<option value="">--Select--</option>
									<?php
									$qry = "select distinct txtSectionCategoryCode, txtSectionCategoryDesc from alpro_prod.mst_cons_section_category order by txtSectionCategoryCode";
									$data = getDataFromDB($qry);
									while($row = $data->fetch_assoc()) {
									?>
										<option value="<?php echo $row['txtSectionCategoryCode']; ?>"><?php echo $row['txtSectionCategoryDesc']; ?></option>
									<?php	
									}
									?>
								</select>
							</td>
							<td>
								<input type="float" size=6 name="txtNormalWt" id="txtNormalWt" placeholder="" value="0.00"
									>
							</td>
							<td>
								<input type="float" size=6 name="txtMinWtRange" id="txtMinWtRange" placeholder="" value="0"
									>
							</td>
							<td>
								<input type="float" size=6 name="txtMaxWtRange" id="txtMaxWtRange" placeholder="" value="0"
									>
							</td>
							<td><input type="file" id="txtDrawingFile" name="txtDrawingFile" type="file" value="drawing"></td>
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



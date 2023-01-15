<!DOCTYPE html>
<?php 
	include('checkSession.php');
	include('UserDefinedLibrary.php');
 
?>	
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Import Excel To MySQL Database Using PHP </title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Import Excel File To MySQL Database Using php">
 
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/bootstrap-responsive.min.css">
		<link rel="stylesheet" href="css/bootstrap-custom.css">
 
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Die Rejection</title>
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
	<div id="menu_bar_php"></div>    
	<!-- Navbar
    ================================================== -->
 

	<div class="myDiv">
        <div class="container">
            <div class="contact-form medium-padding120">
			<div class="span3 hidden-phone"></div>
			<div class="span6" id="form-login">
				<form class="form-horizontal well" action="csvupload_add.php" method="post" name="upload_excel" enctype="multipart/form-data">
					<fieldset>
						<legend>Import CSV/Excel file</legend>
						<div class="control-group">
							
							<div class="controls">
								<input type="file" name="file" id="file" class="input-large">
							</div>
						</div>
 
						<div class="control-group">
							<div class="controls">
							<button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Upload</button>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
			<div class="span3 hidden-phone"></div>
		</div>
 
		<table class="table table-bordered">
			<thead>
				  	<tr>
				  		<th>ID</th>
				  		<th>Subject</th>
				  		<th>Description</th>
				  		<th>Unit</th>
				  		<th>Semester</th>
 
 
				  	</tr>	
				  </thead>
			<?php
				$qry = "SELECT * FROM alpro_prod.subject ";
				$data = getDataFromDB($qry);
				while($row = $data->fetch_assoc()) 
				{
				?>
 
					<tr>
						<td><?php echo $row['SUBJ_ID']; ?></td>
						<td><?php echo $row['SUBJ_CODE']; ?></td>
						<td><?php echo $row['SUBJ_DESCRIPTION']; ?></td>
						<td><?php echo $row['UNIT']; ?></td>
						<td><?php echo $row['SEMESTER']; ?></td>
 
 
					</tr>
				<?php
				}
			?>
		</table>
	</div>
 
	</div>
 
	</body>
</html>
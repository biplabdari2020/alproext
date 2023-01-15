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
	<title>Die Master Search</title>
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
				<form name="MasterSectionAdd" method="post" action="../php/MasterDieeView_2.php">
					<h2>Die Master Search</h2><br><br>
					<input type="text" name="txtSectionNo" id="txtSectionNo" title="Section No" placeholder="Section No" style="font-size: 18pt; height: 40px; width:280px; ">
					<input type="text" name="txtDieNo" id="txtDieNo" title="Die No" placeholder="Die No" style="font-size: 18pt; height: 40px; width:280px; ">
					<br><br>
					
					<br><br>
					<input type="submit" name="Submit" id="Submit" value="View" class="submit-btn">
					<br><br>
				</form>
			</div>
		</div>
	</div>
</body>

</html>



<?php
include('checkSession.php');
include('UserDefinedLibrary.php');

$txtSessionId = session_id();
$txtUserCode = $_SESSION["username"];

if (isset($_POST['Submit'])) {

    $txtScreen        =   $_POST['txtScreen'];
	$txtDieNo  = $_POST['txtDieNo'];
    $loc = "Location: ../php/".$txtScreen.".php?id=".$txtDieNo;
	echo $loc;
		header( $loc);  	
}
else{
    echo("<br>Not SUBMITTED<br>");
}

?>

<!-- HTML -->



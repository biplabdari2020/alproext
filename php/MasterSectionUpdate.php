<?php
include('checkSession.php');
include('UserDefinedLibrary.php');
$txtSectionNo=$_GET['id'];
$qry = "select txtSectionNo, txtNewSection, txtIdentificationNo,txtDrawingFile, txtSectionDesc, a.txtTypeOfSection,b.txtTypeOfSectionDesc, txtNormalWt, txtMaxWtRange, txtMinWtRange, dtDateTime, mst_sectioncol, a.txtSectionCategoryCode,c.txtSectionCategoryDesc from alpro_prod.mst_section a  left outer join  alpro_prod.mst_cons_sectiontype b  on a.txtTypeOfSection=b.txtTypeOfSection  left outer join alpro_prod.mst_cons_section_category c  on a.txtSectionCategoryCode=c.txtSectionCategoryCode where txtSectionNo = '".$txtSectionNo."'";

$data = getDataFromDB($qry);

?>

<!-- HTML -->

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Section Master View</title>
    <link rel="icon" href="../staticfiles/img/logo.png">
	<link rel="stylesheet" href="../staticfiles/css/style.css">
	<script src="../staticfiles/js/jquery-3.3.1.js"></script>
	<script src="../staticfiles/js/reusable.js"></script>
   <script>
    window.pressed = function(){
    var a = document.getElementById('txtIdentificationNo');
    if(a.value == "")
    {
        fileLabel.innerHTML = "Choose file";
    }
    else
    {
        var theSplit = a.value.split('\\');
        fileLabel.innerHTML = theSplit[theSplit.length-1];
    }
};
   </script>
</head>
<body onload ="loadfile();">
    <!-- Start : for menu bar -->
	<div id="menu_bar_php"></div>    
	<!-- End for menu bar -->
    <div class="myDiv">
        <div class="container">
            <div class="contact-form medium-padding120">
            <h1>Update Section Master Data</h1><br>
            <br>
            <br>
                <?php
                    if ($data) {
                    ?>
                    <form name="MasterSectionUpdate" method="post" action="../php/MasterSectionUpdate.php" enctype='multipart/form-data' >
                        <table id="dataTable" border="2">
                            <tr>
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
                                <th>Trasaction Date</th>
                            </tr>
                        <?php
                        // output data of each row
                        while($row = $data->fetch_assoc()) {
                           
                ?>
                            <tr> 
                                <td><?php echo $row['txtNewSection']; ?> </td>
                                <td><?php echo $row['txtSectionNo']; ?> </td>
                                
                                <!-- <td><input size=6 type="text" name="txtNewSection" id="txtNewSection" value="<?php echo $row['txtNewSection']; ?>" required></td> -->
                                <!-- <td><input type="text" name="txtSectionNo" id="txtSectionNo" value="<?php echo $row['txtSectionNo']; ?>" required></td> -->
                                <td><input type="text" id="txtIdentificationNo" name="txtIdentificationNo" value="<?php echo $row['txtIdentificationNo']; ?>"></td>
                                
                                
                                <td><input size=40 type="txtMessage" name="txtSectionDesc" id="txtSectionDesc" value="<?php echo $row['txtSectionDesc']; ?>" required></td>
                                <td>									
								<!-- Type Of Section Dropdown -->
								<select name="txtTypeOfSection" id="txtTypeOfSection">
								<option value="<?php echo $row['txtTypeOfSection']; ?>"><?php echo $row['txtTypeOfSectionDesc']; ?></option>
									<?php
									$qry = "select distinct txtTypeOfSection,txtTypeOfSectionDesc from alpro_prod.mst_cons_sectiontype where txtTypeOfSection !="."'".$row['txtTypeOfSection']."'";
									$data = getDataFromDB($qry);
									while($row1 = $data->fetch_assoc()) {
									?>
										<option value="<?php echo $row1['txtTypeOfSection']; ?>"><?php echo $row1['txtTypeOfSectionDesc']; ?></option>
									<?php	
									}
									?>
								</select>
								<!-- Type Of Section Dropdown -->
							</td>
                            <td>									
								<!-- Section Category Dropdown -->
								<select name="txtSectionCategoryCode" id="txtSectionCategoryCode">
								<option value="<?php echo $row['txtSectionCategoryCode']; ?>"><?php echo $row['txtSectionCategoryDesc']; ?></option>
									<?php
									$qry = "select distinct txtSectionCategoryCode, txtSectionCategoryDesc from alpro_prod.mst_cons_section_category where txtSectionCategoryCode !="."'".$row['txtSectionCategoryCode']."'";
									$data = getDataFromDB($qry);
									while($row1 = $data->fetch_assoc()) {
									?>
										<option value="<?php echo $row1['txtSectionCategoryCode']; ?>"><?php echo $row1['txtSectionCategoryDesc']; ?></option>
									<?php	
									}
									?>
								</select>
								<!-- Section Category Dropdown -->
							</td>
                                <td><input size=6 type="float" name="txtNormalWt" id="txtNormalWt" value="<?php echo $row['txtNormalWt']; ?>" required></td>
                                <td><input size=6 type="float" name="txtMinWtRange" id="txtMinWtRange" value="<?php echo $row['txtMinWtRange']; ?>" required></td>
                                <td><input size=6 type="float" name="txtMaxWtRange" id="txtMaxWtRange" value="<?php echo $row['txtMaxWtRange']; ?>" required></td>                                
                                <td>
                                <input type="file" id="txtDrawingFile" name="txtDrawingFile" type="file" value="a">  </td>      
                                <input type="hidden" name="txtdrg" id="txtdrg" value="<?php echo $row['txtDrawingFile']; ?>">                         
                                <td><?php echo $row['dtDateTime']; ?> </td>
                            </tr>
				        </table>
                        <input type="hidden" name="txtSectionNo" id="txtSectionNo" value="<?php echo($txtSectionNo); ?>">
                        <!-- <input type="hidden" name="txtdrg" id="txtdrg" value="<?php echo $row['txtDrawingFile']; ?>">  -->
				        <br><br>
                        
				        <input type="submit" name="Submit" id="Submit" value="Update" class="myButton">
                        <a href="../php/MasterSectionView.php" class="myButton">Back</a>
            
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

<?php

if (isset($_POST['Submit'])){
    $locpath = $_POST['txtdrg'];    
    $target = "uploads/";
    $target_dir = "uploads/";
    $target = $target . basename( $_FILES['txtDrawingFile']['name']);
    $filename = $_FILES['txtDrawingFile']['name'];
    $filesize = $_FILES['txtDrawingFile']['size'];
    $location = $target_dir;
    if(!is_dir($location)){
        mkdir($location, 0755);
    }
    $location .= "/".$filename;
    if ($filename!="") {
        $locpath =$filename;
    }
    move_uploaded_file($_FILES['txtDrawingFile']['tmp_name'],$location);

    echo("<br>SUBMITTED<br>");   
    $update_qry = "update alpro_prod.mst_section set txtDrawingFile = '".$locpath."',txtSectionDesc='".$_POST['txtSectionDesc']."',txtIdentificationNo='".$_POST['txtIdentificationNo']."',txtTypeOfSection='".$_POST['txtTypeOfSection']."',txtSectionCategoryCode='".$_POST['txtSectionCategoryCode']."',txtNormalWt='".$_POST['txtNormalWt']."',txtMaxWtRange='".$_POST['txtMaxWtRange']."', txtMinWtRange='".$_POST['txtMinWtRange']."',dtDateTime = now() where txtSectionNo = '".$_POST['txtSectionNo']."'";
    echo("<br>".$update_qry."<br>");
    $execute_status = executeQuery($update_qry);
    if($execute_status != 'pass'){
        echo("<br>".$execute_status."<br>");
    }
   header("Location: ../php/MasterSectionView.php");  

}
else{
    echo("<br>Not SUBMITTED<br>");
}
?>
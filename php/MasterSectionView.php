<?php
include('checkSession.php');
include('UserDefinedLibrary.php');
$txtDieNo=$_GET['id'];
if ($txtDieNo!="") {
    $qry = "select txtSectionNo, txtNewSection, txtIdentificationNo,txtDrawingFile, txtSectionDesc, a.txtTypeOfSection,b.txtTypeOfSectionDesc, txtNormalWt, txtMaxWtRange, txtMinWtRange, dtDateTime, mst_sectioncol, a.txtSectionCategoryCode,c.txtSectionCategoryDesc from alpro_prod.mst_section a  left outer join  alpro_prod.mst_cons_sectiontype b  on a.txtTypeOfSection=b.txtTypeOfSection  left outer join alpro_prod.mst_cons_section_category c  on a.txtSectionCategoryCode=c.txtSectionCategoryCode where txtSectionNo like '%".$txtDieNo. "%' order by dtDateTime desc";
}
if ($txtDieNo=="") {
    $qry = "select txtSectionNo, txtNewSection, txtIdentificationNo,txtDrawingFile, txtSectionDesc, a.txtTypeOfSection,b.txtTypeOfSectionDesc, txtNormalWt, txtMaxWtRange, txtMinWtRange, dtDateTime, mst_sectioncol, a.txtSectionCategoryCode,c.txtSectionCategoryDesc from alpro_prod.mst_section a  left outer join  alpro_prod.mst_cons_sectiontype b  on a.txtTypeOfSection=b.txtTypeOfSection  left outer join alpro_prod.mst_cons_section_category c  on a.txtSectionCategoryCode=c.txtSectionCategoryCode order by dtDateTime desc";
    }


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
	<title>Section Master View</title>
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
            <h1>Section Master Data</h1><br><br>
            <input type="text" size="20" id="myInput_1" class="myInputCSS" onkeyup="myFunction('myInput_1','2')" placeholder="Search for New Section No" title="Type New Section No">
            <input type="text" size="20" id="myInput_2" class="myInputCSS" onkeyup="myFunction('myInput_2','3')" placeholder="Search for Section No" title="Type Section No">
            <input type="text" size="20" id="myInput_3" class="myInputCSS" onkeyup="myFunction('myInput_3','5')" placeholder="Search for Section Desc" title="Type Section Desc">
                <?php
                if ($data) {
                    ?>
                    <table id="dataTable" border="2">
                        <tr>
                            <th></th>
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
                            <th>Trasaction Date</th>
                        </tr>
                    <?php
                    // output data of each row
                    while($row = $data->fetch_assoc()) {
                ?>
                    <tr>
                        <!-- <td><a href="../php/MasterSectionUpdate.php?id=<?php echo $row['txtSectionNo']; ?>" class="myButton">Edit</a></td>
                        <td><a href="../php/MasterSectionDelete.php?id=<?php echo $row['txtSectionNo']; ?>" class="myButton" onclick="return clicked();">Delete</a></td>                         -->
                        <?php
                        $param = 'id='.$row['txtSectionNo'];
                        $td_obj = edit_delete_role_based("MasterSectionUpdate","MasterSectionDelete",$param,"ToolroomUser,Admin");
                        echo($td_obj);
                        ?>
                        <td><?php echo $row['txtNewSection']; ?> </td>
                        <td><?php echo $row['txtSectionNo']; ?> </td>
                        <td><?php echo $row['txtIdentificationNo']; ?></td>
                        <td><?php echo $row['txtSectionDesc']; ?> </td>
                        <td><?php echo $row['txtTypeOfSectionDesc']; ?> </td>
                        <td><?php echo $row['txtSectionCategoryDesc']; ?> </td>
                        <td><?php echo $row['txtNormalWt']; ?> </td>
                        <td><?php echo $row['txtMinWtRange']; ?> </td>
                        <td><?php echo $row['txtMaxWtRange']; ?> </td>        
                        <td><a href=<?php echo "uploads/".$row['txtDrawingFile']; ?> target="_blank"> <?php echo $row['txtDrawingFile']; ?></a></td>                
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
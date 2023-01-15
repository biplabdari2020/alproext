<?php
include('checkSession.php');
include('UserDefinedLibrary.php');

$txtSessionId = session_id();
$txtUserCode = $_SESSION["username"];
//print_r($_POST);


    //echo("<br>SUBMITTED<br>");
    $txtFilter = getFilterData($_POST);
    $rpt_name_msg = getMSGfromFilter($txtFilter);
    $txtName = $_POST['txtName'];
    $dtStartTime = $_POST['dtStartTime'];
    $dtEndTime = $_POST['dtEndTime'];
    //echo ("<br>".$txtName."<br>");
    $qry = "select txtReportHeader,txtColumnHeader,txtViewQry,txtGetTotalColumn from alpro_prod.mst_report where txtName = '$txtName'";
    $data = getDataFromDB($qry);
    while($row = $data->fetch_assoc()) {
        $txtReportHeader = $row['txtReportHeader'];
        $txtColumnHeader = $row['txtColumnHeader'];
        $txtViewQry = $row['txtViewQry'];
        $txtGetTotalColumn = $row['txtGetTotalColumn'];
    }
    $txtReportHeader = str_replace(", ",",",$txtReportHeader);
    $txtColumnHeader = str_replace(", ",",",$txtColumnHeader);
    $rpt_header_lst = explode(",",$txtReportHeader);
    $rpt_hd_cnt = count($rpt_header_lst);
    $clm_header_lst = explode(",",$txtColumnHeader);
    $clm_hd_cnt = count($clm_header_lst);
    if($rpt_hd_cnt!=$clm_hd_cnt){
        echo("<br>Report Header Count and Column Header Count should Match<br>");
        exit();
    }

    $hd_txt = "";
    foreach($rpt_header_lst as $hd_item){
        $hd_txt = $hd_txt."<th>".$hd_item."</th>";
    }
    
    $report_qry = "select * from (SELECT * FROM alpro_prod.".$txtViewQry.") as t where date(t.dtStartTime)  between '".$dtStartTime."' and '".$dtEndTime."'";
    $report_qry = "select  @serialNumber := @serialNumber+1 as rownum ,t.* from (SELECT * FROM alpro_prod.".$txtViewQry.") as t join (select @serialNumber :=0 from dual) r ".$txtFilter;
    //echo("<br>".$report_qry."<br>");
    $data_report = getDataFromDB($report_qry);
    $rpt_txt = "";
    while($row = $data_report->fetch_assoc()) {
        $each_row_rpt_txt="<tr>";
        foreach($clm_header_lst as $cl_item){
            $each_row_rpt_txt = $each_row_rpt_txt."<td>".$row[trim($cl_item)]."</td>";
        }
        $each_row_rpt_txt = $each_row_rpt_txt."</tr>";
        $rpt_txt=$rpt_txt.$each_row_rpt_txt;
    }

    $txtSumMsg = getSumAttribute_mock($txtGetTotalColumn,$report_qry,$rpt_header_lst,$clm_header_lst,$clm_hd_cnt);
    
    if (isset($_POST['DownloadReport'])){
        ?>
        <input type="text" size="20" id="myInput_1" class="myInputCSS" onkeyup="myFunction('myInput_1','0')" placeholder="Search for 1st Column" title="Search for 1st Column">
        <button type="button" class="myButton" onclick="exportDatatoCSV('dataTable','ExportData')">
                    Download
                    </button>
        <?php
    }
?>
<!-- HTML -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $txtName; ?></title>
    <link rel="icon" href="../staticfiles/img/logo.png">
	<link rel="stylesheet" href="../staticfiles/css/style.css">
	<script src="../staticfiles/js/jquery-3.3.1.js"></script>
	<script src="../staticfiles/js/reusable.js"></script>
    <script type="text/javascript" src="ExportToCSV.js"></script>

    <?php
    if (isset($_POST['DownloadReport'])){
    ?>

        <style>
            .fixTableHead {
            overflow-y: auto;
            height: 700px;
            }
            .fixTableHead thead th {
            position: sticky;
            top: 0;
            }
            table {
            border-collapse: collapse;        
            width: 70%;
            }
            th,
            td {
            padding: 8px 15px;
            border: 2px solid #5C7290;
            }
            th {
            background: #23D0D0;
            }
        </style>
    <?php
    }
    ?>

</head>
<body>
    <!-- Start : for menu bar -->
	<!-- <div id="menu_bar_php"></div>     -->
	<!-- End for menu bar -->
    <div>
        <center>
            <h1><?php echo $txtName."<br><br>".$rpt_name_msg; ?></h1><br><br>
            <?php
            if($rpt_txt != ""){
            ?>
            <div class="fixTableHead">
            <table id="dataTable" border="2">
                <thead>
                <tr><?php echo $hd_txt; ?></tr>
                </thead>
                <tbody>
                <?php echo $rpt_txt; ?>
                </tbody>
                <?php echo $txtSumMsg; ?>
            </table>
            </div>
            <br><br>
            <!-- <table id="dataTable" border="2">
                <?php echo $txtSumMsg; ?>
            </table> -->
            <!-- <p><b><?php echo $txtSumMsg; ?></b></p> -->
            <br><br>
            <?php
            }
            else{
                ?>
                    <p style="color:red;"><b>No Record Found</b></p>
                    

                <?php
            }
            ?>
        </center>
    </div>

</body>
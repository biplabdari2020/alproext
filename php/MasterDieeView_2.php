<?php
include('checkSession.php');
include('UserDefinedLibrary.php');
$txtSectionNo = $_POST['txtSectionNo'];
$txtDieNo = $_POST['txtDieNo'];
//echo ("<br>".$txtSectionNo."<br>");
//echo ("<br>".$txtDieNo."<br>");
$qry = "select a.txtSectionNo, a.txtDieNo, txtPress, NumCavity, txtAlloy, numOfBillet, numInputRate, b.txtNormalWt numDieWt, numLastRunWt, dtIssue, numEstLife, numEstTrial, numNitdrFreq, txtMfgBy, a.dtDateTime, txtDieMfgRqrd, numInputTillDate, txtDieStatus, dtRejectedDate, dtConvertDateDate, dtOkDate, numEstInputRate, numEstOutputRate, numOututRate,c.numOutputWt  from alpro_prod.mst_die a inner join alpro_prod.mst_section b on a.txtSectionNo=b.txtSectionNo left join alpro_prod.v_dieoutputdet c on c.txtDieNo=a.txtDieNo order by a.dtDateTime desc";
$qry = "select t.* from ($qry)t where  t.txtSectionNo like '%$txtSectionNo%' and t.txtDieNo like '%$txtDieNo%'";

//echo ("<br>".$qry."<br>");
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
	<title>Section Master Data View</title>
 	<link rel="icon" href="../staticfiles/img/logo.png">
	<script src="../staticfiles/js/jquery-3.3.1.js"></script>
	<script src="../staticfiles/js/reusable.js"></script>
    <script>
        function clicked(){
            return confirm('Do you want to continue ..');
        }

        $(document).ready(function () {
            $('#dataTable').DataTable({
                scrolly: true,
                scrollx: true,
            });
        });    
    </script>
   
    <link rel="stylesheet" href="../staticfiles/css/style.css">
    <link rel="stylesheet" href="../staticfiles/css/jquery_dataTable.css">
    <link rel="stylesheet" href="../staticfiles/css/fixedHeader_dataTable.css">
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.dataTables.min.css"> -->
    <style>
           thead input {
        width: 70%;
      overflow-x: auto;
        
    } 
   table.tbl{
    width:50%;
    margin-left: 60px;
    overflow-x: auto;
   }
    </style>
     
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js"></script>
    <script>
        $(document).ready(function () {
        // Setup - add a text input to each footer cell
        $('#example thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('#example thead');
    
        var table = $('#example').DataTable({
            orderCellsTop: true,
            fixedHeader: true,
            initComplete: function () {
                var api = this.api();
    
                // For each column
                api
                    .columns()
                    .eq(0)
                    .each(function (colIdx) {
                        // Set the header cell to contain the input element
                        var cell = $('.filters th').eq(
                            $(api.column(colIdx).header()).index()
                        );
                        var title = $(cell).text();
                        $(cell).html('<input type="text" placeholder="' + title + '" />');
    
                        // On every keypress in this input
                        $(
                            'input',
                            $('.filters th').eq($(api.column(colIdx).header()).index())
                        )
                            .off('keyup change')
                            .on('change', function (e) {
                                // Get the search value
                                $(this).attr('title', $(this).val());
                                var regexr = '({search})'; //$(this).parents('th').find('select').val();
    
                                var cursorPosition = this.selectionStart;
                                // Search the column for that value
                                api
                                    .column(colIdx)
                                    .search(
                                        this.value != ''
                                            ? regexr.replace('{search}', '(((' + this.value + ')))')
                                            : '',
                                        this.value != '',
                                        this.value == ''
                                    )
                                    .draw();
                            })
                            .on('keyup', function (e) {
                                e.stopPropagation();
    
                                $(this).trigger('change');
                                $(this)
                                    .focus()[0]
                                    .setSelectionRange(cursorPosition, cursorPosition);
                            });
                    });
            },
        });
    });
    </script>

</head>
<body>
    <!-- Start : for menu bar -->
	<div id="menu_bar_php"></div>    
	<!-- End for menu bar -->
    <div class="myDiv">
        <div class="container">
            <div>
            <h1>Die Master Data View</h1><br><br>
             <?php
                if ($data) {
                    ?>
                    <table id="example" class="tbl">
                    <thead>
                        <tr>
                            <th></th>
                            <th></th>
                            <th>Section no</th>
                            <th>Die No</th>
                            <th>Press</th>
                            <th size ="5">Cavity</th>
                            <th>Alloy</th>
                            <th>Nominal Weight (Kg/mtr)</th>
                            <th>Est.Die Life (MT)</th>
                            <th>Est. Die Trial</th>
                            <th>Est. Input Rate (Kg/Hr)</th>
                            <th>Est. Output Rate (Kg/Hr)</th>
                            <th>Actual Input Rate (Kg/Hr)</th>
                            <th>Actual Output Rate (Kg/Hr)</th>
                            <th>Nitriding Frequency (Kg)</th>
                            <th>Last Run Weight (Kg/12Ft)</th>
                            <th>Mfg by</th> 
                            <th>Input Till Date (Kg)</th>  
                            <th>Output Till Date (Kg)</th>  
                            <th>Current Status</th>  
                            <th>Mfg Required</th>  
                            <!-- <th>Transaction Date</th> -->
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    // output data of each row
                    while($row = $data->fetch_assoc()) {
                    $param = 'id1='.$row['txtSectionNo'].'&id2='.$row['txtDieNo'];
                ?>
                
                    <tr>
                         <!-- <td><a href="../php/MasterDieeUpdate.php?<?php echo $param; ?>" class="myButton">Edit</a></td>
                        <td><a href="../php/MasterDieeDelete.php?<?php echo $param; ?>" class="myButton" onclick="return clicked();">Delete</a></td> -->
                        <?php
                        $td_obj = edit_delete_role_based("MasterDieeUpdate","MasterDieeDelete",$param,"ToolroomUser,Admin");
                        echo($td_obj);
                        ?>
                        <td><?php echo $row['txtSectionNo']; ?> </td>
                        <td><?php echo $row['txtDieNo']; ?> </td>
                        <td><?php echo $row['txtPress']; ?> </td>
                        <td><?php echo $row['NumCavity']; ?> </td>
                        <td><?php echo $row['txtAlloy']; ?> </td>
                        <td><?php echo $row['numDieWt']; ?> </td>
                        <td><?php echo $row['numEstLife']; ?> </td>
                        <td><?php echo $row['numEstTrial']; ?> </td>
                        <td><?php echo $row['numEstInputRate']; ?> </td>
                        <td><?php echo $row['numEstOutputRate']; ?> </td>
                        <td><?php echo $row['numInputRate']; ?> </td>
                        <td><?php echo $row['numOututRate']; ?> </td>
                        <td><?php echo $row['numNitdrFreq']; ?> </td>
                        <td><?php echo $row['numLastRunWt']; ?> </td>
                        <td><?php echo $row['txtMfgBy']; ?> </td>
                        <td><?php echo $row['numInputTillDate']; ?> </td>
                        <td><?php echo $row['numOutputWt']; ?> </td>
                        <td><?php echo $row['txtDieStatus']; ?> </td>
                        <td><?php echo $row['txtDieMfgRqrd']; ?> </td>
                        <!-- <td><?php echo $row['dtDateTime']; ?> </td> -->
                    </tr>
                <?php
                    }

                    ?>
                    </tbody>
                    <!-- <tfoot>
                    <tr>
                            <th></th>
                            <th></th>
                            <th>Section no</th>
                            <th>Die No</th>
                            <th>Press</th>
                            <th>Cavity</th>
                            <th>Alloy</th>
                            <th>Nominal Weight (Kg/mtr)</th>
                            <th>Est.Die Life (MT)</th>
                            <th>Est. Die Trial</th>
                            <th>Est. Input Rate (Kg/Hr)</th>
                            <th>Est. Output Rate (Kg/Hr)</th>
                            <th>Actual Input Rate (Kg/Hr)</th>
                            <th>Actual Output Rate (Kg/Hr)</th>
                            <th>Nitriding Frequency (Kg)</th>
                            <th>Last Run Weight (Kg/12Ft)</th>
                            <th>Manufactured by</th> 
                            <th>Input Till Date (Kg)</th>  
                            <th>Current Status</th>  
                            <th>Manufacturing Required</th>  
                            <th>Transaction Date</th>
                        </tr>
                    </tfoot> -->
                    </table>
                    <?php
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
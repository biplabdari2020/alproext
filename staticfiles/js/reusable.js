// function to load menu bar
$(function () {
    $("#menu_bar").load("menu_bar.html");
});
$(function () {
    $("#menu_bar_php").load("menu_bar.php");
});

//*********************************************************************************
// function to add row
function addRow() {
    var table = document.getElementById('dataTable');
    //console.log(table)
    var rowCount = table.rows.length;
    var checkbox_count = 0;
    for (var i = 1; i < rowCount; i++) {
        if (table.rows[i].cells[0].childNodes[0].checked) {
            checkbox_count = checkbox_count + 1
        }
    }
    var while_loop_counter = 0;
    var i = 1;
    while (while_loop_counter < checkbox_count) {
        var checkbox_item = table.rows[i].cells[0].childNodes[0].checked;
        if (checkbox_item) {
            var row = table.insertRow(i + 1);
            var colCount = table.rows[0].cells.length;
            var rnd_index = Math.floor(Math.random()*(999-100+1)+100);
            for (var j = 0; j < colCount; j++) {
                var newcell = row.insertCell(j);
                //testing
                console.log("----- testing started---")
                src_html=table.rows[1].cells[j].innerHTML;
                console.log(src_html)
                tmp_pos = src_html.indexOf('name=')                
                start_pos = src_html.indexOf('"',tmp_pos)
                end_pos = src_html.indexOf('"',start_pos+1)
                tmp_id = src_html.substring(start_pos+1,end_pos)
                //console.log(tmp_id)          
                //console.log(src_html.substring(0,start_pos+1))          
                //console.log(src_html.substring(end_pos))
                final_html = src_html.substring(0,start_pos+1)+tmp_id+"__"+rnd_index+src_html.substring(end_pos);
                console.log(final_html)
                console.log("----- testing end---")
                //testing
                //newcell.innerHTML = table.rows[i].cells[j].innerHTML;
                newcell.innerHTML = final_html;
            }
            while_loop_counter = while_loop_counter + 1
            i = i + 2
        } else {
            i = i + 1
        }
    }
}
//*********************************************************************************
//function to delete row
function delRow() {
    var table = document.getElementById('dataTable');
    console.log(table)
    var rowCount = table.rows.length;
    var checkbox_count = 0;
    for (var i = 1; i < rowCount; i++) {
        if (table.rows[i].cells[0].childNodes[0].checked) {
            checkbox_count = checkbox_count + 1
        }
    }
    var while_loop_counter = 0;
    var i = 1;
    while (while_loop_counter < checkbox_count) {
        var checkbox_item = table.rows[i].cells[0].childNodes[0].checked;
        if (checkbox_item) {
            table.deleteRow(i);
            while_loop_counter = while_loop_counter + 1;
        } else {
            i = i + 1
        }
    }
}
//*********************************************************************************

function myFunction(cell_id,index) {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById(cell_id);
    filter = input.value.toUpperCase();
    table = document.getElementById("dataTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[index];
        if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
        }
    }
}

//*********************************************************************************

function setEndDate(start_dt,end_dt){
    var start_date = document.getElementById(start_dt).value;
    $("#"+end_dt).attr({"min" : start_date});
  }


  //*******************************************************************************


  function exportDatatoCSV(table_id,file_name){
    var table = document.getElementById(table_id);
    //console.log(table)
    var rowCount = table.rows.length;
    //console.log(rowCount)
    var colCount = table.rows[0].cells.length;
    //console.log(colCount)
    var table_data = [];
    for (var i = 0; i < rowCount; i++){
        var row_data_tmp= [];
        var row_data = table.rows[i];
        for (var j = 0; j < colCount; j++){
            var item = row_data.cells[j].innerText;
            
            if ((item == 'Delete' || item == 'Edit' || (i==0 && item == ''))!=true){
                row_data_tmp.push(item);
            }
        }
        table_data.push(row_data_tmp);
    }
    //console.log(table_data)

    
    csvContent = "data:text/csv;charset=utf-8,";
    /* add the column delimiter as comma(,) and each row splitted by new line character (\n) */
    table_data.forEach(function(rowArray){
        row = rowArray.join(",");
        csvContent += row + "\r\n";
    });

    /* create a hidden <a> DOM node and set its download attribute */
    var encodedUri = encodeURI(csvContent);
    var link = document.createElement("a");
    link.setAttribute("href", encodedUri);
    link.setAttribute("download", file_name+".csv");
    document.body.appendChild(link);
    link.click();
  }

  //************************************************************************************************** */

  function printPage(table_id){
    var tableData = '<table>'+document.getElementById(table_id).innerHTML+'</table>';
    var data = '<button onclick="window.print()">Print this page</button><br><br>'+tableData;
    myWindow=window.open('class="container"','','width=800,height=600');
    myWindow.innerWidth = screen.width;
    myWindow.innerHeight = screen.height;
    myWindow.screenX = 0;
    myWindow.screenY = 0;
    myWindow.document.write(data);
    myWindow.focus();
  }

  //************************************************************************************************** */
 
  function dependantDataTRLog(){
    var id = document.getElementById("txtBCSrl").value;
    //console.log(id)
    var dataString = 'id='+ id;
    //console.log(dataString)
    $.ajax({
        url: 'dependantDataAjax.php',
        dataType: "json",
        data: {'action': 'dependantDataTRLog','id':id},
        success: function(return_data){
            console.log(return_data)
            $("#txtLogNo").text(return_data.txtLogNo);
            $("#txtDieNo").text(return_data.txtDieNo);
            $("#txtCompCode").text(return_data.txtCompCode);
        }
    });
  }

  function jsgetLogAvailableLegth(){
    var id = document.getElementById("txtLogNo").value;
    console.log(id);
    $.ajax({
        url: 'dependantDataAjax.php',
        dataType: "json",
        data: {'action': 'getLogAvailableLegth','id':id},
        success: function(return_data){
           // console.log(return_data.availableLength);
           if (return_data.availableLength > 0){
            $("#availableLength").text(return_data.availableLength);            
           }
           else {            
            $("#availableLength").text("NA");            
           }
            
        }
    });
  }

  function jsgetDieNo(){
    var id = document.getElementById("txtDieNo").value;
    console.log(id);
    $.ajax({
        url: 'dependantDataAjax.php',
        dataType: "json",
        data: {'action': 'jsgetDieNo','id':id},
        success: function(return_data){
           // console.log(return_data.availableLength);
           $('#ComponentCode').html('<option value="">Select state first</option>');
            $("#ComponentCode").text(return_data.ComponentCode);            
         
            
        }
    });
   
  }

    //*************************************************************************** */

 //*************************************************************************** */

 function getFilterGenerateReport(){
    //document.getElementById('txtLogNo').style.display='';
    document.getElementById('dtStartTime').value='';
    document.getElementById('dtEndTime').value='';
    var text = '';
    var id = document.getElementById("txtName").value;
    console.log(id);
    $.ajax({
        url: 'dependantDataAjax.php',
        dataType: "json",
        data: {'action': 'getFilterGenerateReport','id':id},
        success: function(return_data){            
            //console.log(return_data);
            text=return_data.txtColumnHeader;
            console.log(text);
            if(text.search("txtLogNo")>-1){
                console.log("txtLogNo ache "+text.search("txtLogNo"));
                document.getElementById('txtLogNo').style.display='';
            }
            else{
                console.log("txtLogNo nei "+text.search("txtLogNo"));
                document.getElementById('txtLogNo').style.display='none';
            }
            if(text.search("txtDieNo")>-1){
                console.log("ache");
                document.getElementById('txtDieNo').style.display='';
            }
            else{
                console.log("nei");
                document.getElementById('txtDieNo').style.display='none';
            }
            if(text.search("txtComponent")>-1){
                console.log("ache");
                document.getElementById('txtComponent').style.display='';
            }
            else{
                console.log("nei");
                document.getElementById('txtComponent').style.display='none';
            }
            if(text.search("txtEmpName")>-1){
                console.log("ache");
                document.getElementById('txtEmpName').style.display='';
            }
            else{
                console.log("nei");
                document.getElementById('txtEmpName').style.display='none';
            }
            if(text.search("txtSuppName")>-1){
                console.log("ache");
                document.getElementById('txtSuppName').style.display='';
            }
            else{
                console.log("nei");
                document.getElementById('txtSuppName').style.display='none';
            }
            if(text.search("txtPress")>-1){
                console.log("ache");
                document.getElementById('txtPress').style.display='';
            }
            else{
                console.log("nei");
                document.getElementById('txtPress').style.display='none';
            }
            if(text.search("txtShift")>-1){
                console.log("ache");
                document.getElementById('txtShift').style.display='';
            }
            else{
                console.log("nei");
                document.getElementById('txtShift').style.display='none';
            }
        }
    });
    
}
    
    
<?php


$schema_name = "alpro_prod";
//Global Varriable for DB Connection
$hostName = "bdtestdb.mysql.database.azure.com:3306";
$db_userName = "alpro_prod";
$db_password = "BiplabDari@2022";
$databaseName = "bdtestdb";



function getListDynamicTable(array $post_item){
    $key_list = array();
    foreach( $post_item as $key => $value){
        $tmp_key=explode("__",$key)[0];
        array_push($key_list,$tmp_key);
    }
    $key_list = array_unique($key_list);
    $final_arr = array();
    foreach($key_list as $k){
        $$k = array();
        foreach( $post_item as $key => $value){
            if(strlen(strpos($key,$k)) > 0){
                array_push($$k,$value);
            }
        }
        $final_arr[$k]=$$k;
    }

    return $final_arr;
}

function TransDataInsertDB(array $data,array $att_list,$table_name,$pk){
    $conn = mysqli_connect($GLOBALS['hostName'], $GLOBALS['db_userName'], $GLOBALS['db_password']);
    $len = count($data[$att_list[0]]);
    $insert_qry = "";
    $pass_insert_qry = "";
    $fail_insert_qry = "";
    $error_msg = "";
    $pass_insert_cnt = 0;
    $fail_insert_cnt = 0;
    
    for ($i = 0; $i<$len; $i++){
        $column_name = "";
        $column_values = "";
        $filter_cond = "";
    
        foreach($att_list as $item){
            if($item == $pk){
                $filter_cond = $filter_cond.$item." = '".$data[$item][$i]."'";
            }
    
            $column_name = $column_name.$item.",";
            $column_values = $column_values."'".$data[$item][$i]."',";
            //$filter_cond = $filter_cond.$item." = '".$data[$item][$i]."' and ";
        }
        //$filter_cond = substr($filter_cond,0,strrpos($filter_cond," and"));
        $filter_cond = "date_format(dtDateTime,'%Y%m%d') =date_format(current_date,'%Y%m%d')";
        $select_qry = 'select * from '.$GLOBALS['schema_name'].".".$table_name." where ".$filter_cond;
        $column_name = substr($column_name,0,-1)."";
        $column_values = substr($column_values,0,-1)."";
        $insert_qry_individual = "INSERT INTO ".$GLOBALS['schema_name'].".".$table_name." (".$column_name.") VALUES (".$column_values.");";        
        $outMessageInsert = insertDB($insert_qry_individual);
        
        if($outMessageInsert == 'Data Inserted'){
            $pass_insert_qry = $pass_insert_qry.$select_qry;
           // echo"aaa".$pass_insert_qry;
            $pass_insert_cnt = $pass_insert_cnt+1;
           // echo "bbb".$pass_insert_cnt;
        }
        else{
            $fail_insert_qry = $fail_insert_qry."(".$select_qry.") UNION ";
            $error_msg = $error_msg."<br".$outMessageInsert."<br>";
            $fail_insert_cnt = $fail_insert_cnt+1;
        }

}
//$pass_insert_qry = substr($pass_insert_qry,0,strrpos($pass_insert_qry," UNION"));
//$fail_insert_qry = substr($fail_insert_qry,0,strrpos($fail_insert_qry," UNION"));
$return_obj = array("pass_insert_qry"=>$pass_insert_qry, "fail_insert_qry"=>$fail_insert_qry, "error_msg"=>$error_msg,"pass_insert_cnt"=>$pass_insert_cnt,"fail_insert_cnt"=>$fail_insert_cnt);
return $return_obj;
}

function masterDataInsertDB(array $data,array $att_list,$table_name,$pk){
    
    $len = count($data[$att_list[0]]);
    $insert_qry = "";
    $pass_insert_qry = "";
    $fail_insert_qry = "";
    $error_msg = "";
    $pass_insert_cnt = 0;
    $fail_insert_cnt = 0;
    
    for ($i = 0; $i<$len; $i++){
        $column_name = "";
        $column_values = "";
        $filter_cond = "";
    
        foreach($att_list as $item){
            if($item == $pk){
                $filter_cond = $filter_cond.$item." = '".$data[$item][$i]."'";
            }
    
            $column_name = $column_name.$item.",";
            $column_values = $column_values."'".$data[$item][$i]."',";
            //$filter_cond = $filter_cond.$item." = '".$data[$item][$i]."' and ";
        }
        //$filter_cond = substr($filter_cond,0,strrpos($filter_cond," and"));
        $select_qry = 'select * from '.$GLOBALS['schema_name'].".".$table_name." where ".$filter_cond;
        $column_name = substr($column_name,0,-1)."";
        $column_values = substr($column_values,0,-1)."";
        
        $insert_qry_individual = "INSERT INTO ".$GLOBALS['schema_name'].".".$table_name." (".$column_name.") VALUES (".$column_values.");";
        
        $outMessageInsert = insertDB($insert_qry_individual);
        if($outMessageInsert == 'Data Inserted'){
            $pass_insert_qry = $pass_insert_qry."(".$select_qry.") UNION ";
            $pass_insert_cnt = $pass_insert_cnt+1;
        }
        else{
            $fail_insert_qry = $fail_insert_qry."(".$select_qry.") UNION ";
            $error_msg = $error_msg."<br".$outMessageInsert."<br>";
            $fail_insert_cnt = $fail_insert_cnt+1;
        }
    }
    
    $pass_insert_qry = substr($pass_insert_qry,0,strrpos($pass_insert_qry," UNION"));
    $fail_insert_qry = substr($fail_insert_qry,0,strrpos($fail_insert_qry," UNION"));
    $return_obj = array("pass_insert_qry"=>$pass_insert_qry, "fail_insert_qry"=>$fail_insert_qry, "error_msg"=>$error_msg,"pass_insert_cnt"=>$pass_insert_cnt,"fail_insert_cnt"=>$fail_insert_cnt);    
    return $return_obj;
}

function DieMasterDataInsertDB(array $data,array $att_list,$table_name){
    
    $len = count($data[$att_list[0]]);
    $insert_qry = "";
    $pass_insert_qry = "";
    $fail_insert_qry = "";
    $error_msg = "";
    $pass_insert_cnt = 0;
    $fail_insert_cnt = 0;
    
    for ($i = 0; $i<$len; $i++){
        //get last entry of txtSectionNo
        $txtSectionNo = $data["txtSectionNo"][$i];
        //echo("<br> txtSectionNo : ".$txtSectionNo);
        $qry = "select txtDieNo from ".$GLOBALS['schema_name'].".mst_die where txtDieNo like '%$txtSectionNo/%' order by 1 DESC LIMIT 1";
        $result = getDataFromDB($qry);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                //echo("<br> old txtDieNo : ".$row["txtDieNo"]);
                $lst = explode("/",$row["txtDieNo"])[1];
                $lst_num = $lst+1;
                $tmp='';
                for($k=0;$k<strlen($lst)-strlen($lst_num);$k++){
                    $tmp= $tmp."0";
                }
                $final_lst = $tmp.$lst_num;
                $txtDieNo = $txtSectionNo."/".$final_lst;
            }
        } else {
            $txtDieNo = $txtSectionNo."/001";
        }
        
        //echo("<br> txtDieNo : ".$txtDieNo);
        //get last entry of txtSectionNo

        $column_name = "";
        $column_values = "";
        
        foreach($att_list as $item){
            $column_name = $column_name.$item.",";
            $column_values = $column_values."'".$data[$item][$i]."',";
        }
        // for txtDieNo
        $column_name = $column_name."txtDieNo,";
        $column_values = $column_values."'".$txtDieNo."',";
        // for txtDieNo
        $select_qry = 'select * from '.$GLOBALS['schema_name'].".".$table_name." where txtDieNo = '$txtDieNo'";
        $column_name = substr($column_name,0,-1)."";
        $column_values = substr($column_values,0,-1)."";
        $insert_qry_individual = "INSERT INTO ".$GLOBALS['schema_name'].".".$table_name." (".$column_name.") VALUES (".$column_values.");";
        
        //echo("<br> insert_qry_individual qry : ".$insert_qry_individual);
        //echo("<br> select qry : ".$select_qry);

        $outMessageInsert = insertDB($insert_qry_individual);
        if($outMessageInsert == 'Data Inserted'){
            $pass_insert_qry = $pass_insert_qry."(".$select_qry.") UNION ";
            $pass_insert_cnt = $pass_insert_cnt+1;
        }
        else{
            $fail_insert_qry = $fail_insert_qry."(".$select_qry.") UNION ";
            $error_msg = $error_msg."<br".$outMessageInsert."<br>";
            $fail_insert_cnt = $fail_insert_cnt+1;
        }
    }
    
    $pass_insert_qry = substr($pass_insert_qry,0,strrpos($pass_insert_qry," UNION"));
    $fail_insert_qry = substr($fail_insert_qry,0,strrpos($fail_insert_qry," UNION"));
    $return_obj = array("pass_insert_qry"=>$pass_insert_qry, "fail_insert_qry"=>$fail_insert_qry, "error_msg"=>$error_msg,"pass_insert_cnt"=>$pass_insert_cnt,"fail_insert_cnt"=>$fail_insert_cnt);    
    return $return_obj;
}

function getSelectQuery(array $data,array $att_list,$table_name){
    $len = count($data[$att_list[0]]); 
    $select_qry = "";
    $col_name = "";
    $final_filter="";
    foreach($att_list as $item){
        $col_name = $col_name.$item.",";
        $filter_cond = $item." in (";
        for ($i = 0; $i<$len; $i++){
            $filter_cond = $filter_cond."'".$data[$item][$i]."',";
        } 
        $filter_cond = substr($filter_cond,0,-1);
        $final_filter = $final_filter.$filter_cond.") and ";
    }
    $col_name = substr($col_name,0,-1);
    $select_qry  = "select ".$col_name." from ".$GLOBALS['schema_name'].".".$table_name." where ".$final_filter;
    //echo($select_qry."<br>");
    $select_qry = substr($select_qry,0,strrpos($select_qry," and")).";";
    //echo($select_qry);
    return $select_qry;
    
}

function insertDB($qry){

    //connect DB
    
    $conn = mysqli_connect($GLOBALS['hostName'], $GLOBALS['db_userName'], $GLOBALS['db_password']);
    
    if ($conn->connect_error) {
    echo("Connection failed: " . $conn->connect_error);
    exit();
    }
    //execute insert
    
    $rs = mysqli_query($conn,$qry);
    if($rs){
        $outMessageInsert = "Data Inserted";
    }
    else{
        $outMessageInsert = "<br>".mysqli_error($conn)."<br>";
    }
    //disconnect db
    $conn -> close();    
    return $outMessageInsert;
}

function getDataFromDB($qry){
    //connect DB
    
    $conn = mysqli_connect($GLOBALS['hostName'], $GLOBALS['db_userName'], $GLOBALS['db_password']);
    
    if ($conn->connect_error) {
    echo("Connection failed: " . $conn->connect_error);
    exit();
    }

    //Fetch record
    $result = $conn->query($qry);
    
    //disconnect db
    $conn -> close();    
    return $result;
}


function executeQuery($qry){
    //connect DB
    
    $conn = mysqli_connect($GLOBALS['hostName'], $GLOBALS['db_userName'], $GLOBALS['db_password']);
    
    if ($conn->connect_error) {
    echo("Connection failed: " . $conn->connect_error);
    exit();
    }
    //execute insert
    
    $rs = mysqli_query($conn,$qry);
    if($rs){
        $outMessageInsert = "pass";
    }
    else{
        $outMessageInsert = "<br>".mysqli_error($conn)."<br>";
    }
    //disconnect db
    $conn -> close();    
    return $outMessageInsert;
}
//Generate Primary Key for a Transaction Table ---Added on 09-Sep-2022 by Subhasis
function generatePk($static_val,$table_name,$pk_column){
    $dt = date('Ymd');
    $qry = "select ".$pk_column." from ".$GLOBALS['schema_name'].".".$table_name." where ".$pk_column." like '%".$dt."/%' order by 1 DESC LIMIT 1";
    $result = getDataFromDB($qry);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $lst = explode("/",$row[$pk_column])[2];
            $lst_num = $lst+1;
            $tmp='';
            for($i=0;$i<strlen($lst)-strlen($lst_num);$i++){
                $tmp= $tmp."0";
            }
            $final_lst = $tmp.$lst_num;
            $pk_val = $static_val."/".$dt."/".$final_lst;
        }
      } else {
        $pk_val = $static_val."/".$dt."/0001";
      }

    //echo($pk_val);
    return $pk_val;
}

function masterDataInsertDB_KeyGenerate(array $data,array $att_list,$table_name,$pk,$pkText){
    
    $len = count($data[$att_list[0]]);
    $insert_qry = "";
    $pass_insert_qry = "";
    $fail_insert_qry = "";
    $error_msg = "";
    $pass_insert_cnt = 0;
    $fail_insert_cnt = 0;    
    for ($i = 0; $i<$len; $i++){
        $column_name = "PkAssemblyNo,";
        $pkval = generatePk($pkText,$table_name,$pk);            
        $column_values = "'".$pkval."',";
        $filter_cond = "";
        $filter_cond = " PkAssemblyNo= '".$pkval."'";
        foreach($att_list as $item){
            if($item == $pk){
                $filter_cond = $filter_cond.$item." = '".$data[$item][$i]."'";
            }
            
            $column_name = $column_name.$item.",";                                
            $column_values = $column_values."'".$data[$item][$i]."',";       
               
              
            //$filter_cond = $filter_cond.$item." = '".$data[$item][$i]."' and ";
        }
        //$filter_cond = substr($filter_cond,0,strrpos($filter_cond," and"));
        $select_qry = 'select * from '.$GLOBALS['schema_name'].".".$table_name." where ".$filter_cond;
        $column_name = substr($column_name,0,-1)."";
        $column_values = substr($column_values,0,-1)."";
        
        $insert_qry_individual = "INSERT INTO ".$GLOBALS['schema_name'].".".$table_name." (".$column_name.") VALUES (".$column_values.");";
        //echo("<br>".$insert_qry_individual."<br>");
        $outMessageInsert = insertDB($insert_qry_individual);
        if($outMessageInsert == 'Data Inserted'){
            $pass_insert_qry = $pass_insert_qry."(".$select_qry.") UNION ";
            $pass_insert_cnt = $pass_insert_cnt+1;
        }
        else{
            $fail_insert_qry = $fail_insert_qry."(".$select_qry.") UNION ";
            $error_msg = $error_msg."<br".$outMessageInsert."<br>";
            $fail_insert_cnt = $fail_insert_cnt+1;
        }
    }
    
    $pass_insert_qry = substr($pass_insert_qry,0,strrpos($pass_insert_qry," UNION"));
    $fail_insert_qry = substr($fail_insert_qry,0,strrpos($fail_insert_qry," UNION"));
    $return_obj = array("pass_insert_qry"=>$pass_insert_qry, "fail_insert_qry"=>$fail_insert_qry, "error_msg"=>$error_msg,"pass_insert_cnt"=>$pass_insert_cnt,"fail_insert_cnt"=>$fail_insert_cnt);    
    return $return_obj;
}
//**************************************************************************** */

function getFilterData($post_data){
    //echo("<br>".$post_data['dtStartTime']."<br>");
    //echo("<br>".$post_data['dtEndTime']."<br>");
    $dateRangeFilter = '';
    if(empty($post_data['dtStartTime'])==False and empty($post_data['dtEndTime'])==False){
        $dateRangeFilter = "date(t.dtStartTime)  between '".$post_data['dtStartTime']."' and '".$post_data['dtEndTime']."'";
    }
    elseif(empty($post_data['dtStartTime']) and empty($post_data['dtEndTime'])==False){
        $dateRangeFilter = "date(t.dtStartTime) <= '".$post_data['dtEndTime']."'";
    }
    elseif(empty($post_data['dtStartTime'])==False and empty($post_data['dtEndTime'])){
        $dateRangeFilter = "date(t.dtStartTime) >= '".$post_data['dtStartTime']."'";
    }
    //echo("<br> dateRangeFilter = ".$dateRangeFilter."<br>");
    $otherFileterArray = array("txtLogNo", "txtDieNo", "txtComponent", "txtEmpName", "txtSuppName","txtPress","txtShift","yearname","monname");
   
    $qry = "select txtColumnHeader from alpro_prod.mst_report where txtName ='".$post_data['txtName']."'";
    $data = getDataFromDB($qry);
    //$return_data = array();
        while($row = $data->fetch_assoc()) {
            $text = $row['txtColumnHeader'];
        }
    //echo("<br> text = ".$text."<br>");
    
    $otherFilter = '';
    foreach($otherFileterArray as $item){
        if(str_contains($text,$item) and empty($post_data[$item])==False){
            //echo("<br> Array Key = ".$item."<br>");
            $otherFilter=$otherFilter." t.$item like '%$post_data[$item]%' and";
        }
    }
    //echo("<br> otherFilter = ".$otherFilter."<br>");
    $otherFilter=substr($otherFilter,0,strrpos($otherFilter," and"));
    //echo("<br> otherFilter = ".$otherFilter."<br>");
    if(empty($dateRangeFilter)==False and empty($otherFilter)==False){
        $finalFilter = $dateRangeFilter." and ".$otherFilter;
    }
    elseif(empty($dateRangeFilter)==False and empty($otherFilter)!=False){
        $finalFilter = $dateRangeFilter;
    }
    elseif(empty($dateRangeFilter)!=False and empty($otherFilter)==False){
        $finalFilter = $otherFilter;
    }
    else{
        $finalFilter="";
    }
    //$finalFilter = $dateRangeFilter.$otherFilter;
    if(empty($finalFilter)==False){
        $finalFilter = "where ".$finalFilter;
    }
    return $finalFilter;
}

//******************************************************************************** */
//****** */
function getFilterData_prd($post_data){
    //echo("<br>".$post_data['dtStartTime']."<br>");
    //echo("<br>".$post_data['dtEndTime']."<br>");
    $dateRangeFilter = '';
    if(empty($post_data['dtStartTime'])==False and empty($post_data['dtEndTime'])==False){
        $dateRangeFilter = "date(t.dtStartTime)  between '".$post_data['dtStartTime']."' and '".$post_data['dtEndTime']."'";
    }
    elseif(empty($post_data['dtStartTime']) and empty($post_data['dtEndTime'])==False){
        $dateRangeFilter = "date(t.dtStartTime) <= '".$post_data['dtEndTime']."'";
    }
    elseif(empty($post_data['dtStartTime'])==False and empty($post_data['dtEndTime'])){
        $dateRangeFilter = "date(t.dtStartTime) >= '".$post_data['dtStartTime']."'";
    }
    //echo("<br> dateRangeFilter = ".$dateRangeFilter."<br>");
    $otherFileterArray = array("txtPress","txtShift","txtBilletAlloy");
    $qry = "select txtColumnHeader from alpro_prod.mst_report where txtName ='Production Logsheet Report'";
    $data = getDataFromDB($qry);
    //$return_data = array();
        while($row = $data->fetch_assoc()) {
            $text = $row['txtColumnHeader'];
        }
    //echo("<br> text = ".$text."<br>");
    
    $otherFilter = '';
    foreach($otherFileterArray as $item){
        if(str_contains($text,$item) and empty($post_data[$item])==False){
            //echo("<br> Array Key = ".$item."<br>");
            $otherFilter=$otherFilter." t.$item like '%$post_data[$item]%' and";
        }
    }
    //echo("<br> otherFilter = ".$otherFilter."<br>");
    $otherFilter=substr($otherFilter,0,strrpos($otherFilter," and"));
    //echo("<br> otherFilter = ".$otherFilter."<br>");
    if(empty($dateRangeFilter)==False and empty($otherFilter)==False){
        $finalFilter = $dateRangeFilter." and ".$otherFilter;
    }
    elseif(empty($dateRangeFilter)==False and empty($otherFilter)!=False){
        $finalFilter = $dateRangeFilter;
    }
    elseif(empty($dateRangeFilter)!=False and empty($otherFilter)==False){
        $finalFilter = $otherFilter;
    }
    else{
        $finalFilter="";
    }
    //$finalFilter = $dateRangeFilter.$otherFilter;
    if(empty($finalFilter)==False){
        $finalFilter = "where ".$finalFilter;
    }
    return $finalFilter;
}
function getFilterData_mfg($post_data){
    //echo("<br>".$post_data['dtStartTime']."<br>");
    //echo("<br>".$post_data['dtEndTime']."<br>");
    $dateRangeFilter = '';
    if(empty($post_data['dtStartTime'])==False and empty($post_data['dtEndTime'])==False){
        $dateRangeFilter = "date(a.dtStartTime)  between '".$post_data['dtStartTime']."' and '".$post_data['dtEndTime']."'";
    }
    elseif(empty($post_data['dtStartTime']) and empty($post_data['dtEndTime'])==False){
        $dateRangeFilter = "date(a.dtStartTime) <= '".$post_data['dtEndTime']."'";
    }
    elseif(empty($post_data['dtStartTime'])==False and empty($post_data['dtEndTime'])){
        $dateRangeFilter = "date(a.dtStartTime) >= '".$post_data['dtStartTime']."'";
    }
    //echo("<br> dateRangeFilter = ".$dateRangeFilter."<br>");
    $otherFileterArray = array("txtPress","txtShift","txtBilletAlloy");
    $qry = "select txtColumnHeader from alpro_prod.mst_report where txtName ='Production Logsheet Report'";
    $data = getDataFromDB($qry);
    //$return_data = array();
        while($row = $data->fetch_assoc()) {
            $text = $row['txtColumnHeader'];
        }
    //echo("<br> text = ".$text."<br>");
    
    $otherFilter = '';
    foreach($otherFileterArray as $item){
        if(str_contains($text,$item) and empty($post_data[$item])==False){
            //echo("<br> Array Key = ".$item."<br>");
            $otherFilter=$otherFilter." a.$item like '%$post_data[$item]%' and";
        }
    }
    //echo("<br> otherFilter = ".$otherFilter."<br>");
    $otherFilter=substr($otherFilter,0,strrpos($otherFilter," and"));
    //echo("<br> otherFilter = ".$otherFilter."<br>");
    if(empty($dateRangeFilter)==False and empty($otherFilter)==False){
        $finalFilter = $dateRangeFilter." and ".$otherFilter;
    }
    elseif(empty($dateRangeFilter)==False and empty($otherFilter)!=False){
        $finalFilter = $dateRangeFilter;
    }
    elseif(empty($dateRangeFilter)!=False and empty($otherFilter)==False){
        $finalFilter = $otherFilter;
    }
    else{
        $finalFilter="";
    }
    //$finalFilter = $dateRangeFilter.$otherFilter;
    if(empty($finalFilter)==False){
        $finalFilter = "where ".$finalFilter;
    }
    return $finalFilter;
}
function getMSGfromFilter($filter){
    $filter = str_replace("a.","",$filter);
    $filter = str_replace("t.","",$filter);
    $filter = str_replace("%","",$filter);
    $filter = str_replace("like","=",$filter);
    $filter = str_replace("dtStartTime","Date",$filter);
    $filter = str_replace("where","",$filter);
    $filter = str_replace("date(Date)","Date",$filter);
    //echo("<br> MSG = ".$filter."<br>");

    $tmpList = array("txtLogNo"=>"Log no", "txtDieNo"=>"Die No", "txtComponent"=>"Component No", "txtEmpName"=>"Operator Name", "txtSuppName"=>"Vendor Name","txtPress"=>"Press");
    foreach($tmpList as $key=>$item){
        $filter = str_replace($key,$item,$filter);
        //echo("<br>".$key."===".$item."<br>");
        //echo("<br> MSG = ".$filter."<br>");
    }
    return $filter;
}
//******************************************************************************** */
function getSumAttribute($txtGetTotalColumn,$report_qry,$rpt_header_lst,$clm_header_lst,$clm_hd_cnt){   
    //echo("<br>txtGetTotalColumn : ".$txtGetTotalColumn."<br>");
    $msg = "";
    if(empty($txtGetTotalColumn)==False){       
        $txtGetTotalColumn = str_replace(" ","",$txtGetTotalColumn);
        $sumAttrList = explode(",",$txtGetTotalColumn);
        foreach($sumAttrList as $item){
            $qry = "select sum(t1.$item) as sum$item from ($report_qry)t1";
            //echo("<br> qry = ".$qry."<br>");
            $data = getDataFromDB($qry);
            while($row = $data->fetch_assoc()) {
                //echo("<br>".$item." ==> ".$row['sum'.$item]."<br>");
                //$msg=$msg."Total $item is ".$row['sum'.$item]."<br>";
                $msg=$msg."<tr><td>Total $item </td><td>".$row['sum'.$item]."</td></tr>";
            }
        }
        for ($i = 0; $i<$clm_hd_cnt; $i++){
            $msg = str_replace($clm_header_lst[$i],$rpt_header_lst[$i],$msg);
        }
    }
    //echo("<br> MSG = ".$msg."<br>");
    return $msg;
}
//******************************************************************************** */
function getSumAttribute_mock($txtGetTotalColumn,$report_qry,$rpt_header_lst,$clm_header_lst,$clm_hd_cnt){   
    //echo("<br>txtGetTotalColumn : ".$txtGetTotalColumn."<br>");
    $msg = "";
    if(empty($txtGetTotalColumn)==False){
        $msg = "<td><b>Total</b></td>";
        for ($i = 1; $i<$clm_hd_cnt; $i++){
            if(str_contains($txtGetTotalColumn,$clm_header_lst[$i])){
                $qry = "select sum(t1.$clm_header_lst[$i]) as sum$clm_header_lst[$i] from ($report_qry)t1";
            //echo("<br> qry = ".$qry."<br>");
                $data = getDataFromDB($qry);
                while($row = $data->fetch_assoc()) {
                    //echo("<br>".$item." ==> ".$row['sum'.$item]."<br>");
                    //$msg=$msg."Total $item is ".$row['sum'.$item]."<br>";
                    $msg=$msg."<td><b>".$row['sum'.$clm_header_lst[$i]]."</b></td>";
                }
            }
            else{
                $msg=$msg."<td></td>";
            }
        }
        $msg="<tr>$msg</tr>";
    }
    //echo("<br> MSG = ".$msg."<br>");
    return $msg;
}

//******************************************************************************** */
function getRoleUser($user_id){
    $qry = "select txtRole from alpro_prod.mst_user where txtUserId = '$user_id'";    
    $data = getDataFromDB($qry);
        while($row = $data->fetch_assoc()) {
            $role = $row['txtRole'];
        }
    return $role;
}
//******************************************************************************** */
function edit_delete_role_based($editPage,$deletePage,$param,$enableRole){
    $user_id=$_SESSION["username"];
    //echo("<br> user_id = ".$user_id."<br>");
    $role = getRoleUser($user_id);
    $edit_path = "../php/$editPage.php?".$param;
    $delete_path = "../php/$deletePage.php?".$param;
    //echo("<br> role = ".$role."<br>");
    //echo("<br> path = ".$path."<br>");
    if(str_contains($enableRole,$role)){
        $text = "<td><a href=$edit_path class=\"myButton\">Edit</a></td><td><a href=$delete_path class=\"myButton\" onclick=\"return clicked();\">Delete</a></td>";
    }
    else{
        $text = "<td><a class=\"myButton\">Edit</a></td><td><a class=\"myButton\" >Delete</a></td>";
    }
    return $text;
}
//******************************************************************************** */

function add_role_based($addPage,$role,$enableRole){

    $add_path = "../php/$addPage.php";
    if(str_contains($enableRole,$role)){
        $text = "<li><a href=$add_path>Add</a></li>";
    }
    else{
        $text = "";
    }
    return $text;
}

function getsumfilter($post_data){
    $dateRangeFilter = '';
    if(empty($post_data['dtStartTime'])==False and empty($post_data['dtEndTime'])==False){
        $dateRangeFilter = "date(t.dtStartTime)  between '".$post_data['dtStartTime']."' and '".$post_data['dtEndTime']."'";
    }
    elseif(empty($post_data['dtStartTime']) and empty($post_data['dtEndTime'])==False){
        $dateRangeFilter = "date(t.dtStartTime) <= '".$post_data['dtEndTime']."'";
    }
    elseif(empty($post_data['dtStartTime'])==False and empty($post_data['dtEndTime'])){
        $dateRangeFilter = "date(t.dtStartTime) >= '".$post_data['dtStartTime']."'";
    }
    return $dateRangeFilter  ;
}
?>
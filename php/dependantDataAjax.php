<?php
include('UserDefinedLibrary.php');
$action = $_REQUEST['action'];
switch($action){
    //Start : for TooRoom Log sheet
    case "dependantDataTRLog":{
        fndependantDataTRLog();
        }break;
    case "jsgetDieNo":{
            jsgetDieNo();
            }break;    
    case "getLogAvailableLegth":{
        fngetLogAvailableLegth();
        }break;
    case "dependantDataTRProdLog":{
            fndependantDataTRProdLog();
        }break;
    case "getCompCodefromDieNo":{
        getCompCodefromDieNo();
        }break;
    case "getCompCodefromDieNo1":{
        getCompCodefromDieNo1();
       }break;   
       case "getCompCodefromDieNo2":{
        getCompCodefromDieNo2();
       }break;  
       case "jsgetNextDieNo":{
        jsgetNextDieNo();
       }break;           
    case "jsgetNominalWt":{
        jsgetNominalWt();
       }break; 
       case "getCompfromDie_BC":{
        getCompfromDie_BC();
       }break;                    
    case "getDiaFromPress":{
        getDiaFromPress();
       }break;                    
    case "getFilterGenerateReport":{
        getFilterGenerateReport();
          }break;   
    //End : for TooRoom Log sheet
}



function fndependantDataTRLog() {
    if($_REQUEST['id']){
        $qry = "select txtDieNo,txtCompCode,txtLogNo from alpro_prod.trn_log_blank_cutting where pkTrnLogsheet = '".$_REQUEST['id']."'";
        $data = getDataFromDB($qry);
        $return_data = array();
        while($row = mysqli_fetch_assoc($data)) {
            $return_data = $row;
        }
        echo json_encode($return_data);
    }
}
function fngetLogAvailableLegth() {
    if($_REQUEST['id']){
        $qry = "select  a.txtLogNo,(a.numLength-ifnull(b.numCuttingLength,0)) availableLength from alpro_prod.mst_hot_die_steel a left outer join (select txtLogNo,sum(numFinishLength) numCuttingLength from alpro_prod.trn_log_blank_cutting_temp group by txtLogNo) b on a.txtLogNo=b.txtLogNo where a.txtLogNo = '".$_REQUEST['id']."'";
        $data = getDataFromDB($qry);
        $return_data = array();
        while($row = mysqli_fetch_assoc($data)) {
            $return_data = $row;
        }
        echo json_encode($return_data);
    }
}

function jsgetDieNo() {
    if($_REQUEST['id']){
        $qry = "SELECT distinct concat(b.txtDieNo,'/',b.txtCompCode) ComponentCode  FROM alpro_prod.trn_trlogsheet a inner join alpro_prod.trn_log_blank_cutting b on a.fk_trnbclogsheet=b.pkTrnLogsheet";
        $data = getDataFromDB($qry);
        $return_data = array();
        while($row = mysqli_fetch_assoc($data)) {
            $return_data = $row;
            echo '<option value="'.$row['ComponentCode'].'">'.$row['ComponentCode'].'</option>'; 

        }
        echo json_encode($return_data);
    }
}

function fndependantDataTRProdLog() {
    if($_REQUEST['id']){
        $qry = "select NumCavity from alpro_prod.mst_die where txtDieNo= '".$_REQUEST['id']."'";
        $data = getDataFromDB($qry);
        $return_data = array();
        while($row = mysqli_fetch_assoc($data)) {
            $return_data = $row;
																								 

        }
        echo json_encode($return_data);
    }
}

function getCompCodefromDieNo() {
    if($_REQUEST['id']){
        //echo("hello");
        $qry = "SELECT distinct txtCompName txtComponent FROM alpro_prod.mst_die_comp where  txtDieNo= '".$_REQUEST['id']."'";
        //echo($qry);
        $data = getDataFromDB($qry);
        //$return_data = array();
        $i = 0;
        while($row = mysqli_fetch_assoc($data)) {
            $return_data[$i] = $row['txtComponent'];
            $i = $i + 1;
        }
        echo json_encode($return_data);
    }
}

function getCompCodefromDieNo1() {
    if($_REQUEST['id']){
        //echo("hello");
        $qry = "SELECT distinct txtComp txtComponent FROM alpro_prod.v_diecomponent where txtCompCode= '".$_REQUEST['id']."'";
        //echo($qry);
        $data = getDataFromDB($qry);
        //$return_data = array();
        $i = 0;
        while($row = mysqli_fetch_assoc($data)) {
            $return_data[$i] = $row['txtComponent'];
            $i = $i + 1;
        }
        echo json_encode($return_data);
    }
}
function getCompCodefromDieNo2() {
    if($_REQUEST['id']){
        //echo("hello");
        $qry = "SELECT distinct txtCompName FROM alpro_prod.mst_die_comp where txtDieNo= '".$_REQUEST['id']."'";
        //echo($qry);
        $data = getDataFromDB($qry);
        //$return_data = array();
        $i = 0;
        while($row = mysqli_fetch_assoc($data)) {
            $return_data[$i] = $row['txtCompName'];
            $i = $i + 1;
        }
        echo json_encode($return_data);
    }
}
function getCompfromDie_BC() {
    if($_REQUEST['id']){
        //echo("hello");
        $qry = "SELECT distinct txtCompName FROM alpro_prod.mst_die_comp where txtDieNo= '".$_REQUEST['id']."'";
        //echo($qry);
        $data = getDataFromDB($qry);
        //$return_data = array();
        $i = 0;
        while($row = mysqli_fetch_assoc($data)) {
            $return_data[$i] = $row['txtCompName'];
            $i = $i + 1;
        }
        echo json_encode($return_data);
    }
}

function jsgetNextDieNo() {
    if($_REQUEST['id']){
            $qry = "select ifnull(LPAD(max(convert(SUBSTRING(txtDieNo,locate('/',replace(txtDieNo,'/P','*P'))+1),UNSIGNED INTEGER))+1,3,'0'),'001') txtDieNo from alpro_prod.mst_die where txtSectionNo='".$_REQUEST['id']."' And txtPress='".$_REQUEST['id1']."'" ;
        $data = getDataFromDB($qry);
        $return_data = array();
        while($row = mysqli_fetch_assoc($data)) {
            $return_data = $row;
        }
        echo json_encode($return_data);
    }
}
function jsgetNominalWt() {
    if($_REQUEST['id']){
        $qry = "select txtNormalWt,txtNewSection,txtMinWtRange,txtMaxWtRange from alpro_prod.mst_section where txtSectionNo='".$_REQUEST['id']."'";
        $data = getDataFromDB($qry);
        $return_data = array();
        while($row = mysqli_fetch_assoc($data)) {
            $return_data = $row;
        }
        echo json_encode($return_data);
    }
}
function getDiaFromPress() {
    if($_REQUEST['id']){
        $qry = "select txtPressDia from alpro_prod.mst_const_press where txtPressCode ='".$_REQUEST['id']."'";
        $data = getDataFromDB($qry);
        $return_data = array();
        while($row = mysqli_fetch_assoc($data)) {
            $return_data = $row;
        }
        echo json_encode($return_data);
    }
}
function getFilterGenerateReport() {
    if($_REQUEST['id']){
        $qry = "select txtColumnHeader from alpro_prod.mst_report where txtName ='".$_REQUEST['id']."'";
        $data = getDataFromDB($qry);
        $return_data = array();
        while($row = mysqli_fetch_assoc($data)) {
            $return_data = $row;
        }
        echo json_encode($return_data);
    }
}
?>
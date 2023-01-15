<?php
include('UserDefinedLibrary.php');
session_start();
$user_id=$_SESSION["username"];
//echo("<br> user_id = ".$user_id."<br>");
$role = getRoleUser($user_id);
//echo("<br> role = ".$role."<br>");
?>

<div class="menu-bar">

    <a href="../php/home.php">
        <img src="../staticfiles/img/logo.png" style="height: 40px;margin-top: 10px;" align="left" alt="">
    </a>
    <ul>
        <!-- <li class="active"><a href="#">Home</a></li> -->
        <li><a href="#">Master Data</a>
            <div class="sub-menu-1">
                <ul>
                    <li class="hover-me"><a href="#">Die Component Master</a>
                        <div class="sub-menu-2">
                            <ul>
                                <!-- <li><a href="../php/MasterDieCompEntry.php">Add</a></li> -->
                                <?php
                                $td_obj = add_role_based("MasterDieCompEntry",$role,"ToolroomUser,Admin");
                                echo($td_obj);
                                ?>
                                <li><a href="../php/MasterDieCompView.php">View</a></li>
                            </ul>

                        </div>
                    </li>
                    <li class="hover-me"><a href="#">Die Master</a>
                        <div class="sub-menu-2">
                            <ul>
                                <!-- <li><a href="../php/MasterDieeEntry.php">Add</a></li> -->
                                <?php
                                $td_obj = add_role_based("MasterDieeEntry",$role,"ToolroomUser,Admin");
                                echo($td_obj);
                                ?>
                                <!-- <li><a href="../php/MasterDieeView.php">View</a></li> -->
                                <li><a href="../php/MasterDieeViewFilter.php">View</a></li>
                            </ul>

                        </div>
                    </li>
                    <li class="hover-me"><a href="#">Employee Master</a>
                        <div class="sub-menu-2">
                            <ul>
                                <!-- <li><a href="../php/MasterEmployeeEntry.php">Add</a></li> -->
                                <?php
                                $td_obj = add_role_based("MasterEmployeeEntry",$role,"ToolroomUser,Admin");
                                echo($td_obj);
                                ?>
                                <li><a href="../php/MasterEmployeeView.php">View</a></li>
                            </ul>

                        </div>
                    </li>
                    <li class="hover-me"><a href="#">Hot Die Steel Master</a>
                        <div class="sub-menu-2">
                            <ul>
                                <!-- <li><a href="../php/MasterHotDieSteelEntry.php">Add</a></li> -->
                                <?php
                                $td_obj = add_role_based("MasterHotDieSteelEntry",$role,"ToolroomUser,Admin");
                                echo($td_obj);
                                ?>
                                <li><a href="../php/MasterHotDieSteelView.php">View</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="hover-me"><a href="#">Machine Master</a>
                        <div class="sub-menu-2">
                            <ul>
                                <!-- <li><a href="../php/MasterMachineEntry.php">Add</a></li> -->
                                <?php
                                $td_obj = add_role_based("MasterMachineEntry",$role,"ToolroomUser,Admin");
                                echo($td_obj);
                                ?>
                                <li><a href="../php/MasterMachineView.php">View</a></li>
                            </ul>

                        </div>
                    </li>
                    <li class="hover-me"><a href="#">Section Master</a>
                        <div class="sub-menu-2">
                            <ul>
                                <!-- <li><a href="../php/MasterSectionEntry.php">Add</a></li> -->
                                <?php
                                $td_obj = add_role_based("MasterSectionEntry",$role,"ToolroomUser,Admin");
                                echo($td_obj);
                                ?>
                                <li><a href="../php/MasterSectionView.php">View</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </li>
        <li><a href="#">Transaction Data</a>
            <div class="sub-menu-1">
                <ul>

                <li class="hover-me"><a href="#">Blank Cutting</a>
                        <div class="sub-menu-2">
                            <ul>
                                <!-- <li><a href="../php/TrnBlankCuttingEntry.php">Add</a></li> -->
                                <?php
                                $td_obj = add_role_based("TrnBlankCuttingEntry",$role,"ToolroomUser,Admin");
                                echo($td_obj);
                                ?>
                                <li><a href="../php/TrnBlankCuttingView.php">View</a></li>
                            </ul>

                        </div>
                    </li>    
                    <li class="hover-me"><a href="#">ToolRoom Logsheet</a>
                        <div class="sub-menu-2">
                            <ul>
                                <!-- <li><a href="../php/TrnTRLogsheetEntry.php">Add</a></li> -->
                                <?php
                                $td_obj = add_role_based("TrnTRLogsheetEntry",$role,"ToolroomUser,Admin");
                                echo($td_obj);
                                ?>
                                <li><a href="../php/TrnTRLogsheetView.php">View</a></li>
                            </ul>

                        </div>
                    </li>                    
                    <li class="hover-me"><a href="#">Heat Treatment</a>
                        <div class="sub-menu-2">
                            <ul>
                                <!-- <li><a href="../php/TrnHeatTreatmentEntry.php">Add</a></li> -->
                                <?php
                                $td_obj = add_role_based("TrnHeatTreatmentEntry",$role,"ToolroomUser,Admin");
                                echo($td_obj);
                                ?>
                                <li><a href="../php/TrnHeatTreatmentView.php">View</a></li>
                            </ul>

                        </div>
                    </li>
                    <li class="hover-me"><a href="#">Die Assembly</a>
                        <div class="sub-menu-2">
                            <ul>
                                <!-- <li><a href="../php/TrnDieAssemblyEntry.php">Add</a></li> -->
                                <?php
                                $td_obj = add_role_based("TrnDieAssemblyEntry",$role,"ToolroomUser,Admin");
                                echo($td_obj);
                                ?>
                                <li><a href="../php/TrnDieAssemblyView.php">View</a></li>

                            </ul>

                        </div>
                    </li> 
                    <li class="hover-me"><a href="#">Die Sent For Trial</a>
                        <div class="sub-menu-2">
                            <ul>
                                <!-- <li><a href="../php/TrnDieSentForTrialEntry.php">Add</a></li> -->
                                <?php
                                $td_obj = add_role_based("TrnDieSentForTrialEntry",$role,"ToolroomUser,Admin");
                                echo($td_obj);
                                ?>
                                <li><a href="../php/TrnDieSentForTrialView.php">View</a></li>
                            </ul>

                        </div>
                    </li>
                    <li class="hover-me"><a href="#">Manufacturing Complete</a>
                        <div class="sub-menu-2">
                            <ul>
                                <!-- <li><a href="../php/TrnManufacturingCompleteEntry.php">Add</a></li> -->
                                <?php
                                $td_obj = add_role_based("TrnManufacturingCompleteEntry",$role,"ToolroomUser,Admin");
                                echo($td_obj);
                                ?>
                                <li><a href="../php/TrnManufacturingCompleteView.php">View</a></li>
                            </ul>

                        </div>
                    </li>
                    

                    <li class="hover-me"><a href="#">Production Log Sheet</a>
                        <div class="sub-menu-2">
                            <ul>
                                <!-- <li><a href="../php/TrnProductionLogSheetEntry.php">Add</a></li> -->
                                <?php
                                $td_obj = add_role_based("TrnProductionLogSheetEntry",$role,"ProdUser,Admin");
                                echo($td_obj);
                                ?>
                                <li><a href="../php/TrnProductionLogSheetView.php">View</a></li>
                            </ul>

                        </div>
                    </li>
                    <li class="hover-me"><a href="#">Die Rejection</a>
                    <div class="sub-menu-2">
                            <ul>
                                <!-- <li><a href="../php/TrnTRLogsheetEntry.php">Add</a></li> -->
                                <?php
                                $td_obj = add_role_based("DieRejectionEntry",$role,"ToolroomUser,ProdUser,Admin");
                                echo($td_obj);
                                ?>
                                <li><a href="../php/DieRejectionView.php">View</a></li>
                            </ul>

                        </div>
                        <li class="hover-me"><a href="#">Die Conversion</a>
                    <div class="sub-menu-2">
                            <ul>
                                <!-- <li><a href="../php/TrnTRLogsheetEntry.php">Add</a></li> -->
                                <?php
                                $td_obj = add_role_based("DieConversionEntry",$role,"ToolroomUser,ProdUser,Admin");
                                echo($td_obj);
                                ?>
                                <li><a href="../php/DieConversionView.php">View</a></li>
                            </ul>

                        </div>
                    
                    

                </ul>
            </div>
        </li>
        <li><a href="#">Reports</a>
            <div class="sub-menu-1">
                    
                    <ul>
                        <li><a href="../php/ReportLogSheet.php">Production Log Sheet</a></li>
                    </ul>
                    <ul>
                        <li><a href="../php/ReportHeatTreatment.php">Heat Treatment Requisition Report</a></li>
                    </ul>
                    
                    <ul>
                        <li><a href="../php/DiePerformanceReportSelect.php">Die Performance</a></li>
                    </ul>
                    <ul>
                        <li><a href="../php/ReportPendingDieMfgList.php" target="_blank">Pending Die Manufacturing List</a></li>
                    </ul>
                    <ul>
                        <li><a href="../php/ReportDieMfg.php" target="_blank">Die Manufacturing Details</a></li>
                    </ul>
                    <ul>
                        <!-- <li><a href="../php/SectionWiseDieListView.php" >Section Wise Die Availability</a></li> -->
                        <li><a href="../php/ReportSectionWiseDieAvailability.php" >Section Wise Off-Take</a></li>
                    </ul>
                    <ul>
                        <!-- <li><a href="../php/SectionWiseDieListView.php" >Section Wise Die Availability</a></li> -->
                        <li><a href="../php/ViewFilter.php" >Generic View Screen</a></li>
                    </ul>
                    
                </div>
            </li>
        <li><a href="../php/generate_report.php">Generate Report</a></li>
        <li><a href="../php/logout.php">Logout</a></li>
        <li><a href="#">Welcome <?php echo $_SESSION["username"]?></a></li>
    </ul>
</div>
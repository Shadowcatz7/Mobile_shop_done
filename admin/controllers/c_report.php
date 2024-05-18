<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');

include_once ("../admin/models/m_report.php");
@session_start();
class c_report {

    public function index(){

        if(isset($_GET['report'])){
            $from = NULL; 
            $to = NULL;
            if($_GET['type_fillter'] == 1){
                $from = $_GET['from-date'];
                $to = $_GET['to-date'];
            }

            if($_GET['type_fillter'] == 2){
                switch ($_GET['quarter']) {
                    case 1:
                        $from = date('Y-m-d', strtotime('1st January ' . $_GET['year']));
                        $to = date('Y-m-d', strtotime('31st March ' . $_GET['year']));
                        break;
                    case 2:
                        $from = date('Y-m-d', strtotime('1st April ' . $_GET['year']));
                        $to = date('Y-m-d', strtotime('30th June ' . $_GET['year']));
                        break;
                    case 3:
                        $from = date('Y-m-d', strtotime('1st July ' . $_GET['year']));
                        $to = date('Y-m-d', strtotime('30th September ' . $_GET['year']));
                        break;
                    default:
                        $from = date('Y-m-d', strtotime('1st October ' . $_GET['year']));
                        $to = date('Y-m-d', strtotime('31st December ' . $_GET['year']));
                        break;
                }
            }

            if($_GET['type_fillter'] == 3){
                $from = date('Y-m-d', strtotime('1st January ' . $_GET['year']));
                $to = date('Y-m-d', strtotime('31st December ' . $_GET['year']));
            }

            $report = new m_report();
            $orders = $report->report_order($from, $to);
        }

        $view = "views/report/v_report.php";
        include_once "templates/layout.php";
    }
}
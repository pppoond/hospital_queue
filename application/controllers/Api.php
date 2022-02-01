<?php
defined('BASEPATH') or exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class Api extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Speciality_model');
        $this->load->model('Ovst_model');
        $this->load->model('Kskdepartment_model');
    }

    public function index()
    {
        echo "Welcome Api";
    }

    public function spclty($spclty = "")
    {
        header('Content-Type: application/json;charset=utf-8');
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            if ($spclty != "") {
                $data_arr = array();
                $data_arr['result'] = array();
                $query =  $this->Speciality_model->findById($spclty); //ดึงข้อมูลจาก model Speciality_model
                echo json_encode($query->result(), JSON_UNESCAPED_UNICODE); //แสดงข้อมูลเป็น json
                http_response_code(200);
                exit();
            } else {
                $data_arr = array();
                $data_arr['result'] = array();
                $query =  $this->Speciality_model->getData(); //ดึงข้อมูลจาก model Speciality_model
                echo json_encode($query->result(), JSON_UNESCAPED_UNICODE); //แสดงข้อมูลเป็น json
                http_response_code(200);
                exit();
            }
        } else {
            http_response_code(405);
            exit();
        }
    }

    public function kskdepartment($depcode = "")
    {
        header('Content-Type: application/json;charset=utf-8');
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            if ($depcode != "") {
                $data_arr = array();
                $data_arr['result'] = array();
                $query =  $this->Kskdepartment_model->findById($depcode); //ดึงข้อมูลจาก model Speciality_model
                echo json_encode($query->result(), JSON_UNESCAPED_UNICODE); //แสดงข้อมูลเป็น json
                http_response_code(200);
                exit();
            } else {
                $data_arr = array();
                $data_arr['result'] = array();
                $query =  $this->Kskdepartment_model->getData(); //ดึงข้อมูลจาก model Speciality_model
                echo json_encode($query->result(), JSON_UNESCAPED_UNICODE); //แสดงข้อมูลเป็น json
                http_response_code(200);
                exit();
            }
        } else {
            http_response_code(405);
            exit();
        }
    }

    public function opd_dep_queue($depcode = "")
    {
        header('Content-Type: application/json;charset=utf-8');
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            if ($depcode != "") {
                $sql = "
                SELECT
                *,
                (SELECT CONCAT( patient.pname, patient.fname, ' ', patient.lname ) FROM patient WHERE patient.hn = o2.hn) as ptname
                FROM
                opd_dep_queue o1,
                ovst o2 
                WHERE
                o1.depcode = " . $depcode . "
                AND o1.tx_status = 'W' 
                AND o1.vn = o2.vn 
                AND o2.vstdate = CURRENT_DATE()
                ORDER BY o2.oqueue
                ";
                $query = $this->db->query($sql);
                echo json_encode($query->result(), JSON_UNESCAPED_UNICODE); //แสดงข้อมูลเป็น json
                http_response_code(200);
                exit();
            } else {
                $sql = "
                SELECT
                *,
                (SELECT CONCAT( patient.pname, patient.fname, ' ', patient.lname ) FROM patient WHERE patient.hn = o2.hn) as ptname
                FROM
                opd_dep_queue o1,
                ovst o2 
                WHERE 
                o1.tx_status = 'W' 
                AND o1.vn = o2.vn 
                AND o2.vstdate = CURRENT_DATE()
                ";
                $query = $this->db->query($sql); //ดึงข้อมูลจาก model Speciality_model
                echo json_encode($query->result(), JSON_UNESCAPED_UNICODE); //แสดงข้อมูลเป็น json
                http_response_code(200);
                exit();
            }
        } else {
            http_response_code(405);
            exit();
        }
    }

    public function ovst()
    {
        header('Content-Type: application/json;charset=utf-8');
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $data_arr = array();
            $data_arr['result'] = array();
            $query =  $this->Ovst_model->getData(); //ดึงข้อมูลจาก model Speciality_model
            echo json_encode($query->result(), JSON_UNESCAPED_UNICODE); //แสดงข้อมูลเป็น json
            http_response_code(200);
            exit();
        } else {
            http_response_code(405);
            exit();
        }
    }
    public function ovst_oqueue($oqueue = "0")
    {
        header('Content-Type: application/json;charset=utf-8');
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $data_arr = array();
            $data_arr['result'] = array();
            $query =  $this->Ovst_model->findByOqueue($oqueue); //ดึงข้อมูลจาก model Speciality_model
            echo json_encode($query->result(), JSON_UNESCAPED_UNICODE); //แสดงข้อมูลเป็น json
            http_response_code(200);
            exit();
        } else {
            http_response_code(405);
            exit();
        }
    }

    public function notfound()
    {
        $this->load->view('notfound');
    }

    public function query_String()
    {
        header('Content-Type: application/json;charset=utf-8');
        $sql = $_GET['sql'];
        // $sql = "SELECT * FROM spclty";
        $query = $this->db->query($sql);
        echo json_encode($query->result(), JSON_UNESCAPED_UNICODE); //แสดงข้อมูลเป็น json
        http_response_code(200);
        exit();
    }

    public function statusUpdate()
    {
        $oqueue = $_GET["oqueue"] ;
        $db2 = $this->load->database('db2', TRUE);
        $sql = "UPDATE request_queue set status = 1 where Date(time_reg)=curdate() and oqueue = '" . $oqueue . "'";
        $query = $db2->query($sql);
    }


    public function queueByStatus()
    {
        $db2 = $this->load->database('db2', TRUE);
        $sql = "SELECT * from request_queue where status=1 and Date(time_reg)=curdate()";
        $query = $db2->query($sql);
        echo json_encode($query->result(), JSON_UNESCAPED_UNICODE); //แสดงข้อมูลเป็น json
        http_response_code(200);
        exit();
    }

}

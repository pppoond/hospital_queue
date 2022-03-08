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

    public function hsd_sum_d($hsd_id = "")
    {
        header('Content-Type: application/json;charset=utf-8');
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            if ($hsd_id != "") {
                $db2 = $this->load->database('db2', TRUE);
                $sql = "SELECT * FROM hosq_sum_depart WHERE hsd_id = " . $hsd_id . " ORDER BY hsd_id ASC";
                $query = $db2->query($sql);
                echo json_encode($query->result(), JSON_UNESCAPED_UNICODE); //แสดงข้อมูลเป็น json
                http_response_code(200);
                exit();
            } else {
                $db2 = $this->load->database('db2', TRUE);
                $sql = "SELECT * FROM hosq_sum_depart ORDER BY hsd_id ASC";
                $query = $db2->query($sql);
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

    public function hosq_department($action = "")
    {
        header('Content-Type: application/json;charset=utf-8');
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $db2 = $this->load->database('db2', TRUE);
            if ($action != "") {
                switch ($action) {
                    case 'add':
                        // $spclty = $_GET['spclty'];
                        // $oqueue = $_GET['oqueue'];
                        // $ptname = $_GET['ptname'];
                        // $curdep_code = $_GET['curdep_code'];
                        // $curdep_name = $_GET['curdep_name'];
                        // $this->Hosq_department_model->add($spclty, $oqueue, $ptname, $curdep_code, $curdep_name);
                        // echo json_encode(array('msg' => 'success'), JSON_UNESCAPED_UNICODE);
                        break;
                    default:
                        echo json_encode(array('msg' => 'check your acction url.'), JSON_UNESCAPED_UNICODE);
                        break;
                }
                exit();
            } else {
                $sql = "
                SELECT * FROM hosq_department ORDER BY hqd_id ASC
                ";
                $query = $db2->query($sql); //ดึงข้อมูลจาก model Request_queue_model
                echo json_encode($query->result(), JSON_UNESCAPED_UNICODE); //แสดงข้อมูลเป็น json
                http_response_code(200);
                exit();
            }
        } else {
            http_response_code(405);
            exit();
        }
    }

    public function request_queue_by_hsd($hsd_id = "")
    {
        header('Content-Type: application/json;charset=utf-8');
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $db2 = $this->load->database('db2', TRUE);
            if ($hsd_id != "") {
                $sql = "
                SELECT rq.* FROM request_queue rq 
                INNER JOIN hosq_department hd ON rq.curdep_code = hd.depcode 
                INNER JOIN hosq_sum_depart hsd ON hd.hsd_id = hsd.hsd_id
                WHERE DATE(rq.time_reg) = CURDATE() AND hsd.hsd_id = '" . $hsd_id . "'  ORDER BY rq_id DESC LIMIT 5
                ";
                $query = $db2->query($sql); //ดึงข้อมูลจาก model Request_queue_model
                echo json_encode($query->result(), JSON_UNESCAPED_UNICODE); //แสดงข้อมูลเป็น json
                http_response_code(200);
                exit();
            } else {
                $sql = "SELECT * FROM {$this->tableName} ORDER BY rq_id DESC LIMIT 5";
                $query = $db2->query($sql); //ดึงข้อมูลจาก model Request_queue_model
                echo json_encode($query->result(), JSON_UNESCAPED_UNICODE); //แสดงข้อมูลเป็น json
                http_response_code(200);
                exit();
            }
        } else {
            http_response_code(405);
            exit();
        }
    }

    public function request_queue_add($action = "")
    {
        header('Content-Type: application/json;charset=utf-8');
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $db2 = $this->load->database('db2', TRUE);
            if ($action != "") {
                switch ($action) {
                    case 'add':
                        $spclty = $_GET['spclty'];
                        $oqueue = $_GET['oqueue'];
                        $ptname = "";
                        $curdep_code = $_GET['curdep_code'];
                        $curdep_name = "";
                        $json = file_get_contents(site_url("/Api/ovst_oqueue/") . $oqueue);
                        $obj = json_decode($json);
                        $num_row = 1;
                        foreach ($obj as $dataRow) {
                            $ptname = $dataRow->ptname;
                            $num_row++;
                        }
                        $sql = "
                        SELECT * FROM hosq_department WHERE depcode = " . $curdep_code . " ORDER BY hqd_id DESC LIMIT 5
                        ";
                        $query1 = $db2->query($sql);
                        if ($query1->num_rows() >= 1) {
                            foreach ($query1->result() as $row) {
                                $curdep_name = $row->department;
                            }
                        } else {
                            echo json_encode(array('msg' => 'unsuccess depcode not found'), JSON_UNESCAPED_UNICODE);
                            // echo $curdep_name . $ptname;
                            break;
                        }
                        $sql = "
                        INSERT INTO request_queue (spclty, oqueue, ptname, curdep_code, curdep_name) VALUES ('" . $spclty . "','" . $oqueue . "','" . $ptname . "','" . $curdep_code . "','" . $curdep_name . "')
                        ";
                        $db2->query($sql);
                        echo json_encode(array('msg' => 'success'), JSON_UNESCAPED_UNICODE);
                        // echo $curdep_name . $ptname;
                        break;
                    default:
                        echo json_encode(array('msg' => 'check your acction url.'), JSON_UNESCAPED_UNICODE);
                        break;
                }
                exit();
            } else {
                echo "No Action";
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

    public function opd_dep_queue2($depcode = "")
    {
        $db2 = $this->load->database('db2', TRUE);

        header('Content-Type: application/json;charset=utf-8');
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            if ($depcode != "") {

                $dataArr = array();

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
                // echo json_encode($query->result(), JSON_UNESCAPED_UNICODE); //แสดงข้อมูลเป็น json
                foreach ($query->result() as $row) {
                    $sql2 = "SELECT * FROM request_queue WHERE oqueue = '" . $row->oqueue . "' AND DATE(time_reg) = CURDATE() AND status = 1 LIMIT 1";
                    $query2 = $db2->query($sql2);
                    if ($query2->num_rows() >= 1) {
                        $row = $query->first_row();
                    } else {
                        array_push($dataArr, $row);
                    }
                }
                echo json_encode($dataArr, JSON_UNESCAPED_UNICODE);
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
        $oqueue = $_GET["oqueue"];
        $db2 = $this->load->database('db2', TRUE);
        $sql = "UPDATE request_queue set status = 1 where Date(time_reg)=curdate() and oqueue = '" . $oqueue . "'";
        $query = $db2->query($sql);
    }


    public function queueByStatus()
    {
        $db2 = $this->load->database('db2', TRUE);
        $sql = "SELECT * from request_queue where status=1 and Date(time_reg)=curdate() ORDER BY rq_id DESC";
        $query = $db2->query($sql);
        echo json_encode($query->result(), JSON_UNESCAPED_UNICODE); //แสดงข้อมูลเป็น json
        http_response_code(200);
        exit();
    }

    public function sumDepartment($hsd_id = "")
    {
        header('Content-Type: application/json;charset=utf-8');
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            if ($hsd_id != "") {
                $query =  $this->Speciality_model->findById($hsd_id); //ดึงข้อมูลจาก model Speciality_model
                echo json_encode($query->result(), JSON_UNESCAPED_UNICODE); //แสดงข้อมูลเป็น json
                http_response_code(200);
                exit();
            } else {
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

    public function settingShowPtname($action = "")
    {
        $db2 = $this->load->database('db2', TRUE);
        if ($action == "update") {
            $hsd_id = $_GET["hsd_id"];
            $hqs_status = $_GET['hqs_status'];
            $sql = "UPDATE hosq_setting set hqs_status = '" . $hqs_status . "' WHERE hqs_name = 'show_ptname' AND hsd_id = '" . $hsd_id . "'";
            $query = $db2->query($sql);
            echo json_encode(array(
                "msg" => "success"
            ), JSON_UNESCAPED_UNICODE); //แสดงข้อมูลเป็น json
            http_response_code(200);
            exit();
        } else if ($action == "get") {
            if (isset($_GET["hsd_id"])) {
                $hsd_id = $_GET["hsd_id"];
                $sql = "SELECT * from hosq_setting WHERE hqs_name = 'show_ptname' AND hsd_id = '" . $hsd_id . "'";
                $query = $db2->query($sql);
                echo json_encode($query->result(), JSON_UNESCAPED_UNICODE); //แสดงข้อมูลเป็น json
                http_response_code(200);
                exit();
            } else {
                echo json_encode(array(
                    "msg" => "Please Add url parameter ?hsd_id=:hsd_id"
                ), JSON_UNESCAPED_UNICODE); //แสดงข้อมูลเป็น json
                http_response_code(200);
                exit();
            }
        } else {
            echo json_encode(array(
                "msg" => "no acction"
            ), JSON_UNESCAPED_UNICODE); //แสดงข้อมูลเป็น json
            http_response_code(200);
            exit();
        }
    }

    public function settingTwoTimeSpeak($action = "")
    {
        $db2 = $this->load->database('db2', TRUE);
        if ($action == "update") {
            $hsd_id = $_GET["hsd_id"];
            $hqs_status = $_GET['hqs_status'];
            $sql = "UPDATE hosq_setting set hqs_status = '" . $hqs_status . "' WHERE hqs_name = 'speak_two_time' AND hsd_id = '" . $hsd_id . "'";
            $query = $db2->query($sql);
            echo json_encode(array(
                "msg" => "success"
            ), JSON_UNESCAPED_UNICODE); //แสดงข้อมูลเป็น json
            http_response_code(200);
            exit();
        } else if ($action == "get") {
            if (isset($_GET["hsd_id"])) {
                $hsd_id = $_GET["hsd_id"];
                $sql = "SELECT * from hosq_setting WHERE hqs_name = 'speak_two_time' AND hsd_id = '" . $hsd_id . "'";
                $query = $db2->query($sql);
                echo json_encode($query->result(), JSON_UNESCAPED_UNICODE); //แสดงข้อมูลเป็น json
                http_response_code(200);
                exit();
            } else {
                echo json_encode(array(
                    "msg" => "Please Add url parameter ?hsd_id=:hsd_id"
                ), JSON_UNESCAPED_UNICODE); //แสดงข้อมูลเป็น json
                http_response_code(200);
                exit();
            }
        } else {
            echo json_encode(array(
                "msg" => "no acction"
            ), JSON_UNESCAPED_UNICODE); //แสดงข้อมูลเป็น json
            http_response_code(200);
            exit();
        }
    }

    public function settingSpeakName($action = "")
    {
        $db2 = $this->load->database('db2', TRUE);
        if ($action == "update") {
            $hsd_id = $_GET["hsd_id"];
            $hqs_status = $_GET['hqs_status'];
            $sql = "UPDATE hosq_setting set hqs_status = '" . $hqs_status . "' WHERE hqs_name = 'speak_name' AND hsd_id = '" . $hsd_id . "'";
            $query = $db2->query($sql);
            echo json_encode(array(
                "msg" => "success"
            ), JSON_UNESCAPED_UNICODE); //แสดงข้อมูลเป็น json
            http_response_code(200);
            exit();
        } else if ($action == "get") {
            if (isset($_GET["hsd_id"])) {
                $hsd_id = $_GET["hsd_id"];
                $sql = "SELECT * from hosq_setting WHERE hqs_name = 'speak_name' AND hsd_id = '" . $hsd_id . "'";
                $query = $db2->query($sql);
                echo json_encode($query->result(), JSON_UNESCAPED_UNICODE); //แสดงข้อมูลเป็น json
                http_response_code(200);
                exit();
            } else {
                echo json_encode(array(
                    "msg" => "Please Add url parameter ?hsd_id=:hsd_id"
                ), JSON_UNESCAPED_UNICODE); //แสดงข้อมูลเป็น json
                http_response_code(200);
                exit();
            }
        } else {
            echo json_encode(array(
                "msg" => "no acction"
            ), JSON_UNESCAPED_UNICODE); //แสดงข้อมูลเป็น json
            http_response_code(200);
            exit();
        }
    }

    public function findBySign_datetime()
    {
        $db2 = $this->load->database('db2', TRUE);
        if (isset($_GET['sign_datetime'])) {
            $sign_datetime = $_GET['sign_datetime'];
            $sql = "SELECT * FROM request_queue WHERE sign_datetime = '" . $sign_datetime . "' AND DATE(time_reg) = CURDATE() LIMIT 1";
            $query = $db2->query($sql);
            echo json_encode($query->result(), JSON_UNESCAPED_UNICODE); //แสดงข้อมูลเป็น json
            http_response_code(200);
            exit();
        } else {
            echo json_encode(array(
                "msg" => "no sign_datetime"
            ), JSON_UNESCAPED_UNICODE); //แสดงข้อมูลเป็น json
            http_response_code(200);
            exit();
        }
    }


    public function firstTimeOnCurrentDate()
    {
        if (isset($_GET['hsd_id'])) {
            $hsd_id = $_GET['hsd_id'];

            $db2 = $this->load->database('db2', TRUE);
            $sql = "SELECT COUNT(*) as count_num FROM request_queue rq 
                INNER JOIN hosq_department hd ON rq.curdep_code = hd.depcode 
                INNER JOIN hosq_sum_depart hsd ON hd.hsd_id = hsd.hsd_id
                WHERE DATE(rq.time_reg) = CURDATE() AND hsd.hsd_id = '" . $hsd_id . "'";
            $query = $db2->query($sql);
            $row = $query->row();
            if (isset($row)) {
                if ($row->count_num > 0) {
                    echo json_encode(array(
                        "msg" => "row > 0"
                    ), JSON_UNESCAPED_UNICODE); //แสดงข้อมูลเป็น json
                    http_response_code(200);
                    exit();
                } else {
                    $sql2 = "INSERT INTO request_queue (spclty,oqueue,ptname,curdep_code,curdep_name) VALUES ((SELECT IF((SELECT spclty FROM hosq_department WHERE hsd_id = '" . $hsd_id . "' LIMIT 1) > 0,(SELECT spclty FROM hosq_department WHERE hsd_id = '" . $hsd_id . "' LIMIT 1),'99') as spclty),0,'',(SELECT IF((SELECT depcode FROM hosq_department WHERE hsd_id = '" . $hsd_id . "' LIMIT 1) > 0,(SELECT depcode FROM hosq_department WHERE hsd_id = '" . $hsd_id . "' LIMIT 1),'999') as depcode),'ยังไม่มีคิว')";
                    $query2 = $db2->query($sql2);
                    echo json_encode(array(
                        "msg" => "Inserted Row"
                    ), JSON_UNESCAPED_UNICODE);
                    http_response_code(200);
                    exit();
                }
            } else {
            }
            // echo json_encode($query->result(), JSON_UNESCAPED_UNICODE); //แสดงข้อมูลเป็น json
            http_response_code(200);
        } else {
            echo json_encode(array(
                "msg" => "please add ?hsd_id Parameter"
            ), JSON_UNESCAPED_UNICODE);
            http_response_code(200);
            exit();
        }
    }

    public function findDepartmentByHsdId($hsd_id = "")
    {
        if ($hsd_id != "") {
            $db2 = $this->load->database('db2', TRUE);
            $sql = "SELECT * FROM hosq_department ";
            $query = $db2->query($sql);
            echo json_encode($query->result(), JSON_UNESCAPED_UNICODE); //แสดงข้อมูลเป็น json
            http_response_code(200);
        } else {
            echo json_encode(array(
                "msg" => "please add ?hsd_id Parameter"
            ), JSON_UNESCAPED_UNICODE);
            http_response_code(200);
            exit();
        }
    }
}

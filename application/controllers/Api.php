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

    public function notfound()
    {
        $this->load->view('notfound');
    }
}

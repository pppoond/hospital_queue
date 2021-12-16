<?php
defined('BASEPATH') or exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class Api_speech extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Speciality_model');
    }

    public function index()
    {
        echo "Welcome Api";
    }

    public function speechapi()
    {
        header('Content-Type: application/json;charset=utf-8');
        if ($_SERVER['REQUEST_METHOD'] == "GET") {

            $data_arr = array();
            $data_arr['result'] = array();

            $query =  $this->Speciality_model->speechBox();
            // foreach ($query->result() as $row) {
            //     $data_items = array(
            //         'spclty' => $row->spclty,
            //     );
            //     array_push($data_arr['result'], $data_items);
            // }
            echo json_encode($query->result(), JSON_UNESCAPED_UNICODE);
            http_response_code(200);
            exit();
        } else {
        }
    }

    public function notfound()
    {
        $this->load->view('notfound');
    }
}

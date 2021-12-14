<?php
defined('BASEPATH') or exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class Speciality extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Speciality_model');
    }

    //แสดงหน้าตาม department id
    public function _remap($depcode)
    {
        //depcode default เป็น index

        if ($depcode != 'index') {
            //query ถ้ามีข้อมูล จะเข้าเงื่อนไช if ถ้าไม่มี จะเข้า else

            if ($depcode == '10') {
                echo $depcode;
            } else {
                $this->notfound();
            }
        } else {
            $this->hello();
        }
    }

    public function index()
    {
        echo "Index";
    }

    public function hello()
    {
        echo "Heoloasd";
    }

    public function notfound()
    {
        $this->load->view('notfound');
    }
}

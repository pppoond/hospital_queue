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
    public function _remap($spclty = "")
    {
        //depcode default เป็น index
        $query =  $this->Speciality_model->findById($spclty);
        if ($query->num_rows() >= 1) {
            $row = $query->first_row();
            $data = $row;
            $this->page($data);
        } else {
            $this->notfound();
        }
    }

    public function index()
    {
        echo "Index";
    }

    public function page($data)
    {
        $this->load->helper('url');
        $this->load->library('javascript');
        $this->load->view('includes/css');
        $this->load->view('spclty/spclty_view', $data);
        $this->load->view('includes/js');
    }

    public function notfound()
    {
        $this->load->view('notfound');
    }
}

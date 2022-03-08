<?php
defined('BASEPATH') or exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class PointCenter extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    //แสดงหน้าตาม department id
    public function _remap($hsd_id = "")
    {
        $db2 = $this->load->database('db2', TRUE);
        //depcode default เป็น index
        $sql = "SELECT * FROM hosq_sum_depart WHERE hsd_id = '" . $hsd_id . "' ORDER BY hsd_id ASC";
        $query = $db2->query($sql);
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
        $this->load->view('point/point_view', $data);
        $this->load->view('includes/js');
    }

    public function notfound()
    {
        $this->load->view('notfound');
    }
}

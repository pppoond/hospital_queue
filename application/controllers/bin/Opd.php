<?php
defined('BASEPATH') or exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class Opd extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Opd_model');
    }

    public function index()
    {
        $this->load->helper('url');
        $this->load->library('javascript');
        $this->load->view('includes/css');
        $this->load->view('opd/opd_view');
        $this->load->view('includes/js');
    }

    public function qnumber()
    {
        $query =  $this->Dental_model->getData();
        if ($query->num_rows() >= 1) {
            $num_row = 1;
            foreach ($query->result() as $row) {
                $data = array(
                    'oqueue' => $row->oqueue,
                    'vstdate' => $row->vstdate,
                    'num_row' => $num_row,
                    'sign_datetime' => $row->sign_datetime
                );
                $this->load->view('pages/qnumber', $data);
                $num_row++;
            }
        } else {
            echo "<div style='text-align: center;width: 100%;'><h1>ไม่มีคิว</h1></div>";
        }
    }
    public function dental_qmain()
    {
        $query =  $this->Opd_model->getDataByQueue();
        if ($query->num_rows() >= 1) {
            $num_row = 1;
            foreach ($query->result() as $row) {
                $data = array(
                    'oqueue' => $row->oqueue,
                    'vstdate' => $row->vstdate,
                    'curdep_name' => $row->curdep_name,
                    'ptname' => $row->ptname,
                    'num_row' => $num_row,
                    'sign_datetime' => $row->sign_datetime
                );
                $this->load->view('pages/dental/dental_qmain', $data);
                $num_row++;
            }
        } else {
            echo "<div style='text-align: center;width: 100%; color:red ; margin:75px; font-weight: 900;' ><h1>ไม่มีคิว</h1></div>";
        }
    }

    public function timecurrent()
    {
        $this->load->view('pages/timecurrent');
    }

    public function getdata()
    {
        $query = $this->db->query('SELECT * FROM queue_table');
        foreach ($query->result() as $row) {

            echo $row->q_id;
            echo $row->q;
        }
    }
}

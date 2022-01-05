<?php
defined('BASEPATH') or exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class Spclty extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->helper('url');
        $this->load->library('javascript');
        $this->load->view('includes/css');
        $this->load->view('spclty/spclty_view');
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

    public function qmain($spclty = "")
    {
        if ($spclty != "") {
            $json = file_get_contents("http://192.168.100.239/hos_q/client/api/request_queue_by_spclty/" . $spclty);
            $obj = json_decode($json);
            $num_row = 1;
            foreach ($obj as $dataRow) {
                // echo $dataRow->spclty;
                $data = array(
                    'oqueue' => $dataRow->oqueue,
                    'curdep_name' => $dataRow->curdep_name,
                    'ptname' => $dataRow->ptname,
                    'num_row' => $num_row,
                    'sign_datetime' => $dataRow->sign_datetime
                );
                $this->load->view('spclty/patient_queue', $data);
                $num_row++;
            }
        } else {
            $json = file_get_contents("http://192.168.100.239/hos_q/client/api/request_queue");
            $obj = json_decode($json);
            $num_row = 1;
            foreach ($obj as $dataRow) {
                // echo $dataRow->spclty;
                $data = array(
                    'oqueue' => $dataRow->oqueue,
                    'curdep_name' => $dataRow->curdep_name,
                    'ptname' => $dataRow->ptname,
                    'num_row' => $num_row,
                    'sign_datetime' => $dataRow->sign_datetime
                );
                $this->load->view('spclty/patient_queue', $data);
                $num_row++;
            }
        }
        // $query =  $this->Opd_model->getDataByQueue();
        // if ($query->num_rows() >= 1) {
        //     $num_row = 1;
        //     foreach ($query->result() as $row) {
        //         $data = array(
        //             'oqueue' => $row->oqueue,
        //             'vstdate' => $row->vstdate,
        //             'curdep_name' => $row->curdep_name,
        //             'ptname' => $row->ptname,
        //             'num_row' => $num_row,
        //             'sign_datetime' => $row->sign_datetime
        //         );
        //         $this->load->view('pages/dental/dental_qmain', $data);
        //         $num_row++;
        //     }
        // } else {
        //     echo "<div style='text-align: center;width: 100%; color:red ; margin:75px; font-weight: 900;' ><h1>ไม่มีคิว</h1></div>";
        // }
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

<?php
defined('BASEPATH') or exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class DentalTest extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dental_model');
    }

    public function index()
    {
        $this->load->view('includes/css');
        $this->load->view('dentaltest_view');
        // $dentalModel = $this->Dental_model;
        // echo $dentalModel->add();
    }

    public function qnumber()
    {
        // $sql = "select o.oqueue,o.vstdate,p.cid,o.hn,o.vsttime,o.vn,concat(p.pname,p.fname,' ',p.lname) as ptname,v.age_y,v.age_m,v.age_d,
        // k.depcode as curdep_code,k.department as curdep_name from ovst o left outer join vn_stat v   on v.vn = o.vn left outer join patient p  on p.hn = o.hn
        // left outer join kskdepartment k on k.depcode = o.cur_dep
        //         where k.spclty = '11' AND
        //          o.vstdate >= CURDATE() ORDER BY o.oqueue ASC LIMIT 10";
        // $query = $this->db->query($sql);
        // if ($query->num_rows() >= 1) {
        //     foreach ($query->result() as $row) {
        //         $data = array(
        //             'oqueue' => $row->oqueue,
        //             'vstdate' => $row->vstdate,
        //         );
        //         $this->load->view('pages/qnumber', $data);
        //     }
        // } else {
        //     echo "<div style='text-align: center;width: 100%;'><h1>ไม่มีคิว</h1></div>";
        // }
        $query =  $this->Dental_model->getData();
        if ($query->num_rows() >= 1) {
            $num_row = 1;
            foreach ($query->result() as $row) {

                $data = array(
                    'oqueue' => $row->oqueue,
                    'vstdate' => $row->vstdate,
                    'num_row' => $num_row
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
        $query =  $this->Dental_model->getDataByQueue();
        if ($query->num_rows() >= 1) {
            $num_row = 1;
            foreach ($query->result() as $row) {
                $data = array(
                    'oqueue' => $row->oqueue,
                    'vstdate' => $row->vstdate,
                    'curdep_name' => $row->curdep_name,
                    'ptname' => $row->ptname,
                    'num_row' => $num_row
                );
                $this->load->view('pages/dental/dental_qmain', $data);
                $num_row++;
            }
        } else {
            echo "<div style='text-align: center;width: 100%;'><h1>ไม่มีคิว</h1></div>";
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

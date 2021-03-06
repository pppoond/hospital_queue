<?php
defined('BASEPATH') or exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class Dental extends CI_Controller
{

    public function index()
    {
        $this->load->view('includes/css');
        $this->load->view('dental_view');
    }

    public function qnumber()
    {
        $sql = "select o.oqueue,o.vstdate,p.cid,o.hn,o.vsttime,o.vn,concat(p.pname,p.fname,' ',p.lname) as ptname,v.age_y,v.age_m,v.age_d,
        k.depcode as curdep_code,k.department as curdep_name from ovst o left outer join vn_stat v   on v.vn = o.vn left outer join patient p  on p.hn = o.hn
        left outer join kskdepartment k on k.depcode = o.cur_dep
                where k.spclty = '11' AND
                 o.vstdate >= CURDATE() ORDER BY o.oqueue ASC LIMIT 10";
        $query = $this->db->query($sql);
        foreach ($query->result() as $row) {
            $data = array(
                'oqueue' => $row->oqueue,
                'vstdate' => $row->vstdate,
            );
            $this->load->view('pages/qnumber', $data);
        }
    }
    public function dental_qmain()
    {
        $sql = "select o.oqueue,o.vstdate,p.cid,o.hn,o.vsttime,o.vn,concat(p.pname,p.fname,' ',p.lname) as ptname,v.age_y,v.age_m,v.age_d,
        k.depcode as curdep_code,k.department as curdep_name from ovst o left outer join vn_stat v   on v.vn = o.vn left outer join patient p  on p.hn = o.hn
        left outer join kskdepartment k on k.depcode = o.cur_dep
                where k.spclty = '11'  ORDER BY o.oqueue desc Limit 4 ;";
        $query = $this->db->query($sql);
        foreach ($query->result() as $row) {
            $data = array(
                'oqueue' => $row->oqueue,
                'vstdate' => $row->vstdate,
                'cid' => $row->cid,
                'ptname' => $row->ptname,
                'curdep_code' => $row->curdep_code,
                'curdep_name' => $row->curdep_name
            );
            $this->load->view('pages/dental/dental_qmain', $data);
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

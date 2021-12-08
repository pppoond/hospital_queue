<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function index()
	{
		$this->load->view('includes/css');
		$this->load->view('Home');
	}

	public function qnumber()
	{
		$sql = "select o.oqueue,o.vstdate,p.cid,o.hn,o.vsttime,o.vn,concat(p.pname,p.fname,' ',p.lname) as ptname,v.age_y,v.age_m,v.age_d from ovst o left outer join vn_stat v   on v.vn = o.vn left outer join patient p  on p.hn = o.hn where o.vstdate between '2021-12-08' AND '2021-12-08' ORDER BY o.oqueue DESC LIMIT 10";
		$query = $this->db->query($sql);
		foreach ($query->result() as $row) {
			$data = array(
				'oqueue' => $row->oqueue,
				'vstdate' => $row->vstdate,
			);
			$this->load->view('pages/qnumber', $data);
		}
	}
	public function qmain()
	{
		$sql = "select o.oqueue,o.vstdate,p.cid,o.hn,o.vsttime,o.vn,concat(p.pname,p.fname,' ',p.lname) as ptname,v.age_y,v.age_m,v.age_d from ovst o left outer join vn_stat v   on v.vn = o.vn left outer join patient p  on p.hn = o.hn where o.vstdate between '2021-12-08' AND '2021-12-08' ORDER BY o.oqueue DESC LIMIT 1";
		$query = $this->db->query($sql);
		foreach ($query->result() as $row) {
			$data = array(
				'oqueue' => $row->oqueue,
				'vstdate' => $row->vstdate,
				'cid' => $row->cid,
				'ptname' => $row->ptname
			);
			$this->load->view('pages/qmain', $data);
		}
	}
	public function getmodel()
	{
		$this->load->model('homemodel');
		$this->homemodel->getData();
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

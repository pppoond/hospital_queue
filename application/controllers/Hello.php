<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hello extends CI_Controller
{

	public function index()
	{
		$this->load->view('hello_view');
	}
	public function index2()
	{
		$this->load->view('hello_view_2');
	}
}

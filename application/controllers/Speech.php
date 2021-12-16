<?php
defined('BASEPATH') or exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');


class Speech extends CI_Controller
{

	public function index()
	{

		$this->load->helper('url');
		$this->load->library('javascript');
		$this->load->view('includes/css');

		$this->load->view('speech_view');
	}
}

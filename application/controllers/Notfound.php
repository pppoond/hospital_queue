<?php
defined('BASEPATH') or exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class Notfound extends CI_Controller
{
    public function index()
    {
        $this->load->view('404');
    }

}

<?php
class HomeModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function get_data() {
        
    }
}

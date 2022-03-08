<?php
defined('BASEPATH') or exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class Hsd extends CI_Controller
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
    public function qmain($hsd_id = "")
    {
        if ($hsd_id != "") {
            $json = file_get_contents(site_url('/Api/request_queue_by_hsd/') . $hsd_id);
            $obj = json_decode($json);
            $num_row = 1;
            foreach ($obj as $dataRow) {
                // echo $dataRow->spclty;
                $curdep_name = $dataRow->curdep_name;
                switch ($dataRow->curdep_name) {
                    case 'ซักประวัติ 1':
                        $curdep_name = "โต๊ะ" . $dataRow->curdep_name;
                        break;
                    case 'ซักประวัติ 2':
                        $curdep_name = "โต๊ะ" . $dataRow->curdep_name;
                        break;
                    case 'ซักประวัติ 3':
                        $curdep_name = "โต๊ะ" . $dataRow->curdep_name;
                        break;
                    case 'ซักประวัติ 4':
                        $curdep_name = "โต๊ะ" . $dataRow->curdep_name;
                        break;
                    case 'ซักประวัติ 5':
                        $curdep_name = "โต๊ะ" . $dataRow->curdep_name;
                        break;
                    case 'ซักประวัติ 6':
                        $curdep_name = "โต๊ะ" . $dataRow->curdep_name;
                        break;

                    default:
                        # code...
                        break;
                }
                $data = array(
                    'oqueue' => $dataRow->oqueue,
                    'curdep_name' => $curdep_name,
                    'ptname' => $dataRow->ptname,
                    'num_row' => $num_row,
                    'sign_datetime' => $dataRow->sign_datetime
                );
                $this->load->view('spclty/patient_queue', $data);
                $num_row++;
            }
        } else {
            $json = file_get_contents(site_url('/Api/request_queue_by_hsd'));
            $obj = json_decode($json);
            $num_row = 1;
            foreach ($obj as $dataRow) {
                // echo $dataRow->spclty;
                $curdep_name = $dataRow->curdep_name;
                switch ($dataRow->curdep_name) {
                    case 'ซักประวัติ 1':
                        $curdep_name = "โต๊ะ" . $dataRow->curdep_name;
                        break;
                    case 'ซักประวัติ 2':
                        $curdep_name = "โต๊ะ" . $dataRow->curdep_name;
                        break;
                    case 'ซักประวัติ 3':
                        $curdep_name = "โต๊ะ" . $dataRow->curdep_name;
                        break;
                    case 'ซักประวัติ 4':
                        $curdep_name = "โต๊ะ" . $dataRow->curdep_name;
                        break;
                    case 'ซักประวัติ 5':
                        $curdep_name = "โต๊ะ" . $dataRow->curdep_name;
                        break;
                    case 'ซักประวัติ 6':
                        $curdep_name = "โต๊ะ" . $dataRow->curdep_name;
                        break;

                    default:
                        # code...
                        break;
                }
                $data = array(
                    'oqueue' => $dataRow->oqueue,
                    'curdep_name' => $curdep_name,
                    'ptname' => $dataRow->ptname,
                    'num_row' => $num_row,
                    'sign_datetime' => $dataRow->sign_datetime
                );
                $this->load->view('spclty/patient_queue', $data);
                $num_row++;
            }
        }
    }

    public function qmain2($hsd_id = "")
    {
        if ($hsd_id != "") {
            $json = file_get_contents(site_url('/Api/request_queue_by_hsd/') . $hsd_id);
            $obj = json_decode($json);
            $num_row = 1;
            foreach ($obj as $dataRow) {
                // echo $dataRow->spclty;
                $curdep_name = $dataRow->curdep_name;
                switch ($dataRow->curdep_name) {
                    case 'ซักประวัติ 1':
                        $curdep_name = "โต๊ะ" . $dataRow->curdep_name;
                        break;
                    case 'ซักประวัติ 2':
                        $curdep_name = "โต๊ะ" . $dataRow->curdep_name;
                        break;
                    case 'ซักประวัติ 3':
                        $curdep_name = "โต๊ะ" . $dataRow->curdep_name;
                        break;
                    case 'ซักประวัติ 4':
                        $curdep_name = "โต๊ะ" . $dataRow->curdep_name;
                        break;
                    case 'ซักประวัติ 5':
                        $curdep_name = "โต๊ะ" . $dataRow->curdep_name;
                        break;
                    case 'ซักประวัติ 6':
                        $curdep_name = "โต๊ะ" . $dataRow->curdep_name;
                        break;

                    default:
                        # code...
                        break;
                }
                $data = array(
                    'oqueue' => $dataRow->oqueue,
                    'curdep_name' =>  $curdep_name,
                    'ptname' => $dataRow->ptname,
                    'num_row' => $num_row,
                    'sign_datetime' => $dataRow->sign_datetime
                );
                $this->load->view('spclty/patient_queue2', $data);
                $num_row++;
            }
        } else {
            $json = file_get_contents(site_url('/Api/request_queue_by_hsd'));
            $obj = json_decode($json);
            $num_row = 1;
            foreach ($obj as $dataRow) {
                // echo $dataRow->spclty;
                $curdep_name = $dataRow->curdep_name;
                switch ($dataRow->curdep_name) {
                    case 'ซักประวัติ 1':
                        $curdep_name = "โต๊ะ" . $dataRow->curdep_name;
                        break;
                    case 'ซักประวัติ 2':
                        $curdep_name = "โต๊ะ" . $dataRow->curdep_name;
                        break;
                    case 'ซักประวัติ 3':
                        $curdep_name = "โต๊ะ" . $dataRow->curdep_name;
                        break;
                    case 'ซักประวัติ 4':
                        $curdep_name = "โต๊ะ" . $dataRow->curdep_name;
                        break;
                    case 'ซักประวัติ 5':
                        $curdep_name = "โต๊ะ" . $dataRow->curdep_name;
                        break;
                    case 'ซักประวัติ 6':
                        $curdep_name = "โต๊ะ" . $dataRow->curdep_name;
                        break;

                    default:
                        # code...
                        break;
                }
                $data = array(
                    'oqueue' => $dataRow->oqueue,
                    'curdep_name' =>  $curdep_name,
                    'ptname' => $dataRow->ptname,
                    'num_row' => $num_row,
                    'sign_datetime' => $dataRow->sign_datetime
                );
                $this->load->view('spclty/patient_queue2', $data);
                $num_row++;
            }
        }
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Search extends CI_Controller
{
	public function fetch(){
        $output = '';
        $query = '';
        if($this->input->post('query')){
           $query =  $this->input->post('query');
        }
        $data = $this->Search_model->fetch_data($query);
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}

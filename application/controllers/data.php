<?php 
 
class Data extends CI_Controller{
 
	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}
 
	function index(){
		if($this->session->userdata('role') == "rmk"){
			$this->load->view('r_data');
		} elseif($this->session->userdata('role') == "kaprodi"){
			$this->load->view('k_data');
		}
	}

	function download($file){
		$pdf = 'file/'.$file;
    	force_download($pdf, NULL);
	}
}
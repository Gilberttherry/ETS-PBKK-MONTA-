<?php 
 
class Dashboard extends CI_Controller{
 
	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}
 
	function index(){
		if($this->session->userdata('role') == "mahasiswa"){
			$this->load->view('v_dashboard');
		} elseif($this->session->userdata('role') == "rmk"){
			$this->load->view('r_dashboard');
		}else{
			$this->load->view('k_dashboard');
		}
	}
}
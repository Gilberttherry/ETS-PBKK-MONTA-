<?php 
 
class Login extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('m_login');
 
	}
 
	function index(){
		$this->load->view('v_login');
	}
 
	function aksi_login(){
		$m_id = $this->input->post('m_id');
		$password = $this->input->post('m_pass');
		$where1 = array(
			'm_id' => $m_id,
			'm_pass' => md5($password)
			);
		$cek1 = $this->m_login->cek_login("mahasiswa",$where1)->num_rows();

		$where2 = array(
			'd_id' => $m_id,
			'd_pass' => md5($password)
			);
		$cek2 = $this->m_login->cek_login("dosen",$where2)->num_rows();

		if($cek1 > 0){
			$data_session = array(
				'm_id' => $m_id,
				'status' => "login",
				'role' => "mahasiswa"
				);
 
			$this->session->set_userdata($data_session);
			redirect(base_url("dashboard"));
		}elseif($cek2 > 0){
			$cekrole  = $this->db->get_where("dosen", array('d_id'=> $m_id))->row();
			if($cekrole->d_role=="rmk"){
				$data_session = array(
					'd_id' => $m_id,
					'status' => "login",
					'role' => "rmk"
					);
			}else{
				$data_session = array(
					'd_id' => $m_id,
					'status' => "login",
					'role' => "kaprodi"
				);
			}
			$this->session->set_userdata($data_session);
			redirect(base_url("dashboard"));
		}else{
			redirect(base_url('login'));
		}
	}
 
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}
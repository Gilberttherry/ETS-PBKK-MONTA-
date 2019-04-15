<?php 
 
class Nilai extends CI_Controller{
 
	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}
 
	function index(){
        $this->load->view('nilai');
	}

	function update($id){
		$t_nilai = $this->input->post('t_nilai');

		$data = array(
		    't_nilai' => $t_nilai,
            't_status' => "Selesai"
		);
	    
		$where = array(
		    't_id' => $id
		);
		$this->load->model('m_ta');
		$this->m_ta->update_data($where,$data,'ta');
		redirect('tanggalsidang/index');
	    }
	    
}
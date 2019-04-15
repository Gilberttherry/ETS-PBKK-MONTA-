<?php 
 
class Tanggalsidang extends CI_Controller{
 
	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}
 
	function index(){
        $this->load->view('sidang');
	}

	function update($id){
		$t_penguji1 = $this->input->post('t_penguji1');
        $t_penguji2 = $this->input->post('t_penguji2');
        $t_tanggal = $this->input->post('t_tanggal');

		$data = array(
		    't_penguji1' => $t_penguji1,
            't_penguji2' => $t_penguji2,
            't_tanggal' => $t_tanggal,
            't_status' => "Proses Sidang"
		);
	    
		$where = array(
		    'p_id' => $id
		);
		$this->load->model('m_ta');
		$this->m_ta->update_data($where,$data,'ta');
		redirect('tanggalsidang/index');
	    }
	    
}
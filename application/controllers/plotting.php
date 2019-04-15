<?php 
 
class Plotting extends CI_Controller{
 
	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}
 
	function index(){
        $this->load->view('plotting');
	}

	function update($id){
		$p_dosbing1 = $this->input->post('p_dosbing1');
		$p_dosbing2 = $this->input->post('p_dosbing2');

		$data = array(
		    'p_dosbing1' => $p_dosbing1,
		    'p_dosbing2' => $p_dosbing2
		);
	    
		$where = array(
		    'p_id' => $id
		);
		$this->load->model('m_proposal');
		$this->m_proposal->update_data($where,$data,'proposal');
		redirect('plotting/index');
	    }
	    
}
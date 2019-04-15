<?php 
 
class Verifikasi extends CI_Controller{
 
	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}
 
	function index(){
        
		$this->load->view('verifikasi');
    }

    function update($id){
        $p_status = $this->input->post('p_status');
        
        $data = array(
            'p_status' => $p_status
        );
    
        $where = array(
            'p_id' => $id
        );
        $this->load->model('m_proposal');
        $this->m_proposal->update_data($where,$data,'proposal');
        redirect('verifikasi/index');
    }
    
    function update_catatan($id){
        $p_status = $this->input->post('p_status');
        $p_catatan = $this->input->post('p_catatan');
        
        $data = array(
            'p_status' => $p_status,
            'p_catatan' => $p_catatan
        );
    
        $where = array(
            'p_id' => $id
        );
        $this->load->model('m_proposal');
        $this->m_proposal->update_data($where,$data,'proposal');
        redirect('verifikasi/index');
    }
    function download($file){
		$pdf = 'file/'.$file;
    	force_download($pdf, NULL);
	}
}
<?php 
 
class Statusta extends CI_Controller{
 
	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}
 
	function index(){
        $this->load->model('m_mahasiswa');
  		$data['mahasiswa'] = $this->m_mahasiswa->tampil()->row();
		$this->load->view('v_statusTA',$data);
		}

	function update($id){
			$r_id = $this->input->post('r_id');
			$p_judul = $this->input->post('p_judul');

			$data = array(
					'r_id' => $r_id,
					'p_judul' => $p_judul,
					'p_status' => "Tunggu"
			);
	
			$where = array(
					'p_id' => $id
			);
			$this->load->model('m_proposal');
			$this->m_proposal->update_data($where,$data,'proposal');
			redirect('status/index');
	}

	function download($file){
		$pdf = 'file/'.$file;
    	force_download($pdf, NULL);
	}

	}
<?php 
 
class Status extends CI_Controller{
 
	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}
 
	function index(){
        $this->load->model('m_mahasiswa');
  		$data['mahasiswa'] = $this->m_mahasiswa->tampil()->row();
		$this->load->view('v_status',$data);
		}

	function update($id){
			$r_id = $this->input->post('r_id');
			$p_judul = $this->input->post('p_judul');
			$p_deskripsi =$this->input->post('p_deskripsi');

			$config['upload_path']          = './file/';
			$config['allowed_types']        = 'pdf';
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('p_file')) {
                $error = $this->upload->display_errors();
                echo "gagal";
            } else  {
                $data = array(
					'r_id' => $r_id,
					'p_judul' => $p_judul,
					'p_deskripsi' => $p_deskripsi,
					'p_file' => $this->upload->data('file_name'),
					'p_status' => "Tunggu"
				);
		
				$where = array(
						'p_id' => $id
				);
				$this->load->model('m_proposal');
				$this->m_proposal->update_data($where,$data,'proposal');
				redirect('status/index');
             }

			
	}

	function download($file){
		$pdf = 'file/'.$file;
    	force_download($pdf, NULL);
	}

	}
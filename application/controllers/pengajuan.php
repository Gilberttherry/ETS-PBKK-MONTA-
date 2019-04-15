<?php 
 
class Pengajuan extends CI_Controller{
 
	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}
 
	function index(){
        $this->load->model('m_mahasiswa');
  		$data['mahasiswa'] = $this->m_mahasiswa->tampil()->row();
		$this->load->view('v_pengajuan',$data);
    }
    
    function tambah(){
		$rmk = $this->input->post('r_id');
        $judul = $this->input->post('p_judul');
        $nrp = $this->input->post('m_id');
        $deskripsi = $this->input->post('p_deskripsi');
        
		$config['upload_path']          = './file/';
        $config['allowed_types']        = 'pdf';
        $this->load->library('upload', $config);

            if (!$this->upload->do_upload('p_file')) {
                $error = $this->upload->display_errors();
                echo "gagal";
            } else  {
                $data = array(
                    'r_id' => $rmk,
                    'm_id' => $nrp,
                    'p_judul' => $judul,
                    'p_deskripsi' => $deskripsi,
                    'p_file' => $this->upload->data('file_name'),
                    'p_status' => "Tunggu"
                );
                    $this->load->model('m_proposal');
                    $this->m_proposal->input_data($data,'proposal');
                    redirect('pengajuan/index');
            }
    }
}
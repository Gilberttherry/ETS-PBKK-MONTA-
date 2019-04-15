<?php 
 
class M_mahasiswa extends CI_Model{
	function tampil(){
		return $this->db->get('mahasiswa');
	}
}
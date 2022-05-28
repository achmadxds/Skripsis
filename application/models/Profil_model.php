<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function profil_mhs($id_user)
	{
	
		$this->db->select('*');
		$this->db->from('tmhs');
		$this->db->where('MhsNim',$id_user);
		$query = $this->db->get();
		return $query->row();
	
	}

		public function profil_secure($id_secure)
	{
	
		$this->db->select('tdosen.*,tuser.*');
		$this->db->from('tdosen');
		$this->db->join('tuser', 'tuser.UserId = tdosen.DosenId');
		$this->db->where('DosenId',$id_secure);
		$query = $this->db->get();
		return $query->row();
	
	}

		public function profil_user($id_secure)
	{
	
		$this->db->select('*');
		$this->db->from('tuser');
		$this->db->where('UserId',$id_secure);
		$query = $this->db->get();
		return $query->row();
	
	}

}

/* End of file Profilmhs_model.php */
/* Location: ./application/models/Profilmhs_model.php */
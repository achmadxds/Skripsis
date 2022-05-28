<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Periode_model extends CI_Model {
public function __construct()
{
	parent::__construct();
	$this->load->database();
}

		public function periode_aktif()
	{
		$this->db->select('*');
		$this->db->from('tperiodes');
		$this->db->where('PeriodesStatusAktif',1);
		$query = $this->db->get();
		return $query->row_array();
	}

		public function listing_periode()
	{
	
		$this->db->select('*');
		$this->db->from('tperiodes');
		$this->db->order_by('PeriodesId', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

		public function edit()
	{
	
		$this->db->select('*');
		$this->db->from('tperiodes');
		$this->db->order_by('PeriodesId', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function koordinator()
	{
		$this->db->select('tuser.*,
			             tdosen.DosenId,
						 tdosen.DosenNama,
						 tauth.NamaLevel');
		$this->db->from('tuser');
		$this->db->join('tdosen', 'tdosen.DosenId = tuser.UserId');
		$this->db->join('tauth', 'tauth.Iduser = tuser.UserId');
		$this->db->where('NamaLevel','koordinator');
		$query = $this->db->get();
		return $query->row_array();
	}

	public function kaprodi()
	{
		$this->db->select('tuser.*,
						 tdosen.DosenId,
						 tdosen.DosenNama,
						 tauth.NamaLevel');
		$this->db->from('tuser');
		$this->db->join('tdosen', 'tdosen.DosenId = tuser.UserId');
		$this->db->join('tauth', 'tauth.Iduser = tuser.UserId');
		$this->db->where('NamaLevel','kaprodi');
		$query = $this->db->get();
		return $query->row_array();
	}





	

}

/* End of file Periode_model.php */
/* Location: ./application/models/Periode_model.php */
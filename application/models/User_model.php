<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function listing_dosen()
	{
		$this->db->select('tuser.*,
						 tdosen.DosenNama,
						 tauth.NamaLevel');
		$this->db->from('tuser');
		$this->db->join('tdosen', 'tdosen.DosenId = tuser.UserId');
		$this->db->join('tauth', 'tauth.Iduser = tuser.UserId');
		$this->db->where('NamaLevel','dosen');
		$this->db->order_by('UserId', 'asc');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function listing_operator()
	{
		$this->db->select('tuser.*,
						 tdosen.DosenNama,
						 tauth.NamaLevel');
		$this->db->from('tuser');
		$this->db->join('tdosen', 'tdosen.DosenId = tuser.UserId');
		$this->db->join('tauth', 'tauth.Iduser = tuser.UserId');
		$this->db->where('NamaLevel','operator');
		$this->db->order_by('UserId', 'asc');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function listing_koordinator()
	{
		$this->db->select('tuser.*,
						 tdosen.DosenNama,
						 tauth.NamaLevel');
		$this->db->from('tuser');
		$this->db->join('tdosen', 'tdosen.DosenId = tuser.UserId');
		$this->db->join('tauth', 'tauth.Iduser = tuser.UserId');
		$this->db->where('NamaLevel','koordinator');
		$this->db->order_by('UserId', 'asc');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function listing_kaprodi()
	{
		$this->db->select('tuser.*,
						 tdosen.DosenNama,
						 tauth.NamaLevel');
		$this->db->from('tuser');
		$this->db->join('tdosen', 'tdosen.DosenId = tuser.UserId');
		$this->db->join('tauth', 'tauth.Iduser = tuser.UserId');
		$this->db->where('NamaLevel','kaprodi');
		$this->db->order_by('UserId', 'asc');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function listing_mhs()
	{
		$this->db->select('*');
		$this->db->from('tmhs');
		$this->db->order_by('MhsNim', 'asc');
		$query = $this->db->get();
		return $query->result_array();
	}


	



	

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */
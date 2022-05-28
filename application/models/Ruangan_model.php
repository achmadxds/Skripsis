<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ruangan_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	public function listing_ruang()
	{
		$this->db->select('*');
		$this->db->from('truang');
		$this->db->order_by('RuangId', 'asc');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function edit()
	{
		$this->db->select('*');
		$this->db->from('truang');
		$this->db->order_by('RuangId', 'asc');
		$query = $this->db->get();
		return $query->result_array();
	}


	

}

/* End of file Ruangan_model.php */
/* Location: ./application/models/Ruangan_model.php */
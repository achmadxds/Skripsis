<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

    //////////// DOSEN ////////////
	public function listing_dosen()
	{
		$this->db->select('*');
		$this->db->from('tdosen');
		$this->db->where("DosenNidn LIKE '__________'");
		$this->db->order_by('DosenId', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function edit_dosen()
	{
		$this->db->select('*');
		$this->db->from('tdosen');
		$this->db->order_by('DosenId', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}


	//////////// MHS //////////////
	public function listing_mhs()
	{
		$this->db->select('*');
		$this->db->from('tmhs');
		$this->db->order_by('MhsNim', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function edit_mhs()
	{
		$this->db->select('*');
		$this->db->from('tmhs');
		$this->db->order_by('MhsNim', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	//////////////operator//////////////
	public function listing_operator()
	{
		$this->db->select('tuser.*,
			             tdosen.DosenId,
			             tdosen.DosenNidn,
			             tdosen.DosenAlamat,
			             tdosen.DosenEmail,
			             tdosen.DosenNohp,
						 tdosen.DosenNama,
						 tauth.Namalevel');
		$this->db->from('tuser');
		$this->db->join('tdosen', 'tdosen.DosenId = tuser.UserId');
		$this->db->join('tauth', 'tauth.Iduser = tuser.UserId');
		$this->db->where('Namalevel','operator');
		$this->db->order_by('UserId', 'asc');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function edit_operator()
	{
		$this->db->select('tuser.*,
			             tdosen.DosenId,
			             tdosen.DosenNidn,
			             tdosen.DosenAlamat,
			             tdosen.DosenEmail,
			             tdosen.DosenNohp,
						 tdosen.DosenNama,
						 tauth.Namalevel');
		$this->db->from('tuser');
		$this->db->join('tdosen', 'tdosen.DosenId = tuser.UserId');
		$this->db->join('tauth', 'tauth.Iduser = tuser.UserId');
		$this->db->where('Namalevel','operator');
		$this->db->order_by('UserId', 'asc');
		$query = $this->db->get();
		return $query->result_array();
	}

///////////////Kaprodi////////////////////
	public function listing_kaprodi()
	{
		$this->db->select('tuser.*,
						 tdosen.*,
						 tauth.NamaLevel');
		$this->db->from('tuser');
		$this->db->join('tdosen', 'tdosen.DosenId = tuser.UserId');
		$this->db->join('tauth', 'tauth.Iduser = tuser.UserId');
		$this->db->where('NamaLevel','kaprodi');
		$this->db->order_by('UserId', 'asc');
		$query = $this->db->get();
		return $query->result_array();
	}

	// public function riwayat_kaprodi()
	// {
	// 	$this->db->select('tkaprodi.*,
	// 					   tdosen.*,
	// 					   tperiodes.*');
	// 	$this->db->from('tkaprodi');
	// 	$this->db->join('tdosen', 'tkaprodi.KaprodiDosenId = tdosen.DosenId');
	// 	$this->db->join('tperiodes', 'tperiodes.PeriodesId = tkaprodi.KaprodiPeriodesId');
	// 	$this->db->order_by('PeriodesId', 'DESC');
	// 	$query = $this->db->get();
	// 	return $query->result_array();
	// }

	public function riwayat_kaprodi()
	{
		$this->db->select('tperiodes.*,
						   tdosen.*');
		$this->db->from('tperiodes');
		$this->db->join('tdosen', 'tperiodes.PeriodesKaprodi = tdosen.DosenId');
		$this->db->order_by('PeriodesId', 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function ganti_kaprodi()
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

	

////////////////////koordinator////////////////
	public function listing_koordinator()
	{
		$this->db->select('tuser.*,
						 tdosen.*,
						 tauth.NamaLevel');
		$this->db->from('tuser');
		$this->db->join('tdosen', 'tdosen.DosenId = tuser.UserId');
		$this->db->join('tauth', 'tauth.Iduser = tuser.UserId');
		$this->db->where('NamaLevel','koordinator');
		$this->db->order_by('UserId', 'asc');
		$query = $this->db->get();
		return $query->result_array();
	}

	// public function riwayat_koordinator()
	// {
	// 	$this->db->select('tkoors.*,
	// 					   tdosen.*,
	// 					   tperiodes.*');
	// 	$this->db->from('tkoors');
	// 	$this->db->join('tdosen', 'tkoors.KoorsDosenId = tdosen.DosenId');
	// 	$this->db->join('tperiodes', 'tperiodes.PeriodesId = tkoors.KoorsPeriodesId');
	// 	$this->db->order_by('PeriodesId', 'DESC');
	// 	$query = $this->db->get();
	// 	return $query->result_array();
	// }

	public function riwayat_koordinator()
	{
		$this->db->select('tperiodes.*,
						   tdosen.*');
		$this->db->from('tperiodes');
		$this->db->join('tdosen', 'tperiodes.PeriodesKoordinator = tdosen.DosenId');
		$this->db->order_by('PeriodesId', 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function ganti_koordinator()
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


	

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

//////secure//////////////////
	////skripsi///
	public function list_daftar_skripsi()
	{
		$this->db->select('tdaftars.*,
						 tmhs.MhsNim,
						 tmhs.MhsNama');
		$this->db->from('tdaftars');
		$this->db->join('tmhs', 'tdaftars.DaftarsNIM = tmhs.MhsNim');
		$this->db->where('DaftarsStatusAkhir',0);
		$this->db->order_by('MhsNim', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}


	/////seminar////
	public function list_daftar_seminar($periode)
	{
		$this->db->select('tdaftarsempro.*,
						 tdaftars.DaftarsId,
						 tmhs.MhsNim,
						 tmhs.MhsNama');
		$this->db->from('tdaftarsempro');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdaftarsempro.DafsemDaftarsId');
		$this->db->join('tmhs',' tmhs.MhsNim = tdaftars.DaftarsNIM');
		$this->db->where('DafsemPeriodeId',$periode);
		$this->db->order_by('DafsemDaftarsId', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	////sidang//////
	public function list_daftar_sidang($periode)
	{
		$this->db->select('tdaftarsidang.*,
						 tdaftars.DaftarsId,
						 tmhs.MhsNim,
						 tmhs.MhsNama,');
		$this->db->from('tdaftarsidang');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdaftarsidang.DafsidDaftarsId');
		$this->db->join('tmhs',' tmhs.MhsNim = tdaftars.DaftarsNIM');
		$this->db->where('DafsidPeriodeId',$periode);
		$this->db->order_by('DafsidDaftarsId', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	
	/////bebas skripsi////
	public function list_daftar_bebas_skripsi()
	{
		$this->db->select('tskripsi.*,
						 tdaftars.DaftarsId,
						 tmhs.MhsNim,
						 tmhs.MhsNama');
		$this->db->from('tskripsi');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tskripsi.SkripsiDaftarsId');
		$this->db->join('tmhs',' tmhs.MhsNim = tdaftars.DaftarsNIM');
		$this->db->where('SkripsiBebasProdi!=',null);
		$this->db->order_by('SkripsiId', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}
	////edit keterangan maksudnya
	public function edit_bebas_skripsi()
	{
		$this->db->select('*');
		$this->db->from('tskripsi');
		$query = $this->db->get();
		return $query->result_array();
	}
	
	//zip daftar skripsi
	public function download_zip_skripsi($id)
	{
		$this->db->select('tdaftars.*,
						 tmhs.MhsNim,
						 tmhs.MhsNama' );
		$this->db->from('tdaftars');
		$this->db->join('tmhs', 'tdaftars.DaftarsNIM = tmhs.MhsNim');
		$this->db->where('DaftarsId',$id);
		$query = $this->db->get();
		return $query->row_array();
	}

	//zip daftar seminar
	public function download_zip_seminar($id)
	{
		$this->db->select('tdaftarsempro.*,
						 tdaftars.DaftarsId,
						 tmhs.MhsNim,
						 tmhs.MhsNama' );
		$this->db->from('tdaftars');
		$this->db->join('tdaftarsempro', 'tdaftarsempro.DafsemDaftarsId = tdaftars.DaftarsId');
		$this->db->join('tmhs', 'tdaftars.DaftarsNIM = tmhs.MhsNim');
		$this->db->where('DaftarsId',$id);
		$query = $this->db->get();
		return $query->row_array();
	}

	//zip daftar sidang
	public function download_zip_sidang($id)
	{
		$this->db->select('tdaftarsidang.*,
						 tdaftars.DaftarsId,
						 tmhs.MhsNim,
						 tmhs.MhsNama' );
		$this->db->from('tdaftars');
		$this->db->join('tdaftarsidang', 'tdaftarsidang.DafsidDaftarsId = tdaftars.DaftarsId');
		$this->db->join('tmhs', 'tdaftars.DaftarsNIM = tmhs.MhsNim');
		$this->db->where('DaftarsId',$id);
		$query = $this->db->get();
		return $query->row_array();
	}

	


////////////mhs///////////////
	//list berkas daftar skripsi
	public function detail_daftar_skripsi($mhs,$periode)
	{
		$this->db->select('tdaftars.*,
						 tmhs.MhsNim,
						 tmhs.MhsNama');
		$this->db->from('tdaftars');
		$this->db->join('tmhs', 'tdaftars.DaftarsNIM = tmhs.MhsNim');
		$this->db->where("DaftarsNim = '$mhs' and DaftarsPeriodesId = '$periode'");
		$this->db->or_where("DaftarsNim = '$mhs' and DaftarsPeriodesId2 = '$periode'");
		$this->db->order_by('DaftarsId', 'desc');
		$query = $this->db->get();
		return $query->row_array();
	}

	//list berkas daftar skripsi untuk mhs yg sudah lulus skripsi
	public function daftar_skripsi_lulus($mhs)
	{
		$this->db->select('tdaftars.*,
						 tmhs.MhsNim,
						 tmhs.MhsNama');
		$this->db->from('tdaftars');
		$this->db->join('tmhs', 'tdaftars.DaftarsNIM = tmhs.MhsNim');
		$this->db->where('DaftarsNIM',$mhs);
		$this->db->where('DaftarsStatusAkhir',1);
		$this->db->order_by('DaftarsId', 'desc');
		$query = $this->db->get();
		return $query->row_array();
	}

	//list berkas daftar seminar
	public function detail_daftar_seminar($mhs,$periode)
	{
		$this->db->select('tdaftarsempro.*,
						 tdaftars.*');
		$this->db->from('tdaftarsempro');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdaftarsempro.DafsemDaftarsId');
		$this->db->where("DaftarsNim = '$mhs' and DaftarsPeriodesId = '$periode'");
		$this->db->or_where("DaftarsNim = '$mhs' and DaftarsPeriodesId2 = '$periode'");
		$this->db->order_by('DaftarsId', 'desc');
		$query = $this->db->get();
		return $query->row_array();
	}

	//list berkas daftar seminar untuk mhs yg sudah lulus skripsi
	public function daftar_seminar_lulus($mhs)
	{
		$this->db->select('tdaftarsempro.*,
						 tdaftars.*');
		$this->db->from('tdaftarsempro');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdaftarsempro.DafsemDaftarsId');
		$this->db->where('DaftarsNIM',$mhs);
		$this->db->where('DaftarsStatusAkhir',1);
		$this->db->order_by('DaftarsId', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	//list berkas daftar sidang
	public function detail_daftar_sidang($mhs,$periode)
	{
		$this->db->select('tdaftarsidang.*,
						 tdaftars.DaftarsNIM');
		$this->db->from('tdaftarsidang');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdaftarsidang.DafsidDaftarsId');
		$this->db->where("DaftarsNim = '$mhs' and DaftarsPeriodesId = '$periode'");
		$this->db->or_where("DaftarsNim = '$mhs' and DaftarsPeriodesId2 = '$periode'");
		$this->db->order_by('DaftarsId', 'desc');
		$query = $this->db->get();
		return $query->row_array();
	}

	//list berkas daftar sidang untuk mhs yg sudah lulus skripsi
	public function daftar_sidang_lulus($mhs)
	{
		$this->db->select('tdaftarsidang.*,
						 tdaftars.DaftarsNIM');
		$this->db->from('tdaftarsidang');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdaftarsidang.DafsidDaftarsId');
		$this->db->where('DaftarsNIM',$mhs);
		$this->db->where('DaftarsStatusAkhir',1);
		$this->db->order_by('DaftarsId', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

}

/* End of file Pendaftaran_model.php */
/* Location: ./application/models/Pendaftaran_model.php */
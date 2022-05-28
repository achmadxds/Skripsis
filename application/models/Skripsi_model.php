<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Skripsi_model extends CI_Model
{

	//////////secure////////////////////
	public function penilaian()
	{
		$this->db->select('*');
		$this->db->from('tnilaikonversi');
		$query = $this->db->get();
		return $query->row_array();
	}

	public function judul($periode)
	{
		$this->db->select('tskripsi.*,
						   tmhs.*,
						   tdaftars.DaftarsNIM,
						   tdaftars.DaftarsPeriodesId,
						   tdaftars.DaftarsPeriodesId2');
		$this->db->from('tskripsi');
		$this->db->join('tdaftars', 'tdaftars.DaftarsNIM = tskripsi.SkripsiMhsNim');
		$this->db->join('tmhs', 'tmhs.MhsNim = tdaftars.DaftarsNIM');
		$this->db->where('tdaftars.DaftarsPeriodesId', $periode);
		$this->db->or_where('tdaftars.DaftarsPeriodesId2', $periode);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function seminar_lulus($periode)
	{
		$this->db->select('tsempro.*,
						 truang.RuangId,
						 truang.RuangNama,
						 tdaftarsempro.*,
						 tdaftars.DaftarsNIM,
						 tdaftars.DaftarsId,
						 tdaftars.DaftarsPeriodesId,
						 tdaftars.DaftarsPeriodesId2,
						 tskripsi.SkripsiJudul,
						 tmhs.MhsNim,
						 tmhs.MhsNama');
		$this->db->from('tsempro');
		$this->db->join('truang', 'truang.RuangId = tsempro.SemproRuangId');
		$this->db->join('tdaftarsempro', 'tdaftarsempro.DafsemId = tsempro.SemproDafsemId');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdaftarsempro.DafsemDaftarsId');
		$this->db->join('tskripsi', 'tskripsi.SkripsiMhsNim = tdaftars.DaftarsNIM');
		$this->db->join('tmhs', 'tmhs.MhsNim = tdaftars.DaftarsNIM');
		$this->db->where('SemproHasil', 1);
		$this->db->where("DaftarsPeriodesId='$periode' or DaftarsPeriodesId2='$periode'");
		$query = $this->db->get();
		return $query->result_array();
	}

	public function sidang_lulus($periode)
	{
		$this->db->select('tsidang.*,
						 truang.RuangId,
						 truang.RuangNama,
						 tdaftarsidang.*,
						 tdaftars.DaftarsNIM,
						 tdaftars.DaftarsId,
						 tdaftars.DaftarsPeriodesId,
						 tdaftars.DaftarsPeriodesId2,
						 tskripsi.SkripsiJudul,
						 tmhs.MhsNim,
						 tmhs.MhsNama');
		$this->db->from('tsidang');
		$this->db->join('truang', 'truang.RuangId = tsidang.SidangRuangId');
		$this->db->join('tdaftarsidang', 'tdaftarsidang.DafsidId = tsidang.SidangDafsidId');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdaftarsidang.DafsidDaftarsId');
		$this->db->join('tskripsi', 'tskripsi.SkripsiMhsNim = tdaftars.DaftarsNIM');
		$this->db->join('tmhs', 'tmhs.MhsNim = tdaftars.DaftarsNIM');
		$this->db->where('SidangHasil', 1);
		$this->db->where("DaftarsPeriodesId='$periode' or DaftarsPeriodesId2='$periode'");
		$query = $this->db->get();
		return $query->result_array();
	}

	public function na_lulus($periode)
	{
		$this->db->select('tnilaiakhir.*,
						   tsidang.SidangDafsidId,
						   tsidang.SidangId,	
						   tsidang.SidangPenguji1,
						   tsidang.SidangPenguji2,
						   tsidang.SidangPenguji3,
						   tdaftarsidang.DafsidId,
						   tdaftars.*,
						   tskripsi.SkripsiJudul,
						   tmhs.*');
		$this->db->from('tnilaiakhir');
		$this->db->join('tsidang', 'tsidang.SidangId = tnilaiakhir.NaSidangId');
		$this->db->join('tdaftarsidang', 'tdaftarsidang.DafsidId = tsidang.SidangDafsidId');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdaftarsidang.DafsidDaftarsId');
		$this->db->join('tskripsi', 'tskripsi.SkripsiMhsNim = tdaftars.DaftarsNIM');
		$this->db->join('tmhs', 'tmhs.MhsNim = tdaftars.DaftarsNIM');
		$this->db->where("DaftarsPeriodesId='$periode' or DaftarsPeriodesId2='$periode'");
		$query = $this->db->get();
		return $query->result_array();
	}


	///////////////mhs/////////////////////
	public function list_skripsi($id_mhs)
	{
		$this->db->select('tskripsi.*,
						   tmhs.*,
						   tdaftars.DaftarsNIM');
		$this->db->from('tskripsi');
		$this->db->join('tdaftars', 'tdaftars.DaftarsNIM = tskripsi.SkripsiMhsNim');
		$this->db->join('tmhs', 'tmhs.MhsNim = tdaftars.DaftarsNIM');
		$this->db->where('MhsNim', $id_mhs);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function detail_bebas_skripsi($mhs)
	{
		$this->db->select('*');
		$this->db->from('tskripsi');
		$this->db->where('SkripsiMhsNim', $mhs);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function cek_sidang_lulus($mhs)
	{
		$this->db->select('tsidang.*,
						 tdaftarsidang.*,
						 tdaftars.DaftarsNIM,
						 tdaftars.DaftarsId,');
		$this->db->from('tsidang');
		$this->db->join('tdaftarsidang', 'tdaftarsidang.DafsidId = tsidang.SidangDafsidId');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdaftarsidang.DafsidDaftarsId');
		$this->db->where('DaftarsNIM', $mhs);
		$this->db->where('SidangHasil', 1);
		$query = $this->db->get();
		return $query->row_array();
	}
}

/* End of file Skripsi_model.php */
/* Location: ./application/models/Skripsi_model.php */
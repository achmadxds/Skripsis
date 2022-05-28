<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_model extends CI_Model {


////////////SEMINAR////////////////	
    public function jadwal_seminar_belum()
	{
		$this->db->select('tdaftarsempro.*,
			             tdaftars.DaftarsId,
			             tdaftars.DaftarsNIM,
			             tdaftars.DaftarsStatusAkhir,
						 tmhs.MhsNim,
						 tmhs.MhsNama');
		$this->db->from('tdaftarsempro');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdaftarsempro.DafsemDaftarsId');
		$this->db->join('tmhs', 'tmhs.MhsNim = tdaftars.DaftarsNIM');
		$this->db->where("not exists (SELECT * FROM tsempro where SemproDafsemId= tdaftarsempro.DafsemId)",null,false);
		$this->db->where('DafsemStatus',1);
		$this->db->where('DaftarsStatusAkhir', 0);
		$this->db->order_by('MhsNim', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function jadwal_seminar_sudah()
	{
		$this->db->select('tdaftarsempro.*,
						 tsempro.SemproDafsemId,
			             tsempro.SemproHasil,
			             tdaftars.DaftarsId,
			             tdaftars.DaftarsNIM,
			             tdaftars.DaftarsStatusAkhir,
						 tmhs.MhsNim,
						 tmhs.MhsNama');
		$this->db->from('tdaftarsempro');
		$this->db->join('tsempro', 'tsempro.SemproDafsemId = tdaftarsempro.DafsemId');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdaftarsempro.DafsemDaftarsId');
		$this->db->join('tmhs', 'tmhs.MhsNim = tdaftars.DaftarsNIM');
		$this->db->where("exists (SELECT * FROM tsempro where SemproDafsemId= tdaftarsempro.DafsemId)",null,false);
		$this->db->where('SemproHasil',!1);
		$this->db->where('DaftarsStatusAkhir', 0);
		$query = $this->db->get();
		return $query->result();
	}

	public function jadwal_seminar_ulang()
	{
		$this->db->select('tdaftarsempro.*,
						 tsempro.SemproHasil,
			             tdaftars.DaftarsId,
			             tdaftars.DaftarsNIM,
			             tdaftars.DaftarsStatusAkhir,
						 tmhs.MhsNim,
						 tmhs.MhsNama');
		$this->db->from('tdaftarsempro');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdaftarsempro.DafsemDaftarsId');
		$this->db->join('tsempro', 'tsempro.SemproDafsemId = tdaftarsempro.DafsemId');
		$this->db->join('tmhs', 'tmhs.MhsNim = tdaftars.DaftarsNIM');
		$this->db->where('DaftarsStatusAkhir', 0);
		$this->db->where('SemproHasil',2);
		$this->db->order_by('MhsNim', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function jadwal_seminar_lulus()
	{
		$this->db->select('tdaftarsempro.*,
						 tsempro.SemproHasil,
			             tdaftars.DaftarsId,
			             tdaftars.DaftarsNIM,
			             tdaftars.DaftarsStatusAkhir,
						 tmhs.MhsNim,
						 tmhs.MhsNama');
		$this->db->from('tdaftarsempro');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdaftarsempro.DafsemDaftarsId');
		$this->db->join('tsempro', 'tsempro.SemproDafsemId = tdaftarsempro.DafsemId');
		$this->db->join('tmhs', 'tmhs.MhsNim = tdaftars.DaftarsNIM');
		$this->db->where('DaftarsStatusAkhir', 0);
		$this->db->where('SemproHasil',1);
		$this->db->order_by('MhsNim', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function tambah_seminar()
	{
		$this->db->select('tdosbings.*,
						 tdaftars.DaftarsNIM,
						 tdaftars.DaftarsId,
						 tdaftars.DaftarsStatusAkhir,
						 tdaftarsempro.DafsemId,
						 tmhs.MhsNim,
						 tmhs.MhsNama,
						 tdosen.DosenId,
						 tdosen.DosenNama');
		$this->db->from('tdosbings');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdosbings.DosbingsDaftarsId');
		$this->db->join('tdaftarsempro','tdaftarsempro.DafsemDaftarsId = tdaftars.DaftarsId');
		$this->db->join('tmhs', 'tmhs.MhsNim = tdaftars.DaftarsNIM');
		$this->db->join('tdosen', 'tdosen.DosenId = tdosbings.DosbingsDosenId1');
		$this->db->where('DaftarsStatusAkhir', 0);
		$this->db->order_by('MhsNim', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function edit_seminar()
	{
		$this->db->select('tsempro.*,
						 truang.RuangId,
						 truang.RuangNama,
						 tdaftarsempro.*,
						 tdaftars.DaftarsNIM,
						 tdaftars.DaftarsId,
						 tdaftars.DaftarsStatusAkhir,
						 tmhs.MhsNim,
						 tmhs.MhsNama');
		$this->db->from('tsempro');
		$this->db->join('truang','truang.RuangId = tsempro.SemproRuangId');
		$this->db->join('tdaftarsempro','tdaftarsempro.DafsemId = tsempro.SemproDafsemId');
		$this->db->join('tdaftars','tdaftars.DaftarsId = tdaftarsempro.DafsemDaftarsId');
		$this->db->join('tmhs', 'tmhs.MhsNim = tdaftars.DaftarsNIM');
		$this->db->where('DaftarsStatusAkhir', 0);
		$this->db->where('SemproHasil',0);
		$this->db->or_where('SemproHasil',3);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function edit_seminar_ulang()
	{
		$this->db->select('tsempro.*,
						 truang.RuangId,
						 truang.RuangNama,
						 tdaftarsempro.*,
						 tdaftars.DaftarsNIM,
						 tdaftars.DaftarsId,
						 tdaftars.DaftarsStatusAkhir,
						 tmhs.MhsNim,
						 tmhs.MhsNama');
		$this->db->from('tsempro');
		$this->db->join('truang','truang.RuangId = tsempro.SemproRuangId');
		$this->db->join('tdaftarsempro','tdaftarsempro.DafsemId = tsempro.SemproDafsemId');
		$this->db->join('tdaftars','tdaftars.DaftarsId = tdaftarsempro.DafsemDaftarsId');
		$this->db->join('tmhs', 'tmhs.MhsNim = tdaftars.DaftarsNIM');
		$this->db->where('DaftarsStatusAkhir', 0);
		$this->db->where('SemproHasil',2);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function seminar_lulus()
	{
		$this->db->select('tsempro.*,
						 truang.RuangId,
						 truang.RuangNama,
						 tdaftarsempro.*,
						 tdaftars.DaftarsNIM,
						 tdaftars.DaftarsId,
						 tdaftars.DaftarsStatusAkhir,
						 tmhs.MhsNim,
						 tmhs.MhsNama');
		$this->db->from('tsempro');
		$this->db->join('truang','truang.RuangId = tsempro.SemproRuangId');
		$this->db->join('tdaftarsempro','tdaftarsempro.DafsemId = tsempro.SemproDafsemId');
		$this->db->join('tdaftars','tdaftars.DaftarsId = tdaftarsempro.DafsemDaftarsId');
		$this->db->join('tmhs', 'tmhs.MhsNim = tdaftars.DaftarsNIM');
		$this->db->where('DaftarsStatusAkhir', 0);
		$this->db->where('SemproHasil',1);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function cetak_jadwal_seminar()
	{
		$this->db->select('tsempro.*,
						 truang.RuangId,
						 truang.RuangNama,
						 tdaftarsempro.*,
						 tdaftars.DaftarsNIM,
						 tdaftars.DaftarsId,
						 tdaftars.DaftarsStatusAkhir,
						 tmhs.MhsNim,
						 tmhs.MhsNama');
		$this->db->from('tsempro');
		$this->db->join('truang','truang.RuangId = tsempro.SemproRuangId');
		$this->db->join('tdaftarsempro','tdaftarsempro.DafsemId = tsempro.SemproDafsemId');
		$this->db->join('tdaftars','tdaftars.DaftarsId = tdaftarsempro.DafsemDaftarsId');
		$this->db->join('tmhs', 'tmhs.MhsNim = tdaftars.DaftarsNIM');
		$this->db->where("exists(SELECT * FROM tsempro join tdaftarsempro on
		                  tdaftarsempro.DafsemId=tsempro.SemproDafsemId WHERE 
		                  tsempro.SemproDafsemId = tdaftarsempro.DafsemId)",null,false);
		$this->db->where('SemproHasil',!1);
		$this->db->where('DaftarsStatusAkhir', 0);
		$query = $this->db->get();
		return $query->result_array();
	}

///////////////SIDANG/////////////////////////////
	public function jadwal_sidang_belum()
	{
		$this->db->select('tdaftarsidang.*,
			             tdaftars.DaftarsId,
			             tdaftars.DaftarsNIM,
			             tdaftars.DaftarsStatusAkhir,
						 tmhs.MhsNim,
						 tmhs.MhsNama');
		$this->db->from('tdaftarsidang');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdaftarsidang.DafsidDaftarsId');
		$this->db->join('tmhs', 'tmhs.MhsNim = tdaftars.DaftarsNIM');
		$this->db->where("not exists (SELECT * FROM tsidang where SidangDafsidId= tdaftarsidang.DafsidId)",null,false);
		$this->db->where('DafsidStatus',1);
		$this->db->where('DaftarsStatusAkhir', 0);
		$this->db->order_by('MhsNim', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function jadwal_sidang_sudah()
	{
		$this->db->select('tdaftarsidang.*,
			             tdaftars.DaftarsId,
			             tsidang.SidangHasil,
			             tdaftars.DaftarsNIM,
			             tdaftars.DaftarsStatusAkhir,
						 tmhs.MhsNim,
						 tmhs.MhsNama');
		$this->db->from('tdaftarsidang');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdaftarsidang.DafsidDaftarsId');
		$this->db->join('tsidang', 'tsidang.SidangDafsidId = tdaftarsidang.DafsidId');
		$this->db->join('tmhs', 'tmhs.MhsNim = tdaftars.DaftarsNIM');
		$this->db->where("exists (SELECT * FROM tsidang join tdaftarsidang on
		                  tdaftarsidang.DafsidId=tsidang.SidangDafsidId WHERE 
		                  tsidang.SidangDafsidId = tdaftarsidang.DafsidId)",null,false);
		$this->db->where('DaftarsStatusAkhir', 0);
		$this->db->where('SidangHasil',0);
		$this->db->or_where('SidangHasil',3);
		$query = $this->db->get();
		return $query->result();
	}

	public function jadwal_sidang_ulang()
	{
		$this->db->select('tdaftarsidang.*,
			             tdaftars.DaftarsId,
			             tsidang.SidangHasil,
			             tdaftars.DaftarsNIM,
			             tdaftars.DaftarsStatusAkhir,
						 tmhs.MhsNim,
						 tmhs.MhsNama');
		$this->db->from('tdaftarsidang');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdaftarsidang.DafsidDaftarsId');
		$this->db->join('tsidang', 'tsidang.SidangDafsidId = tdaftarsidang.DafsidId');
		$this->db->join('tmhs', 'tmhs.MhsNim = tdaftars.DaftarsNIM');
		$this->db->where('DaftarsStatusAkhir', 0);
		$this->db->where('SidangHasil',2);
		$query = $this->db->get();
		return $query->result();
	}

	public function jadwal_sidang_lulus()
	{
		$this->db->select('tdaftarsidang.*,
			             tdaftars.DaftarsId,
			             tsidang.SidangHasil,
			             tdaftars.DaftarsNIM,
			             tdaftars.DaftarsStatusAkhir,
						 tmhs.MhsNim,
						 tmhs.MhsNama');
		$this->db->from('tdaftarsidang');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdaftarsidang.DafsidDaftarsId');
		$this->db->join('tsidang', 'tsidang.SidangDafsidId = tdaftarsidang.DafsidId');
		$this->db->join('tmhs', 'tmhs.MhsNim = tdaftars.DaftarsNIM');
		$this->db->where('DaftarsStatusAkhir', 0);
		$this->db->where('SidangHasil',1);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function tambah_sidang()
	{
		$this->db->select('tdosbings.*,
						 tdaftars.DaftarsNIM,
						 tdaftars.DaftarsId,
						 tdaftars.DaftarsStatusAkhir,
						 tdaftarsidang.DafsidId,
						 tsempro.SemproPenguji1,
						 tsempro.SemproPenguji2,
						 tmhs.MhsNim,
						 tmhs.MhsNama,
						 tdosen.DosenId,
						 tdosen.DosenNama');
		$this->db->from('tdosbings');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdosbings.DosbingsDaftarsId');
		$this->db->join('tdaftarsidang','tdaftarsidang.DafsidDaftarsId = tdaftars.DaftarsId');
		$this->db->join('tdaftarsempro','tdaftarsempro.DafsemDaftarsId = tdaftars.DaftarsId');
		$this->db->join('tsempro','tsempro.SemproDafsemId = tdaftarsempro.DafsemId');
		$this->db->join('tmhs', 'tmhs.MhsNim = tdaftars.DaftarsNIM');
		$this->db->join('tdosen', 'tdosen.DosenId = tdosbings.DosbingsDosenId1');
		$this->db->where('DaftarsStatusAkhir', 0);
		$this->db->order_by('MhsNim', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function edit_sidang()
	{
		$this->db->select('tsidang.*,
						 truang.RuangId,
						 truang.RuangNama,
						 tdaftarsidang.*,
						 tdaftars.DaftarsNIM,
						 tdaftars.DaftarsStatusAkhir,
						 tdaftars.DaftarsId,
						 tmhs.MhsNim,
						 tmhs.MhsNama');
		$this->db->from('tsidang');
		$this->db->join('truang','truang.RuangId = tsidang.SidangRuangId');
		$this->db->join('tdaftarsidang','tdaftarsidang.DafsidId = tsidang.SidangDafsidId');
		$this->db->join('tdaftars','tdaftars.DaftarsId = tdaftarsidang.DafsidDaftarsId');
		$this->db->join('tmhs', 'tmhs.MhsNim = tdaftars.DaftarsNIM');
		$this->db->where('DaftarsStatusAkhir', 0);
		$this->db->where('SidangHasil',0);
		$this->db->or_where('SidangHasil',3);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function edit_sidang_ulang()
	{
		$this->db->select('tsidang.*,
						 truang.RuangId,
						 truang.RuangNama,
						 tdaftarsidang.*,
						 tdaftars.DaftarsNIM,
						 tdaftars.DaftarsStatusAkhir,
						 tdaftars.DaftarsId,
						 tmhs.MhsNim,
						 tmhs.MhsNama');
		$this->db->from('tsidang');
		$this->db->join('truang','truang.RuangId = tsidang.SidangRuangId');
		$this->db->join('tdaftarsidang','tdaftarsidang.DafsidId = tsidang.SidangDafsidId');
		$this->db->join('tdaftars','tdaftars.DaftarsId = tdaftarsidang.DafsidDaftarsId');
		$this->db->join('tmhs', 'tmhs.MhsNim = tdaftars.DaftarsNIM');
		$this->db->where('DaftarsStatusAkhir', 0);
		$this->db->where('SidangHasil',2);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function sidang_lulus()
	{
		$this->db->select('tsidang.*,
						 truang.RuangId,
						 truang.RuangNama,
						 tdaftarsidang.*,
						 tdaftars.DaftarsNIM,
						 tdaftars.DaftarsStatusAkhir,
						 tdaftars.DaftarsId,
						 tmhs.MhsNim,
						 tmhs.MhsNama');
		$this->db->from('tsidang');
		$this->db->join('truang','truang.RuangId = tsidang.SidangRuangId');
		$this->db->join('tdaftarsidang','tdaftarsidang.DafsidId = tsidang.SidangDafsidId');
		$this->db->join('tdaftars','tdaftars.DaftarsId = tdaftarsidang.DafsidDaftarsId');
		$this->db->join('tmhs', 'tmhs.MhsNim = tdaftars.DaftarsNIM');
		$this->db->where('DaftarsStatusAkhir', 0);
		$this->db->where('SidangHasil',1);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function cetak_jadwal_sidang()
	{
		$this->db->select('tsidang.*,
						 truang.RuangId,
						 truang.RuangNama,
						 tdaftarsidang.*,
						 tdaftars.DaftarsNIM,
						 tdaftars.DaftarsStatusAkhir,
						 tdaftars.DaftarsId,
						 tmhs.MhsNim,
						 tmhs.MhsNama');
		$this->db->from('tsidang');
		$this->db->join('truang','truang.RuangId = tsidang.SidangRuangId');
		$this->db->join('tdaftarsidang','tdaftarsidang.DafsidId = tsidang.SidangDafsidId');
		$this->db->join('tdaftars','tdaftars.DaftarsId = tdaftarsidang.DafsidDaftarsId');
		$this->db->join('tmhs', 'tmhs.MhsNim = tdaftars.DaftarsNIM');
		$this->db->where('DaftarsStatusAkhir', 0);
		$this->db->where('SidangHasil',0);
		$this->db->or_where('SidangHasil',3);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function jadwal_bimbingan($dosen)
	{
		$this->db->select('*');
		$this->db->from('tjadwalbimbingan');
		$this->db->where('JadwalDosenId',$dosen);
		$query = $this->db->get();
		return $query->result_array();
	}




	/////////////////////////////////////mhs////////////////////////////////
	public function list_jadwal_bimbingan()
	{
		$this->db->select('tjadwalbimbingan.*,
			             tdosen.DosenNama');
		$this->db->from('tjadwalbimbingan');
		$this->db->join('tdosen', 'tdosen.DosenId = tjadwalbimbingan.JadwalDosenId');
		$this->db->order_by('JadwalDosenId', 'asc');
		$query = $this->db->get();
		return $query->result_array();
	}


	

}

/* End of file Jadwal_model.php */
/* Location: ./application/models/Jadwal_model.php */
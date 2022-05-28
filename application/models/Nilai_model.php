<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai_model extends CI_Model {

///////////seminar//////////////
    public function nilai_seminar_dosen($id_dosen)
	{
		$this->db->select('tsempro.*,
						   truang.RuangNama,
						   tdaftarsempro.*,
						   tdaftars.DaftarsId,
						   tdaftars.DaftarsStatusAkhir,
						   tskripsi.*,
						   tmhs.MhsNama,
						   tmhs.MhsNim');
		$this->db->from('tsempro');
		$this->db->join('truang','truang.RuangId = tsempro.SemproRuangId');
		$this->db->join('tdaftarsempro', 'tdaftarsempro.DafsemId = tsempro.SemproDafsemId');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdaftarsempro.DafsemDaftarsId');
		$this->db->join('tskripsi', 'tskripsi.SkripsiMhsNim = tdaftars.DaftarsNIM');
		$this->db->join('tmhs', 'tmhs.MhsNim = tdaftars.DaftarsNIM');
		$this->db->where('DaftarsStatusAkhir', 0);
		$this->db->where("SemproPenguji2='$id_dosen' or SemproPenguji3='$id_dosen'");
		$this->db->order_by('SemproId', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function edit_nilai_seminar_dosen($id_dosen)
	{
		$this->db->select('tsempro.*,
						   tdaftarsempro.*,
						   truang.RuangNama,
						   tdaftars.DaftarsId,
						   tdaftars.DaftarsStatusAkhir,
						   tskripsi.*,
						   tmhs.MhsNama,
						   tmhs.MhsNim,
						   tdetailsempro.DetsemKetRevisi,
						   tdetailsempro.DetsemId');
		$this->db->from('tsempro');
		$this->db->join('tdaftarsempro', 'tdaftarsempro.DafsemId = tsempro.SemproDafsemId');
		$this->db->join('truang','truang.RuangId = tsempro.SemproRuangId');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdaftarsempro.DafsemDaftarsId');
		$this->db->join('tskripsi', 'tskripsi.SkripsiMhsNim = tdaftars.DaftarsNIM');
		$this->db->join('tmhs', 'tmhs.MhsNim = tdaftars.DaftarsNIM');
		$this->db->join('tdetailsempro', 'tdetailsempro.DetsemSemproId = tsempro.SemproId');
		$this->db->where('DetsemDosenId',$id_dosen);
		$this->db->where('DaftarsStatusAkhir', 0);
		$this->db->order_by('SemproId', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function nilai_seminar_ketua($id_dosen)
	{
		$this->db->select('tsempro.*,
						   tdaftarsempro.*,
						   truang.RuangNama,
						   tdaftars.DaftarsId,
						   tdaftars.DaftarsStatusAkhir,
						   tskripsi.*,
						   tmhs.MhsNama,
						   tmhs.MhsNim');
		$this->db->from('tsempro');
		$this->db->join('tdaftarsempro', 'tdaftarsempro.DafsemId = tsempro.SemproDafsemId');
		$this->db->join('truang','truang.RuangId = tsempro.SemproRuangId');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdaftarsempro.DafsemDaftarsId');
		$this->db->join('tskripsi', 'tskripsi.SkripsiMhsNim = tdaftars.DaftarsNIM');
		$this->db->join('tmhs', 'tmhs.MhsNim = tdaftars.DaftarsNIM');
		$this->db->where('SemproPenguji1',$id_dosen);
		$this->db->where('DaftarsStatusAkhir', 0);
		$this->db->order_by('SemproId', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function edit_nilai_seminar_ketua($id_dosen)
	{
		$this->db->select('tsempro.*,
						   tdaftarsempro.*,
						   truang.RuangNama,
						   tdaftars.DaftarsId,
						   tdaftars.DaftarsStatusAkhir,
						   tskripsi.*,
						   tmhs.MhsNama,
						   tmhs.MhsNim,
						   tdetailsempro.DetsemKetRevisi,
						   tdetailsempro.DetsemId,
						   tdetailsempro.DetsemDosenId');
		$this->db->from('tsempro');
		$this->db->join('tdaftarsempro', 'tdaftarsempro.DafsemId = tsempro.SemproDafsemId');
		$this->db->join('truang','truang.RuangId = tsempro.SemproRuangId');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdaftarsempro.DafsemDaftarsId');
		$this->db->join('tskripsi', 'tskripsi.SkripsiMhsNim = tdaftars.DaftarsNIM');
		$this->db->join('tmhs', 'tmhs.MhsNim = tdaftars.DaftarsNIM');
		$this->db->join('tdetailsempro', 'tdetailsempro.DetsemSemproId = tsempro.SemproId');
		$this->db->where('DetsemDosenId',$id_dosen);
		$this->db->where('DaftarsStatusAkhir', 0);
		$this->db->order_by('SemproId', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}

///////////sidang///////////////
	public function nilai_sidang_dosen($id_dosen)
	{
		$this->db->select('tsidang.*,
						   tdaftarsidang.*,
						   truang.RuangNama,
						   tdaftars.DaftarsId,
						   tdaftars.DaftarsStatusAkhir,
						   tskripsi.*,
						   tmhs.MhsNama,
						   tmhs.MhsNim');
		$this->db->from('tsidang');
		$this->db->join('tdaftarsidang', 'tdaftarsidang.DafsidId = tsidang.SidangDafsidId');
		$this->db->join('truang','truang.RuangId = tsidang.SidangRuangId');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdaftarsidang.DafsidDaftarsId');
		$this->db->join('tskripsi', 'tskripsi.SkripsiMhsNim = tdaftars.DaftarsNIM');
		$this->db->join('tmhs', 'tmhs.MhsNim = tdaftars.DaftarsNIM');
		$this->db->where('DaftarsStatusAkhir', 0);
		$this->db->where('SidangPenguji2',$id_dosen);
		$this->db->order_by('SidangId', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function edit_nilai_sidang_dosen($id_dosen)
	{
		$this->db->select('tsidang.*,
						   tdaftarsidang.*,
						   truang.RuangNama,
						   tdaftars.DaftarsId,
						   tdaftars.DaftarsStatusAkhir,
						   tskripsi.*,
						   tmhs.MhsNama,
						   tmhs.MhsNim,
						   tdetailsidang.DetsidKetRevisi,
						   tdetailsidang.DetsidId');
		$this->db->from('tsidang');
		$this->db->join('tdaftarsidang', 'tdaftarsidang.DafsidId = tsidang.SidangDafsidId');
		$this->db->join('truang','truang.RuangId = tsidang.SidangRuangId');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdaftarsidang.DafsidDaftarsId');
		$this->db->join('tskripsi', 'tskripsi.SkripsiMhsNim = tdaftars.DaftarsNIM');
		$this->db->join('tmhs', 'tmhs.MhsNim = tdaftars.DaftarsNIM');
		$this->db->join('tdetailsidang', 'tdetailsidang.DetsidSidangId = tsidang.SidangId');
		$this->db->where('DetsidDosenId',$id_dosen);
		$this->db->where('DaftarsStatusAkhir', 0);
		$this->db->order_by('SidangId', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function nilai_sidang_tamu($id_dosen)
	{
		$this->db->select('tsidang.*,
						   tdaftarsidang.*,
						   truang.RuangNama,
						   tdaftars.DaftarsId,
						   tdaftars.DaftarsStatusAkhir,
						   tskripsi.*,
						   tmhs.MhsNama,
						   tmhs.MhsNim');
		$this->db->from('tsidang');
		$this->db->join('tdaftarsidang', 'tdaftarsidang.DafsidId = tsidang.SidangDafsidId');
		$this->db->join('truang','truang.RuangId = tsidang.SidangRuangId');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdaftarsidang.DafsidDaftarsId');
		$this->db->join('tskripsi', 'tskripsi.SkripsiMhsNim = tdaftars.DaftarsNIM');
		$this->db->join('tmhs', 'tmhs.MhsNim = tdaftars.DaftarsNIM');
		$this->db->where('SidangPenguji3',$id_dosen);
		$this->db->where('DaftarsStatusAkhir', 0);
		$this->db->order_by('SidangId', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function edit_nilai_sidang_tamu($id_dosen)
	{
		$this->db->select('tsidang.*,
						   tdaftarsidang.*,
						   truang.RuangNama,
						   tdaftars.DaftarsId,
						   tdaftars.DaftarsStatusAkhir,
						   tskripsi.*,
						   tmhs.MhsNama,
						   tmhs.MhsNim,
						   tdetailsidang.DetsidKetRevisi,
						   tdetailsidang.DetsidId');
		$this->db->from('tsidang');
		$this->db->join('tdaftarsidang', 'tdaftarsidang.DafsidId = tsidang.SidangDafsidId');
		$this->db->join('truang','truang.RuangId = tsidang.SidangRuangId');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdaftarsidang.DafsidDaftarsId');
		$this->db->join('tskripsi', 'tskripsi.SkripsiMhsNim = tdaftars.DaftarsNIM');
		$this->db->join('tmhs', 'tmhs.MhsNim = tdaftars.DaftarsNIM');
		$this->db->join('tdetailsidang', 'tdetailsidang.DetsidSidangId = tsidang.SidangId');
		$this->db->where('DetsidDosenId',$id_dosen);
		$this->db->where('DaftarsStatusAkhir', 0);
		$this->db->order_by('SidangId', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	

	public function nilai_sidang_ketua($id_dosen)
	{
		$this->db->select('tsidang.*,
						   tdaftarsidang.*,
						   truang.RuangNama,
						   tdaftars.DaftarsId,
						   tdaftars.DaftarsStatusAkhir,
						   tskripsi.*,
						   tmhs.MhsNama,
						   tmhs.MhsNim');
		$this->db->from('tsidang');
		$this->db->join('tdaftarsidang', 'tdaftarsidang.DafsidId = tsidang.SidangDafsidId');
		$this->db->join('truang','truang.RuangId = tsidang.SidangRuangId');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdaftarsidang.DafsidDaftarsId');
		$this->db->join('tskripsi', 'tskripsi.SkripsiMhsNim = tdaftars.DaftarsNIM');
		$this->db->join('tmhs', 'tmhs.MhsNim = tdaftars.DaftarsNIM');
		$this->db->where('DaftarsStatusAkhir', 0);
		$this->db->where('SidangPenguji1',$id_dosen);
		$this->db->order_by('SidangId', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function edit_nilai_sidang_ketua($id_dosen)
	{
		$this->db->select('tsidang.*,
						   tdaftarsidang.*,
						   truang.RuangNama,
						   tdaftars.DaftarsId,
						   tdaftars.DaftarsStatusAkhir,
						   tskripsi.*,
						   tmhs.MhsNama,
						   tmhs.MhsNim,
						   tdetailsidang.DetsidKetRevisi,
						   tdetailsidang.DetsidId,
						   tdetailsidang.DetsidDosenId');
		$this->db->from('tsidang');
		$this->db->join('tdaftarsidang', 'tdaftarsidang.DafsidId = tsidang.SidangDafsidId');
		$this->db->join('truang','truang.RuangId = tsidang.SidangRuangId');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdaftarsidang.DafsidDaftarsId');
		$this->db->join('tskripsi', 'tskripsi.SkripsiMhsNim = tdaftars.DaftarsNIM');
		$this->db->join('tmhs', 'tmhs.MhsNim = tdaftars.DaftarsNIM');
		$this->db->join('tdetailsidang', 'tdetailsidang.DetsidSidangId = tsidang.SidangId');
		$this->db->where('DaftarsStatusAkhir', 0);
		$this->db->where('DetsidDosenId',$id_dosen);
		$this->db->order_by('SidangId', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}

///////////////////////////////na////////////////////////////

	public function nilai_akhir_ketua($id_dosen)
	{
		$this->db->select('tsidang.*,
						   tdaftarsidang.*,
						   truang.RuangNama,
						   tdaftars.DaftarsId,
						   tdaftars.DaftarsStatusAkhir,
						   tskripsi.*,
						   tmhs.MhsNama,
						   tmhs.MhsNim');
		$this->db->from('tsidang');
		$this->db->join('tdaftarsidang', 'tdaftarsidang.DafsidId = tsidang.SidangDafsidId');
		$this->db->join('truang','truang.RuangId = tsidang.SidangRuangId');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdaftarsidang.DafsidDaftarsId');
		$this->db->join('tskripsi', 'tskripsi.SkripsiMhsNim = tdaftars.DaftarsNIM');
		$this->db->join('tmhs', 'tmhs.MhsNim = tdaftars.DaftarsNIM');
		$this->db->where('SidangPenguji1',$id_dosen);
		$this->db->where('DaftarsStatusAkhir', 0);
		$this->db->where('SidangHasil',1);
		$this->db->order_by('SidangId', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}


	public function nilai_akhir_dosen($id_dosen)
	{
		$this->db->select('tsidang.*,
						   tdaftarsidang.*,
						   truang.RuangNama,
						   tdaftars.DaftarsId,
						   tdaftars.DaftarsStatusAkhir,
						   tskripsi.*,
						   tmhs.MhsNama,
						   tmhs.MhsNim');
		$this->db->from('tsidang');
		$this->db->join('tdaftarsidang', 'tdaftarsidang.DafsidId = tsidang.SidangDafsidId');
		$this->db->join('truang','truang.RuangId = tsidang.SidangRuangId');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdaftarsidang.DafsidDaftarsId');
		$this->db->join('tskripsi', 'tskripsi.SkripsiMhsNim = tdaftars.DaftarsNIM');
		$this->db->join('tmhs', 'tmhs.MhsNim = tdaftars.DaftarsNIM');
		$this->db->where('DaftarsStatusAkhir', 0);
		$this->db->where('SidangPenguji2',$id_dosen);
		$this->db->where('SidangHasil',1);
		$this->db->order_by('SidangId', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function nilai_akhir_tamu($id_dosen)
	{
		$this->db->select('tsidang.*,
						   tdaftarsidang.*,
						   truang.RuangNama,
						   tdaftars.DaftarsId,
						   tdaftars.DaftarsStatusAkhir,
						   tskripsi.*,
						   tmhs.MhsNama,
						   tmhs.MhsNim');
		$this->db->from('tsidang');
		$this->db->join('tdaftarsidang', 'tdaftarsidang.DafsidId = tsidang.SidangDafsidId');
		$this->db->join('truang','truang.RuangId = tsidang.SidangRuangId');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdaftarsidang.DafsidDaftarsId');
		$this->db->join('tskripsi', 'tskripsi.SkripsiMhsNim = tdaftars.DaftarsNIM');
		$this->db->join('tmhs', 'tmhs.MhsNim = tdaftars.DaftarsNIM');
		$this->db->where('SidangPenguji3',$id_dosen);
		$this->db->where('DaftarsStatusAkhir', 0);
		$this->db->where('SidangHasil',1);
		$this->db->order_by('SidangId', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function edit_nilai_akhir($id_dosen)
	{
		$this->db->select('tnilaikriteria.*,
						   tdaftarsidang.*,
						   tsidang.*,	
						   truang.RuangNama,
						   tdaftars.DaftarsId,
						   tdaftars.DaftarsStatusAkhir,
						   tskripsi.*,
						   tmhs.MhsNama,
						   tmhs.MhsNim');
		$this->db->from('tnilaikriteria');
		$this->db->join('tsidang', 'tsidang.SidangId = tnilaikriteria.NiketSidangId');
		$this->db->join('tdaftarsidang', 'tdaftarsidang.DafsidId = tsidang.SidangDafsidId');
		$this->db->join('truang','truang.RuangId = tsidang.SidangRuangId');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdaftarsidang.DafsidDaftarsId');
		$this->db->join('tskripsi', 'tskripsi.SkripsiMhsNim = tdaftars.DaftarsNIM');
		$this->db->join('tmhs', 'tmhs.MhsNim = tdaftars.DaftarsNIM');
		$this->db->where('NiketDosenId',$id_dosen);
		$this->db->where('DaftarsStatusAkhir', 0);
		$this->db->order_by('NiketId', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	



////////////MHS////////////////

	////nilai seminar/////
	public function jadwal_seminar($mhs)
	{
		$this->db->select('tsempro.*,
						   tdaftarsempro.*,
						   truang.RuangNama,
						   tdaftars.DaftarsId,
						   tmhs.MhsNama,
						   tmhs.MhsNim');
		$this->db->from('tsempro');
		$this->db->join('tdaftarsempro', 'tdaftarsempro.DafsemId = tsempro.SemproDafsemId');
		$this->db->join('truang','truang.RuangId = tsempro.SemproRuangId');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdaftarsempro.DafsemDaftarsId');
		$this->db->join('tmhs', 'tmhs.MhsNim = tdaftars.DaftarsNIM');
		$this->db->where('DaftarsNIM',$mhs);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function nilai_seminar($mhs)
	{
		$this->db->select('tsempro.*,
						   tdaftarsempro.*,
						   truang.RuangNama,
						   tdaftars.DaftarsId,
						   tmhs.MhsNama,
						   tmhs.MhsNim');
		$this->db->from('tsempro');
		$this->db->join('tdaftarsempro', 'tdaftarsempro.DafsemId = tsempro.SemproDafsemId');
		$this->db->join('truang','truang.RuangId = tsempro.SemproRuangId');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdaftarsempro.DafsemDaftarsId');
		$this->db->join('tmhs', 'tmhs.MhsNim = tdaftars.DaftarsNIM');
		$this->db->where('DaftarsNIM',$mhs);
		$this->db->order_by('SemproId', 'desc');
		$query = $this->db->get();
		return $query->row_array();
	}

	///detail sempro penguji 1 /// KETUA
	public function detail_sempro_ketua($mhs)
	{
		$this->db->select('tsempro.*,
						   tdaftarsempro.*,
						   truang.RuangNama,
						   tdaftars.DaftarsId,
						   tmhs.MhsNama,
						   tmhs.MhsNim,
						   tdetailsempro.*,
						   tdosen.DosenNama');
		$this->db->from('tsempro');
		$this->db->join('tdaftarsempro', 'tdaftarsempro.DafsemId = tsempro.SemproDafsemId');
		$this->db->join('truang','truang.RuangId = tsempro.SemproRuangId');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdaftarsempro.DafsemDaftarsId');
		$this->db->join('tmhs', 'tmhs.MhsNim = tdaftars.DaftarsNIM');
		$this->db->join('tdetailsempro', 'tdetailsempro.DetsemSemproId = tsempro.SemproId');
		$this->db->join('tdosen', 'tdosen.DosenId = tdetailsempro.DetsemDosenId');
		$this->db->where('DaftarsNIM',$mhs);
		$this->db->where('DetsemLevelDosen',1);
		$this->db->order_by('SemproId', 'desc');
		$query = $this->db->get();
		return $query->row_array();
	}
    
    ///detail sempro penguji 2 /// dosbing1
	public function detail_sempro1($mhs)
	{
		$this->db->select('tsempro.*,
						   tdaftarsempro.*,
						   truang.RuangNama,
						   tdaftars.DaftarsId,
						   tmhs.MhsNama,
						   tmhs.MhsNim,
						   tdetailsempro.*,
						   tdosen.DosenNama');
		$this->db->from('tsempro');
		$this->db->join('tdaftarsempro', 'tdaftarsempro.DafsemId = tsempro.SemproDafsemId');
		$this->db->join('truang','truang.RuangId = tsempro.SemproRuangId');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdaftarsempro.DafsemDaftarsId');
		$this->db->join('tmhs', 'tmhs.MhsNim = tdaftars.DaftarsNIM');
		$this->db->join('tdetailsempro', 'tdetailsempro.DetsemSemproId = tsempro.SemproId');
		$this->db->join('tdosen', 'tdosen.DosenId = tdetailsempro.DetsemDosenId');
		$this->db->where('DaftarsNIM',$mhs);
		$this->db->where('DetsemLevelDosen',2);
		$this->db->order_by('SemproId', 'desc');
		$query = $this->db->get();
		return $query->row_array();
	}

	///detail sempro penguji 3 ////dosbing2
	public function detail_sempro2($mhs)
	{
		$this->db->select('tsempro.*,
						   tdaftarsempro.*,
						   truang.RuangNama,
						   tdaftars.DaftarsId,
						   tmhs.MhsNama,
						   tmhs.MhsNim,
						   tdetailsempro.*,
						   tdosen.DosenNama');
		$this->db->from('tsempro');
		$this->db->join('tdaftarsempro', 'tdaftarsempro.DafsemId = tsempro.SemproDafsemId');
		$this->db->join('truang','truang.RuangId = tsempro.SemproRuangId');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdaftarsempro.DafsemDaftarsId');
		$this->db->join('tmhs', 'tmhs.MhsNim = tdaftars.DaftarsNIM');
		$this->db->join('tdetailsempro', 'tdetailsempro.DetsemSemproId = tsempro.SemproId');
		$this->db->join('tdosen', 'tdosen.DosenId = tdetailsempro.DetsemDosenId');
		$this->db->where('DaftarsNIM',$mhs);
		$this->db->where('DetsemLevelDosen',3);
		$this->db->order_by('SemproId', 'desc');
		$query = $this->db->get();
		return $query->row_array();
	}


    //////////nilai sidang////////////
	public function jadwal_sidang($mhs)
	{
		$this->db->select('tsidang.*,
						   tdaftarsidang.*,
						   truang.RuangNama,
						   tdaftars.DaftarsId,
						   tmhs.MhsNama,
						   tmhs.MhsNim');
		$this->db->from('tsidang');
		$this->db->join('tdaftarsidang', 'tdaftarsidang.DafsidId = tsidang.SidangDafsidId');
		$this->db->join('truang','truang.RuangId = tsidang.SidangRuangId');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdaftarsidang.DafsidDaftarsId');
		$this->db->join('tmhs', 'tmhs.MhsNim = tdaftars.DaftarsNIM');
		$this->db->where('DaftarsNIM',$mhs);
		$query = $this->db->get();
		return $query->row_array();
	}


	public function nilai_sidang($mhs)
	{
		$this->db->select('tsidang.*,
						   tdaftarsidang.*,
						   truang.RuangNama,
						   tdaftars.DaftarsId,
						   tmhs.MhsNama,
						   tmhs.MhsNim');
		$this->db->from('tsidang');
		$this->db->join('tdaftarsidang', 'tdaftarsidang.DafsidId = tsidang.SidangDafsidId');
		$this->db->join('truang','truang.RuangId = tsidang.SidangRuangId');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdaftarsidang.DafsidDaftarsId');
		$this->db->join('tmhs', 'tmhs.MhsNim = tdaftars.DaftarsNIM');
		$this->db->where('DaftarsNIM',$mhs);
		$this->db->order_by('SidangId', 'desc');
		$query = $this->db->get();
		return $query->row_array();
	}

	///detail sidang penguji 1 /// KETUA
	public function detail_sidang_ketua($mhs)
	{
		$this->db->select('tsidang.*,
						   tdaftarsidang.*,
						   truang.RuangNama,
						   tdaftars.DaftarsId,
						   tmhs.MhsNama,
						   tmhs.MhsNim,
						   tdetailsidang.*,
						   tdosen.DosenNama');
		$this->db->from('tsidang');
		$this->db->join('tdaftarsidang', 'tdaftarsidang.DafsidId = tsidang.SidangDafsidId');
		$this->db->join('truang','truang.RuangId = tsidang.SidangRuangId');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdaftarsidang.DafsidDaftarsId');
		$this->db->join('tmhs', 'tmhs.MhsNim = tdaftars.DaftarsNIM');
		$this->db->join('tdetailsidang', 'tdetailsidang.DetsidSidangId = tsidang.SidangId');
		$this->db->join('tdosen', 'tdosen.DosenId = tdetailsidang.DetsidDosenId');
		$this->db->where('DaftarsNIM',$mhs);
		$this->db->where('DetsidLevelDosen',1);
		$this->db->order_by('SidangId', 'desc');
		$query = $this->db->get();
		return $query->row_array();
	}
    
    ///detail sidang penguji 2 /// dosbing1
	public function detail_sidang1($mhs)
	{
		$this->db->select('tsidang.*,
						   tdaftarsidang.*,
						   truang.RuangNama,
						   tdaftars.DaftarsId,
						   tmhs.MhsNama,
						   tmhs.MhsNim,
						   tdetailsidang.*,
						   tdosen.DosenNama');
		$this->db->from('tsidang');
		$this->db->join('tdaftarsidang', 'tdaftarsidang.DafsidId = tsidang.SidangDafsidId');
		$this->db->join('truang','truang.RuangId = tsidang.SidangRuangId');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdaftarsidang.DafsidDaftarsId');
		$this->db->join('tmhs', 'tmhs.MhsNim = tdaftars.DaftarsNIM');
		$this->db->join('tdetailsidang', 'tdetailsidang.DetsidSidangId = tsidang.SidangId');
		$this->db->join('tdosen', 'tdosen.DosenId = tdetailsidang.DetsidDosenId');
		$this->db->where('DaftarsNIM',$mhs);
		$this->db->where('DetsidLevelDosen',2);
		$this->db->order_by('SidangId', 'desc');
		$query = $this->db->get();
		return $query->row_array();
	}

	///detail sidang penguji 3 ////dosen tamu
	public function detail_sidang2($mhs)
	{
		$this->db->select('tsidang.*,
						   tdaftarsidang.*,
						   truang.RuangNama,
						   tdaftars.DaftarsId,
						   tmhs.MhsNama,
						   tmhs.MhsNim,
						   tdetailsidang.*,
						   tdosen.DosenNama');
		$this->db->from('tsidang');
		$this->db->join('tdaftarsidang', 'tdaftarsidang.DafsidId = tsidang.SidangDafsidId');
		$this->db->join('truang','truang.RuangId = tsidang.SidangRuangId');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdaftarsidang.DafsidDaftarsId');
		$this->db->join('tmhs', 'tmhs.MhsNim = tdaftars.DaftarsNIM');
		$this->db->join('tdetailsidang', 'tdetailsidang.DetsidSidangId = tsidang.SidangId');
		$this->db->join('tdosen', 'tdosen.DosenId = tdetailsidang.DetsidDosenId');
		$this->db->where('DaftarsNIM',$mhs);
		$this->db->where('DetsidLevelDosen',3);
		$this->db->order_by('SidangId', 'desc');
		$query = $this->db->get();
		return $query->row_array();
	}

	public function na_mhs($mhs)
	{
		$this->db->select('tnilaiakhir.*,
						   tsidang.SidangDafsidId,
						   tdaftarsidang.DafsidId,
						   tdaftars.*,
						   tmhs.*');
		$this->db->from('tnilaiakhir');
		$this->db->join('tsidang', 'tsidang.SidangId = tnilaiakhir.NaSidangId');
		$this->db->join('tdaftarsidang', 'tdaftarsidang.DafsidId = tsidang.SidangDafsidId');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdaftarsidang.DafsidDaftarsId');
		$this->db->join('tmhs', 'tmhs.MhsNim = tdaftars.DaftarsNIM');
		$this->db->where('DaftarsNIM',$mhs);
		$query = $this->db->get();
		return $query->row_array();
	}

    //////////////chart js//////////////
	public function na_grafik_penguji1($mhs)
	{
		$this->db->select('tnilaiakhir.*,
						   tnilaikriteria.*,
						   tsidang.SidangDafsidId,
						   tdaftarsidang.DafsidId,
						   tdaftars.*,
						   tmhs.*');
		$this->db->from('tnilaiakhir');
		$this->db->join('tnilaikriteria', 'tnilaikriteria.NiketSidangId = tnilaiakhir.NaSidangId');
		$this->db->join('tsidang', 'tsidang.SidangId = tnilaiakhir.NaSidangId');
		$this->db->join('tdaftarsidang', 'tdaftarsidang.DafsidId = tsidang.SidangDafsidId');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdaftarsidang.DafsidDaftarsId');
		$this->db->join('tmhs', 'tmhs.MhsNim = tdaftars.DaftarsNIM');
		$this->db->where('DaftarsNIM',$mhs);
		$this->db->where('NiketDosenLevel',1);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function na_grafik_penguji2($mhs)
	{
		$this->db->select('tnilaiakhir.*,
						   tnilaikriteria.*,
						   tsidang.SidangDafsidId,
						   tdaftarsidang.DafsidId,
						   tdaftars.*,
						   tmhs.*');
		$this->db->from('tnilaiakhir');
		$this->db->join('tnilaikriteria', 'tnilaikriteria.NiketSidangId = tnilaiakhir.NaSidangId');
		$this->db->join('tsidang', 'tsidang.SidangId = tnilaiakhir.NaSidangId');
		$this->db->join('tdaftarsidang', 'tdaftarsidang.DafsidId = tsidang.SidangDafsidId');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdaftarsidang.DafsidDaftarsId');
		$this->db->join('tmhs', 'tmhs.MhsNim = tdaftars.DaftarsNIM');
		$this->db->where('DaftarsNIM',$mhs);
		$this->db->where('NiketDosenLevel',2);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function na_grafik_penguji3($mhs)
	{
		$this->db->select('tnilaiakhir.*,
						   tnilaikriteria.*,
						   tsidang.SidangDafsidId,
						   tdaftarsidang.DafsidId,
						   tdaftars.*,
						   tmhs.*');
		$this->db->from('tnilaiakhir');
		$this->db->join('tnilaikriteria', 'tnilaikriteria.NiketSidangId = tnilaiakhir.NaSidangId');
		$this->db->join('tsidang', 'tsidang.SidangId = tnilaiakhir.NaSidangId');
		$this->db->join('tdaftarsidang', 'tdaftarsidang.DafsidId = tsidang.SidangDafsidId');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdaftarsidang.DafsidDaftarsId');
		$this->db->join('tmhs', 'tmhs.MhsNim = tdaftars.DaftarsNIM');
		$this->db->where('DaftarsNIM',$mhs);
		$this->db->where('NiketDosenLevel',3);
		$query = $this->db->get();
		return $query->row_array();
	}




}

/* End of file Nilai_model.php */
/* Location: ./application/models/Nilai_model.php */
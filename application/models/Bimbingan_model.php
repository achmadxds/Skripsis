<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bimbingan_model extends CI_Model {

////////////////sc///////////////////////////
	//untuk field list ajax
	public function notlist($id)
	{
		$this->db->select('*');
		$this->db->from('tdosen');
		$this->db->where('DosenId!=',$id);
		$query = $this->db->get();
		return $query->result();
	}

	//bagi dosbing
    public function mhs_belum()
	{
		$this->db->select('tdaftars.*,
						 tmhs.*');
		$this->db->from('tdaftars');
		$this->db->join('tmhs', 'tdaftars.DaftarsNIM = tmhs.MhsNim');
		$this->db->where("not exists (select * from tdosbings where tdosbings.DosbingsDaftarsId = tdaftars.DaftarsId)",null,false);
		$this->db->where('DaftarsStatus',1);	
		$this->db->order_by('DaftarsId', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function mhs_sudah()
	{
		$this->db->select('tdaftars.*,
						 tmhs.*');
		$this->db->from('tdaftars');
		$this->db->join('tmhs', 'tdaftars.DaftarsNIM = tmhs.MhsNim');
		$this->db->where("exists (select * from tdosbings where tdosbings.DosbingsDaftarsId = tdaftars.DaftarsId)",null,false);
		$this->db->where('DaftarsStatusAkhir',0);
		// $this->db->where("DaftarsStatus = 1 and DaftarsPeriodesId = '$periode' or DaftarsStatus = 1 and DaftarsPeriodesId2 = '$periode'");
		$this->db->order_by('DaftarsId', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function tambah_dosbing()
	{
		$this->db->select('tdaftars.*,
						 tmhs.MhsNim,
						 tmhs.MhsNama');
		$this->db->from('tdaftars');
		$this->db->join('tmhs', 'tdaftars.DaftarsNIM = tmhs.MhsNim');
		$this->db->where('DaftarsStatusAkhir',0);
		// $this->db->where("DaftarsPeriodesId = '$periode'");
		// $this->db->or_where("DaftarsPeriodesId2 = '$periode'");
		$this->db->order_by('DaftarsId', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function edit_dosbing()
	{
		$this->db->select('tdosbings.*,
						 tdaftars.DaftarsNIM,
						 tdaftars.DaftarsId,
						 tmhs.MhsNim,
						 tmhs.MhsNama,
						 tdosen.DosenId,
						 tdosen.DosenNama');
		$this->db->from('tdosbings');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdosbings.DosbingsDaftarsId');
		$this->db->join('tmhs', 'tmhs.MhsNim = tdaftars.DaftarsNIM');
		$this->db->join('tdosen', 'tdosen.DosenId = tdosbings.DosbingsDosenId1');
		$this->db->where('DaftarsStatusAkhir',0);
		// $this->db->where("DaftarsPeriodesId = '$periode'");
		// $this->db->or_where("DaftarsPeriodesId2 = '$periode'");
		$this->db->order_by('DaftarsId', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	//listing_mhs_bimbingan
	public function listing_mhs_bimbingan($id_dosen)
	{
		$this->db->select('tdosbings.*,
						 tdaftars.*,
						 tmhs.*,
						 tdosen.DosenId,
						 tdosen.DosenNama');
		$this->db->from('tdosbings');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdosbings.DosbingsDaftarsId');
		$this->db->join('tmhs', 'tmhs.MhsNim = tdaftars.DaftarsNIM');
		$this->db->join('tdosen', 'tdosen.DosenId = tdosbings.DosbingsDosenId1');
		$this->db->where('DaftarsStatusAkhir', 0);
		$this->db->where("(DosbingsDosenId1='$id_dosen' OR DosbingsDosenId2='$id_dosen')", NULL, FALSE);
		// $this->db->where("DaftarsPeriodesId = '$periode' or DaftarsPeriodesId2 = '$periode'");
		$query = $this->db->get();
		return $query->result_array();
	}


	//detail bimbingan mhs
	public function detail_bimbingan($id_dosen)
	{
		$this->db->select('tbimbingans.*,
						 tdosbings.DosbingsId,
						 tdaftars.DaftarsStatusAkhir');
		$this->db->from('tbimbingans');
		$this->db->join('tdosbings', 'tdosbings.DosbingsId = tbimbingans.BimbingansDosbingsId');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdosbings.DosbingsDaftarsId');
		$this->db->where('BimbingansDosenId',$id_dosen);
		$this->db->where('DaftarsStatusAkhir',0);
		$this->db->order_by('DaftarsId', 'desc');
		$query = $this->db->get();
		return $query->result_array();	
	}

	//view tabel bimbingan mhs belum di cek
	public function bimbingan_belum($id_dosen,$periode)
	{
		$this->db->select('tbimbingans.*,
						 tmhs.*,
						 tperiodes.PeriodesId');
		$this->db->from('tbimbingans');
		$this->db->join('tmhs', 'tmhs.MhsNim = tbimbingans.BimbingansMhsNim');
		$this->db->join('tperiodes', 'tperiodes.PeriodesId = tbimbingans.BimbingansPeriodeId');
		$this->db->where('BimbingansDosenId',$id_dosen);
		$this->db->where('BimbingansStatus',0);
		$this->db->where('BimbingansPeriodeId',$periode);
		$this->db->order_by('BimbingansId', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	//view tabel bimbingan mhs sudah di cek
	public function bimbingan_sudah($id_dosen,$periode)
	{
		$this->db->select('tbimbingans.*,
						 tmhs.*,
						 tperiodes.PeriodesId');
		$this->db->from('tbimbingans');
		$this->db->join('tmhs', 'tmhs.MhsNim = BimbingansMhsNim');
		$this->db->join('tperiodes', 'tperiodes.PeriodesId = tbimbingans.BimbingansPeriodeId');
		$this->db->where('BimbingansDosenId',$id_dosen);
		$this->db->where('BimbingansPeriodeId',$periode);
		$this->db->where('BimbingansStatus',!0);
		$this->db->order_by('BimbingansId', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function balas_bimbingan($id_dosen)
	{
		$this->db->select('tbimbingans.*,
						 tmhs.MhsNim,
						 tmhs.MhsNama');
		$this->db->from('tbimbingans');
		$this->db->join('tmhs', 'tmhs.MhsNim = BimbingansMhsNim');
		$this->db->where('BimbingansDosenId',$id_dosen);
		$this->db->where('BimbingansStatus',0);
		$this->db->order_by('BimbingansId', 'desc');
		$query = $this->db->get();
		return $query->result_array();

	}

	public function edit_balas_bimbingan($id_dosen)
	{
		$this->db->select('tbimbingans.*,
						 tmhs.MhsNim,
						 tmhs.MhsNama');
		$this->db->from('tbimbingans');
		$this->db->join('tmhs', 'tmhs.MhsNim = BimbingansMhsNim');
		$this->db->where('BimbingansDosenId',$id_dosen);
		$this->db->where('BimbingansStatus',!0);
		$this->db->order_by('BimbingansId', 'desc');
		$query = $this->db->get();
		return $query->result_array();

	}

	public function jumlah_mhs_dibimbing_d1()
	{
	    $this->db->select('*');
		$this->db->from('tdosbings');
		$this->db->where('DosbingsDosenId1');
		$this->db->or_where('DosbingsDosenId2');
		$query = $this->db->get();
		$rowcount = $query->num_rows();
		return $rowcount;
	}


	
/////////////////////mhs/////////////////////

	//untuk menampilkan halaman bimbingan
	public function list_bimbingan($id_mhs)
	{
		$this->db->select('tdosbings.*,
						 tdaftars.DaftarsNIM,
						 tdaftars.DaftarsId,
						 tdaftars.DaftarsStatusAkhir,
						 tmhs.MhsNim,
						 tmhs.MhsNama,
						 tdosen.DosenId,
						 tdosen.DosenNama');
		$this->db->from('tdosbings');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdosbings.DosbingsDaftarsId');
		$this->db->join('tmhs', 'tmhs.MhsNim = tdaftars.DaftarsNIM');
		$this->db->join('tdosen', 'tdosen.DosenId = tdosbings.DosbingsDosenId1');
		$this->db->where('MhsNim',$id_mhs);
		$this->db->where('DaftarsStatusAkhir!=',2);
		// $this->db->where("DaftarsPeriodesId = '$periode' or DaftarsPeriodesId2 = '$periode'");
		$this->db->order_by('MhsNim', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	// cek riwayat bimbingan dosen utama
	public function riwayat_bimbingan1($id_mhs,$dosen1)
	{
		$this->db->select('tbimbingans.*,
						   tdosbings.DosbingsDosenId1,
						   tdaftars.DaftarsStatusAkhir');
		$this->db->from('tbimbingans');
		$this->db->join('tdosbings', 'tdosbings.DosbingsId = tbimbingans.BimbingansDosbingsId');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdosbings.DosbingsDaftarsId');
		$this->db->where('BimbingansMhsNim',$id_mhs);
		$this->db->where('BimbingansDosenId',$dosen1);
		$this->db->where('DaftarsStatusAkhir!=',2);
		$this->db->order_by('BimbingansId', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	// cek riwayat bimbingan dosen pendamping
	public function riwayat_bimbingan2($id_mhs,$dosen2)
	{
		$this->db->select('tbimbingans.*,
						   tdosbings.DosbingsDosenId2,
						   tdaftars.DaftarsStatusAkhir');
		$this->db->from('tbimbingans');
		$this->db->join('tdosbings', 'tdosbings.DosbingsId = tbimbingans.BimbingansDosbingsId');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdosbings.DosbingsDaftarsId');
		$this->db->where('BimbingansMhsNim',$id_mhs);
		$this->db->where('BimbingansDosenId',$dosen2);
		$this->db->where('DaftarsStatusAkhir!=',2);
		$this->db->order_by('BimbingansId', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	// cek riwayat bimbingan ketua penguji
	public function riwayat_bimbingan3($id_mhs,$ketua)
	{
		$this->db->select('tbimbingans.*,
						   tdosbings.DosbingsKetua,
						   tdaftars.DaftarsStatusAkhir');
		$this->db->from('tbimbingans');
		$this->db->join('tdosbings', 'tdosbings.DosbingsId = tbimbingans.BimbingansDosbingsId');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdosbings.DosbingsDaftarsId');
		$this->db->where('BimbingansMhsNim',$id_mhs);
		$this->db->where('BimbingansDosenId',$ketua);
		$this->db->where('DaftarsStatusAkhir!=',2);
		$this->db->order_by('BimbingansId', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	// cek riwayat bimbingan dosen tamu
	public function riwayat_bimbingan4($id_mhs,$tamu)
	{
		$this->db->select('tbimbingans.*,
						   tdosbings.DosbingsTamu,
						   tdaftars.DaftarsStatusAkhir');
		$this->db->from('tbimbingans');
		$this->db->join('tdosbings', 'tdosbings.DosbingsId = tbimbingans.BimbingansDosbingsId');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdosbings.DosbingsDaftarsId');
		$this->db->where('BimbingansMhsNim',$id_mhs);
		$this->db->where('BimbingansDosenId',$tamu);
		$this->db->where('DaftarsStatusAkhir!=',2);
		$this->db->order_by('BimbingansId', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	// cek status dosbing utama
	public function cek_status_bimbingan1($id_mhs,$dosen1)
	{
		$this->db->select('tbimbingans.*,
						   tdosbings.DosbingsDosenId1,
						   tdaftars.DaftarsStatusAkhir');
		$this->db->from('tbimbingans');
		$this->db->join('tdosbings', 'tdosbings.DosbingsId = tbimbingans.BimbingansDosbingsId');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdosbings.DosbingsDaftarsId');
		$this->db->where('BimbingansMhsNim',$id_mhs);
		$this->db->where('BimbingansDosenId',$dosen1);
		$this->db->where('DaftarsStatusAkhir!=',2);
		$this->db->order_by('BimbingansId', 'desc');
		$query = $this->db->get();
		return $query->row_array();
		
	}

	// cek status dosbing pendamping
	public function cek_status_bimbingan2($id_mhs,$dosen2)
	{
		$this->db->select('tbimbingans.*,
						   tdosbings.DosbingsDosenId2,
						   tdaftars.DaftarsStatusAkhir');
		$this->db->from('tbimbingans');
		$this->db->join('tdosbings', 'tdosbings.DosbingsId = tbimbingans.BimbingansDosbingsId');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdosbings.DosbingsDaftarsId');
		$this->db->where('BimbingansMhsNim',$id_mhs);
		$this->db->where('BimbingansDosenId',$dosen2);
		$this->db->where('DaftarsStatusAkhir!=',2);
		$this->db->order_by('BimbingansId', 'desc');
		$query = $this->db->get();
		return $query->row_array();
	}

	// cek status bimbingan ketua penguji
	public function cek_status_bimbingan3($id_mhs,$ketua)
	{
		$this->db->select('tbimbingans.*,
						   tdosbings.DosbingsKetua,
						   tdaftars.DaftarsStatusAkhir');
		$this->db->from('tbimbingans');
		$this->db->join('tdosbings', 'tdosbings.DosbingsId = tbimbingans.BimbingansDosbingsId');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdosbings.DosbingsDaftarsId');
		$this->db->where('BimbingansMhsNim',$id_mhs);
		$this->db->where('BimbingansDosenId',$ketua);
		$this->db->where('DaftarsStatusAkhir!=',2);
		$this->db->order_by('BimbingansId', 'desc');
		$query = $this->db->get();
		return $query->row_array();
	}

	// cek status bimbingan dosen tamu
	public function cek_status_bimbingan4($id_mhs,$tamu)
	{
		$this->db->select('tbimbingans.*,
						   tdosbings.DosbingsTamu,
						   tdaftars.DaftarsStatusAkhir');
		$this->db->from('tbimbingans');
		$this->db->join('tdosbings', 'tdosbings.DosbingsId = tbimbingans.BimbingansDosbingsId');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdosbings.DosbingsDaftarsId');
		$this->db->where('BimbingansMhsNim',$id_mhs);
		$this->db->where('BimbingansDosenId',$tamu);
		$this->db->where('DaftarsStatusAkhir!=',2);
		$this->db->order_by('BimbingansId', 'desc');
		$query = $this->db->get();
		return $query->row_array();
	}

	public function cek_sempro($id_mhs)
	{
		$this->db->select('tsempro.*,
						   tdaftarsempro.DafsemId,
						   tdaftars.DaftarsNIM');
		$this->db->from('tsempro');
		$this->db->join('tdaftarsempro', 'tdaftarsempro.DafsemId = tsempro.SemproDafsemId');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdaftarsempro.DafsemDaftarsId');
		$this->db->where('DaftarsNIM',$id_mhs);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function cek_sidang($id_mhs)
	{
		$this->db->select('*');
		$this->db->from('tsidang');
		$this->db->join('tdaftarsidang', 'tdaftarsidang.DafsidId = tsidang.SidangDafsidId');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdaftarsidang.DafsidDaftarsId');
		$this->db->where('DaftarsNIM',$id_mhs);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function cek_dosbing($id_mhs)
	{
		$this->db->select('*');
		$this->db->from('tdosbings');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdosbings.DosbingsDaftarsId');
		$this->db->where('DaftarsNIM',$id_mhs);
		$this->db->order_by('DosbingsId', 'desc');
		$query = $this->db->get();
		return $query->row_array();
	}

	


////////////////cetak bimbingan//////////////
	public function dosbing($mhs)
	{
		$this->db->select('tdosbings.*,
						 tdaftars.DaftarsNIM,
						 tmhs.MhsNim,
						 tmhs.MhsNama,');
		$this->db->from('tdosbings');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdosbings.DosbingsDaftarsId');
		$this->db->join('tmhs', 'tmhs.MhsNim = tdaftars.DaftarsNIM');
		$this->db->where('MhsNim',$mhs);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function cek_judul($mhs)
	{
		$this->db->select('*');
		$this->db->from('tskripsi');
		$this->db->where('SkripsiMhsNim',$mhs);
		$query = $this->db->get();
		return $query->row_array();
	}
	

}

/* End of file Bimbingan_model.php */
/* Location: ./application/models/Bimbingan_model.php */
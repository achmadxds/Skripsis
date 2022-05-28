<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
//////////////////Sec////////////////////
	public function total_mhs()
    {
	    $this->db->select('*');
		$this->db->from('tmhs');
		$query = $this->db->get();
		$rowcount = $query->num_rows();
		return $rowcount;
    }

    public function mhs_skripsi($periode)
    {
	    $this->db->select('*');
		$this->db->from('tdaftars');
		$this->db->where('DaftarsPeriodesId',$periode);
		$this->db->or_where('DaftarsPeriodesId2',$periode);
		$query = $this->db->get();
		$rowcount = $query->num_rows();
		return $rowcount;
    }

    public function total_dosen()
    {
	    $this->db->select('*');
		$this->db->from('tdosen');
		$query = $this->db->get();
		$rowcount = $query->num_rows();
		return $rowcount;
    }

    public function total_operator()
    {
	    $this->db->select('*');
		$this->db->from('tdosen');
		$this->db->join('tuser', 'tuser.UserId = tdosen.DosenId');
		$this->db->where('UserLevelAktif', 'operator');
		$query = $this->db->get();
		$rowcount = $query->num_rows();
		return $rowcount;
    }

    public function total_mhs_bimbingan($id_dosen)
    {
	    $this->db->select('*');
		$this->db->from('tdosbings');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdosbings.DosbingsDaftarsId');
		$this->db->where("(DosbingsDosenId1='$id_dosen' and DaftarsStatusAkhir=0 OR DosbingsDosenId2='$id_dosen' and DaftarsStatusAkhir=0)", NULL, FALSE);
		$query = $this->db->get();
		$rowcount = $query->num_rows();
		return $rowcount;
    }

    public function cek_bimbingan($id_dosen)
    {
	    $this->db->select('*');
		$this->db->from('tbimbingans');
		$this->db->where('BimbingansDosenId',$id_dosen);
		$this->db->where('BimbingansStatus',0);
		$query = $this->db->get();
		$rowcount = $query->num_rows();
		return $rowcount;
    }

    public function cek_skripsi()
    {
	    $this->db->select('*');
		$this->db->from('tdaftars');
		$this->db->where('DaftarsStatus',0);
		$query = $this->db->get();
		$rowcount = $query->num_rows();
		return $rowcount;
    }

    public function cek_seminar($periode)
    {
	    $this->db->select('*');
		$this->db->from('tdaftarsempro');
		$this->db->where('DafsemPeriodeId',$periode);
		$this->db->where('DafsemStatus',0);
		$query = $this->db->get();
		$rowcount = $query->num_rows();
		return $rowcount;
    }

    public function cek_sidang($periode)
    {
	    $this->db->select('*');
		$this->db->from('tdaftarsidang');
		$this->db->where('DafsidPeriodeId',$periode);
		$this->db->where('DafsidStatus',0);
		$query = $this->db->get();
		$rowcount = $query->num_rows();
		return $rowcount;
    }

     public function cek_bebas_prodi($periode)
    {
	    $this->db->select('*');
		$this->db->from('tskripsi');
		$this->db->where('SkripsiPeriodeId',$periode);
		$query = $this->db->get();
		$rowcount = $query->num_rows();
		return $rowcount;
    }

    public function jadwal_seminar($id_dosen)
    {
    	$this->db->select('tsempro.SemproId,
    					   tsempro.SemproHasil,
    					   tdetailsempro.DetsemDafsemId,
						   tdaftarsempro.DafsemId,
						   tdaftars.DaftarsId,
						   tdaftars.DaftarsStatusAkhir');
		$this->db->from('tsempro');
		$this->db->join('tdetailsempro', 'tdetailsempro.DetsemSemproId = tsempro.SemproId');
		$this->db->join('tdaftarsempro', 'tdaftarsempro.DafsemId = tsempro.SemproDafsemId');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdaftarsempro.DafsemDaftarsId');
		$this->db->where('DetsemDosenId',$id_dosen);
		$this->db->where('DaftarsStatusAkhir',0);
		$this->db->where("SemproHasil=0 or SemproHasil=3");
		$this->db->order_by('SemproId', 'desc');
		$query = $this->db->get();
		$rowcount = $query->num_rows();
		return $rowcount;
    }

    public function jadwal_sidang($id_dosen)
    {
    	$this->db->select('tsidang.SidangId,
    					   tsidang.SidangHasil,
    					   tdetailsidang.DetsidDafsidId,
						   tdaftarsidang.DafsidId,
						   tdaftars.DaftarsId,
						   tdaftars.DaftarsStatusAkhir');
		$this->db->from('tsidang');
		$this->db->join('tdetailsidang', 'tdetailsidang.DetsidSidangId = tsidang.SidangId');
		$this->db->join('tdaftarsidang', 'tdaftarsidang.DafsidId = tsidang.SidangDafsidId');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdaftarsidang.DafsidDaftarsId');
		$this->db->where('DetsidDosenId',$id_dosen);
		$this->db->where('DaftarsStatusAkhir',0);
		$this->db->where("SidangHasil=0 or SidangHasil=3");
		$this->db->order_by('SidangHasil', 'desc');
		$query = $this->db->get();
		$rowcount = $query->num_rows();
		return $rowcount;
    }




////////////////////mhs/////////////////////
    public function status_akun_mhs($nim)
    {
    	$this->db->select('MhsStatus');
		$this->db->from('tmhs');
		$this->db->where('MhsNim',$nim);	
		$query = $this->db->get();
		return $query->row();
    }

    public function judul_skripsi($nim)
    {
    	$this->db->select('tskripsi.*,
						 tdaftars.DaftarsId,
						 tdaftars.DaftarsStatusAkhir,
						 tdaftars.DaftarsId');
		$this->db->from('tskripsi');
		$this->db->join('tdaftars', 'tdaftars.DaftarsNIM = tskripsi.SkripsiMhsNim');
		$this->db->where('SkripsiMhsNim',$nim);
		$this->db->where('DaftarsStatusAkhir!=',2);
		$this->db->order_by('DaftarsId', 'desc');
		$query = $this->db->get();
		return $query->row_array();
    }

    public function pendaftaran_skripsi($nim)
    {
    	$this->db->select('*');
		$this->db->from('tdaftars');
		$this->db->where('DaftarsNIM',$nim);
		$this->db->where('DaftarsStatusAkhir!=',2);
		$this->db->order_by('DaftarsId', 'desc');
		$query = $this->db->get();
		return $query->row();
    }

    public function pendaftaran_seminar($nim)
    {
   		$this->db->select('tdaftarsempro.*,
						 tdaftars.DaftarsNIM,
						 tdaftars.DaftarsId');
		$this->db->from('tdaftarsempro');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdaftarsempro.DafsemDaftarsId');
		$this->db->where('DaftarsNIM',$nim);
		$this->db->where('DaftarsStatusAkhir!=',2);
		$this->db->order_by('DaftarsId', 'desc');
		$query = $this->db->get();
		return $query->row();
    }

    public function pendaftaran_sidang($nim)
    {
   		$this->db->select('tdaftarsidang.*,
						 tdaftars.DaftarsNIM,
						 tdaftars.DaftarsId');
		$this->db->from('tdaftarsidang');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdaftarsidang.DafsidDaftarsId');
		$this->db->where('DaftarsNIM',$nim);
		$this->db->where('DaftarsStatusAkhir!=',2);
		$this->db->order_by('DaftarsId', 'desc');
		$query = $this->db->get();
		return $query->row();
    }

    public function seminar($nim)
    {
    	$this->db->select('tsempro.SemproHasil,
    					 tdaftarsempro.DafsemId,
						 tdaftars.DaftarsNIM,
						 tdaftars.DaftarsId');
		$this->db->from('tsempro');
		$this->db->join('tdaftarsempro', 'tdaftarsempro.DafsemId = 
			             tsempro.SemproDafsemId');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdaftarsempro.DafsemDaftarsId');
		$this->db->where('DaftarsNIM',$nim);
		$this->db->where('DaftarsStatusAkhir!=',2);
		$this->db->order_by('DaftarsId', 'desc');
		$query = $this->db->get();
		return $query->row();
    }

    public function sidang($nim)
    {
    	$this->db->select('tsidang.SidangHasil,
    					 tdaftarsidang.DafsidId,
						 tdaftars.DaftarsNIM,
						 tdaftars.DaftarsId');
		$this->db->from('tsidang');
		$this->db->join('tdaftarsidang', 'tdaftarsidang.DafsidId = 
			             tsidang.SidangDafsidId');
		$this->db->join('tdaftars', 'tdaftars.DaftarsId = tdaftarsidang.DafsidDaftarsId');
		$this->db->where('DaftarsNIM',$nim);
		$this->db->where('DaftarsStatusAkhir!=',2);
		$this->db->order_by('DaftarsId', 'desc');
		$query = $this->db->get();
		return $query->row();
    }

    public function lulus_skripsi($nim)
    {
    	$this->db->select('*');
		$this->db->from('tdaftars');
		$this->db->where('DaftarsNIM', $nim);
		$this->db->order_by('DaftarsId', 'desc');
		$query = $this->db->get();
		return $query->row_array();
    }

    public function selisih_tanggal()
    {
    	$this->db->select('*');
		$this->db->from('tperiodes');
		$this->db->where('PeriodesStatusAktif',1);
		$query = $this->db->get();
		return $query->row_array();
    }

     public function semester($nim)
    {
    	$this->db->select('*');
		$this->db->from('tdaftars');
		$this->db->where('DaftarsNIM', $nim);
		$query = $this->db->get();
		return $query->row_array();
    }

	

}

/* End of file Dasbor_model.php */
/* Location: ./application/models/Dasbor_model.php */
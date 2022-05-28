<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('nilai_model');
	}

//seminar//
	public function seminar()
	{
		$mhs     = $this->session->userdata('MhsNim');
		$jadwal = $this->nilai_model->jadwal_seminar($mhs);
		$sempro = $this->nilai_model->nilai_seminar($mhs);
		$dosen1 = $this->nilai_model->detail_sempro1($mhs);
		$dosen2 = $this->nilai_model->detail_sempro2($mhs);
		$ketua = $this->nilai_model->detail_sempro_ketua($mhs);
		$data = array( 'title'  => 'Halaman Nilai Seminar',
					   'jadwal' => $jadwal,
					   'sempro' => $sempro,
					   'dosen1' => $dosen1,
					   'dosen2' => $dosen2,
					   'ketua'  => $ketua,
					   'isi'    => 'mhs/nilai/seminar'
		);
		$this->load->view('mhs/layout/wrapper', $data, FALSE);
	}

	//cetak berita acara
	public function cetak_berita_acara()
	{
		$mhs     = $this->session->userdata('MhsNim');
		$jadwal = $this->nilai_model->jadwal_seminar($mhs);
		$sempro = $this->nilai_model->nilai_seminar($mhs);
		$dosen1 = $this->nilai_model->detail_sempro1($mhs);
		$dosen2 = $this->nilai_model->detail_sempro2($mhs);
		$ketua = $this->nilai_model->detail_sempro_ketua($mhs);
		$judul = $this->db->query("SELECT * FROM tskripsi WHERE SkripsiMhsNim='$mhs'")->row_array();
		$profil = $this->db->query("SELECT * FROM tmhs WHERE MhsNim='$mhs'")->row_array();

		$data = array( 'title'  => 'Cetak Berita Acara',
					   'judul'  => $judul,
					   'profil' => $profil,
					   'jadwal' => $jadwal,
					   'sempro' => $sempro,
					   'dosen1' => $dosen1,
					   'dosen2' => $dosen2,
					   'ketua'  => $ketua,
					   'isi'    => 'mhs/nilai/cetak_berita_acara'
		);
		$this->load->view('mhs/nilai/cetak_berita_acara', $data, FALSE);
	}

//sidang//
	public function sidang()
	{
		$mhs     = $this->session->userdata('MhsNim');
		$jadwal = $this->nilai_model->jadwal_sidang($mhs);
		$sidang = $this->nilai_model->nilai_sidang($mhs);
		$ketua = $this->nilai_model->detail_sidang_ketua($mhs);
		$dosen1 = $this->nilai_model->detail_sidang1($mhs);
		$tamu = $this->nilai_model->detail_sidang2($mhs);
		$data = array( 'title'  => 'Halaman Nilai Sidang',
					   'jadwal' => $jadwal,
					   'sidang' => $sidang,
					   'dosen1' => $dosen1,
					   'tamu'   => $tamu,
					   'ketua' => $ketua,
					   'isi'    	=> 'mhs/nilai/sidang'
		);
		$this->load->view('mhs/layout/wrapper', $data, FALSE);
	}

//na//
	public function nilai_akhir()
	{
		$mhs     = $this->session->userdata('MhsNim');
		$na_mhs = $this->nilai_model->na_mhs($mhs);
		$na_grafik_p1 = $this->nilai_model->na_grafik_penguji1($mhs);
		$na_grafik_p2 = $this->nilai_model->na_grafik_penguji2($mhs);
		$na_grafik_p3 = $this->nilai_model->na_grafik_penguji3($mhs);
		$data = array( 'title'  => 'Halaman Nilai Akhir',
					   'na_grafik_p1' => $na_grafik_p1,
					   'na_grafik_p2' => $na_grafik_p2,
					   'na_grafik_p3' => $na_grafik_p3,
					   'na_mhs'=> $na_mhs,
					   'isi'    => 'mhs/nilai/nilai_akhir'
		);
		$this->load->view('mhs/layout/wrapper', $data, FALSE);
	}

}

/* End of file Nilai.php */
/* Location: ./application/controllers/mhs/Nilai.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('dasbor_model');
	}

	public function index()
	{
		$nim = $this->session->userdata('MhsNim');
		$status_akun     = $this->dasbor_model->status_akun_mhs($nim);
		$selisih_tanggal = $this->dasbor_model->selisih_tanggal();
		$daftar_skripsi  = $this->dasbor_model->pendaftaran_skripsi($nim);
		$daftar_seminar  = $this->dasbor_model->pendaftaran_seminar($nim);
		$daftar_sidang   = $this->dasbor_model->pendaftaran_sidang($nim);
		$seminar   		 = $this->dasbor_model->seminar($nim);
		$sidang   		 = $this->dasbor_model->sidang($nim);
	    $judul_skripsi   = $this->dasbor_model->judul_skripsi($nim);
	    $lulus_skripsi   = $this->dasbor_model->judul_skripsi($nim);
	    $semester        = $this->dasbor_model->semester($nim);
	    // var_dump($semester);

		$data = array ( 'title' 		 => 'Halaman Utama',
						'status_akun'    => $status_akun,
						'semester'		 => $semester,
						'daftar_skripsi' => $daftar_skripsi,
						'daftar_seminar' => $daftar_seminar,
						'daftar_sidang'  => $daftar_sidang,
						'selisih_tanggal'=> $selisih_tanggal,
						'judul_skripsi'	 => $judul_skripsi,
						'lulus_skripsi'	 => $lulus_skripsi,
						'seminar'		 => $seminar,
						'sidang'		 => $sidang,	
 						'isi'			 => 'mhs/dasbor/list'
 					);
 		$this->load->view('mhs/layout/wrapper', $data, FALSE);
	}

}

/* End of file Dasbor.php */
/* Location: ./application/controllers/mahasiswa/Dasbor.php */
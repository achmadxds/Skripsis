
<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Dasbor extends CI_Controller {

 	public function __construct()
 	{
 		parent::__construct();
 		$this->load->model('dasbor_model');
 	}
 
	

 	public function dosen()
 	{	
 		$id_dosen = $this->session->userdata('UserId');
 		$cek_bimbingan = $this->dasbor_model->cek_bimbingan($id_dosen);
 		$total_mhs_bimbingan = $this->dasbor_model->total_mhs_bimbingan($id_dosen);
 		$jadwal_seminar = $this->dasbor_model->jadwal_seminar($id_dosen);
 		$data = array ( 'title' 	    => 'Halaman Utama',
 						'total_mhs_bimbingan' => $total_mhs_bimbingan,
 						'cek_bimbingan' => $cek_bimbingan,
 						'jadwal_seminar'=> $jadwal_seminar,
 						'isi'		    => 'secure/dasbor/dosen'
 					);
 		$this->load->view('secure/layout/wrapper', $data, FALSE);
 	}

 	public function koordinator()
 	{	
 		$periode = periode_aktif();
 		$mhs_skripsi = $this->dasbor_model->mhs_skripsi($periode['PeriodesId']); 
 		$total_dosen 	= $this->dasbor_model->total_dosen();
 		$total_operator 	= $this->dasbor_model->total_operator();
 		$data = array ( 'title' 	  => 'Halaman Utama',
 						'mhs_skripsi' => $mhs_skripsi,
 						'total_dosen' => $total_dosen,
 						'total_operator' => $total_operator,
 						'isi'		  => 'secure/dasbor/koordinator'
 					);
 		$this->load->view('secure/layout/wrapper', $data, FALSE);
 	}

 	public function operator()
 	{   $periode=periode_aktif();
 		$cek_skripsi = $this->dasbor_model->cek_skripsi();
 		$cek_seminar = $this->dasbor_model->cek_seminar($periode['PeriodesId']); 
 		$cek_sidang  = $this->dasbor_model->cek_sidang($periode['PeriodesId']); 
 		$cek_bebas_prodi  = $this->dasbor_model->cek_bebas_prodi($periode['PeriodesId']); 
 		$data = array ( 'title' 	  => 'Halaman Utama',
 						'cek_skripsi' => $cek_skripsi,
 						'cek_seminar' => $cek_seminar,
 						'cek_sidang'  => $cek_sidang,
 						'cek_bebas_prodi'=> $cek_bebas_prodi,
 						'isi'		  => 'secure/dasbor/operator'
 					);
 		$this->load->view('secure/layout/wrapper', $data, FALSE);
 	}

 	public function kaprodi()
 	{
 		$periode = periode_aktif();
 		$mhs_skripsi = $this->dasbor_model->mhs_skripsi($periode['PeriodesId']); 
 		$total_dosen 	= $this->dasbor_model->total_dosen();
 		$total_operator 	= $this->dasbor_model->total_operator();

 		$data = array ( 'title' 	=> 'Halaman Utama',
 						'mhs_skripsi'=> $mhs_skripsi,
 						'total_dosen' => $total_dosen,
 						'total_operator' => $total_operator,
 						'isi'		=> 'secure/dasbor/kaprodi'
 					);
 		$this->load->view('secure/layout/wrapper', $data, FALSE);
 	}


 }
 

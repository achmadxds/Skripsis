<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('laporan_model');
	}

	public function index()
	{
		$periode=$this->laporan_model->list_periode();
		$data = array ( 'title' 	  => 'Halaman Laporan',
						'periode'	  => $periode,
 						'isi'		  => 'secure/laporan/laporan'
 					);
 		$this->load->view('secure/layout/wrapper', $data, FALSE);
	}

	public function laporan_skripsi()
	{
		 $id_periode = $this->input->post('periode');
		 $periode= $this->db->query("SELECT * from tperiodes where PeriodesId='$id_periode'")->row_array();
		 $laporan = $this->laporan_model->laporan_skripsi($periode['PeriodesId']);

		$data = array ( 'title' 	=> 'Halaman Laporan',
						'laporan'	=>  $laporan,
						'periode'   =>  $periode,
 						'isi'		=> 'secure/laporan/cetak_laporan'
 					);
		$this->load->view('secure/laporan/cetak_laporan', $data, FALSE);
	}

	// public function laporan_skripsi($firstdate, $lastdate)
	// {

	// 	 $laporan = $this->laporan_model->laporan_skripsi($firstdate, $lastdate);
	// 	 $range = $this->input->post('range', TRUE); // mendapatkan tgl dari inputan laporan
 //         $d = str_replace('-', ',', $range); //menghapus tanda -
 //         $d = str_replace(' ', '', $d); // menghapus spasi
 //         $array = explode(',', $d); // merubah menjadi array
 //         $firstdate = date("Y-m-d", strtotime($array[0]));
 //         $lastdate = date("Y-m-d", strtotime($array[1]));

	// 	$data = array ( 'title' 	=> 'Halaman Laporan',
	// 					'laporan'	=>  $laporan,
 // 						'isi'		=> 'secure/laporan/cetak_laporan'
 // 					);
 // 		$this->load->view('secure/layout/wrapper', $data, FALSE);
	// }


}

/* End of file Laporan.php */
/* Location: ./application/controllers/secure/Laporan.php */
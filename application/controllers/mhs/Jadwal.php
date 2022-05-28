<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('jadwal_model');
	}

	public function bimbingan()
	{
	   $jadwal = $this->jadwal_model->list_jadwal_bimbingan();
	   $data   = array (  'title' 	=> 'Halaman Jadwal Bimbingan',
	   					'jadwal'    =>  $jadwal,
 						'isi'		=> 'mhs/jadwal/bimbingan'
 					);
 		$this->load->view('mhs/layout/wrapper', $data, FALSE);	
	}

}

/* End of file Jadwal.php */
/* Location: ./application/controllers/mhs/Jadwal.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitoring extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('monitoring_model');
	}

	public function index()
	{
		$periode=periode_aktif();
		$monitoring = $this->monitoring_model->monitoring($periode['PeriodesId']);
		$data = array ( 'title' 	=> 'Halaman Monitoring',
						'monitoring'=> $monitoring,
 						'isi'		=> 'secure/monitoring/list'
 					);
 		$this->load->view('secure/layout/wrapper', $data, FALSE);
	}

}

/* End of file Monitoring.php */
/* Location: ./application/controllers/secure/Monitoring.php */
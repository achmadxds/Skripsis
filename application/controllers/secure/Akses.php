
<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Akses extends CI_Controller {
 
 	public function index()
 	{
 		$data = array ( 'title' 	=> 'Halaman Utama',
 						'isi'		=> 'secure/dasbor/list'
 					);
 		$this->load->view('secure/layout/wrapper', $data, FALSE);
 	}


	public function auth($akses)
	{
	
		$data 	 = array ( 'UserLevelAktif'		 => $akses);

		$this->db->where('UserId',$this->session->userdata('UserId'));
		$this->db->update('tuser',$data);
    	redirect(base_url('secure/dasbor/'.$akses),'refresh');
      
    }

    
	 
 }
 

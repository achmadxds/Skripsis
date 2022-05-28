<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	public function index()
	{
		$dosen= $this->user_model->listing_dosen();
		$koordinator = $this->user_model->listing_koordinator();
		$kaprodi = $this->user_model->listing_kaprodi();
		$mhs= $this->user_model->listing_mhs();
		$operator= $this->user_model->listing_operator();
		$data = array(  'title'   => 'Halaman User',
						'dosen'   => $dosen,
						'operator'=> $operator,
						'kaprodi' => $kaprodi,
						'koordinator' =>$koordinator,
						'mhs'	=> $mhs,
						'isi'     => 'secure/user/list'
		);
		$this->load->view('secure/layout/wrapper', $data, FALSE);
	}

	public function reset_kaprodi($pw)
	{
		    $decrypt_id     = $this->enkripsi->decrypt_url($pw);
			$data = array     ( 	
									'UserPassword'  =>  SHA1($decrypt_id)
				               );
			$this->db->where('UserUsername',$decrypt_id);
			$this->db->update('tuser', $data);
			$this->session->set_flashdata('edit',
				'<script> 	iziToast.info ({
                          	title    : "OK",
                          	message  : "Password Berhasil Di Reset!",});
                </script> ');
			redirect(base_url('secure/user'),'refresh');
	}

	public function reset_koordinator($pw)
	{
		    $decrypt_id     = $this->enkripsi->decrypt_url($pw);
			$data = array     ( 	
									'UserPassword'  =>  SHA1($decrypt_id)
				               );
			$this->db->where('UserUsername',$decrypt_id);
			$this->db->update('tuser', $data);
			$this->session->set_flashdata('edit',
				'<script> 	iziToast.info ({
                          	title    : "OK",
                          	message  : "Password Berhasil Di Reset!",});
                </script> ');
			redirect(base_url('secure/user'),'refresh');
	}

	public function reset_dosen($pw)
	{
		    $decrypt_id     = $this->enkripsi->decrypt_url($pw);
			$data = array     ( 	
									'UserPassword'  =>  SHA1($decrypt_id)
				               );
			$this->db->where('UserUsername',$decrypt_id);
			$this->db->update('tuser', $data);
			$this->session->set_flashdata('edit',
				'<script> 	iziToast.info ({
                          	title    : "OK",
                          	message  : "Password Berhasil Di Reset!",});
                </script> ');
			redirect(base_url('secure/user'),'refresh');
	}

	public function reset_operator($pw)
	{
		    $decrypt_id     = $this->enkripsi->decrypt_url($pw);
			$data = array     ( 	
									'UserPassword'  =>  SHA1($decrypt_id)
				               );
			$this->db->where('UserUsername',$decrypt_id);
			$this->db->update('tuser', $data);
			$this->session->set_flashdata('edit',
				'<script> 	iziToast.info ({
                          	title    : "OK",
                          	message  : "Password Berhasil Di Reset!",});
                </script> ');
			redirect(base_url('secure/user'),'refresh');
	}

	public function reset_mhs($pw)
	{
		    $decrypt_id     = $this->enkripsi->decrypt_url($pw);
			$data = array     ( 	
									'UserPassword'  =>  SHA1($decrypt_id)
				               );
			$this->db->where('MhsNim',$decrypt_id);
			$this->db->update('tmhs', $data);
			$this->session->set_flashdata('edit',
				'<script> 	iziToast.info ({
                          	title    : "OK",
                          	message  : "Password Berhasil Di Reset!",});
                </script> ');
			redirect(base_url('secure/user'),'refresh');
	}

	

}

/* End of file User.php */
/* Location: ./application/controllers/secure/User.php */
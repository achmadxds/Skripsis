<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{


	public function index()
	{
		$this->load->view('home/home'); //auth mhs
	}

	public function register()
	{
		//validasi input
		$this->form_validation->set_rules(
			'nim',
			'NIM',
			'min_length[9]|max_length[9]|is_unique[tmhs.MhsNim]',
			array(
				'min_length' => '<script> 	
									iziToast.warning({
	                          		title    : "Perhatian",
	                          		position : "topRight",
	                          		message  : "%s Minimal 12 karakter.",});
	                				</script> ',
				'max_length' => '<script> 	
									iziToast.warning({
	                          		title    : "Perhatian",
	                          		position : "topRight",
	                          		message  : "%s Minimal 13 karakter.",});
	                				</script> ',
				'is_unique'	=> '<script> 	
									iziToast.warning({
	                          		title    : "Perhatian",
	                          		position : "topRight",
	                          		message  : "%s sudah ada. Silahakan Login atau Hubungi Operator.",});
	                				</script> '
			)
		);

		$this->form_validation->set_rules(
			'nohp',
			'NO HP',
			'min_length[12]|max_length[14]|is_unique[tmhs.MhsNohp]',
			array(
				'min_length' => '<script> 	
									iziToast.warning({
	                          		title    : "Perhatian",
	                          		position : "topRight",
	                          		message  : "%s Minimal 12 karakter.",});
	                				</script> ',
				'max_length' => '<script> 	
									iziToast.warning({
	                          		title    : "Perhatian",
	                          		position : "topRight",
	                          		message  : "%s Minimal 14 karakter.",});
	                				</script> ',
				'is_unique'	=> '<script> 	
									iziToast.warning({
	                          		title    : "Perhatian",
	                          		position : "topRight",
	                          		message  : "%s sudah ada. Silahakan Login atau Hubungi Operator.",});
	                				</script> '
			)
		);


		if ($this->form_validation->run() === FALSE) {
			//end validasi

			$data = array(
				'title'		=> 'Halaman Pendaftaran',
				'si'		=> 'Skripsi UMK'
			);
			$this->load->view('register/list', $data, FALSE);

			//masuk database
		} else {
			$i = $this->input;
			$data = array(
				'MhsNim'   		   	   => $i->post('nim'),
				'MhsNama'			   => $i->post('nama'),
				'MhsPassword'     	   => SHA1($i->post('password')),
				'MhsNohp'   	       => $i->post('nohp'),
				'MhsAlamat'   		   => $i->post('alamat'),
				'MhsEmail'     	       => $i->post('email'),
				'MhsStatus'		       => 0

			);
			$this->db->insert('tmhs', $data);
			$this->session->set_flashdata('login', 'Pendaftaran Kamu Berhasil !');
			redirect(base_url('login'), 'refresh');
		}
		//end masuk database
	}

	public function login()
	{

		//validasi
		$this->form_validation->set_rules(
			'nim',
			'nim',
			'required',
			array('required'	=> '%s harus diisi')
		);

		$this->form_validation->set_rules(
			'password',
			'Password',
			'required',
			array('required'	=> '%s harus diisi')
		);

		if ($this->form_validation->run()) {
			$nim 	= $this->input->post('nim');
			$password 	= $this->input->post('password');
			//proses ke login mhs
			$this->mhs_login->login($nim, $password);
		}
		//end validasi

		$data = array('title' => 'Halaman Login');
		$this->load->view('home/login', $data, FALSE);
	}

	public function secure()
	{
		//validasi
		$this->form_validation->set_rules(
			'username',
			'username',
			'required',
			array('required'	=> '%s harus diisi')
		);

		$this->form_validation->set_rules(
			'password',
			'Password',
			'required',
			array('required'	=> '%s harus diisi')
		);

		if ($this->form_validation->run()) {
			$username 	= $this->input->post('username');
			$password 	= $this->input->post('password');
			//proses ke login mhs
			$this->secure_login->login($username, $password);
		}
		//end validasi

		$data = array(
			'title' 	=> 'Login',
			'si'		=> 'Skripsi UMK'
		);
		$this->load->view('secure/login/list', $data, FALSE);
	}

	public function mhs_logout()
	{
		$this->mhs_login->logout();
	}

	public function s_logout()
	{
		$this->secure_login->logout();
	}
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */
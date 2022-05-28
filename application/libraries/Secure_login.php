<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Secure_login
{
	protected $CI;

	public function __construct()
	{
        $this->CI =& get_instance();

        //load model
        $this->CI->load->model('login_model');
	}



	//fungsi login
	public function login($username,$password)
	{

		$cek = $this->CI->login_model->secure_login($username,$password);
		//jika ada data user, maka buat session login

		if($cek) {

			$id			= $cek->UserId;
			$username	= $cek->UserUsername;
			$level		= $cek->UserLevelAktif;
			//buat session
			$this->CI->session->set_userdata('UserId',$id);
			$this->CI->session->set_userdata('UserUsername',$username);
			$this->CI->session->set_userdata('UserLevelAktif',$level);
			
			
			$this->CI->session->set_flashdata('simpan',
				'<script> 	
				iziToast.show({
				    theme: "dark",
				    icon: "icon-person",
				    title: "Hallo!",
				    message: "Selamat Datang!",
				    position: "topRight",
				    progressBarColor: "rgb(0, 255, 184)",
				  
				    onOpening: function(instance, toast){
				        console.info("callback abriu!");
				    },
				    onClosing: function(instance, toast, closedBy){
				        console.info("closedBy: " + closedBy); // tells if it was closed by "drag" or "button"
				    }
				});
                </script> ');
			redirect(base_url('secure/dasbor/'.$level),'refresh');
		}else{
			//jika tidak ada data
			$this->CI->session->set_flashdata('salah', 'Username Atau Password Kamu Salah');
			redirect(base_url('secure'),'refresh');
		}
	}
	
	//fungsi cek login
	public function cek_login()
	{
		//periksa apakah session sudah ada atau belum
		if ($this->CI->session->userdata('UserUsername') == "") 
		{
			$this->CI->session->set_flashdata('relog', 'Kamu Belum Login');
			redirect(base_url('secure'),'refresh');
		}

	}

	//fungsi logout
	public function logout()
	{
		$this->CI->session->unset_userdata('UserId');
		$this->CI->session->unset_userdata('UserUsername');
		$this->CI->session->unset_userdata('UserLevelAktif');
		//redirek login
		$this->CI->session->set_flashdata('logout', 'Kamu Berhasil Logout');
		redirect(base_url('secure'),'refresh');
	}


}

/* End of file Login_user */
/* Location: ./application/libraries/Login_user */

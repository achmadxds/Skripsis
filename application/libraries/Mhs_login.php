<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mhs_login
{
	protected $CI;

	public function __construct()
	{
        $this->CI =& get_instance();

        //load model
        $this->CI->load->model('login_model');
	}

	//fungsi login
	public function login($nim,$password)
	{
		$periode = $this->CI->db->query("SELECT * FROM tperiodes Where PeriodesStatusaktif =1")->row_array();
		$tanggal = $periode['PeriodesSelesai'];
		$tanggal = new DateTime($tanggal); 
		$sekarang = new DateTime();
		$perbedaan = $tanggal->diff($sekarang);
		// echo $perbedaan->y.' selisih tahun.';
		// echo $perbedaan->m.' selisih bulan.';
		// echo $perbedaan->d.' selisih hari.';
		// echo $perbedaan->h.' selisih jam.';
		// echo $perbedaan->i.' selisih menit.';
		

		$cek = $this->CI->login_model->mhs_login($nim,$password);
		//jika ada data user, maka buat session login
		if($cek) {
			$nim		= $cek->MhsNim;
			$nama		= $cek->MhsNama;
			$nohp		= $cek->MhsNohp;
			$email		= $cek->MhsEmail;
			//buat session
			$this->CI->session->set_userdata('MhsNim',$nim);
			$this->CI->session->set_userdata('MhsNama',$nama);
			$this->CI->session->set_userdata('MhsNohp',$nohp);
			$this->CI->session->set_userdata('MhsEmail',$email);
			//redirek ke dasbor
		   
		   $mhs = $this->CI->session->userdata('MhsNim');
		   $daftar = $this->CI->db->query("SELECT * FROM tdaftars 
			      Where DaftarsNIM ='$mhs' 
			      order by DaftarsId Desc ")->row_array();
		   if($perbedaan->m<=3 && $daftar['DaftarsStatusAkhir']==!1) {
		  	$this->CI->session->set_flashdata('simpan',
						'<script>
						
						iziToast.show({
						    theme: "dark",
						    icon: "fa fa-stopwatch",
						    image: "",
						    title: "Hallo!",
						    message: "Semester Kurang 3 Bulan Lagi",
						    position: "center",
						    transitionIn: "bounceInLeft",
						    progressBarColor: "rgb(0, 255, 184)",
						  
						    onOpening: function(instance, toast){
						        console.info("callback abriu!");
						    },
						    onClosing: function(instance, toast, closedBy){
						        console.info("closedBy: " + closedBy); // tells if it was closed by "drag" or "button"
						    }
						});
		                </script> ');
		    }else{
		    $this->CI->session->set_flashdata('simpan',
						'<script>
						var nm= ""
						iziToast.show({
						    theme: "dark",
						    icon: "fa fa-user",
						    title: "Hallo!",
						    message: "Selamat Datang!"+nm,
						    position: "topRight",
						    transitionIn: "bounceInLeft",
						    progressBarColor: "rgb(0, 255, 184)",
						  
						    onOpening: function(instance, toast){
						        console.info("callback abriu!");
						    },
						    onClosing: function(instance, toast, closedBy){
						        console.info("closedBy: " + closedBy); // tells if it was closed by "drag" or "button"
						    }
						});
		                </script> ');
		    }
			


			
			redirect(base_url('mhs/dasbor'),'refresh');

		}else{
			//jika tidak ada data
			$this->CI->session->set_flashdata('salah', 'Username Atau Password Kamu Salah');
			redirect(base_url('home/login'),'refresh');
		}
	}
	
	//fungsi cek login
	public function cek_login()
	{
		//periksa apakah session sudah ada atau belum
		if ($this->CI->session->userdata('MhsNim') == "") 
		{
			$this->CI->session->set_flashdata('relog', 'Kamu Belum Login');
			redirect(base_url('home'),'refresh');
		}

	}

	//fungsi logout
	public function logout()
	{
		$this->CI->session->unset_userdata('MhsNim');
		$this->CI->session->unset_userdata('MhsNama');
		$this->CI->session->unset_userdata('MhsNohp');
		$this->CI->session->unset_userdata('MhsEmail');
		//redirek login
		$this->CI->session->set_flashdata('logout', 'Kamu Berhasil Logout');
		redirect(base_url('home/login'),'refresh');
	}


}

/* End of file Login_user */
/* Location: ./application/libraries/Login_user */

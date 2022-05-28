<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('profil_model');
	}

public function index()
	{ 

		$id_secure		=  $this->session->userdata('UserId');
		$secure 		=  $this->profil_model->profil_secure($id_secure);
		$user		    =  $this->profil_model->profil_user($id_secure);
		
		$valid = $this->form_validation;
		$valid->set_rules('nama','Nama','required',
		array(	'required'	=> '<script> 	
								iziToast.warning({
                          		title    : "Perhatian",
                          		message  : "Kolom %s  Harus Di Isi!",});
                				</script> ' ));

		$valid->set_rules('nohp','NO HP','required|min_length[11]|max_length[13]',
			array('required'   => '<script> 	
								  iziToast.warning({
                          		  title    : "Perhatian",
                          		  message  : "Kolom %s  Harus Di Isi!",});
                				  </script> ',
				  'min_length' => '<script> 	
								  iziToast.warning({
                          		  title    : "Perhatian",
                          		  message  : "%s Minimal 11 Karakter!",});
                				  </script> ',
				  'max_length' => '<script> 	
								  iziToast.warning({
                          		  title    : "Perhatian",
                          		  message  : "%s Maximal 13 karakter!",});
                				  </script> '));

 		if($valid->run()===FALSE){
		//end validasi

		$data = array ( 'title' 	=> 'Data Diri',
						'secure'	=> $secure,
						'user'		=> $user,
 						'isi'		=> 'secure/profil/list'
 					);
 		$this->load->view('secure/layout/wrapper', $data, FALSE);
		}else{
			
			if (isset($_POST['submit'])){
                    $config['upload_path']          = './assets/upload/profil/dosen';
                    $config['allowed_types']        = 'jpg|png|jpeg';
                    $config['max_size']               = 2048;
                    $config['max_width']              = 2048;
                    $config['max_height']             = 2048;
                    $config['encrypt_name']           = TRUE;
                    $this->load->library('upload', $config);

                    //file foto
                    if (!empty($_FILES['foto']['name'])) {
                       $this->upload->do_upload('foto');
                       $data1 = $this->upload->data();
                       $foto= $data1['file_name'];
 					   $i    = $this->input;
                   $data = array ( 
                      		'DosenFoto'		=> $foto,
							'DosenNama'    	=> $i->post('nama'),
							'DosenAlamat'   => $i->post('alamat'),
							'DosenEmail'    => $i->post('email'),
							'DosenNohp'    	=> $i->post('nohp'));

					$this->db->where('DosenId',$id_secure);
					$this->db->update('tdosen', $data);

					$data2 = array ('UserUsername' => $i->post('username'));
					$this->db->where('UserId',$id_secure);
					$this->db->update('tuser', $data2);
                    }

                     if (empty($_FILES['foto']['name'])) {
                      $i    = $this->input;
                      $data = array ( 
                      		
							'DosenNama'    	=> $i->post('nama'),
							'DosenAlamat'   => $i->post('alamat'),
							'DosenEmail'    => $i->post('email'),
							'DosenNohp'    	=> $i->post('nohp'));

					$this->db->where('DosenId',$id_secure);
					$this->db->update('tdosen', $data);

					$data2 = array ('UserUsername' => $i->post('username'));
					$this->db->where('UserId',$id_secure);
					$this->db->update('tuser', $data2);
                     }
		$this->session->set_flashdata('edit',
				'<script> 	iziToast.info ({
                          	title    : "OK",
                          	message  : "Data Berhasil Di Ubah!",});
                </script> ');
		redirect(base_url('secure/profil'),'refresh');
	}


			$this->session->set_flashdata('simpan',
					'<script> 	iziToast.success ({
	                          	title    : "OK",
	                          	message  : "Data Berhasil DiSimpan!",});
	                </script> ');
			redirect(base_url('secure/profil'),'refresh');
		}
	//end masuk database
	}

	public function ubah_password()
	{
		$id_secure		=  $this->session->userdata('UserId');
		$secure 		=  $this->profil_model->profil_secure($id_secure);
		$user		=  $this->profil_model->profil_user($id_secure);
		$valid = $this->form_validation;

		$valid->set_rules('pwbaru', 'Password Baru', 'required',
		array(	'required'	=> '<script> 	
								iziToast.warning({
                          		title    : "Perhatian",
                          		message  : "Kolom %s  Harus Di Isi!",});
                				</script> ' ));

		$valid->set_rules('pwbaru2', 'Password Konfirmasi', 'required|matches[pwbaru]',
		array(	'required'	=> '<script> 	
								iziToast.warning({
                          		title    : "Perhatian",
                          		message  : "Kolom %s  Harus Di Isi!",});
                				</script> ',
               'matches' => '<script> 	
								  iziToast.warning({
                          		  title    : "Perhatian",
                          		  message  : "Harap cek password Konfirmasi kamu !",});
                				  </script> ', ));


		if($valid->run()===FALSE){
		//end validasi

		$data = array ( 'title' 	=> 'Data Diri',
						'secure'	=> $secure,
						'user'		=> $user,
 						'isi'		=> 'secure/profil/list'
	                   );
		$this->load->view('secure/layout/wrapper', $data, FALSE);

		}else{

			$i    = $this->input;
			$data = array ( 
							'UserPassword'    		=> SHA1($i->post('pwbaru')),
			
			);
			$this->db->where('UserId',$id_secure);
			$this->db->update('tuser', $data);
			$this->session->set_flashdata('edit',
					'<script> 	iziToast.info ({
	                          	title    : "OK",
	                          	message  : "Password Berhasil Di Ubah!",});
	                </script> ');
			redirect(base_url('secure/profil'),'refresh');
		}

	}

}

/* End of file Profil.php */
/* Location: ./application/controllers/secure/Profil.php */


	
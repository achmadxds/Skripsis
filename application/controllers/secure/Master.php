<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('master_model');
	}

	public function index()
	{
		$data = array ( 'title' 	=> 'Halaman Utama',
 						'isi'		=> 'secure/master/dosen'
 					);
 		$this->load->view('secure/layout/wrapper', $data, FALSE);
	}



//////////////////////////// DOSEN //////////////////////////////
	public function dosen()
	{
		$dosen = $this->master_model->listing_dosen();
		$edit  = $this->master_model->edit_dosen(); 

		$data = array(	'title' 	=> 'Data Dosen',
						'dosen'		=> $dosen,
						'edit'		=> $edit,
						'isi'		=> 'secure/master/dosen'
					 );
		$this->load->view('secure/layout/wrapper', $data, FALSE);
	}

	public function tambah_dosen()
	{
		//validasi input
		$valid = $this->form_validation;

		$this->form_validation->set_rules('nidn', 'NIDN', 'required',
		array(	'required'	=> '<script> 	
								iziToast.warning({
                          		title    : "Perhatian",
                          		message  : "Kolom %s  Harus Di Isi!",});
                				</script> ' ));

		//end validasi
		if($valid->run()===FALSE){
		$this->dosen();

		}else
	    {

			$i = $this->input;
			$data = array ( 
				'DosenNIDN'   		=> $i->post('nidn'),
				'DosenNama'			=> $i->post('nama'),
				'DosenAlamat'     	=> $i->post('alamat'),
				'DosenNohp'    		=> $i->post('nohp'),
				'DosenEmail'    	=> $i->post('email')
				
			);
			$this->db->insert('tdosen', $data);

			$sql ="SELECT MAX(DosenId) FROM tdosen"; 
			$newid = $this->db->query($sql)->row_array();

			$data2 = array ( 
				'UserId'   		    => $newid['MAX(DosenId)'],
				'UserUsername'		=> $i->post('nidn'),
				'UserPassword'     	=> SHA1($i->post('nidn')),
				'UserLevelAktif'    => 'dosen',
				'UserStatus'    	=> 1
				
			);
			$this->db->insert('tuser', $data2);


			$this->session->set_flashdata('simpan',
				'<script> 	iziToast.success ({
                          	title    : "OK",
                          	message  : "Data Berhasil DiSimpan!",});
                </script> ');
			redirect(base_url('secure/master/dosen'),'refresh');
		}
	}

	public function edit_dosen()
	{
			$valid = $this->form_validation;

			$this->form_validation->set_rules('nidn', 'NIDN', 'required',
			array(	'required'	=> '<script> 	
									iziToast.warning({
	                          		title    : "Perhatian",
	                          		message  : "Kolom %s  Harus Di Isi!",});
	                				</script> ' ));

	 		if($valid->run()){
	 		$i = $this->input;
			$data = array ( 
				'DosenNidn'   		=> $i->post('nidn'),
				'DosenNama'			=> $i->post('nama'),
				'DosenAlamat'     	=> $i->post('alamat'),
				'DosenNohp'    		=> $i->post('nohp'),
				'DosenEmail'    	=> $i->post('email')
				
			);
			
			$id = $this->input->post('id');
			$decrypt_id     = $this->enkripsi->decrypt_url($id);
			$this->db->where('DosenId',$decrypt_id);
			$this->db->update('tdosen', $data);
			$this->session->set_flashdata('edit',
				'<script> 	iziToast.info ({
                          	title    : "OK",
                          	message  : "Data Berhasil Di Ubah!",});
                </script> ');
			redirect(base_url('secure/master/dosen'),'refresh');
			}else{
			redirect(base_url('secure/master/dosen'),'refresh');
		}
	}


	public function hapus_dosen($id_dosen)
	{
			$decrypt_id = $this->enkripsi->decrypt_url($id_dosen);
			$this->db->where('DosenId', $decrypt_id);
			$this->db->delete('tdosen');
			$this->session->set_flashdata('hapus',
				'<script> 	iziToast.success ({
                          	title    : "OK",
                          	message  : "Data Berhasil Di Hapus!",});
                </script> ');
			redirect(base_url('secure/master/dosen'),'refresh');
	}

////////////////////Kaprodi//////////////////////////////

	public function kaprodi()
	{
		$dosen= $this->master_model->listing_dosen();
		$kaprodi = $this->master_model->listing_kaprodi();
		$riwayat = $this->master_model->riwayat_kaprodi();
		$ganti_kaprodi= $this->master_model->ganti_kaprodi();
		$data = array(  'title'   => 'Data Kaprodi',
						'dosen'   => $dosen,
						'kaprodi' => $kaprodi,
						'riwayat' => $riwayat,	
						'ganti_kaprodi' => $ganti_kaprodi,
						'isi'     => 'secure/master/kaprodi'
		);
		$this->load->view('secure/layout/wrapper', $data, FALSE);
	}

	public function ganti_kaprodi()
	{
			$id = $this->input->post('kaprodi');
			$decrypt_id     = $this->enkripsi->decrypt_url($id);
			$this->db->where('Iduser', $decrypt_id);
			$this->db->where('Namalevel','kaprodi');
			$this->db->delete('tauth');

			$data = array ( 	
							'Iduser'    =>  $this->enkripsi->decrypt_url($this->input->post('dosen')),
							'Namalevel' => 'kaprodi'
				          );
			$this->db->insert('tauth', $data);

			$data2 = array ( 	
							'UserLevelAktif' => 'dosen'
				          );
			$this->db->where('UserId',$decrypt_id);
			$this->db->update('tuser', $data2);

			$this->session->set_flashdata('simpan',
				'<script> 	iziToast.success ({
                          	title    : "OK",
                          	message  : "Kaprodi Berhasil Di Ganti !",});
                </script> ');
			redirect(base_url('secure/master/kaprodi'),'refresh');
	}


////////////////////////Koordinator///////////////
	public function koordinator()
	{
		$dosen= $this->master_model->listing_dosen();
		$koordinator = $this->master_model->listing_koordinator();
		$riwayat = $this->master_model->riwayat_koordinator();
		$ganti_koordinator = $this->master_model->ganti_koordinator();
		$data = array(  'title'   => 'Data Koordinator',
						'dosen'   => $dosen,
						'koordinator' => $koordinator,
						'riwayat'	=> $riwayat,
						'ganti_koordinator' => $ganti_koordinator,
						'isi'     => 'secure/master/koordinator'
		);
		$this->load->view('secure/layout/wrapper', $data, FALSE);
	}

	public function ganti_koordinator()
	{
			$id = $this->input->post('koordinator');
			$decrypt_id     = $this->enkripsi->decrypt_url($id);
			$this->db->where('Iduser', $decrypt_id);
			$this->db->where('Namalevel','koordinator');
			$this->db->delete('tauth');

			$data1 = array ( 	
							'Iduser'    =>  $this->enkripsi->decrypt_url($this->input->post('dosen')),
							'Namalevel' => 'koordinator'
				          );
			$this->db->insert('tauth', $data1);

			$data2 = array ( 	
							'UserLevelAktif' => 'dosen'
				          );
			$this->db->where('UserId',$decrypt_id);
			$this->db->update('tuser', $data2);

			$this->session->set_flashdata('simpan',
				'<script> 	iziToast.success ({
                          	title    : "OK",
                          	message  : "Koordinator Berhasil Di Ganti !",});
                </script> ');
			redirect(base_url('secure/dasbor/dosen'));
	}


//////////////////////////////////// MHS //////////////////////////////////////////
	public function mahasiswa()
	{
		$mhs  = $this->master_model->listing_mhs();
		$edit = $this->master_model->edit_mhs();
		$data = array(	'title' 	=> 'Data Mahasiswa',
						'mhs'		=> $mhs,
						'edit'		=> $edit,
						'isi'		=> 'secure/master/mahasiswa'
					 );
		$this->load->view('secure/layout/wrapper', $data, FALSE);
	}

	public function tambah_mahasiswa()
	{
		//validasi input
		$valid = $this->form_validation;

		$this->form_validation->set_rules('nim', 'NIM', 'required',
		array(	'required'	=> '<script> 	
								iziToast.warning({
                          		title    : "Perhatian",
                          		message  : "Kolom %s  Harus Di Isi!",});
                				</script> ' ));

		//end validasi
		if($valid->run()===FALSE){
		$this->mahasiswa();

		}else
	    {

			$i = $this->input;
			$data = array ( 
				'MhsNim'   		=> $i->post('nim'),
				'MhsNama'	    => $i->post('nama'),
				'MhsAlamat'     => $i->post('alamat'),
				'MhsNohp'       => $i->post('nohp'),
				'MhsEmail'      => $i->post('email'),
				'MhsStatus'     => 0
				
			);
			$this->db->insert('tmhs', $data);
			$this->session->set_flashdata('simpan',
				'<script> 	iziToast.success ({
                          	title    : "OK",
                          	message  : "Data Berhasil DiSimpan!",});
                </script> ');
			redirect(base_url('secure/master/mahasiswa'),'refresh');
		}
	}

	public function edit_mahasiswa()
	{
			$valid = $this->form_validation;

			$this->form_validation->set_rules('nim', 'NIM', 'required',
			array(	'required'	=> '<script> 	
									iziToast.warning({
	                          		title    : "Perhatian",
	                          		message  : "Kolom %s  Harus Di Isi!",});
	                				</script> ' ));

	 		if($valid->run()){
	 		$i = $this->input;
			$data = array ( 
				'MhsNim'   		=> $i->post('nim'),
				'MhsNama'	    => $i->post('nama'),
				'MhsAlamat'     => $i->post('alamat'),
				'MhsNohp'       => $i->post('nohp'),
				'MhsEmail'      => $i->post('email'),
				'MhsStatus'     => 0
				
			);
			
			$id = $this->input->post('id');
			$decrypt_id     = $this->enkripsi->decrypt_url($id);
			$this->db->where('MhsNim',$decrypt_id);
			$this->db->update('tmhs', $data);
			$this->session->set_flashdata('edit',
				'<script> 	iziToast.info ({
                          	title    : "OK",
                          	message  : "Data Berhasil Di Ubah!",});
                </script> ');
			redirect(base_url('secure/master/mahasiswa'),'refresh');
			}else{
			redirect(base_url('secure/master/mahasiswa'),'refresh');
		}
	}

	public function acc_mahasiswa($id_mhs)
		{
			$data = array (
				'MhsStatus'     => 1
				
			);
			
			
			$decrypt_id     = $this->enkripsi->decrypt_url($id_mhs);
			$mhs=$this->db->query("SELECT * from tmhs where MhsNim='$decrypt_id'")->row_array();
			$nomorwa= $mhs['MhsNohp'];
			$isipesan= '_________ PORTAL SKRIPSI SI _________

Selamat Pendaftaran Akun Kamu Diterima !';
			$this->db->where('MhsNim',$decrypt_id);
			$this->db->update('tmhs', $data);
			$this->wa->kirimWablas($nomorwa,$isipesan);
			$this->session->set_flashdata('acc',
				'<script> 	iziToast.success ({
                          	title    : "OK",
                          	message  : "Data Berhasil Di Setujui !",});
                </script> ');

			redirect(base_url('secure/master/mahasiswa'),'refresh');

		}

	public function hapus_mahasiswa($id_mhs)
		{
			$decrypt_id = $this->enkripsi->decrypt_url($id_mhs);
			$this->db->where('MhsNim', $decrypt_id);
			$this->db->delete('tmhs');
			$this->session->set_flashdata('hapus',
				'<script> 	iziToast.success ({
                          	title    : "OK",
                          	message  : "Data Berhasil Di Hapus!",});
                </script> ');
			redirect(base_url('secure/master/mahasiswa'),'refresh');
		}

//////////////////////////// Operator //////////////////////////////
	public function operator()
	{
		$operator  = $this->master_model->listing_operator();
		$edit_operator  = $this->master_model->edit_operator();
		$data = array(	'title' 	=> 'Data Operator',
						'operator'	=> $operator,
						'edit_operator'	=> $edit_operator,
						'isi'		=> 'secure/master/operator'
					 );
		$this->load->view('secure/layout/wrapper', $data, FALSE);
	}

	public function tambah_operator()
	{
		//validasi input
		$valid = $this->form_validation;

		$this->form_validation->set_rules('nim', 'NIM', 'required',
		array(	'required'	=> '<script> 	
								iziToast.warning({
                          		title    : "Perhatian",
                          		message  : "Kolom %s  Harus Di Isi!",});
                				</script> ' ));

		//end validasi
		if($valid->run()===FALSE){
		$this->operator();
		}else
	    {

			$i = $this->input;
			$data = array ( 
				'DosenNidn'   		=> $i->post('nim'),
				'DosenNama'			=> $i->post('nama'),
				'DosenAlamat'     	=> $i->post('alamat'),
				'DosenNohp'    		=> $i->post('nohp'),
				'DosenEmail'    	=> $i->post('email')
			);
			$this->db->insert('tdosen', $data);

			$sql ="SELECT MAX(DosenId) FROM tdosen"; 
			$newid = $this->db->query($sql)->row_array();
			
			$data2 = array ( 
				'UserId'   		    => $newid['MAX(DosenId)'],
				'UserUsername'		=> $i->post('nim'),
				'UserPassword'     	=> SHA1($i->post('nim')),
				'UserLevelAktif'    => 'operator',
				'UserStatus'    	=> 1
			);
			$this->db->insert('tuser', $data2);

			$data3 = array ( 
				'Iduser'   		=> $newid['MAX(DosenId)'],
				'Namalevel'		=> 'operator'
			);
			$this->db->insert('tauth', $data3);
			$this->session->set_flashdata('simpan',
				'<script> 	iziToast.success ({
                          	title    : "OK",
                          	message  : "Data Berhasil DiSimpan!",});
                </script> ');
			redirect(base_url('secure/master/operator'),'refresh');
		}
	}

	public function edit_operator()
	{
			$valid = $this->form_validation;

			$this->form_validation->set_rules('nim', 'NIM', 'required',
			array(	'required'	=> '<script> 	
									iziToast.warning({
	                          		title    : "Perhatian",
	                          		message  : "Kolom %s  Harus Di Isi!",});
	                				</script> ' ));

	 		if($valid->run()){
	 		$i = $this->input;
			$data = array ( 
				'DosenNidn'   		=> $i->post('nim'),
				'DosenNama'			=> $i->post('nama'),
				'DosenAlamat'     	=> $i->post('alamat'),
				'DosenNohp'    		=> $i->post('nohp'),
				'DosenEmail'    	=> $i->post('email')
				
			);
			
			$id = $this->input->post('id');
			$decrypt_id     = $this->enkripsi->decrypt_url($id);
			$this->db->where('DosenId',$decrypt_id);
			$this->db->update('tdosen', $data);
			$this->session->set_flashdata('edit',
				'<script> 	iziToast.info ({
                          	title    : "OK",
                          	message  : "Data Berhasil Di Ubah!",});
                </script> ');
			redirect(base_url('secure/master/operator'),'refresh');
			}else{
			redirect(base_url('secure/master/operator'),'refresh');
		}
	}

}

/* End of file Master.php */
/* Location: ./application/controllers/secure/Master.php */
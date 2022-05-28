<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bimbingan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('bimbingan_model');
	}
        //bagi dosbing untuk list field
		public function tampil()
	  	{
	    $id = $this->input->post('dosbing1');
	    $data = $this->bimbingan_model->notlist($id);
	    echo json_encode($data);
	 	}

// Pembagian Dosbing
		public function bagi_dosbing()
	{
		// jika butuh //$periode    = periode_aktif();
		$mhs_belum  = $this->bimbingan_model->mhs_belum();
		$mhs_sudah  = $this->bimbingan_model->mhs_sudah();
		$tambah 	= $this->bimbingan_model->tambah_dosbing();
		$edit 		= $this->bimbingan_model->edit_dosbing();
		$data = array( 'title'  	=> 'Halaman Pembagian Dosen Pembimbing',
					   'mhs_belum'	=> $mhs_belum,
					   'mhs_sudah'	=> $mhs_sudah,
					   'tambah'		=> $tambah,
					   'edit'		=> $edit,
					   'ajax'		=> '<script src="' . base_url() . 'assets/js/koordinator/pilih_dosen.js"></script>',
					   'isi'    	=> 'secure/bimbingan/bagi_dosbing'
		);
		$this->load->view('secure/layout/wrapper', $data, FALSE);
	}

	public function edit_dosbing()
	{
		$valid = $this->form_validation;

			$this->form_validation->set_rules('dosbing1', 'DOSBING 1', 'required',
			array(	'required'	=> '<script> 	
									iziToast.warning({
	                          		title    : "Perhatian",
	                          		message  : "Kolom %s  Harus Di Isi!",});
	                				</script> ' ));

	 		if($valid->run()){
	 		$i = $this->input;
			$data = array ( 
				'DosbingsDosenId1'    => $this->enkripsi->decrypt_url($i->post('dosbing1')),
				'DosbingsDosenId2'    => $this->enkripsi->decrypt_url($i->post('dosbing2')),
				'DosbingsPeriodeId'   => $periode['PeriodesId'],
				'DosbingsTgl'         => date('d-m-y')
				
			);
			
			$id = $this->input->post('id');
			$decrypt_id     = $this->enkripsi->decrypt_url($id);
			$this->db->where('DosbingsDaftarsId',$decrypt_id);
			$this->db->update('tdosbings', $data);
			$this->session->set_flashdata('simpan',
				'<script> 	iziToast.info ({
                          	title    : "OK",
                          	message  : "Data Berhasil Di Ubah!",});
                </script> ');
			redirect(base_url('secure/bimbingan/bagi_dosbing'));
			}else{
			redirect(base_url('secure/bimbingan/bagi_dosbing'));
		}
	}


	public function tambah_dosbing()
	{
		$periode=periode_aktif();
		//validasi input
		$valid = $this->form_validation;

		$this->form_validation->set_rules('dosbing1', 'DOSBING 1', 'required',
		array(	'required'	=> '<script> 	
								iziToast.warning({
                          		title    : "Perhatian",
                          		message  : "Kolom %s  Harus Di Isi!",});
                				</script> ' ));

		//end validasi
		if($valid->run()){
		$i = $this->input;
			$data = array   ( 

				'DosbingsDaftarsId'   => $this->enkripsi->decrypt_url($i->post('id')),
				'DosbingsDosenId1'    => $this->enkripsi->decrypt_url($i->post('dosbing1')),
				'DosbingsDosenId2'    => $this->enkripsi->decrypt_url($i->post('dosbing2')),
				'DosbingsPeriodeId'   => $periode['PeriodesId'],
				'DosbingsTgl'         => date('d-m-Y')
								
							);
			
			$this->db->insert('tdosbings', $data);
			$d1= $this->enkripsi->decrypt_url($i->post('dosbing1'));
			$d2= $this->enkripsi->decrypt_url($i->post('dosbing2'));
			$p1=$this->db->query("SELECT * from tdosen where DosenId='$d1'")->row_array();
			$p2=$this->db->query("SELECT * from tdosen where DosenId='$d2'")->row_array();
			$utama=$p1['DosenNama'];
			$pendamping=$p2['DosenNama'];


			$id_daftar=$this->enkripsi->decrypt_url($i->post('id'));
			$mhs=$this->db->query("SELECT * from tmhs
								   join tdaftars on tdaftars.DaftarsNIM=tmhs.MhsNim
								   where DaftarsId='$id_daftar'")->row_array();
			$nomorwa= $mhs['MhsNohp'];
			$isipesan= "_________ PORTAL SKRIPSI SI _________

Selamat kamu sudah dapat dosen Pembimbing !
Dosen utama: '$utama'
Dosen Pendamping : '$pendamping' ";
			$this->wa->kirimWablas($nomorwa,$isipesan);

			$this->session->set_flashdata('simpan',
				'<script> 	iziToast.success ({
                          	title    : "OK",
                          	message  : "Data Berhasil DiSimpan!",});
                </script> ');
			redirect(base_url('secure/bimbingan/bagi_dosbing'));

		}else{
			$this->session->set_flashdata('hapus',
				'<script> 	iziToast.error ({
                          	title    : "error",
                          	message  : "Data tidak Berhasil DiSimpan!",});
                </script> ');
			redirect(base_url('secure/bimbingan/bagi_dosbing'));
			
		}
	}

//Bimbingan
	public function mahasiswa()
	{   
		//$periode   = periode_aktif();
		$id_dosen  = $this->session->userdata('UserId');
		$mhs       = $this->bimbingan_model->listing_mhs_bimbingan($id_dosen);
		$mhs2       = $this->bimbingan_model->listing_mhs_bimbingan($id_dosen);
		$detail    = $this->bimbingan_model->detail_bimbingan($id_dosen);
		
		$data      = array( 'title'  	=> 'Halaman Mahasiswa Bimbingan',
						    'mhs'		=> $mhs,
						    'mhs2'		=> $mhs2,
						    'detail'	=> $detail,
						    'isi'    	=> 'secure/bimbingan/mahasiswa'
		);
		$this->load->view('secure/layout/wrapper', $data, FALSE);
	}

	public function proses_bimbingan()
	{
		$periode = periode_aktif();
		$id_dosen  = $this->session->userdata('UserId');
		$bimbingan_belum = $this->bimbingan_model->bimbingan_belum($id_dosen,$periode['PeriodesId']);
		$bimbingan_sudah = $this->bimbingan_model->bimbingan_sudah($id_dosen,$periode['PeriodesId']);
		$balasan = $this->bimbingan_model->balas_bimbingan($id_dosen);
		$edit_balasan = $this->bimbingan_model->edit_balas_bimbingan($id_dosen);
		$data = array( 'title'  	=> 'Halaman Bimbingan',
					   'bimbingan_belum'	=> $bimbingan_belum,
					   'bimbingan_sudah'	=> $bimbingan_sudah,
					   'balasan'	=> $balasan,
					   'edit_balasan' => $edit_balasan,
					   'isi'    	=> 'secure/bimbingan/bimbingan'
		);
		$this->load->view('secure/layout/wrapper', $data, FALSE);
	}

	public function balas_bimbingan()
	{
		if (empty($_FILES['file']['name'])) {
			$this->session->set_flashdata('hapus',
				'<script> 	iziToast.error ({
                          	title    : "error",
                          	message  : "File Bimbingan Harus Diisi",});
                </script> ');
		}

		//end validasi
		if (isset($_POST['submit'])){
			$config['upload_path']          = './assets/upload/bimbingan';
                    $config['allowed_types']        = 'jpg|png|pdf|docx|rar';
                    $config['max_size']               = 2048;
                    $config['max_width']              = 2048;
                    $config['max_height']             = 2048;
                    $config['encrypt_name']           = TRUE;
                    $this->load->library('upload', $config);

                   if (!empty($_FILES['file']['name'])) {
                       $this->upload->do_upload('file');
                       $data1 = $this->upload->data();
                       $file= $data1['file_name'];

                       $i = $this->input;
					   $data = array (
					'BimbingansBalasanFile'		=> $file,
					'BimbingansBalasanTgl'		=> date('Y-m-d'),
					'BimbingansStatus'			=> $i->post('status'),
					'BimbingansBalasanKet'		=> $i->post('ket')
						);
						
						$id = $this->input->post('id');
						$decrypt_id  = $this->enkripsi->decrypt_url($id);
						$this->db->where('BimbingansId',$decrypt_id);
			            $this->db->update('tbimbingans', $data);

			            $bimbingan=$this->db->query("SELECT * from tbimbingans where BimbingansId='$decrypt_id'")->row_array();
			            $id_mhs=$bimbingan['BimbingansMhsNim'];
			            $mhs=$this->db->query("SELECT * from tmhs where MhsNim='$id_mhs'")->row_array();
			            $mhs_nama= $mhs['MhsNama'];
			            $nomorwa= $mhs['MhsNohp'];
			            $id_dosen= $this->session->userdata('UserId');
			            $dosen=$this->db->query("SELECT * from tdosen where DosenId='$id_dosen'")->row_array();
			            $dosen_nama= $dosen['MhsNama'];
			            $isipesan= "_________ PORTAL SKRIPSI SI _________

Halo, '$mhs_nama' bimbingan kamu sudah di balas Bpk/Ibu '$dosen_nama' ! Segera cek ya ";
						$this->wa->kirimWablas($nomorwa,$isipesan);

			            $this->session->set_flashdata('simpan',
						'<script> 	iziToast.success ({
		                          	title    : "OK",
		                          	message  : "Data Berhasil DiSimpan!",});
		                </script> ');
					}

					redirect(base_url('secure/bimbingan/proses_bimbingan'));
			
			}else{
				    $this->session->set_flashdata('error',
						'<script> 	iziToast.success ({
		                          	title    : "Error",
		                          	message  : "Data Tidak Berhasil DiSimpan!",});
		                </script> ');
					redirect(base_url('secure/bimbingan/proses_bimbingan'));
			}
	}



}

/* End of file Bimbingan.php */
/* Location: ./application/controllers/secure/Bimbingan.php */
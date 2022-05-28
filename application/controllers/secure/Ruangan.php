<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ruangan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ruangan_model');
	}

	public function index()
	{

		$ruang = $this->ruangan_model->listing_ruang();
		$edit = $this->ruangan_model->edit();
		$data = array(  'title'   => 'Halaman Ruangan',
						'ruang'   => $ruang,
						'edit'   => $edit,
						'isi'     => 'secure/ruangan/list'
		);
		$this->load->view('secure/layout/wrapper', $data, FALSE);
	}



	public function tambah()
	{
		//validasi input
		$valid = $this->form_validation;
		$this->form_validation->set_rules('nama', 'Nama Ruangan', 'required|is_unique[truang.RuangNama]',
		array(	'required'	=> '<script> 	
								iziToast.warning({
                          		title    : "Perhatian",
                          		position : "topRight",
                          		message  : "Kolom %s  Harus Di Isi!",});
                				</script> ',
                'is_unique'	=> '<script> 	
								iziToast.warning({
                          		title    : "Perhatian",
                          		position : "topRight",
                          		message  : "%s sudah ada. Silahkan Masukkan Ruangan Lain.",});
                				</script> ' ));

		//end validasi
		if($valid->run()===FALSE){
		$this->index();

		}else{

			$i = $this->input;
			$data = array   ( 

								'RuangNama'			=> $i->post('nama')
								
							);
			// print_r($data);
			// exit();
			$this->db->insert('truang', $data);
			$this->session->set_flashdata('simpan',
				'<script> 	iziToast.success ({
                          	title    : "OK",
                          	message  : "Data Berhasil DiSimpan!",});
                </script> ');
			redirect(base_url('secure/ruangan'));
		}
	}


	public function edit()
		{
			$valid = $this->form_validation;
			$this->form_validation->set_rules('nama', 'Nama Ruangan', 'required',
			array(	'required'	=> '<script> 	
								iziToast.warning({
                          		title    : "Perhatian",
                          		message  : "Kolom %s  Harus Di Isi!",});
                				</script> ' ));

	 		if($valid->run()){
	 		$i = $this->input;
			$data = array     ( 	
									'RuangNama'			=> $i->post('nama')
				               );
			
			$id = $this->input->post('id');
			$decrypt_id     = $this->enkripsi->decrypt_url($id);
			$this->db->where('RuangId',$decrypt_id);
			$this->db->update('truang', $data);
			$this->session->set_flashdata('edit',
				'<script> 	iziToast.info ({
                          	title    : "OK",
                          	message  : "Data Berhasil Di Ubah!",});
                </script> ');
			redirect(base_url('secure/ruangan'),'refresh');
			}else{
			$this->index();
		}
		//end masuk database
		}

	public function hapus($id_ruang)
		{
        	
        	$decrypt_id     = $this->enkripsi->decrypt_url($id_ruang);
			$this->db->where('RuangId', $decrypt_id);
			$this->db->delete('truang');
			$this->session->set_flashdata('hapus',
				'<script> 	iziToast.success ({
                          	title    : "OK",
                          	message  : "Data Berhasil Di Hapus!",});
                </script> ');
			redirect(base_url('secure/ruangan'));
		}

}

/* End of file Ruangan.php */
/* Location: ./application/controllers/secure/Ruangan.php */
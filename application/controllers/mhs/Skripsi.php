<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Skripsi extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model('skripsi_model');
	}

	///////judul///////
	public function Judul_skripsi()
	{
		$id_mhs      =  $this->session->userdata('MhsNim');
		$skripsi     =  $this->skripsi_model->list_skripsi($id_mhs);
		$data = array(
			'title' 	=> 'Halaman Judul',
			'skripsi'	=> $skripsi,
			'isi'		=> 'mhs/skripsi/judul_skripsi'
		);
		$this->load->view('mhs/layout/wrapper', $data, FALSE);
	}

	public function ubah_judul()
	{
		//validasi input
		$valid = $this->form_validation;

		$this->form_validation->set_rules(
			'judul',
			'Judul Skripsi',
			'required',
			array('required'	=> '<script> 	
								iziToast.warning({
                          		title    : "Perhatian",
                          		message  : "Kolom %s  Harus Di Isi!",});
                				</script> ')
		);

		//end validasi
		if ($valid->run()) {

			$i = $this->input;
			$data = array(
				'SkripsiJudul'   => $i->post('judul')
			);
			$id_skripsi = $this->enkripsi->decrypt_url($this->input->post('skripsi'));
			$this->db->where('SkripsiId', $id_skripsi);
			$this->db->update('tskripsi', $data);


			$this->session->set_flashdata(
				'simpan',
				'<script> 	iziToast.success ({
                          	title    : "OK",
                          	message  : "Data Berhasil DiSimpan!",});
                </script> '
			);
			redirect(base_url('mhs/skripsi/judul_skripsi'));
		} else {
			$this->Judul_skripsi();
		}
	}

	//////bebas skripsi/////
	public function bebas_prodi()
	{
		$mhs = $this->session->userdata('MhsNim');
		$cek_sidang = $this->skripsi_model->cek_sidang_lulus($mhs);
		$detail = $this->skripsi_model->detail_bebas_skripsi($mhs);
		$data = array(
			'title' 	=> 'Halaman Upload Berkas Bebas Skripsi',
			'cek_sidang' => $cek_sidang,
			'detail'		=> $detail,
			'isi'	=> 'mhs/skripsi/bebas_prodi'
		);
		$this->load->view('mhs/layout/wrapper', $data, FALSE);
	}


	public function upload_bebas_prodi()
	{
		$periode = periode_aktif();
		if (isset($_POST['submit'])) {
			$config['upload_path']          = './assets/upload/pendaftaran/bebas_prodi';
			$config['allowed_types']        = 'gif|jpg|png|pdf|rar';
			$config['max_size']               = 2048;
			$config['max_width']              = 2048;
			$config['max_height']             = 2048;
			$config['encrypt_name']           = TRUE;
			$this->load->library('upload', $config);

			//file bebas_prodi
			if (!empty($_FILES['bebas_prodi']['name'])) {
				$this->upload->do_upload('bebas_prodi');
				$data1 = $this->upload->data();
				$bebas_prodi = $data1['file_name'];
				$data = array(
					'SkripsiBebasProdi' => $bebas_prodi,
					'SkripsiPeriodeId' => $periode['PeriodesId'],
					'SkripsiStatus'    => 0
				);
				$this->db->where('SkripsiMhsNim', $this->session->userdata('MhsNim'));
				$this->db->update('tskripsi', $data);
			}

			$this->session->set_flashdata(
				'simpan',
				'<script>   iziToast.success ({
                                title    : "OK",
                                message  : "Data Berhasil DiSimpan!",});
                    </script> '
			);
			redirect(base_url('mhs/skripsi/bebas_prodi'));
		} else {
			$this->session->set_flashdata(
				'hapus',
				'<script>   iziToast.error ({
                              title    : "error",
                              message  : "Data Harus Didisi!",
                              position : "topRight"});
                  </script> '
			);
			redirect(base_url('mhs/pendaftaran/daftar_skripsi'));
		}
	}
}

/* End of file Skripsi.php */
/* Location: ./application/controllers/mhs/Skripsi.php */
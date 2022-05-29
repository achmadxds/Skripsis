<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pendaftaran_model');
	}

	/////////////////SKRIPSI///////////////
	public function daftar_skripsi()
	{

		// jika butuh periode// $periode     = periode_aktif();
		$pendaftaran = $this->pendaftaran_model->list_daftar_skripsi();
		$list_daftar      = $pendaftaran;
		$cek_daftar       = $pendaftaran;
		$ket_daftar       = $pendaftaran;
		$data = array(
			'title' 		 => 'Pendaftaran Skripsi',
			'list_daftar' => $list_daftar,
			'cek_daftar'  => $cek_daftar,
			'ket_daftar'  => $ket_daftar,
			'isi'		 => 'secure/pendaftaran/daftar_skripsi'
		);
		$this->load->view('secure/layout/wrapper', $data, FALSE);
	}

	public function acc_daftar_skripsi($id_mhs)
	{
		$data = array(
			'DaftarsStatus'     => 1

		);
		$decrypt_id     = $this->enkripsi->decrypt_url($id_mhs);
		$mhs = $this->db->query("SELECT * from tmhs where MhsNim='$decrypt_id'")->row_array();
		$nomorwa = $mhs['MhsNohp'];
		$isipesan = '_________ PORTAL SKRIPSI SI _________

		Selamat Pendaftaran Skripsi Kamu Diterima !';
		$this->db->where('DaftarsNIM', $decrypt_id);
		$this->db->update('tdaftars', $data);
		$this->wa->kirimWablas($nomorwa, $isipesan);
		$this->session->set_flashdata(
			'acc',
			'<script> 	iziToast.success ({
                          	title    : "OK",
                          	message  : "Data Berhasil Di Setujui !",});
                </script> '
		);
		redirect(base_url('secure/pendaftaran/daftar_skripsi'));
	}

	public function edit_daftar_skripsi()
	{
		$valid = $this->form_validation;

		$this->form_validation->set_rules(
			'keterangan',
			'Keterangan',
			'required',
			array('required'	=> '<script> 	
									iziToast.warning({
	                          		title    : "Perhatian",
	                          		message  : "Kolom %s  Harus Di Isi!",});
	                				</script> ')
		);

		if ($valid->run()) {
			$i = $this->input;
			$data = array(
				'DaftarsKeterangan'  => $i->post('keterangan'),
				'DaftarsStatus'      => 2

			);

			$id = $this->input->post('id');
			$decrypt_id     = $this->enkripsi->decrypt_url($id);
			$this->db->where('DaftarsNIM', $decrypt_id);
			$this->db->update('tdaftars', $data);
			$this->session->set_flashdata(
				'edit',
				'<script> 	iziToast.info ({
                          	title    : "OK",
                          	message  : "Data Berhasil Di Ubah!",});
                </script> '
			);
			redirect(base_url('secure/pendaftaran/daftar_skripsi'));
		} else {
			redirect(base_url('secure/pendaftaran/daftar_skripsi'));
		}
	}

	public function download_daftar_skripsi_zip($id_daftars)
	{
		$id = $this->enkripsi->decrypt_url($id_daftars);
		$daftar = $this->pendaftaran_model->download_zip_skripsi($id);
		// File path
		$filepath1 = FCPATH . '/assets/upload/pendaftaran/skripsi/' . $daftar['DaftarsFileKrs'];
		$filepath2 = FCPATH . '/assets/upload/pendaftaran/skripsi/' . $daftar['DaftarsFileTranskrip'];
		$filepath3 = FCPATH . '/assets/upload/pendaftaran/skripsi/' . $daftar['DaftarsFileSlip'];

		// Add file
		$this->zip->read_file($filepath1);
		$this->zip->read_file($filepath2);
		$this->zip->read_file($filepath3);

		$filename = "Pendaftaran_Skripsi" . "_" . $daftar['MhsNim'] . "_" . ".zip";
		$this->zip->download($filename);
	}

	/////////////////SEMINAR///////////////
	public function daftar_seminar()
	{
		$periode     = periode_aktif();
		$pendaftaran  =  $this->pendaftaran_model->list_daftar_seminar($periode['PeriodesId']);
		$list_daftar  	   =  $pendaftaran;
		$cek_daftar        =  $pendaftaran;
		$keterangan_daftar =  $pendaftaran;
		$data = array(
			'title' 				=> 'Pendaftaran Seminar',
			'list_daftar' 		=> $list_daftar,
			'cek_daftar'     	=> $cek_daftar,
			'keterangan_daftar' 	=> $keterangan_daftar,
			'isi'				=> 'secure/pendaftaran/daftar_seminar'
		);
		$this->load->view('secure/layout/wrapper', $data, FALSE);
	}

	public function acc_daftar_seminar($id_mhs)
	{
		$data = array(
			'DafsemCekTgl'		 => date('d-m-y'),
			'DafsemStatus'     => 1

		);
		$decrypt_id     = $this->enkripsi->decrypt_url($id_mhs);
		$mhs = $this->db->query("SELECT * from tmhs 
				join tdaftars on tdaftars.DaftarsNIM=tmhs.MhsNim
				join tdaftarsempro on tdaftarsempro.DafsemDaftarsId=tdaftars.DaftarsId
				where tdaftarsempro.DafsemId='$decrypt_id'")->row_array();
		$nomorwa = $mhs['MhsNohp'];
		$isipesan = '_________ PORTAL SKRIPSI SI _________

Selamat Pendaftaran Seminar Kamu Diterima !';
		$this->db->where('DafsemId', $decrypt_id);
		$this->db->update('tdaftarsempro', $data);

		$this->wa->kirimWablas($nomorwa, $isipesan);
		$this->session->set_flashdata(
			'acc',
			'<script> 	iziToast.success ({
                          	title    : "OK",
                          	message  : "Data Berhasil Di Setujui !",});
                </script> '
		);
		redirect(base_url('secure/pendaftaran/daftar_seminar'));
	}

	public function ket_daftar_seminar()
	{
		$valid = $this->form_validation;

		$this->form_validation->set_rules(
			'keterangan',
			'Keterangan',
			'required',
			array('required'	=> '<script> 	
									iziToast.warning({
	                          		title    : "Perhatian",
	                          		message  : "Kolom %s  Harus Di Isi!",});
	                				</script> ')
		);

		if ($valid->run()) {
			$i = $this->input;
			$data = array(
				'DafsemKet'  => $i->post('keterangan'),
				'DafsemStatus'      => 2

			);

			$id = $this->input->post('id');
			$decrypt_id     = $this->enkripsi->decrypt_url($id);
			$this->db->where('DafsemId', $decrypt_id);
			$this->db->update('tdaftarsempro', $data);
			$this->session->set_flashdata(
				'edit',
				'<script> 	iziToast.info ({
                          	title    : "OK",
                          	message  : "Data Berhasil Di Ubah!",});
                </script> '
			);
			redirect(base_url('secure/pendaftaran/daftar_seminar'));
		} else {
			redirect(base_url('secure/pendaftaran/daftar_seminar'));
		}
	}

	public function download_seminar_zip($id_daftars)
	{
		$id = $this->enkripsi->decrypt_url($id_daftars);
		$daftar = $this->pendaftaran_model->download_zip_seminar($id);

		// File path
		$filepath1 = FCPATH . '/assets/upload/pendaftaran/seminar/' . $daftar['DafsemFileTranskrip'];
		$filepath2 = FCPATH . '/assets/upload/pendaftaran/seminar/' . $daftar['DafsemFilePengesahan'];
		$filepath3 = FCPATH . '/assets/upload/pendaftaran/seminar/' . $daftar['DafsemFileBukubimbingan'];
		$filepath4 = FCPATH . '/assets/upload/pendaftaran/seminar/' . $daftar['DafsemFileSlip'];
		$filepath5 = FCPATH . '/assets/upload/pendaftaran/seminar/' . $daftar['DafsemFilePlagiasi'];
		$filepath6 = FCPATH . '/assets/upload/pendaftaran/seminar/' . $daftar['DafsemFileKWKomputer'];
		$filepath7 = FCPATH . '/assets/upload/pendaftaran/seminar/' . $daftar['DafsemFileKWInggris'];
		$filepath8 = FCPATH . '/assets/upload/pendaftaran/seminar/' . $daftar['DafsemFileKWKewirausahaan'];



		// Add file
		$this->zip->read_file($filepath1);
		$this->zip->read_file($filepath2);
		$this->zip->read_file($filepath3);
		$this->zip->read_file($filepath4);
		$this->zip->read_file($filepath5);
		$this->zip->read_file($filepath6);
		$this->zip->read_file($filepath7);
		$this->zip->read_file($filepath8);

		$filename = "Pendaftaran_Seminar" . "_" . $daftar['MhsNim'] . "_" . ".zip";
		$this->zip->download($filename);
	}

	/////////////////SIDANG////////////////
	public function daftar_sidang()
	{
		$periode     = periode_aktif();
		$pendaftaran = $this->pendaftaran_model->list_daftar_sidang($periode['PeriodesId']);
		$list_daftar = $pendaftaran;
		$cek_daftar  = $pendaftaran;
		$ket_daftar  = $pendaftaran;
		$data = array(
			'title' 		 => 'Pendaftaran Sidang',
			'list_daftar' => $list_daftar,
			'cek_daftar'  => $cek_daftar,
			'ket_daftar'  => $ket_daftar,
			'isi'		 => 'secure/pendaftaran/daftar_sidang'
		);
		$this->load->view('secure/layout/wrapper', $data, FALSE);
	}

	public function acc_daftar_sidang($id_mhs)
	{
		$data = array(
			'DafsidCekTgl'	   => date('d-m-y'),
			'DafsidStatus'     => 1

		);
		$decrypt_id     = $this->enkripsi->decrypt_url($id_mhs);
		$mhs = $this->db->query("SELECT * from tmhs 
				join tdaftars on tdaftars.DaftarsNIM=tmhs.MhsNim
				join tdaftarsidang on tdaftarsidang.DafsidDaftarsId=tdaftars.DaftarsId
				where tdaftarsidang.DafsidId='$decrypt_id'")->row_array();
		$nomorwa = $mhs['MhsNohp'];
		$isipesan = '_________ PORTAL SKRIPSI SI _________

Selamat Pendaftaran Sidang Kamu Diterima !';
		$this->db->where('DafsidId', $decrypt_id);
		$this->db->update('tdaftarsidang', $data);
		$this->wa->kirimWablas($nomorwa, $isipesan);
		$this->session->set_flashdata(
			'acc',
			'<script> 	iziToast.success ({
                          	title    : "OK",
                          	message  : "Data Berhasil Di Setujui !",});
                </script> '
		);
		redirect(base_url('secure/pendaftaran/daftar_sidang'));
	}

	public function ket_daftar_sidang()
	{
		$valid = $this->form_validation;

		$this->form_validation->set_rules(
			'keterangan',
			'Keterangan',
			'required',
			array('required'	=> '<script> 	
									iziToast.warning({
	                          		title    : "Perhatian",
	                          		message  : "Kolom %s  Harus Di Isi!",});
	                				</script> ')
		);

		if ($valid->run()) {
			$i = $this->input;
			$data = array(
				'DafsidKet'  		=> $i->post('keterangan'),
				'DafsidStatus'      => 2

			);

			$id = $this->input->post('id');
			$decrypt_id     = $this->enkripsi->decrypt_url($id);
			$this->db->where('DafsidId', $decrypt_id);
			$this->db->update('tdaftarsidang', $data);
			$this->session->set_flashdata(
				'edit',
				'<script> 	iziToast.info ({
                          	title    : "OK",
                          	message  : "Data Berhasil Di Ubah!",});
                </script> '
			);
			redirect(base_url('secure/pendaftaran/daftar_sidang'));
		} else {
			redirect(base_url('secure/pendaftaran/daftar_sidang'));
		}
	}

	public function download_sidang_zip($id_daftars)
	{
		$id = $this->enkripsi->decrypt_url($id_daftars);
		$daftar = $this->pendaftaran_model->download_zip_sidang($id);

		// File path
		$filepath1 = FCPATH . '/assets/upload/pendaftaran/sidang/' . $daftar['DafsidFileProposal'];
		$filepath2 = FCPATH . '/assets/upload/pendaftaran/sidang/' . $daftar['DafsidFileBukubimbingan'];
		$filepath3 = FCPATH . '/assets/upload/pendaftaran/sidang/' . $daftar['DafsidFileSuratBalasan'];
		$filepath4 = FCPATH . '/assets/upload/pendaftaran/sidang/' . $daftar['DafsidFileKWKomputer'];
		$filepath5 = FCPATH . '/assets/upload/pendaftaran/sidang/' . $daftar['DafsidFileKWInggris'];
		$filepath6 = FCPATH . '/assets/upload/pendaftaran/sidang/' . $daftar['DafsidFileKWKewirausahaan'];
		$filepath7 = FCPATH . '/assets/upload/pendaftaran/sidang/' . $daftar['DafsidFileSlip'];
		$filepath8 = FCPATH . '/assets/upload/pendaftaran/sidang/' . $daftar['DafsidFileBeritaAcara'];
		$filepath9 = FCPATH . '/assets/upload/pendaftaran/sidang/' . $daftar['DafsidFileTranskrip'];
		$filepath10 = FCPATH . '/assets/upload/pendaftaran/sidang/' . $daftar['DafsidFilePlagiasi'];
		$filepath11 = FCPATH . '/assets/upload/pendaftaran/sidang/' . $daftar['DafsidFileEsq'];

		// Add file
		$this->zip->read_file($filepath1);
		$this->zip->read_file($filepath2);
		$this->zip->read_file($filepath3);
		$this->zip->read_file($filepath4);
		$this->zip->read_file($filepath5);
		$this->zip->read_file($filepath6);
		$this->zip->read_file($filepath7);
		$this->zip->read_file($filepath8);
		$this->zip->read_file($filepath9);
		$this->zip->read_file($filepath10);
		$this->zip->read_file($filepath11);

		$filename = "Pendaftaran_Sidang" . "_" . $daftar['MhsNim'] . "_" . ".zip";
		$this->zip->download($filename);
	}

	////////////////BEBAS Prodi///////////
	public function bebas_prodi()
	{

		$bebas_prodi =  $this->pendaftaran_model->list_daftar_bebas_skripsi();
		$edit_bebas_prodi    =  $this->pendaftaran_model->edit_bebas_skripsi();
		$data = array(
			'title' 				=> 'Pendaftaran Bebas Skripsi',
			'bebas_prodi' 	    => $bebas_prodi,
			'edit_bebas_prodi' => $edit_bebas_prodi,
			'isi'				=> 'secure/pendaftaran/bebas_prodi'
		);
		$this->load->view('secure/layout/wrapper', $data, FALSE);
	}

	public function acc_bebas_prodi($id_mhs)
	{
		$data = array(
			'SkripsiStatus'     => 1
		);
		$decrypt_id     = $this->enkripsi->decrypt_url($id_mhs);
		$this->db->where('SkripsiMhsNim', $decrypt_id);
		$this->db->update('tskripsi', $data);

		$data2 = array(
			'DaftarsStatusAkhir'     => 1,
			'DaftarsTglSelesai'      => date('Y-m-d')
		);
		$decrypt_id     = $this->enkripsi->decrypt_url($id_mhs);
		$this->db->where('DaftarsNIM', $decrypt_id);
		$this->db->update('tdaftars', $data2);

		$mhs = $this->db->query("SELECT * from tmhs where MhsNim='$decrypt_id'")->row_array();
		$nomorwa = $mhs['MhsNohp'];
		$isipesan = '_________ PORTAL SKRIPSI SI _________

Selamat Pendaftaran Bebas Prodi Kamu Diterima !';
		$this->wa->kirimWablas($nomorwa, $isipesan);

		$this->session->set_flashdata(
			'acc',
			'<script> 	iziToast.success ({
                          	title    : "OK",
                          	message  : "Data Berhasil Di Setujui !",});
                </script> '
		);
		redirect(base_url('secure/pendaftaran/bebas_prodi'));
	}

	public function edit_bebas_prodi()
	{
		$valid = $this->form_validation;

		$this->form_validation->set_rules(
			'keterangan',
			'Keterangan',
			'required',
			array('required'	=> '<script> 	
									iziToast.warning({
	                          		title    : "Perhatian",
	                          		message  : "Kolom %s  Harus Di Isi!",});
	                				</script> ')
		);

		if ($valid->run()) {
			$i = $this->input;
			$data = array(
				'SkripsiKeterangan'  => $i->post('keterangan'),
				'SkripsiStatus'      => 2
			);

			$id = $this->input->post('id');
			$decrypt_id     = $this->enkripsi->decrypt_url($id);
			$this->db->where('SkripsiMhsNim', $decrypt_id);
			$this->db->update('tskripsi', $data);
			$this->session->set_flashdata(
				'edit',
				'<script> 	iziToast.info ({
                          	title    : "OK",
                          	message  : "Data Berhasil Di Ubah!",});
                </script> '
			);
			redirect(base_url('secure/pendaftaran/bebas_prodi'));
		} else {
			redirect(base_url('secure/pendaftaran/bebas_prodi'));
		}
	}
}

/* End of file Pendaftaran.php */
/* Location: ./application/controllers/secure/Pendaftaran.php */
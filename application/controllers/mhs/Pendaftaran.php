<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pendaftaran_model');
		$this->load->model('bimbingan_model');
	}

	////////////////Pendaftaran Skripsi////////////////////
	public function daftar_skripsi()
	{
		$periode    =  periode_aktif();
		$id_mhs     =  $this->session->userdata('MhsNim');
		$akun       = $this->db->get_where('tmhs', ['MhsNim' => $this->session->userdata('MhsNim')])->row_array();
		$daftar_skripsi  =  $this->pendaftaran_model->detail_daftar_skripsi($id_mhs, $periode['PeriodesId']);
		$lulus = $this->pendaftaran_model->daftar_skripsi_lulus($id_mhs);
		$data = array(
			'title'       => 'Pendaftaran Skripsi',
			'submit_daftar_skripsi' => base_url('mhs/pendaftaran/proses_daftar_skripsi'),
			'daftar_skripsi' => $daftar_skripsi,
			'akun'   => $akun,
			'lulus'  => $lulus,
			'isi'            => 'mhs/pendaftaran/daftar_skripsi'
		);
		$this->load->view('mhs/layout/wrapper', $data, FALSE);
	}


	public function proses_daftar_skripsi()
	{
		if (isset($_POST['submit'])) {

			$config['upload_path']          = './assets/upload/pendaftaran/skripsi';
			$config['allowed_types']        = 'gif|jpg|png|pdf';
			$config['max_size']               = 2048;
			$config['max_width']              = 2048;
			$config['max_height']             = 2048;
			$config['encrypt_name']           = TRUE;
			$this->load->library('upload', $config);

			//file krs
			if (!empty($_FILES['filekrs']['name'])) {
				$this->upload->do_upload('filekrs');
				$data1 = $this->upload->data();
				$filekrs = $data1['file_name'];
				$periode = periode_aktif();
				$id_mhs = $this->session->userdata('MhsNim');
				$mhs = $this->db->query("SELECT * from tdaftars where DaftarsNIM='$id_mhs' order by DaftarsId desc")->row_array();
				$count = $this->db->query("SELECT COUNT(DaftarsId)FROM tdaftars where DaftarsNIM='$id_mhs'")->row_array();
				$max_id = $this->db->query("SELECT MAX(DaftarsId) FROM tdaftars where DaftarsNIM='$id_mhs'")->row_array();
				$data = array(
					'DaftarsFileKrs'       => $filekrs,
					'DaftarsNIM'           => $this->session->userdata('MhsNim'),
					'DaftarsStatus'        => 0,
					'DaftarsPeriodesId'    => $periode['PeriodesId'],
					'DaftarsStatusAkhir'   => 0,
					'DaftarsTgl'           => date('d-m-Y')
				);


				if ($count['COUNT(DaftarsId)'] > 1) {
					$this->db->where('DaftarsId', $max_id['MAX(DaftarsId)']);
					$this->db->update('tdaftars', $data);
				} elseif ($mhs['DaftarsId'] == null || $mhs['DaftarsStatusAkhir'] == 2) {
					$this->db->insert('tdaftars', $data);
				} elseif ($count['COUNT(DaftarsId)'] == 1) {
					$this->db->where('DaftarsId', $max_id['MAX(DaftarsId)']);
					$this->db->update('tdaftars', $data);
				}
			}

			//file skrip
			if (!empty($_FILES['fileskrip']['name'])) {
				$this->upload->do_upload('fileskrip');
				$data2 = $this->upload->data();
				$fileskrip = $data2['file_name'];
				$id_mhs = $this->session->userdata('MhsNim');
				$mhs = $this->db->query("SELECT * from tdaftars where DaftarsNIM='$id_mhs' order by DaftarsId desc")->row_array();
				$count = $this->db->query("SELECT COUNT(DaftarsId)FROM tdaftars where DaftarsNIM='$id_mhs'")->row_array();
				$max_id = $this->db->query("SELECT MAX(DaftarsId) FROM tdaftars where DaftarsNIM='$id_mhs'")->row_array();
				$data = array(
					'DaftarsFileTranskrip' => $fileskrip,
					'DaftarsNIM'           => $this->session->userdata('MhsNim'),
					'DaftarsStatus'        => 0,
					'DaftarsPeriodesId'    => $periode['PeriodesId'],
					'DaftarsStatusAkhir'   => 0,
					'DaftarsTgl'           => date('d-m-Y')
				);
				$periode = periode_aktif();


				if ($count['COUNT(DaftarsId)'] > 1) {
					$this->db->where('DaftarsId', $max_id['MAX(DaftarsId)']);
					$this->db->update('tdaftars', $data);
				} elseif ($mhs['DaftarsId'] == null || $mhs['DaftarsStatusAkhir'] == 2) {
					$this->db->insert('tdaftars', $data);
				} elseif ($count['COUNT(DaftarsId)'] == 1) {
					$this->db->where('DaftarsId', $max_id['MAX(DaftarsId)']);
					$this->db->update('tdaftars', $data);
				}
			}

			//file slip
			if (!empty($_FILES['fileslip']['name'])) {
				$this->upload->do_upload('fileslip');
				$data3 = $this->upload->data();
				$fileslip = $data3['file_name'];
				$periode = periode_aktif();
				$id_mhs = $this->session->userdata('MhsNim');
				$mhs = $this->db->query("SELECT * from tdaftars where DaftarsNIM='$id_mhs' order by DaftarsId desc")->row_array();
				$count = $this->db->query("SELECT COUNT(DaftarsId)FROM tdaftars where DaftarsNIM='$id_mhs'")->row_array();
				$max_id = $this->db->query("SELECT MAX(DaftarsId) FROM tdaftars where DaftarsNIM='$id_mhs'")->row_array();
				$data = array(
					'DaftarsFileSlip'   => $fileslip,
					'DaftarsNIM'           => $this->session->userdata('MhsNim'),
					'DaftarsStatus'        => 0,
					'DaftarsPeriodesId'    => $periode['PeriodesId'],
					'DaftarsStatusAkhir'   => 0,
					'DaftarsTgl'           => date('d-m-Y')
				);


				if ($count['COUNT(DaftarsId)'] > 1) {
					$this->db->where('DaftarsId', $max_id['MAX(DaftarsId)']);
					$this->db->update('tdaftars', $data);
				} elseif ($mhs['DaftarsId'] == null || $mhs['DaftarsStatusAkhir'] == 2) {
					$this->db->insert('tdaftars', $data);
				} elseif ($count['COUNT(DaftarsId)'] == 1) {
					$this->db->where('DaftarsId', $max_id['MAX(DaftarsId)']);
					$this->db->update('tdaftars', $data);
				}
			}

			$this->session->set_flashdata(
				'simpan',
				'<script>   iziToast.success ({
                                title    : "OK",
                                message  : "Data Berhasil DiSimpan!",});
                    </script> '
			);
			redirect(base_url('mhs/pendaftaran/daftar_skripsi'));
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


	/////////////////Seminar/////////////////////

	public function daftar_seminar()
	{
		$periode     = periode_aktif();
		$id_mhs      = $this->session->userdata('MhsNim');
		$daftar_seminar     =  $this->pendaftaran_model->detail_daftar_seminar($id_mhs, $periode['PeriodesId']);
		$lulus = $this->pendaftaran_model->daftar_seminar_lulus($id_mhs);

		$dosen1      = $this->db->query("
                         SELECT tdosbings.DosbingsDosenId1, tdaftars.daftarsId
                           FROM tdosbings
                           JOIN tdaftars ON tdaftars.DaftarsId = tdosbings.DosbingsDaftarsId
                           WHERE tdaftars.DaftarsNIM='$id_mhs'")->row_array();
		$dosen2      = $this->db->query("
                         SELECT tdosbings.DosbingsDosenId2, tdaftars.daftarsId
                           FROM tdosbings
                           JOIN tdaftars ON tdaftars.DaftarsId = tdosbings.DosbingsDaftarsId
                           WHERE tdaftars.DaftarsNIM='$id_mhs'")->row_array();
		$cek_status1   = $this->bimbingan_model->cek_status_bimbingan1($id_mhs, $dosen1['DosbingsDosenId1']);
		$cek_status2   = $this->bimbingan_model->cek_status_bimbingan2($id_mhs, $dosen2['DosbingsDosenId2']);



		$data = array(
			'title'              => 'Pendaftaran Seminar Proposal',
			'daftar_seminar' => $daftar_seminar,
			'dosen1'         => $dosen1,
			'dosen2'         => $dosen2,
			'cek_status1'    => $cek_status1,
			'cek_status2'    => $cek_status2,
			'lulus'          => $lulus,
			'isi'                     => 'mhs/pendaftaran/daftar_seminar'
		);
		$this->load->view('mhs/layout/wrapper', $data, FALSE);
	}


	public function proses_daftar_seminar()
	{


		if (isset($_POST['submit'])) {
			$config['upload_path']          = './assets/upload/pendaftaran/seminar';
			$config['allowed_types']        = 'gif|jpg|png|pdf';
			$config['max_size']               = 2048;
			$config['max_width']              = 2048;
			$config['max_height']             = 2048;
			$config['encrypt_name']           = TRUE;
			$this->load->library('upload', $config);


			//file slip
			if (!empty($_FILES['slip']['name'])) {
				$this->upload->do_upload('slip');
				$data1 = $this->upload->data();
				$slip = $data1['file_name'];
				$periode = periode_aktif();
				$id_mhs = $this->session->userdata('MhsNim');
				$mhs_daftars = $this->db->query("SELECT *  FROM tdaftars WHERE DaftarsNIM='$id_mhs'
                                                         ORDER BY DaftarsId DESC")->row_array();
				$max_id = $mhs_daftars['DaftarsId'];
				$daftar_sempro = $this->db->query("SELECT *  FROM tdaftarsempro WHERE 
                                                           DafsemDaftarsId='$max_id'")->row_array();
				$data = array(
					'DafsemFileSlip'      => $slip,
					'DafsemDaftarsId'     => $max_id,
					'DafsemPeriodeId'     => $periode['PeriodesId'],
					'DafsemStatus'        => 0,
					'DafsemTgl'           => date('d-m-y')
				);


				if ($daftar_sempro['DafsemId'] == null) {
					$this->db->insert('tdaftarsempro', $data);
				} else {
					$this->db->where('DafsemDaftarsId', $max_id);
					$this->db->update('tdaftarsempro', $data);
				}
			}


			//file transkrip
			if (!empty($_FILES['transkrip']['name'])) {
				$this->upload->do_upload('transkrip');
				$data2 = $this->upload->data();
				$transkrip = $data2['file_name'];
				$periode = periode_aktif();
				$id_mhs = $this->session->userdata('MhsNim');
				$mhs_daftars = $this->db->query("SELECT *  FROM tdaftars WHERE DaftarsNIM='$id_mhs'
                                                         ORDER BY DaftarsId DESC")->row_array();
				$max_id = $mhs_daftars['DaftarsId'];
				$daftar_sempro = $this->db->query("SELECT *  FROM tdaftarsempro WHERE 
                                                           DafsemDaftarsId='$max_id'")->row_array();
				$data = array(
					'DafsemFileTranskrip' => $transkrip,
					'DafsemDaftarsId'     => $max_id,
					'DafsemPeriodeId'     => $periode['PeriodesId'],
					'DafsemStatus'        => 0,
					'DafsemTgl'           => date('d-m-y')
				);

				if ($daftar_sempro['DafsemId'] == null) {
					$this->db->insert('tdaftarsempro', $data);
				} else {
					$this->db->where('DafsemDaftarsId', $max_id);
					$this->db->update('tdaftarsempro', $data);
				}
			}

			//file pengesahan
			if (!empty($_FILES['pengesahan']['name'])) {
				$this->upload->do_upload('pengesahan');
				$data3 = $this->upload->data();
				$pengesahan = $data3['file_name'];

				$periode = periode_aktif();
				$id_mhs = $this->session->userdata('MhsNim');
				$mhs_daftars = $this->db->query("SELECT *  FROM tdaftars WHERE DaftarsNIM='$id_mhs'
                                                         ORDER BY DaftarsId DESC")->row_array();
				$max_id = $mhs_daftars['DaftarsId'];
				$daftar_sempro = $this->db->query("SELECT *  FROM tdaftarsempro WHERE 
                                                           DafsemDaftarsId='$max_id'")->row_array();
				$data = array(
					'DafsemFilePengesahan' => $pengesahan,
					'DafsemDaftarsId'      => $max_id,
					'DafsemPeriodeId'      => $periode['PeriodesId'],
					'DafsemStatus'         => 0,
					'DafsemTgl'            => date('d-m-y')
				);

				if ($daftar_sempro['DafsemId'] == null) {
					$this->db->insert('tdaftarsempro', $data);
				} else {
					$this->db->where('DafsemDaftarsId', $max_id);
					$this->db->update('tdaftarsempro', $data);
				}
			}

			//file plagiasi
			if (!empty($_FILES['plagiasi']['name'])) {
				$this->upload->do_upload('plagiasi');
				$data4 = $this->upload->data();
				$plagiasi = $data4['file_name'];
				$periode = periode_aktif();
				$id_mhs = $this->session->userdata('MhsNim');
				$mhs_daftars = $this->db->query("SELECT *  FROM tdaftars WHERE DaftarsNIM='$id_mhs'
                                                         ORDER BY DaftarsId DESC")->row_array();
				$max_id = $mhs_daftars['DaftarsId'];
				$daftar_sempro = $this->db->query("SELECT *  FROM tdaftarsempro WHERE 
                                                           DafsemDaftarsId='$max_id'")->row_array();
				$data = array(
					'DafsemFilePlagiasi'  => $plagiasi,
					'DafsemDaftarsId'     => $max_id,
					'DafsemPeriodeId'     => $periode['PeriodesId'],
					'DafsemStatus'        => 0,
					'DafsemTgl'           => date('d-m-y')
				);


				if ($daftar_sempro['DafsemId'] == null) {
					$this->db->insert('tdaftarsempro', $data);
				} else {
					$this->db->where('DafsemDaftarsId', $max_id);
					$this->db->update('tdaftarsempro', $data);
				}
			}


			//file buku bimbingan
			if (!empty($_FILES['bukubimbingan']['name'])) {
				$this->upload->do_upload('bukubimbingan');
				$data5 = $this->upload->data();
				$bukubimbingan = $data5['file_name'];
				$periode = periode_aktif();
				$id_mhs = $this->session->userdata('MhsNim');
				$mhs_daftars = $this->db->query("SELECT *  FROM tdaftars WHERE DaftarsNIM='$id_mhs'
                                                       ORDER BY DaftarsId DESC")->row_array();
				$max_id = $mhs_daftars['DaftarsId'];
				$daftar_sempro = $this->db->query("SELECT *  FROM tdaftarsempro WHERE 
                                                         DafsemDaftarsId='$max_id'")->row_array();
				$data = array(
					'DafsemFileBukubimbingan' => $bukubimbingan,
					'DafsemDaftarsId'         => $max_id,
					'DafsemPeriodeId'         => $periode['PeriodesId'],
					'DafsemStatus'            => 0,
					'DafsemTgl'               => date('d-m-y')
				);

				if ($daftar_sempro['DafsemId'] == null) {
					$this->db->insert('tdaftarsempro', $data);
				} else {
					$this->db->where('DafsemDaftarsId', $max_id);
					$this->db->update('tdaftarsempro', $data);
				}
			}

			//file kwkomputer
			if (!empty($_FILES['kwkomputer']['name'])) {
				$this->upload->do_upload('kwkomputer');
				$data6 = $this->upload->data();
				$kwkomputer = $data6['file_name'];
				$periode = periode_aktif();
				$id_mhs = $this->session->userdata('MhsNim');
				$mhs_daftars = $this->db->query("SELECT *  FROM tdaftars WHERE DaftarsNIM='$id_mhs'
                                                         ORDER BY DaftarsId DESC")->row_array();
				$max_id = $mhs_daftars['DaftarsId'];
				$daftar_sempro = $this->db->query("SELECT *  FROM tdaftarsempro WHERE 
                                                           DafsemDaftarsId='$max_id'")->row_array();
				$data = array(
					'DafsemFileKWKomputer' => $kwkomputer,
					'DafsemDaftarsId'      => $max_id,
					'DafsemPeriodeId'      => $periode['PeriodesId'],
					'DafsemStatus'         => 0,
					'DafsemTgl'            => date('d-m-y')
				);

				if ($daftar_sempro['DafsemId'] == null) {
					$this->db->insert('tdaftarsempro', $data);
				} else {
					$this->db->where('DafsemDaftarsId', $max_id);
					$this->db->update('tdaftarsempro', $data);
				}
			}

			//file kwbinggris
			if (!empty($_FILES['kwbinggris']['name'])) {
				$this->upload->do_upload('kwbinggris');
				$data7 = $this->upload->data();
				$kwbinggris = $data7['file_name'];

				$periode = periode_aktif();
				$id_mhs = $this->session->userdata('MhsNim');
				$mhs_daftars = $this->db->query("SELECT *  FROM tdaftars WHERE DaftarsNIM='$id_mhs'
                                                       ORDER BY DaftarsId DESC")->row_array();
				$max_id = $mhs_daftars['DaftarsId'];
				$daftar_sempro = $this->db->query("SELECT *  FROM tdaftarsempro WHERE 
                                                         DafsemDaftarsId='$max_id'")->row_array();
				$data = array(
					'DafsemFileKWInggris' => $kwbinggris,
					'DafsemDaftarsId'     => $max_id,
					'DafsemPeriodeId'     => $periode['PeriodesId'],
					'DafsemStatus'        => 0,
					'DafsemTgl'           => date('d-m-y')
				);

				if ($daftar_sempro['DafsemId'] == null) {
					$this->db->insert('tdaftarsempro', $data);
				} else {
					$this->db->where('DafsemDaftarsId', $max_id);
					$this->db->update('tdaftarsempro', $data);
				}
			}

			//file kwusaha
			if (!empty($_FILES['kwusaha']['name'])) {
				$this->upload->do_upload('kwusaha');
				$data8 = $this->upload->data();
				$kwusaha = $data8['file_name'];
				$periode = periode_aktif();
				$id_mhs = $this->session->userdata('MhsNim');
				$mhs_daftars = $this->db->query("SELECT *  FROM tdaftars WHERE DaftarsNIM='$id_mhs'
                                                         ORDER BY DaftarsId DESC")->row_array();
				$max_id = $mhs_daftars['DaftarsId'];
				$daftar_sempro = $this->db->query("SELECT *  FROM tdaftarsempro WHERE 
                                                           DafsemDaftarsId='$max_id'")->row_array();
				$data = array(
					'DafsemFileKWKewirausahaan' => $kwusaha,
					'DafsemDaftarsId'           => $max_id,
					'DafsemPeriodeId'           => $periode['PeriodesId'],
					'DafsemStatus'              => 0,
					'DafsemTgl'                 => date('d-m-y')
				);


				if ($daftar_sempro['DafsemId'] == null) {
					$this->db->insert('tdaftarsempro', $data);
				} else {
					$this->db->where('DafsemDaftarsId', $max_id);
					$this->db->update('tdaftarsempro', $data);
				}
			}


			$this->session->set_flashdata(
				'simpan',
				'<script>   iziToast.success ({
                                title    : "OK",
                                message  : "Data Berhasil DiSimpan!",});
                    </script> '
			);
			redirect(base_url('mhs/pendaftaran/daftar_seminar'));
		} else {
			$this->session->set_flashdata(
				'hapus',
				'<script>   iziToast.error ({
                                title    : "error",
                                message  : "Data Harus Didisi!",
                                position : "topRight"});
                    </script> '
			);
			redirect(base_url('mhs/pendaftaran/daftar_seminar'));
		}
	}


	//////////////////sidang//////////////
	public function daftar_sidang()
	{
		$periode = periode_aktif();
		$mhs                =  $this->session->userdata('MhsNim');
		$daftar_sidang      =  $this->pendaftaran_model->detail_daftar_sidang($mhs, $periode['PeriodesId']);
		$lulus = $this->pendaftaran_model->daftar_sidang_lulus($mhs);
		$id_mhs        = $this->session->userdata('MhsNim');
		$dosen1      = $this->db->query("
                         SELECT tdosbings.DosbingsDosenId1, tdaftars.daftarsId
                           FROM tdosbings
                           JOIN tdaftars ON tdaftars.DaftarsId = tdosbings.DosbingsDaftarsId
                           WHERE tdaftars.DaftarsNIM='$id_mhs'")->row_array();
		$dosen2      = $this->db->query("
                         SELECT tdosbings.DosbingsDosenId2, tdaftars.daftarsId
                           FROM tdosbings
                           JOIN tdaftars ON tdaftars.DaftarsId = tdosbings.DosbingsDaftarsId
                           WHERE tdaftars.DaftarsNIM='$id_mhs'")->row_array();
		$cek_status1   = $this->bimbingan_model->cek_status_bimbingan1($id_mhs, $dosen1['DosbingsDosenId1']);
		$cek_status2   = $this->bimbingan_model->cek_status_bimbingan2($id_mhs, $dosen2['DosbingsDosenId2']);

		$data = array(
			'title'             => 'Pendaftaran Sidang Skripsi',
			'daftar_sidang' => $daftar_sidang,
			'lulus'         => $lulus,
			'dosen1'         => $dosen1,
			'dosen2'         => $dosen2,
			'cek_status1'    => $cek_status1,
			'cek_status2'    => $cek_status2,
			'isi'                    => 'mhs/pendaftaran/daftar_sidang'
		);
		$this->load->view('mhs/layout/wrapper', $data, FALSE);
	}

	public function proses_daftar_sidang()
	{
		// $periode = periode_aktif();
		// $id_mhs = $this->session->userdata('MhsNim');
		// $mhs_daftars = $this->db->query("SELECT *  FROM tdaftars WHERE DaftarsNIM='$id_mhs'
		//                                  ORDER BY DaftarsId DESC")->row_array();
		// $max_id = $mhs_daftars['DaftarsId'];
		// $daftar_sidang = $this->db->query("SELECT *  FROM tdaftarsidang WHERE 
		//                                    DafsidDaftarsId='$max_id'")->row_array();
		if (isset($_POST['submit'])) {

			$config['upload_path']          = './assets/upload/pendaftaran/sidang';
			$config['allowed_types']        = 'gif|jpg|png|pdf';
			$config['max_size']               = 2048;
			$config['max_width']              = 2048;
			$config['max_height']             = 2048;
			$config['encrypt_name']           = TRUE;
			$this->load->library('upload', $config);

			//file surat balasan
			if (!empty($_FILES['suratbalasan']['name'])) {
				$this->upload->do_upload('suratbalasan');
				$data1 = $this->upload->data();
				$suratbalasan = $data1['file_name'];
				$periode = periode_aktif();
				$id_mhs = $this->session->userdata('MhsNim');
				$mhs_daftars = $this->db->query("SELECT *  FROM tdaftars WHERE DaftarsNIM='$id_mhs'
                                                         ORDER BY DaftarsId DESC")->row_array();
				$max_id = $mhs_daftars['DaftarsId'];
				$daftar_sidang = $this->db->query("SELECT *  FROM tdaftarsidang WHERE 
                                                           DafsidDaftarsId='$max_id'")->row_array();
				$data = array(
					'DafsidFileSuratBalasan' => $suratbalasan,
					'DafsidDaftarsId'    => $max_id,
					'DafsidPeriodeId'    => $periode['PeriodesId'],
					'DafsidStatus'       => 0,
					'DafsidTgl'          => date('d-m-y')
				);

				if ($daftar_sidang['DafsidDaftarsId'] == null) {
					$this->db->insert('tdaftarsidang', $data);
				} else {
					$this->db->where('DafsidDaftarsId', $max_id);
					$this->db->update('tdaftarsidang', $data);
				}
			}

			//file transkrip
			if (!empty($_FILES['transkrip']['name'])) {
				$this->upload->do_upload('transkrip');
				$data2 = $this->upload->data();
				$transkrip = $data2['file_name'];
				$periode = periode_aktif();
				$id_mhs = $this->session->userdata('MhsNim');
				$mhs_daftars = $this->db->query("SELECT *  FROM tdaftars WHERE DaftarsNIM='$id_mhs'
                                                         ORDER BY DaftarsId DESC")->row_array();
				$max_id = $mhs_daftars['DaftarsId'];
				$daftar_sidang = $this->db->query("SELECT *  FROM tdaftarsidang WHERE 
                                                           DafsidDaftarsId='$max_id'")->row_array();
				$data = array(
					'DafsidFileTranskrip' => $transkrip,
					'DafsidDaftarsId'    => $max_id,
					'DafsidPeriodeId'    => $periode['PeriodesId'],
					'DafsidStatus'       => 0,
					'DafsidTgl'          => date('d-m-y')
				);



				if ($daftar_sidang['DafsidDaftarsId'] == null) {
					$this->db->insert('tdaftarsidang', $data);
				} else {
					$this->db->where('DafsidDaftarsId', $max_id);
					$this->db->update('tdaftarsidang', $data);
				}
			}

			//file bukti bayar
			if (!empty($_FILES['slip']['name'])) {
				$this->upload->do_upload('slip');
				$data3 = $this->upload->data();
				$slip = $data3['file_name'];
				$periode = periode_aktif();
				$id_mhs = $this->session->userdata('MhsNim');
				$mhs_daftars = $this->db->query("SELECT *  FROM tdaftars WHERE DaftarsNIM='$id_mhs'
                                                         ORDER BY DaftarsId DESC")->row_array();
				$max_id = $mhs_daftars['DaftarsId'];
				$daftar_sidang = $this->db->query("SELECT *  FROM tdaftarsidang WHERE 
                                                           DafsidDaftarsId='$max_id'")->row_array();
				$data = array(
					'DafsidFileSlip'     => $slip,
					'DafsidDaftarsId'    => $max_id,
					'DafsidPeriodeId'    => $periode['PeriodesId'],
					'DafsidStatus'       => 0,
					'DafsidTgl'          => date('d-m-y')
				);

				if ($daftar_sidang['DafsidDaftarsId'] == null) {
					$this->db->insert('tdaftarsidang', $data);
				} else {
					$this->db->where('DafsidDaftarsId', $max_id);
					$this->db->update('tdaftarsidang', $data);
				}
			}

			//file berita acara
			if (!empty($_FILES['beritaacara']['name'])) {
				$this->upload->do_upload('beritaacara');
				$data4 = $this->upload->data();
				$beritaacara = $data4['file_name'];
				$periode = periode_aktif();
				$id_mhs = $this->session->userdata('MhsNim');
				$mhs_daftars = $this->db->query("SELECT *  FROM tdaftars WHERE DaftarsNIM='$id_mhs'
                                                         ORDER BY DaftarsId DESC")->row_array();
				$max_id = $mhs_daftars['DaftarsId'];
				$daftar_sidang = $this->db->query("SELECT *  FROM tdaftarsidang WHERE 
                                                           DafsidDaftarsId='$max_id'")->row_array();
				$data = array(
					'DafsidFileBeritaAcara' => $beritaacara,
					'DafsidDaftarsId'       => $max_id,
					'DafsidPeriodeId'       => $periode['PeriodesId'],
					'DafsidStatus'          => 0,
					'DafsidTgl'             => date('d-m-y')
				);



				if ($daftar_sidang['DafsidDaftarsId'] == null) {
					$this->db->insert('tdaftarsidang', $data);
				} else {
					$this->db->where('DafsidDaftarsId', $max_id);
					$this->db->update('tdaftarsidang', $data);
				}
			}

			//file plagiasi
			if (!empty($_FILES['plagiasi']['name'])) {
				$this->upload->do_upload('plagiasi');
				$data5 = $this->upload->data();
				$plagiasi = $data5['file_name'];
				$periode = periode_aktif();
				$id_mhs = $this->session->userdata('MhsNim');
				$mhs_daftars = $this->db->query("SELECT *  FROM tdaftars WHERE DaftarsNIM='$id_mhs'
                                                         ORDER BY DaftarsId DESC")->row_array();
				$max_id = $mhs_daftars['DaftarsId'];
				$daftar_sidang = $this->db->query("SELECT *  FROM tdaftarsidang WHERE 
                                                           DafsidDaftarsId='$max_id'")->row_array();
				$data = array(
					'DafsidFilePlagiasi' => $plagiasi,
					'DafsidDaftarsId'    => $max_id,
					'DafsidPeriodeId'    => $periode['PeriodesId'],
					'DafsidStatus'       => 0,
					'DafsidTgl'          => date('d-m-y')
				);

				if ($daftar_sidang['DafsidDaftarsId'] == null) {
					$this->db->insert('tdaftarsidang', $data);
				} else {
					$this->db->where('DafsidDaftarsId', $max_id);
					$this->db->update('tdaftarsidang', $data);
				}
			}

			//file proposal
			if (!empty($_FILES['proposal']['name'])) {
				$this->upload->do_upload('proposal');
				$data6 = $this->upload->data();
				$proposal = $data6['file_name'];
				$periode = periode_aktif();
				$id_mhs = $this->session->userdata('MhsNim');
				$mhs_daftars = $this->db->query("SELECT *  FROM tdaftars WHERE DaftarsNIM='$id_mhs'
                                                       ORDER BY DaftarsId DESC")->row_array();
				$max_id = $mhs_daftars['DaftarsId'];
				$daftar_sidang = $this->db->query("SELECT *  FROM tdaftarsidang WHERE 
                                                         DafsidDaftarsId='$max_id'")->row_array();
				$data = array(
					'DafsidFileProposal' => $proposal,
					'DafsidDaftarsId'    => $max_id,
					'DafsidPeriodeId'    => $periode['PeriodesId'],
					'DafsidStatus'       => 0,
					'DafsidTgl'          => date('d-m-y')
				);



				if ($daftar_sidang['DafsidDaftarsId'] == null) {
					$this->db->insert('tdaftarsidang', $data);
				} else {
					$this->db->where('DafsidDaftarsId', $max_id);
					$this->db->update('tdaftarsidang', $data);
				}
			}

			//file buku bimbingan
			if (!empty($_FILES['bukubimbingan']['name'])) {
				$this->upload->do_upload('bukubimbingan');
				$data7 = $this->upload->data();
				$bukubimbingan = $data7['file_name'];
				$periode = periode_aktif();
				$id_mhs = $this->session->userdata('MhsNim');
				$mhs_daftars = $this->db->query("SELECT *  FROM tdaftars WHERE DaftarsNIM='$id_mhs'
                                                         ORDER BY DaftarsId DESC")->row_array();
				$max_id = $mhs_daftars['DaftarsId'];
				$daftar_sidang = $this->db->query("SELECT *  FROM tdaftarsidang WHERE 
                                                           DafsidDaftarsId='$max_id'")->row_array();
				$data = array(
					'DafsidFileBukubimbingan' => $bukubimbingan,
					'DafsidDaftarsId'         => $max_id,
					'DafsidPeriodeId'         => $periode['PeriodesId'],
					'DafsidStatus'            => 0,
					'DafsidTgl'               => date('d-m-y')
				);



				if ($daftar_sidang['DafsidDaftarsId'] == null) {
					$this->db->insert('tdaftarsidang', $data);
				} else {
					$this->db->where('DafsidDaftarsId', $max_id);
					$this->db->update('tdaftarsidang', $data);
				}
			}

			//file kwkomputer
			if (!empty($_FILES['kwkomputer']['name'])) {
				$this->upload->do_upload('kwkomputer');
				$data8 = $this->upload->data();
				$kwkomputer = $data8['file_name'];
				$periode = periode_aktif();
				$id_mhs = $this->session->userdata('MhsNim');
				$mhs_daftars = $this->db->query("SELECT *  FROM tdaftars WHERE DaftarsNIM='$id_mhs'
                                                         ORDER BY DaftarsId DESC")->row_array();
				$max_id = $mhs_daftars['DaftarsId'];
				$daftar_sidang = $this->db->query("SELECT *  FROM tdaftarsidang WHERE 
                                                           DafsidDaftarsId='$max_id'")->row_array();
				$data = array(
					'DafsidFileKWKomputer' => $kwkomputer,
					'DafsidDaftarsId'      => $max_id,
					'DafsidPeriodeId'      => $periode['PeriodesId'],
					'DafsidStatus'         => 0,
					'DafsidTgl'            => date('d-m-y')
				);



				if ($daftar_sidang['DafsidDaftarsId'] == null) {
					$this->db->insert('tdaftarsidang', $data);
				} else {
					$this->db->where('DafsidDaftarsId', $max_id);
					$this->db->update('tdaftarsidang', $data);
				}
			}

			//file kwbinggris
			if (!empty($_FILES['kwbinggris']['name'])) {
				$this->upload->do_upload('kwbinggris');
				$data9 = $this->upload->data();
				$kwbinggris = $data9['file_name'];
				$periode = periode_aktif();
				$id_mhs = $this->session->userdata('MhsNim');
				$mhs_daftars = $this->db->query("SELECT *  FROM tdaftars WHERE DaftarsNIM='$id_mhs'
                                                         ORDER BY DaftarsId DESC")->row_array();
				$max_id = $mhs_daftars['DaftarsId'];
				$daftar_sidang = $this->db->query("SELECT *  FROM tdaftarsidang WHERE 
                                                           DafsidDaftarsId='$max_id'")->row_array();
				$data = array(
					'DafsidFileKWInggris' => $kwbinggris,
					'DafsidDaftarsId'     => $max_id,
					'DafsidPeriodeId'     => $periode['PeriodesId'],
					'DafsidStatus'        => 0,
					'DafsidTgl'           => date('d-m-y')
				);


				if ($daftar_sidang['DafsidDaftarsId'] == null) {
					$this->db->insert('tdaftarsidang', $data);
				} else {
					$this->db->where('DafsidDaftarsId', $max_id);
					$this->db->update('tdaftarsidang', $data);
				}
			}

			//file kwusaha
			if (!empty($_FILES['kwusaha']['name'])) {
				$this->upload->do_upload('kwusaha');
				$data10 = $this->upload->data();
				$kwusaha = $data10['file_name'];
				$periode = periode_aktif();
				$id_mhs = $this->session->userdata('MhsNim');
				$mhs_daftars = $this->db->query("SELECT *  FROM tdaftars WHERE DaftarsNIM='$id_mhs'
                                                         ORDER BY DaftarsId DESC")->row_array();
				$max_id = $mhs_daftars['DaftarsId'];
				$daftar_sidang = $this->db->query("SELECT *  FROM tdaftarsidang WHERE 
                                                           DafsidDaftarsId='$max_id'")->row_array();
				$data = array(
					'DafsidFileKWKewirausahaan' => $kwusaha,
					'DafsidDaftarsId'           => $max_id,
					'DafsidPeriodeId'           => $periode['PeriodesId'],
					'DafsidStatus'              => 0,
					'DafsidTgl'                 => date('d-m-y')
				);

				if ($daftar_sidang['DafsidDaftarsId'] == null) {
					$this->db->insert('tdaftarsidang', $data);
				} else {
					$this->db->where('DafsidDaftarsId', $max_id);
					$this->db->update('tdaftarsidang', $data);
				}
			}

			//file esq
			if (!empty($_FILES['esq']['name'])) {
				$this->upload->do_upload('esq');
				$data11 = $this->upload->data();
				$esq = $data11['file_name'];
				$periode = periode_aktif();
				$id_mhs = $this->session->userdata('MhsNim');
				$mhs_daftars = $this->db->query("SELECT *  FROM tdaftars WHERE DaftarsNIM='$id_mhs'
                                                           ORDER BY DaftarsId DESC")->row_array();
				$max_id = $mhs_daftars['DaftarsId'];
				$daftar_sidang = $this->db->query("SELECT *  FROM tdaftarsidang WHERE 
                                                             DafsidDaftarsId='$max_id'")->row_array();

				$data = array(
					'DafsidFileEsq'   => $esq,
					'DafsidDaftarsId' => $max_id,
					'DafsidPeriodeId' => $periode['PeriodesId'],
					'DafsidStatus'    => 0,
					'DafsidTgl'       => date('d-m-y')
				);

				if ($daftar_sidang['DafsidDaftarsId'] == null) {
					$this->db->insert('tdaftarsidang', $data);
				} else {
					$this->db->where('DafsidDaftarsId', $max_id);
					$this->db->update('tdaftarsidang', $data);
				}
			}

			$this->session->set_flashdata(
				'simpan',
				'<script>   iziToast.success ({
                                title    : "OK",
                                message  : "Data Berhasil DiSimpan!",});
                    </script> '
			);
			redirect(base_url('mhs/pendaftaran/daftar_sidang'));
		} else {
			$this->session->set_flashdata(
				'hapus',
				'<script>   iziToast.error ({
                                title    : "error",
                                message  : "Data Harus Didisi!",
                                position : "topRight"});
                    </script> '
			);
			redirect(base_url('mhs/pendaftaran/daftar_sidang'));
		}
	}
}

/* End of file Pendaftaran.php */
/* Location: ./application/controllers/mhs/Pendaftaran.php */
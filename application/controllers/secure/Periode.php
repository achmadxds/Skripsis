<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Periode extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('periode_model');
	}
	//index
	public function index()
	{
		$periode		=  $this->periode_model->listing_periode();
		$edit		    =  $this->periode_model->edit();
		$koordinator    =  $this->periode_model->koordinator();
		$kaprodi        =  $this->periode_model->kaprodi();

		$data = array(
			'title'    	  => 'Halaman Periode',
			'periode' 	  => $periode,
			'edit'	  	  => $edit,
			'koordinator' => $koordinator,
			'kaprodi'	  => $kaprodi,
			'isi'     	  => 'secure/periode/list'
		);
		$this->load->view('secure/layout/wrapper', $data, FALSE);
	}


	//tambah
	public function tambah()
	{
		//validasi input
		$valid = $this->form_validation;

		$this->form_validation->set_rules(
			'semester',
			'Semester',
			'required',
			array('required'	=> '<script> 	
								iziToast.warning({
                          		title    : "Perhatian",
                          		message  : "Kolom %s  Harus Di Isi!",});
                				</script> ')
		);

		//end validasi
		if ($valid->run() === FALSE) {
			$this->index();
		} else {
			$data = array(
				'PeriodesSemester'   		   	   => $this->input->post('semester'),
				'PeriodesTahunakademik'			   => $this->input->post('t_akademik'),
				'PeriodesSelesai'     	   		   => $this->input->post('p_selesai'),
				'PeriodesKaprodi'     	   		   => $this->enkripsi->decrypt_url($this->input->post('kaprodi')),
				'PeriodesKoordinator'     	   	   => $this->enkripsi->decrypt_url($this->input->post('koordinator'))
			);
			$this->db->insert('tperiodes', $data);

			//set daftars status akhir
			$status = $this->db->query("SELECT * FROM tdaftars")->result_array();
			foreach ($status as $status) {
				if ($status['DaftarsPeriodesId2'] == !null) {
					$data2 = array(
						'DaftarsStatusAkhir' => 2,
						'DaftarsTglSelesai'  => date('d-m-Y')
					);
					$this->db->where('DaftarsStatusAkhir', 0);
					$this->db->where('DaftarsPeriodesId2!=', null);
					$this->db->update('tdaftars', $data2);
				} else {
				}
			}

			//set periode 2 untuk mhs yg lanjut periode kedua
			$daftars = $this->db->query("SELECT * FROM tdaftars")->result_array();
			foreach ($daftars as $daftars) {

				if ($daftars['DaftarsPeriodesId2'] == null) {
					$new_periode = $this->db->query("SELECT MAX(PeriodesId) FROM tperiodes")->row_array();
					$id_p = $new_periode['MAX(PeriodesId)'];
					$data3 = array('DaftarsPeriodesId2' => $id_p);
					$this->db->where('DaftarsPeriodesId2=', null);
					$this->db->where('DaftarsStatusAkhir', 0);
					$this->db->update('tdaftars', $data3);
				} else {
				}
			}

			$this->session->set_flashdata(
				'simpan',
				'<script> 	iziToast.success ({
                          	title    : "OK",
                          	message  : "Data Berhasil DiSimpan!",});
                </script> '
			);
			redirect(base_url('secure/periode'), 'refresh');
		}
	}


	//ubah
	public function edit()
	{
		$valid 		= $this->form_validation;
		$valid->set_rules(
			'semester',
			'Semester',
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
				'PeriodesSemester'   		 => $i->post('semester'),
				'PeriodesTahunakademik'	     => $i->post('t_akademik'),
				'PeriodesSelesai'     	   	 => $i->post('p_selesai'),
				'PeriodesKaprodi'     	   		   => $this->enkripsi->decrypt_url($this->input->post('kaprodi')),
				'PeriodesKoordinator'     	   	   => $this->enkripsi->decrypt_url($this->input->post('koordinator'))
			);
			$id = $this->input->post('id');
			$decrypt_id = $this->enkripsi->decrypt_url($id);
			$this->db->where('PeriodesId', $decrypt_id);
			$this->db->update('tperiodes', $data);
			$this->session->set_flashdata(
				'edit',
				'<script> 	iziToast.info ({
                          	title    : "OK",
                          	message  : "Data Berhasil Di Ubah!",});
                </script> '
			);
			redirect(base_url('secure/periode'));
		} else {
			$this->index();
		}
		//end masuk database
	}


	//hapus
	public function hapus($id_periode)
	{
		$decrypt_id = $this->enkripsi->decrypt_url($id_periode);
		$this->db->where('PeriodesId', $decrypt_id);
		$this->db->delete('tperiodes');
		$this->session->set_flashdata(
			'hapus',
			'<script> 	iziToast.success ({
                          	title    : "OK",
                          	message  : "Data Berhasil Di Hapus!",});
                </script> '
		);
		redirect(base_url('secure/periode'), 'refresh');
	}

	//set aktif
	public function aktif($id_periode)
	{
		//set non aktif periode
		$data1 = array('PeriodesStatusAktif' => 0);
		$this->db->update('tperiodes', $data1);


		//set aktif periode
		$data2 = array('PeriodesStatusAktif' => 1);
		$decrypt_id = $this->enkripsi->decrypt_url($id_periode);
		$this->db->where('PeriodesId', $decrypt_id);
		$this->db->update('tperiodes', $data2);
		$this->session->set_flashdata(
			'simpan',
			'<script> 	iziToast.success ({
                          	title    : "OK",
                          	message  : "Periode Berhasil Di aktifkan",});
                </script> '
		);
		redirect(base_url('secure/periode'), 'refresh');
	}
}

/* End of file Periode.php */
/* Location: ./application/controllers/secure/Periode.php */
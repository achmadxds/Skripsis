<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skripsi extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('skripsi_model');
		$this->load->model('jadwal_model');
	}

	public function judul()
	{
		$periode = periode_aktif();
		$judul = $this->skripsi_model->judul($periode['PeriodesId']);
		$data = array ( 'title' 	=> 'List Judul',
						'judul' 	=> $judul,
 						'isi'		=> 'secure/skripsi/judul'
 					);
 		$this->load->view('secure/layout/wrapper', $data, FALSE);
	}

	public function penilaian()
	{
		$penilaian = $this->skripsi_model->penilaian();
		$data = array ( 'title' 	=> 'Kriteria Penilaian',
						'penilaian' => $penilaian,
 						'isi'		=> 'secure/skripsi/penilaian'
 					);
 		$this->load->view('secure/layout/wrapper', $data, FALSE);
	}

	public function niket()
	{
		$penilaian = $this->skripsi_model->penilaian();
		//validasi input
		$valid = $this->form_validation;
		$this->form_validation->set_rules('k1', 'Nilai', 'required',
		array(	'required'	=> '<script> 	
								iziToast.warning({
                          		title    : "Perhatian",
                          		message  : "Kolom %s  Harus Di Isi!",});
                				</script> ' ));

		//end validasi
		if($valid->run()){
			$i = $this->input;
			$data = array   ( 
								'NikonK1'	=> $i->post('k1')/100,
								'NikonK2'	=> $i->post('k2')/100,
								'NikonK3'	=> $i->post('k3')/100,
								'NikonK4'	=> $i->post('k4')/100
							);
			if ($penilaian['NikonId']==null) {
				$this->db->insert('tnilaikonversi', $data);
			}else{
			$id = $this->input->post('nilai');
			$this->db->where('NikonId',$id);
			$this->db->update('tnilaikonversi', $data);
			}
			
			$this->session->set_flashdata('simpan',
				'<script> 	iziToast.success ({
                          	title    : "OK",
                          	message  : "Data Berhasil DiSimpan!",});
                </script> ');
			redirect(base_url('secure/skripsi/penilaian'));

		}else{
			$this->penilaian();
		}
	}

	public function na()
	{
		$penilaian = $this->skripsi_model->penilaian();
		//validasi input
		$valid = $this->form_validation;
		$this->form_validation->set_rules('naa', 'NIlai', 'required',
		array(	'required'	=> '<script> 	
								iziToast.warning({
                          		title    : "Perhatian",
                          		message  : "Kolom %s  Harus Di Isi!",});
                				</script> ' ));

		//end validasi
		if($valid->run()){
			$i = $this->input;
			$data = array   ( 
								'NikonA'			=> $i->post('naa'),
								'NikonAB'			=> $i->post('naab'),
								'NikonB'			=> $i->post('nab'),
								'NikonBC'			=> $i->post('nabc'),
								'NikonC'			=> $i->post('nac'),
								'NikonNaPenguji1'	=> $i->post('na1')/100,
								'NikonNaPenguji2'	=> $i->post('na2')/100,
								'NikonNaPenguji3'	=> $i->post('na3')/100
							);
			if ($penilaian['NikonId']==null) {
				$this->db->insert('tnilaikonversi', $data);
			}else{
			$id = $this->input->post('nilai');
			$this->db->where('NikonId',$id);
			$this->db->update('tnilaikonversi', $data);
			}
			
			$this->session->set_flashdata('simpan',
				'<script> 	iziToast.success ({
                          	title    : "OK",
                          	message  : "Data Berhasil DiSimpan!",});
                </script> ');
			redirect(base_url('secure/skripsi/penilaian'));

		}else{
			$this->penilaian();
		}
	}

//detail penilaian///////////////////////////////////////
	public function nilai_seminar()
	{
		$periode=periode_aktif();
		$seminar = $this->skripsi_model->seminar_lulus($periode['PeriodesId']);
		$data = array ( 'title' 	=> 'Hasil Seminar',
						'seminar' 	=> $seminar,
 						'isi'		=> 'secure/skripsi/seminar'
 					);
 		$this->load->view('secure/layout/wrapper', $data, FALSE);
	}

	public function nilai_sidang()
	{
		$periode=periode_aktif();
		$sidang = $this->skripsi_model->sidang_lulus($periode['PeriodesId']);
		$data = array ( 'title' 	=> 'Hasil Sidang',
						'sidang' 	=> $sidang,
 						'isi'		=> 'secure/skripsi/sidang'
 					);
 		$this->load->view('secure/layout/wrapper', $data, FALSE);
	}

	public function nilai_akhir()
	{
		$periode=periode_aktif();
		$na = $this->skripsi_model->na_lulus($periode['PeriodesId']);
		$data = array ( 'title' 	=> 'Hasil Nilai Akhir',
						'na'	 	=> $na,
 						'isi'		=> 'secure/skripsi/na'
 					);
 		$this->load->view('secure/layout/wrapper', $data, FALSE);
	}



}

/* End of file Skripsi.php */
/* Location: ./application/controllers/secure/Skripsi.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bimbingan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('bimbingan_model');
	} 
////index///
	public function index()
	{   
	$periode       =  periode_aktif();
	$id_mhs        = $this->session->userdata('MhsNim');
    $bimbingan     = $this->bimbingan_model->list_bimbingan($id_mhs);
    $cek_sempro    = $this->bimbingan_model->cek_sempro($id_mhs);
    $cek_sidang    = $this->bimbingan_model->cek_sidang($id_mhs);
    $cek_dosbing    = $this->bimbingan_model->cek_dosbing($id_mhs);
    $dosen1		   = $this->db->query("
    	                   SELECT tdosbings.DosbingsDosenId1, tdaftars.daftarsId
                           FROM tdosbings
                           JOIN tdaftars ON tdaftars.DaftarsId = tdosbings.DosbingsDaftarsId
                           WHERE tdaftars.DaftarsNIM='$id_mhs'")->row_array();
    $dosen2		   = $this->db->query("
    	                   SELECT tdosbings.DosbingsDosenId2, tdaftars.daftarsId
                           FROM tdosbings
                           JOIN tdaftars ON tdaftars.DaftarsId = tdosbings.DosbingsDaftarsId
                           WHERE tdaftars.DaftarsNIM='$id_mhs'")->row_array();
    $ketua		   = $this->db->query("
    	                   SELECT tdosbings.DosbingsKetua, tdaftars.daftarsId
                           FROM tdosbings
                           JOIN tdaftars ON tdaftars.DaftarsId = tdosbings.DosbingsDaftarsId
                           WHERE tdaftars.DaftarsNIM='$id_mhs'")->row_array();
    $tamu		   = $this->db->query("
    	                   SELECT tdosbings.DosbingsTamu, tdaftars.daftarsId
                           FROM tdosbings
                           JOIN tdaftars ON tdaftars.DaftarsId = tdosbings.DosbingsDaftarsId
                           WHERE tdaftars.DaftarsNIM='$id_mhs'")->row_array();
    $cek_status1   = $this->bimbingan_model->cek_status_bimbingan1($id_mhs,$dosen1['DosbingsDosenId1']);
    $cek_status2   = $this->bimbingan_model->cek_status_bimbingan2($id_mhs,$dosen2['DosbingsDosenId2']);
    $cek_status3   = $this->bimbingan_model->cek_status_bimbingan3($id_mhs,$ketua['DosbingsKetua']);
    $cek_status4   = $this->bimbingan_model->cek_status_bimbingan4($id_mhs,$tamu['DosbingsTamu']);
    $riwayat1	   = $this->bimbingan_model->riwayat_bimbingan1($id_mhs,$dosen1['DosbingsDosenId1']);
    $riwayat2	   = $this->bimbingan_model->riwayat_bimbingan2($id_mhs,$dosen2['DosbingsDosenId2']);
    $riwayat3	   = $this->bimbingan_model->riwayat_bimbingan3($id_mhs,$ketua['DosbingsKetua']);
    $riwayat4	   = $this->bimbingan_model->riwayat_bimbingan4($id_mhs,$tamu['DosbingsTamu']);

    

		$data = array ( 'title' 	  => 'Halaman Bimbingan',
						'bimbingan'   => $bimbingan,
						'cek_status1' => $cek_status1,
						'cek_status2' => $cek_status2,
						'cek_status3' => $cek_status3,
						'cek_status4' => $cek_status4,
						'riwayat1'    => $riwayat1,
						'riwayat2'    => $riwayat2,
						'riwayat3'    => $riwayat3,
						'riwayat4'    => $riwayat4,
						'cek_sempro'  => $cek_sempro,
						'cek_sidang'  => $cek_sidang,
						'cek_dosbing' => $cek_dosbing,
 						'isi'		  => 'mhs/bimbingan/list'
 					);
 		$this->load->view('mhs/layout/wrapper', $data, FALSE);
	}

/////bimbingan1
	public function bimbingan_dosbing1()
	{
		$periode=periode_aktif();
		//validasi input
		// $valid = $this->form_validation;

		// $this->form_validation->set_rules('bab1', 'BAB', 'required',
		// array(	'required'	=> '<script> 	
		// 						iziToast.warning({
  //                         		title    : "Perhatian",
  //                         		message  : "Kolom %s  Harus Di Isi!",});
  //               				</script> ' ));

		if (empty($_FILES['file1']['name'])) {
			$this->session->set_flashdata('hapus',
				'<script> 	iziToast.error ({
                          	title    : "error",
                          	message  : "File Bimbingan Harus Diisi",});
                </script> ');
		}

		//end validasi
		if (isset($_POST['submit'])){
			$config['upload_path']          = './assets/upload/bimbingan';
                    $config['allowed_types']        = 'rar|jpg|png|pdf|docx';
                    $config['max_size']               = 2048;
                    $config['max_width']              = 2048;
                    $config['max_height']             = 2048;
                    $config['encrypt_name']           = TRUE;
                    $this->load->library('upload', $config);

                   if (!empty($_FILES['file1']['name'])) {
                       $this->upload->do_upload('file1');
                       $data1 = $this->upload->data();
                       $file1= $data1['file_name'];

                       $i = $this->input;
					   $data = array (
						    'BimbingansMhsNim'  => $this->session->userdata('MhsNim'),
						    'BimbingansDosbingsId'	=> $this->enkripsi->decrypt_url($i->post('dosbing')),
				            'BimbingansDosenId'		=> $this->enkripsi->decrypt_url($i->post('dosbing1')),
				            'BimbingansPeriodeId'=> $periode['PeriodesId'],
							'BimbingansBab'   	=> $i->post('bab1'),
							'BimbingansFile'	=> $file1,
							'BimbingansTgl'		=> date('Y-m-d'),
							'BimbingansStatus'	=> 0,
							'BimbingansKet'		=> $i->post('ket1')
						);
			            $this->db->insert('tbimbingans', $data);

			$id_dosbing=$this->enkripsi->decrypt_url($i->post('dosbing'));
			$mhs=$this->db->query("SELECT * from tdaftars
									join tdosbings on tdosbings.DosbingsDaftarsId=tdaftars.DaftarsId
									join tmhs on tmhs.MhsNim=tdaftars.DaftarsNIM
									where DosbingsId='$id_dosbing'")->row_array();
			$mhs_nama= $mhs['MhsNama'];
			$id_dosen1=$this->enkripsi->decrypt_url($i->post('dosbing1'));
			$dosen=$this->db->query("SELECT * from tdosen where DosenId='$id_dosen1'")->row_array();
			$nomorwa=$dosen['DosenNohp'];
			$isipesan= "_________ PORTAL SKRIPSI SI _________

			Mohon Maaf Bpk/Ibu, Mahasiswa Bimbingan anda : '$mhs_nama' 
			Ingin Melakukan Bimbingan, Tolong Segera Di Cek ya Terimakasih";
            $this->wa->kirimWablas($nomorwa,$isipesan);


			 $id_mhs = $this->session->userdata('MhsNim');
			 $daftar_id = $this->db->query(" SELECT DaftarsId FROM tdaftars
                                   WHERE DaftarsNIM='$id_mhs' ")->row_array();
             $cek_judul1 = $this->db->query(" SELECT tskripsi.*, tdaftars.DaftarsNIM
                                   FROM tskripsi
                                   JOIN tdaftars on tdaftars.DaftarsId = tskripsi.SkripsiDaftarsId
                                   WHERE tdaftars.DaftarsNIM='$id_mhs' ")->row_array();
            $bab1 = $i->post('bab1');

			if ($bab1=='judul') {
				$data2 = array ('SkripsiJudul'	=> $i->post('judul1'),
				            'SkripsiDaftarsId'	=> $daftar_id['DaftarsId'],
							'SkripsiMhsNim'	=> $this->session->userdata('MhsNim'));
                    if ($cek_judul1['SkripsiJudul']==!null) {
                        $this->db->where('SkripsiMhsNim',$id_mhs);
                        $this->db->update('tskripsi',$data2);
                     } else{
                     	$this->db->insert('tskripsi',$data2);
                     }
			}else{
			}

			         $this->session->set_flashdata('simpan',
						'<script> 	iziToast.success ({
		                          	title    : "OK",
		                          	message  : "Data Berhasil DiSimpan!",});
		                </script> ');
					}
					redirect(base_url('mhs/bimbingan'));
			
			}else{
				    $this->session->set_flashdata('error',
						'<script> 	iziToast.success ({
		                          	title    : "Error",
		                          	message  : "Data Tidak Berhasil DiSimpan!",});
		                </script> ');
					redirect(base_url('mhs/bimbingan'));
			}

    }

/////bimbingan2
	public function bimbingan_dosbing2()
	{
		$periode=periode_aktif();
		//validasi input
		// $valid = $this->form_validation;

		// $this->form_validation->set_rules('bab1', 'BAB', 'required',
		// array(	'required'	=> '<script> 	
		// 						iziToast.warning({
  //                         		title    : "Perhatian",
  //                         		message  : "Kolom %s  Harus Di Isi!",});
  //               				</script> ' ));

		if (empty($_FILES['file2']['name'])) {
			$this->session->set_flashdata('hapus',
				'<script> 	iziToast.error ({
                          	title    : "error",
                          	message  : "File Bimbingan Harus Diisi",});
                </script> ');
		}

		//end validasi
		if (isset($_POST['submit'])){
			$config['upload_path']          = './assets/upload/bimbingan';
                    $config['allowed_types']        = 'rar|jpg|png|pdf|docx';
                    $config['max_size']               = 2048;
                    $config['max_width']              = 2048;
                    $config['max_height']             = 2048;
                    $config['encrypt_name']           = TRUE;
                    $this->load->library('upload', $config);

                   if (!empty($_FILES['file2']['name'])) {
                       $this->upload->do_upload('file2');
                       $data2 = $this->upload->data();
                       $file2= $data2['file_name'];

                       $i = $this->input;
					   $data = array (
						    'BimbingansMhsNim'   	=> $this->session->userdata('MhsNim'),
						    'BimbingansDosbingsId'	=> $this->enkripsi->decrypt_url($i->post('dosbing')),
				            'BimbingansDosenId'		=> $this->enkripsi->decrypt_url($i->post('dosbing2')),
				            'BimbingansPeriodeId'=> $periode['PeriodesId'],
							'BimbingansBab'   		=> $i->post('bab2'),
							'BimbingansFile'		=> $file2,
							'BimbingansTgl'			=> date('Y-m-d'),
							'BimbingansStatus'		=> 0,
							'BimbingansKet'			=> $i->post('ket2')
								);
			            $this->db->insert('tbimbingans', $data);

			$id_dosbing=$this->enkripsi->decrypt_url($i->post('dosbing'));
			$mhs=$this->db->query("SELECT * from tdaftars
									join tdosbings on tdosbings.DosbingsDaftarsId=tdaftars.DaftarsId
									join tmhs on tmhs.MhsNim=tdaftars.DaftarsNIM
									where DosbingsId='$id_dosbing'")->row_array();
			$mhs_nama= $mhs['MhsNama'];
			$id_dosen2=$this->enkripsi->decrypt_url($i->post('dosbing2'));
			$dosen=$this->db->query("SELECT * from tdosen where DosenId='$id_dosen2'")->row_array();
			$nomorwa=$dosen['DosenNohp'];
			$isipesan= "_________ PORTAL SKRIPSI SI _________

			Mohon Maaf Bpk/Ibu, Mahasiswa Bimbingan anda : '$mhs_nama' 
			Ingin Melakukan Bimbingan, Tolong Segera Di Cek ya Terimakasih";
            $this->wa->kirimWablas($nomorwa,$isipesan);


			 $id_mhs = $this->session->userdata('MhsNim');
			 $daftar_id = $this->db->query(" SELECT DaftarsId FROM tdaftars
                                   WHERE DaftarsNIM='$id_mhs' ")->row_array();
             $cek_judul2 = $this->db->query(" SELECT tskripsi.*, tdaftars.DaftarsNIM
                                   FROM tskripsi
                                   JOIN tdaftars on tdaftars.DaftarsId = tskripsi.SkripsiDaftarsId
                                   WHERE tdaftars.DaftarsNIM='$id_mhs' ")->row_array();


			$bab2 = $i->post('bab2');
			if ($bab2=='judul') {
				$data2 = array ('SkripsiJudul'	=> $i->post('judul2'),
				            'SkripsiDaftarsId'	=> $daftar_id['DaftarsId'],
							'SkripsiMhsNim'	=> $this->session->userdata('MhsNim'));
                    if ($cek_judul2['SkripsiJudul']==!null) {
                        $this->db->where('SkripsiMhsNim',$id_mhs);
                        $this->db->update('tskripsi',$data2);
                     } else{
                     	$this->db->insert('tskripsi',$data2);
                     }
			}else{
			}

			            $this->session->set_flashdata('simpan',
						'<script> 	iziToast.success ({
		                          	title    : "OK",
		                          	message  : "Data Berhasil DiSimpan!",});
		                </script> ');
					}

					redirect(base_url('mhs/bimbingan'));
			
			}else{
				    $this->session->set_flashdata('error',
						'<script> 	iziToast.success ({
		                          	title    : "Error",
		                          	message  : "Data Tidak Berhasil DiSimpan!",});
		                </script> ');
					redirect(base_url('mhs/bimbingan'));
			}

    }

    /////bimbingan3
	public function bimbingan_dosbing3()
	{
		$periode=periode_aktif();
		//validasi input
		// $valid = $this->form_validation;

		// $this->form_validation->set_rules('bab1', 'BAB', 'required',
		// array(	'required'	=> '<script> 	
		// 						iziToast.warning({
  //                         		title    : "Perhatian",
  //                         		message  : "Kolom %s  Harus Di Isi!",});
  //               				</script> ' ));

		if (empty($_FILES['file3']['name'])) {
			$this->session->set_flashdata('hapus',
				'<script> 	iziToast.error ({
                          	title    : "error",
                          	message  : "File Bimbingan Harus Diisi",});
                </script> ');
		}

		//end validasi
		if (isset($_POST['submit'])){
			$config['upload_path']          = './assets/upload/bimbingan';
                    $config['allowed_types']        = 'rar|jpg|png|pdf|docx';
                    $config['max_size']               = 2048;
                    $config['max_width']              = 2048;
                    $config['max_height']             = 2048;
                    $config['encrypt_name']           = TRUE;
                    $this->load->library('upload', $config);

                   if (!empty($_FILES['file3']['name'])) {
                       $this->upload->do_upload('file3');
                       $data3 = $this->upload->data();
                       $file3= $data3['file_name'];

                       $i = $this->input;
					   $data = array (
						    'BimbingansMhsNim'   	=> $this->session->userdata('MhsNim'),
						    'BimbingansDosbingsId'	=> $this->enkripsi->decrypt_url($i->post('dosbing')),
				            'BimbingansDosenId'		=> $this->enkripsi->decrypt_url($i->post('dosbing3')),
				            'BimbingansPeriodeId'=> $periode['PeriodesId'],
							'BimbingansBab'   		=> $i->post('bab3'),
							'BimbingansFile'		=> $file3,
							'BimbingansTgl'			=> date('Y-m-d'),
							'BimbingansStatus'		=> 0,
							'BimbingansKet'			=> $i->post('ket3')
								);
			            $this->db->insert('tbimbingans', $data);

			$id_dosbing=$this->enkripsi->decrypt_url($i->post('dosbing'));
			$mhs=$this->db->query("SELECT * from tdaftars
									join tdosbings on tdosbings.DosbingsDaftarsId=tdaftars.DaftarsId
									join tmhs on tmhs.MhsNim=tdaftars.DaftarsNIM
									where DosbingsId='$id_dosbing'")->row_array();
			$mhs_nama= $mhs['MhsNama'];
			$id_dosen3=$this->enkripsi->decrypt_url($i->post('dosbing3'));
			$dosen=$this->db->query("SELECT * from tdosen where DosenId='$id_dosen3'")->row_array();
			$nomorwa=$dosen['DosenNohp'];
			$isipesan= "_________ PORTAL SKRIPSI SI _________

			Mohon Maaf Bpk/Ibu, Mahasiswa Bimbingan anda : '$mhs_nama' 
			Ingin Melakukan Bimbingan, Tolong Segera Di Cek ya Terimakasih";
            $this->wa->kirimWablas($nomorwa,$isipesan);
			

			            $this->session->set_flashdata('simpan',
						'<script> 	iziToast.success ({
		                          	title    : "OK",
		                          	message  : "Data Berhasil DiSimpan!",});
		                </script> ');
					}

					redirect(base_url('mhs/bimbingan'));
			
			}else{
				    $this->session->set_flashdata('error',
						'<script> 	iziToast.success ({
		                          	title    : "Error",
		                          	message  : "Data Tidak Berhasil DiSimpan!",});
		                </script> ');
					redirect(base_url('mhs/bimbingan'));
			}

    }

    /////bimbingan4
	public function bimbingan_dosbing4()
	{
		$periode=periode_aktif();
		//validasi input
		// $valid = $this->form_validation;

		// $this->form_validation->set_rules('bab1', 'BAB', 'required',
		// array(	'required'	=> '<script> 	
		// 						iziToast.warning({
  //                         		title    : "Perhatian",
  //                         		message  : "Kolom %s  Harus Di Isi!",});
  //               				</script> ' ));

		if (empty($_FILES['file4']['name'])) {
			$this->session->set_flashdata('hapus',
				'<script> 	iziToast.error ({
                          	title    : "error",
                          	message  : "File Bimbingan Harus Diisi",});
                </script> ');
		}

		//end validasi
		if (isset($_POST['submit'])){
			$config['upload_path']          = './assets/upload/bimbingan';
                    $config['allowed_types']        = 'rar|jpg|png|pdf|docx';
                    $config['max_size']               = 2048;
                    $config['max_width']              = 2048;
                    $config['max_height']             = 2048;
                    $config['encrypt_name']           = TRUE;
                    $this->load->library('upload', $config);

                   if (!empty($_FILES['file4']['name'])) {
                       $this->upload->do_upload('file3');
                       $data4 = $this->upload->data();
                       $file4= $data4['file_name'];

                       $i = $this->input;
					   $data = array (
						    'BimbingansMhsNim'   	=> $this->session->userdata('MhsNim'),
						    'BimbingansDosbingsId'	=> $this->enkripsi->decrypt_url($i->post('dosbing')),
				            'BimbingansDosenId'		=> $this->enkripsi->decrypt_url($i->post('dosbing4')),
				            'BimbingansPeriodeId'=> $periode['PeriodesId'],
							'BimbingansBab'   		=> $i->post('bab4'),
							'BimbingansFile'		=> $file4,
							'BimbingansTgl'			=> date('Y-m-d'),
							'BimbingansStatus'		=> 0,
							'BimbingansKet'			=> $i->post('ket4')
								);
			            $this->db->insert('tbimbingans', $data);

			$id_dosbing=$this->enkripsi->decrypt_url($i->post('dosbing'));
			$mhs=$this->db->query("SELECT * from tdaftars
									join tdosbings on tdosbings.DosbingsDaftarsId=tdaftars.DaftarsId
									join tmhs on tmhs.MhsNim=tdaftars.DaftarsNIM
									where DosbingsId='$id_dosbing'")->row_array();
			$mhs_nama= $mhs['MhsNama'];
			$id_dosen4=$this->enkripsi->decrypt_url($i->post('dosbing4'));
			$dosen=$this->db->query("SELECT * from tdosen where DosenId='$id_dosen4'")->row_array();
			$nomorwa=$dosen['DosenNohp'];
			$isipesan= "_________ PORTAL SKRIPSI SI _________

			Mohon Maaf Bpk/Ibu, Mahasiswa Bimbingan anda : '$mhs_nama' 
			Ingin Melakukan Bimbingan, Tolong Segera Di Cek ya Terimakasih";
            $this->wa->kirimWablas($nomorwa,$isipesan);
			

			            $this->session->set_flashdata('simpan',
						'<script> 	iziToast.success ({
		                          	title    : "OK",
		                          	message  : "Data Berhasil DiSimpan!",});
		                </script> ');
					}

					redirect(base_url('mhs/bimbingan'));
			
			}else{
				    $this->session->set_flashdata('error',
						'<script> 	iziToast.success ({
		                          	title    : "Error",
		                          	message  : "Data Tidak Berhasil DiSimpan!",});
		                </script> ');
					redirect(base_url('mhs/bimbingan'));
			}

    }


/////cetak bimbingan
	public function cetak_bimbingan()
	{
		$mhs     = $this->session->userdata('MhsNim');
		$dosbing = $this->bimbingan_model->dosbing($mhs);
		$judul = $this->bimbingan_model->cek_judul($mhs);

		$dosen1		   = $this->db->query("
    	                   SELECT tdosbings.DosbingsDosenId1, tdaftars.daftarsId
                           FROM tdosbings
                           JOIN tdaftars ON tdaftars.DaftarsId = tdosbings.DosbingsDaftarsId
                           WHERE tdaftars.DaftarsNIM='$mhs'")->row_array();
	    $dosen2		   = $this->db->query("
	    	                   SELECT tdosbings.DosbingsDosenId2, tdaftars.daftarsId
	                           FROM tdosbings
	                           JOIN tdaftars ON tdaftars.DaftarsId = tdosbings.DosbingsDaftarsId
	                           WHERE tdaftars.DaftarsNIM='$mhs'")->row_array();
	    $cek_status1   = $this->bimbingan_model->cek_status_bimbingan1($mhs,$dosen1['DosbingsDosenId1']);
	    $cek_status2   = $this->bimbingan_model->cek_status_bimbingan2($mhs,$dosen2['DosbingsDosenId2']);
	    $riwayat1	   = $this->bimbingan_model->riwayat_bimbingan1($mhs,$dosen1['DosbingsDosenId1']);
	    $riwayat2	   = $this->bimbingan_model->riwayat_bimbingan2($mhs,$dosen2['DosbingsDosenId2']);
	    $cek_sempro    = $this->bimbingan_model->cek_sempro($mhs);

		$data = array(  'title'  => 'Cetak Bimbingan',
					    'dosbing'=> $dosbing,
					    'judul'	=> $judul,
					    'cek_status1' => $cek_status1,
						'cek_status2' => $cek_status2,
						'riwayat1'    => $riwayat1,
						'riwayat2'    => $riwayat2,
						'cek_sempro'  => $cek_sempro,
					    'isi'    => 'mhs/bimbingan/cetak_bimbingan'
		);
		$this->load->view('mhs/bimbingan/cetak_bimbingan', $data, FALSE);
	}



}

/* End of file Bimbingan.php */
/* Location: ./application/controllers/mhs/Bimbingan.php */
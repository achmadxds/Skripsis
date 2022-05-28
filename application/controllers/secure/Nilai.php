<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('nilai_model');
		$this->load->model('skripsi_model');

	}


/////////////nilai seminar///////////////////
	public function seminar()
	{
		$id_dosen     = $this->session->userdata('UserId');
		$nilai_ketua  = $this->nilai_model->nilai_seminar_ketua($id_dosen);
		$nilai_dosen  = $this->nilai_model->nilai_seminar_dosen($id_dosen);
		$edit_nilai_dosen  = $this->nilai_model->edit_nilai_seminar_dosen($id_dosen);
		$edit_nilai_ketua  = $this->nilai_model->edit_nilai_seminar_ketua($id_dosen);
		// var_dump($nilai_dosen);
		// exit();
		$data = array( 'title'  	=> 'Halaman Penilaian Seminar',
					   'nilai_ketua' => $nilai_ketua,
					   'nilai_dosen' => $nilai_dosen,
					   'edit_nilai_dosen' => $edit_nilai_dosen,
					   'edit_nilai_ketua' => $edit_nilai_ketua,
					   'isi'    	=> 'secure/nilai/seminar'
		);
		$this->load->view('secure/layout/wrapper', $data, FALSE);
	}

	public function penilaian_seminar_d()
	{
		    $valid = $this->form_validation;
			$this->form_validation->set_rules('revisi', 'Revisi', 'required',
			array(	'required'	=> '<script> 	
								iziToast.warning({
                          		title    : "Perhatian",
                          		message  : "Kolom %s  Harus Di Isi!",});
                				</script> ' ));

	 		if($valid->run()){
	 		$i = $this->input;
			$data = array     ( 	
					'DetsemDafsemId'	=> $this->enkripsi->decrypt_url($i->post('daftar')),
					'DetsemSemproId'	=> $this->enkripsi->decrypt_url($i->post('sempro')),
					'DetsemDosenId'	    => $this->session->userdata('UserId'),
					'DetsemLevelDosen'	=> $i->post('level'),
					'DetsemKetRevisi'	=> $i->post('revisi'),
					'DetsemTgl'			=> date('d-m-y')
				               );
		
	        $this->db->insert('tdetailsempro',$data);
			$this->session->set_flashdata('simpan',
				'<script> 	iziToast.success ({
                          	title    : "OK",
                          	message  : "Data Berhasil Di Simpan!",});
                </script> ');
			redirect(base_url('secure/nilai/seminar'),'refresh');
			}else{
			$this->seminar();
	        }
    }

    public function edit_penilaian_seminar_d()
	{
		    $valid = $this->form_validation;
			$this->form_validation->set_rules('revisi_d', 'Revisi', 'required',
			array(	'required'	=> '<script> 	
								iziToast.warning({
                          		title    : "Perhatian",
                          		message  : "Kolom %s  Harus Di Isi!",});
                				</script> ' ));

	 		if($valid->run()){
	 		$i = $this->input;
			$data = array   ( 	
					             'DetsemKetRevisi'	=> $i->post('revisi_d')
				             );
			$id = $this->enkripsi->decrypt_url($i->post('detsem'));
            $this->db->where('DetsemId',$id);
            $this->db->where('DetsemDosenId',$this->session->userdata('UserId'));
            $this->db->update('tdetailsempro',$data);

			$this->session->set_flashdata('simpan',
				'<script> 	iziToast.success ({
                          	title    : "OK",
                          	message  : "Data Berhasil Di Simpan!",});
                </script> ');
			redirect(base_url('secure/nilai/seminar'),'refresh');
			}else{
			$this->seminar();
	        }
    }


	public function penilaian_seminar_k()
	{
		 $valid = $this->form_validation;
			$this->form_validation->set_rules('revisi', 'Revisi', 'required',
			array(	'required'	=> '<script> 	
								iziToast.warning({
                          		title    : "Perhatian",
                          		message  : "Kolom %s  Harus Di Isi!",});
                				</script> ' ));

	 		if($valid->run()){
	 		$i = $this->input;
			$data = array     ( 	
					'DetsemDafsemId'	=> $this->enkripsi->decrypt_url($i->post('daftar')),
					'DetsemSemproId'	=> $this->enkripsi->decrypt_url($i->post('sempro')),
					'DetsemDosenId'	    => $this->session->userdata('UserId'),
					'DetsemLevelDosen'	=> $i->post('level'),
					'DetsemKetRevisi'	=> $i->post('revisi'),
					'DetsemTgl'			=> date('d-m-y')
				               );
	        $this->db->insert('tdetailsempro',$data);

	        $data2 = array     ( 	
					'SemproHasil'	=> 1,
					'SemproStatusRevisi' => $i->post('status_revisi')
				               );
	        $data3 = array     ( 	
					'SemproHasil'	=> 2,
					'SemproStatusRevisi' => $i->post('status_revisi')
				               );
	        $id = $this->enkripsi->decrypt_url($i->post('sempro'));
	        if ($i->post('hasil')==1) {
	        $this->db->where('SemproId',$id);
	        $this->db->update('tsempro',$data2);
	        }else{
	        $this->db->where('SemproId',$id);
	        $this->db->update('tsempro',$data3);
	        }

	        $mhs=$this->db->query("
                SELECT tmhs.MhsNama,tmhs.MhsNohp,tdaftars.DaftarsNIM from tsempro
				join tdaftarsempro on tdaftarsempro.DafsemId=tsempro.SemproDafsemId
				join tdaftars on tdaftars.DaftarsId=tdaftarsempro.DafsemDaftarsId
				join tmhS on tmhs.MhsNim=tdaftars.DaftarsNIM
				WHERE tsempro.SemproId='$id'")->row_array();
	        $mhs_nama=$mhs['MhsNama'];
	        $mhs_nohp=$mhs['MhsNohp'];
	        $pesan1= "_________ PORTAL SKRIPSI SI _________

Halo, '$mhs_nama' Nilai seminar kamu Sedang Diproses !
Ditunggu ya ";
			$this->wa->kirimWablas($mhs_nohp,$pesan1);
	        

			$this->session->set_flashdata('simpan',
				'<script> 	iziToast.success ({
                          	title    : "OK",
                          	message  : "Data Berhasil Di Simpan!",});
                </script> ');
			redirect(base_url('secure/nilai/seminar'),'refresh');
			}else{
			$this->seminar();
	        }
	}

	public function edit_penilaian_seminar_k()
	{
		    $valid = $this->form_validation;
			$this->form_validation->set_rules('revisi_k', 'Revisi', 'required',
			array(	'required'	=> '<script> 	
								iziToast.warning({
                          		title    : "Perhatian",
                          		message  : "Kolom %s  Harus Di Isi!",});
                				</script> ' ));

	 		if($valid->run()){
	 		$i = $this->input;
			$data = array   ( 	
					             'DetsemKetRevisi'	=> $i->post('revisi_k')
				             );
					$id = $this->enkripsi->decrypt_url($i->post('detsem'));
	                $this->db->where('DetsemId',$id);
	                $this->db->update('tdetailsempro',$data);

	        $data2 = array     ( 	
					'SemproHasil'	=> $i->post('hasil'),
					'SemproStatusRevisi' => $i->post('status_revisi')
				               );
	        $id = $this->enkripsi->decrypt_url($i->post('sempro'));
	        $this->db->where('SemproId',$id);
	        $this->db->update('tsempro',$data2);

			$this->session->set_flashdata('simpan',
				'<script> 	iziToast.success ({
                          	title    : "OK",
                          	message  : "Data Berhasil Di Simpan!",});
                </script> ');
			redirect(base_url('secure/nilai/seminar'),'refresh');
			}else{
			$this->seminar();
	        }
    }


////////////Sidang//////////////////////////
	public function sidang()
	{
		$id_dosen     = $this->session->userdata('UserId');
		$nilai_dosen  = $this->nilai_model->nilai_sidang_dosen($id_dosen);
		$nilai_ketua  = $this->nilai_model->nilai_sidang_ketua($id_dosen);
		$nilai_tamu  = $this->nilai_model->nilai_sidang_tamu($id_dosen);
		$edit_nilai_dosen  = $this->nilai_model->edit_nilai_sidang_dosen($id_dosen);
		$edit_nilai_tamu  = $this->nilai_model->edit_nilai_sidang_tamu($id_dosen);
		$edit_nilai_ketua  = $this->nilai_model->edit_nilai_sidang_ketua($id_dosen);
		$data = array( 'title'  	=> 'Halaman Penilaian Sidang',
					   'nilai_dosen' => $nilai_dosen,
					   'nilai_ketua' => $nilai_ketua,
					   'nilai_tamu'  => $nilai_tamu,
					   'edit_nilai_dosen' => $edit_nilai_dosen,
					   'edit_nilai_tamu' => $edit_nilai_tamu,
					   'edit_nilai_ketua' => $edit_nilai_ketua,
					   'isi'    	=> 'secure/nilai/sidang'
		);
		$this->load->view('secure/layout/wrapper', $data, FALSE);
	}

	public function penilaian_sidang_d()
	{
		    $valid = $this->form_validation;
			$this->form_validation->set_rules('revisi', 'Revisi', 'required',
			array(	'required'	=> '<script> 	
								iziToast.warning({
                          		title    : "Perhatian",
                          		message  : "Kolom %s  Harus Di Isi!",});
                				</script> ' ));

	 		if($valid->run()){
	 		$i = $this->input;
			$data = array     ( 	
					'DetsidDafsidId'	=> $this->enkripsi->decrypt_url($i->post('daftar')),
					'DetsidSidangId'	=> $this->enkripsi->decrypt_url($i->post('sidang')),
					'DetsidDosenId'	    => $this->session->userdata('UserId'),
					'DetsidLevelDosen'	=> $i->post('level'),
					'DetsidKetRevisi'	=> $i->post('revisi'),
					'DetsidTgl'			=> date('d-m-y')
				               );
	        $this->db->insert('tdetailsidang',$data);

	        $level = $i->post('level');

	        if ($level==3) {
	        // memasukkan id Tamu sidang ke tdosbings
	        $id_daftar_sidang=$this->enkripsi->decrypt_url($i->post('daftar'));
	        $daftar_sidang = $this->db->query("SELECT DafsidDaftarsId from tdaftarsidang where DafsidId='$id_daftar_sidang' order by DafsidId Desc ")->row_array();
	        $id_daftars= $daftar_sidang['DafsidDaftarsId'];
	        $dosbing = $this->db->query("SELECT * from tdosbings where DosbingsDaftarsId='$id_daftars' order by DosbingsId Desc ")->row_array();
	        $id_dosbing = $dosbing['DosbingsDaftarsId'];
	        $data2 =array ('DosbingsTamu'=>$this->session->userdata('UserId'));
	        $this->db->where('DosbingsDaftarsId',$id_dosbing);
	        $this->db->update('tdosbings',$data2);
	        }
	        

			$this->session->set_flashdata('simpan',
				'<script> 	iziToast.success ({
                          	title    : "OK",
                          	message  : "Data Berhasil Di Simpan!",});
                </script> ');
			redirect(base_url('secure/nilai/sidang'),'refresh');
			}else{
			$this->seminar();
	        }
    }

    public function edit_penilaian_sidang_d()
	{
		    $valid = $this->form_validation;
			$this->form_validation->set_rules('revisi_d', 'Revisi', 'required',
			array(	'required'	=> '<script> 	
								iziToast.warning({
                          		title    : "Perhatian",
                          		message  : "Kolom %s  Harus Di Isi!",});
                				</script> ' ));

	 		if($valid->run()){
	 		$i = $this->input;
			$data = array   ( 	
					             'DetsidKetRevisi'	=> $i->post('revisi_d')
				             );
			$id = $this->enkripsi->decrypt_url($i->post('detsid'));
            $this->db->where('DetsidId',$id);
            $this->db->where('DetsidDosenId',$this->session->userdata('UserId'));
            $this->db->update('tdetailsidang',$data);

			$this->session->set_flashdata('simpan',
				'<script> 	iziToast.success ({
                          	title    : "OK",
                          	message  : "Data Berhasil Di Simpan!",});
                </script> ');
			redirect(base_url('secure/nilai/sidang'),'refresh');
			}else{
			$this->seminar();
	        }
    }


	public function penilaian_sidang_k()
	{
		 $valid = $this->form_validation;
			$this->form_validation->set_rules('revisi', 'Revisi', 'required',
			array(	'required'	=> '<script> 	
								iziToast.warning({
                          		title    : "Perhatian",
                          		message  : "Kolom %s  Harus Di Isi!",});
                				</script> ' ));

	 		if($valid->run()){
	 		$i = $this->input;
			$data = array     ( 	
					'DetsidDafsidId'	=> $this->enkripsi->decrypt_url($i->post('daftar')),
					'DetsidSidangId'	=> $this->enkripsi->decrypt_url($i->post('sidang')),
					'DetsidDosenId'	    => $this->session->userdata('UserId'),
					'DetsidLevelDosen'	=> $i->post('level'),
					'DetsidKetRevisi'	=> $i->post('revisi'),
					'DetsidTgl'			=> date('d-m-y')
				               );
	        $this->db->insert('tdetailsidang',$data);

	        $data2 = array     ( 	
					'SidangHasil'	=> 1
				               );

	        $data3 = array     ( 	
					'SidangHasil'	=> 2
				               );

	        $id = $this->enkripsi->decrypt_url($i->post('sidang'));
	        //jika hasil 1
	        if ($i->post('hasil')==1) {
	        $this->db->where('SidangId',$id);
	        $this->db->update('tsidang',$data2);

	        // memasukkan id ketua sidang ke tdosbings
	        $id_daftar_sidang = $this->enkripsi->decrypt_url($i->post('daftar'));
	        $daftar_sidang = $this->db->query("SELECT DafsidDaftarsId from tdaftarsidang where DafsidId='$id_daftar_sidang' order by DafsidId Desc ")->row_array();
	        $id_daftars= $daftar_sidang['DafsidDaftarsId'];
	        $dosbing = $this->db->query("SELECT * from tdosbings where DosbingsDaftarsId='$id_daftars' order by DosbingsId Desc ")->row_array();
	        $id_dosbing = $dosbing['DosbingsDaftarsId'];
	        $data4 =array ('DosbingsKetua'=>$this->session->userdata('UserId')  );
	        $this->db->where('DosbingsDaftarsId',$id_dosbing);
	        $this->db->update('tdosbings',$data4);
	        //jika hasil selain 1
	        }else{
	        $this->db->where('SidangId',$id);
	        $this->db->update('tsidang',$data3);
	        }

	        $mhs=$this->db->query("
                SELECT tmhs.MhsNama,tmhs.MhsNohp,tdaftars.DaftarsNIM from tsidang
				join tdaftarsidang on tdaftarsidang.DafsidId=tsidang.SidangDafsidId
				join tdaftars on tdaftars.DaftarsId=tdaftarsidang.DafsidDaftarsId
				join tmhS on tmhs.MhsNim=tdaftars.DaftarsNIM
				WHERE tsidang.SidangId='$id'")->row_array();
	        $mhs_nama=$mhs['MhsNama'];
	        $mhs_nohp=$mhs['MhsNohp'];
	        $pesan1= "_________ PORTAL SKRIPSI SI _________

Halo, '$mhs_nama' Nilai Sidang kamu Sedang Diproses !
Ditunggu ya ";
			$this->wa->kirimWablas($mhs_nohp,$pesan1);
	        

			$this->session->set_flashdata('simpan',
				'<script> 	iziToast.success ({
                          	title    : "OK",
                          	message  : "Data Berhasil Di Simpan!",});
                </script> ');
			redirect(base_url('secure/nilai/sidang'),'refresh');
			}else{
			$this->sidang();
	        }
	}

	public function edit_penilaian_sidang_k()
	{
		    $valid = $this->form_validation;
			$this->form_validation->set_rules('revisi_k', 'Revisi', 'required',
			array(	'required'	=> '<script> 	
								iziToast.warning({
                          		title    : "Perhatian",
                          		message  : "Kolom %s  Harus Di Isi!",});
                				</script> ' ));

	 		if($valid->run()){
	 		$i = $this->input;
			$data = array   ( 	
					             'DetsidKetRevisi'	=> $i->post('revisi_k')
				             );
					$id = $this->enkripsi->decrypt_url($i->post('detsid'));
	                $this->db->where('DetsidId',$id);
	                $this->db->update('tdetailsidang',$data);

	        $data2 = array     ( 	
					'SidangHasil'	=> $i->post('hasil')
				               );
	        $id = $this->enkripsi->decrypt_url($i->post('sidang'));
	        $this->db->where('SidangId',$id);
	        $this->db->update('tsidang',$data2);

			$this->session->set_flashdata('simpan',
				'<script> 	iziToast.success ({
                          	title    : "OK",
                          	message  : "Data Berhasil Di Simpan!",});
                </script> ');
			redirect(base_url('secure/nilai/sidang'),'refresh');
			}else{
			$this->sidang();
	        }
    }


////////////Nilai Akhir//////////////////////
    public function nilai_akhir()
	{	
		$id_dosen     = $this->session->userdata('UserId');
		$nilai_ketua  = $this->nilai_model->nilai_akhir_ketua($id_dosen);
		$nilai_dosen  = $this->nilai_model->nilai_akhir_dosen($id_dosen);
		$nilai_tamu   = $this->nilai_model->nilai_akhir_tamu($id_dosen);
		$edit_na      = $this->nilai_model->edit_nilai_akhir($id_dosen);


		$data = array( 'title'  	=> 'Halaman Nilai Akhir',
					   'nilai_ketua'=> $nilai_ketua,
					   'nilai_dosen'=> $nilai_dosen,
					   'nilai_tamu' => $nilai_tamu,
					   'edit_na'    => $edit_na,
					   'isi'    	=> 'secure/nilai/nilai_akhir'

		);
		$this->load->view('secure/layout/wrapper', $data, FALSE);
	}

	public function tambah_na()
	{
			//masuk tnilaikriteria
			$kov   = $this->skripsi_model->penilaian();
	        $dosen = $this->session->userdata('UserId');
	        $sidang_id = $this->enkripsi->decrypt_url($this->input->post('sidang'));
	        $sidang = $this->db->query("SELECT * FROM tsidang WHERE SidangId='$sidang_id'")->row_array();
		    $valid = $this->form_validation;
			$this->form_validation->set_rules('k1', 'K1', 'required',
			array(	'required'	=> '<script> 	
								iziToast.warning({
                          		title    : "Perhatian",
                          		message  : "Kolom %s  Harus Di Isi!",});
                				</script> ' ));

	 		if($valid->run()){
	 		$i = $this->input;
	 		$k1 = $i->post('k1')*$kov['NikonK1'];
	 		$k2 = $i->post('k2')*$kov['NikonK2'];
	 		$k3 = $i->post('k3')*$kov['NikonK3'];
	 		$k4 = $i->post('k4')*$kov['NikonK4'];
	 		$total = $k1+$k2+$k3+$k4;

			$data = array     ( 	
					'NiketSidangId'	    => $this->enkripsi->decrypt_url($i->post('sidang')),
					'NiketDosenId'	    => $this->session->userdata('UserId'),
					'NiketDosenLevel'	=> $i->post('level'),
					'NiketK1'	=> $i->post('k1'),
					'NiketK2'	=> $i->post('k2'),
					'NiketK3'	=> $i->post('k3'),
					'NiketK4'	=> $i->post('k4'),
					'NiketTotal'=> $total
				               );
	        $this->db->insert('tnilaikriteria',$data);

	        




	        //nilai ketua/penguji1/////////////////////////////////////
	        if($sidang['SidangPenguji1']==$dosen) {
	        $cek_na= $this->db->query("SELECT * FROM tnilaiakhir WHERE NaSidangId='$sidang_id'")->row_array();
	        $data2 = array (
	        		'NaSidangId' =>	$this->enkripsi->decrypt_url($i->post('sidang')),
					'NaPenguji1' => $total
				    );
	        		if ($cek_na['NaSidangId']==null && $cek_na['NaPenguji1']==null) {
	        			$this->db->insert('tnilaiakhir',$data2);
	        		}else{
	        			$id = $this->enkripsi->decrypt_url($i->post('sidang'));
				        $this->db->where('NaSidangId',$id);
				        $this->db->update('tnilaiakhir',$data2);
	        		}
	        //////na
	        $na= $this->db->query("SELECT * FROM tnilaiakhir WHERE NaSidangId='$sidang_id'")->row_array();
	        $p1 = $na['NaPenguji1']*$kov['NikonNaPenguji1'];
	        $p2 = $na['NaPenguji2']*$kov['NikonNaPenguji2'];
	        $p3 = $na['NaPenguji3']*$kov['NikonNaPenguji3'];
	        $na_angka = $p1+$p2+$p3;
    		if ($na_angka>=$kov['NikonA']) {
    			$na_huruf = 'A';
    		}elseif ($na_angka>=$kov['NikonAB']) {
    			$na_huruf = 'AB';
    		}elseif ($na_angka>=$kov['NikonB']) {
    			$na_huruf = 'B';
    		}elseif ($na_angka>=$kov['NikonBC']) {
    			$na_huruf = 'BC';
    		}elseif ($na_angka>=$kov['NikonC']) {
    			$na_huruf = 'C';
    		}elseif ($na_angka<$kov['NikonC']) {
    			$na_huruf = 'C';
    		}
	        $datax = array (
	        		'NaAngka' => $na_angka,
					'NaHuruf' => $na_huruf
				    );
	        $id = $this->enkripsi->decrypt_url($i->post('sidang'));
	        $this->db->where('NaSidangId',$id);
	        $this->db->update('tnilaiakhir',$datax);

	        $mhs=$this->db->query("
                SELECT tmhs.MhsNama,tmhs.MhsNohp,tdaftars.DaftarsNIM,tnilaiakhir.NaHuruf from tnilaiakhir
                join tsidang on tsidang.SidangId=tnilaiakhir.NaSidangId
				join tdaftarsidang on tdaftarsidang.DafsidId=tsidang.SidangDafsidId
				join tdaftars on tdaftars.DaftarsId=tdaftarsidang.DafsidDaftarsId
				join tmhS on tmhs.MhsNim=tdaftars.DaftarsNIM
				WHERE tsidang.SidangId='$id'")->row_array();
	        $mhs_nama=$mhs['MhsNama'];
	        $mhs_nohp=$mhs['MhsNohp'];
	        $pesan1= "_________ PORTAL SKRIPSI SI _________

Halo, '$mhs_nama' Nilai Akhir kamu Sedang Diproses !
Ditunggu ya ";
			$this->wa->kirimWablas($mhs_nohp,$pesan1);






	        //nilai pembimbing1/pebguji2////////////////////////////////////////
	        }elseif($sidang['SidangPenguji2'] == $dosen) {
	        $cek_na= $this->db->query("SELECT * FROM tnilaiakhir WHERE NaSidangId='$sidang_id'")->row_array();
	        $data3 = array (
	        		'NaSidangId' =>	$this->enkripsi->decrypt_url($i->post('sidang')),
					'NaPenguji2' => $total
				    );
	        		if ($cek_na['NaSidangId']=null && $cek_na['NaPenguji2']==null) {
	        			$this->db->insert('tnilaiakhir',$data3);
	        		}else{
	        			$id = $this->enkripsi->decrypt_url($i->post('sidang'));
				        $this->db->where('NaSidangId',$id);
				        $this->db->update('tnilaiakhir',$data3);
	        		}
	        //na_angka&huruf
	        $na = $this->db->query("SELECT * FROM tnilaiakhir WHERE NaSidangId='$sidang_id'")->row_array();
	        $p1 = $na['NaPenguji1']*$kov['NikonNaPenguji1'];
	        $p2 = $na['NaPenguji2']*$kov['NikonNaPenguji2'];
	        $p3 = $na['NaPenguji3']*$kov['NikonNaPenguji3'];
	        $na_angka = $p1+$p2+$p3;
    		if ($na_angka>=$kov['NikonA']) {
    			$na_huruf = 'A';
    		}elseif ($na_angka>=$kov['NikonAB']) {
    			$na_huruf = 'AB';
    		}elseif ($na_angka>=$kov['NikonB']) {
    			$na_huruf = 'B';
    		}elseif ($na_angka>=$kov['NikonBC']) {
    			$na_huruf = 'BC';
    		}elseif ($na_angka>=$kov['NikonC']) {
    			$na_huruf = 'C';
    		}elseif ($na_angka<$kov['NikonC']) {
    			$na_huruf = 'C';
    		}
	        $datay = array (
	        		'NaAngka' => 90,
					'NaHuruf' => 'A'
				    );
	        $id = $this->enkripsi->decrypt_url($i->post('sidang'));
	        $this->db->where('NaSidangId',$id);
	        $this->db->update('tnilaiakhir',$datay);









	        //////penguji3/////////////////////////////////////
	        }elseif($sidang['SidangPenguji3']==$dosen) {
	        $cek_na= $this->db->query("SELECT * FROM tnilaiakhir WHERE NaSidangId='$sidang_id'")->row_array();
	        $data4 = array (
	        		'NaSidangId' =>	$this->enkripsi->decrypt_url($i->post('sidang')),
					'NaPenguji3' => $total
				    );
	        		if ($cek_na['NaSidangId']=null && $cek_na['NaPenguji3']==null) {
	        			$this->db->insert('tnilaiakhir',$data4);
	        		}else{
	        			$id = $this->enkripsi->decrypt_url($i->post('sidang'));
				        $this->db->where('NaSidangId',$id);
				        $this->db->update('tnilaiakhir',$data4);
	        		}
	        //na
	        $na= $this->db->query("SELECT * FROM tnilaiakhir WHERE NaSidangId='$sidang_id'")->row_array();
	       $p1 = $na['NaPenguji1']*$kov['NikonNaPenguji1'];
	        $p2 = $na['NaPenguji2']*$kov['NikonNaPenguji2'];
	        $p3 = $na['NaPenguji3']*$kov['NikonNaPenguji3'];
	        $na_angka = $p1+$p2+$p3;
    		if ($na_angka>=$kov['NikonA']) {
    			$na_huruf = 'A';
    		}elseif ($na_angka>=$kov['NikonAB']) {
    			$na_huruf = 'AB';
    		}elseif ($na_angka>=$kov['NikonB']) {
    			$na_huruf = 'B';
    		}elseif ($na_angka>=$kov['NikonBC']) {
    			$na_huruf = 'BC';
    		}elseif ($na_angka>=$kov['NikonC']) {
    			$na_huruf = 'C';
    		}elseif ($na_angka<$kov['NikonC']) {
    			$na_huruf = 'C';
    		}
	        $dataz = array (
	        		'NaAngka' => $na_angka,
					'NaHuruf' => $na_huruf
				    );
	        $id = $this->enkripsi->decrypt_url($i->post('sidang'));
	        $this->db->where('NaSidangId',$id);
	        $this->db->update('tnilaiakhir',$dataz);
	        }
	        
			$this->session->set_flashdata('simpan',
				'<script> 	iziToast.success ({
                          	title    : "OK",
                          	message  : "Data Berhasil Di Simpan!",});
                </script> ');
			redirect(base_url('secure/nilai/nilai_akhir'),'refresh');
			}else{
			$this->nilai_akhir();
	        }
	}





	public function edit_na()
	{
			$kov = $this->skripsi_model->penilaian();
		    $valid = $this->form_validation;
			$this->form_validation->set_rules('k1', 'Revisi', 'required',
			array(	'required'	=> '<script> 	
								iziToast.warning({
                          		title    : "Perhatian",
                          		message  : "Kolom %s  Harus Di Isi!",});
                				</script> ' ));

	 		if($valid->run()){
	 		$i = $this->input;
	 		$i = $this->input;
	 		$k1 = $i->post('k1')*$kov['NikonK1'];
	 		$k2 = $i->post('k2')*$kov['NikonK2'];
	 		$k3 = $i->post('k3')*$kov['NikonK3'];
	 		$k4 = $i->post('k4')*$kov['NikonK4'];
	 		$total = $k1+$k2+$k3+$k4;
			$data = array   ( 	
					             'NiketK1'	=> $i->post('k1'),
								 'NiketK2'	=> $i->post('k2'),
								 'NiketK3'	=> $i->post('k3'),
								 'NiketK4'	=> $i->post('k4'),
								 'NiketTotal' => $total
				             );
			$id = $this->enkripsi->decrypt_url($i->post('NiketId'));
            $this->db->where('NiketId',$id);
            $this->db->where('NiketDosenId',$this->session->userdata('UserId'));
            $this->db->update('tnilaikriteria',$data);

            //edit tnilaiakhir
            $dosen = $this->session->userdata('UserId');
	        $sidang_id = $this->enkripsi->decrypt_url($i->post('sidang'));
	        $sidang = $this->db->query("SELECT * FROM tsidang WHERE SidangId='$sidang_id'")->row_array();

	        ///////////////penguji1////////////
	        if ($dosen == $sidang['SidangPenguji1']) {
	        $data2 = array (
					'NaPenguji1' => $total
				    );
			$id = $this->enkripsi->decrypt_url($i->post('sidang'));
	        $this->db->where('NaSidangId',$id);
	        $this->db->update('tnilaiakhir',$data2);
	        //////////////na
	        $na= $this->db->query("SELECT * FROM tnilaiakhir WHERE NaSidangId='$sidang_id'")->row_array();
	        $p1 = $na['NaPenguji1']*$kov['NikonNaPenguji1'];
	        $p2 = $na['NaPenguji2']*$kov['NikonNaPenguji2'];
	        $p3 = $na['NaPenguji3']*$kov['NikonNaPenguji3'];
	        $na_angka = $p1+$p2+$p3;
    		if ($na_angka>=$kov['NikonA']) {
    			$na_huruf = 'A';
    		}elseif ($na_angka>=$kov['NikonAB']) {
    			$na_huruf = 'AB';
    		}elseif ($na_angka>=$kov['NikonB']) {
    			$na_huruf = 'B';
    		}elseif ($na_angka>=$kov['NikonBC']) {
    			$na_huruf = 'BC';
    		}elseif ($na_angka>=$kov['NikonC']) {
    			$na_huruf = 'C';
    		}elseif ($na_angka<$kov['NikonC']) {
    			$na_huruf = 'C';
    		}
	        $dataa = array (
	        		'NaAngka' => $na_angka,
					'NaHuruf' => $na_huruf
				    );
	        $id = $this->enkripsi->decrypt_url($i->post('sidang'));
	        $this->db->where('NaSidangId',$id);
	        $this->db->update('tnilaiakhir',$dataa);
	        




	        ///////////////Penguji2////////////////
	        }elseif ($dosen == $sidang['SidangPenguji2']) {
	        $data3 = array (
					'NaPenguji2' => $total
				    );
			$id = $this->enkripsi->decrypt_url($i->post('sidang'));
	        $this->db->where('NaSidangId',$id);
	        $this->db->update('tnilaiakhir',$data3);
	        ///////na
	        $na= $this->db->query("SELECT * FROM tnilaiakhir WHERE NaSidangId='$sidang_id'")->row_array();
	       $p1 = $na['NaPenguji1']*$kov['NikonNaPenguji1'];
	        $p2 = $na['NaPenguji2']*$kov['NikonNaPenguji2'];
	        $p3 = $na['NaPenguji3']*$kov['NikonNaPenguji3'];
	        $na_angka = $p1+$p2+$p3;
    		if ($na_angka>=$kov['NikonA']) {
    			$na_huruf = 'A';
    		}elseif ($na_angka>=$kov['NikonAB']) {
    			$na_huruf = 'AB';
    		}elseif ($na_angka>=$kov['NikonB']) {
    			$na_huruf = 'B';
    		}elseif ($na_angka>=$kov['NikonBC']) {
    			$na_huruf = 'BC';
    		}elseif ($na_angka>=$kov['NikonC']) {
    			$na_huruf = 'C';
    		}elseif ($na_angka<$kov['NikonC']) {
    			$na_huruf = 'C';
    		}
	        $datab = array (
	        		'NaAngka' => $na_angka,
					'NaHuruf' => $na_huruf
				    );
	        $id = $this->enkripsi->decrypt_url($i->post('sidang'));
	        $this->db->where('NaSidangId',$id);
	        $this->db->update('tnilaiakhir',$datab);
	        




	        //////////////penguji3///////////////
	        }elseif ($dosen == $sidang['SidangPenguji3']) {
	        $data4 = array (
					'NaPenguji3' => $total
				    );
			$id = $this->enkripsi->decrypt_url($i->post('sidang'));
	        $this->db->where('NaSidangId',$id);
	        $this->db->update('tnilaiakhir',$data4);
	        //////////////na
	        $na= $this->db->query("SELECT * FROM tnilaiakhir WHERE NaSidangId='$sidang_id'")->row_array();
	        $p1 = $na['NaPenguji1']*$kov['NikonNaPenguji1'];
	        $p2 = $na['NaPenguji2']*$kov['NikonNaPenguji2'];
	        $p3 = $na['NaPenguji3']*$kov['NikonNaPenguji3'];
	        $na_angka = $p1+$p2+$p3;
    		if ($na_angka>=$kov['NikonA']) {
    			$na_huruf = 'A';
    		}elseif ($na_angka>=$kov['NikonAB']) {
    			$na_huruf = 'AB';
    		}elseif ($na_angka>=$kov['NikonB']) {
    			$na_huruf = 'B';
    		}elseif ($na_angka>=$kov['NikonBC']) {
    			$na_huruf = 'BC';
    		}elseif ($na_angka>=$kov['NikonC']) {
    			$na_huruf = 'C';
    		}elseif ($na_angka<$kov['NikonC']) {
    			$na_huruf = 'C';
    		}
	        $datac = array (
	        		'NaAngka' => $na_angka,
					'NaHuruf' => $na_huruf
				    );
	        $id = $this->enkripsi->decrypt_url($i->post('sidang'));
	        $this->db->where('NaSidangId',$id);
	        $this->db->update('tnilaiakhir',$datac);
	        }


			$this->session->set_flashdata('simpan',
				'<script> 	iziToast.success ({
                          	title    : "OK",
                          	message  : "Data Berhasil Di Simpan!",});
                </script> ');
			redirect(base_url('secure/nilai/nilai_akhir'),'refresh');
			}else{
			$this->nilai_akhir();
	        }
	}




}

/* End of file Nilai.php */
/* Location: ./application/controllers/secure/Nilai.php */
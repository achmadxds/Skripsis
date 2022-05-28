<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('jadwal_model');
	}

///////////SEMINAR///////////////////
	public function seminar()
	{
		$mhs_belum = $this->jadwal_model->jadwal_seminar_belum();
		$mhs_sudah = $this->jadwal_model->jadwal_seminar_sudah();
		$mhs_ulang = $this->jadwal_model->jadwal_seminar_ulang();
		$mhs_lulus = $this->jadwal_model->jadwal_seminar_lulus();
		$tambah_seminar = $this->jadwal_model->tambah_seminar();
		$edit_seminar = $this->jadwal_model->edit_seminar();
		$edit_seminar_ulang = $this->jadwal_model->edit_seminar_ulang();
		$seminar_lulus = $this->jadwal_model->seminar_lulus();
		
		$data = array ( 'title' 	=> 'Penjadwalan Seminar Skripsi',
						'mhs_belum' => $mhs_belum,
						'mhs_sudah' => $mhs_sudah,
						'mhs_ulang' => $mhs_ulang,
						'mhs_lulus'	=> $mhs_lulus,
						'tambah_seminar' =>$tambah_seminar,
						'edit_seminar' =>$edit_seminar,
						'edit_seminar_ulang' => $edit_seminar_ulang,
						'seminar_lulus' => $seminar_lulus,
						
 						'isi'		=> 'secure/jadwal/seminar'
 					);
 		$this->load->view('secure/layout/wrapper', $data, FALSE);
	}



	public function tambah_seminar()
	{
		//validasi input
		$valid = $this->form_validation;
		$this->form_validation->set_rules('ketua', 'Ketua Dosbing', 'required',
		array(	'required'	=> '<script> 	
								iziToast.warning({
                          		title    : "Perhatian",
                          		message  : "Kolom %s  Harus Di Isi!",});
                				</script> ' ));

		//end validasi
		if($valid->run()){
		$i = $this->input;
			$data = array   ( 
				'SemproDafsemId'    => $this->enkripsi->decrypt_url($i->post('dafsem')),
				'SemproRuangId'     => $this->enkripsi->decrypt_url($i->post('ruangan')),
				'SemproJam'    		=> $i->post('jam'),
				'SemproTgl'    		=> $i->post('tgl'),
				'SemproPenguji1'    => $this->enkripsi->decrypt_url($i->post('ketua')),
				'SemproPenguji2'    => $this->enkripsi->decrypt_url($i->post('dosbing1')),
				'SemproPenguji3'    => $this->enkripsi->decrypt_url($i->post('dosbing2')),
				'SemproHasil'		=> 0
							);
			$this->db->insert('tsempro', $data);

			$id_dafsem = $this->enkripsi->decrypt_url($i->post('dafsem'));
			$mhs=$this->db->query("SELECT tmhs.MhsNama,tmhs.MhsNohp,tdaftars.DaftarsNIM from tdaftarsempro
				join tdaftars on tdaftars.DaftarsId=tdaftarsempro.DafsemDaftarsId
				join tmhS on tmhs.MhsNim=tdaftars.DaftarsNIM
				WHERE tdaftarsempro.DafsemId='$id_dafsem'")->row_array();
			$mhs_nama=$mhs['MhsNama'];
			$mhs_nohp=$mhs['MhsNohp'];
			$p1=$this->enkripsi->decrypt_url($i->post('ketua'));
			$p2=$this->enkripsi->decrypt_url($i->post('dosbing1'));
			$p3=$this->enkripsi->decrypt_url($i->post('dosbing2'));
			$d1=$this->db->query("SELECT * from tdosen where DosenId='$p1'")->row_array();
			$d2=$this->db->query("SELECT * from tdosen where DosenId='$p2'")->row_array();
			$d3=$this->db->query("SELECT * from tdosen where DosenId='$p3'")->row_array();
			$p1_nohp=$d1['DosenNohp'];
			$p2_nohp=$d2['DosenNohp'];
			$p3_nohp=$d3['DosenNohp'];
			$ketua=$d1['DosenNama'];
			$Anggota1=$d2['DosenNama'];
			$Anggota2=$d3['DosenNama'];
			$jam=$i->post('jam');
			$tgl=$i->post('tgl');
			$id_ruang=$this->enkripsi->decrypt_url($i->post('ruangan'));
			$ruang=$this->db->query("SELECT * from truang where RuangId='$id_ruang'")->row_array();
			$ruangan=$ruang['RuangNama'];

			$pesan1= "_________ PORTAL SKRIPSI SI _________

Halo, '$mhs_nama' Jadwal seminar kamu sudah keluar !
Ketua Penguji : '$ketua'
Anggota Penguji 1 : '$Anggota1'
Anggota Penguji 2 : '$Anggota2'
Ruangan : '$ruangan'
Jam : '$jam'
Tanggal : '$tgl' ";

$pesan2= "_________ PORTAL SKRIPSI SI _________

Halo, Bpk/Ibu '$ketua' Jadwal menguji seminar anda sudah keluar !
Mahasiswa : '$mhs_nama'
Ketua Penguji : '$ketua'
Anggota Penguji 1 : '$Anggota1'
Anggota Penguji 2 : '$Anggota2'
Ruangan : '$ruangan'
Jam : '$jam'
Tanggal : '$tgl' ";

$pesan3= "_________ PORTAL SKRIPSI SI _________

Halo, Bpk/Ibu '$Anggota1' Jadwal menguji seminar anda sudah keluar !
Mahasiswa : '$mhs_nama'
Ketua Penguji : '$ketua'
Anggota Penguji 1 : '$Anggota1'
Anggota Penguji 2 : '$Anggota2'
Ruangan : '$ruangan'
Jam : '$jam'
Tanggal : '$tgl' ";

$pesan4= "_________ PORTAL SKRIPSI SI _________

Halo, Bpk/Ibu '$Anggota2' Jadwal menguji seminar anda sudah keluar !
Mahasiswa : '$mhs_nama'
Ketua Penguji : '$ketua'
Anggota Penguji 1 : '$Anggota1'
Anggota Penguji 2 : '$Anggota2'
Ruangan : '$ruangan'
Jam : '$jam'
Tanggal : '$tgl' ";
			$this->wa->kirimWablas($mhs_nohp,$pesan1);
			// $this->wa->kirimWablas($p1_nohp,$pesan2);
			// $this->wa->kirimWablas($p2_nohp,$pesan3);
			// $this->wa->kirimWablas($p3_nohp,$pesan4);


			$this->session->set_flashdata('simpan',
				'<script> 	iziToast.success ({
                          	title    : "OK",
                          	message  : "Data Berhasil DiSimpan!",});
                </script> ');
			redirect(base_url('secure/jadwal/seminar'));

		}else{
			$this->session->set_flashdata('hapus',
				'<script> 	iziToast.error ({
                          	title    : "error",
                          	message  : "Data tidak Berhasil DiSimpan!",});
                </script> ');
			redirect(base_url('secure/jadwal/seminar'));
			
		}
	}

	public function edit_seminar()
	{
			$valid = $this->form_validation;
			$this->form_validation->set_rules('ketua', 'Ketua Dosbing', 'required',
			array(	'required'	=> '<script> 	
									iziToast.warning({
	                          		title    : "Perhatian",
	                          		message  : "Kolom %s  Harus Di Isi!",});
	                				</script> ' ));

	 		if($valid->run()){
	 		$i = $this->input;
			$data = array (
				'SemproRuangId'     => $this->enkripsi->decrypt_url($i->post('ruangan')), 
				'SemproPenguji1'    => $this->enkripsi->decrypt_url($i->post('ketua')),
				'SemproTgl'         => date('d-m-y'),
				'SemproHasil'		=> 0
				
			);
			$data2 = array (
				'SemproRuangId'     => $this->enkripsi->decrypt_url($i->post('ruangan')), 
				'SemproPenguji1'    => $this->enkripsi->decrypt_url($i->post('ketua')),
				'SemproTgl'         => date('d-m-y'),
				'SemproHasil'		=> 3
				
			);
			$id = $this->input->post('sempro');
			$decrypt_id     = $this->enkripsi->decrypt_url($id);
			$hasil = $this->enkripsi->decrypt_url($this->input->post('hasil'));
			if ($hasil==0) {
			$this->db->where('SemproId',$decrypt_id);
			$this->db->update('tsempro', $data);
			}elseif($hasil==3){
			$this->db->where('SemproId',$decrypt_id);
			$this->db->update('tsempro', $data2);
			}
		
			$this->session->set_flashdata('simpan',
				'<script> 	iziToast.success ({
                          	title    : "OK",
                          	message  : "Data Berhasil DiSimpan!",});
                </script> ');
			redirect(base_url('secure/jadwal/seminar'));

		}else{
			$this->session->set_flashdata('hapus',
				'<script> 	iziToast.error ({
                          	title    : "error",
                          	message  : "Data tidak Berhasil DiSimpan!",});
                </script> ');
			redirect(base_url('secure/jadwal/seminar'));
		}
	}

	public function edit_seminar_ulang()
	{
			$valid = $this->form_validation;
			$this->form_validation->set_rules('ketua', 'Ketua Dosbing', 'required',
			array(	'required'	=> '<script> 	
									iziToast.warning({
	                          		title    : "Perhatian",
	                          		message  : "Kolom %s  Harus Di Isi!",});
	                				</script> ' ));

	 		if($valid->run()){
	 		$i = $this->input;
			$data = array (
				'SemproRuangId'     => $this->enkripsi->decrypt_url($i->post('ruangan')), 
				'SemproPenguji1'    => $this->enkripsi->decrypt_url($i->post('ketua')),
				'SemproTgl'         => date('d-m-y'),
				'SemproHasil'		=> 3,
				
			);
			$id = $this->input->post('sempro');
			$decrypt_id     = $this->enkripsi->decrypt_url($id);
			$this->db->where('SemproId',$decrypt_id);
			$this->db->update('tsempro', $data);
			$this->session->set_flashdata('simpan',
				'<script> 	iziToast.success ({
                          	title    : "OK",
                          	message  : "Data Berhasil DiSimpan!",});
                </script> ');
			redirect(base_url('secure/jadwal/seminar'));

		}else{
			$this->session->set_flashdata('hapus',
				'<script> 	iziToast.error ({
                          	title    : "error",
                          	message  : "Data tidak Berhasil DiSimpan!",});
                </script> ');
			redirect(base_url('secure/jadwal/seminar'));
		}
	}

	public function cetak_seminar()
	{
		$periode=periode_aktif();
		$cetak_seminar = $this->jadwal_model->cetak_jadwal_seminar();
		$data = array ( 'title' 	=> 'Penjadwalan Seminar Skripsi',
						'cetak_seminar' => $cetak_seminar,
						'periode' => $periode,
 						'isi'		=> 'secure/jadwal/cetak_seminar'
 					);
 		$this->load->view('secure/jadwal/cetak_seminar', $data, FALSE);
		$dosen= $this->db->query("SELECT * from tdosen")->row_array();
		
	}

	public function umumkan_seminar()
	{
		$pengumuman=$this->db->query("SELECT * FROM tdosen WHERE DosenNidn LIKE '__________' ORDER BY DosenNama ASC limit 3")->result_Array();

		foreach ($pengumuman as $p) {
		$dosen_nama = $p['DosenNama'];
		$hp = $p['DosenNohp'];
		$pesan= "_________ PORTAL SKRIPSI SI _________

Assalamalaikum, Bpk/Ibu  '$dosen_nama' jadwal seminar sudah keluar, Silahakan cek infonya di Portal Skrispi SI";
        $this->wa->kirimWablas($hp,$pesan);
		}
		$this->session->set_flashdata('simpan',
				'<script> 	iziToast.success ({
                          	title    : "OK",
                          	message  : "Jadwal Seminar Berhasil DiUmumkan !",});
                </script> ');
	    redirect(base_url('secure/jadwal/seminar'));
	}



///////////////////////////SIDANG/////////////////////
	public function sidang()
	{
		$mhs_belum     = $this->jadwal_model->jadwal_sidang_belum();
		$mhs_sudah     = $this->jadwal_model->jadwal_sidang_sudah();
		$mhs_ulang     = $this->jadwal_model->jadwal_sidang_ulang();
		$mhs_lulus     = $this->jadwal_model->jadwal_sidang_lulus();
		$tambah_sidang = $this->jadwal_model->tambah_sidang();
		$edit_sidang   = $this->jadwal_model->edit_sidang();
		$edit_sidang_ulang   = $this->jadwal_model->edit_sidang_ulang();
		$sidang_lulus   = $this->jadwal_model->sidang_lulus();
		$data = array ( 'title' 		=> 'Penjadwalan Sidang Skripsi',
						'mhs_belum' 	=> $mhs_belum,
						'mhs_sudah' 	=> $mhs_sudah,
						'mhs_ulang' => $mhs_ulang,
						'mhs_lulus'	=> $mhs_lulus,
						'tambah_sidang' => $tambah_sidang,
						'edit_sidang'	=> $edit_sidang,
						'edit_sidang_ulang' => $edit_sidang_ulang,
						'sidang_lulus' => $sidang_lulus,
 						'isi'			=> 'secure/jadwal/sidang'
 					);
 		$this->load->view('secure/layout/wrapper', $data, FALSE);
	}

	public function tambah_sidang()
	{
		//validasi input
		$valid = $this->form_validation;
		$this->form_validation->set_rules('tamu', 'Ketua Dosbing', 'required',
		array(	'required'	=> '<script> 	
								iziToast.warning({
                          		title    : "Perhatian",
                          		message  : "Kolom %s  Harus Di Isi!",});
                				</script> ' ));

		//end validasi
		if($valid->run()){
		$i = $this->input;
			$data = array   ( 
				'SidangDafsidId'    => $this->enkripsi->decrypt_url($i->post('dafsid')),
				'SidangRuangId'     => $this->enkripsi->decrypt_url($i->post('ruangan')),
				'SidangJam'    		=> $i->post('jam'),
				'SidangTgl'    		=> $i->post('tgl'),
				'SidangPenguji1'    => $this->enkripsi->decrypt_url($i->post('ketua')),
				'SidangPenguji2'    => $this->enkripsi->decrypt_url($i->post('dosbing1')),
				'SidangPenguji3'    => $this->enkripsi->decrypt_url($i->post('tamu')),
				'SidangHasil'		=> 0
							);
			$id_dafsid = $this->enkripsi->decrypt_url($i->post('dafsid'));
			$mhs=$this->db->query("SELECT tmhs.MhsNama,tmhs.MhsNohp,tdaftars.DaftarsNIM from tdaftarsidang
				join tdaftars on tdaftars.DaftarsId=tdaftarsidang.DafsidDaftarsId
				join tmhS on tmhs.MhsNim=tdaftars.DaftarsNIM
				WHERE tdaftarsidang.DafsidId='$id_dafsid'")->row_array();
			$mhs_nama=$mhs['MhsNama'];
			$mhs_nohp=$mhs['MhsNohp'];
			$p1=$this->enkripsi->decrypt_url($i->post('ketua'));
			$p2=$this->enkripsi->decrypt_url($i->post('dosbing1'));
			$p3=$this->enkripsi->decrypt_url($i->post('tamu'));
			$d1=$this->db->query("SELECT * from tdosen where DosenId='$p1'")->row_array();
			$d2=$this->db->query("SELECT * from tdosen where DosenId='$p2'")->row_array();
			$d3=$this->db->query("SELECT * from tdosen where DosenId='$p3'")->row_array();
			$p1_nohp=$d1['DosenNohp'];
			$p2_nohp=$d2['DosenNohp'];
			$p3_nohp=$d3['DosenNohp'];
			$ketua=$d1['DosenNama'];
			$Anggota1=$d2['DosenNama'];
			$Anggota2=$d3['DosenNama'];
			$jam=$i->post('jam');
			$tgl=$i->post('tgl');
			$id_ruang=$this->enkripsi->decrypt_url($i->post('ruangan'));
			$ruang=$this->db->query("SELECT * from truang where RuangId='$id_ruang'")->row_array();
			$ruangan=$ruang['RuangNama'];

			$pesan1= "_________ PORTAL SKRIPSI SI _________

Halo, '$mhs_nama' Jadwal sidang kamu sudah keluar !
Ketua Penguji : '$ketua'
Anggota Penguji 1 : '$Anggota1'
Anggota Penguji 2 : '$Anggota2'
Ruangan : '$ruangan'
Jam : '$jam'
Tanggal : '$tgl' ";

$pesan2= "_________ PORTAL SKRIPSI SI _________

Halo, Bpk/Ibu '$ketua' Jadwal menguji sidang anda sudah keluar !
Mahasiswa : '$mhs_nama'
Ketua Penguji : '$ketua'
Anggota Penguji 1 : '$Anggota1'
Anggota Penguji 2 : '$Anggota2'
Ruangan : '$ruangan'
Jam : '$jam'
Tanggal : '$tgl' ";

$pesan3= "_________ PORTAL SKRIPSI SI _________

Halo, Bpk/Ibu '$Anggota1' Jadwal menguji sidang anda sudah keluar !
Mahasiswa : '$mhs_nama'
Ketua Penguji : '$ketua'
Anggota Penguji 1 : '$Anggota1'
Anggota Penguji 2 : '$Anggota2'
Ruangan : '$ruangan'
Jam : '$jam'
Tanggal : '$tgl' ";

$pesan4= "_________ PORTAL SKRIPSI SI _________

Halo, Bpk/Ibu '$Anggota2' Jadwal menguji sidang anda sudah keluar !
Mahasiswa : '$mhs_nama'
Ketua Penguji : '$ketua'
Anggota Penguji 1 : '$Anggota1'
Anggota Penguji 2 : '$Anggota2'
Ruangan : '$ruangan'
Jam : '$jam'
Tanggal : '$tgl' ";
			$this->wa->kirimWablas($mhs_nohp,$pesan1);
			// $this->wa->kirimWablas($p1_nohp,$pesan2);
			// $this->wa->kirimWablas($p2_nohp,$pesan3);
			// $this->wa->kirimWablas($p3_nohp,$pesan4);
			
			$this->db->insert('tsidang', $data);
			$this->session->set_flashdata('simpan',
				'<script> 	iziToast.success ({
                          	title    : "OK",
                          	message  : "Data Berhasil DiSimpan!",});
                </script> ');
			redirect(base_url('secure/jadwal/sidang'));

		}else{
			$this->session->set_flashdata('hapus',
				'<script> 	iziToast.error ({
                          	title    : "error",
                          	message  : "Data tidak Berhasil DiSimpan!",});
                </script> ');
			redirect(base_url('secure/jadwal/sidang'));
			
		}
	}

	public function edit_sidang()
	{
			$valid = $this->form_validation;
			$this->form_validation->set_rules('tamu', 'Ketua Dosbing', 'required',
			array(	'required'	=> '<script> 	
									iziToast.warning({
	                          		title    : "Perhatian",
	                          		message  : "Kolom %s  Harus Di Isi!",});
	                				</script> ' ));

	 		if($valid->run()){
	 		$i = $this->input;
			$data = array (
				'SidangRuangId'     => $this->enkripsi->decrypt_url($i->post('ruangan')), 
				'SidangPenguji3'    => $this->enkripsi->decrypt_url($i->post('tamu')),
				'SidangTgl'         => date('d-m-y'),
				'SidangHasil'		=> 0
				
			);
			$data2 = array (
				'SidangRuangId'     => $this->enkripsi->decrypt_url($i->post('ruangan')), 
				'SidangPenguji3'    => $this->enkripsi->decrypt_url($i->post('tamu')),
				'SidangTgl'         => date('d-m-y'),
				'SidangHasil'		=> 3
				
			);
			
			$id = $this->input->post('sidang');
			$decrypt_id     = $this->enkripsi->decrypt_url($id);
			$hasil = $this->enkripsi->decrypt_url($this->input->post('hasil'));
			if ($hasil==0) {
			$this->db->where('SidangId',$decrypt_id);
			$this->db->update('tsidang', $data);
			}elseif($hasil==3){
			$this->db->where('SidangId',$decrypt_id);
			$this->db->update('tsidang', $data2);
			}
			
			$this->session->set_flashdata('simpan',
				'<script> 	iziToast.success ({
                          	title    : "OK",
                          	message  : "Data Berhasil DiSimpan!",});
                </script> ');
			redirect(base_url('secure/jadwal/sidang'));

		}else{
			$this->session->set_flashdata('hapus',
				'<script> 	iziToast.error ({
                          	title    : "error",
                          	message  : "Data tidak Berhasil DiSimpan!",});
                </script> ');
			redirect(base_url('secure/jadwal/sidang'));
		}
	}

	public function edit_sidang_ulang()
	{
			$valid = $this->form_validation;
			$this->form_validation->set_rules('tamu', 'Ketua Dosbing', 'required',
			array(	'required'	=> '<script> 	
									iziToast.warning({
	                          		title    : "Perhatian",
	                          		message  : "Kolom %s  Harus Di Isi!",});
	                				</script> ' ));

	 		if($valid->run()){
	 		$i = $this->input;
			$data = array (
				'SidangRuangId'     => $this->enkripsi->decrypt_url($i->post('ruangan')), 
				'SidangPenguji3'    => $this->enkripsi->decrypt_url($i->post('tamu')),
				'SidangTgl'         => date('d-m-y'),
				'SidangHasil'		=> 3
				
			);
			
			$id = $this->input->post('sidang');
			$decrypt_id     = $this->enkripsi->decrypt_url($id);
			$this->db->where('SidangId',$decrypt_id);
			$this->db->update('tsidang', $data);
			$this->session->set_flashdata('simpan',
				'<script> 	iziToast.success ({
                          	title    : "OK",
                          	message  : "Data Berhasil DiSimpan!",});
                </script> ');
			redirect(base_url('secure/jadwal/sidang'));

		}else{
			$this->session->set_flashdata('hapus',
				'<script> 	iziToast.error ({
                          	title    : "error",
                          	message  : "Data tidak Berhasil DiSimpan!",});
                </script> ');
			redirect(base_url('secure/jadwal/sidang'));
		}
	}

	public function cetak_sidang()
	{
		$periode=periode_aktif();
		$cetak_sidang = $this->jadwal_model->cetak_jadwal_sidang();
		$data = array ( 'title' 	=> 'Penjadwalan Seminar Skripsi',
						'cetak_sidang' => $cetak_sidang,
						'periode' => $periode,
 						'isi'		=> 'secure/jadwal/cetak_sidang'
 					);
 		$this->load->view('secure/jadwal/cetak_sidang', $data, FALSE);
	}

	public function umumkan_sidang()
	{
		$pengumuman=$this->db->query("SELECT * FROM tdosen WHERE DosenNidn LIKE '__________' ORDER BY DosenNama ASC limit 3")->result_Array();

		foreach ($pengumuman as $p) {
		$dosen_nama = $p['DosenNama'];
		$hp = $p['DosenNohp'];
		$pesan= "_________ PORTAL SKRIPSI SI _________

Assalamalaikum, Bpk/Ibu  '$dosen_nama' jadwal sidang sudah keluar, Silahakan cek infonya di Portal Skrispi SI";
        $this->wa->kirimWablas($hp,$pesan);
		}
		$this->session->set_flashdata('simpan',
				'<script> 	iziToast.success ({
                          	title    : "OK",
                          	message  : "Jadwal Sidang Berhasil DiUmumkan !",});
                </script> ');
	    redirect(base_url('secure/jadwal/seminar'));
	}


	//////////////////////////jadwal bimbingan//////////////////////
	public function bimbingan()
	{
	   $dosen = $this->session->userdata('UserId');
	   $jadwal = $this->jadwal_model->jadwal_bimbingan($dosen);
	   $edit_jadwal = $this->jadwal_model->jadwal_bimbingan($dosen);
	   $data = array (  'title' 	=> 'Halaman Jadwal Bimbingan',
	   					'jadwal'    => $jadwal,
	   					'edit_jadwal' => $edit_jadwal,
 						'isi'		=> 'secure/jadwal/bimbingan'
 					);
 		$this->load->view('secure/layout/wrapper', $data, FALSE);
	}

	public function tambah_jadbim()
	{
		$dosen = $this->session->userdata('UserId');
		//validasi input
		$valid = $this->form_validation;

		$this->form_validation->set_rules('hari', 'Hari', 'required',
		array(	'required'	=> '<script> 	
								iziToast.warning({
                          		title    : "Perhatian",
                          		message  : "Kolom %s  Harus Di Isi!",});
                				</script> ' ));

		//end validasi
		if($valid->run()){
		    $i = $this->input;
			$data = array   ( 

								'JadwalDosenId'		=> $dosen,
								'JadwalHari'		=> $i->post('hari'),
								'JadwalRuangan'		=> $i->post('ruangan'),
								'JadwalJamMulai'	=> $i->post('mulai'),
								'JadwalJamSelesai'	=> $i->post('selesai')
								
							);
			$this->db->insert('tjadwalbimbingan', $data);
			$this->session->set_flashdata('simpan',
				'<script> 	iziToast.success ({
                          	title    : "OK",
                          	message  : "Data Berhasil DiSimpan!",});
                </script> ');
			redirect(base_url('secure/jadwal/bimbingan'));
		}else{
		$this->bimbingan();
		}
	}


	public function edit_jadbim()
	{
		//validasi input
		$valid = $this->form_validation;
		$this->form_validation->set_rules('hari', 'Hari', 'required',
		array(	'required'	=> '<script> 	
								iziToast.warning({
                          		title    : "Perhatian",
                          		message  : "Kolom %s  Harus Di Isi!",});
                				</script> ' ));
		//end validasi
		if($valid->run()){
		    $i = $this->input;
			$data = array   ( 
								'JadwalHari'		=> $i->post('hari'),
								'JadwalRuangan'		=> $i->post('ruangan'),
								'JadwalJamMulai'	=> $i->post('mulai'),
								'JadwalJamSelesai'	=> $i->post('selesai')
							);
			$id = $this->input->post('jadwal');
			$decrypt_id     = $this->enkripsi->decrypt_url($id);
			$this->db->where('JadwalId',$decrypt_id);
			$this->db->update('tjadwalbimbingan', $data);
			$this->session->set_flashdata('simpan',
				'<script> 	iziToast.success ({
                          	title    : "OK",
                          	message  : "Data Berhasil DiSimpan!",});
                </script> ');
			redirect(base_url('secure/jadwal/bimbingan'));
		}else{
		$this->bimbingan();
		}
	}

	public function hapus_jadbim($jadwal)
		{
        	
        	$decrypt_id     = $this->enkripsi->decrypt_url($jadwal);
			$this->db->where('JadwalId', $decrypt_id);
			$this->db->delete('tjadwalbimbingan');
			$this->session->set_flashdata('hapus',
				'<script> 	iziToast.success ({
                          	title    : "OK",
                          	message  : "Data Berhasil Di Hapus!",});
                </script> ');
			redirect(base_url('secure/jadwal/bimbingan'));
		}






}

/* End of file Jadwal.php */
/* Location: ./application/controllers/secure/Jadwal.php */
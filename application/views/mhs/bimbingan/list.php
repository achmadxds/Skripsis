<?php if ($bimbingan==null) { ?>
<div align="center">
  <img src="<?php echo base_url()?>assets/img/umk/denied.jpg?>" alt="" class="img img-responsive img-thumbnail" width="400">
</div>
<?php } else { ?>

<div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                <div align="right">
                          <a href="<?php echo base_url('mhs/bimbingan/cetak_bimbingan') ?>" target="_blank" title="cetak" class="btn btn-primary"><i class="fa fa-print"></i> Cetak Bimbingan</a>
                </div>
                    <ul class="nav nav-tabs" id="myTab5" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="dosbing1-tab5" data-toggle="tab" href="#dosbing1" role="tab" aria-controls="dosbing1" aria-selected="true">
                          <i class="fas fa-user-tie"></i>Dosen Pembimbing 1</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="dosbing2-tab5" data-toggle="tab" href="#dosbing2" role="tab" aria-controls="dosbing2" aria-selected="false">
                          <i class="fas fa-user-tie"></i>Dosen Pembimbing 2</a>
                      </li>
                      <?php if ($cek_dosbing['DosbingsKetua']!==null): ?>
                        <li class="nav-item">
                        <a class="nav-link" id="ketua-tab5" data-toggle="tab" href="#ketua" role="tab" aria-controls="ketua" aria-selected="false">
                          <i class="fas fa-user-tie"></i>Ketua Penguji</a>
                      </li>
                      <?php endif ?>
                      <?php if ($cek_dosbing['DosbingsTamu']!==null): ?>
                        <li class="nav-item">
                        <a class="nav-link" id="tamu-tab5" data-toggle="tab" href="#tamu" role="tab" aria-controls="tamu" aria-selected="false">
                          <i class="fas fa-user-tie"></i>Dosen Tamu</a>
                      </li>
                      <?php endif ?>
                    </ul>
                    <div class="tab-content" id="myTabContent5">
<!--  -->
<!-- Bimbingan 1 -->
                      <div class="tab-pane fade show active" id="dosbing1" role="tabpanel" aria-labelledby="dosbing1-tab5">
<?php if($bimbingan){?>
<div class="row">
<div class="col-12 col-md-12 col-lg-12">
<div class="row">
  <div class="col-6">
    <button  type="button" class="btn btn-success" data-toggle="modal" data-target="#modaladd1"><i class="fas fa-plus-circle"></i>
 Bimbingan
</button> 
  </div>
  <div class="col-6">
<?php $nama=$this->db->get_where('tdosen',['DosenId'=>$bimbingan->DosbingsDosenId1])->row_array();?>
<p align="right"><b>DOSEN PEMBIMBING :  <?php echo $nama['DosenNama'] ?></b></p>
  </div>
</div>

<?php $id_dosen1 = $bimbingan->DosbingsDosenId1;
      $id_mhs    = $this->session->userdata('MhsNim');
      $total = $this->db->query("SELECT COUNT(*) as total FROM tbimbingans join
               tdosbings on tdosbings.DosbingsId=tbimbingans.BimbingansDosbingsId
               join tdaftars on tdaftars.DaftarsId=tdosbings.DosbingsDaftarsId
               WHERE tbimbingans.BimbingansMhsNim='$id_mhs' 
               and tdaftars.DaftarsStatusAkhir!=2
               and tbimbingans.BimbingansDosenId='$id_dosen1'")->row_array(); ?>
 
                  <div class="card card-success">
                  <div class="card-header">
                    <h4 >Riwayat Bimbingan : <span class="badge badge-primary badge-pill"><?php echo $total['total'] ?></span></h4>
                    <div class="card-header-action">
                      <a data-collapse="#1" class="btn btn-icon btn-info" href="#"><i class="fas fa-minus"></i></a>
                    </div>
                  </div>
                  <div class="collapse show" id="1">
                    <div class="card-body">
            <!--  -->
                  <div class="activities">
            <?php foreach ($riwayat1 as $riwayat1) { ?>
                  <div class="activity">
                    <?php if ($riwayat1['BimbingansBab']=='judul'): ?>
                      <div class="activity-icon bg-success text-white shadow-primary">
                      <i class="fas fa-comment-alt"></i>
                    </div>
                    <?php elseif ($riwayat1['BimbingansBab']=='proposal'): ?>
                      <div class="activity-icon bg-warning text-white shadow-primary">
                      <i class="fas fa-comment-alt"></i>
                    </div>
                    <?php elseif ($riwayat1['BimbingansBab']=='revisi'): ?>
                      <div class="activity-icon bg-danger text-white shadow-primary">
                      <i class="fas fa-comment-alt"></i>
                    </div>
                    <?php else : ?>
                      <div class="activity-icon bg-primary text-white shadow-primary">
                      <i class="fas fa-comment-alt"></i>
                    </div>
                    <?php endif ?>
                    <div class="activity-detail">
                      <div class="mb-2">
                        <span class="text-job text-primary"><?php echo date("d F Y", strtotime($riwayat1['BimbingansTgl'])) ?></span>
                        <span class="bullet"></span>
                        <a class="text-job">
                          <?php if     ($riwayat1['BimbingansBab']==1): ?>
                          <?php echo 'I' ?>
                          <?php elseif ($riwayat1['BimbingansBab']==2): ?>
                          <?php echo 'II' ?>
                          <?php elseif ($riwayat1['BimbingansBab']==3): ?>
                          <?php echo 'III' ?>
                          <?php elseif ($riwayat1['BimbingansBab']==4): ?>
                          <?php echo 'IV' ?>
                          <?php elseif ($riwayat1['BimbingansBab']==5): ?>
                          <?php echo 'V' ?>
                          <?php elseif ($riwayat1['BimbingansBab']=='judul'): ?>
                          <?php echo 'JUDUL' ?>
                          <?php elseif ($riwayat1['BimbingansBab']=='proposal'): ?>
                          <?php echo 'PROPOSAL' ?>
                          <?php elseif ($riwayat1['BimbingansBab']=='revisi'): ?>
                          <?php echo 'REVISI SIDANG' ?>
                          <?php endif ?>
                        </a>
                      </div>
                      <p>Kamu Mengirimkan "<a href="<?php echo base_url('assets/upload/bimbingan/'.$riwayat1['BimbingansFile']) ?>" target="_blank" ><?php echo $riwayat1['BimbingansMhsNim'] .'_'.$riwayat1['BimbingansBab'] ?></a>" &mdash; <a data-toggle="tooltip" data-placement="top" title="<?php echo $riwayat1['BimbingansKet'] ?>" style="color: purple">keterangan</a></p>


                     <?php if ($riwayat1['BimbingansStatus']==0): ?>
                       <span style="color: red;">Silahkan Menunggu Balasan Dosen Pembimbing</span>

                     <?php elseif($riwayat1['BimbingansBalasanTgl']!==null): ?> 
                      <div class="mb-2">
                        <span class="text-job text-primary"><?php echo date("d F Y", strtotime($riwayat1['BimbingansBalasanTgl'])) ?></span>
                        <span class="bullet"></span>
                          <?php if ($riwayat1['BimbingansStatus']==1): ?>
                            <a class="text-job" style="color: #0DF908">ACC</a>
                          <?php elseif ($riwayat1['BimbingansStatus']==2) :?>
                            <a class="text-job" style="color: red">REVISI</a>
                          <?php else: ?>
                          <?php endif ?>
                        
                        <p>Dosen Mengirimkan "<a href="<?php echo base_url('assets/upload/bimbingan/'.$riwayat1['BimbingansBalasanFile']) ?>" target="_blank"><?php echo $riwayat1['BimbingansMhsNim'] .'_'.
                        $riwayat1['BimbingansBab'].'_replay' ?></a>" &mdash; <a data-toggle="tooltip" data-placement="top" title="<?php echo $riwayat1['BimbingansBalasanKet'] ?>" style="color: purple">keterangan</a></p>
                      </div>
                     <?php endif ?>
                    </div>
                  </div>
                 
          <?php } ?>
                </div>
          <!--  -->
                    </div>
                  </div>
                  </div>
                  </div>  
                  </div>
                  <?php }else{ ?>
                  <p align="center">Belum Ada Data</p>
                  <?php } ?>              
                      </div>
<!--  -->
<!-- Bimbingan 2 -->
                      <div class="tab-pane fade" id="dosbing2" role="tabpanel" aria-labelledby="dosbing2-tab5">
<?php if($bimbingan){ ?>
<div class="row">
<div class="col-12 col-md-12 col-lg-12">
<div class="row">
  <div class="col-6">
    <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#modaladd2">
  <i class="fas fa-plus-circle"></i>
 Bimbingan
</button>
  </div>
  <div class="col-6">
<?php $nama=$this->db->get_where('tdosen',['DosenId'=>$bimbingan->DosbingsDosenId2])->row_array();?>
<p align="right"><b>DOSEN PEMBIMBING :  <?php echo $nama['DosenNama'] ?></b></p>
  </div>
</div>
<?php 
      $id_dosen2 = $bimbingan->DosbingsDosenId2;
      $id_mhs    = $this->session->userdata('MhsNim');
      $total = $this->db->query("SELECT COUNT(*) as total FROM tbimbingans join
               tdosbings on tdosbings.DosbingsId=tbimbingans.BimbingansDosbingsId
               join tdaftars on tdaftars.DaftarsId=tdosbings.DosbingsDaftarsId
               WHERE tbimbingans.BimbingansMhsNim='$id_mhs' 
               and tdaftars.DaftarsStatusAkhir!=2
               and tbimbingans.BimbingansDosenId='$id_dosen2'")->row_array();
 ?>

                   <div class="card card-info">
                  <div class="card-header">
                    <h4>Riwayat Bimbingan : <span class="badge badge-primary badge-pill"><?php echo $total['total'] ?></span></h4>
                    <div class="card-header-action">
                      <a data-collapse="#2" class="btn btn-icon btn-info" href="#"><i class="fas fa-minus"></i></a>
                    </div>
                  </div>
                  <div class="collapse show" id="2">
                    <div class="card-body">
                      <!--  -->
                  <div class="activities">
            <?php foreach ($riwayat2 as $riwayat2) { ?>
                  <div class="activity">
                    <?php if ($riwayat2['BimbingansBab']=='judul'): ?>
                      <div class="activity-icon bg-success text-white shadow-primary">
                      <i class="fas fa-comment-alt"></i>
                    </div>
                    <?php elseif ($riwayat2['BimbingansBab']=='proposal'): ?>
                      <div class="activity-icon bg-warning text-white shadow-primary">
                      <i class="fas fa-comment-alt"></i>
                    </div>
                    <?php elseif ($riwayat2['BimbingansBab']=='revisi'): ?>
                      <div class="activity-icon bg-danger text-white shadow-primary">
                      <i class="fas fa-comment-alt"></i>
                    </div>
                    <?php else : ?>
                      <div class="activity-icon bg-primary text-white shadow-primary">
                      <i class="fas fa-comment-alt"></i>
                    </div>
                    <?php endif ?>
                    <div class="activity-detail">
                      <div class="mb-2">
                        <span class="text-job text-primary"><?php echo date("d F Y", strtotime($riwayat2['BimbingansTgl']))  ?></span>
                        <span class="bullet"></span>
                        <a class="text-job">
                          <?php if     ($riwayat2['BimbingansBab']==1): ?>
                          <?php echo 'I' ?>
                          <?php elseif ($riwayat2['BimbingansBab']==2): ?>
                          <?php echo 'II' ?>
                          <?php elseif ($riwayat2['BimbingansBab']==3): ?>
                          <?php echo 'III' ?>
                          <?php elseif ($riwayat2['BimbingansBab']==4): ?>
                          <?php echo 'IV' ?>
                          <?php elseif ($riwayat2['BimbingansBab']==5): ?>
                          <?php echo 'V' ?>
                          <?php elseif ($riwayat2['BimbingansBab']=='judul'): ?>
                          <?php echo 'JUDUL' ?>
                          <?php elseif ($riwayat2['BimbingansBab']=='proposal'): ?>
                          <?php echo 'PROPOSAL' ?>
                          <?php elseif ($riwayat2['BimbingansBab']=='revisi'): ?>
                          <?php echo 'REVISI SIDANG' ?>
                          <?php endif ?>
                        </a>
                      </div>
                      <p>Kamu Mengirimkan "<a href="<?php echo base_url('assets/upload/bimbingan/'.$riwayat2['BimbingansFile']) ?>" target="_blank" ><?php echo $riwayat2['BimbingansMhsNim'] .'_'.$riwayat2['BimbingansBab'] ?></a>" &mdash; <a data-toggle="tooltip" data-placement="top" title="<?php echo $riwayat2['BimbingansKet'] ?>" style="color: purple">keterangan</a></p>


                     <?php if ($riwayat2['BimbingansStatus']==0): ?>
                       <span style="color: red;">Silahkan Menunggu Balasan Dosen Pembimbing</span>
                     <?php elseif($riwayat2['BimbingansBalasanTgl']!==null): ?>
                      <div class="mb-2">
                        <span class="text-job text-primary"><?php echo date("d F Y", strtotime($riwayat2['BimbingansBalasanTgl'])) ?></span>
                        <span class="bullet"></span>
                          <?php if ($riwayat2['BimbingansStatus']==1): ?>
                            <a class="text-job" style="color: #0DF908">ACC</a>
                          <?php elseif ($riwayat2['BimbingansStatus']==2) :?>
                            <a class="text-job" style="color: red">REVISI</a>
                          <?php else: ?>
                          <?php endif ?>
                      </div>
                       <p>Dosen Mengirimkan "<a href="<?php echo base_url('assets/upload/bimbingan/'.$riwayat2['BimbingansBalasanFile']) ?>" target="_blank"><?php echo $riwayat2['BimbingansMhsNim'] .'_'.$riwayat2['BimbingansBab'].'_replay' ?></a>" &mdash; <a data-toggle="tooltip" data-placement="top" title="<?php echo $riwayat2['BimbingansBalasanKet'] ?>" style="color: purple">keterangan</a></p>
                     <?php endif ?>
                    </div>
                  </div>
                 
          <?php } ?>
                </div>
          <!--  -->

                    </div>
                  </div>
                  </div>     
                  </div>
                  </div>
                  <?php }else{ ?>
                  <p align="center">Belum Ada Data</p>
                  <?php } ?> 
                      </div>
           <!--  -->
<!-- Bimbingan 3 -->
                      <div class="tab-pane fade" id="ketua" role="tabpanel" aria-labelledby="ketua-tab5">
<?php if($bimbingan){ ?>
<div class="row">
<div class="col-12 col-md-12 col-lg-12">
<div class="row">
  <div class="col-6">
    <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#modaladd3">
  <i class="fas fa-plus-circle"></i>
 Bimbingan
</button>
  </div>
  <div class="col-6">
<?php $nama=$this->db->get_where('tdosen',['DosenId'=>$bimbingan->DosbingsKetua])->row_array();?>
<p align="right"><b>KETUA PENGUJI :  <?php echo $nama['DosenNama'] ?></b></p>
  </div>
</div>
<?php 
      $id_dosen3 = $bimbingan->DosbingsKetua;
      $id_mhs    = $this->session->userdata('MhsNim');
      $total = $this->db->query("SELECT COUNT(*) as total FROM tbimbingans join
               tdosbings on tdosbings.DosbingsId=tbimbingans.BimbingansDosbingsId
               join tdaftars on tdaftars.DaftarsId=tdosbings.DosbingsDaftarsId
               WHERE tbimbingans.BimbingansMhsNim='$id_mhs' 
               and tdaftars.DaftarsStatusAkhir!=2
               and tbimbingans.BimbingansDosenId='$id_dosen3'")->row_array();
 ?>

                   <div class="card card-info">
                  <div class="card-header">
                    <h4>Riwayat Bimbingan : <span class="badge badge-primary badge-pill"><?php echo $total['total'] ?></span></h4>
                    <div class="card-header-action">
                      <a data-collapse="#2" class="btn btn-icon btn-info" href="#"><i class="fas fa-minus"></i></a>
                    </div>
                  </div>
                  <div class="collapse show" id="2">
                    <div class="card-body">
                      <!--  -->
                  <div class="activities">
            <?php foreach ($riwayat3 as $riwayat3) { ?>
                  <div class="activity">
                    <?php if ($riwayat3['BimbingansBab']=='judul'): ?>
                      <div class="activity-icon bg-success text-white shadow-primary">
                      <i class="fas fa-comment-alt"></i>
                    </div>
                    <?php elseif ($riwayat3['BimbingansBab']=='proposal'): ?>
                      <div class="activity-icon bg-warning text-white shadow-primary">
                      <i class="fas fa-comment-alt"></i>
                    </div>
                    <?php elseif ($riwayat3['BimbingansBab']=='revisi'): ?>
                      <div class="activity-icon bg-danger text-white shadow-primary">
                      <i class="fas fa-comment-alt"></i>
                    </div>
                    <?php else : ?>
                      <div class="activity-icon bg-primary text-white shadow-primary">
                      <i class="fas fa-comment-alt"></i>
                    </div>
                    <?php endif ?>
                    <div class="activity-detail">
                      <div class="mb-2">
                        <span class="text-job text-primary"><?php echo date("d F Y", strtotime($riwayat3['BimbingansTgl']))  ?></span>
                        <span class="bullet"></span>
                        <a class="text-job">
                          <?php if     ($riwayat3['BimbingansBab']==1): ?>
                          <?php echo 'I' ?>
                          <?php elseif ($riwayat3['BimbingansBab']==2): ?>
                          <?php echo 'II' ?>
                          <?php elseif ($riwayat3['BimbingansBab']==3): ?>
                          <?php echo 'III' ?>
                          <?php elseif ($riwayat3['BimbingansBab']==4): ?>
                          <?php echo 'IV' ?>
                          <?php elseif ($riwayat3['BimbingansBab']==5): ?>
                          <?php echo 'V' ?>
                          <?php elseif ($riwayat3['BimbingansBab']=='judul'): ?>
                          <?php echo 'JUDUL' ?>
                          <?php elseif ($riwayat3['BimbingansBab']=='proposal'): ?>
                          <?php echo 'PROPOSAL' ?>
                          <?php elseif ($riwayat3['BimbingansBab']=='revisi'): ?>
                          <?php echo 'REVISI SIDANG' ?>
                          <?php endif ?>
                        </a>
                      </div>
                      <p>Kamu Mengirimkan "<a href="<?php echo base_url('assets/upload/bimbingan/'.$riwayat3['BimbingansFile']) ?>" target="_blank" ><?php echo $riwayat3['BimbingansMhsNim'] .'_'.$riwayat3['BimbingansBab'] ?></a>" &mdash; <a data-toggle="tooltip" data-placement="top" title="<?php echo $riwayat3['BimbingansKet'] ?>" style="color: purple">keterangan</a></p>


                     <?php if ($riwayat3['BimbingansStatus']==0): ?>
                       <span style="color: red;">Silahkan Menunggu Balasan Dosen Pembimbing</span>
                     <?php elseif($riwayat3['BimbingansBalasanTgl']!==null): ?>
                      <div class="mb-2">
                        <span class="text-job text-primary"><?php echo date("d F Y", strtotime($riwayat3['BimbingansBalasanTgl'])) ?></span>
                        <span class="bullet"></span>
                          <?php if ($riwayat3['BimbingansStatus']==1): ?>
                            <a class="text-job" style="color: #0DF908">ACC</a>
                          <?php elseif ($riwayat3['BimbingansStatus']==2) :?>
                            <a class="text-job" style="color: red">REVISI</a>
                          <?php else: ?>
                          <?php endif ?>
                      </div>
                       <p>Dosen Mengirimkan "<a href="<?php echo base_url('assets/upload/bimbingan/'.$riwayat3['BimbingansBalasanFile']) ?>" target="_blank"><?php echo $riwayat3['BimbingansMhsNim'] .'_'.$riwayat3['BimbingansBab'].'_replay' ?></a>" &mdash; <a data-toggle="tooltip" data-placement="top" title="<?php echo $riwayat3['BimbingansBalasanKet'] ?>" style="color: purple">keterangan</a></p>
                     <?php endif ?>
                    </div>
                  </div>
                 
          <?php } ?>
                </div>
          <!--  -->

                    </div>
                  </div>
                  </div>     
                  </div>
                  </div>
                  <?php }else{ ?>
                  <p align="center">Belum Ada Data</p>
                  <?php } ?> 
                      </div>
           <!--  -->
<!-- Bimbingan 4 -->
                      <div class="tab-pane fade" id="tamu" role="tabpanel" aria-labelledby="tamu-tab5">
<?php if($bimbingan){ ?>
<div class="row">
<div class="col-12 col-md-12 col-lg-12">
<div class="row">
  <div class="col-6">
    <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#modaladd4">
  <i class="fas fa-plus-circle"></i>
 Bimbingan
</button>
  </div>
  <div class="col-6">
<?php $nama=$this->db->get_where('tdosen',['DosenId'=>$bimbingan->DosbingsTamu])->row_array();?>
<p align="right"><b>DOSEN TAMU :  <?php echo $nama['DosenNama'] ?></b></p>
  </div>
</div>
<?php 
      $id_dosen4 = $bimbingan->DosbingsTamu;
      $id_mhs    = $this->session->userdata('MhsNim');
      $total = $this->db->query("SELECT COUNT(*) as total FROM tbimbingans 
               join tdosbings on tdosbings.DosbingsId=tbimbingans.BimbingansDosbingsId
               join tdaftars on tdaftars.DaftarsId=tdosbings.DosbingsDaftarsId
               WHERE tbimbingans.BimbingansMhsNim='$id_mhs' 
               and tdaftars.DaftarsStatusAkhir!=2
               and tbimbingans.BimbingansDosenId='$id_dosen4'")->row_array();
 ?>

                   <div class="card card-info">
                  <div class="card-header">
                    <h4>Riwayat Bimbingan : <span class="badge badge-primary badge-pill"><?php echo $total['total'] ?></span></h4>
                    <div class="card-header-action">
                      <a data-collapse="#2" class="btn btn-icon btn-info" href="#"><i class="fas fa-minus"></i></a>
                    </div>
                  </div>
                  <div class="collapse show" id="2">
                    <div class="card-body">
                      <!--  -->
                  <div class="activities">
            <?php foreach ($riwayat4 as $riwayat4) { ?>
                  <div class="activity">
                    <?php if ($riwayat4['BimbingansBab']=='judul'): ?>
                      <div class="activity-icon bg-success text-white shadow-primary">
                      <i class="fas fa-comment-alt"></i>
                    </div>
                    <?php elseif ($riwayat4['BimbingansBab']=='proposal'): ?>
                      <div class="activity-icon bg-warning text-white shadow-primary">
                      <i class="fas fa-comment-alt"></i>
                    </div>
                    <?php elseif ($riwayat4['BimbingansBab']=='revisi'): ?>
                      <div class="activity-icon bg-danger text-white shadow-primary">
                      <i class="fas fa-comment-alt"></i>
                    </div>
                    <?php else : ?>
                      <div class="activity-icon bg-primary text-white shadow-primary">
                      <i class="fas fa-comment-alt"></i>
                    </div>
                    <?php endif ?>
                    <div class="activity-detail">
                      <div class="mb-2">
                        <span class="text-job text-primary"><?php echo date("d F Y", strtotime($riwayat4['BimbingansTgl']))  ?></span>
                        <span class="bullet"></span>
                        <a class="text-job">
                          <?php if     ($riwayat4['BimbingansBab']==1): ?>
                          <?php echo 'I' ?>
                          <?php elseif ($riwayat4['BimbingansBab']==2): ?>
                          <?php echo 'II' ?>
                          <?php elseif ($riwayat4['BimbingansBab']==3): ?>
                          <?php echo 'III' ?>
                          <?php elseif ($riwayat4['BimbingansBab']==4): ?>
                          <?php echo 'IV' ?>
                          <?php elseif ($riwayat4['BimbingansBab']==5): ?>
                          <?php echo 'V' ?>
                          <?php elseif ($riwayat4['BimbingansBab']=='judul'): ?>
                          <?php echo 'JUDUL' ?>
                          <?php elseif ($riwayat4['BimbingansBab']=='proposal'): ?>
                          <?php echo 'PROPOSAL' ?>
                          <?php elseif ($riwayat4['BimbingansBab']=='revisi'): ?>
                          <?php echo 'REVISI SIDANG' ?>
                          <?php endif ?>
                        </a>
                      </div>
                      <p>Kamu Mengirimkan "<a href="<?php echo base_url('assets/upload/bimbingan/'.$riwayat4['BimbingansFile']) ?>" target="_blank" ><?php echo $riwayat4['BimbingansMhsNim'] .'_'.$riwayat4['BimbingansBab'] ?></a>" &mdash; <a data-toggle="tooltip" data-placement="top" title="<?php echo $riwayat4['BimbingansKet'] ?>" style="color: purple">keterangan</a></p>


                     <?php if ($riwayat4['BimbingansStatus']==0): ?>
                       <span style="color: red;">Silahkan Menunggu Balasan Dosen Pembimbing</span>
                     <?php elseif($riwayat4['BimbingansBalasanTgl']!==null): ?>
                      <div class="mb-2">
                        <span class="text-job text-primary"><?php echo date("d F Y", strtotime($riwayat4['BimbingansBalasanTgl'])) ?></span>
                        <span class="bullet"></span>
                          <?php if ($riwayat4['BimbingansStatus']==1): ?>
                            <a class="text-job" style="color: #0DF908">ACC</a>
                          <?php elseif ($riwayat4['BimbingansStatus']==2) :?>
                            <a class="text-job" style="color: red">REVISI</a>
                          <?php else: ?>
                          <?php endif ?>
                      </div>
                       <p>Dosen Mengirimkan "<a href="<?php echo base_url('assets/upload/bimbingan/'.$riwayat4['BimbingansBalasanFile']) ?>" target="_blank"><?php echo $riwayat4['BimbingansMhsNim'] .'_'.$riwayat4['BimbingansBab'].'_replay' ?></a>" &mdash; <a data-toggle="tooltip" data-placement="top" title="<?php echo $riwayat4['BimbingansBalasanKet'] ?>" style="color: purple">keterangan</a></p>
                     <?php endif ?>
                    </div>
                  </div>
                 
          <?php } ?>
                </div>
          <!--  -->

                    </div>
                  </div>
                  </div>     
                  </div>
                  </div>
                  <?php }else{ ?>
                  <p align="center">Belum Ada Data</p>
                  <?php } ?> 
                      </div>
           <!--  -->

                    </div>
                  </div>
                </div>
              </div>
            </div>            
<?php  } ?>
</section> 




<!-- tambah bimbingan1 -->
<form action="<?php echo base_url('mhs/bimbingan/bimbingan_dosbing1'); ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="form-horizontal">

<div class="modal fade" id="modaladd1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <?php $nama=$this->db->get_where('tdosen',['DosenId'=>$bimbingan->DosbingsDosenId1])->row_array();?>
        <!-- <h6 class="modal-title" id="exampleModalLongTitle">Dosen : <?php echo $nama['DosenNama'] ?></h6> -->
        <p class="modal-title" id="exampleModalLongTitle" style="color: black;"><span style="color: red;">*</span>
           ) Bagaimanapun sikap dosen pembimbing kalian, terima beliau apa adanya, ikuti perintahnya, serta tetap sabar dan lapang dada saat menghadapi beliau. Dengan begitu kemungkinan besar tugas akhir kalian lancar dan kalian cepat lulus. Semangat!!
        </p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php if($cek_status1['BimbingansStatus']==0 && $cek_status1['BimbingansDosenId']!==null ): ?>
        <div class="modal-body">
        <div class="form-group">
              <div align="center">
                <p style="color: green"><b>Menunggu Balasan</b></p>
              <img src="<?php echo base_url()?>assets/img/umk/wait.png?>" alt="Wait yaa" class="img img-responsive img-thumbnail" width="340">
              </div>
        </div>
        </div>
      <?php elseif($cek_status1['BimbingansStatus']==1 && $cek_status1['BimbingansBab']=='revisi' && $cek_status3['BimbingansStatus']==1 && $cek_status3['BimbingansBab']=='revisi' && $cek_status4['BimbingansStatus']==1 && $cek_status4['BimbingansBab']=='revisi'):?>
        <div class="modal-body">
        <div class="form-group">
              <div align="center">
                <p style="color: green"><b>Masa Bimbingan Sudah Selesai !</b></p>
              <img src="<?php echo base_url()?>assets/img/umk/end.png" alt="Wait yaa" class="img img-responsive img-thumbnail" width="340">
              </div>
        </div>
        </div>
      <?php elseif($cek_status1['BimbingansStatus']==1 && $cek_status1['BimbingansBab']=='revisi'):?>
        <div class="modal-body">
        <div class="form-group">
              <div align="center">
                <p style="color: green"><b>Menunggu ACC Revisi Sidang Dosen Yang Lain</b></p>
              <img src="<?php echo base_url()?>assets/img/umk/wait_dosbing.jpg?>" alt="Wait yaa" class="img img-responsive img-thumbnail" width="340">
              </div>
        </div>
        </div> 
      <?php elseif($cek_status1['BimbingansStatus']==1 && $cek_status1['BimbingansBab']==5 && 
                  $cek_status2['BimbingansStatus']==1 && $cek_status2['BimbingansBab']==5 && $cek_sidang['SidangHasil']==!1):?>
        <div class="modal-body">
        <div class="form-group">
              <div align="center">
                <p style="color: green"><b>Silahkan Daftar Sidang !</b></p>
              <img src="<?php echo base_url()?>assets/img/umk/daftar_sempro.jpg?>" alt="Wait yaa" class="img img-responsive img-thumbnail" width="300">
              </div>
              <div align="center">
                <br>
                <a href="<?php echo base_url('mhs/pendaftaran/daftar_sidang') ?>"><b>Ayo Daftar !</b></a>
              </div>
        </div>
        </div>
        <?php elseif($cek_status1['BimbingansStatus']==1 && $cek_status1['BimbingansBab']==5 && $cek_sidang['SidangHasil']==!1):?>
        <div class="modal-body">
        <div class="form-group">
              <div align="center">
                <p style="color: green"><b>Menunggu ACC Bab V Dosbing 2</b></p>
              <img src="<?php echo base_url()?>assets/img/umk/wait_dosbing.jpg?>" alt="Wait yaa" class="img img-responsive img-thumbnail" width="340">
              </div>
        </div>
        </div>
     <?php elseif($cek_status1['BimbingansStatus']==1 && $cek_status1['BimbingansBab']=='proposal' && 
                  $cek_status2['BimbingansStatus']==1 && $cek_status2['BimbingansBab']=='proposal' &&
                  $cek_sempro['SemproHasil']==!1):?>
        <div class="modal-body">
        <div class="form-group">
              <div align="center">
                <p style="color: green"><b>Silahkan Daftar Sempro !</b></p>
              <img src="<?php echo base_url()?>assets/img/umk/daftar_sempro.jpg?>" alt="Wait yaa" class="img img-responsive img-thumbnail" width="300">
              </div>
              <div align="center">
                <br>
                <a href="<?php echo base_url('mhs/pendaftaran/daftar_seminar') ?>"><b>Ayo Daftar !</b></a>
              </div>
        </div>
        </div>
     <?php elseif($cek_status1['BimbingansStatus']==1 && $cek_status1['BimbingansBab']=='proposal'&&
                  $cek_sempro['SemproHasil']==!1):?>
        <div class="modal-body">
        <div class="form-group">
              <div align="center">
                <p style="color: green"><b>Menunggu ACC Proposal Dosbing 2</b></p>
              <img src="<?php echo base_url()?>assets/img/umk/wait_dosbing.jpg?>" alt="Wait yaa" class="img img-responsive img-thumbnail" width="340">
              </div>
        </div>
        </div>
     <?php else:?>
      <div class="modal-body">
      <div class="form-group">
      <input type="hidden" name="dosbing" value="<?php echo $this->enkripsi->encrypt_url($bimbingan->DosbingsId) ?>">
      <input type="hidden" name="dosbing1" value="<?php echo $this->enkripsi->encrypt_url($bimbingan->DosbingsDosenId1) ?>">
         <hr style="position: relative; bottom: 10px;">
                      <label style="color: black;">BAB</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-list-alt"></i>
                          </div>
                        </div>
                        <select name="bab1" class="form-control">
                        <?php if     ($cek_sidang['SidangHasil']==1):?>
                               <option value="revisi">Rivisi Sidang</option>
                        <?php elseif ($cek_status1['BimbingansBab']==null && 
                                      $cek_status1['BimbingansStatus']==null||
                                      $cek_status1['BimbingansBab']=='judul' &&
                                      $cek_status1['BimbingansStatus']==2):?>
                                      <option value="judul">Judul</option>
                        <?php elseif ($cek_status1['BimbingansBab']=='judul' && 
                                      $cek_status1['BimbingansStatus']==1||
                                      $cek_status1['BimbingansBab']=='proposal' && 
                                      $cek_status1['BimbingansStatus']==2):?>
                        <option value="proposal">Proposal</option>
                        <?php elseif ($cek_status1['BimbingansBab']=='proposal' && 
                                      $cek_status1['BimbingansStatus']==1       ||
                                      $cek_status1['BimbingansBab']!=='proposal' &&
                                      $cek_status1['BimbingansBab']!=='judul'): ?>
                        <option value="1">I</option>
                        <option value="2">II</option>
                        <option value="3">III</option>
                        <option value="4">IV</option>
                        <option value="5">V</option>
                        <?php endif ?> 
                      </select>
                      </div>

                      <?php if       ($cek_status1['BimbingansBab']=='judul' && 
                                      $cek_status1['BimbingansStatus']==2 ||
                                      $cek_status1['BimbingansStatus']==null): ?>
                      <br>
                      <label style="color: black;">JUDUL</label>
                      <textarea name="judul1" class="form-control" type="text" style="height: 25%;"></textarea>
                      <?php endif ?>
                      <br>
                      <label style="color: black;">File</label>
                      <div class="input-group">
                      <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-file-pdf"></i>
                          </div>
                        </div>
                      <div class="custom-file">
                      <input name="file1" type="file" class="custom-file-input" >
                      <label class="custom-file-label" >unggah file bimbingan</label>
                      </div>
                      </div>
                      <br>
                      <label style="color: black;">Cantumkan keterangan</label>
                      <label></label>
                      <textarea name="ket1" class="form-control" type="text" style="height: 25%;"></textarea>
        
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button name="submit" type="submit" class="btn btn-primary">Kirim</button>
      </div>
    <?php endif ?>
    </div>
  </div>
</div>
</div>
</form>



<!-- tambah bimbingan2 -->
<form action="<?php echo base_url('mhs/bimbingan/bimbingan_dosbing2'); ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="form-horizontal">
   
<div class="modal fade" id="modaladd2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <?php $nama=$this->db->get_where('tdosen',['DosenId'=>$bimbingan->DosbingsDosenId2])->row_array();?>
        <!-- <h6 class="modal-title" id="exampleModalLongTitle">Dosen : <?php echo $nama['DosenNama'] ?></h6> -->
         <p class="modal-title" id="exampleModalLongTitle" style="color: black;"><span style="color: red;">*</span>
           ) Bagaimanapun sikap dosen pembimbing kalian, terima beliau apa adanya, ikuti perintahnya, serta tetap sabar dan lapang dada saat menghadapi beliau. Dengan begitu kemungkinan besar tugas akhir kalian lancar dan kalian cepat lulus. Semangat!!
        </p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php if($cek_status2['BimbingansStatus']==0 && $cek_status2['BimbingansDosenId']!==null ) :?>
        <div class="modal-body">
        <div class="form-group">
              <div align="center">
                <p style="color: green"><b>Menunggu Balasan</b></p>
              <img src="<?php echo base_url()?>assets/img/umk/wait.png?>" alt="Wait yaa" class="img img-responsive img-thumbnail" width="340">
              </div>
        </div>
        </div>
        
      <?php elseif ($cek_sidang['SidangHasil']==1): ?>
            <div class="modal-body">
        <div class="form-group">
              <div align="center">
                <p style="color: green"><b>Masa Bimbingan Sudah Selesai !</b></p>
              <img src="<?php echo base_url()?>assets/img/umk/end.png" alt="Wait yaa" class="img img-responsive img-thumbnail" width="340">
              </div>
        </div>
        </div>

      <?php elseif($cek_status1['BimbingansStatus']==1 && $cek_status1['BimbingansBab']==5 &&  $cek_status2['BimbingansStatus']==1 && $cek_status2['BimbingansBab']==5 ):?>
        <div class="modal-body">
        <div class="form-group">
            <div align="center">
                <p style="color: green"><b>Silahkan Daftar Sidang !</b></p>
              <img src="<?php echo base_url()?>assets/img/umk/daftar_sempro.jpg?>" alt="Wait yaa" class="img img-responsive img-thumbnail" width="300">
              </div>
              <div align="center">
                <br>
                <a href="<?php echo base_url('mhs/pendaftaran/daftar_sidang') ?>"><b>Ayo Daftar !</b></a>
              </div>
        </div>
        </div>
        <?php elseif($cek_status2['BimbingansStatus']==1 && $cek_status2['BimbingansBab']==5):?>
        <div class="modal-body">
        <div class="form-group">
              <div align="center">
                <p style="color: green"><b>Menunggu ACC Bab V Dosbing 1</b></p>
              <img src="<?php echo base_url()?>assets/img/umk/wait_dosbing.jpg?>" alt="Wait yaa" class="img img-responsive img-thumbnail" width="340">
              </div>
        </div>
        </div>
     <?php elseif($cek_status1['BimbingansStatus']==1 && $cek_status1['BimbingansBab']=='proposal' && 
                  $cek_status2['BimbingansStatus']==1 && $cek_status2['BimbingansBab']=='proposal' &&
                  $cek_sempro['SemproHasil']==!1):?>
        <div class="modal-body">
        <div class="form-group">
              <div align="center">
                <p style="color: green"><b>Silahkan Daftar Sempro !</b></p>
              <img src="<?php echo base_url()?>assets/img/umk/daftar_sempro.jpg?>" alt="Wait yaa" class="img img-responsive img-thumbnail" width="300">
              </div>
              <div align="center">
                <br>
                <a href="<?php echo base_url('mhs/pendaftaran/daftar_seminar') ?>"><b>Ayo Daftar !</b></a>
              </div>
        </div>
        </div>
      <?php elseif($cek_status2['BimbingansStatus']==1 && $cek_status2['BimbingansBab']=='proposal'&&
                  $cek_sempro['SemproHasil']==!1):?>
        <div class="modal-body">
        <div class="form-group">
              <div align="center">
                <p style="color: green"><b>Menunggu ACC Proposal Dosbing 1</b></p>
              <img src="<?php echo base_url()?>assets/img/umk/wait_dosbing.jpg?>" alt="Wait yaa" class="img img-responsive img-thumbnail" width="340">
              </div>
        </div>
        </div>  
      <?php else:?>
         <div class="modal-body">
      <div class="form-group">
      <input type="hidden" name="dosbing" value="<?php echo $this->enkripsi->encrypt_url($bimbingan->DosbingsId) ?>">
      <input type="hidden" name="dosbing2" value="<?php echo $this->enkripsi->encrypt_url($bimbingan->DosbingsDosenId2) ?>">

                      <label style="color: black;">BAB</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-calendar"></i>
                          </div>
                        </div>
                        <select name="bab2" class="form-control">
                        <?php if     ($cek_status2['BimbingansBab']==null && 
                                      $cek_status2['BimbingansStatus']==null||
                                      $cek_status2['BimbingansBab']=='judul' && 
                                      $cek_status2['BimbingansStatus']==2):?>
                                      <option value="judul">Judul</option>
                        <?php elseif ($cek_status2['BimbingansBab']=='judul' && 
                                      $cek_status2['BimbingansStatus']==1||
                                      $cek_status2['BimbingansBab']=='proposal' && 
                                      $cek_status2['BimbingansStatus']==2
                                       ): ?>
                        <option value="proposal">Proposal</option>
                        <?php elseif ($cek_status2['BimbingansBab']=='proposal' && 
                                      $cek_status2['BimbingansStatus']==1       ||
                                      $cek_status2['BimbingansBab']!=='proposal' &&
                                      $cek_status2['BimbingansBab']!=='judul'): ?>
                        <option value="1">I</option>
                        <option value="2">II</option>
                        <option value="3">III</option>
                        <option value="4">IV</option>
                        <option value="5">V</option>  
                        <?php endif ?> 
                      </select>
                      </div>

                      <?php if       ($cek_status2['BimbingansBab']=='judul' && 
                                      $cek_status2['BimbingansStatus']==2 ||
                                      $cek_status2['BimbingansStatus']==null): ?>
                      <br>
                      <label style="color: black;">JUDUL</label>
                      <textarea name="judul2" class="form-control" type="text" style="height: 25%;"></textarea>
                      <?php endif ?>
                      <br>
                      <label style="color: black;">File</label>
                      <div class="input-group">
                      <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-file-pdf"></i>
                          </div>
                        </div>
                      <div class="custom-file">
                      <input name="file2" type="file" class="custom-file-input" >
                      <label class="custom-file-label" >unggah file bimbingan</label>
                      </div>
                      </div>

                      <label style="color: black;">Cantumkan keterangan</label>
                      <label></label>
                      <textarea name="ket2" class="form-control" type="text" style="height: 25%;"></textarea>
        
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button name="submit" type="submit" class="btn btn-primary">Simpan</button>
      </div>
    <?php endif ?>
    </div>
  </div>
</div>
</div>
</form>

<?php if ($cek_dosbing['DosbingsKetua']!==null): ?>
<!-- tambah bimbingan3 -->
<form action="<?php echo base_url('mhs/bimbingan/bimbingan_dosbing3'); ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="form-horizontal">
   
<div class="modal fade" id="modaladd3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <?php $nama=$this->db->get_where('tdosen',['DosenId'=>$bimbingan->DosbingsKetua])->row_array();?>
        <!-- <h6 class="modal-title" id="exampleModalLongTitle">Dosen : <?php echo $nama['DosenNama'] ?></h6> -->
         <p class="modal-title" id="exampleModalLongTitle" style="color: black;"><span style="color: red;">*</span>
           ) Bagaimanapun sikap dosen pembimbing kalian, terima beliau apa adanya, ikuti perintahnya, serta tetap sabar dan lapang dada saat menghadapi beliau. Dengan begitu kemungkinan besar tugas akhir kalian lancar dan kalian cepat lulus. Semangat!!
        </p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
   
      <?php if($cek_status3['BimbingansStatus']==0 && $cek_status3['BimbingansDosenId']!==null ) :?>
        <div class="modal-body">
        <div class="form-group">
              <div align="center">
                <p style="color: green"><b>Menunggu Balasan</b></p>
              <img src="<?php echo base_url()?>assets/img/umk/wait.png?>" alt="Wait yaa" class="img img-responsive img-thumbnail" width="340">
              </div>
        </div>
        </div>
        <?php elseif($cek_status1['BimbingansStatus']==1 && $cek_status1['BimbingansBab']=='revisi' && $cek_status3['BimbingansStatus']==1 && $cek_status3['BimbingansBab']=='revisi' && $cek_status4['BimbingansStatus']==1 && $cek_status4['BimbingansBab']=='revisi'):?>
        <div class="modal-body">
        <div class="form-group">
              <div align="center">
                <p style="color: green"><b>Masa Bimbingan Sudah Selesai !</b></p>
              <img src="<?php echo base_url()?>assets/img/umk/end.png" alt="Wait yaa" class="img img-responsive img-thumbnail" width="340">
              </div>
        </div>
        </div>
      <?php elseif($cek_status3['BimbingansStatus']==1 && $cek_status3['BimbingansBab']=='revisi'):?>
        <div class="modal-body">
        <div class="form-group">
              <div align="center">
                <p style="color: green"><b>Menunggu ACC Revisi Sidang Dosen Yang Lain</b></p>
              <img src="<?php echo base_url()?>assets/img/umk/wait_dosbing.jpg?>" alt="Wait yaa" class="img img-responsive img-thumbnail" width="340">
              </div>
        </div>
        </div> 
      <?php else:?>
         <div class="modal-body">
      <div class="form-group">
      <input type="hidden" name="dosbing" value="<?php echo $this->enkripsi->encrypt_url($bimbingan->DosbingsId) ?>">
      <input type="hidden" name="dosbing3" value="<?php echo $this->enkripsi->encrypt_url($bimbingan->DosbingsKetua) ?>">

                      <label style="color: black;">BAB</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-calendar"></i>
                          </div>
                        </div>
                        <select name="bab3" class="form-control">
                        <?php if     ($cek_sidang['SidangHasil']==1):?>
                        <option value="revisi">Rivisi Sidang</option>
                        <?php endif ?> 
                      </select>
                      </div>

                     
                      <br>
                      <label style="color: black;">File</label>
                      <div class="input-group">
                      <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-file-pdf"></i>
                          </div>
                        </div>
                      <div class="custom-file">
                      <input name="file3" type="file" class="custom-file-input" >
                      <label class="custom-file-label" >unggah file bimbingan</label>
                      </div>
                      </div>

                      <label style="color: black;">Cantumkan keterangan</label>
                      <label></label>
                      <textarea name="ket3" class="form-control" type="text" style="height: 25%;"></textarea>
        
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button name="submit" type="submit" class="btn btn-primary">Simpan</button>
      </div>
    <?php endif ?>
    </div>
  </div>
</div>
</div>
</form>
<?php endif ?>

<?php if ($cek_dosbing['DosbingsTamu']!==null): ?>
<!-- tambah bimbingan4 -->
<form action="<?php echo base_url('mhs/bimbingan/bimbingan_dosbing4'); ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="form-horizontal">
   
<div class="modal fade" id="modaladd4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <?php $nama=$this->db->get_where('tdosen',['DosenId'=>$bimbingan->DosbingsTamu])->row_array();?>
        <!-- <h6 class="modal-title" id="exampleModalLongTitle">Dosen : <?php echo $nama['DosenNama'] ?></h6> -->
         <p class="modal-title" id="exampleModalLongTitle" style="color: black;"><span style="color: red;">*</span>
           ) Bagaimanapun sikap dosen pembimbing kalian, terima beliau apa adanya, ikuti perintahnya, serta tetap sabar dan lapang dada saat menghadapi beliau. Dengan begitu kemungkinan besar tugas akhir kalian lancar dan kalian cepat lulus. Semangat!!
        </p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <?php if($cek_status4['BimbingansStatus']==0 && $cek_status4['BimbingansDosenId']!==null ) :?>
        <div class="modal-body">
        <div class="form-group">
              <div align="center">
                <p style="color: green"><b>Menunggu Balasan</b></p>
              <img src="<?php echo base_url()?>assets/img/umk/wait.png?>" alt="Wait yaa" class="img img-responsive img-thumbnail" width="340">
              </div>
        </div>
        </div>
        <?php elseif($cek_status1['BimbingansStatus']==1 && $cek_status1['BimbingansBab']=='revisi' && $cek_status3['BimbingansStatus']==1 && $cek_status3['BimbingansBab']=='revisi' && $cek_status4['BimbingansStatus']==1 && $cek_status4['BimbingansBab']=='revisi'):?>
        <div class="modal-body">
        <div class="form-group">
              <div align="center">
                <p style="color: green"><b>Masa Bimbingan Sudah Selesai !</b></p>
              <img src="<?php echo base_url()?>assets/img/umk/end.png" alt="Wait yaa" class="img img-responsive img-thumbnail" width="340">
              </div>
        </div>
        </div>
      <?php elseif($cek_status4['BimbingansStatus']==1 && $cek_status4['BimbingansBab']=='revisi'):?>
        <div class="modal-body">
        <div class="form-group">
              <div align="center">
                <p style="color: green"><b>Menunggu ACC Revisi Sidang Dosen Yang Lain</b></p>
              <img src="<?php echo base_url()?>assets/img/umk/wait_dosbing.jpg?>" alt="Wait yaa" class="img img-responsive img-thumbnail" width="340">
              </div>
        </div>
        </div> 
      <?php else:?>
         <div class="modal-body">
      <div class="form-group">
      <input type="hidden" name="dosbing" value="<?php echo $this->enkripsi->encrypt_url($bimbingan->DosbingsId) ?>">
      <input type="hidden" name="dosbing4" value="<?php echo $this->enkripsi->encrypt_url($bimbingan->DosbingsTamu) ?>">

                      <label style="color: black;">BAB</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-calendar"></i>
                          </div>
                        </div>
                        <select name="bab4" class="form-control">
                        <?php if     ($cek_sidang['SidangHasil']==1):?>
                        <option value="revisi">Rivisi Sidang</option>
                        <?php endif ?> 
                      </select>
                      </div>

                     
                      <br>
                      <label style="color: black;">File</label>
                      <div class="input-group">
                      <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-file-pdf"></i>
                          </div>
                        </div>
                      <div class="custom-file">
                      <input name="file4" type="file" class="custom-file-input" >
                      <label class="custom-file-label" >unggah file bimbingan</label>
                      </div>
                      </div>

                      <label style="color: black;">Cantumkan keterangan</label>
                      <label></label>
                      <textarea name="ket4" class="form-control" type="text" style="height: 25%;"></textarea>
        
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button name="submit" type="submit" class="btn btn-primary">Simpan</button>
      </div>
    <?php endif ?>
    </div>
  </div>
</div>
</div>
</form>
<?php endif ?>
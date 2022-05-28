<div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-body">
                <div class="table table-responsive">
                      <table  id="tabelku" class="table table-striped">
                        <thead>
                          <tr align="center">
                            <th>NO</th>
                            <th>FOTO</th>
                            <th>NIM</th>
                            <th>NAMA</th>
                            <th>ALAMAT</th>
                            <th>NOHP</th>
                            <th>DETAIL</th>
                            <th>Dosbing Lain</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $no=1; foreach ($mhs as $mhs) {?>
                          <tr align="center">
                            <td><?php echo $no ?></td>
                            <td>
                              <?php if ($mhs['MhsFoto']==!null): ?>
                            <div class="gallery">
                            <div class="gallery-item" data-image="<?php echo base_url('assets/upload/profil/mhs/'. $mhs['MhsFoto']) ?>" data-title="Image 1"></div>
                           </div>
                              <?php endif ?>
                            </td>
                            <td><?php echo $mhs['MhsNim'] ?></td>
                            <td><?php echo $mhs['MhsNama'] ?></td>
                            <td><?php echo $mhs['MhsAlamat'] ?></td>
                            <td><?php echo $mhs['MhsNohp'] ?></td>
                            <td>
                            <?php 
                            $id_dosen    = $this->session->userdata('UserId');
                            $id_mhs      = $mhs['MhsNim'];
                            $sql         = "SELECT tbimbingans.*,tdaftars.DaftarsNIM FROM tbimbingans join tdaftars on tdaftars.DaftarsNIM=tbimbingans.BimbingansMhsNim WHERE tdaftars.DaftarsNIM='$id_mhs' AND tbimbingans.BimbingansDosenId='$id_dosen' and tdaftars.DaftarsStatusAkhir=0";
                            $bimbingan=$this->db->query($sql)->row_array();?>
                            <?php if (!empty($bimbingan['BimbingansId'])): ?>
                               <a href="" data-toggle="modal" data-target="#detail_<?php echo $mhs['MhsNim'] ?>" class="btn btn-primary">Detail</a>
                               <?php else: ?>
                                <a style="color: red">Kosong</a>
                             <?php endif ?> 
                            </td>
                            <td>
                            <?php 
                            $id_dosen    = $this->session->userdata('UserId');
                            $id_dosbing  = $mhs['DosbingsId'];


                            $dosbing     = $this->db->query("SELECT * from tdosbings where DosbingsId='$id_dosbing'")->row_array();
                            $p1          = $dosbing['DosbingsDosenId1'];
                            $p2          = $dosbing['DosbingsDosenId2'];

                            ?>
                            <!-- p2 -->
                            <?php if($dosbing['DosbingsDosenId1']==$id_dosen):?>
                             <a href="" data-toggle="modal" data-target="#dosbing2_<?php echo $id_dosbing ?>" class="btn btn-primary">Cek</a> 
                            <?php endif ?>
                            <!-- p1 -->
                            <?php if($dosbing['DosbingsDosenId2']==$id_dosen): ?>
                             <a href="" data-toggle="modal" data-target="#dosbing1_<?php echo $id_dosbing ?>" class="btn btn-primary">Cek</a> 
                            <?php endif ?>  
                            </td>
                          </tr>
                         <?php $no++;} ?>
                        </tbody>
                      </table>
                
                    </div>
                  </div>
                </div>
              </div>
</div>
</section>



<?php foreach ($detail as $detail) { ?>
<!-- detail -->
<div class="modal fade" id="detail_<?php echo $detail['BimbingansMhsNim'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <?php 
      $id_dosen    = $this->session->userdata('UserId');
      $id_mhs      = $detail['BimbingansMhsNim'];
      $total       = $this->db->query("SELECT COUNT(*) as total from tbimbingans 
        join tdosbings on tdosbings.DosbingsId=tbimbingans.BimbingansDosbingsId
        join tdaftars on tdaftars.DaftarsId=tdosbings.DosbingsDaftarsId
        WHERE DaftarsNIM='$id_mhs' AND BimbingansDosenId='$id_dosen' and tdaftars.DaftarsStatusAkhir=0")->row_array();
      ?> 
        <h5 class="modal-title" id="exampleModalLongTitle">Total Bimbingan : <?php echo $total['total']?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
      <?php 
      $dosen    = $this->session->userdata('UserId');
      $mhs      = $detail['BimbingansMhsNim'];
      $detail_bim = $this->db->query("SELECT tbimbingans.*,tdosbings.DosbingsId,tdaftars.DaftarsStatusAkhir from tbimbingans 
        join tdosbings on tdosbings.DosbingsId=tbimbingans.BimbingansDosbingsId
        join tdaftars on tdaftars.DaftarsId=tdosbings.DosbingsDaftarsId
        WHERE DaftarsNIM='$mhs' AND BimbingansDosenId='$dosen' and tdaftars.DaftarsStatusAkhir=0 order by BimbingansId Desc")->result_array();
      ?>  
      
                  <div class="activities">
                  <?php foreach ($detail_bim as $detail) { ?>
                  <div class="activity">
                    <?php if ($detail['BimbingansBab']=='judul'): ?>
                      <div class="activity-icon bg-success text-white shadow-primary">
                      <i class="fas fa-comment-alt"></i>
                    </div>
                    <?php elseif ($detail['BimbingansBab']=='proposal'): ?>
                      <div class="activity-icon bg-warning text-white shadow-primary">
                      <i class="fas fa-comment-alt"></i>
                    </div>
                    <?php elseif ($detail['BimbingansBab']=='revisi'): ?>
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
                        <span class="text-job text-primary" ><?php echo date("d F Y", strtotime($detail['BimbingansTgl']))  ?></span>
                        <span class="bullet"></span>
                        <a class="text-job">
                          <?php if     ($detail['BimbingansBab']==1): ?>
                          <?php echo 'I' ?>
                          <?php elseif ($detail['BimbingansBab']==2): ?>
                          <?php echo 'II' ?>
                          <?php elseif ($detail['BimbingansBab']==3): ?>
                          <?php echo 'III' ?>
                          <?php elseif ($detail['BimbingansBab']==4): ?>
                          <?php echo 'IV' ?>
                          <?php elseif ($detail['BimbingansBab']==5): ?>
                          <?php echo 'V' ?>
                          <?php elseif ($detail['BimbingansBab']=='judul'): ?>
                          <?php echo 'JUDUL' ?>
                          <?php elseif ($detail['BimbingansBab']=='proposal'): ?>
                          <?php echo 'PROPOSAL' ?>
                          <?php elseif ($detail['BimbingansBab']=='revisi'): ?>
                          <?php echo 'REVISI SIDANG' ?>
                          <?php endif ?>
                        </a>
                      </div>
                       <p>Mahasiswa Mengirimkan "<a href="<?php echo base_url('assets/upload/bimbingan/'.$detail['BimbingansFile']) ?>" target="_blank" ><?php echo $detail['BimbingansMhsNim'] .'_'.$detail['BimbingansBab'] ?></a>" &mdash; <a data-toggle="tooltip" data-placement="top" title="<?php echo $detail['BimbingansKet'] ?>" style="color: purple">keterangan</a></p>


                     <?php if ($detail['BimbingansStatus']==0): ?>
                       <span style="color: red;">Menunggu Balasan</span>
                     <?php elseif($detail['BimbingansBalasanTgl']!==null): ?>
                      <div class="mb-2">
                        <span class="text-job text-primary"><?php echo date("d F Y", strtotime($detail['BimbingansBalasanTgl'])) ?></span>
                        
                        <span class="bullet"></span>
                          <?php if ($detail['BimbingansStatus']==1): ?>
                            <a class="text-job" style="color: green">ACC</a>
                          <?php elseif ($detail['BimbingansStatus']==2) :?>
                            <a class="text-job" style="color: red">REVISI</a>
                          <?php else: ?>
                          <?php endif ?>
                      </div>
                      <p>Anda Mengirimkan "<a href="<?php echo base_url('assets/upload/bimbingan/'.$detail['BimbingansBalasanFile']) ?>" target="_blank"><?php echo $detail['BimbingansMhsNim'] .'_'.$detail['BimbingansBab'].'_replay' ?></a>" &mdash; <a data-toggle="tooltip" data-placement="top" title="<?php echo $detail['BimbingansBalasanKet'] ?>" style="color: purple">keterangan</a></p>
                     <?php endif ?>
                    </div>
                  </div>
                 <?php } ?>
                </div>
                    
       </div>
      </div>
    </div>
  </div>
</div>
</div>
<?php } ?>





<?php 
$dosbing1 = $this->db->query("SELECT * from tbimbingans 
            ")->result_array();
 ?>

<?php foreach ($dosbing1 as $detail) { ?>
<!-- dosbing1 -->
<div class="modal fade" id="dosbing1_<?php echo $detail['BimbingansDosbingsId'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <?php 
      $id_dosen    = $detail['BimbingansDosenId'];
      $id_mhs      = $detail['BimbingansMhsNim'];
      $total       = $this->db->query("SELECT COUNT(*) as total from tbimbingans 
        join tdosbings on tdosbings.DosbingsId=tbimbingans.BimbingansDosbingsId
        join tdaftars on tdaftars.DaftarsId=tdosbings.DosbingsDaftarsId
        WHERE DaftarsNIM='$id_mhs' AND BimbingansDosenId='$id_dosen' and tdaftars.DaftarsStatusAkhir=0")->row_array();
      $dosen = $this->db->query("SELECT * from tdosen 
            where DosenId='$id_dosen'")->row_array();
      ?> 
      <p style="font-weight: bold;">Dosen : <?php echo $dosen['DosenNama']?></p>
        <br>
      <p style="font-weight: bold">Total Bimbingan : <?php echo $total['total']?></p>
      </div>
      <div class="modal-body">
        <div class="form-group">
      <?php 
      $mhs      = $detail['BimbingansMhsNim'];
      $detail_bim = $this->db->query("SELECT tbimbingans.*,tdosbings.DosbingsId,tdaftars.DaftarsStatusAkhir from tbimbingans 
        join tdosbings on tdosbings.DosbingsId=tbimbingans.BimbingansDosbingsId
        join tdaftars on tdaftars.DaftarsId=tdosbings.DosbingsDaftarsId
        WHERE DaftarsNIM='$mhs' AND BimbingansDosenId='$id_dosen' and tdaftars.DaftarsStatusAkhir=0 order by BimbingansId Desc")->result_array();
      ?>  
      
                  <div class="activities">
                  <?php foreach ($detail_bim as $detail) { ?>
                  <div class="activity">
                    <?php if ($detail['BimbingansBab']=='judul'): ?>
                      <div class="activity-icon bg-success text-white shadow-primary">
                      <i class="fas fa-comment-alt"></i>
                    </div>
                    <?php elseif ($detail['BimbingansBab']=='proposal'): ?>
                      <div class="activity-icon bg-warning text-white shadow-primary">
                      <i class="fas fa-comment-alt"></i>
                    </div>
                    <?php elseif ($detail['BimbingansBab']=='revisi'): ?>
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
                        <span class="text-job text-primary" ><?php echo date("d F Y", strtotime($detail['BimbingansTgl']))  ?></span>
                        <span class="bullet"></span>
                        <a class="text-job">
                          <?php if     ($detail['BimbingansBab']==1): ?>
                          <?php echo 'I' ?>
                          <?php elseif ($detail['BimbingansBab']==2): ?>
                          <?php echo 'II' ?>
                          <?php elseif ($detail['BimbingansBab']==3): ?>
                          <?php echo 'III' ?>
                          <?php elseif ($detail['BimbingansBab']==4): ?>
                          <?php echo 'IV' ?>
                          <?php elseif ($detail['BimbingansBab']==5): ?>
                          <?php echo 'V' ?>
                          <?php elseif ($detail['BimbingansBab']=='judul'): ?>
                          <?php echo 'JUDUL' ?>
                          <?php elseif ($detail['BimbingansBab']=='proposal'): ?>
                          <?php echo 'PROPOSAL' ?>
                          <?php elseif ($detail['BimbingansBab']=='revisi'): ?>
                          <?php echo 'REVISI SIDANG' ?>
                          <?php endif ?>
                        </a>
                      </div>
                       <p>Mahasiswa Mengirimkan "<a href="<?php echo base_url('assets/upload/bimbingan/'.$detail['BimbingansFile']) ?>" target="_blank" ><?php echo $detail['BimbingansMhsNim'] .'_'.$detail['BimbingansBab'] ?></a>" &mdash; <a data-toggle="tooltip" data-placement="top" title="<?php echo $detail['BimbingansKet'] ?>" style="color: purple">keterangan</a></p>


                     <?php if ($detail['BimbingansStatus']==0): ?>
                       <span style="color: red;">Menunggu Balasan</span>
                     <?php elseif($detail['BimbingansBalasanTgl']!==null): ?>
                      <div class="mb-2">
                        <span class="text-job text-primary"><?php echo date("d F Y", strtotime($detail['BimbingansBalasanTgl'])) ?></span>
                        
                        <span class="bullet"></span>
                          <?php if ($detail['BimbingansStatus']==1): ?>
                            <a class="text-job" style="color: green">ACC</a>
                          <?php elseif ($detail['BimbingansStatus']==2) :?>
                            <a class="text-job" style="color: red">REVISI</a>
                          <?php else: ?>
                          <?php endif ?>
                      </div>
                      <p>Anda Mengirimkan "<a href="<?php echo base_url('assets/upload/bimbingan/'.$detail['BimbingansBalasanFile']) ?>" target="_blank"><?php echo $detail['BimbingansMhsNim'] .'_'.$detail['BimbingansBab'].'_replay' ?></a>" &mdash; <a data-toggle="tooltip" data-placement="top" title="<?php echo $detail['BimbingansBalasanKet'] ?>" style="color: purple">keterangan</a></p>
                     <?php endif ?>
                    </div>
                  </div>
                 <?php } ?>
                </div>
                    
       </div>
      </div>
    </div>
  </div>
</div>
</div>
<?php } ?>



<?php 
$dosbing2 = $this->db->query("SELECT * from tbimbingans 
            where BimbingansDosbingsId='$id_dosbing' 
            and BimbingansDosenId='$p2'")->result_array();
 ?>
<?php foreach ($dosbing2 as $detail) { ?>
<!-- dosbing2 -->
<div class="modal fade" id="dosbing2_<?php echo $detail['BimbingansDosbingsId'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <?php 
      $id_dosen    = $detail['BimbingansDosenId'];
      $id_mhs      = $detail['BimbingansMhsNim'];
      $total       = $this->db->query("SELECT COUNT(*) as total from tbimbingans 
        join tdosbings on tdosbings.DosbingsId=tbimbingans.BimbingansDosbingsId
        join tdaftars on tdaftars.DaftarsId=tdosbings.DosbingsDaftarsId
        WHERE DaftarsNIM='$id_mhs' AND BimbingansDosenId='$id_dosen' and tdaftars.DaftarsStatusAkhir=0")->row_array();
      $dosen = $this->db->query("SELECT * from tdosen 
            where DosenId='$id_dosen'")->row_array();
      ?> 
      <p style="font-weight: bold;">Dosen : <?php echo $dosen['DosenNama']?></p>
        <br>
      <p style="font-weight: bold">Total Bimbingan : <?php echo $total['total']?></p>
      </div>
      <div class="modal-body">
        <div class="form-group">
      <?php 
      $mhs      = $detail['BimbingansMhsNim'];
      $detail_bim = $this->db->query("SELECT tbimbingans.*,tdosbings.DosbingsId,tdaftars.DaftarsStatusAkhir from tbimbingans 
        join tdosbings on tdosbings.DosbingsId=tbimbingans.BimbingansDosbingsId
        join tdaftars on tdaftars.DaftarsId=tdosbings.DosbingsDaftarsId
        WHERE DaftarsNIM='$mhs' AND BimbingansDosenId='$id_dosen' and tdaftars.DaftarsStatusAkhir=0 order by BimbingansId Desc")->result_array();
      ?>  
      
                  <div class="activities">
                  <?php foreach ($detail_bim as $detail) { ?>
                  <div class="activity">
                    <?php if ($detail['BimbingansBab']=='judul'): ?>
                      <div class="activity-icon bg-success text-white shadow-primary">
                      <i class="fas fa-comment-alt"></i>
                    </div>
                    <?php elseif ($detail['BimbingansBab']=='proposal'): ?>
                      <div class="activity-icon bg-warning text-white shadow-primary">
                      <i class="fas fa-comment-alt"></i>
                    </div>
                    <?php elseif ($detail['BimbingansBab']=='revisi'): ?>
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
                        <span class="text-job text-primary" ><?php echo date("d F Y", strtotime($detail['BimbingansTgl']))  ?></span>
                        <span class="bullet"></span>
                        <a class="text-job">
                          <?php if     ($detail['BimbingansBab']==1): ?>
                          <?php echo 'I' ?>
                          <?php elseif ($detail['BimbingansBab']==2): ?>
                          <?php echo 'II' ?>
                          <?php elseif ($detail['BimbingansBab']==3): ?>
                          <?php echo 'III' ?>
                          <?php elseif ($detail['BimbingansBab']==4): ?>
                          <?php echo 'IV' ?>
                          <?php elseif ($detail['BimbingansBab']==5): ?>
                          <?php echo 'V' ?>
                          <?php elseif ($detail['BimbingansBab']=='judul'): ?>
                          <?php echo 'JUDUL' ?>
                          <?php elseif ($detail['BimbingansBab']=='proposal'): ?>
                          <?php echo 'PROPOSAL' ?>
                          <?php elseif ($detail['BimbingansBab']=='revisi'): ?>
                          <?php echo 'REVISI SIDANG' ?>
                          <?php endif ?>
                        </a>
                      </div>
                       <p>Mahasiswa Mengirimkan "<a href="<?php echo base_url('assets/upload/bimbingan/'.$detail['BimbingansFile']) ?>" target="_blank" ><?php echo $detail['BimbingansMhsNim'] .'_'.$detail['BimbingansBab'] ?></a>" &mdash; <a data-toggle="tooltip" data-placement="top" title="<?php echo $detail['BimbingansKet'] ?>" style="color: purple">keterangan</a></p>


                     <?php if ($detail['BimbingansStatus']==0): ?>
                       <span style="color: red;">Menunggu Balasan</span>
                     <?php elseif($detail['BimbingansBalasanTgl']!==null): ?>
                      <div class="mb-2">
                        <span class="text-job text-primary"><?php echo date("d F Y", strtotime($detail['BimbingansBalasanTgl'])) ?></span>
                        
                        <span class="bullet"></span>
                          <?php if ($detail['BimbingansStatus']==1): ?>
                            <a class="text-job" style="color: green">ACC</a>
                          <?php elseif ($detail['BimbingansStatus']==2) :?>
                            <a class="text-job" style="color: red">REVISI</a>
                          <?php else: ?>
                          <?php endif ?>
                      </div>
                      <p>Anda Mengirimkan "<a href="<?php echo base_url('assets/upload/bimbingan/'.$detail['BimbingansBalasanFile']) ?>" target="_blank"><?php echo $detail['BimbingansMhsNim'] .'_'.$detail['BimbingansBab'].'_replay' ?></a>" &mdash; <a data-toggle="tooltip" data-placement="top" title="<?php echo $detail['BimbingansBalasanKet'] ?>" style="color: purple">keterangan</a></p>
                     <?php endif ?>
                    </div>
                  </div>
                 <?php } ?>
                </div>
                    
       </div>
      </div>
    </div>
  </div>
</div>
</div>
<?php } ?>



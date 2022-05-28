<div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-body">
                <div class="table table-responsive">
                      <table  id="tabelku" class="table table-striped">
                        <thead>
                          <tr align="center">
                            <th>NO</th>
                            <th>NIM</th>
                            <th>NAMA</th>
                            <th>STATUS</th>
                            <th>AKSI</th>
                          </tr>
                        </thead>
                        <tbody>
                         <?php $no=1; foreach ($monitoring as $mhs) {?>
                          <tr align="center">
                            <td><?php echo $no ?></td>
                            <td><?php echo $mhs['DaftarsNIM'] ?></td>
                            <td><?php echo $mhs['MhsNama'] ?></td>
                            <td>
                               <?php if ($mhs['DaftarsStatusAkhir']==0) { ?>
                                  <div class="badge badge-warning">
                                     <?php echo 'PROSES';?>
                                  </div>
                                  <?php } else if($mhs['DaftarsStatusAkhir']==1) {?>
                                    <div class="badge badge-success">
                                      <?php  echo 'LULUS'; ?>
                                    </div>
                                 <?php }else{ ?>
                                    <div class="badge badge-danger">
                                      <?php  echo 'GAGAL'; ?>
                                    </div>
                                 <?php } ?>
                            </td>
                            <td>
                              <a href="" data-toggle="modal" data-target="#detail_<?php echo $mhs['DaftarsNIM'] ?>" class="btn btn-primary">Detail</a>
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


<?php foreach ($monitoring as $mhs) {?> 
<div class="modal fade" id="detail_<?php echo $mhs['DaftarsNIM'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Monitoring Mahasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        <div class="form-group">
         
<?php 
$id_mhs= $mhs['DaftarsNIM'];
$id_daftar= $mhs['DaftarsId'];

$dosbing=$this->db->query("SELECT * from tdosbings where DosbingsDaftarsId='$id_daftar'")->row_array();
$dosen_utama=$dosbing['DosbingsDosenId1'];
$dosen_pendamping=$dosbing['DosbingsDosenId2'];
$dosbing1=$this->db->query("SELECT DosenNama from tdosen where DosenId='$dosen_utama'")->row_array();
$dosbing2=$this->db->query("SELECT DosenNama from tdosen where DosenId='$dosen_pendamping'")->row_array();
$t1=$this->db->query("SELECT  COUNT(*) as total from tbimbingans 
join tdosbings on tdosbings.DosbingsId=tbimbingans.BimbingansDosbingsId 
join tdaftars on tdaftars.DaftarsId=tdosbings.DosbingsDaftarsId 
where tdaftars.DaftarsId='$id_daftar' and tbimbingans.BimbingansDosenId='$dosen_utama'")->row_array();
$t2=$this->db->query("SELECT  COUNT(*) as total from tbimbingans 
join tdosbings on tdosbings.DosbingsId=tbimbingans.BimbingansDosbingsId 
join tdaftars on tdaftars.DaftarsId=tdosbings.DosbingsDaftarsId 
where tdaftars.DaftarsId='$id_daftar' and tbimbingans.BimbingansDosenId='$dosen_pendamping'")->row_array();

$sempro = $this->db->query("SELECT tsempro.* from tsempro 
join tdaftarsempro on tdaftarsempro.DafsemId=tsempro.SemproDafsemId 
join tdaftars on tdaftars.DaftarsId=tdaftarsempro.DafsemDaftarsId 
where DaftarsId='$id_daftar'")->row_array();
$d_sp1 = $sempro['SemproPenguji1'];
$d_sp2 = $sempro['SemproPenguji2'];
$d_sp3 = $sempro['SemproPenguji3'];
$sp_p1= $this->db->query("SELECT DosenNama from tdosen where DosenId='$d_sp1'")->row_array();
$sp_p2= $this->db->query("SELECT DosenNama from tdosen where DosenId='$d_sp2'")->row_array();
$sp_p3= $this->db->query("SELECT DosenNama from tdosen where DosenId='$d_sp3'")->row_array();


$sidang = $this->db->query("SELECT tsidang.* from tsidang 
join tdaftarsidang on tdaftarsidang.DafsidId=tsidang.SidangDafsidId 
join tdaftars on tdaftars.DaftarsId=tdaftarsidang.DafsidDaftarsId 
where DaftarsId='$id_daftar'")->row_array();
$d_sd1 = $sidang['SidangPenguji1'];
$d_sd2 = $sidang['SidangPenguji2'];
$d_sd3 = $sidang['SidangPenguji3'];
$sd_p1= $this->db->query("SELECT DosenNama from tdosen where DosenId='$d_sd1'")->row_array();
$sd_p2= $this->db->query("SELECT DosenNama from tdosen where DosenId='$d_sd2'")->row_array();
$sd_p3= $this->db->query("SELECT DosenNama from tdosen where DosenId='$d_sd3'")->row_array();

$na= $this->db->query("SELECT tnilaiakhir.* from tnilaiakhir
join tsidang on tsidang.SidangId=tnilaiakhir.NaSidangId
join tdaftarsidang on tdaftarsidang.DafsidId=tsidang.SidangDafsidId 
join tdaftars on tdaftars.DaftarsId=tdaftarsidang.DafsidDaftarsId 
where DaftarsId='$id_daftar'")->row_array();



?>


          <div class="row">
            <div class="col-6">
              <table>
              <tbody>
                <tr >
                  <td style="width: 30%">NIM</td>
                  <td style="width: 70%">: <?php echo $mhs['DaftarsNIM'] ?></td>
                </tr>
                <tr>
                  <td style="width: 30%">NAMA</td>
                  <td style="width: 70%">: <?php echo $mhs['MhsNama'] ?></td>
                </tr>
              </tbody>
            </table>   
            </div>  
            <div class="col-6">
              <table>
              <tbody>
                <tr >
                  <td style="width: 30%">Tanggal Daftar</td>
                  <td style="width: 70%">: <?php echo $mhs['DaftarsTgl'] ?></td>
                </tr>
                <tr>
                  <td style="width: 30%">Status Skripsi</td>
                  <td style="width: 70%">: <?php if ($mhs['DaftarsStatusAkhir']==1): ?>
                  <?php echo 'LULUS' ?>
                  <?php elseif ($mhs['DaftarsStatusAkhir']==0): ?>
                  <?php echo 'PROSES' ?>
                  <?php else: ?>
                  <?php echo 'GAGAL' ?>
                  <?php endif ?></td>
                </tr>
              </tbody>
            </table>    
            </div>   
          </div>
          <br>

          <div class="row">
            <div class="col-6">
            <table>
              <tbody>
                <tr >
                  <td style="width: 27%">Pembimbing 1</td>
                  <td style="width: 73%">: <?php echo $dosbing1['DosenNama'] ?>( <?php echo $t1['total'] ?> )</td>
                </tr>
                <tr>
                  <td style="width: 27%">Pembimbing 2</td>
                  <td style="width: 73%">: <?php echo $dosbing2['DosenNama'] ?>( <?php echo $t2['total'] ?> )</td>
                </tr>
              </tbody>
            </table>    
            </div>  
            <div class="col-6">
            <table>
              <tbody>
                <tr >
                  <td style="width: 30%">Tanggal Sempro</td>
                  <td style="width: 70%">: <?php echo $sempro['SemproTgl'] ?></td>
                </tr>
                <tr>
                  <td style="width: 30%">Hasil Sempro</td>
                  <td style="width: 70%">: <?php if ($sempro['SemproHasil']==1): ?>
                  <?php echo 'LULUS' ?>
                  <?php elseif ($sempro['SemproHasil']==2): ?>
                  <?php echo 'Mengulang' ?>
                  <?php else: ?>
                  <?php echo 'Menunggu' ?>
                  <?php endif ?></td>
                </tr>
                <tr >
                  <td style="width: 30%">Ketua Penguji</td>
                  <td style="width: 70%">: <?php echo $sp_p1['DosenNama'] ?></td>
                </tr>
                <tr>
                  <td style="width: 30%">Anggota 1</td>
                  <td style="width: 70%">: <?php echo $sp_p2['DosenNama'] ?></td>
                </tr>
                <tr>
                  <td style="width: 30%">Anggota 2</td>
                  <td style="width: 70%">: <?php echo $sp_p3['DosenNama'] ?></td>
                </tr>
              </tbody>
            </table>      
            </div>   
          </div> 
          <br>

          <div class="row">
            <div class="col-6">
               <table>
              <tbody>
                <tr >
                  <td style="width: 30%">Tanggal Sidang</td>
                  <?php if ($sidang['SidangTgl']==null): ?>
                  <td style="width: 70%">: Menunggu</td>
                  <?php else: ?> 
                  <td style="width: 70%">: <?php echo date("d F Y", strtotime($sidang['SidangTgl'])) ?></td>
                  <?php endif ?>
                  
                </tr>
                <tr>
                  <td style="width: 30%">Hasil Sidang</td>
                  <td style="width: 70%">: <?php if ($sidang['SidangHasil']==1): ?>
                  <?php echo 'LULUS' ?>
                  <?php elseif ($sidang['SidangHasil']==2): ?>
                  <?php echo 'Mengulang' ?>
                  <?php else: ?>
                  <?php echo 'Menunggu' ?>
                  <?php endif ?></td>
                </tr>
                <tr >
                  <td style="width: 30%">Ketua Penguji</td>
                  <td style="width: 70%">: <?php echo $sp_p1['DosenNama'] ?></td>
                </tr>
                <tr>
                  <td style="width: 30%">Anggota 1</td>
                  <td style="width: 70%">: <?php echo $sp_p2['DosenNama'] ?></td>
                </tr>
                <tr>
                  <td style="width: 30%">Anggota 2</td>
                  <td style="width: 70%">: <?php echo $sp_p3['DosenNama'] ?></td>
                </tr>
              </tbody>
            </table>  
            </div>  
            <div class="col-6">
               <table>
              <tbody>
                <tr >
                  <td style="width: 30%">Bebas Skripsi</td>
                  <?php if ($mhs['DaftarsTglSelesai']==null): ?>
                  <td style="width: 70%">: Menunggu</td>
                  <?php else: ?> 
                    <td style="width: 70%">: <?php echo date("d F Y", strtotime($mhs['DaftarsTglSelesai'])) ?></td>
                  <?php endif ?>
                  
                </tr>
                <tr>
                  <td style="width: 30%">Nilai</td>
                  <td style="width: 70%">: <?php echo $na['NaHuruf'] ?></td>
                </tr>
              </tbody>
            </table>  
            </div>   
          </div> 


                    

       
       </div>
      </div>
    </div>
  </div>
</div>
</div>
 <?php } ?>

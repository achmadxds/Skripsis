<?php 
$nim = $this->session->userdata('MhsNim');
$bimbingan = $this->db->query("SELECT tdosbings.*, tdaftars.DaftarsNIM
                              FROM tdosbings JOIN tdaftars on 
                              tdaftars.DaftarsId = tdosbings.DosbingsDaftarsId
                              WHERE tdaftars.DaftarsNIM='$nim' ")->row_array(); ?>

<?php if ($bimbingan==null) { ?>
<div align="center">
  <img src="<?php echo base_url()?>assets/img/umk/denied.jpg?>" alt="" class="img img-responsive img-thumbnail" width="400">
</div>
<?php } else { ?>

<div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-body">

              <div class="table table-responsive">
                  <table  id="tabelku" class="table table-striped">
                      <thead >
                        <tr align="center">
                          <th >NO</th>
                          <th >Nama</th>
                          <th >Hari</th>
                          <th >Ruangan</th>
                          <th >Jam Mulai</th>
                          <th >Jam Selesai</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no=1; foreach ($jadwal as $jadwal) {?>
                        <tr align="center">
                          <td><?php echo $no ?></td>
                          <td><?php echo $jadwal['DosenNama'] ?></td>
                          <td><?php echo $jadwal['JadwalHari'] ?></td>
                          <td><?php echo $jadwal['JadwalRuangan'] ?></td>
                          <td><?php echo $jadwal['JadwalJamMulai'] ?></td>
                          <td><?php echo $jadwal['JadwalJamSelesai'] ?></td>
                        </tr>
                        <?php $no++; } ?>
                      </tbody>
                    </table>
                </div>
              </div>
             </div>
            </div>
           </div>
<?php } ?>
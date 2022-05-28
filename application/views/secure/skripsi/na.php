<div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-body">
              <div class="table table-responsive">
                  <table  id="tabelku" class="table table-striped">
                      <thead >
                        <tr align="center">
                          <th >NO</th>
                          <th >NIM</th>
                          <th >Nama</th>
                          <th >Judul Skripsi</th>
                          <th >Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no=1; foreach ($na as $mhs) {?>
                        <tr >
                          <td align="center"><?php echo $no ?></td>
                          <td align="center"><?php echo $mhs['MhsNim'] ?></td>
                          <td style="width: 30%"><?php echo $mhs['MhsNama'] ?></td>
                          <td><?php echo $mhs['SkripsiJudul'] ?></td>
                          <td style="text-align: center">
                          <div class="btn-group mb-3 btn-group-sm" role="group">
                              <a data-toggle="modal" data-target="#detail_<?php echo $this->enkripsi->encrypt_url($mhs['MhsNim']) ?>"
                              href="" class="btn btn-info"> <i class="fas fa-eye"></i>
                              </a>
                          </div>
                             </td>
                        </tr>
                        <?php $no++; } ?>
                      </tbody>
                    </table>
                </div>
              </div>
             </div>
            </div>
           </div>
</section>


<?php foreach ($na as $mhs) {?>
<div class="modal fade" id="detail_<?php echo $this->enkripsi->encrypt_url($mhs['MhsNim']) ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Hasil Nilai Akhir</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        <div class="form-group">

<?php 
$sidang_id = $mhs['SidangId'];
$na_mhs    = $this->db->query("SELECT * FROM tnilaiakhir WHERE NaSidangID='$sidang_id'")->row_array();?> 
          <div class="row">
            <div class="col-6">
              
            </div>
            <div class="col-3">
              <label>Nilai Huruf</label>
                    <input class="form-control" value="<?php echo $na_mhs['NaHuruf'] ?>" disabled="">
            </div>
            <div class="col-3">
              <label>Nilai Angka</label>
                    <input class="form-control" value="<?php echo $na_mhs['NaAngka'] ?>" disabled="">
            </div>
          </div>
         
    <?php 
    $ketua_p   = $mhs['SidangPenguji1'];
    $ketua = $this->db->query("SELECT * FROM tdosen WHERE DosenId='$ketua_p'")->row_array();?>  
                    <label>Ketua Penguji</label>
                    <input class="form-control" value="<?php echo $ketua['DosenNama'] ?>" disabled="">
    <?php 
    $sidang_id = $mhs['SidangId'];
    $ketua_na = $this->db->query("SELECT * FROM tnilaiKriteria WHERE NiketSidangId='$sidang_id' And NiketDosenLevel=1")->row_array();
                   ?>
                <div class="row">
                  <div class="col-3">
                    <label>Analisa Dan Perancangan</label>
                    <input class="form-control" value="<?php echo $ketua_na['NiketK1'] ?>" disabled="">
                  </div>
                  <div class="col-3">
                    <label>Pemahaman Materi</label>
                    <input class="form-control" value="<?php echo $ketua_na['NiketK2'] ?>" disabled="">
                  </div>
                  <div class="col-2">
                    <label>Aplikasi</label>
                    <input class="form-control" value="<?php echo $ketua_na['NiketK3'] ?>" disabled="">
                  </div>
                  <div class="col-2">
                    <label>Presentasi</label>
                    <input class="form-control" value="<?php echo $ketua_na['NiketK4'] ?>" disabled="">
                  </div>
                  <div class="col-2">
                    <label>Nilai</label>
                    <input class="form-control" value="<?php echo $ketua_na['NiketTotal'] ?>" disabled="">
                  </div>
                 </div>

    <?php 
    $dsn1   = $mhs['SidangPenguji2'];
    $dosen1 = $this->db->query("SELECT * FROM tdosen WHERE DosenId='$dsn1'")->row_array();?> 
                    <br> 
                    <label>Anggota Penguji 1</label>
                    <input class="form-control" value="<?php echo $dosen1['DosenNama'] ?>" disabled="">
    <?php 
    $sidang_id = $mhs['SidangId'];
    $dosen1_na = $this->db->query("SELECT * FROM tnilaiKriteria WHERE NiketSidangId='$sidang_id' And NiketDosenLevel=2")->row_array();
                   ?>
                <div class="row">
                  <div class="col-3">
                    <label>Analisa Dan Perancangan</label>
                    <input class="form-control" value="<?php echo $dosen1_na['NiketK1'] ?>" disabled="">
                  </div>
                  <div class="col-3">
                    <label>Pemahaman Materi</label>
                    <input class="form-control" value="<?php echo $dosen1_na['NiketK2'] ?>" disabled="">
                  </div>
                  <div class="col-2">
                    <label>Aplikasi</label>
                    <input class="form-control" value="<?php echo $dosen1_na['NiketK3'] ?>" disabled="">
                  </div>
                  <div class="col-2">
                    <label>Presentasi</label>
                    <input class="form-control" value="<?php echo $dosen1_na['NiketK4'] ?>" disabled="">
                  </div>
                  <div class="col-2">
                    <label>Nilai</label>
                    <input class="form-control" value="<?php echo $dosen1_na['NiketTotal'] ?>" disabled="">
                  </div>
                 </div>

    <?php 
    $tamu_id   = $mhs['SidangPenguji3'];
    $tamu = $this->db->query("SELECT * FROM tdosen WHERE DosenId='$tamu_id'")->row_array();?>  
                    <br>
                    <label>Anggota Penguji 2</label>
                    <input class="form-control" value="<?php echo $tamu['DosenNama'] ?>" disabled="">
    <?php 
    $sidang_id = $mhs['SidangId'];
    $tamu_na = $this->db->query("SELECT * FROM tnilaiKriteria WHERE NiketSidangId='$sidang_id' And NiketDosenLevel=3")->row_array();
                   ?>
                <div class="row">
                  <div class="col-3">
                    <label>Analisa Dan Perancangan  </label>
                    <input class="form-control" value="<?php echo $tamu_na['NiketK1'] ?>" disabled="">
                  </div>
                  <div class="col-3">
                    <label>Pemahaman Materi</label>
                    <input class="form-control" value="<?php echo $tamu_na['NiketK2'] ?>" disabled="">
                  </div>
                  <div class="col-2">
                    <label>Aplikasi</label>
                    <input class="form-control" value="<?php echo $tamu_na['NiketK3'] ?>" disabled="">
                  </div>
                  <div class="col-2">
                    <label>Presentasi</label>
                    <input class="form-control" value="<?php echo $tamu_na['NiketK4'] ?>" disabled="">
                  </div>
                  <div class="col-2">
                    <label>Nilai</label>
                    <input class="form-control" value="<?php echo $tamu_na['NiketTotal'] ?>" disabled="">
                  </div>
                 </div>
       </div>
      </div>
    </div>
  </div>
</div>
</div>
<?php } ?>
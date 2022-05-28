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
                        <?php $no=1; foreach ($seminar as $mhs) {?>
                        <tr >
                          <td align="center"><?php echo $no ?></td>
                          <td align="center"><?php echo $mhs['MhsNim'] ?></td>
                          <td style="width: 30%"><?php echo $mhs['MhsNama'] ?></td>
                          <td><?php echo $mhs['SkripsiJudul'] ?></td>
                          <td style="text-align: center">
                              <a data-toggle="modal" data-target="#detail_<?php echo $this->enkripsi->encrypt_url($mhs['MhsNim']) ?>"
                              href="" class="btn btn-md btn-info"> <i class="fas fa-eye" data-toggle="tooltip" data-placement="top" title="Cek Hasil"></i>
                              </a>
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

<?php foreach ($seminar as $mhs) {?>
<div class="modal fade" id="detail_<?php echo $this->enkripsi->encrypt_url($mhs['MhsNim']) ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Hasil Seminar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        <div class="form-group">
          <input type="hidden" name="sempro" value="<?php echo $this->enkripsi->encrypt_url($mhs['SemproId']) ?>">
          <div class="row">
            <div class="col-6">
            <?php 
             $ketua_p   = $mhs['SemproPenguji1'];
             $ketua = $this->db->query("SELECT * FROM tdosen WHERE DosenId='$ketua_p'")->row_array();
             ?>  
                <label>Ketua Penguji</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fas fa-user-tie"></i>
                    </div>
                  </div>
                  <input name="ketua" class="form-control" value="<?php echo $ketua['DosenNama'] ?>" disabled="">
               </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <?php 
               $sempro_id = $mhs['SemproId'];
               $ketua_rev = $this->db->query("SELECT * FROM tdetailsempro WHERE DetsemSemproId='$sempro_id' And DetsemLevelDosen=1")->row_array();
               ?> 
                <label>Revisi</label>
                <div class="input-group">
                  <textarea name="revisi" class="form-control" type="text" style="height: 50%;" disabled=""><?php echo $ketua_rev['DetsemKetRevisi'] ?></textarea>
               </div>
            </div>
          </div>

          <div class="row">
            <div class="col-6">
             <?php 
             $dosen1    = $mhs['SemproPenguji2'];
             $dosbing1 = $this->db->query("SELECT * FROM tdosen WHERE DosenId='$dosen1'")->row_array();
             ?> 
                <br>
                <label>Anggota Penguji 1</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fas fa-user-tie"></i>
                    </div>
                  </div>
                  <input name="ketua" class="form-control" value="<?php echo $dosbing1['DosenNama'] ?>" disabled="">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
             <?php 
             $sempro_id = $mhs['SemproId'];
             $dosen1_rev = $this->db->query("SELECT * FROM tdetailsempro WHERE DetsemSemproId='$sempro_id' And DetsemLevelDosen=2")->row_array();
             ?> 
                <label>Revisi</label>
                <div class="input-group">
                  <textarea name="revisi" class="form-control" type="text" style="height: 50%;" disabled=""><?php echo $dosen1_rev['DetsemKetRevisi'] ?></textarea>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-6">
             <?php 
             $dosen2   = $mhs['SemproPenguji3'];
             $dosbing2 = $this->db->query("SELECT * FROM tdosen WHERE DosenId='$dosen2'")->row_array();
             ?> 
              <br>
                <label>Anggota Penguji 2</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fas fa-user-tie"></i>
                    </div>
                  </div>
                  <input name="ketua" class="form-control" value="<?php echo $dosbing2['DosenNama'] ?>" disabled="">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
            <?php 
             $sempro_id = $mhs['SemproId'];
             $dosbing2_rev = $this->db->query("SELECT * FROM tdetailsempro WHERE DetsemSemproId='$sempro_id' And DetsemLevelDosen=3")->row_array();
             ?> 
                <label>Revisi</label>
                <div class="input-group">
                  <textarea name="revisi" class="form-control" type="text" style="height: 50%;" disabled=""><?php echo $dosbing2_rev['DetsemKetRevisi'] ?></textarea>
              </div>
            </div>
          </div>
       </div>
      </div>
    </div>
  </div>
</div>
</div>
<?php } ?>
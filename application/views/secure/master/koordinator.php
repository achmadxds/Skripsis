<div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab5" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="aktif-tab5" data-toggle="tab" href="#aktif" role="tab" aria-controls="aktif" aria-selected="true">
                          <i class="fas fa-clock"></i> Koordinator Aktif</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="riwayat-tab5" data-toggle="tab" href="#riwayat" role="tab" aria-controls="riwayat" aria-selected="false">
                          <i class="fas fa-history"></i> Riwayat Koordinator</a>
                      </li>
                    </ul>
                    <div class="tab-content" id="myTabContent5">
<!--  -->
                      <div class="tab-pane fade show active" id="aktif" role="tabpanel" aria-labelledby="aktif-tab5">
                        <?php foreach ($koordinator as $koordinator): ?>
                        <h6>NIDN : <?php echo $koordinator['DosenNidn'] ?></h6>
                        <h6>Nama : <?php echo $koordinator['DosenNama'] ?></h6>
                        <h6>Alamat : <?php echo $koordinator['DosenAlamat'] ?></h6>
                      <?php endforeach ?>
                      <div align="right">
                        <button class="btn btn-warning" type="button" data-toggle="modal" data-target="#koordinator_" aria-expanded="false" aria-controls="collapseExample">
                        Ganti Koordinator
                      </button>
                      </div>
                      </div>
<!--  -->
                      <div class="tab-pane fade" id="riwayat" role="tabpanel" aria-labelledby="riwayat-tab5">
                        <div class="table table-responsive">
                      <table  id="tabelku2" class="table table-striped">
                        <thead>
                          <tr align="center">
                            <th>NO</th>
                            <th>NAMA</th>
                            <th>PERIODE</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $no=1;   foreach ($riwayat as $riwayat): ?>
                          <tr align="center">
                            <td><?php echo $no ?></td>
                            <td><?php echo $riwayat['DosenNama'] ?></td>
                            <td><?php echo $riwayat['PeriodesTahunakademik'] ?></td>
                          </tr>
                           <?php $no++; endforeach ?>
                        </tbody>

                      </table>
                
                    </div>
                      </div>
<!--  -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
</section>


<?php foreach ($ganti_koordinator as $koordinator) {?>
<form action="<?php echo base_url('secure/master/ganti_koordinator'); ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="form-horizontal">
   
<div class="modal fade" id="koordinator_" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Ganti Koordinator</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
               
                      <label>Nama Dosen</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-user-tie"></i>
                          </div>
                        </div>
                        <select name="dosen" class="form-control">
                        <option value="" disabled selected>Pilih Koordinator Baru</option>
                        <?php  $dosen=$this->db->query("SELECT * FROM tdosen WHERE DosenNidn LIKE '__________' ORDER BY DosenNama ASC")->result_Array();?>
                          <?php foreach ($dosen as $dosen ) {?>
                               <option 
                               value="<?php echo $this->enkripsi->encrypt_url($dosen['DosenId']);?>"><?php echo $dosen['DosenNama'];?>
                               </option>
                           <?php } ?>
                      </select>
                      </div>
                      <input type="hidden" name="koordinator" value="<?php echo $this->enkripsi->encrypt_url($koordinator['UserId']) ?>">
                  
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button name="submit" type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
</div>
</div>
</form>
<?php } ?>
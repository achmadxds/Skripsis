
 <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-body">
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modaladd"> 
<i class="fas fa-plus-circle"></i>
  Dosen
</button>
<br>
<br>
                <div class="table table-responsive">
                    <table  id="tabelku" class="table table-striped" style="width: 100%">
                      <thead>
                        <tr align="center">
                          <th>NO</th>
                          <th>NIDN</th>
                          <th>NAMA</th>
                          <th>Alamat</th>
                          <th>Email</th>
                          <th>NoHP</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no=1; foreach ($dosen as $dosen) {?>
                        <tr >
                          <td><?php echo $no ?></td>
                          <td><?php echo $dosen->DosenNidn ?></td>
                          <td ><?php echo $dosen->DosenNama ?></td>
                          <td><?php echo $dosen->DosenAlamat ?></td>
                          <td><?php echo $dosen->DosenEmail ?></td>
                          <td><?php echo $dosen->DosenNohp ?></td>
                          <td style="text-align: center">
                        <div class="btn-group mb-3 btn-group-md" role="group">
                            <a data-toggle="modal" data-target="#modaledit_<?php echo $this->enkripsi->encrypt_url($dosen->DosenId) ?>" 
                            href="<?php echo base_url('secure/master/edit_dosen/'.$this->enkripsi->encrypt_url($dosen->DosenId)); ?>" class="btn btn-sm btn-icon btn-info"><i class="far fa-edit"></i></a>

                            <a href="<?php echo base_url('secure/master/hapus_dosen/'.$this->enkripsi->encrypt_url($dosen->DosenId)); ?>"  
                               class="btn btn-sm btn-danger" data-confirm="Perhatian ! | Apakah Kamu yakin Ingin Menghapus Data ini ?" data-confirm-yes="window.location.href='<?php echo base_url('secure/master/hapus_dosen/'.$this->enkripsi->encrypt_url($dosen->DosenId)); ?>' ">
                              <i  class="fas fa-trash"></i>
                            </a>
                        </div>
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


<!-- Modal tambah dosen -->
 <form action="<?php echo base_url('secure/master/tambah_dosen'); ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="form-horizontal">
   
<div class="modal fade" id="modaladd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data Dosen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
                    <div class="row">
                      <div class="col-6">
                        <label>NIDN</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-id-badge"></i>
                          </div>
                        </div>
                        <input name="nidn"type="text" class="form-control daterange" required="">
                      </div>
                      </div>
                      <div class="col-6">
                        <label>NO HP</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-phone"></i>
                          </div>
                        </div>
                        <input name="nohp"type="text" class="form-control daterange" required="">
                      </div>
                      </div>
                    </div>
                      <br>
                      <label>Nama</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-user-tie"></i>
                          </div>
                        </div>
                        <input name="nama"type="text" class="form-control daterange" required="">
                      </div>
                      <br>
                      <label>Email</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-at"></i>
                          </div>
                        </div>
                        <input name="email"type="text" class="form-control daterange" required="">
                      </div>
                      <br>
                      <label>Alamat</label>
                      <textarea name="alamat" class="form-control" type="text" style="height: 70%;"></textarea>
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



<?php  foreach ($edit as $dosen) {?>
<!-- Modal edit dosen -->
 <form action="<?php echo base_url('secure/master/edit_dosen'); ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="form-horizontal">
   
<div class="modal fade" id="modaledit_<?php echo $this->enkripsi->encrypt_url($dosen['DosenId']) ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Ubah Data Dosen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
                    <div class="row">
                      <div class="col-6">
                        <label>NIDN</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-id-badge"></i>
                          </div>
                        </div>
                        <input name="nidn"type="text" class="form-control daterange" value="<?php echo $dosen['DosenNidn'] ?>">
                      </div>
                      </div>
                      <div class="col-6">
                        <label>NO HP</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-phone"></i>
                          </div>
                        </div>
                        <input name="nohp"type="text" class="form-control " value="<?php echo $dosen['DosenNohp'] ?>">
                      </div>
                      </div>
                    </div>
                      <br>
                      <label>Nama</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-user-tie"></i>
                          </div>
                        </div>
                        <input name="nama"type="text" class="form-control " value="<?php echo $dosen['DosenNama'] ?>">
                      </div>
                      <br>
                      <label>Email</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-at"></i>
                          </div>
                        </div>
                        <input name="email"type="text" class="form-control " value="<?php echo $dosen['DosenEmail'] ?>">
                      </div>
                      <br>
                      <label>Alamat</label>
                      <textarea name="alamat" class="form-control" type="text" style="height: 70%;"><?php echo $dosen['DosenAlamat'] ?></textarea>
                      <input type="hidden" name="id" value="<?php echo $this->enkripsi->encrypt_url($dosen['DosenId']) ?>">
                  
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

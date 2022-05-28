 <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-body">
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modaladd">
<i class="fas fa-plus-circle"></i>
 Operator
</button>
                    <br>
                    <br>
                    <?php if (!empty($operator)): ?>
                    
                    <table  id="tabelku" class="table table-striped">
                      <thead>
                        <tr>
                          <th>NO</th>
                          <th>NIM</th>
                          <th>Nama</th>
                          <th>Alamat</th>
                          <th>Email</th>
                          <th>No HP</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no=1; foreach ($operator as $operator) {?>
                        <tr>
                          <td><?php echo $no ?></td>
                          <td><?php echo $operator['DosenNidn'] ?></td>
                          <td><?php echo $operator['DosenNama'] ?></td>
                          <td><?php echo $operator['DosenAlamat']?></td>
                          <td><?php echo $operator['DosenEmail'] ?></td>
                          <td><?php echo $operator['DosenNohp'] ?></td>
                          <td>
                            <div class="btn-group mb-3 btn-group-md" role="group">
                         <a data-toggle="modal" data-target="#modaledit_<?php echo $this->enkripsi->encrypt_url($operator['DosenId']) ?>" 
                              href="<?php echo base_url('secure/master/edit_operator/'.$this->enkripsi->encrypt_url($operator['DosenId'])); ?>" 
                              class="btn btn-sm  btn-icon btn-info">
                                <i class="far fa-edit"></i>
                          </a>

                          <a href="<?php echo base_url('secure/master/hapus_operator/'.$this->enkripsi->encrypt_url($operator['DosenId'])); ?>"  
                               class="btn btn-sm btn-danger" data-confirm="Perhatian ! | Apakah Kamu yakin Ingin Menghapus Data ini ?" data-confirm-yes="window.location.href='<?php echo base_url('secure/master/reset_password/'.$this->enkripsi->encrypt_url($operator['DosenId'])); ?>' ">
                              <i  class="fas fa-trash"></i>
                            </a>
                      </div>
                          </td>

                        </tr>
                        <?php $no++;} ?>
                      </tbody>

                      <?php else: ?>
                                <tr align="center">
                                  <td colspan="5" >Tidak Ada Data</td>
                                </tr>
                      <?php endif ?>
                    </table>
                  </div>
                </div>
                </div>
                </div>
</section>

<!-- Modal tambah operatorg -->
<form action="<?php echo base_url('secure/master/tambah_operator'); ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="form-horizontal">
   
<div class="modal fade" id="modaladd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data Operator</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
                    <div class="row">
                      <div class="col-6">
                      <label>NIM</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-id-card"></i>
                          </div>
                        </div>
                        <input  name="nim" type="text" class="form-control " required="">
                      </div>
                      </div>
                      <div class="col-6">
                         <label>NO.Hp</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                             <i class="fas fa-phone"></i>
                          </div>
                        </div>
                        <input  name="nohp" type="text" class="form-control " required="">
                      </div>
                      </div>
                    </div>
                      <br>
                      <label>Nama</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-user"></i>
                          </div>
                        </div>
                        <input  name="nama" type="text" class="form-control " required="">
                      </div>
                      <br>
                      <label>Email</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                             <i class="fas fa-at"></i>
                          </div>
                        </div>
                        <input  name="email" type="text" class="form-control " required="">
                      </div>
                      <br>
                      <label>Alamat</label>
                      <textarea required="" name="alamat" class="form-control" type="text" style="height: 70%;"></textarea>
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



<?php foreach ($edit_operator as $operator) {?>
<!-- Modal Edit Mahasiswa-->
 <form action="<?php echo base_url('secure/master/edit_operator'); ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="form-horizontal">
   
<div class="modal fade" id="modaledit_<?php echo $this->enkripsi->encrypt_url($operator['DosenId']) ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Ubah Data Operator</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        <div class="form-group">
                    <div class="row">
                      <div class="col-6">
                         <label>NIM</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-id-card"></i>
                          </div>
                        </div>
                        <input name="nim"type="text" class="form-control" value="<?php echo $operator['DosenNidn'] ?>" >
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
                        <input name="nohp"type="text" class="form-control" value="<?php echo $operator['DosenNohp'] ?>">
                      </div>
                      </div>
                    </div>
                      <br>
                      <label>Nama</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-user-graduate"></i>
                          </div>
                        </div>
                        <input name="nama"type="text" class="form-control" value="<?php echo $operator['DosenNama'] ?>" >
                      </div>
                      <br>
                      <label>Email</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-at"></i>
                          </div>
                        </div>
                        <input name="email"type="text" class="form-control" value="<?php echo $operator['DosenEmail'] ?>">
                      </div>
                      <br>
                      <label>Alamat</label>
                      <textarea name="alamat" class="form-control" type="text" style="height: 70%;"><?php echo $operator['DosenAlamat'] ?></textarea>

                      <input type="hidden" name="id" value="<?php echo $this->enkripsi->encrypt_url($operator['DosenId']) ?>">
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

<div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-body">
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modaladd">
<i class="fas fa-plus-circle"></i>
 Mahasiswa
</button>
<br>
<br>
              <div class="table table-responsive">
                    <table id="tabelku" class="table table-striped">
                      <thead>
                        <tr align="center">
                          <th>NO</th>
                          <th>NIM</th>
                          <th>NAMA</th>
                          <th>Alamat</th>
                          <th>Email</th>
                          <th>NO HP</th>
                          <th>Status</th>
                          <th>Aksi</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no=1; foreach ($mhs as $mhs) {?>
                        <tr align="center">
                          <td><?php echo $no ?></td>
                          <td><?php echo $mhs->MhsNim ?></td>
                          <td><?php echo $mhs->MhsNama ?></td>
                          <td><?php echo $mhs->MhsAlamat ?></td>
                          <td><?php echo $mhs->MhsEmail ?></td>
                          <td><?php echo $mhs->MhsNohp ?></td>
                          <td>
                                <?php if ($mhs->MhsStatus==0) { ?>
                                  <div class="badge badge-warning">
                                      <?php  echo 'Menunggu'; ?>
                                  </div>
                                 
                                  <?php } else if($mhs->MhsStatus==1) {?>
                                  <div class="badge badge-success">
                                      <?php  echo 'Disetujui'; ?>
                                  </div>
                               <?php } ?>
                          </td>
                          <td>
                        <div class="btn-group mb-3 btn-group-md" role="group">
                            <?php if ($mhs->MhsStatus==0): ?>
                            <a href="<?php echo base_url('secure/master/acc_mahasiswa/'.$this->enkripsi->encrypt_url($mhs->MhsNim)); ?>"  
                               class="btn btn-sm btn-success" alt="acc" data-confirm="ACC | Apakah Kamu yakin Ingin Menyetujui Data ini ?" data-confirm-yes="window.location.href='<?php echo base_url('secure/master/acc_mahasiswa/'.$this->enkripsi->encrypt_url($mhs->MhsNim)); ?>' ">
                              <i class="fas fa-check" data-toggle="tooltip" data-placement="top" title="ACC"></i>
                            </a>
                            <a href="<?php echo base_url('secure/master/hapus_mahasiswa/'.$this->enkripsi->encrypt_url($mhs->MhsNim)); ?>"  
                               class="btn btn-sm btn-danger" data-confirm="Perhatian ! | Apakah Kamu yakin Ingin Menghapus Data ini ?" data-confirm-yes="window.location.href='<?php echo base_url('secure/master/hapus_mahasiswa/'.$this->enkripsi->encrypt_url($mhs->MhsNim)); ?>' ">
                              <i  class="fas fa-trash" data-toggle="tooltip" data-placement="top" title="Hapus"></i>
                            </a>
                               <?php else: ?>
                            <?php endif ?>
                           

                            <a data-toggle="modal" data-target="#modaledit_<?php echo $this->enkripsi->encrypt_url($mhs->MhsNim) ?>" 
                              href="<?php echo base_url('secure/master/edit_mahasiswa/'.$this->enkripsi->encrypt_url($mhs->MhsNim)); ?>" 
                              class="btn btn-sm  btn-icon btn-info">
                                <i class="far fa-edit" data-toggle="tooltip" data-placement="top" title="Ubah"></i>
                              </a>

                              <!-- <a class="btn btn-sm  btn-icon btn-warning" target="_blank" href="https://web.whatsapp.com/send?phone=62895397268443&text=Assalamu’alaikum Warahmatullahi Wabarakatuh">
                                <i class="fas fa-plus"></i>
                              </a> -->
                            
                            
                            
                        </div>
                           </td>
                        </tr>
                        <?php $no++;} ?>
                      </tbody>
                </table>
             </div>
            </div>
          </div>
</section>


<!-- Modal Tambah Mahasiswa-->
 <form action="<?php echo base_url('secure/master/tambah_mahasiswa'); ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="form-horizontal">
   <!-- class="modal hide fade in" data-keyboard="false" data-backdrop="static" -->
<div  class="modal fade" id="modaladd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data Mahasiswa</h5>
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
                        <input name="nim"type="text" class="form-control" required="">
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
                        <input name="nohp" type="text" class="form-control" required="">
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
                        <input name="nama"type="text" class="form-control " required="">
                      </div>
                      <br>
                      <label>Email</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-at"></i>
                          </div>
                        </div>
                        <input name="email"type="text" class="form-control " required="">
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

<?php foreach ($edit as $mhs) {?>
<!-- Modal Edit Mahasiswa-->
 <form action="<?php echo base_url('secure/master/edit_mahasiswa'); ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="form-horizontal">
   
<div class="modal fade" id="modaledit_<?php echo $this->enkripsi->encrypt_url($mhs['MhsNim']) ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Ubah Data Mahasiswa</h5>
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
                        <input name="nim"type="text" class="form-control " value="<?php echo $mhs['MhsNim'] ?>" >
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
                        <input name="nohp"type="text" class="form-control" value="<?php echo $mhs['MhsNohp'] ?>">
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
                        <input name="nama"type="text" class="form-control" value="<?php echo $mhs['MhsNama'] ?>" >
                      </div>
                      <br>
                      <label>Email</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-at"></i>
                          </div>
                        </div>
                        <input name="email"type="text" class="form-control" value="<?php echo $mhs['MhsEmail'] ?>">
                      </div>
                      <br>
                      <label>Alamat</label>
                      <textarea name="alamat" class="form-control" type="text" style="height: 70%;"><?php echo $mhs['MhsAlamat'] ?></textarea>
                      <input type="hidden" name="id" value="<?php echo $this->enkripsi->encrypt_url($mhs['MhsNim']) ?>">
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
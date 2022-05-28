<div class="row">
              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-body">

<!-- Button trigger modal -->
<button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#modaladd">
<i class="fas fa-plus-circle"></i> Ruangan
</button>
<br><br>
                <div class="table table-responsive">
                      <table  id="tabelku" class="table table-striped">
                        <thead>
                          <tr align="center">
                            <th>NO</th>
                            <th>NAMA</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $no=1; foreach ($ruang as $ruang) {?>
                          <tr align="center">
                            <td><?php echo $no ?></td>
                            <td><?php echo $ruang['RuangNama'] ?></td>
                            <td style="text-align: center">
                          <div class="btn-group mb-3 btn-group-sm" role="group">

                              <a data-toggle="modal" data-target="#modaledit_<?php echo $this->enkripsi->encrypt_url($ruang['RuangId']) ?>" 
                              href="<?php echo base_url('secure/ruangan/edit/'.$this->enkripsi->encrypt_url($ruang['RuangId'])); ?>" 
                              class="btn btn-info">
                                <i class="far fa-edit"></i>
                              </a>


                              <a class="btn btn-danger"
                                 href="<?php echo base_url('secure/ruangan/hapus/'.$this->enkripsi->encrypt_url($ruang['RuangId'])); ?>"  
                                data-confirm="Perhatian ! | Apakah Kamu yakin Ingin Menghapus Data ini ?" 
                                data-confirm-yes="window.location.href='<?php echo base_url('secure/ruangan/hapus/'.$this->enkripsi->encrypt_url($ruang['RuangId'])); ?>'">
                                <i class="fas fa-trash"></i>
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

 
<!-- Modal edit ruang -->
   
<?php  foreach ($edit as $ruang) {?>

<form action="<?php echo base_url('secure/ruangan/edit'); ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="form-horizontal">
<div class="modal fade" id="modaledit_<?php echo $this->enkripsi->encrypt_url($ruang['RuangId']); ?>"  
  tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Ubah Ruangan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
               
                      <label>NAMA</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-building"></i>
                          </div>
                        </div>
                        <input value="<?php echo $ruang['RuangNama'] ?>" name="nama" type="text" class="form-control daterange-cus">
                      </div>
                      <input type="hidden" name="id" value="<?php echo $this->enkripsi->encrypt_url($ruang['RuangId']) ?>">
                       
                    
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



<!-- Modal tambah ruang -->
<form action="<?php echo base_url('secure/ruangan/tambah'); ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="form-horizontal">
   
<div class="modal fade" id="modaladd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Ruangan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
               
                      <label>Nama Ruangan</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-building"></i>
                          </div>
                        </div>
                        <input  name="nama" type="text" class="form-control ">
                      </div>
                  
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




<div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-body">

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_">
<i class="fas fa-plus-circle"></i>
 Jadwal Bimbingan
</button>
<br><br>
              <div class="table table-responsive">
                  <table  id="tabelku" class="table table-striped">
                      <thead >
                        <tr align="center">
                          <th >NO</th>
                          <th >Hari</th>
                          <th >Ruangan</th>
                          <th >Jam Mulai</th>
                          <th >Jam Selesai</th>
                          <th >Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no=1; foreach ($jadwal as $jadwal) {?>
                        <tr align="center">
                          <td><?php echo $no ?></td>
                          <td><?php echo $jadwal['JadwalHari'] ?></td>
                          <td><?php echo $jadwal['JadwalRuangan'] ?></td>
                          <td><?php echo $jadwal['JadwalJamMulai'] ?></td>
                          <td><?php echo $jadwal['JadwalJamSelesai'] ?></td>
                          <td style="text-align: center">
                          <div class="btn-group mb-3 btn-group-sm" role="group">

                              <a data-toggle="modal" data-target="#edit_<?php echo $this->enkripsi->encrypt_url($jadwal['JadwalId']) ?>" 
                              href="" class="btn btn-info"> <i class="far fa-edit"></i>
                              </a>

                              <a class="btn btn-danger" href=""  data-confirm="Perhatian ! | Apakah Kamu yakin Ingin Menghapus Data ini ?" data-confirm-yes="window.location.href='<?php echo base_url('secure/jadwal/hapus_jadbim/'.$this->enkripsi->encrypt_url($jadwal['JadwalId'])); ?>'">
                                <i class="fas fa-trash"></i>
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


<form action="<?php echo base_url('secure/jadwal/tambah_jadbim'); ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="form-horizontal">
<div class="modal fade" id="add_"  
  tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Jadwal Bimbingan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
               
                       <div class="row">
                          <div class="col-6">
                          <label>Hari</label>
                          <select name="hari" class="form-control select2">
                          <option value="" disabled selected>Pilih Hari</option>
                          <option value="SENIN">SENIN</option>
                          <option value="SELASA">SELASA</option>
                          <option value="RABU">RABU</option>
                          <option value="KAMIS">KAMIS</option>
                          <option value="JUM'AT">JUM'AT</option>
                          <option value="SABTU">SABTU</option>
                          </select>
                          </div>
                          <div class="col-6">
                          <label>Ruangan</label>
                          <input name="ruangan" type="text" class="form-control">
                          </div>
               			</div> 

               			<div class="row">
               				<div class="col-6">
               					<br>
               					<label>Jam Mulai</label>
			                      <div class="input-group">
			                        <div class="input-group-prepend">
			                          <div class="input-group-text">
			                            <i class="fas fa-clock"></i>
			                          </div>
			                        </div>
			                        <input type="text" name="mulai" class="form-control timepicker">
			                      </div>
               				</div>
               				<div class="col-6">
               					<br>
               					<label>Jam Selesai</label>
			                      <div class="input-group">
			                        <div class="input-group-prepend">
			                          <div class="input-group-text">
			                            <i class="fas fa-clock"></i>
			                          </div>
			                        </div>
			                        <input type="text" name="selesai" class="form-control timepicker">
			                      </div>
               				</div>
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


<?php foreach ($edit_jadwal as $jadwal): ?>
<form action="<?php echo base_url('secure/jadwal/edit_jadbim'); ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="form-horizontal">
<div class="modal fade" id="edit_<?php echo $this->enkripsi->encrypt_url($jadwal['JadwalId']) ?>"  
  tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Ubah Jadwal Bimbingan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
               			<div class="row">
                          <div class="col-6">
                          <label>Hari</label>
                          <select name="hari" class="form-control select2">
                          <option value="<?php echo $jadwal['JadwalHari']?>" 
                        selected><?php echo $jadwal['JadwalHari'] ?></option>
                          <option value="SENIN">SENIN</option>
                          <option value="SELASA">SELASA</option>
                          <option value="RABU">RABU</option>
                          <option value="KAMIS">KAMIS</option>
                          <option value="JUM'AT">JUM'AT</option>
                          <option value="SABTU">SABTU</option>
                          </select>
                          </div>
                          <div class="col-6">
                          <label>Ruangan</label>
                          <input name="ruangan" type="text" class="form-control" value="<?php echo $jadwal['JadwalRuangan'] ?>">
                          </div>
               			</div> 
               			
               			<div class="row">
               				<div class="col-6">
               					<br>
               					<label>Jam Mulai</label>
			                      <div class="input-group">
			                        <div class="input-group-prepend">
			                          <div class="input-group-text">
			                            <i class="fas fa-clock"></i>
			                          </div>
			                        </div>
			                        <input type="text" name="mulai" class="form-control timepicker" value="<?php echo $jadwal['JadwalJamMulai'] ?>">
			                      </div>
               				</div>
               				<div class="col-6">
               					<br>
               					<label>Jam Selesai</label>
			                      <div class="input-group">
			                        <div class="input-group-prepend">
			                          <div class="input-group-text">
			                            <i class="fas fa-clock"></i>
			                          </div>
			                        </div>
			                        <input type="text" name="selesai" class="form-control timepicker"
			                        value="<?php echo $jadwal['JadwalJamSelesai'] ?>">
			                      </div>
               				</div>
               			</div>
               			<input type="hidden" name="jadwal" value="<?php echo $this->enkripsi->encrypt_url($jadwal['JadwalId']) ?>">
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
<?php endforeach ?>
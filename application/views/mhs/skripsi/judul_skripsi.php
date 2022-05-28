<?php
if ($skripsi['SkripsiJudul'] == null) { ?>
  <div align="center">
    <img src="<?php echo base_url() ?>assets/img/umk/denied.jpg?>" alt="" class="img img-responsive img-thumbnail" width="400">
  </div>
<?php } else { ?>

  <?php if ($skripsi['SkripsiJudul'] == !null) : ?>

    <div class="row">
      <div class="col-8">
        <div class="card">
          <div class="card-body">
            <div class="section-title mt-0">Judul Skripsi</div>
            <div class="form-group">
              <textarea name="alamat" class="form-control" type="text" style="height: 70%;" readonly=""><?php echo $skripsi['SkripsiJudul'] ?></textarea>
            </div>
            <div align="right">
              <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#ubah_" aria-expanded="false" aria-controls="collapseExample">
                Ubah
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

  <?php else : ?>
  <?php endif ?>

<?php  } ?>
</section>

<form action="<?php echo base_url('mhs/skripsi/ubah_judul'); ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="form-horizontal">
  <div class="modal fade" id="ubah_" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Ubah Judul</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">

            <label>Judul Skripsi</label>
            <div class="input-group">
              <textarea name="judul" class="form-control" type="text" style="height: 70%;"><?php echo $skripsi['SkripsiJudul'] ?></textarea>
            </div>
            <input type="hidden" name="skripsi" value="<?php echo $this->enkripsi->encrypt_url($skripsi['SkripsiId']) ?>">

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
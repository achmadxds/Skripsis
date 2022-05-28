<div class="row">
  <div class="col-12 col-md-12 col-lg-12">
    <div class="card">
      <div class="card-body">
        <?php if (!empty($list_daftar)) : ?>
          <div class="table table-responsive">
            <table id="tabelku" class="table table-striped">
              <thead>
                <tr align="center">
                  <th>NO</th>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Status</th>
                  <th>Cek Berkas</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>

                <?php $no = 1;
                foreach ($list_daftar as $mhs) : ?>
                  <tr align="center">

                    <td><?php echo $no ?></td>
                    <td><?php echo $mhs['MhsNim']  ?></td>
                    <td><?php echo $mhs['MhsNama']  ?></td>


                    <td>
                      <?php if ($mhs['DaftarsStatus'] == 0) { ?>
                        <div class="badge badge-warning">
                          <?php echo 'Menunngu'; ?>
                        </div>

                      <?php } else if ($mhs['DaftarsStatus'] == 1) { ?>
                        <div class="badge badge-success">
                          <?php echo 'Disetujui'; ?>
                        </div>

                      <?php } else { ?>
                        <div class="badge badge-danger">
                          <?php echo 'Perbaikan'; ?>
                        </div>
                      <?php } ?>
                    </td>


                    <td>
                      <a data-toggle="modal" data-target="#modalcek_<?php echo $this->enkripsi->encrypt_url($mhs['DaftarsNIM']) ?>" href="<?php echo base_url('secure/pendaftaran/edit_daftar_skripsi/' . $this->enkripsi->encrypt_url($mhs['DaftarsNIM'])); ?>" class="btn btn-md btn-icon btn-info">
                        <i class="fas fa-eye" data-toggle="tooltip" data-placement="top" title="Cek Berkas"></i>
                      </a>
                    </td>

                    <td>


                      <?php if ($mhs['DaftarsStatus'] == 0 || $mhs['DaftarsStatus'] == 2) : ?>
                        <a href="<?php echo base_url('secure/pendaftaran/acc_daftar_skripsi/' . $this->enkripsi->encrypt_url($mhs['DaftarsNIM'])); ?>" class="btn btn-md btn-success" data-confirm="ACC | Apakah Kamu yakin Ingin Menyetujui Data ini ?" data-confirm-yes="window.location.href='<?php echo base_url('secure/pendaftaran/acc_daftar_skripsi/' . $this->enkripsi->encrypt_url($mhs['DaftarsNIM'])); ?>' ">
                          <i class="fas fa-check" data-toggle="tooltip" data-placement="top" title="ACC"></i>
                        </a>
                        <a data-toggle="modal" data-target="#modaledit_<?php echo $this->enkripsi->encrypt_url($mhs['DaftarsNIM']) ?>" href="<?php echo base_url('secure/pendaftaran/edit_mhs/' . $this->enkripsi->encrypt_url($mhs['DaftarsNIM'])); ?>" class="btn btn-md btn-icon btn-info">
                          <i class="far fa-edit" data-toggle="tooltip" data-placement="top" title="Keterangan"></i>
                        </a>

                      <?php elseif ($mhs['DaftarsStatus'] == 2) : ?>
                        <a data-toggle="modal" data-target="#modaledit_<?php echo $this->enkripsi->encrypt_url($mhs['DaftarsNIM']) ?>" href="<?php echo base_url('secure/pendaftaran/edit_mhs/' . $this->enkripsi->encrypt_url($mhs['DaftarsNIM'])); ?>" class="btn btn-md btn-icon btn-info">
                          <i class="far fa-edit" data-toggle="tooltip" data-placement="top" title="Keterangan"></i>
                        </a>

                      <?php elseif ($mhs['DaftarsStatus'] == 1) : ?>
                        <a href="<?php echo base_url('secure/pendaftaran/download_daftar_skripsi_zip/' . $this->enkripsi->encrypt_url($mhs['DaftarsId'])); ?>" class="btn btn-icon btn-primary">
                          <i class="fas fa-download" data-toggle="tooltip" data-placement="top" title="Download Zip"></i>
                        </a>
                      <?php else : ?>
                      <?php endif ?>

                    </td>

                  </tr>
                  <?php $no++; ?>
                <?php endforeach ?>

              </tbody>
            <?php else : ?>
              <p style="font-weight: bold; text-align: center;">Tidak Ada Data</p>
            <?php endif ?>
            </table>
          </div>
      </div>
    </div>
  </div>
</div>
</section>


<?php foreach ($cek_daftar as $mhs) { ?>
  <div class="modal fade" id="modalcek_<?php echo $this->enkripsi->encrypt_url($mhs['DaftarsNIM']) ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Cek Berkas Daftar Skripsi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">

            <div class="row" align="center">
              <div class="col-4">
                <?php if ($mhs['DaftarsFileKrs'] == null) : ?>
                <?php else : ?>
                  <div class="col-4" align="center">
                    <h6 style="color: #718eef;">KRS</h6>
                    <a href="javascript:void(0)" data-toggle="modal" data-target="#kknkjdnv" onclick="readURL('assets/upload/pendaftaran/skripsi/<?php echo $mhs['DaftarsFileKrs'] ?>')"><img class="img-responsive" src="<?php echo base_url('assets/img/umk/pdf.png') ?>" alt="HTML tutorial" style="width:60px;height:60px;"></a>
                  </div>
                <?php endif ?>
              </div>
              <div class="col-4">
                <?php if ($mhs['DaftarsFileTranskrip'] == null) : ?>
                <?php else : ?>
                  <div class="col-4">
                    <h6 style="color: #718eef;">Transkrip Nilai</h6>
                    <a href="javascript:void(0)" data-toggle="modal" data-target="#kknkjdnv" onclick="readURL('assets/upload/pendaftaran/skripsi/<?php echo $mhs['DaftarsFileTranskrip'] ?>')" ><img class="img-responsive" src="<?php echo base_url('assets/img/umk/pdf.png') ?>" alt="HTML tutorial" style="width:60px;height:60px;"></a>
                  </div>
                  <?php endif ?>
              </div>
              <div class="col-4">
                <?php if ($mhs['DaftarsFileSlip'] == null) : ?>
                  <?php else : ?>
                    <div class="col-4">
                      <h6 style="color: #718eef;">Bukti Pembayaran</h6>
                      <a href="javascript:void(0)" data-toggle="modal" data-target="#kknkjdnv" onclick="readURL('assets/upload/pendaftaran/skripsi/<?php echo $mhs['DaftarsFileSlip'] ?>')" ><img class="img-responsive" src="<?php echo base_url('assets/img/umk/pdf.png') ?>" alt="HTML tutorial" style="width:60px;height:60px;"></a>
                  </div>
                <?php endif ?>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </form>
<?php } ?>


<?php foreach ($ket_daftar as $mhs) { ?>
  <form action="<?php echo base_url('secure/pendaftaran/edit_daftar_skripsi/' . $this->enkripsi->encrypt_url($mhs['DaftarsNIM'])); ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="form-horizontal">

    <div class="modal fade" id="modaledit_<?php echo $this->enkripsi->encrypt_url($mhs['DaftarsNIM']) ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Tambah Keterangan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">

              <label>Keterangan</label>
              <div class="input-group">
                <textarea name="keterangan" class="form-control" type="text" style="height: 100%;"><?php echo $mhs['DaftarsKeterangan'] ?></textarea>
              </div>
              <input type="hidden" name="id" value="<?php echo $this->enkripsi->encrypt_url($mhs['DaftarsNIM']) ?>">

            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button name="submit" type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </div>
    </div>
    </div>
  </form>
<?php } ?>

<div class="modal fade" id="kknkjdnv" data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div id="cuok">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</div>

<script>
  function readURL(link) {
    var base_url = $('#base').val();
    let expLink = link.split("/");
    let lastItem = expLink[expLink.length - 1]
    let getTypes = lastItem.split(".");

    let validImageTypes = ['jpg', 'jpeg', 'png'];

    if (link) {
      if (!validImageTypes.includes(getTypes[1])) {
        $('#cuok').html(`<iframe src="${base_url + link}" height="580px" width="460px"></iframe>`);
      } else {
        $('#cuok').html(`<img id="blah" src="${base_url + link}" width="460px" height="350px" />`);
      }
    }
  }
</script>
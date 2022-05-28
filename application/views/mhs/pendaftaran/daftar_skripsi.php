<?php if ($lulus) { ?>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <ul class="nav nav-tabs" id="myTab5" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="lulus-tab5" data-toggle="tab" href="#lulus" role="tab" aria-controls="lulus" aria-selected="true">
                <i class="fas fa-lulus"></i>File Pendaftaran</a>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent5">
            <div class="tab-pane fade show active" id="lulus" role="tabpanel" aria-labelledby="lulus-tab5">
              <br>
              <div class="row" align="center">
                <div class="col-4">
                  <h6 style="color: #718eef;">KRS</h6>
                  <?php if ($lulus['DaftarsFileKrs'] == null) : ?>
                    <span style="color: red">kosong</span>
                  <?php else : ?>
                    <a target="_blank" href="<?php echo base_url('assets/upload/pendaftaran/skripsi/' . $lulus['DaftarsFileKrs']) ?>"><img class="img-responsive" src="<?php echo base_url('assets/img/umk/pdf.png') ?>" alt="KRS" style="width:70px;height:70px; "></a>
                  <?php endif ?>
                </div>

                <div class="col-4">
                  <h6 style="color: #718eef;">Transkrip Nilai</h6>
                  <?php if ($lulus['DaftarsFileTranskrip'] == null) : ?>
                    <span style="color: red">kosong</span>
                  <?php else : ?>
                    <a target="_blank" href="<?php echo base_url('assets/upload/pendaftaran/skripsi/' . $lulus['DaftarsFileTranskrip']) ?>"><img class="img-responsive" src="<?php echo base_url('assets/img/umk/pdf.png') ?>" alt="Transkrip" style="width:70px;height:70px;"></a>
                  <?php endif ?>
                </div>

                <div class="col-4">
                  <h6 style="color: #718eef;">Bukti Pembayaran</h6>
                  <?php if ($lulus['DaftarsFileSlip'] == null) : ?>
                    <span style="color: red">kosong</span>
                  <?php else : ?>
                    <a target="_blank" href="<?php echo base_url('assets/upload/pendaftaran/skripsi/' . $lulus['DaftarsFileSlip']) ?>"><img class="img-responsive" src="<?php echo base_url('assets/img/umk/pdf.png') ?>" alt="Bukti Bayar" style="width:70px;height:70px;"></a>
                  <?php endif ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php } elseif ($akun['MhsStatus'] == 1) {  ?>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <ul class="nav nav-tabs" id="myTab5" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="upload-tab5" data-toggle="tab" href="#upload" role="tab" aria-controls="upload" aria-selected="true">
                <i class="fas fa-upload"></i>Upload</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="ket-tab5" data-toggle="tab" href="#ket" role="tab" aria-controls="ket" aria-selected="false">
                <i class="fas fa-clipboard-list"></i>Keterangan</a>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent5">
            <!--  -->
            <div class="tab-pane fade show active" id="upload" role="tabpanel" aria-labelledby="upload-tab5">

              <?php if ($daftar_skripsi['DaftarsStatus'] == 1) { ?>
                <div align="center">
                  <h6>Selamat ! Pendaftaran skripsi kamu DiSetujui</h6>
                  <img src="<?php echo base_url() ?>assets/img/umk/acc.png?>" alt="" class="img img-responsive img-thumbnail" width="430">
                </div>
              <?php } elseif ($daftar_skripsi['DaftarsStatus'] == null || $daftar_skripsi['DaftarsStatus'] == 2) { ?>
                <div class="col-12 col-md-6 col-lg-6">
                  <form action="<?php echo $submit_daftar_skripsi ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="form-horizontal">
                    <div class="card-body">
                      <div class="section-title mt-1">File KRS</div>
                      <div class="custom-file">
                        <input name="filekrs" type="file" id="cek" class="custom-file-input">
                        <label class="custom-file-label">upload file .pdf</label>
                      </div>

                      <div class="section-title mt-1">File Transkip Nilai</div>
                      <div class="custom-file">
                        <input name="fileskrip" type="file" class="custom-file-input">
                        <label class="custom-file-label">upload file .pdf</label>
                      </div>

                      <div class="section-title mt-1">File Bukti Pembayaran</div>
                      <div class="custom-file">
                        <input name="fileslip" type="file" class="custom-file-input">
                        <label class="custom-file-label">upload file .png</label>
                      </div>

                      <div class="card-footer text-right ">
                        <button class="btn btn-primary mr-1" id="submit" name="submit" type="submit">Simpan</button>
                      </div>
                    </div>
                  </form>
                </div>
              <?php } elseif ($daftar_skripsi['DaftarsStatus'] == 0) { ?>
                <div align="center">
                  <h6>Pendaftaran Kamu Sudah Terkirim, Harap Tunggu ya..</h6>
                  <img src="<?php echo base_url() ?>assets/img/umk/wait.jpg?>" alt="" class="img img-responsive img-thumbnail" width="430">
                </div>
              <?php } ?>
            </div>
            <!--  -->
            <div class="tab-pane fade" id="ket" role="tabpanel" aria-labelledby="ket-tab5">
              <?php if ($daftar_skripsi) { ?>
                <h5 class="section-title mt-1">Status &emsp;&emsp; :
                  <?php if ($daftar_skripsi['DaftarsStatus'] == 0) { ?>
                    <span class="badge badge-warning">Menunggu</span>
                  <?php } else if ($daftar_skripsi['DaftarsStatus'] == 1) { ?>
                    <span class="badge badge-success">Disetujui</span>
                  <?php } else { ?>
                    <span class="badge badge-danger">Perbaikan</span>
                  <?php } ?>
                </h5>

                <h5 class="section-title mt-1">Keterangan :
                  <span>
                    <?php echo $daftar_skripsi['DaftarsKeterangan'] ?? '<span style="color:red;">Kosong</span>' ?></span>
                </h5>

                <h2 class="section-title mt-1">File </h2>
                <div class="row" align="center">
                  <div class="col-4">
                    <h6 style="color: #718eef;">KRS</h6>
                    <?php if ($daftar_skripsi['DaftarsFileKrs'] == null) : ?>
                      <span style="color: red">kosong</span>
                    <?php else : ?>
                      <a href="javascript:void(0)" data-toggle="modal" data-target="#kknkjdnv" onclick="readURL('assets/upload/pendaftaran/skripsi/<?php echo $daftar_skripsi['DaftarsFileKrs'] ?>')"><img class="img-responsive" src="<?php echo base_url('assets/img/umk/pdf.png') ?>" alt="KRS" style="width:70px;height:70px; "></a>
                    <?php endif ?>
                  </div>

                  <div class="col-4">
                    <h6 style="color: #718eef;">Transkrip Nilai</h6>
                    <?php if ($daftar_skripsi['DaftarsFileTranskrip'] == null) : ?>
                      <span style="color: red">kosong</span>
                    <?php else : ?>
                      <a href="javascript:void(0)" data-toggle="modal" data-target="#kknkjdnv" onclick="readURL('assets/upload/pendaftaran/skripsi/<?php echo $daftar_skripsi['DaftarsFileTranskrip'] ?>')"><img class="img-responsive" src="<?php echo base_url('assets/img/umk/pdf.png') ?>" alt="Transkrip" style="width:70px;height:70px;"></a>
                    <?php endif ?>
                  </div>

                  <div class="col-4">
                    <h6 style="color: #718eef;">Bukti Pembayaran</h6>
                    <?php if ($daftar_skripsi['DaftarsFileSlip'] == null) : ?>
                      <span style="color: red">kosong</span>
                    <?php else : ?>
                      <a href="javascript:void(0)" data-toggle="modal" data-target="#kknkjdnv" onclick="readURL('assets/upload/pendaftaran/skripsi/<?php echo $daftar_skripsi['DaftarsFileSlip'] ?>')"><img class="img-responsive" src="<?php echo base_url('assets/img/umk/pdf.png') ?>" alt="Bukti Bayar" style="width:70px;height:70px;"></a>
                    <?php endif ?>
                  </div>
                </div>
                <!--  -->
              <?php } else { ?>
                <p align="center">Belum Ada Data</p>
              <?php } ?>



            <?php } else { ?>
              <div align="center">
                <img src="<?php echo base_url() ?>assets/img/umk/denied.jpg?>" alt="" class="img img-responsive img-thumbnail" width="400">
              </div>
            <?php  } ?>
            </div>
          </div>
        </div>
      </div>
    </div>

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
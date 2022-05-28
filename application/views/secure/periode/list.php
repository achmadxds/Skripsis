<div class="row">
  <div class="col-12 col-md-12 col-lg-12">
    <div class="card">
      <div class="card-body">

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modaladd">
          <i class="fas fa-plus-circle"></i>
          Periode
        </button>
        <br><br>
        <div class="table table-responsive">
          <table id="tabelku" class="table table-striped">
            <thead>
              <tr align="center">
                <th>NO</th>
                <th>Semester</th>
                <th>Tahun Akademik</th>
                <th>Periode Mulai</th>
                <th>Periode Selesai</th>
                <th>Periode Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1;
              foreach ($periode as $periode) { ?>
                <tr align="center">
                  <td><?php echo $no ?></td>
                  <td>
                    <?php if ($periode->PeriodesSemester == 'genap') : ?>
                      <?php echo 'GENAP' ?>
                    <?php elseif ($periode->PeriodesSemester == 'ganjil') : ?>
                      <?php echo 'GANJIL' ?>
                    <?php endif ?>
                  </td>
                  <td><?php echo $periode->PeriodesTahunakademik ?></td>
                  <td><?php echo date("d F Y", strtotime($periode->PeriodesMulai)) ?></td>
                  <td><?php echo date("d F Y", strtotime($periode->PeriodesSelesai)) ?></td>
                  <td>
                    <?php if ($periode->PeriodesStatusAktif == 0) { ?>
                      <div class="badge badge-danger">
                        <?php echo 'Tidak Aktif'; ?>
                      </div>

                    <?php } else if ($periode->PeriodesStatusAktif == 1) { ?>
                      <div class="badge badge-success">
                        <?php echo 'Aktif'; ?>
                      </div>

                    <?php } else { ?>
                      <div class="badge badge-warning">
                        <?php echo 'Error'; ?>
                      </div>
                    <?php } ?>
                  </td>
                  <td>
                    <?php if ($periode->PeriodesStatusAktif == 1) : ?>
                      <div class="btn-group mb-3 btn-group-sm" role="group">
                        <a data-toggle="modal" data-target="#modaledit_<?php echo $this->enkripsi->encrypt_url($periode->PeriodesId) ?>" href="<?php echo base_url('secure/periode/edit/' . $this->enkripsi->encrypt_url($periode->PeriodesId)) ?>" class="btn btn-icon btn-info"><i class="far fa-edit" data-toggle="tooltip" data-placement="top" title="Ubah"></i></a>
                      </div>
                    <?php else : ?>
                      <div class="btn-group mb-3 btn-group-sm" role="group">
                        <a href="<?php echo base_url('secure/periode/aktid/' . $this->enkripsi->encrypt_url($periode->PeriodesId)); ?>" class="btn btn-primary" data-confirm="Perhatian ! | Apakah Kamu yakin Ingin Mengaktifkan Periode Ini ?" data-confirm-yes="window.location.href='<?php echo base_url('secure/periode/aktif/' . $this->enkripsi->encrypt_url($periode->PeriodesId)); ?>' ">
                          <i class="fas fa-power-off" data-toggle="tooltip" data-placement="top" title="Aktifkan"></i>
                        </a>

                        <a data-toggle="modal" data-target="#modaledit_<?php echo $this->enkripsi->encrypt_url($periode->PeriodesId) ?>" href="<?php echo base_url('secure/periode/edit/' . $this->enkripsi->encrypt_url($periode->PeriodesId)) ?>" class="btn btn-icon btn-info"><i class="far fa-edit" data-toggle="tooltip" data-placement="top" title="Ubah"></i></a>

                        <!-- <a href="<?php echo base_url('secure/periode/hapus/' . $this->enkripsi->encrypt_url($periode->PeriodesId)); ?>"  
                               class="btn btn-danger" data-confirm="Perhatian ! | Apakah Kamu yakin Ingin Menghapus Data ini ?" data-confirm-yes="window.location.href='<?php echo base_url('secure/periode/hapus/' . $this->enkripsi->encrypt_url($periode->PeriodesId)); ?>' ">
                              <i  class="fas fa-trash" data-toggle="tooltip" data-placement="top" title="Hapus"></i>
                            </a> -->


                      </div>

                    <?php endif ?>

                  </td>

                </tr>
              <?php $no++;
              } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</section>



<!-- Modal Add-->
<form action="<?php echo base_url('secure/periode/tambah'); ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="form-horizontal">

  <div class="modal fade" id="modaladd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Tambah Periode</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <input type="hidden" name="koordinator" value="<?php echo $this->enkripsi->encrypt_url($koordinator['DosenId']) ?>">
            <input type="hidden" name="kaprodi" value="<?php echo $this->enkripsi->encrypt_url($kaprodi['DosenId']) ?>">
            <label>koordinator</label>
            <input class="form-control" value="<?php echo $koordinator['DosenNama'] ?>" readonly=""><br>
            <label>Kaprodi</label>
            <input class="form-control" value="<?php echo $kaprodi['DosenNama'] ?>" readonly="">

            <div class="row">
              <div class="col-6">
                <br>
                <label>Semester</label>
                <select name="semester" class="form-control select2">
                  <option value="" disabled selected>Pilih Semester</option>
                  <option value="ganjil">GANJIL</option>
                  <option value="genap">GENAP</option>
                </select>
              </div>
              <div class="col-6">
                <br>
                <label>Tahun Akademik</label>
                <input name="t_akademik" type="text" min="2020" max="3000" class="form-control" maxlength="9" placeholder="Tahun">
              </div>
            </div>

            <div class="row">
              <div class="col-6">
                <br>
                <label>Periode Selesai</label>
                <input name="p_selesai" type="date" class="form-control daterange-cus">
              </div>
              <!-- <div class="col-6">
                          <br>
                          <label>Status</label>
                        <select name="status" class="form-control select2">
                        <option value="" disabled selected>Pilih Status</option>
                        <option value="1">Aktif</option>
                        <option value="0">Tidak Aktif</option>
                      </select>
                        </div> -->
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


<?php foreach ($edit as $periode) { ?>
  <!-- Modal Edit-->
  <form action="<?php echo base_url('secure/periode/edit'); ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="form-horizontal">
    <div class="modal fade" id="modaledit_<?php echo $this->enkripsi->encrypt_url($periode['PeriodesId']) ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Ubah Periode</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <label>koordinator</label>
            <select name="koordinator" class="form-control">
              <?php
              $k = $periode['PeriodesKoordinator'];
              $koor      = $this->db->query("
                         SELECT * FROM tdosen WHERE DosenId='$k'")->row_array();
              ?>
              <option value="<?php echo $this->enkripsi->encrypt_url($periode['PeriodesKoordinator']); ?>" selected><?php echo $koor['DosenNama'] ?></option>
              <?php $dosen = $this->db->query("SELECT * FROM tdosen WHERE DosenNidn LIKE '__________' ORDER BY DosenNama ASC")->result_Array(); ?>
              <?php foreach ($dosen as $dosen) { ?>
                <option value="<?php echo $this->enkripsi->encrypt_url($dosen['DosenId']); ?>"><?php echo $dosen['DosenNama']; ?>
                </option>
              <?php } ?>
            </select>

            <br>
            <label>Kaprodi</label>
            <select name="kaprodi" class="form-control">
              <?php
              $kap = $periode['PeriodesKaprodi'];
              $kapr      = $this->db->query("
                         SELECT * FROM tdosen WHERE DosenId='$kap'")->row_array();
              ?>
              <option value="<?php echo $this->enkripsi->encrypt_url($periode['PeriodesKaprodi']); ?>" selected><?php echo $kapr['DosenNama'] ?></option>
              <?php $dosen = $this->db->query("SELECT * FROM tdosen WHERE DosenNidn LIKE '__________' ORDER BY DosenNama ASC")->result_Array(); ?>
              <?php foreach ($dosen as $dosen) { ?>
                <option value="<?php echo $this->enkripsi->encrypt_url($dosen['DosenId']); ?>"><?php echo $dosen['DosenNama']; ?>
                </option>
              <?php } ?>
            </select>

            <div class="row">
              <div class="col-6">
                <br>
                <label>Semester</label>
                <select name="semester" class="form-control">
                  <option value="<?php echo $periode['PeriodesSemester'] ?>" class="form-control daterange-cus" selected>
                    <?php if ($periode['PeriodesSemester'] == 'ganjil') {
                      echo "GANJIL";
                    } else {
                      echo "GENAP";
                    }
                    ?>
                  </option>
                  <option value="ganjil">GANJIL</option>
                  <option value="genap">GENAP</option>
                </select>
              </div>
              <div class="col-6">
                <br>
                <label>Tahun Akademik</label>
                <input value="<?php echo $periode['PeriodesTahunakademik'] ?>" name="t_akademik" type="text" class="form-control" maxlength="9" placeholder="Tahun">
              </div>
            </div>

            <div class="row">
              <div class="col-6">
                <br>
                <label>Periode Selesai</label>
                <input value="<?php echo $periode['PeriodesSelesai'] ?>" name="p_selesai" type="date" class="form-control daterange-cus">
              </div>
              <!-- <div class="col-6">
                      <br>
                      <label>Status</label>
                        <select name="status" class="form-control">
                        <option value="<?php echo $periode['PeriodesStatusAktif'] ?>" type="text" class="form-control daterange-cus" selected>
                          <?php if ($periode['PeriodesStatusAktif'] == 1) {
                            echo "Aktif";
                          } else {
                            echo "Tidak Aktif";
                          }
                          ?>
                        </option>
                        <option value="1">Aktif</option>
                        <option value="0">Tidak Aktif</option>
                        </select>
                    </div> -->
            </div>

            <input type="hidden" name="id" value="<?php echo $this->enkripsi->encrypt_url($periode['PeriodesId']) ?>">
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button namae="submit" type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </div>
    </div>
    </div>
  </form>
<?php } ?>
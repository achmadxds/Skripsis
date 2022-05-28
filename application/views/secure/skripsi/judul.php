<div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-body">
              <div class="table table-responsive">
                  <table  id="tabelku" class="table table-striped">
                      <thead >
                        <tr align="center">
                          <th >NO</th>
                          <th >NIM</th>
                          <th >Nama</th>
                          <th >Judul Skripsi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no=1; foreach ($judul as $mhs) {?>
                        <tr align="center">
                          <td><?php echo $no ?></td>
                          <td><?php echo $mhs['MhsNim'] ?></td>
                          <td><?php echo $mhs['MhsNama'] ?></td>
                          <td><?php echo $mhs['SkripsiJudul'] ?></td>
                        </tr>
                        <?php $no++; } ?>
                      </tbody>
                    </table>
                </div>
              </div>
             </div>
            </div>
           </div>
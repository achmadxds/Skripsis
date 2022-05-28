 <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab5" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="mhs-tab5" data-toggle="tab" href="#mhs" role="tab" aria-controls="mhs" aria-selected="true">
                          <i class="fas fa-user-graduate"></i> Mahasiswa</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="dosen-tab5" data-toggle="tab" href="#dosen" role="tab" aria-controls="dosen" aria-selected="false">
                          <i class="fas fa-user-tie"></i> Dosen</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="operator-tab5" data-toggle="tab" href="#operator" role="tab" aria-controls="operator" aria-selected="false">
                          <i class="fas fa-user-cog"></i> Operator</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="koordinator-tab5" data-toggle="tab" href="#koordinator" role="tab" aria-controls="koordinator" aria-selected="false">
                          <i class="fas fa-user-tie"></i> Koordinator</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="kaprodi-tab5" data-toggle="tab" href="#kaprodi" role="tab" aria-controls="kaprodi" aria-selected="false">
                          <i class="fas fa-user-tie"></i> Kaprodi</a>
                      </li>
                    </ul>
                    <div class="tab-content" id="myTabContent5">
<!--  -->
                      <div class="tab-pane fade show active" id="mhs" role="tabpanel" aria-labelledby="mhs-tab5">
                        <div class="table table-responsive">
                      <table  id="tabelku" class="table table-striped">
                        <thead>
                          <tr align="center">
                            <th>NO</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $no=1; foreach ($mhs as $mhs) {?>
                          <tr align="center">
                            <td><?php echo $no ?></td>
                            <td><?php echo $mhs['MhsNim'] ?></td>
                            <td><?php echo $mhs['MhsNama'] ?></td>
                            <td style="text-align: center">
                          <div class="buttons" type="submit">
                              <a class="btn btn-info"
                                 href="<?php echo base_url('secure/user/reset_mhs/'.$this->enkripsi->encrypt_url($mhs['MhsNim'])); ?>"  
                                data-confirm="Perhatian ! Reset Password | Apakah Kamu yakin Ingin Mereset Data ini ?" 
                                data-confirm-yes="window.location.href='<?php echo base_url('secure/user/reset_mhs/'.$this->enkripsi->encrypt_url($mhs['MhsNim'])); ?>'">
                                <i class="fas fa-key" data-toggle="tooltip" data-placement="top" title="Reset Password"></i>
                              </a>

                          </div>
                             </td>
                          </tr>
                                <?php $no++;} ?>
                        </tbody>

                      </table>
                    </div>
                      </div>
<!--  -->
                      <div class="tab-pane fade" id="dosen" role="tabpanel" aria-labelledby="dosen-tab5">
                         <div class="table table-responsive">
                      <table  id="tabelku2" class="table table-striped">
                        <thead>
                          <tr align="center">
                            <th>NO</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Hak Akses</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $no=1; foreach ($dosen as $dosen) {?>
                          <tr align="center">
                            <td><?php echo $no ?></td>
                            <td><?php echo $dosen['DosenNama'] ?></td>
                            <td><?php echo $dosen['UserUsername'] ?></td>
                            <td><?php echo $dosen['NamaLevel'] ?></td>
                            <td style="text-align: center">
                          <div class="buttons" type="submit">
                              <a class="btn btn-info"
                                 href="<?php echo base_url('secure/user/reset_dosen/'.$this->enkripsi->encrypt_url($dosen['UserUsername'])); ?>"  
                                data-confirm="Perhatian ! Reset Password | Apakah Kamu yakin Ingin Mereset Data ini ?" 
                                data-confirm-yes="window.location.href='<?php echo base_url('secure/user/reset_dosen/'.$this->enkripsi->encrypt_url($dosen['UserUsername'])); ?>'">
                                <i class="fas fa-key" data-toggle="tooltip" data-placement="top" title="Reset Password"></i>
                              </a>

                          </div>
                             </td>
                          </tr>
                                <?php $no++;} ?>
                        </tbody>

                      </table>
                    </div>
                      </div>
<!--  -->
                      <div class="tab-pane fade" id="operator" role="tabpanel" aria-labelledby="operator-tab5">
                          <div class="table table-responsive">
                      <table  id="tabelku3" class="table table-striped">
                        <thead>
                          <tr align="center">
                            <th>NO</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Hak Akses</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $no=1; foreach ($operator as $operator) {?>
                          <tr align="center">
                            <td><?php echo $no ?></td>
                            <td><?php echo $operator['DosenNama'] ?></td>
                            <td><?php echo $operator['UserUsername'] ?></td>
                            <td><?php echo $operator['NamaLevel'] ?></td>
                            <td style="text-align: center">
                          <div class="buttons" type="submit">
                              <a class="btn btn-info"
                                 href="<?php echo base_url('secure/user/reset_operator/'.$this->enkripsi->encrypt_url($operator['UserUsername'])); ?>"  
                                data-confirm="Perhatian ! Reset Password | Apakah Kamu yakin Ingin Mereset Data ini ?" 
                                data-confirm-yes="window.location.href='<?php echo base_url('secure/user/reset_operator/'.$this->enkripsi->encrypt_url($operator['UserUsername'])); ?>'">
                                <i class="fas fa-key" data-toggle="tooltip" data-placement="top" title="Reset Password"></i>
                              </a>

                          </div>
                             </td>
                          </tr>
                                <?php $no++;} ?>
                        </tbody>

                      </table>
                    </div>
                      </div>
<!--  -->
                      <div class="tab-pane fade" id="koordinator" role="tabpanel" aria-labelledby="koordinator-tab5">
                         <div class="table table-responsive">
                      <table  id="tabelku4" class="table table-striped">
                        <thead>
                          <tr align="center">
                            <th>NO</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Hak Akses</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $no=1; foreach ($koordinator as $koor) {?>
                          <tr align="center">
                            <td><?php echo $no ?></td>
                            <td><?php echo $koor['DosenNama'] ?></td>
                            <td><?php echo $koor['UserUsername'] ?></td>
                            <td><?php echo $koor['NamaLevel'] ?></td>
                            <td style="text-align: center">
                          <div class="buttons" type="submit">
                              <a class="btn btn-info"
                                 href="<?php echo base_url('secure/user/reset_koordinator/'.$this->enkripsi->encrypt_url($koor['UserUsername'])); ?>"  
                                data-confirm="Perhatian ! Reset Password | Apakah Kamu yakin Ingin Mereset Data ini ?" 
                                data-confirm-yes="window.location.href='<?php echo base_url('secure/user/reset_koordinator/'.$this->enkripsi->encrypt_url($koor['UserUsername'])); ?>'">
                                <i class="fas fa-key" data-toggle="tooltip" data-placement="top" title="Reset Password"></i>
                              </a>
                          </div>
                             </td>
                          </tr>
                                <?php $no++;} ?>
                        </tbody>
                      </table>
                    </div>
                      </div>
<!--  -->
                      <div class="tab-pane fade" id="kaprodi" role="tabpanel" aria-labelledby="kaprodi-tab5">
                          <div class="table table-responsive">
                      <table  id="tabelku5" class="table table-striped">
                        <thead>
                          <tr align="center">
                            <th>NO</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Hak Akses</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $no=1; foreach ($kaprodi as $kaprodi) {?>
                          <tr align="center">
                            <td><?php echo $no ?></td>
                            <td><?php echo $kaprodi['DosenNama'] ?></td>
                            <td><?php echo $kaprodi['UserUsername'] ?></td>
                            <td><?php echo $kaprodi['NamaLevel'] ?></td>
                            <td style="text-align: center">
                          <div class="buttons" type="submit">
                              <a class="btn btn-info"
                                 href="<?php echo base_url('secure/user/reset_kaprodi/'.$this->enkripsi->encrypt_url($kaprodi['UserUsername'])); ?>"  
                                data-confirm="Perhatian ! Reset Password | Apakah Kamu yakin Ingin Mereset Data ini ?" 
                                data-confirm-yes="window.location.href='<?php echo base_url('secure/user/reset_kaprodi/'.$this->enkripsi->encrypt_url($kaprodi['UserUsername'])); ?>'">
                                <i class="fas fa-key" data-toggle="tooltip" data-placement="top" title="Reset Password"></i>
                              </a>
                          </div>
                             </td>
                          </tr>
                                <?php $no++;} ?>
                        </tbody>

                      </table>
                    </div>
                      </div>
<!--  -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
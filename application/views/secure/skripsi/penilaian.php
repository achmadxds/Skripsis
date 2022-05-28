<div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab5" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="niket-tab5" data-toggle="tab" href="#niket" role="tab" aria-controls="niket" aria-selected="true">
                          <i class="fas fa-star"></i> Nilai Kriteria</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="na-tab5" data-toggle="tab" href="#na" role="tab" aria-controls="na" aria-selected="false">
                          <i class="fas fa-star"></i> Nilai Akhir</a>
                      </li>
                    </ul>
                    <div class="tab-content" id="myTabContent5">
<!--  -->
             <div class="tab-pane fade show active" id="niket" role="tabpanel" aria-labelledby="niket-tab5">
              <div class="col-12">
                    <div class="card-body">
                        <div class="row">
                          <div class="form-group col-3">
                            <label>Kriteria 1</label>
                            <input type="text" name="k1" class="form-control" value="<?php echo $penilaian['NikonK1']*100 ?>" readonly>
                          </div>
                          <div class="form-group col-3">
                            <label>Kriteria 2</label>
                            <input type="text" name="k2" class="form-control" value="<?php echo $penilaian['NikonK2']*100 ?>" readonly>
                          </div>
                          <div class="form-group col-3">
                            <label>Kriteria 3</label>
                            <input type="text" name="k3" class="form-control" value="<?php echo $penilaian['NikonK3']*100 ?>"readonly >
                          </div>
                          <div class="form-group col-3">
                            <label>Kriteria 4</label>
                            <input type="text" name="k4" class="form-control" value="<?php echo $penilaian['NikonK4']*100 ?>"readonly >
                          </div>
                        </div>
                        <div class="fcard-footer text-right">
                          <div class="btn-group mb-3 btn-group-md" role="group">
                        <a data-toggle="modal" data-target="#niket_" href="" class="btn btn-info">
                        <i class="far fa-edit"></i></a>
                        </div>
                        </div>
                        
                    </div>
                </div>
             </div>
<!--  -->
         <div class="tab-pane fade" id="na" role="tabpanel" aria-labelledby="na-tab5">
              <div class="row">
                        <div class="col-2">
                            <label tex>A</label>
                            <input type="text" name="naa" class="form-control" value="<?php echo $penilaian['NikonA'] ?>" readonly>
                          </div>
                          <div class="col-2">
                            <label>AB</label>
                            <input type="text" name="naab" class="form-control" value="<?php echo $penilaian['NikonAB'] ?>" readonly>
                          </div>
                          <div class="col-2">
                            <label>B</label>
                            <input type="text" name="nab" class="form-control" value="<?php echo $penilaian['NikonB'] ?>" readonly>
                          </div>
                          <div class="col-2">
                            <label>BC</label>
                            <input type="text" name="nabc" class="form-control" value="<?php echo $penilaian['NikonBC'] ?>" readonly>
                          </div>
                          <div class="col-2">
                            <label>C</label>
                            <input type="text" name="nac" class="form-control" value="<?php echo $penilaian['NikonC'] ?>" readonly>
                          </div>
              </div>
              <div class="row">
                          <div class="form-group col-3">
                          	<br>
                            <label>Penguji 1</label>
                            <input type="text" name="niket1" class="form-control" value="<?php echo $penilaian['NikonNaPenguji1']*100 ?>" readonly>
                          </div>
                          <div class="form-group col-3">
                          	<br>
                            <label>Penguji 2</label>
                            <input type="text" name="niket2" class="form-control" value="<?php echo $penilaian['NikonNaPenguji2']*100 ?>" readonly>
                          </div>
                          <div class="form-group col-3">
                          	<br>
                            <label>Penguji 3</label>
                            <input type="text" name="niket3" class="form-control" value="<?php echo $penilaian['NikonNaPenguji3']*100 ?>" readonly>
                          </div>
                </div>
                        <div class="fcard-footer text-right">
                        <div class="btn-group mb-3 btn-group-md" role="group">
                        <a data-toggle="modal" data-target="#na_" href="" class="btn btn-info">
                        <i class="far fa-edit"></i></a>
                        </div>
                      </div>
                </div>
                      </div>
<!--  -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
</section>




<form action="<?php echo base_url('secure/skripsi/niket'); ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="form-horizontal">
<div class="modal fade" id="niket_"  
  tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Ubah Nilai Kriteria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
               
                      <div class="row" align="center">
                          <div class="form-group col-3">
                            <label>Kriteria 1</label>
                            <input type="text" name="k1" class="form-control" value="<?php echo $penilaian['NikonK1']*100 ?>" min="0" max="100" class="form-control" onkeypress="return event.charCode >=48 && event.charCode <=57" maxlength="3" >
                          </div>
                          <div class="form-group col-3">
                            <label>Kriteria 2</label>
                            <input type="text" name="k2" class="form-control" value="<?php echo $penilaian['NikonK2']*100 ?>" min="0" max="100" class="form-control" onkeypress="return event.charCode >=48 && event.charCode <=57" maxlength="3" >
                          </div>
                          <div class="form-group col-3">
                            <label>Kriteria 3</label>
                            <input type="text" name="k3" class="form-control" value="<?php echo $penilaian['NikonK3']*100 ?>"min="0" max="100" class="form-control" onkeypress="return event.charCode >=48 && event.charCode <=57" maxlength="3" >
                          </div>
                          <div class="form-group col-3">
                            <label>Kriteria 4</label>
                            <input type="text" name="k4" class="form-control" value="<?php echo $penilaian['NikonK4']*100 ?>"min="0" max="100" class="form-control" onkeypress="return event.charCode >=48 && event.charCode <=57" maxlength="3" >
                          </div>
                        </div>
                        <input type="hidden" name="nilai" value="<?php echo $penilaian['NikonId'] ?>">
                       
                    
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


<form action="<?php echo base_url('secure/skripsi/na'); ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="form-horizontal">
<div class="modal fade" id="na_"  
  tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Ubah penilaian Nilai Akhir</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
               
                       <div class="row" align="center">
                        <div class="col-2">
                            <label tex>A</label>
                            <input type="text" name="naa" class="form-control" value="<?php echo $penilaian['NikonA'] ?>" min="0" max="100" class="form-control" onkeypress="return event.charCode >=48 && event.charCode <=57" maxlength="3">
                          </div>
                          <div class="col-2">
                            <label>AB</label>
                            <input type="text" name="naab" class="form-control" value="<?php echo $penilaian['NikonAB'] ?>" min="0" max="100" class="form-control" onkeypress="return event.charCode >=48 && event.charCode <=57" maxlength="3">
                          </div>
                          <div class="col-2">
                            <label>B</label>
                            <input type="text" name="nab" class="form-control" value="<?php echo $penilaian['NikonB'] ?>" min="0" max="100" class="form-control" onkeypress="return event.charCode >=48 && event.charCode <=57" maxlength="3">
                          </div>
                          <div class="col-2">
                            <label>BC</label>
                            <input type="text" name="nabc" class="form-control" value="<?php echo $penilaian['NikonBC'] ?>" min="0" max="100" class="form-control" onkeypress="return event.charCode >=48 && event.charCode <=57" maxlength="3">
                          </div>
                          <div class="col-2">
                            <label>C</label>
                            <input type="text" name="nac" class="form-control" value="<?php echo $penilaian['NikonC'] ?>" min="0" max="100" class="form-control" onkeypress="return event.charCode >=48 && event.charCode <=57" maxlength="3">
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-3">
                          	<br>
                            <label>Penguji 1</label>
                            <input type="text" name="na1" class="form-control" value="<?php echo $penilaian['NikonNaPenguji1']*100 ?>" min="0" max="100" class="form-control" onkeypress="return event.charCode >=48 && event.charCode <=57" maxlength="3">
                          </div>
                          <div class="form-group col-3">
                          	<br>
                            <label>Penguji 2</label>
                            <input type="text" name="na2" class="form-control" value="<?php echo $penilaian['NikonNaPenguji2']*100 ?>" min="0" max="100" class="form-control" onkeypress="return event.charCode >=48 && event.charCode <=57" maxlength="3">
                          </div>
                          <div class="form-group col-3">
                          	<br>
                            <label>Penguji 3</label>
                            <input type="text" name="na3" class="form-control" value="<?php echo $penilaian['NikonNaPenguji3']*100 ?>" min="0" max="100" class="form-control" onkeypress="return event.charCode >=48 && event.charCode <=57" maxlength="3">
                          </div>
                </div>
                <input type="hidden" name="nilai" value="<?php echo $penilaian['NikonId'] ?>">
                       
                    
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




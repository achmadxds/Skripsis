<div class="row">
 <div class="col-6">
	<div class="card">
		<div class="card-body">
			
			<form action="<?php echo base_url('secure/laporan/laporan_skripsi'); ?>" method="post" target="_blank">
			<div class="row">
				<div class="col-12">
					<label>Pilih Periode</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-stopwatch"></i>
                          </div>
                        </div>
                        <select name="periode" class="form-control daterange-cus">
                         <option disabled="" selected>Pilih Periode</option>
                          <?php foreach ($periode as $periode ) {?>
                               <option 
                               value="<?php echo $periode['PeriodesId']?>"><?php echo $periode['PeriodesSemester']  ?> &mdash; <?php echo $periode['PeriodesTahunakademik'] ?> 
                               </option>
                           <?php } ?>
                        ?>
                      </select>
				      </div>
				      <!-- <div class="form-group">
                      <label>Date Range Picker</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-calendar"></i>
                          </div>
                        </div>
                        <input type="text" class="form-control daterange-cus">
                      </div>
                    </div> -->
			       </div>
			 </div>    
			 <br>  
			 <button type="submit" class="btn btn-primary pull-right" id="periode"><i class="fa fa-print"></i> Cetak</button>
			</form>
		</div>
	</div>
 </div>
</div>



            
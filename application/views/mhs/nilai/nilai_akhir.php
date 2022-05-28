<?php if ($na_mhs['NaPenguji1']==null || $na_mhs['NaPenguji2']==null || $na_mhs['NaPenguji3']==null) { ?>
<div align="center">
  <img src="<?php echo base_url()?>assets/img/umk/denied.jpg?>" alt="" class="img img-responsive img-thumbnail" width="400">
</div>
<?php } else { ?>

<div class="row">
	<div class="col-12">
		<div class="card">
		  <div class="card-body">
		  	<div class="row">
			<div class="col-5">
				<br>
			<?php if ($na_mhs['NaPenguji1']==!null && $na_mhs['NaPenguji2']==!null && $na_mhs['NaPenguji3']==!null): ?>
			<div class="table table-responsive">
                      <table  class="table table-striped">
                        <thead>
                          <tr align="center">
                            <th>NILAI ANGKA</th>
                            <th>NILAI HURUF</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr align="center" style="font-weight: bold;">
                            <td><?php echo $na_mhs['NaAngka'] ?></td>
                            <td><?php echo $na_mhs['NaHuruf'] ?></td>
                          </tr>
                        </tbody>
                      </table>
             </div>
			</div>
			<div class="col-7">
				<canvas style="background-color: white" id="myChart" width="100" height="100"></canvas>
			</div>
			<?php else: ?>
			<?php endif ?>
		  </div>
	   </div>
	</div>
   </div>
</div>
<?php } ?>



<?php 
$k1 = $na_grafik_p1['NiketK1']+$na_grafik_p2['NiketK1']+$na_grafik_p3['NiketK1'];
$k2 = $na_grafik_p1['NiketK2']+$na_grafik_p2['NiketK2']+$na_grafik_p3['NiketK2'];
$k3 = $na_grafik_p1['NiketK3']+$na_grafik_p2['NiketK3']+$na_grafik_p3['NiketK3'];
$k4 = $na_grafik_p1['NiketK4']+$na_grafik_p2['NiketK4']+$na_grafik_p3['NiketK4'];
$kt1 = $k1/3;
$kt2 = $k2/3;
$kt3 = $k3/3;
$kt4 = $k4/3;


 ?>

<script>
const ctx = document.getElementById('myChart').getContext('2d');
var k1 = <?php echo $kt1 ?>;
var k2 = <?php echo $kt2 ?>;
var k3 = <?php echo $kt3 ?>;
var k4 = <?php echo $kt4 ?>;
const myChart = new Chart(ctx, {
    type: 'radar',
    data: {
        labels: ['Analisa Dan Perancangan', 'Pemahaman Materi', 'Program Aplikasi', 'Presentasi'],
        datasets: [{
            label: 'Nilai Kriteria',
            data: [k1, k2, k3, k4],
            fill: true,
		    backgroundColor: 'rgba(152, 133, 236, 0.2)',
		    borderColor: 'rgba(152, 133, 236, 0.8)',
		    pointBackgroundColor: 'rgba(152, 133, 236, 0.8)',
		    pointBorderColor: '#fff',
		    pointHoverBackgroundColor: '#fff',
		    pointHoverBorderColor: 'rgb(255, 99, 132)'
        }]
    },
     options: {
        scale: {
            min: 0,
            max: 100,
        }
    }
});
</script>
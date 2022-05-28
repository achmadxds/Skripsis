<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- Style -->
  <style type="text/css" media="print">
    .tulisan{
      font-family: serif;
    }
    .tengah{
      text-align: center;
    }
    .tebal{
      font-weight: bold;
    }
     .table{
      border: solid thin #000;
      border-collapse: collapse;
      width: 100%;
      margin-bottom: 1cm;
    }
    .td{
      border: solid thin #000;
      text-align: center;
    }

  </style>
  <style type="text/css" media="screen">
    .tulisan{
      font-family: serif;
    }
    .tengah{
      text-align: center;
    }
    .tebal{
      font-weight: bold;
    }
     .table{
      border: solid thin #000;
      border-collapse: collapse;
      width: 100%;
      margin-bottom: 1cm;
    }
    .td{
      border: solid thin #000;
      text-align: center;
    }
  </style>
</head>


<!-- body surat -->
<body onload="print()">

      <P  class="tulisan tengah tebal" >LAPORAN</P>
      <P style="position: relative; bottom: 10px;" class="tulisan tengah tebal">SKRIPSI</P>
      <P style="position: relative; bottom: 20px;" class="tulisan tengah tebal">PERIODE</P>

      <P style="position: relative; bottom: 30px;" class="tulisan tengah tebal"><?php echo $periode['PeriodesSemester'] ?>&mdash;<?php echo $periode['PeriodesTahunakademik'] ?></P>
    

      <table  class="table table-bordered">
                        <thead>
                          <tr align="center">
                            <th>NO</th>
                            <th>NIM</th>
                            <th>NAMA</th>
                            <th>STATUS</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $no=1; foreach ($laporan as $mhs) {?>
                          <tr align="center">
                            <td><?php echo $no ?></td>
                            <td><?php echo $mhs['MhsNim'] ?></td>
                            <td style="text-align: left"><?php echo $mhs['MhsNama'] ?></td>
                            <td>
                              <?php if ($mhs['DaftarsStatusAkhir']==1): ?>
                                <?php echo 'LULUS' ?>
                                <?php elseif($mhs['DaftarsStatusAkhir']==0): ?>
                                <?php echo 'PROSES' ?>
                                <?php else: ?>
                                <?php echo 'GAGAL' ?>
                              <?php endif ?>
                            </td>
                          </tr>
                                <?php $no++;} ?>
                        </tbody>

                      </table>




</body>
</html>
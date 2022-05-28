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

      <P  class="tulisan tengah tebal" >JADWAL</P>
      <P style="position: relative; bottom: 10px;" class="tulisan tengah tebal">SIDANG</P>
      <P style="position: relative; bottom: 20px;" class="tulisan tengah tebal">PERIODE <?php echo $periode['PeriodesTahunakademik'] ?></P>

      <table  class="table table-bordered" width="100%">
                        <thead>
                          <tr align="center">
                            <th>NO</th>
                            <th>NIM</th>
                            <th>NAMA</th>
                            <th>RUANG</th>
                            <th>JAM</th>
                            <th>KETUA</th>
                            <th>ANGGOTA 1</th>
                            <th>ANGGOTA 2</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $no=1; foreach ($cetak_sidang as $mhs) {?>
                          <?php 
                            $id1=$mhs['SidangPenguji1'];
                            $p1=$this->db->query("SELECT DosenNama from tdosen where DosenId='$id1'")->row_array(); 
                            $id2=$mhs['SidangPenguji2'];
                            $p2=$this->db->query("SELECT DosenNama from tdosen where DosenId='$id2'")->row_array(); 
                            $id3=$mhs['SidangPenguji3'];
                            $p3=$this->db->query("SELECT DosenNama from tdosen where DosenId='$id3'")->row_array(); 
                            ?>

                          <tr align="center">
                            <td><?php echo $no ?></td>
                            <td><?php echo $mhs['MhsNim'] ?></td>
                            <td><?php echo $mhs['MhsNama'] ?></td>
                            <td><?php echo $mhs['RuangNama'] ?></td>
                            <td><?php echo $mhs['SidangJam'] ?></td>
                            
                            
                            <td><?php echo $p1['DosenNama'] ?></td>
                            <td><?php echo $p2['DosenNama'] ?></td>
                            <td><?php echo $p3['DosenNama'] ?></td>
                          </tr>
                                <?php $no++;} ?>
                        </tbody>

                      </table>




</body>
</html>
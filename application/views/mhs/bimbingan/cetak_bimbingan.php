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

      <P  class="tulisan tengah tebal" >BUKU KONSULTASI</P>
      <P style="position: relative; bottom: 10px;" class="tulisan tengah tebal">SKRIPSI</P>


<?php 
$d1 = $dosbing['DosbingsDosenId1'];
$d2 = $dosbing['DosbingsDosenId2'];
$dosen1 = $this->db->query("SELECT DosenNama FROM tdosen WHERE DosenId='$d1'")->row_array();
$dosen2 = $this->db->query("SELECT DosenNama FROM tdosen WHERE DosenId='$d2'")->row_array();
 ?>


<table>
  <tbody>
    <tr >
      <td style="width: 30%">Nama</td>
      <td style="width: 70%">: <?php echo $dosbing['MhsNama'] ?></td>
    </tr>
    <tr>
      <td style="width: 30%">NIM</td>
      <td style="width: 70%">: <?php echo $dosbing['MhsNim'] ?></td>
    </tr>
    <tr>
      <td style="width: 30%">Pembimbing Utama</td>
      <td style="width: 70%">: <?php echo $dosen1['DosenNama'] ?></td>
    </tr>
    <tr>
      <td style="width: 30%">Pembimbing Pendamping</td>
      <td style="width: 70%">: <?php echo $dosen2['DosenNama'] ?></td>
    </tr>
    <tr>
      <td style="width: 30%">Judul Skripsi</td>
      <td style="width: 70%">: <?php echo $judul['SkripsiJudul'] ?></td>
    </tr>
  </tbody>
</table>

<table  width="100%" style="position: relative; top: 30px;">
  <thead>
    <tr class="tengah">
      <th>Pembimbing Utama</th>
      <th>Pembimbing Pendamping</th>
    </tr>
  </thead>
  <tbody>
    <tr class="tebal tengah">
      <td><br><br><br><?php echo $dosen1['DosenNama'] ?></td>
      <td><br><br><br><?php echo $dosen2['DosenNama'] ?></td>  
    </tr>
  </tbody>
</table>

<?php 
$auth = $this->db->query("SELECT * FROM tauth WHERE NamaLevel='Koordinator'")->row_array(); 
$id_koor = $auth['Iduser'];
$koor = $this->db->query("SELECT DosenNama FROM tdosen WHERE DosenId='$id_koor'")->row_array();
 ?>
<table  width="100%" style="position: relative; top: 50px;">
  <thead>
    <tr class="tengah">
      <th>Koordinator Skripsi</th>
    </tr>
  </thead>
  <tbody>
    <tr class="tebal tengah">
      <td><br><br><br><br><?php echo $koor['DosenNama'] ?></td>
    </tr>
  </tbody>
</table>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<P style="font-size: 14px;" class="tulisan tengah tebal" >CATATAN</P>
<P style="position: relative; bottom: 10px; font-size: 14px;" class="tulisan tengah tebal">BIMBINGAN DAN KONSULTASI</P>
<P style="position: relative; bottom: 20px; font-size: 14px;" class="tulisan tengah tebal">PEMBIMBING UTAMA</P>

<table class="table table-bordered" width="100%" style="bottom: 90px">
  <thead>
    <tr>
      <th class="td">NO</th>
      <th class="td">Submit</th>
      <th class="td">Balas</th>
      <th class="td">Bab</th>
      <th class="td">Status</th>
      <th class="td">Catatan Bimbingan</th>
    </tr>
  </thead>
  <tbody>
    <?php $i=1; foreach($riwayat1 as $riwayat1) { ?>
    <tr style="">
      <td class="td"><?php echo $i ?></td>
      <td class="td"><?php echo date("d-m-y", strtotime($riwayat1['BimbingansTgl'])) ?></td>
      <td class="td"><?php echo date("d-m-y", strtotime($riwayat1['BimbingansBalasanTgl'])) ?></td>
      <td class="td"><?php echo $riwayat1['BimbingansBab']?></td>
      <td class="td">
        <?php if ($riwayat1['BimbingansStatus']==1): ?>
          <?php echo 'ACC' ?>
        <?php elseif (($riwayat1['BimbingansStatus']==2)):?>
           <?php echo 'Revisi' ?>
        <?php else : ?>
          <?php echo 'Menunggu' ?>
        <?php endif ?>
      </td>
      <td class="td"><?php echo $riwayat1['BimbingansBalasanKet'] ?></td>
    </tr>
    <?php $i++; } ?>
  </tbody>
</table>

<br><br><br><br><br><br><br><br><br>
<P style="font-size: 14px;" class="tulisan tengah tebal" >CATATAN</P>
<P style="position: relative; bottom: 10px; font-size: 14px;" class="tulisan tengah tebal">BIMBINGAN DAN KONSULTASI</P>
<P style="position: relative; bottom: 20px; font-size: 14px;" class="tulisan tengah tebal">PEMBIMBING PENDAMPING</P>

<table class="table table-bordered" width="100%">
  <thead>
    <tr>
      <th class="td">NO</th>
      <th class="td">Submit</th>
      <th class="td">Balas</th>
      <th class="td">Bab</th>
      <th class="td">Status</th>
      <th class="td">Catatan Bimbingan</th>
    </tr>
  </thead>
  <tbody>
    <?php $i=1; foreach($riwayat2 as $riwayat2) { ?>
    <tr style="">
      <td class="td"><?php echo $i ?></td>
      <<td class="td"><?php echo date("d-m-y", strtotime($riwayat2['BimbingansTgl'])) ?></td>
      <td class="td"><?php echo date("d-m-y", strtotime($riwayat2['BimbingansBalasanTgl'])) ?></td>
      <td class="td"><?php echo $riwayat2['BimbingansBab']?></td>
      <td class="td">
        <?php if ($riwayat2['BimbingansStatus']==1): ?>
          <?php echo 'ACC' ?>
        <?php elseif (($riwayat2['BimbingansStatus']==2)):?>
           <?php echo 'Revisi' ?>
        <?php else : ?>
          <?php echo 'Menunggu' ?>
        <?php endif ?>
      </td>
      <td class="td"><?php echo $riwayat2['BimbingansBalasanKet'] ?></td>
    </tr>
    <?php $i++; } ?>
  </tbody>
</table>

</body>
</html>
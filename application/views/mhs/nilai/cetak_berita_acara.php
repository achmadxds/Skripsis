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
      padding: 6px 12px;
      border: solid thin #000;
      text-align: left;
    }.bg-success{
      background-color: #F5F5F5;
      font-weight: bold;
      border: solid thin #000;
    }

  </style>
  <style type="text/css" media="screen">
  .tulisan{
  font-family: serif;
    }
     .table{
      border: solid thin #000;
      border-collapse: collapse;
      width: 100%;
      margin-bottom: 1cm;
    }
    .td{
      padding: 6px 12px;
      border: solid thin #000;
      text-align: left;
    }.bg-success{
      background-color: #F5F5F5;
      font-weight: bold;
      border: solid thin #000;
    }
  </style>
</head>


<!-- body surat -->
<body onload="print()">
    
  </div>
  <div class="row tulisan tengah tebal">
      <H4 class="tulisan tengah tebal">BERITA ACARA</H4>
  </div>
  <div class="row tulisan tengah tebal">
      <h5 style="position: relative; bottom: 20px;">SEMINAR PROPOSAL SKRIPSI</h5>
    
      <h5 style="position: relative; bottom: 40px;">PROGRAM STUDI SISTEM INFORMASI FAKULTAS TEKNIK</h5>
    
      <h5 style="position: relative; bottom: 65px;">UNIVERSITAS MURIA KUDUS</h5>
  </div>

    <p class="tulisan" style="position: relative; bottom: 50px;">Pada hari,tempat dan waktu yang tersebut di bawah ini :</p>
  

<table  width="100%" style="position: relative; bottom: 66px;">
  <tbody style="position: relative; left: 66px;">
    <tr >
      <td style="width: 30%">Hari</td>
      <td style="width: 70%">: <?= $jadwal['SemproTgl']?></td>
    </tr>
    <tr>
      <td style="width: 30%">Tanggal</td>
      <td style="width: 70%">: <?= $jadwal['SemproTgl']?></td>
    </tr>
    <tr>
      <td style="width: 30%">Jam</td>
      <td style="width: 70%">: <?= $jadwal['SemproJam']?></td>
    </tr>
    <tr>
      <td style="width: 30%">Tempat</td>
      <td style="width: 70%">: <?= $jadwal['RuangNama']?></td>
    </tr>
  </tbody>
</table>

    <p style="position: relative; bottom: 80px;">telah dilaksanakan Seminar Proposal Skripsi Program Studi Sistem Informasi Fakultas Teknik Universitas Muria Kudus untuk mahasiswa di bawah ini :</p>

<table  width="100%" style="position: relative; bottom: 95px;">
  <tbody style="position: relative; left: 66px;">
    <tr>
      <td style="width: 30%">NIM</td>
      <td style="width: 70%">: <?= $profil['MhsNim']?></td>
    </tr>
    <tr>
      <td style="width: 30%">Nama Lengkap</td>
      <td style="width: 70%">: <?= $profil['MhsNama']?></td>
    </tr>
    <tr>
      <td style="width: 30%">Judul Proposal Skripsi</td>
      <td style="width: 70%">: <?= $judul['SkripsiJudul']?></td>
    </tr>
  </tbody>
</table>
      
    <p style="position: relative; bottom: 100px;">Berdasarkan hasil seminar proposal meliputi kemampuan analisa dan perancangan, pemahaman materi, dan program aplikasi serta presentasi maka mahasiswa tersebut dinyatakan :</p>
  </div>

  <?php if ($sempro['SemproStatusRevisi']==1): ?>
    <div class="tulisan tengah">
    <p style="position: relative; bottom: 110px;">DITERIMA/<S>REVISI BESAR</S>/REVISI KECIL/<S>DITOLAK</S></p>
  </div>
  <?php else: ?>
    <div class="tulisan tengah">
    <p style="position: relative; bottom: 110px;"><S>DITERIMA</S>/REVISI BESAR/<S>REVISI KECIL</S>/DITOLAK</p>
  </div>
  <?php endif ?>
  
  <?php 
  $d1= $jadwal['SemproPenguji1'];
  $d2= $jadwal['SemproPenguji2'];
  $d3= $jadwal['SemproPenguji3'];
  $sql1 = $this->db->query(" SELECT DosenNama FROM tdosen WHERE DosenId='$d1'")->row_array();
  $sql2 = $this->db->query(" SELECT DosenNama FROM tdosen WHERE DosenId='$d2'")->row_array();
  $sql3 = $this->db->query(" SELECT DosenNama FROM tdosen WHERE DosenId='$d3'")->row_array(); ?>

 <table  width="100%" style="position: relative; bottom: 120px;">
  <thead>
    <tr class="tengah">
      <th>Ketua Penguji</th>
      <th>Anggota Penguji 1</th>
      <th>Anggota Penguji 2</th>
    </tr>
  </thead>
  <tbody>
    <tr class="tebal tengah">
      <td><br><br><br><br><?=$sql1['DosenNama'] ?></td>
      <td><br><br><br><br><?=$sql2['DosenNama'] ?></td>  
      <td><br><br><br><br><?=$sql3['DosenNama'] ?></td>
    </tr>
  </tbody>
</table>

  

</body>


<!-- body revisi -->
<body onload="print()">
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <p style="position: relative; left: 80px; bottom: 120px;">NIM : <?= $profil['MhsNim']?> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp; &emsp;&emsp;&emsp;&emsp;&emsp;&emsp; &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Nama: <?= $profil['MhsNama']?></p>

  <table class="table table-bordered" width="100%" style="position: relative; bottom: 90px;">
  <thead>
    <tr>
      <th>Ketua Penguji</th>
      <th>Anggota Penguji 1</th>
      <th>Anggota Penguji 2</th>
    </tr>
  </thead>
  <tbody>
    
    <tr>
      <td>Revisi : <?php echo $ketua['DetsemKetRevisi'] ?></td>
      <td>Revisi : <?php echo $dosen1['DetsemKetRevisi'] ?></td>  
      <td>Revisi : <?php echo $dosen2['DetsemKetRevisi'] ?></td>
    </tr>
  </tbody>
</table>
  <table  width="100%" style="position: relative; bottom: 90px;">
  <thead>
    <tr class="tengah">
      <th>Ketua Penguji</th>
      <th>Anggota Penguji 1</th>
      <th>Anggota Penguji 2</th>
    </tr>
  </thead>
  <tbody>
    <tr class="tebal tengah">
      <td><br><br><br><br><?=$sql1['DosenNama'] ?></td>
      <td><br><br><br><br><?=$sql2['DosenNama'] ?></td>  
      <td><br><br><br><br><?=$sql3['DosenNama'] ?></td>
    </tr>
  </tbody>
</table>

</body>
</html>
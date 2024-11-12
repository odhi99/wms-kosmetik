<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Laporan</title>
  <link rel="stylesheet" href="assets/css/invoice.css" media="all" />
  <?php
  require 'controller/koneksi.php';

  ?>
</head>

<body>
  <header class="clearfix">
    <div id="logo">
      <img src="img/logo.png">
    </div>
    <h1>LAPORAN</h1>
    <div id="company" class="clearfix">
      <div>Kosmetik 221013</div>
      <div>Perintis Kemerdekaan</div>
      <div>(+62) 81242634183</div>
      <div><a href="#">kosmetik_221013@gmail.com</a></div>
    </div>
    <div id="project">
      <div><span>TENTANG</span> Laporan barang keluar</div>
    </div>
  </header>
  <main>
    <table>
      <thead>
        <tr>
          <th>NO</th>
          <th>KARYAWAN</th>
          <th>BARANG</th>
          <th>MEREK</th>
          <th>TYPE</th>
          <th>TAHUN RILIS</th>
          <th>JUMLAH BARANG</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = mysqli_query($koneksi, "SELECT * FROM data_barang_keluar_221013 join data_barang_221013 join data_type_221013 join data_merek_221013 join data_admin_221013 on data_barang_221013.id_type_221013 = data_type_221013.id_type_221013 and data_barang_221013.id_merek_221013 = data_merek_221013.id_merek_221013 and data_barang_keluar_221013.id_barang_221013 = data_barang_221013.id_barang_221013  and data_admin_221013.id_admin_221013 = data_barang_keluar_221013.id_admin_221013");
        $i = 1;
        while ($r = mysqli_fetch_array($sql)) {
        ?>
          <tr>
            <td><?= $i++; ?></td>
            <td><?= $r['nama_admin_221013']; ?></td>
            <td><?= $r['nama_barang_221013']; ?></td>
            <td><?= $r['nama_merek_221013']; ?></td>
            <td><?= $r['nama_type_221013']; ?></td>
            <td><?= $r['tahun_rilis_221013']; ?></td>
            <td><?= $r['jumlah_keluar_221013']; ?></td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </main>
  <script>
    window.print();
  </script>
</body>

</html>
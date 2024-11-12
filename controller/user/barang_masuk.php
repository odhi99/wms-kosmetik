<?php
require '../koneksi.php';
$barang = $_POST['id_barang'];
$tampil = mysqli_query($koneksi, "SELECT * FROM data_barang_221013 join data_type_221013 join data_merek_221013 on id_barang_221013='$barang' and data_type_221013.id_type_221013 = data_barang_221013.id_type_221013 and data_merek_221013.id_merek_221013 = data_barang_221013.id_merek_221013;");
$jml = mysqli_num_rows($tampil);

if ($jml > 0) {
    while ($r = mysqli_fetch_array($tampil)) {
?>
        <label class="form-label">Merek</label>
        <input class="form-control" type="text" value="<?= $r['nama_merek_221013']; ?>" disabled>
        <label class="form-label">Type</label>
        <input class="form-control" type="text" value="<?= $r['nama_type_221013']; ?>" disabled>
        <label class="form-label">Stok Barang</label>
        <input class="form-control" type="text" value="<?= $r['stok_barang_221013']; ?>" disabled>
<?php
    }
}

?>
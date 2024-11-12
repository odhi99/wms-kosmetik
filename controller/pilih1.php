<?php
require 'koneksi.php';
$merek = $_POST['id_merek'];
$tampil = mysqli_query($koneksi, "SELECT * FROM data_type WHERE id_merek='$merek'");
$jml = mysqli_num_rows($tampil);

if ($jml > 0) {
    while ($r = mysqli_fetch_array($tampil)) {
?>
        <option value="<?php echo $r['id_type'] ?>"><?php echo $r['nama_type'] ?></option>
<?php
    }
}
?>
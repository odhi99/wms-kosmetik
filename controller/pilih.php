<?php
require 'koneksi.php';
$merek = $_POST['id_merek_221013'];
$tampil = mysqli_query($koneksi, "SELECT * FROM data_type_221013 WHERE id_merek_221013='$merek'");
$jml = mysqli_num_rows($tampil);

if ($jml > 0) {
    while ($r = mysqli_fetch_array($tampil)) {
?>
        <option value="<?php echo $r['id_type_221013'] ?>"><?php echo $r['nama_type_221013'] ?></option>
<?php
    }
}

?>
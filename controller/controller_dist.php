<?php

require 'koneksi.php';

$pilih = $_POST['pilih'];
switch ($pilih) {
    case 1:
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $telp = $_POST['telp'];

        $sql = "INSERT into data_distributor_221013 values (NULL,'$nama','$alamat','$telp')";
        if (mysqli_query($koneksi, $sql)) {
            exit('sukses');
        }

        break;
    case 2:
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $telp = $_POST['telp'];
        $id = $_POST['id'];

        $sql = "UPDATE data_distributor_221013 set nama_dist_221013='$nama', alamat_dist_221013='$alamat', telp_221013='$telp' where id_dist_221013 ='$id'";
        if (mysqli_query($koneksi, $sql)) {
            exit('sukses');
        }

        break;
    case 3:
        $id = $_POST['id'];

        $sql = "DELETE from data_distributor_221013 where id_dist_221013 = '$id'";
        if (mysqli_query($koneksi, $sql)) {
            exit('sukses');
        }
        break;
}

<?php

require 'koneksi.php';

$pilih = $_POST['pilih'];
switch ($pilih) {
    case 1:
        $merek = $_POST['merek'];
        $cekmerek = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM data_merek_221013 where nama_merek_221013 = '$merek'"));
        if ($cekmerek > 0) {
            exit('gagal');
        } else {
            $sql = "INSERT into data_merek_221013 values (NULL,'$merek')";
            if (mysqli_query($koneksi, $sql)) {
                exit('sukses');
            }
        }
        break;
    case 2:
        $merek = $_POST['merek'];
        $id = $_POST['id'];
        $cekmerek = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM data_merek_221013 where nama_merek_221013 = '$merek'"));
        if ($cekmerek > 0) {
            exit('gagal');
        } else {
            $sql = "UPDATE data_merek_221013 set nama_merek_221013 = '$merek' where id_merek_221013 ='$id'";
            if (mysqli_query($koneksi, $sql)) {
                exit('sukses');
            }
        }
        break;
    case 3:
        $id = $_POST['id'];
        $sql = "DELETE from data_merek_221013 where id_merek_221013 = '$id'";
        if (mysqli_query($koneksi, $sql)) {
            exit('sukses');
        }
        break;
}

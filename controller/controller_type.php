<?php

require 'koneksi.php';

$pilih = $_POST['pilih'];
switch ($pilih) {
    case 1:
        $merek = $_POST['merek'];
        $type = $_POST['type'];
        $tgl = $_POST['tgl'];
        $cek = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM data_type_221013 where nama_type_221013 = '$type' and tahun_rilis_221013='$tgl'"));
        if ($cek > 0) {
            exit('gagal');
        } else {
            $sql = "INSERT into data_type_221013 values (NULL,'$merek','$type','$tgl')";
            if (mysqli_query($koneksi, $sql)) {
                exit('sukses');
            }
        }
        break;
    case 2:
        $merek = $_POST['merek'];
        $type = $_POST['type'];
        $tgl = $_POST['tgl'];
        $id = $_POST['id'];

        $cek = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM data_type_221013 where nama_type_221013= '$type' and tahun_rilis_221013='$tgl'"));
        if ($cek > 0) {
            exit('gagal');
        } else {
            $sql = "UPDATE data_type set id_merek_221013 = '$merek', nama_type_221013 ='$type', tahun_rili_221013 = '$tgl' where id_type='$id'";
            if (mysqli_query($koneksi, $sql)) {
                exit('sukses');
            }
        }
        break;
    case 3:
        $id = $_POST['id'];
        $sql = "DELETE from data_type_221013 where id_type_221013= '$id'";
        if (mysqli_query($koneksi, $sql)) {
            exit('sukses');
        }
        break;
}

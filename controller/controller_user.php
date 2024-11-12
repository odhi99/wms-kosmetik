<?php

require 'koneksi.php';

$pilih = $_POST['pilih'];
switch ($pilih) {
    case 1:
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $pass = $_POST['pass'];
        $level = $_POST['level'];

        //cek user
        $sequel = mysqli_query($koneksi, "SELECT * FROM data_admin_221013 where username_admin_221013='$username'");
        $cek = mysqli_fetch_array($sequel);
        if ($cek > 0) {
            exit('gagal');
        } else {
            $sql = "INSERT INTO data_admin_221013 VALUES (NULL,'$nama','$username','$pass','$level')";
            if (mysqli_query($koneksi, $sql)) {
                exit('sukses');
            }
        }
        break;
    case 2:
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $pass = $_POST['pass'];
        $level = $_POST['level'];
        $id = $_POST['id'];

        //cek user
        $sequel = mysqli_query($koneksi, "SELECT * FROM data_admin_221013 where username_admin_221013='$username'");
        $cek = mysqli_fetch_array($sequel);
        if ($cek > 0) {
            exit('gagal');
        } else {
            $sql = "UPDATE data_admin_221013 set nama_admin_221013='$nama', username_admin_221013='$username', password_admin_221013='$pass', level_admin_221013='$level' where id_admin_221013 ='$id'";
            if (mysqli_query($koneksi, $sql)) {
                exit('sukses');
            }
        }


        break;
    case 3:
        $id = $_POST['id'];

        $sql = "DELETE from data_admin_221013 where id_admin_221013 = '$id'";
        if (mysqli_query($koneksi, $sql)) {
            exit('sukses');
        }
        break;
}

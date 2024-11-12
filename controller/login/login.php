<?php
session_start();
require '../../controller/koneksi.php';
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];

switch ($level) {
    case 1:
        $sql_admin = "SELECT * FROM data_admin_221013 where username_admin_221013 = '$username' AND password_admin_221013 ='$password' AND level_admin_221013='$level'";
        $cek_admin = mysqli_query($koneksi, $sql_admin);
        if (mysqli_num_rows($cek_admin) > 0) {
            $_SESSION['user'] = "admin";
            $_SESSION['login'] = $username;
            exit('admin');
        } else {
            exit('gagal');
        }
        break;
    case 2:
        $sql_user = "SELECT * FROM data_admin_221013 where username_admin_221013 = '$username' AND password_admin_221013 ='$password' AND level_admin_221013='$level'";
        $cek_user = mysqli_query($koneksi, $sql_user);
        if (mysqli_num_rows($cek_user) > 0) {
            $_SESSION['user'] = "user";
            $_SESSION['login'] = $username;
            exit('user');
        } else {
            exit('gagal');
        }
        break;
}

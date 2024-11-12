<?php

require '../koneksi.php';

$pilih = $_POST['pilih'];
switch ($pilih) {
    case 1:
        $id_admin = $_POST['id_admin'];
        $id_dist = $_POST['id_dist'];
        $stok = $_POST['stok'];
        $barang = $_POST['barang'];

        // ambil data barang berdasarkan ID yang dipilih
        $databarang = mysqli_query($koneksi, "SELECT * FROM data_barang_221013 WHERE id_barang_221013 = '$barang'");
        $data = mysqli_fetch_assoc($databarang);
        if ($data) { // Pastikan data barang ditemukan
            $stok_barang = $data['stok_barang_221013'];
            $id_barang = $data['id_barang_221013'];

            $total = $stok + $stok_barang;

            // Insert data masuk
            $sql = "INSERT into data_barang_masuk_221013 values (NULL, '$id_admin', '$id_dist', '$barang', '$stok', CURRENT_DATE())";
            mysqli_query($koneksi, "UPDATE data_barang_221013 set stok_barang_221013 = '$total' where id_barang_221013 = '$id_barang'");

            if (mysqli_query($koneksi, $sql)) {
                exit('sukses');
            }
        } else {
            exit('gagal: barang tidak ditemukan');
        }
        break;

    case 2:
        $merek = $_POST['merek'];
        $type = $_POST['type'];
        $stok = $_POST['stok'];
        $barang = $_POST['barang'];
        $id = $_POST['id'];
        $nmfoto = $_POST['nmfoto'];

        if (!$nmfoto == "") {
            //hapus foto
            $foto = mysqli_query($koneksi, "SELECT * from data_barang where id_barang='$id'");
            $data =  mysqli_fetch_assoc($foto);
            $datafoto = $data['foto'];
            unlink("../img/data_barang/" . $datafoto);

            //upload foto
            $temp = explode(".", $_FILES["foto"]["name"]);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            $location = "../img/data_barang/" . $newfilename;
            move_uploaded_file($_FILES['foto']['tmp_name'], $location);

            mysqli_query($koneksi, "UPDATE data_barang set foto ='$newfilename' where id_barang ='$id'");
        }


        $sql = "UPDATE data_barang set id_merek='$merek', id_type='$type', nama_barang = '$barang', stok_barang='$stok' where id_barang ='$id'";
        if (mysqli_query($koneksi, $sql)) {
            exit('sukses');
        }

        break;
    case 3:
        $id = $_POST['id'];

        $foto = mysqli_query($koneksi, "SELECT * from data_barang where id_barang='$id'");
        $data =  mysqli_fetch_assoc($foto);
        $datafoto = $data['foto'];
        unlink("../img/data_barang/" . $datafoto);

        $sql = "DELETE from data_barang where id_barang = '$id'";
        if (mysqli_query($koneksi, $sql)) {
            exit('sukses');
        }
        break;
}

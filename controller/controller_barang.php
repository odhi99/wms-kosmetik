<?php

require 'koneksi.php';

$pilih = isset($_POST['pilih']) ? $_POST['pilih'] : null;
switch ($pilih) {
    case 1:
        $barang = mysqli_real_escape_string($koneksi, $_POST['kosmetik']);
        $merek = mysqli_real_escape_string($koneksi, $_POST['merek']);
        $type = mysqli_real_escape_string($koneksi, $_POST['type']);
        $stok = mysqli_real_escape_string($koneksi, $_POST['stok']);

        // file upload
        if (isset($_FILES["foto"]["name"]) && $_FILES["foto"]["name"] != "") {
            $temp = explode(".", $_FILES["foto"]["name"]);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            $location = "../img/data_barang/" . $newfilename;
            move_uploaded_file($_FILES['foto']['tmp_name'], $location);
        } else {
            $newfilename = ""; // Handle if no file is uploaded
        }

        $sql = "INSERT INTO data_barang_221013 VALUES (NULL, '$merek', '$type', '$barang', '$stok', '$newfilename')";
        if (mysqli_query($koneksi, $sql)) {
            exit('sukses');
        } else {
            exit('gagal');
        }
        break;

    case 2:
        $merek = mysqli_real_escape_string($koneksi, $_POST['merek']);
        $type = mysqli_real_escape_string($koneksi, $_POST['type']); // id_type diharapkan integer
        $stok = mysqli_real_escape_string($koneksi, $_POST['stok']);
        $barang = mysqli_real_escape_string($koneksi, $_POST['barang']);
        $id = mysqli_real_escape_string($koneksi, $_POST['id']);
        $nmfoto = $_POST['nmfoto'];

        // Log untuk debugging
        error_log("Merek: $merek, Type: $type, Stok: $stok, Barang: $barang, ID: $id");

        if (!$nmfoto == "") {
            // Hapus foto lama
            $foto = mysqli_query($koneksi, "SELECT * FROM data_barang_221013 WHERE id_barang_221013='$id'");
            $data = mysqli_fetch_assoc($foto);
            $datafoto = $data['foto'];
            unlink("../img/data_barang/" . $datafoto);

            // Upload foto baru
            if (isset($_FILES["foto"]["name"]) && $_FILES["foto"]["name"] != "") {
                $temp = explode(".", $_FILES["foto"]["name"]);
                $newfilename = round(microtime(true)) . '.' . end($temp);
                $location = "../img/data_barang/" . $newfilename;
                move_uploaded_file($_FILES['foto']['tmp_name'], $location);
                // Update foto baru
                mysqli_query($koneksi, "UPDATE data_barang_221013 SET foto_221013='$newfilename' WHERE id_barang_221013='$id'");
            }
        }

        // Update data barang
        $sql = "UPDATE data_barang_221013 SET id_merek_221013='$merek', id_type_221013='$type', nama_barang_221013='$barang', stok_barang_221013='$stok' WHERE id_barang_221013='$id'";
        error_log("SQL Update: $sql"); // Log untuk debugging
        if (mysqli_query($koneksi, $sql)) {
            exit('sukses');
        } else {
            exit('gagal');
        }
        break;



    case 3:
        $id = $_POST['id'];

        // hapus foto jika ada
        $fotoQuery = mysqli_query($koneksi, "SELECT * FROM data_barang_221013 WHERE id_barang_221013='$id'");
        $data = mysqli_fetch_assoc($fotoQuery);
        $datafoto = isset($data['foto']) ? $data['foto'] : "";

        if ($datafoto && file_exists("../img/data_barang/" . $datafoto)) {
            unlink("../img/data_barang/" . $datafoto);
        }

        // hapus data dari database
        $sql = "DELETE FROM data_barang_221013 WHERE id_barang_221013='$id'";
        if (mysqli_query($koneksi, $sql)) {
            exit('sukses');
        } else {
            exit('gagal');
        }
        break;
}

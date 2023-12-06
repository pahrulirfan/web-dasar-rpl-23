<?php
session_start();

if($_SESSION['login'] == false){

    header('location: ../auth/login.php');

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Penulis</title>
</head>

<body>
    <h2>Ubah penulis</h2>

    <?php

    require("../setting.php");

    // cek id_penulis, ada atau tidak
    if (isset($_GET["id_penulis"])) {
        // masukkan data id_penulis dari url ke variable $id 
        $id = htmlspecialchars($_GET["id_penulis"]);
        // ambil data penulis yang mau di ubah
        $query = "SELECT * FROM penulis WHERE id=$id";
        // jalankan query
        $result = mysqli_query($link, $query);
        // ambil data dari database, masukkan ke variable row
        $row = mysqli_fetch_object($result);

    } else {
        // jika tidak ada id_penulis, maka harus kembali ke halaman tampil.php
        header("location: tampil.php");
    }

    // proses simpan data
    if (isset($_POST["btnsimpan"])) {

        $id_penulis = htmlspecialchars($_POST["txtid"]);

        $inputnama = htmlspecialchars($_POST["txtnama"]);
        $inputalamat = htmlspecialchars($_POST["txtalamat"]);
        $inputhp = htmlspecialchars($_POST["txthp"]);

        $query = "UPDATE penulis SET nama='$inputnama', alamat='$inputalamat', hp='$inputhp' WHERE id=$id_penulis";

        $result = mysqli_query($link, $query);

        if ($result) {
            header("location: tampil.php");
        } else {
            echo "Data Gagal disimpan !";
        }

    }

    ?>
    <form action="" method="post">

        <input type="hidden" name="txtid" value="<?= $row->id; ?>">

        <label>Nama : </label>
        <input type="text" name="txtnama" value="<?= $row->nama; ?>"> <br>

        <label>Alamat : </label>
        <input type="text" name="txtalamat" value="<?= $row->alamat; ?>"> <br>

        <label>Nomor HP : </label>
        <input type="text" name="txthp" value="<?= $row->hp; ?>"> <br>

        <input type="submit" value="Simpan" name="btnsimpan">
        <a href="tampil.php">Batal</a>

    </form>

</body>

</html>
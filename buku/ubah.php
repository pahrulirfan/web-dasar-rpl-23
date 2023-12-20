<?php
session_start();

if ($_SESSION['login'] == false) {

    header('location: ../auth/login.php');

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/parsley.css">
</head>

<body>
    <div class="container">
        <h2 class="alert alert-info" style="text-align:center">Ubah Buku</h2>
        <h3>Selamat datang :
            <?php echo $_SESSION['nama_lengkap']; ?>
        </h3>
        <a href="tampil.php" class="btn btn-warning float-end mb-3">Kembali</a>
        <br>
        <?php

        require("../setting.php");

        // cek id_penulis, ada atau tidak
        if (isset($_GET["id_buku"])) {
            // masukkan data id_penulis dari url ke variable $id 
            $id = htmlspecialchars($_GET["id_buku"]);
            // ambil data penulis yang mau di ubah
            $query = "SELECT * FROM buku WHERE id=$id";
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

            $id_buku = htmlspecialchars($_POST["txtid"]);

            $inputpenulis_id = htmlspecialchars($_POST["txtpenulis_id"]);
            $inputjudul = htmlspecialchars($_POST["txtjudul"]);
            $inputpenerbit = htmlspecialchars($_POST["txtpenerbit"]);

            $query = "UPDATE buku SET id_penulis='$inputpenulis_id', alamat='$inputjudul', hp='$inputpenerbit' WHERE id=$id_buku";

            $result = mysqli_query($link, $query);

            if ($result) {
                header("location: tampil.php");
            } else {
                echo "Data Gagal disimpan !";
            }

        }

        ?>
        <div class="row">
            <div class="col-4">
                <form action="" method="post" data-parsley-validate="">

                    <input type="hidden" name="txtid" value="<?= $row->id; ?>">

                    <label>Penulis ID : </label>
                    <input class="form-control" type="text" name="txtpenulis_id" value="<?= $row->penulis_id; ?>"> <br>

                    <label>Judul : </label>
                    <input class="form-control" type="text" name="txtjudul" value="<?= $row->judul; ?>"> <br>

                    <label>Penerbit : </label>
                    <input class="form-control" type="text" name="txtpenerbit" value="<?= $row->penerbit; ?>"> <br>

                    <input type="submit" value="Simpan" name="btnsimpan" class="btn btn-primary">
                    <a href="tampil.php" class="btn btn-warning">Batal</a>

                </form>
            </div>
        </div>
    </div>
</body>

</html>
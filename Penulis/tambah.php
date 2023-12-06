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
    <title>Tambah Penulis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/parsley.css">
</head>

<body>
    <div class="container">
        <h2 class="alert alert-info" style="text-align:center">Tambah Penulis</h2>
        <a href="tampil.php" class="btn btn-warning float-end mb-3">Kembali</a>

        <?php
        if (isset($_POST["btnsimpan"])) {

            require("../setting.php");

            $inputnama = htmlspecialchars($_POST["txtnama"]);
            $inputalamat = htmlspecialchars($_POST["txtalamat"]);
            $inputhp = htmlspecialchars($_POST["txthp"]);

            $query = "INSERT INTO penulis VALUES (NULL, '$inputnama', '$inputalamat', '$inputhp')";

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

                    <label class="form-label">Nama : </label>
                    <input class="form-control" required type="text" name="txtnama"> <br>

                    <label class="form-label">Alamat : </label>
                    <input class="form-control" data-parsley-minlength="10" required type="text" name="txtalamat"> <br>

                    <label class="form-label">Nomor HP : </label>
                    <input data-parsley-type="number" class="form-control" required type="text" name="txthp"> <br>

                    <input class="btn btn-primary" type="submit" value="Simpan" name="btnsimpan">
                    <a class="btn btn-warning" href="tampil.php">Batal</a>

                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"
        integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
</body>

</html>
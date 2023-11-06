<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Penulis</title>
</head>

<body>

    <h2 style="text-align:center">Tambah Penulis</h2>

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
    <form action="" method="post">

        <label>Nama : </label>
        <input type="text" name="txtnama"> <br>

        <label>Alamat : </label>
        <input type="text" name="txtalamat"> <br>

        <label>Nomor HP : </label>
        <input type="text" name="txthp"> <br>

        <input type="submit" value="Simpan" name="btnsimpan">
        <a href="tampil.php">Batal</a>

    </form>

</body>

</html>
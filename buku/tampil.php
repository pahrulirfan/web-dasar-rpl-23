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
    <title>Data Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <?php include('../navbar.php'); ?>

        <h2 class="alert alert-info" style="text-align:center">Data Buku</h2>


        <h3>Selamat datang :
            <?php echo $_SESSION['nama_lengkap']; ?>
        </h3>

        <a href="../auth/logout.php" onclick="return confirm('Anda Yakin ?')"
            class="btn btn-danger mb-3 float-end">Logout</a>

        <a href="tambah.php" class="btn btn-primary mb-3">Tambah Data</a>


        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Penulis</th>
                    <th>Judul</th>
                    <th>Penerbit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('../setting.php');
                $no = 1;
                $query = "SELECT penulis.nama, judul, penerbit FROM `buku`, `penulis` WHERE buku.penulis_id=penulis.id";
                $result = mysqli_query($link, $query);
                while ($row = mysqli_fetch_object($result)) {
                    ?>

                    <tr>
                        <td>
                            <?php echo $no++; ?>
                        </td>
                        <td>
                            <?= $row->nama; ?>
                        </td>
                        <td>
                            <?= $row->judul; ?>
                        </td>
                        <td>
                            <?= $row->penerbit; ?>
                        </td>
                        <td>
                            <a class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin ?')"
                                href="hapus.php?id_buku=<?= $row->id; ?>">Delete</a>

                            <a class="btn btn-warning btn-sm" href="ubah.php?id_buku=<?= $row->id; ?>">Edit</a>
                        </td>
                    </tr>

                <?php } ?>

            </tbody>
        </table>
    </div>
</body>

</html>
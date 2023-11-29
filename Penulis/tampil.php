<?php
session_start();
if(!isset($_SESSION['success'])){

    header('location: ../auth/login.php');

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Penulis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h2 class="alert alert-info" style="text-align:center">Data Penulis</h2>


        <a href="tambah.php" class="btn btn-primary mb-3">Tambah Data</a>


        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>HP</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('../setting.php');
                $no = 1;
                $query = "SELECT * FROM penulis";
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
                            <?= $row->alamat; ?>
                        </td>
                        <td>
                            <?= $row->hp; ?>
                        </td>
                        <td>
                            <a class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin ?')"
                                href="hapus.php?id_penulis=<?= $row->id; ?>">Delete</a>

                            <a class="btn btn-warning btn-sm" href="ubah.php?id_penulis=<?= $row->id; ?>">Edit</a>
                        </td>
                    </tr>

                <?php } ?>

            </tbody>
        </table>
    </div>
</body>

</html>
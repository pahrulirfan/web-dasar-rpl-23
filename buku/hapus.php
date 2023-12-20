<?php
session_start();

if($_SESSION['login'] == false){

    header('location: ../auth/login.php');

}

?>

<?php

require("../setting.php");

if (isset($_GET["id_buku"])) {

    $id = htmlspecialchars($_GET["id_buku"]);

    $query = "DELETE FROM buku WHERE id=$id";

    $result = mysqli_query($link, $query);

    if ($result) {
        header("location: tampil.php");
    } else {
        echo "Hapus data tidak berhasil.";
    }

} else {
    header("location: tampil.php");
}
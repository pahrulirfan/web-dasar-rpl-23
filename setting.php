<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'web-dasar-rpl-23';

$link = mysqli_connect($host, $user, $pass, $db);

if (mysqli_connect_errno()) {

    echo "Koneksi gagal : " . mysqli_connect_error();

}
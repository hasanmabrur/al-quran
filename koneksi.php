<?php
$host   = "localhost";
$user   = "hasancreative_quran";
$pass   = "cepetbuka";
$db     = "hasancreative_quran";
$koneksi = mysqli_connect($host, $user, $pass, $db);
$koneksi->query("SET NAMES 'utf8'");
$koneksi->query('SET CHARACTER SET utf8');
if ($koneksi->connect_errno) {
    echo "Failed to connect to MySQL: " . $koneksi->connect_error;
}

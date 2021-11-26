<?php
$koneksi=mysqli_connect("localhost","root","","responsi");
if ($koneksi->connect_error) {
    die('koneksi gagal : '.$koneksi->connect_error);
}
?>
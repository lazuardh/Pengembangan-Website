<?php
$koneksi = mysqli_connect("localhost","root","","simpel");

if(mysqli_connect_errno()){
    echo "koneksi databse anda gagal".mysqli_connect_error();
}
?>
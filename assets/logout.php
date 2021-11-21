<!-- sweetalert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php 
// mengaktifkan session
session_start();
 
// menghapus semua session
session_destroy();
echo "<script>swal('Terima kasih, Anda Berhasil Logout')</script>";
echo "<meta http-equiv='refresh' content='1 url=login.php'>";
 
?>
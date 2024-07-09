<?php 
session_start();

// menghancurkan session pelanggan
session_destroy();

echo "<script>alert ('anda telah Logout');</script>";
echo "<script>location='index.php';</script>";


 ?>0
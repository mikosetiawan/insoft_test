<?php

include('connection.php');

// Inisialisasi for class name
$id_barang = $_POST['id_barang'];

// Query Input
mysqli_query($conn, "DELETE from tb_product WHERE id_barang='$id_barang'");

// location from by ridirect
header("Location:../../index?alert=successDelete");
// echo "<script>alert('Berhasil disimpan!');window.location.href='../../index';</script>";

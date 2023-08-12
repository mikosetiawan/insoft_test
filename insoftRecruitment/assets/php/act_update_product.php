<?php
session_start();

include('connection.php');

// Inisialisasi for class name
$id_barang = $_POST['id_barang'];

$name = $_POST['name'];
$category_name = $_POST['category_name'];
$price = $_POST['price'];
$unit = $_POST['unit'];


// Query inisialisasi id by tb_catergory
$data = mysqli_query($conn, "SELECT * FROM tb_category WHERE category_name='$category_name'");
$row = mysqli_fetch_array($data);

echo $category_name;


// Query Input
mysqli_query($conn, "UPDATE tb_product SET name='$name', id_category='$row[id_category]', price='$price', unit='$unit' WHERE id_barang='$id_barang'");

// Session end
session_unset();
session_destroy();


// location from by ridirect
header("Location:../../index?alert=successUpdate");
// echo "<script>alert('Berhasil disimpan!');window.location.href='../../index';</script>";

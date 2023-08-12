<?php

include('connection.php');

// Inisialisasi for class name
$name = $_POST['name'];
$category_name = $_POST['category_name'];
$price = $_POST['price'];
$unit = $_POST['unit'];



// Query inisialisasi id by tb_catergory
$data = mysqli_query($conn, "SELECT * FROM tb_category WHERE category_name='$category_name'");
$row = mysqli_fetch_array($data);
// Query Input
mysqli_query($conn, "INSERT INTO tb_product VALUES('','$name','$row[id_category]','$price','$unit')");

// location from by ridirect
header("Location:../../index?alert=successAdd");
// echo "<script>alert('Berhasil disimpan!');window.location.href='../../index';</script>";

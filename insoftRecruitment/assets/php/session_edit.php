<?php

include('connection.php');
session_start();

$id_barang = $_GET['id_barang'];
$_SESSION['edit'] = "editNow";


$data = mysqli_query($conn, "SELECT * FROM tb_product WHERE id_barang='$id_barang'");
$row = mysqli_fetch_array($data);

header("Location:../../index?id_barang=$row[id_barang]");
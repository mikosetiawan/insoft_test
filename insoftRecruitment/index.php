<!-- parsing Api Json PHP dengan Curl -->

<?php
session_start();


// $curl = curl_init();

// curl_setopt($curl, CURLOPT_URL, 'https://api.jwddata.com/api_recruit/api/get_barang');
// curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// $response = curl_exec($curl);
// $data = json_decode($response);

// curl_close($curl);

// var_dump($data);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insoft Recruitment @mikodev</title>

    <!-- CSS Style -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Boostrap framework css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap" rel="stylesheet">


</head>

<body>


    <div class="container py-5 px-5">
        <div class="row">
            <h1>Insoft Shop</h1>
            <p>Testing CRUD or RestFull Api Programming Recruitment <i><b>PHP & Framewok Boostrap</b></i></p>

            <!-- Interface product API -->
            <div class="rounded py-3 my-3 px-3 line-fx">
                <div class="card-body">

                    <?php
                    if (isset($_SESSION['edit']) == "editNow") {
                    ?>
                        <h3 class="text-center">Form Edit Product</h3>
                    <?php
                    } else {
                    ?>
                        <h3 class="text-center">Form Input Product</h3>
                    <?php
                    }
                    ?>
                    <hr class="line-fx">

                    <!-- Alert/message process -->
                    <?php
                    if (isset($_GET['alert'])) {
                        if ($_GET['alert'] == "successAdd") {
                    ?>
                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                <strong>Success Add Product!</strong> successfull!
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                        } else if ($_GET['alert'] == "successUpdate") {
                        ?>
                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                <strong>Success Update Product!</strong> successfull!
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                    <?php
                        }
                    }
                    ?>


                    <?php
                    if (isset($_SESSION['edit']) == "editNow") {
                    ?>
                        <?php
                        include('assets/php/connection.php');

                        $id_barang = $_GET['id_barang'];
                        $data = mysqli_query($conn, "SELECT * FROM tb_product WHERE id_barang='$id_barang'");
                        $row = mysqli_fetch_array($data);


                        ?>
                        <form action="assets/php/act_update_product" method="post">
                            <input type="text" name="id_barang" value="<?= $row['id_barang']; ?>" hidden>
                            <div class="mb-3">
                                <label>Name</label>
                                <input name="name" type="tex" class="form-control" value="<?= $row['name']; ?>">
                            </div>
                            <div class="mb-3">
                                <label>Price</label>
                                <input name="price" type="number" class="form-control" value="<?= $row['price']; ?>">
                            </div>
                            <div class="mb-3">
                                <label>Unit</label>
                                <input name="unit" type="text" value="<?= $row['unit']; ?>" class="form-control" readonly>
                                <select name="unit" id="" class="form-select">
                                    <option value="">- Edit -</option>
                                    <option value="Pcs">Pcs</option>
                                    <option value="Botol">Botol</option>
                                    <option value="Box">Box</option>
                                    <option value="Dus">Dus</option>
                                    <option value="Sachet">Sachet</option>
                                    <option value="ML">ML</option>
                                    <option value="L">L</option>
                                </select>
                            </div>

                            <?php
                            include('assets/php/connection.php');

                            $data = mysqli_query($conn, "SELECT * FROM  tb_category WHERE id_category='$row[id_category]'");
                            $r2 = mysqli_fetch_array($data);
                            ?>
                            <div class="mb-3">
                                <label>Catergory</label>
                                <input name="category_name" type="text" value="<?= $r2['category_name']; ?>" class="form-control" readonly>
                                <select name="category_name" id="" class="form-select">
                                    <option value="">- Edit -</option>
                                    <?php
                                    include('assets/php/connection.php');
                                    $data = mysqli_query($conn, "SELECT * FROM tb_category");

                                    foreach ($data as $r) {
                                    ?>
                                        <option value="<?= $r['category_name']; ?>"><?= $r['category_name']; ?></option>
                                    <?php
                                    }
                                    ?>

                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>

                        <?php
                        ?>
                    <?php
                    } else {
                    ?>
                        <form action="assets/php/act_add_product" method="post">
                            <div class="mb-3">
                                <label>Name</label>
                                <input name="name" type="tex" class="form-control" placeholder="Sample : Teh Pucuk..">
                            </div>
                            <div class="mb-3">
                                <label>Price</label>
                                <input name="price" type="number" class="form-control" placeholder="Rp.0">
                            </div>
                            <div class="mb-3">
                                <label>Unit</label>
                                <select name="unit" id="" class="form-select">
                                    <option value="">- Option -</option>
                                    <option value="Pcs">Pcs</option>
                                    <option value="Botol">Botol</option>
                                    <option value="Box">Box</option>
                                    <option value="Dus">Dus</option>
                                    <option value="Sachet">Sachet</option>
                                    <option value="ML">ML</option>
                                    <option value="L">L</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label>Catergory</label>
                                <select name="category_name" id="" class="form-select">
                                    <option value="">- Option -</option>
                                    <?php
                                    include('assets/php/connection.php');

                                    $data = mysqli_query($conn, "SELECT * FROM tb_catergory");

                                    foreach ($data as $row) {
                                    ?>
                                        <option value="<?= $row['category_name'] ?>"><?= $row['category_name'] ?></option>
                                    <?php
                                    }
                                    ?>

                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>

                    <?php
                    }
                    ?>




                </div>
            </div>
            <!-- End Interface product API -->

            <!-- Interface product API -->
            <div class="rounded py-3 px-3 line-fx">
                <div class="card-body">

                    <h3 class="text-center">Output Product</h3>
                    <hr class="line-fx">

                    <!-- Alert/message process -->
                    <?php
                    if (isset($_GET['alert'])) {
                        if ($_GET['alert'] == "successDelete") {
                    ?>
                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                <strong>Success Delete Products!</strong> successfull!
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                    <?php
                        }
                    }
                    ?>

                    <!-- View product-product -->
                    <div class="row d-flex justify-content-center">

                        <?php
                        include('assets/php/connection.php');

                        $data = mysqli_query($conn, "SELECT * FROM tb_product");

                        foreach ($data as $row) {
                        ?>
                            <div class="col-lg-4 my-2">
                                <div class="card shadow" style="width: 18rem;">
                                    <div class="card-body">
                                        <div class="my-3">
                                            <h4 class="card-title"><?= $row['name']; ?></h4>
                                            <h6 class="card-subtitle mb-2 text-body-secondary">Rp. <?= number_format($row['price']); ?>,- <i>/ <?= $row['unit']; ?></i></h6>
                                            <p><?php 
                                                    if($row['id_category'] == "1"){
                                                        echo "Makanan";
                                                    } elseif($row['id_category'] == "2") {
                                                        echo "Minuman";
                                                    } else {
                                                        echo "null";
                                                    }
                                            ?></p>
                                        </div>
                                        <a href="assets/php/act_delete.php?id_barang=<?= $row['id_barang']; ?>" class="btn btn-danger">Delete</a>
                                        <a href="assets/php/session_edit?id_barang=<?= $row['id_barang']; ?>" class="btn btn-warning">Edit</a>
                                    </div>
                                </div>
                            </div>

                        <?php
                        }
                        ?>

                    </div>

                </div>
            </div>
            <!-- End Interface product API -->

        </div>
    </div>


</body>

</html>
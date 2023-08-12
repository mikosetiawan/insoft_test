<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 4</title>

    <!-- Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>


</head>

<body>
    <div class="conatainer px-5 py-5">
        <div class="container mt-5">
            <h2>Input</h2>
            <form method="POST" action="">
                <div class="mb-3">
                    <input type="number" class="form-control" id="rowCount" name="rowCount" required placeholder="0">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-warning">Generate</button>
                </div>
            </form>
        </div>
        <div class="container my-3">
            <div class="row">
                <h2>Output :</h2>
                <div class="card rounded mx-3">
                    <div class="card-body">
                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            if (isset($_POST["rowCount"]) && is_numeric($_POST["rowCount"])) {
                                $rowCount = intval($_POST["rowCount"]);

                                // Generate pola segitiga
                                for ($i = 1; $i <= $rowCount; $i++) {
                                    for ($j = 1; $j <= $i; $j++) {
                                        echo "*";
                                    }
                                    echo "<br>";
                                }
                            } else {
                                echo "Invalid input.";
                            }
                        }

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>
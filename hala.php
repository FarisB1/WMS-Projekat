<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="kutija.css?v=2" />
    <meta charset="UTF-8" name="viewport" content="width=device-width" />
    <title>WMS - AutoTarget - Dodaj kutiju</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        .container-fluid {
            margin-top: 50px;
        }
        .form-group {
            margin-top: 60px;
        }
    </style>
</head>

<body>
    <div class="d-flex">
        <?php include 'sidebar.php'; ?>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-6 offset-md-3 mt-5">
                    <h1 style="text-align: center;"class="mt-5">Hala</h1>
                    <form method="POST" enctype="multipart/form-data" action="dodajhalu.php">
                        <div class="form-group mt-5">
                            <label for="broj">UNESITE BROJ HALA:</label>
                            <select class="form-select mt-3" id="broj" name="broj" required autocomplete="off">
                                <option selected disabled value="Broj">Broj</option>
                                <?php
                                for ($i = 1; $i <= 10; $i++) {
                                    echo "<option value='$i'>$i</option>";
                                }
                                ?>
                            </select>
                            <button class="btn btn-primary w-100 mt-3" name="dodaj" id="dodaj">DODAJ</button>
                        </div>
                    </form>
                    <a href="index.php" class="d-block text-center mt-3 w-1">
                        <button class="btn btn-primary w-100" name="nazad">NAZAD</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
    <script>
        document.getElementById("dodaj").addEventListener("click", function (e) {
            const selectedValue = document.getElementById("broj").value;
            if (selectedValue !== "Broj") {
                alert("Uspješno ste dodali " + selectedValue + ' halu/e');
            } else {
                alert("Molimo odaberite vrijednost prije nego što dodate.");
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>

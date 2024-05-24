<?php   
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WMS - Warehouse Management System</title>
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
                    <h1 style="text-align: center;" class="mt-5">Dodaj Artikal</h1>
                    <form method="POST" enctype="multipart/form-data" action="dodajartikal.php">
                        <div class="form-group">
                            <label for="ime_artikla">Ime Artikla:</label>
                            <input type="text" class="form-control mt-3" id="ime_artikla" name="ime_artikla" required autocomplete="off">
                        </div>
                        <button class="btn btn-primary mt-3 w-100" name="dodaj" id="dodaj">DODAJ</button>
                    </form>
                    <a href="index.php">
                        <button class="btn btn-primary mt-3 mb-2 w-100" name="nazad">NAZAD</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById("dodaj").addEventListener("click", function (e) {
            const broj = document.getElementById("zalihe").value;
            if (broj > 0) {
                alert("Uspješno ste dodali " + broj + ' artikal/a');
            } else {
                alert("Molimo unesite ispravan broj zaliha prije nego što dodate.");
                e.preventDefault();
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>

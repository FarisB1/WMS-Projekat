<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WMS - Warehouse Management System</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
                    <h1 style="text-align: center;"class="mt-5">Izvještaj kutija</h1>
                    <form method="POST" action="izvjestaj_logika.php" class="mt-3">
                        <div class="form-group">
                            <label for="inputNumber">Unesite ID kutije:</label>
                            <input type="number" id="inputNumber" name="inputNumber" class="form-control" required>
                        </div>
                        <?php  
                            if (isset($_GET['message'])) {
                            $message = urldecode($_GET['message']);
                            echo "<div class='alert alert-danger' role='alert'>$message</div>";
                        }
                        ?>
                        <div style="display:flex; justify-content:center"><button type="submit" name="submit" class="btn btn-primary w-100">Izvještaj</button></div><br>
                    </form>
                    <div><a href="index.php"><button class="btn btn-primary w-100" style="display:block; margin: auto; ">Nazad</button></a></div>
                </div>
            </div>
        </div>
</div>

<script>
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('message')) {
            window.history.replaceState({}, document.title, window.location.pathname);
        }
    </script>
</body>
</html>

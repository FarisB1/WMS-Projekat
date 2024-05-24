<?php
include "conn.php";

$sql = "SHOW TABLES";
$result = $mysqli->query($sql);

$tables = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_row()) {
        $tables[] = $row[0];
    }
}

$mysqli->close();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width" />
    <title>PRETRAGA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
<div class="d-flex">
        <?php include 'sidebar.php';?>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-6 offset-md-3 mt-5">
                    <form method="POST" action="pretraga_logika.php">
                        <div class="form-group w" style="margin-top: 70px">
                            <center><h1 for="broj">Pretraga</h1></center>
                            <br />
                            <input type="text" class="form-control w-100"  name="search"
                                placeholder="Pretraga...">

                            <br />
                            <center><button class="btn btn-primary w-100" name="dodaj" id="dodaj">TRAŽI</button></center>
                            <br />
                        </div>
                    </form>
                    <a href="index.php">
                        <center><button class="btn btn-primary w-100" name="nazad">NAZAD</button>
                        </center>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
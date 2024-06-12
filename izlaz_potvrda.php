<?php
session_start();
include "conn.php";
$id_dijela=$_POST['idDijela'];
$kolicina = $_POST['zaliheInput'];

$sql_kolicina = "SELECT * FROM artikli WHERE id = '$id_dijela'";
$result_kolicina = $mysqli->query($sql_kolicina);
$row_kolicina = $result_kolicina->fetch_assoc();
if ($result_kolicina->num_rows > 0) {
} else {
    header("Location: izlazrobe.php?message=Nema+dijela+sa+tim+ID");
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WMS - Warehouse Management System</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex">
        <?php include 'sidebar.php'; ?>
        <?php 
        if (isset($_POST['spremi'])) {
        ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 offset-md-4 mt-5">
                    <h1 style="text-align: center;"class="mt-5">Izlaz robe</h1>
                    <form method="POST" enctype="multipart/form-data" action="izlaz_logika.php">
                        <div class="form-group">
                            <label for="idDijela">ID dijela:</label>
                            <input type="text" class="form-control" id="idDijela" name="idDijela" value="<?php echo $id_dijela;?>" placeholder="Unesite ID dijela" style="padding:6px 12px;">
                        </div>
                            <div class="form-group mt-3">
                                <label for="lokacija">Kolicina:</label>
                                <input type="number" class="form-control" value="<?php echo $kolicina;?>" id="kolicina" name="kolicina" placeholder="Unesite ID lokaciju" style="padding:6px 12px;">
                            </div>
                        <div class="form-group">
                            <label for="trazio">Ko je tražio artikal:</label>
                            <select class="form-control" id="trazio" name="trazio" style="padding:6px 12px;">
                                <option value="">Odaberite opciju</option>
                                <?php 
                                include 'conn.php';
                                $sql = "SELECT ime, id, uloga FROM korisnici";
                                $result = $mysqli->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                    if ($row['uloga'] == 'radnik') {    
                                    echo "<option value='" . $row['id'] . "'>" . $row['ime'] . "</option>";
                                    }
                                }
                                ?>
                            </select>

                            <div class="form-group mt-3">
                                <label for="lokacija">Lokacija:</label>
                                <input type="text" class="form-control" id="lokacija" name="lokacija" placeholder="Unesite lokaciju" style="padding:6px 12px;">
                            </div>
                        </div>
                        <div class="form-group d-flex justify-content-center align-items-center">
                            <button type="submit" class="btn btn-primary w-100" id="spremi" name="spremi">Spremi</button>
                        </div>
                    </form>
                    <div class="form-group d-flex justify-content-center align-items-center">
                        <a href="index.php" class="btn btn-primary w-100">Nazad</a>
                    </div> 
                </div>
            </div>
        </div>
    </div>

    <?php } ?>
    <script> 
        function displayMessageFromURL() {
            const urlParams = new URLSearchParams(window.location.search);
            const message = urlParams.get("message");
            
            if (message) {
                alert(message);
            }
        }

        displayMessageFromURL();
    </script>
</body>
</html>

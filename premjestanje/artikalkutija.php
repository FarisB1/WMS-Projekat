<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Bootstrap Page</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex">
        <?php include 'sidebar.php'; ?>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 offset-md-4 mt-5">
                    <h1 style="text-align: center;" class="mt-5">Artikal - Kutija</h1>
                    <form method="POST" enctype="multipart/form-data" action="logika/artikalkutija.php">
                        <div class="form-group">
                            <label for="idDijela">ID dijela:</label>
                            <select class="form-control" id="idDijela" name="idDijela" style="padding:6px 12px;">
                                <option value="">Odaberite opciju</option>
                                <?php 
                                    include '../conn.php';
                                    $sql = "SELECT id, ime_artikla, zalihe FROM artikli";
                                    $result = $mysqli->query($sql);
                                    while ($row = $result->fetch_assoc()) {
                                        $zalihe = $row['zalihe'];
                                        $ime = $row['ime_artikla'];
                                        if ($zalihe > 0) {
                                            echo "<option value='" . $row['id'] . "' data-zalihe='" . $zalihe . "'>ID: " . $row['id'] . " | " . $ime . " (" . $zalihe . ") </option>";
                                        }
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="form-group mt-3" id="zaliheGroup" style="display: none;">
                            <label for="zaliheInput">Količina:</label>
                            <input type="number" class="form-control" id="zaliheInput" name="zaliheInput" min="1" style="padding:6px 12px;">
                        </div>

                        <div class="form-group mt-3" id="kapacitet">
                            <label for="kutija">Kutija:</label>
                            <select class="form-control" id="kutija" name="kutija" style="padding:6px 12px;" required>
                                <option value="">Odaberite opciju</option>
                                <?php 
                                    $sql = "SELECT id, kolicina, kapacitet FROM kutije";
                                    $result = $mysqli->query($sql);
                                    while ($row = $result->fetch_assoc()) {
                                        $kolicinaKutije = $row['kolicina'];
                                        $kapacitetKutije = $row['kapacitet'];
                                        $rezultat = intval($kapacitetKutije - $kolicinaKutije);
                                        if ($kolicinaKutije < $kapacitetKutije) {
                                            echo "<option value='" . $row['id'] . "'>ID: " . $row['id'] . " (" . intval($kapacitetKutije - $kolicinaKutije) . ")</option>";
                                        }
                                    }
                                ?>
                            </select>
                        </div>

                        <?php if (isset($_GET['message'])): ?>
                            <div class="alert alert-danger mt-2"><?php echo urldecode($_GET['message']); ?></div>
                        <?php endif; ?>

                        <div class="form-group d-flex justify-content-center align-items-center">
                            <button type="submit" class="btn btn-primary w-100" id="spremi" name="spremi">Spremi</button>
                        </div>
                    </form>
                    <div class="form-group d-flex justify-content-center align-items-center">
                        <a href="../index.php" class="btn btn-primary w-100">Nazad</a>
                    </div> 
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('idDijela').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var zalihe = selectedOption.getAttribute('data-zalihe');
            
            if (zalihe>20){
                zalihe=20;
            }
            
            if (zalihe) {
                document.getElementById('zaliheInput').max = zalihe;
                document.getElementById('zaliheGroup').style.display = 'block';
            } else {
                document.getElementById('zaliheGroup').style.display = 'none';
            }
        });

        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('message')) {
            window.history.replaceState({}, document.title, window.location.pathname);
        }
    </script>
</body>
</html>

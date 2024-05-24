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
        <?php include 'sidebar.php';?>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 offset-md-4 mt-5">
                    <h1 style="text-align: center;"class="mt-5">Paleta - Regal</h1>
                    <form method="POST" enctype="multipart/form-data" action="logika/paletaregal.php">
                    <div class="form-group mt-3">
                            <label for="paleta">Paleta:</label>
                            <select class="form-control" id="paleta" name="paleta" style="padding:6px 12px;" required>
                                <option value="">Odaberite opciju</option>
                                <?php 
                                include '../conn.php';
                                $sql = "SELECT id,kolicina,kapacitet FROM palete";
                                $result = $mysqli->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                    $kolicinaPalete = $row['kolicina'];
                                    $kapacitetPalete = $row['kapacitet'];
                                    if ($kolicinaPalete < $kapacitetPalete) {
                                        echo "<option value='" . $row['id'] . "'> ID: " . $row['id'] . " (". intval($kapacitetPalete - $kolicinaPalete) . ")</option>";
                                    }
                                }
                                ?>
                            </select>
                        <div class="form-group mt-3">
                            <label for="paleta">Regal:</label>
                            <select class="form-control" id="regal" name="regal" style="padding:6px 12px;" required>
                                <option value="">Odaberite opciju</option>
                                <?php 
                                    include '../conn.php';
                                    $sql = "SELECT id,kolicina,kapacitet FROM regali";
                                    $result = $mysqli->query($sql);
                                    while ($row = $result->fetch_assoc()) {
                                        $kolicinaPalete = $row['kolicina'];
                                        $kapacitetPalete = $row['kapacitet'];
                                        if ($kolicinaPalete < $kapacitetPalete) {
                                            echo "<option value='" . $row['id'] . "'> ID: " . $row['id'] . " (". intval($kapacitetPalete - $kolicinaPalete) . ")</option>";
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <?php if (isset($_GET['message'])) {
                                    $message = urldecode($_GET['message']);
                                    echo "<div class='alert alert-danger mt-2'>{$message}</div>";
                                } ?>
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
        function displayMessageFromURL() {
            const urlParams = new URLSearchParams(window.location.search);
            const message = urlParams.get("message");
            
            if (message) {
                alert(message);
            }
        }
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('message')) {
            window.history.replaceState({}, document.title, window.location.pathname);
        }
    </script>
</body>
</html>

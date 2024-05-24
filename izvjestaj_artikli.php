<?php
include 'conn.php';

$tableName = "artikli";

$search = "";
if (isset($_POST['search'])) {
    $search = mysqli_real_escape_string($mysqli, $_POST['search']);
    $sql = "SELECT * FROM $tableName WHERE ime_artikla LIKE '%$search%' OR id LIKE '%$search%'";
} else {
    $sql = "SELECT * FROM $tableName";
}

$result = mysqli_query($mysqli, $sql);
?>

<!DOCTYPE html>
<html>

<head>
    <title>WMS - Warehouse Management System</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <style>
        .td{
            vertical-align: middle!important;
        }
    </style>
</head>

<body>
    <div class="d-flex">
        <?php include 'sidebar.php'; ?>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8 offset-md-2" style="margin-top: 7rem !important;">
                    <h1 style="text-align: center;" class="mb-5">Izjveštaj artikala</h1>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <a href="index.php"><button class="btn btn-primary">Nazad</button></a>
                        <form method="POST" class="w-100">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Pretraga" name="search" value="<?php echo $search; ?>" style="height: 40px;">
                                <button type="submit" class="btn btn-primary">Pretraži</button>
                            </div>
                        </form>
                    </div>
                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Ime artikla</th>
                                <th>ID kutije</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = $result->fetch_assoc()) {
                                $kutija_id = "Nije u kutiji";
                                
                                $sql_kutija = "SELECT * FROM premjestanje WHERE id_produkta = {$row['id']}";
                                $result_kutija = mysqli_query($mysqli, $sql_kutija);
                                $kutija = $result_kutija->fetch_assoc();
                                if (isset($kutija["id_kutije"])) {
                                    $kutija_id = $kutija["id_kutije"];
                                }
                                echo "<tr>";
                                echo "<td style='vertical-align: middle;'><b>{$row['id']}</b></td>";
                                echo "<td style='vertical-align: middle;'><b>{$row['ime_artikla']}</b></td>";
                                echo "<td style='vertical-align: middle;'><b>{$kutija_id}</b></td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

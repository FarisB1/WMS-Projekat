<?php
include 'conn.php';

$tableName = "korisnici";

$search = "";
// Check if a search query is submitted
if (isset($_POST['search'])) {
    $search = mysqli_real_escape_string($mysqli, $_POST['search']);
    $sql = "SELECT * FROM $tableName WHERE ime LIKE '%$search%' OR uloga LIKE '%$search%'";
} else {
    // Fetch all data from the database if no search query is provided
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
                    <h1 style="text-align: center;" class="mb-5">Korisnici</h1>
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
                                <th>Ime korisnika</th>
                                <th>Uloga</th>
                                <th>Akcija</th> <!-- New column for actions -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td style='vertical-align: middle;'><b>{$row['id']}</b></td>";
                                echo "<td style='vertical-align: middle;'><b>{$row['ime']}</b></td>";
                                echo "<td style='vertical-align: middle;'><b>{$row['uloga']}</b></td>";
                                echo "<td style='width: 150px; vertical-align: middle;'> <a href='uredi_korisnika.php?id={$row['id']}'><button class = 'btn mx-auto' style='background-color: #343a40; color: white; '> <i class='bi bi-pencil-square'></i> Uredi </button></a></td>"; // Edit button with link to edit page
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

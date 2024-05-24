<?php
include 'conn.php';

$tableName = "historija";

$search = "";
if (isset($_POST['search'])) {
    $search = mysqli_real_escape_string($mysqli, $_POST['search']);
    $sql = "SELECT * FROM $tableName WHERE korisnik LIKE '%$search%' OR akcija LIKE '%$search%' OR vrijeme LIKE '%$search%'";
} else {
    $sql = "SELECT korisnik, akcija, vrijeme FROM $tableName ORDER BY vrijeme DESC";
}

$result = mysqli_query($mysqli, $sql);

$editRecordID = null;
?>

<!DOCTYPE html>
<html>

<head>
    <title>WMS - AutoTarget - Historija</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>

<body>
    <div class="d-flex">
        <?php include 'sidebar.php'; ?>
        <div class="container-fluid">
            <div class="row justify-content-center">
                
                <div class="col-md-8 offset-md-2" style="margin-top: 7rem !important;">
                
                <h1 style="text-align: center;"class="mb-5">Historija</h1>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        
                        <a href="index.php"><button class="btn btn-primary">Nazad</button></a>
                        <form method="POST" class="w-100">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Pretraga" name="search" value="<?php echo $search; ?>"  style="height: 40px;">
                                <button type="submit" class="btn btn-primary">Pretraži</button>
                            </div>
                        </form>
                    </div>
                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>Korisnik</th>
                                <th>Akcija</th>
                                <th>Vrijeme</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>{$row['korisnik']}</td>";
                                echo "<td>{$row['akcija']}</td>";
                                echo "<td>{$row['vrijeme']}</td>";
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

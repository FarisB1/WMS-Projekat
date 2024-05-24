<?php
include 'conn.php';

$tableName = "korisnici";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM $tableName WHERE id = $id";
    $result = mysqli_query($mysqli, $sql);
    $user = $result->fetch_assoc();

    if (isset($_POST['update'])) {
        $ime = mysqli_real_escape_string($mysqli, $_POST['ime']);
        $uloga = mysqli_real_escape_string($mysqli, $_POST['uloga']);

        $sql = "UPDATE $tableName SET ime='$ime', uloga='$uloga' WHERE id=$id";
        if (mysqli_query($mysqli, $sql)) {
            header("Location: korisnici.php");
        } else {
            echo "Error updating record: " . mysqli_error($mysqli);
        }
    }
} else {
    header("Location: korisnici.php");
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit User</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
</head>

<body>
<div class="d-flex">
        <?php include 'sidebar.php'; ?>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8 offset-md-2" style="margin-top: 7rem !important;">
                    <h2 style="text-align:center;">Uredi korisnika</h2>
                    <form method="POST">
                        <div class="form-group">
                            <label for="ime">Ime korisnika:</label>
                            <input type="text" class="form-control" id="ime" name="ime" value="<?php echo $user['ime']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="uloga">Uloga:</label>
                            <input type="text" class="form-control" id="uloga" name="uloga" value="<?php echo $user['uloga']; ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary mx-auto" name="update">Promijeni</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

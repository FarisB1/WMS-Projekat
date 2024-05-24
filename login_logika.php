<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dio";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$korisnicko_ime = $_POST['korisnicko_ime'];
$sifra = $_POST['sifra'];

$sql = "SELECT id FROM korisnici WHERE korisnicko_ime='$korisnicko_ime' AND sifra='$sifra'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION["user_id"] = $row["id"];
    header("Location: index.php");
} else { 
    $message = urlencode('Neuspješan login. Provjerite korisničko ime ili šifru!');
    echo "<script>
        window.location.href = 'login.php?message=$message&uspjesno=false';
    </script>";
}

$conn->close();
?>
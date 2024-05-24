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


$ime = $_GET['ime'];
$email = $_GET['email'];
$korisnicko_ime = $_GET['korisnicko_ime'];
$sifra = $_GET['sifra'];

$sql_check = "SELECT * FROM korisnici WHERE korisnicko_ime = '$korisnicko_ime' OR email = '$email'";
$result_check = $conn->query($sql_check);

if ($result_check->num_rows > 0) {
    $message = urlencode('Korisničko ime ili email već postoje. Molimo odaberite drugo.');
    echo "<script>
        window.location.href = 'registracija.php?message=$message';
    </script>";
    exit();
}

$sql = "INSERT INTO korisnici (ime, email, korisnicko_ime, sifra) VALUES ('$ime', '$email', '$korisnicko_ime', '$sifra')";

$result = $conn->query($sql);

if ($result === TRUE) {
    $message = urlencode('Uspješno ste se registrirali. Sada se možete prijaviti!');
    echo "<script>
        window.location.href = 'login.php?message=$message';
    </script>";
} else { 
    $message = urlencode('Neuspješna registracija. Pokušajte ponovno!');
    echo "<script>
        window.location.href = 'registracija.php?message=$message';
    </script>";
}
$conn->close();
?>
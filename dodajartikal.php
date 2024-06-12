<?php
session_start();
include 'conn.php';

if (isset($_POST['dodaj']) && isset($_POST['ime_artikla'])) {
    $ime_artikla = $_POST['ime_artikla'];
    $zalihe = $_POST['zalihe'];

    $check_sql = "SELECT * FROM artikli WHERE ime_artikla = '$ime_artikla'";
    $result = $mysqli->query($check_sql);

    if ($result->num_rows > 0) {
        $sql = "UPDATE artikli SET zalihe = zalihe + $zalihe WHERE ime_artikla = '$ime_artikla'";
    } else {
        $sql = "INSERT INTO artikli (ime_artikla, zalihe) VALUES ('$ime_artikla', $zalihe)";
    }

    if ($mysqli->query($sql) === TRUE) {
        $last_id = $mysqli->insert_id;
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }
    $korisnik = $_SESSION['user_id'];
    $korisnik_sql = "SELECT ime, korisnicko_ime FROM korisnici WHERE id = '$korisnik'";

    $result = mysqli_query($mysqli, $korisnik_sql);
    
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        
        $ime = $row['ime'];
        $korisnicko_ime = $row['korisnicko_ime'];
    }
    $sql_2 = "INSERT INTO historija (korisnik, akcija, vrijeme) VAlUES ('$ime', '$ime je dodao artikal $ime_artikla sa zalihama $zalihe', NOW())";
    if ($mysqli->query($sql_2) === TRUE) {
        
    } else {
        echo "Error: " . $sql_2 . "<br>" . $mysqli->error;
    }

    $mysqli->close();
    header("Location: artikal.php");
    exit();
    }

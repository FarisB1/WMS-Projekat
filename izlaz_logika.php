<?php 
session_start();
include "conn.php";

$korisnik = $_SESSION["user_id"];

if (isset($_POST['spremi'])) {
$id_dijela=$_POST['idDijela'];
$trazio = $_POST['trazio'];
$lokacija =$_POST['lokacija'];

    $sql_korisnik = "SELECT ime FROM korisnici WHERE id = '$trazio'";
    $result_korisnik = $mysqli->query($sql_korisnik);
    $row_korisnik = $result_korisnik->fetch_assoc();
    $korisnik_ime = $row_korisnik['ime'];

    $sql_user = "SELECT * FROM korisnici WHERE id = '$korisnik'";
    $result_user = $mysqli->query($sql_user);
    $row_user = $result_user->fetch_assoc();
    $user_ime = $row_user['ime'];

    $sql_artikal = "SELECT * FROM artikli WHERE id = '$id_dijela'";
    $result_artikal = $mysqli->query($sql_artikal);
    $row_artikal = $result_artikal->fetch_assoc();
    $ime_artikla = $row_artikal['ime_artikla'];

    
    $sql = "INSERT INTO narudzbe (id_produkta, ime_produkta, id_korisnika, lokacija) VALUES ('$id_dijela','$ime_artikla','$trazio','$lokacija')";

    if ($mysqli->query($sql) !== TRUE) {
    } else
    {
        $sql2 = "DELETE FROM artikli WHERE id = '$id_dijela'";
        if ($mysqli->query($sql2) !== TRUE) {
        }

        $sql_premjestanje = "SELECT * FROM premjestanje WHERE id_produkta = '$id_dijela'";
        $result_premjestanje = $mysqli->query($sql_premjestanje);
        $row_premjestanje = $result_premjestanje->fetch_assoc();
        $kutija = $row_premjestanje['id_kutije'];

        $sql_kutije = "UPDATE kutije SET kolicina = kolicina - 1 WHERE id = '$kutija'";
        if ($mysqli->query($sql_kutije) !== TRUE) {
        }

        $sql_premjestanje = "DELETE FROM premjestanje WHERE id_produkta = '$id_dijela'";
        if ($mysqli->query($sql_premjestanje) !== TRUE) {
        }else{
            
        }
        
    }

    $sql_other_table = "INSERT INTO historija (korisnik, id_artikla, akcija) VALUES ('$user_ime', '$id_dijela', 'Izlaz dijela: $ime_artikla - $korisnik_ime - $lokacija')";
    if ($mysqli->query($sql_other_table) !== TRUE) {
    }

    header("Location: izlazrobe.php");
}
?>
<?php 
session_start();
include "conn.php";

$korisnik = $_SESSION["user_id"];

if (isset($_POST['spremi'])) {
$id_dijela=$_POST['idDijela'];
$trazio = $_POST['trazio'];
$lokacija =$_POST['lokacija'];
$kolicina = $_POST['kolicina'];

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

    $sql_kolicina = "SELECT kolicina FROM premjestanje WHERE id_produkta = '$id_dijela'";
    $result_kolicina = $mysqli->query($sql_kolicina);
    $row_kolicina = $result_kolicina->fetch_assoc();
    $kolicina_premjestanje = $row_kolicina['kolicina'];
    
    $sql = "INSERT INTO narudzbe (id_produkta, ime_produkta, id_korisnika,kolicina, lokacija) VALUES ('$id_dijela','$ime_artikla','$trazio','$kolicina','$lokacija')";

    if ($mysqli->query($sql) !== TRUE) {
    } else
    {
        $sql_premjestanje = "SELECT * FROM premjestanje WHERE id_produkta = '$id_dijela'";
        $result_premjestanje = $mysqli->query($sql_premjestanje);
        $row_premjestanje = $result_premjestanje->fetch_assoc();
        $kutija = $row_premjestanje['id_kutije'];

        $sql_kutije = "UPDATE kutije SET kolicina = kolicina - $kolicina WHERE id = '$kutija'";
        if ($mysqli->query($sql_kutije) !== TRUE) {
        }

        if ($kolicina_premjestanje > $kolicina) {
            $sql_premjestanje = "UPDATE premjestanje SET kolicina = kolicina - '$kolicina' WHERE id_produkta = '$id_dijela' AND kolicina = '$kolicina_premjestanje' LIMIT 1";
            if ($mysqli->query($sql_premjestanje) !== TRUE) {
            }
        } else if ($kolicina_premjestanje == $kolicina){
            $sql_premjestanje = "DELETE FROM premjestanje WHERE id_produkta = '$id_dijela' AND kolicina = '$kolicina_premjestanje' LIMIT 1";
            if ($mysqli->query($sql_premjestanje) !== TRUE) {
            }
        }
    }

    $sql_other_table = "INSERT INTO historija (korisnik, akcija) VALUES ('$user_ime', 'Izlaz dijela: $ime_artikla - $korisnik_ime - $lokacija')";
    if ($mysqli->query($sql_other_table) !== TRUE) {
    }

    $sql_delete = "DELETE FROM premjestanje WHERE kolicina = 0";
    if ($mysqli->query($sql_delete) !== TRUE) {
    } 

    header("Location: izlazrobe.php");
}
?>
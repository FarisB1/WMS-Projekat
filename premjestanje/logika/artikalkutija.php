<?php
session_start();
include_once '../../conn.php';
$korisnik = $_SESSION['user_id'];
if (isset($_POST['spremi'])) {
    $id_artikla = $_POST['idDijela'];
    $kutija = $_POST['kutija'];
    $zalihe = $_POST['zaliheInput'];

    $sql_kolicina = "SELECT * FROM artikli WHERE id = '$id_artikla'";
    $result_kolicina = $mysqli->query($sql_kolicina);
    $row_kolicina = $result_kolicina->fetch_assoc();
    if ($result_kolicina->num_rows <= 0) {
        header("Location: ../artikalkutija.php?message=Nema+dijela+sa+tim+ID");
        exit();
    }

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $query = "SELECT kolicina, kapacitet FROM kutije WHERE id = $kutija";
    $result = $mysqli->query($query);

    if ($result === false) {
    } elseif ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $kolicinaKutije = $row['kolicina'];
        $kapacitetKutije = $row['kapacitet'];

        if ($kolicinaKutije> $kapacitetKutije) {
            header("Location: ../artikalkutija.php?message=Kutija+je+puna");
            exit();
        }

        $sql_artikal = "SELECT * FROM artikli WHERE id = $id_artikla";
        $result_artikal = $mysqli->query($sql_artikal);
        $row_artikal = $result_artikal->fetch_assoc();
        $ime_artikla = $row_artikal['ime_artikla'];

        $sql_prem = "SELECT * FROM premjestanje WHERE id_kutije = $kutija";
        $result_prem = $mysqli->query($sql_prem);
        $row_prem = $result_prem->fetch_assoc();
        
        if (isset($row_prem['id_palete'])) {
            $paleta = intval($row_prem['id_palete']);
        } else {
            $paleta = 0;
        }
        
        if (isset($row_prem['id_regala'])) {
            $regal = intval($row_prem['id_regala']);
        } else {
            $regal = 0;
        }
        
        if (isset($row_prem['id_hale'])) {
            $hala = intval($row_prem['id_hale']);
        } else {
            $hala = 0;
        }
        
        $stara_sql = "SELECT * FROM premjestanje WHERE id_produkta = $id_artikla";
        $result_stara = $mysqli->query($stara_sql);
        $row_stara = $result_stara->fetch_assoc();
        if (isset($row_stara['id_kutije']))
        {
            $stara_kutija = intval($row_stara['id_kutije']);
        } else {
            $stara_kutija = 0;
        }
        $sql_kut = "SELECT * FROM kutije WHERE id = $kutija";
        $result_kut = $mysqli->query($sql_kut);
        $row_kut = $result_kut->fetch_assoc();
        $stara_paleta = intval($row_kut['id_palete']);
        $stara_hala = intval($row_kut['id_hale']);
        $stara_regal = intval($row_kut['id_regala']);

        $sql = "INSERT INTO premjestanje (id_produkta, id_kutije, id_palete, id_regala, id_hale, kolicina,vrijeme) 
        VALUES ('$id_artikla', '$kutija', '$paleta', '$regal', '$hala', '$zalihe' ,NOW())";

        if ($mysqli->query($sql) === TRUE) {
            if ($mysqli->affected_rows > 0) {
                $sql2 = "UPDATE kutije SET kolicina = kolicina + $zalihe WHERE id = $kutija";
                $mysqli->query($sql2);
                
                $sql5= "UPDATE artikli SET zalihe = zalihe - $zalihe WHERE id = $id_artikla";
                $mysqli->query($sql5);
                
                $sql_korisnik = "SELECT * FROM korisnici WHERE id = $korisnik";
                $result_korisnik = $mysqli->query($sql_korisnik);
                $row_korisnik = $result_korisnik->fetch_assoc();
                $ime_korisnika = $row_korisnik['ime'];

                $sql3 = "INSERT INTO historija (korisnik, akcija, vrijeme) VALUES ('$ime_korisnika', '$ime_korisnika premjestio artikal $ime_artikla u kutiju: $kutija.', NOW())";
                $mysqli->query($sql3);

                
                header("Location: ../artikalkutija.php?message=Uspješno+sačuvani+artikli+u+kutiju+$kutija");
            } else {
                header("Location: ../artikalkutija.php");
            }
        } else {
        }
    } else {
        header("Location: ../artikalkutija.php?message=Nema+kutije+sa+tim+ID");
    }

    $mysqli->close();
}
?>

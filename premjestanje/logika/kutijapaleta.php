<?php
session_start();
include_once '../../conn.php';

$korisnik = $_SESSION['user_id'];

if (isset($_POST['spremi'])) {
    $idKutije = $_POST['idKutije'];
    $idPalete = $_POST['paleta'];

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $query = "SELECT kolicina, kapacitet FROM palete WHERE id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $idPalete);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result === false) {
        echo "Query error: " . $mysqli->error;
    } elseif ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $kolicinaPalete = $row['kolicina'];
        $kapacitetPalete = $row['kapacitet'];

        if ($kolicinaPalete >= $kapacitetPalete) {
            header("Location: ../kutijapaleta.php?message=Kutija+je+puna");
            exit();
        }

        $sql_kutije = "SELECT * FROM kutije WHERE id = ?";
        $stmt_kutije = $mysqli->prepare($sql_kutije);
        $stmt_kutije->bind_param("i", $idKutije);
        $stmt_kutije->execute();
        $result_kutije = $stmt_kutije->get_result();
        $row_kutije = $result_kutije->fetch_assoc();

        $sql_artikli = "SELECT * FROM premjestanje WHERE id_kutije = ?";
        $stmt_artikli = $mysqli->prepare($sql_artikli);
        $stmt_artikli->bind_param("i", $idKutije);
        $stmt_artikli->execute();
        $result_artikli = $stmt_artikli->get_result();
        $row = $result_artikli->fetch_assoc();
        if (isset($row['id_palete'])){
            $stara_paleta = $row['id_palete'];
        } else {
            $stara_paleta = 0;
        }
        
        if (isset($row['id_regala'])){
            $regal = $row['id_regala'];
        } else {
            $regal = 0;
        }
        
        if (isset($row['id_hale'])){
            $hala = $row['id_hale'];
        } else {
            $hala = 0;
        }

        if ($result_artikli->num_rows > 0) {
            $sql_update = "UPDATE premjestanje SET id_palete = ?, id_regala = ?, id_hale = ? WHERE id_kutije = ?";
            $stmt_update = $mysqli->prepare($sql_update);
            $stmt_update->bind_param("iiii", $idPalete,$regal,$hala, $idKutije);
            

            if ($stmt_update->execute()) {
                if ($stmt_update->affected_rows > 0) {
                    $sql2 = "UPDATE palete SET kolicina = kolicina + 1 WHERE id = ?";
                    $stmt2 = $mysqli->prepare($sql2);
                    $stmt2->bind_param("i", $idPalete);
                    $stmt2->execute();

                    $sql4 = "UPDATE palete SET kolicina = kolicina - 1 WHERE id = $stara_paleta";
                    $mysqli->query($sql4);
                    
                    $sql5 = "UPDATE kutije SET id_palete = ? WHERE id = ?";
                    $stmt5 = $mysqli->prepare($sql5);
                    $stmt5->bind_param("ii", $idPalete, $idKutije);
                    $stmt5->execute();

                    $sql_korisnik = "SELECT * FROM korisnici WHERE id = ?";
                    $stmt_korisnik = $mysqli->prepare($sql_korisnik);
                    $stmt_korisnik->bind_param("i", $korisnik);
                    $stmt_korisnik->execute();
                    $result_korisnik = $stmt_korisnik->get_result();
                    $row_korisnik = $result_korisnik->fetch_assoc();
                    $ime_korisnika = $row_korisnik['ime'];

                    while ($row_artikal = $result_artikli->fetch_assoc()) {
                        $id_artikla = $row_artikal['id_produkta'];
                        $sql_artikal = "SELECT * FROM artikli WHERE id = ?";
                        $stmt_artikal = $mysqli->prepare($sql_artikal);
                        $stmt_artikal->bind_param("i", $id_artikla);
                        $stmt_artikal->execute();
                        $result_artikal = $stmt_artikal->get_result();
                        $row_artikal = $result_artikal->fetch_assoc();
                        $ime_artikla = $row_artikal['ime_artikla'];

                        $sql3 = "INSERT INTO historija (id_artikla, korisnik, akcija, vrijeme) VALUES (?, ?, ?, NOW())";
                        $stmt3 = $mysqli->prepare($sql3);
                        $akcija = "$ime_korisnika premjestio artikal $ime_artikla u paletu: $idPalete.";
                        $stmt3->bind_param("iss", $id_artikla, $ime_korisnika, $akcija);
                        $stmt3->execute();

                    }

                    header("Location: ../kutijapaleta.php?message=Uspješno+sačuvani+artikli+u+paletu+$idPalete");
                } else {
                    header("Location: ../kutijapaleta.php");
                }
            } else {
            }
        } else {
            header("Location: ../kutijapaleta.php?message=Kutija+ne+postoji+ili+nema+artikala+za+premještanje");
        }
    } else {
        header("Location: ../kutijapaleta.php?message=Nema+palete+sa+tim+ID");
    }

    $mysqli->close();
}
?>

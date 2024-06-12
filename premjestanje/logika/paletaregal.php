<?php
session_start();
include_once '../../conn.php';

$korisnik = $_SESSION['user_id'];

if (isset($_POST['spremi'])) {
    $idPalete = $_POST['paleta'];
    $idRegala = $_POST['regal'];

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $query = "SELECT id_hale,kolicina, kapacitet FROM regali WHERE id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $idRegala);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result === false) {
        echo "Query error: " . $mysqli->error;
    } elseif ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $kolicinaRegala = $row['kolicina'];
        $kapacitetRegala = $row['kapacitet'];
        $id_hale = $row['id_hale'];
        if ($kolicinaRegala >= $kapacitetRegala) {
            header("Location: ../paletaregal.php?message=Regal+je+pun");
            exit();
        }

        $sql_artikli = "SELECT * FROM premjestanje WHERE id_palete = ?";
        $stmt_artikli = $mysqli->prepare($sql_artikli);
        $stmt_artikli->bind_param("i", $idPalete);
        $stmt_artikli->execute();
        $result_artikli = $stmt_artikli->get_result();

        $sql_paleta_update = "UPDATE palete SET id_hale = ?, id_regala = ? WHERE id = ?";
        $stmt_paleta_update = $mysqli->prepare($sql_paleta_update);
        $stmt_paleta_update->bind_param("iii", $id_hale,$idRegala, $idPalete);

        $niz = array();

        if ($result_artikli->num_rows > 0) {
            while ($row_artikal = $result_artikli->fetch_assoc()) {
                $id_artikla = $row_artikal['id_produkta'];
                $stara_hala = $row_artikal['id_hale'];
                $stari_regal = $row_artikal['id_regala'];
                $sql_update = "UPDATE premjestanje SET id_regala = ?, id_hale = ? WHERE id_palete = ?";
                $stmt_update = $mysqli->prepare($sql_update);
                $stmt_update->bind_param("iii", $idRegala, $id_hale, $idPalete);
                $stmt_update->execute();

                $niz[] = $id_artikla;
            }

            if ($stari_regal != null || $stari_regal != 0) {
                $sql_old_regal = "UPDATE regali SET kolicina = kolicina - 1 WHERE id = ?";
                $stmt_old_regal = $mysqli->prepare($sql_old_regal);
                $stmt_old_regal->bind_param("i", $stari_regal);
                $stmt_old_regal->execute();
            }
            $sql_new_regal = "UPDATE regali SET kolicina = kolicina + 1 WHERE id = ?";
            $stmt_new_regal = $mysqli->prepare($sql_new_regal);
            $stmt_new_regal->bind_param("i", $idRegala);
            $stmt_new_regal->execute();

            $sql_korisnik = "SELECT * FROM korisnici WHERE id = ?";
            $stmt_korisnik = $mysqli->prepare($sql_korisnik);
            $stmt_korisnik->bind_param("i", $korisnik);
            $stmt_korisnik->execute();
            $result_korisnik = $stmt_korisnik->get_result();
            $row_korisnik = $result_korisnik->fetch_assoc();
            $ime_korisnika = $row_korisnik['ime'];

            $id_art = 0;
            
            $niz_string = implode(",", $niz);  
            $sql3 = "INSERT INTO historija (korisnik, akcija, vrijeme) VALUES (?, ?, NOW())";
            $stmt3 = $mysqli->prepare($sql3);
            $akcija = "$ime_korisnika premjestio paletu $idPalete sa artiklima $niz_string u regal: $idRegala.";
            $stmt3->bind_param("iss", $ime_korisnika, $akcija);
            $stmt3->execute();

            header("Location: ../paletaregal.php?message=Uspješno+sačuvani+artikli+u+regal+$idRegala");
        } else {
            header("Location: ../paletaregal.php?message=Paleta+ne+postoji+ili+nema+artikala+za+premještanje");
        }
    } else {
        header("Location: ../paletaregal.php?message=Nema+regala+sa+tim+ID");
    }

    $mysqli->close();
}
?>

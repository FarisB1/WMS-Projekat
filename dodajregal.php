<?php
session_start();
include 'conn.php';

if (isset($_POST['dodaj']) && isset($_POST['broj'])) {
    $broj = $_POST['broj'];
    for ($i = 1; $i <= $broj; $i++) {
        $sql = "INSERT INTO regali () VALUES ()";

        if ($mysqli->query($sql) === TRUE) {
            $last_id = $mysqli->insert_id;
        } else {
            echo "Error: " . $sql . "<br>" . $mysqli->error;
            break;
        }
        $code = $last_id;
        
        $korisnik = $_SESSION['user_id'];
        $korisnik_sql = "SELECT ime, korisnicko_ime FROM korisnici WHERE id = '$korisnik'";
    
        $result = mysqli_query($mysqli, $korisnik_sql);
        
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            
            $ime = $row['ime'];
            $korisnicko_ime = $row['korisnicko_ime'];
        }
        $sql_2 = "INSERT INTO historija (korisnik, id_artikla, akcija, vrijeme) VAlUES ('$ime','$last_id', '$ime je dodao regal sa ID: $code', NOW())";
        if ($mysqli->query($sql_2) === TRUE) {
            
        } else {
            echo "Error: " . $sql_2 . "<br>" . $mysqli->error;
        }
        
    }
    header("Location: regal.php");
}

?>
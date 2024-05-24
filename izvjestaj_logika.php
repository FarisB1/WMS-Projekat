<?php
session_start();
include 'conn.php';


if (isset($_POST['submit'])) {
    $inputNumber = $_POST['inputNumber'];
    $sql2 = "SELECT * FROM premjestanje WHERE id_kutije = '$inputNumber'";
    $result2 = $mysqli->query($sql2);
    if ($result2->num_rows > 0) {
        echo "<div class='d-flex'>";
        include 'sidebar.php';
        $korisnik = $_SESSION["user_id"];
        echo "<div class='container-fluid'>";
        echo "<div class='row justify-content-center'>";
        echo "<div class='col-md-6 offset-md-3 mt-5'>";
        echo "<div class='container'>";
        echo "<h2 style='text-align: center;'>Artikli u kutiji " . $inputNumber . ":</h2>";
        echo "<table class='table table-striped'>";
        echo "<tr><th style='font-size:22px'>ID dijela</th> <th style='font-size:22px'>Ime Artikla</th></tr>";
        $suma = 0;
        while ($row2 = $result2->fetch_assoc()) {
            $ime_sql = $row2["id_produkta"];
            $sql3 = "SELECT * FROM artikli WHERE id = '$ime_sql'";
            $result3 = $mysqli->query($sql3);
            $row3 = $result3->fetch_assoc();
            $ime = $row3["ime_artikla"];
            $suma=$suma+1;
            echo "<tr>";
            echo "<td style='font-size: 20px'>" . $row2['id'] . "</td>";
            echo "<td style='font-size: 20px'>". $ime ."</td>";
            echo "</tr>";
        }
        echo "</table><br>";
        echo "<h2 style='text-align: center;'>Ukupno artikala u kutiji " . $inputNumber . " je: " . $suma . "</h2>";
        echo "<div style='display: flex; justify-content: center; '><a href='izvjestaj.php' class='btn btn-primary'>Nazad</a></div>";
        echo "</div></div></div></div></div>";
    } else {
        header("Location: izvjestaj.php?message=Kutija+je+prazna.");
    }
    } else {
        header("Location: izvjestaj.php?message=Nema+kutije+sa+tim+ID");
    }

?>

<?php
session_start();
include 'conn.php';

if (isset($_POST['submit'])) {
    $inputNumber = $_POST['inputNumber'];

    // Prepare and execute the first query to get the articles in the box
    $sql2 = "SELECT * FROM premjestanje WHERE id_kutije = ?";
    $stmt2 = $mysqli->prepare($sql2);
    $stmt2->bind_param("i", $inputNumber);
    $stmt2->execute();
    $result2 = $stmt2->get_result();

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
        echo "<tr><th style='font-size:22px'>Ime Artikla</th> <th style='font-size:22px'>Zalihe</th></tr>";
        
        $products = [];
        
        while ($row2 = $result2->fetch_assoc()) {
            $ime_sql = $row2["id_produkta"];
            
            // Prepare and execute the second query to get the article name
            $sql3 = "SELECT * FROM artikli WHERE id = ?";
            $stmt3 = $mysqli->prepare($sql3);
            $stmt3->bind_param("i", $ime_sql);
            $stmt3->execute();
            $result3 = $stmt3->get_result();
            $row3 = $result3->fetch_assoc();
            $ime = $row3["ime_artikla"];
            $zalihe = $row2["kolicina"];

            if (isset($products[$ime])) {
                $products[$ime] += $zalihe;
            } else {
                $products[$ime] = $zalihe;
            }
        }

        $suma = 0;
        $suma_zaliha = 0;
        foreach ($products as $ime => $zalihe) {
            echo "<tr>";
            echo "<td style='font-size: 20px'>" . $ime . "</td>";
            echo "<td style='font-size: 20px'>" . $zalihe . "</td>";
            echo "</tr>";
            $suma++;
            $suma_zaliha += $zalihe;
        }
        
        echo "</table><br>";
        echo "<h3 style='text-align: left;'>Artikala u kutiji " . $inputNumber . ": " . $suma . "<br><br>Zalihe: " . $suma_zaliha . "</h3>";
        echo "<div style='display: flex; justify-content: center; '><a href='izvjestaj.php' class='btn btn-primary'>Nazad</a></div>";
        echo "</div></div></div></div></div>";
    } else {
        header("Location: izvjestaj.php?message=Kutija+je+prazna.");
    }
} else {
    header("Location: izvjestaj.php?message=Nema+kutije+sa+tim+ID");
}
?>

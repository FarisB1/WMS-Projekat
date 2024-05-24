<?php
include 'conn.php';

if (isset($_POST['dodaj']) && isset($_POST['broj'])) {
    $broj = $_POST['broj'];

    for ($i = 1; $i <= $broj; $i++) {
        $sql = "INSERT INTO hale () VALUES ()";

        if ($mysqli->query($sql) === TRUE) {
            $last_id = $mysqli->insert_id;
        } else {
            echo "Error: " . $sql . "<br>" . $mysqli->error;
            break;
        }
    }
    header("Location: hala.php");
}

?>
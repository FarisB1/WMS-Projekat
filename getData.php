<?php 
include 'conn.php';

$sql = "SELECT ime_produkta AS ime_artikla, COUNT(*) as total_quantity 
FROM narudzbe 
GROUP BY ime_produkta
ORDER BY total_quantity DESC 
LIMIT 5";
$result = $mysqli->query($sql);

$popular_items = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $popular_items[] = $row;
    }
}

$mysqli->close();
echo json_encode($popular_items);
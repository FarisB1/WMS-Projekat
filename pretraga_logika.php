<?php
session_start();
include "conn.php";

function generateTableHeader($columns)
{
    $header = "<thead class='thead-dark'><tr>";
    foreach ($columns as $column) {
        $header .= "<th>" . ucfirst($column) . "</th>";
    }
    $header .= "</tr></thead>";
    return $header;
}

$searchTerm = $_POST['search'];

$sql = "SHOW TABLES";
$result = $mysqli->query($sql);

$tables = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_row()) {
        $tables[] = $row[0];
    }
}

$excludeTables = array('korisnici', 'palete', 'regali', 'kutije', 'hale', 'artikli','historija');
$searchResults = array();

foreach ($tables as $table) {
    if (in_array($table, $excludeTables)) {
        continue;
    }

    $query = "SELECT * FROM $table WHERE ";
    $columns = array();

    $columnsSql = "SHOW COLUMNS FROM $table";
    $columnsResult = $mysqli->query($columnsSql);

    while ($column = $columnsResult->fetch_assoc()) {
        $columns[] = $column['Field'];
    }

    $whereClauses = array();
    foreach ($columns as $column) {
        $whereClauses[] = "$column LIKE '%$searchTerm%'";
    }

    $query .= implode(" OR ", $whereClauses);

    $result = $mysqli->query($query);

    while ($row = $result->fetch_assoc()) {
        $searchResults[] = $row;
    }
}

$mysqli->close();
?>

<!DOCTYPE html>
<html>

<head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .table-responsive .table tfoot th, .table-responsive .table thead th {
            padding: 8px 15px;
            color: #ffffff!important;
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
        }
    </style>
</head>

<body>
    <div class="d-flex">
        <?php include 'sidebar.php'; ?>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-6 offset-md-3 mt-5"></div>
                <div class="col-2">
                    </div>
                    <div class="col-10 offset-md-2">
                        <center>
                            <h2 class="naslov mt-5">REZULTATI</h2>
                        </center>
                        <?php
                        if (count($searchResults) > 0) {
                            echo "<div class='table-responsive'>";
                            echo "<table class='table table-bordered'>";
                            $firstResult = reset($searchResults);
                            $columns = array_keys($firstResult);
                            echo generateTableHeader($columns);
                            echo "<tbody>";

                            foreach ($searchResults as $result) {
                                echo "<tr>";
                                foreach ($result as $value) {
                                    echo "<td>" . $value . "</td>";
                                }
                                echo "</tr>";
                            }

                            echo "</tbody></table>";
                            echo "</div>";
                            echo "<center><a href='pretraga.php' class='btn btn-primary mt-3 w-100'>NAZAD</a></center>";
                        } else {
                            echo "<div class='alert alert-info mt-4'>Nisu pronađeni rezultati.</div>";
                            echo "<center><a href='pretraga.php' class='btn btn-primary mt-3 w-100'>NAZAD</a></center>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

include 'conn.php';
$sql = "SELECT SUM(zalihe) FROM artikli";
$result = $mysqli->query($sql);
$row = $result->fetch_row();
$ukupan_br = $row[0];

$sql_2 = "SELECT COUNT(DISTINCT(ime_artikla)) AS razlicitih_artikala FROM artikli ";
$result_2 = $mysqli->query($sql_2);
$row_2 = $result_2->fetch_assoc();
$razlicitih_artikala = $row_2['razlicitih_artikala'];

$sql_3 = "SELECT COUNT(*) FROM kutije";
$result_3 = $mysqli->query($sql_3);
$row_3 = $result_3->fetch_row();
$ukupan_br_kutija = $row_3[0];

$sql_4 = "SELECT COUNT(*) FROM narudzbe";
$result_4 = $mysqli->query($sql_4);
$row_4 = $result_4->fetch_row();
$ukupan_br_narudzbi = $row_4[0];

$sql_5 = "SELECT COUNT(*) FROM palete";
$result_5 = $mysqli->query($sql_5);
$row_5 = $result_5->fetch_row();
$ukupan_br_paleta = $row_5[0];

$sql_6 = "SELECT COUNT(*) FROM regali";
$result_6 = $mysqli->query($sql_6);
$row_6 = $result_6->fetch_row();
$ukupan_br_regala = $row_6[0];

?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="manifest" href="manifest.json">
</head>

<body>
    <?php include 'sidebar.php';?>
    <!--! ================================================================ !-->
    <!--! [Start] Main Content !-->
    <!--! ================================================================ !-->
    <main class="nxl-container" style="top:0px!important;">
        <div class="nxl-content">
            <!-- [ page-header ] start -->
            <div class="page-header" style="height:80px!important">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Dashboard</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Početna</a></li>
                        <li class="breadcrumb-item">Analitika</li>
                    </ul>
                </div>
                <div class="page-header-right ms-auto">
                    <div class="page-header-right-items">
                    
                    </div>
                    <div class="d-md-none d-flex align-items-center">
                        <a href="javascript:void(0)" class="page-header-right-open-toggle">
                            <i class="feather-align-right fs-20"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- [ page-header ] end -->
            <!-- [ Main Content ] start -->
            <div class="main-content">
                <div class="row">
                    <!-- [Mini Card] start -->
                    <div class="col-12">
                        <div class="card stretch stretch-full">
                            <div class="card-body">
                                <div class="hstack justify-content-between mb-4 pb-">
                                    <div>
                                        <h5 class="mb-1">Izvještaj Artikala</h5>
                                        <span class="fs-12 text-muted">Broj artikala</span>
                                    </div>
                                    <a href="artikal.php" class="btn btn-primary">Dodaj Artikal</a>
                                </div>
                                <div class="row">
                                    <div class="col-xxl-2 col-lg-4 col-md-6">
                                        <div class="card stretch stretch-full border border-dashed border-gray-5">
                                            <div class="card-body rounded-3 text-center">
                                                <i class="bi bi-filter-square-fill fs-3 text-warning"></i>
                                                <div class="fs-4 fw-bolder text-dark mt-3 mb-1"><?php echo $ukupan_br;?></div>
                                                <p class="fs-12 fw-medium text-muted text-spacing-1 mb-0 text-truncate-1-line">Ukupno artikala</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xxl-2 col-lg-4 col-md-6">
                                        <div class="card stretch stretch-full border border-dashed border-gray-5">
                                            <div class="card-body rounded-3 text-center">
                                                <i class="bi bi-filter-square-fill fs-3 text-primary"></i>
                                                <div class="fs-4 fw-bolder text-dark mt-3 mb-1"><?php echo $razlicitih_artikala;?></div>
                                                <p class="fs-12 fw-medium text-muted text-spacing-1 mb-0 text-truncate-1-line">Različitih artikala</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-xxl-2 col-lg-4 col-md-6">
                                        <div class="card stretch stretch-full border border-dashed border-gray-5">
                                            <div class="card-body rounded-3 text-center">
                                                <i class="bi bi-box-seam-fill fs-3 text-success"></i>
                                                <div class="fs-4 fw-bolder text-dark mt-3 mb-1"><?php echo $ukupan_br_kutija;?></div>
                                                <p class="fs-12 fw-medium text-muted text-spacing-1 mb-0 text-truncate-1-line">Kutija</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-xxl-2 col-lg-4 col-md-6">
                                        <div class="card stretch stretch-full border border-dashed border-gray-5">
                                            <div class="card-body rounded-3 text-center">
                                                <i class="bi bi-layers-fill fs-3 text-teal"></i>
                                                <div class="fs-4 fw-bolder text-dark mt-3 mb-1"><?php echo $ukupan_br_paleta;?></div>
                                                <p class="fs-12 fw-medium text-muted text-spacing-1 mb-0 text-truncate-1-line">Paleta</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xxl-2 col-lg-4 col-md-6">
                                        <div class="card stretch stretch-full border border-dashed border-gray-5">
                                            <div class="card-body rounded-3 text-center">
                                                <i class="bi bi-stack fs-3 text-indigo"></i>
                                                <div class="fs-4 fw-bolder text-dark mt-3 mb-1"><?php echo $ukupan_br_regala?></div>
                                                <p class="fs-12 fw-medium text-muted text-spacing-1 mb-0 text-truncate-1-line">Regala</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xxl-2 col-lg-4 col-md-6">
                                        <div class="card stretch stretch-full border border-dashed border-gray-5">
                                            <div class="card-body rounded-3 text-center">
                                                <i class="bi bi-cart fs-3 text-danger"></i>
                                                <div class="fs-4 fw-bolder text-dark mt-3 mb-1"><?php echo $ukupan_br_narudzbi?></div>
                                                <p class="fs-12 fw-medium text-muted text-spacing-1 mb-0 text-truncate-1-line">Završenih narudžbi</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- [Mini Card] end -->
                    
                    <!-- [Najpopularniji artikli] start -->
                    <div class="col-xxl-8">
                        <div class="card stretch stretch-full">
                            <div class="card-header">
                                <h5 class="card-title">Najpopularniji artikli</h5>
                                <div class="card-header-action">
                                    <div class="card-header-btn">
                                        <div data-bs-toggle="tooltip" title="Refresh">
                                            <a href="javascript:void(0);" class="avatar-text avatar-xs bg-warning" data-bs-toggle="refresh"> </a>
                                        </div>
                                        <div data-bs-toggle="tooltip" title="Maximize/Minimize">
                                            <a href="javascript:void(0);" class="avatar-text avatar-xs bg-success" data-bs-toggle="expand"> </a>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="card-body custom-card-action">
                                <div id="grafik"></div>
                                
                            </div>
                        </div>
                    </div>
                    <!-- [Najpopularniji artikli] end -->
                    <?php

                        $sql = "SELECT id, id_produkta, id_korisnika, lokacija, kolicina, vrijeme FROM narudzbe ORDER BY id DESC LIMIT 5";
                        $result = $mysqli->query($sql);

                        if ($result->num_rows > 0) {
                            
                            echo '
                            <div class="col-xxl-4 col-lg-6">
                                <div class="card widget-tickets-content">
                                    <div class="card-header">
                                        <h5 class="card-title">Izlaz robe</h5>
                                        <div class="card-header-action">
                                            <div class="card-header-btn">
                                                <div data-bs-toggle="tooltip" title="Refresh">
                                                    <a href="#" class="avatar-text avatar-xs bg-warning" data-bs-toggle="refresh"> </a>
                                                </div>
                                                <div data-bs-toggle="tooltip" title="Maximize/Minimize">
                                                    <a href="#" class="avatar-text avatar-xs bg-success" data-bs-toggle="expand"> </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body custom-card-action p-0">
                                        <div class="table-responsive tickets-items-wrapper">
                                            <table class="table table-hover mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Artikal (Korisnik)</th>
                                                        <th>Lokacija</th>
                                                        <th>Vrijeme narudžbe</th>
                                                    </tr>
                                                </thead>
                                                <tbody>';
                            
                            while ($row = $result->fetch_assoc()) {
                                $id_korisnika = htmlspecialchars($row['id_korisnika']);
                                $sql_korisnik = "SELECT ime FROM korisnici WHERE id = '$id_korisnika'";
                                $result_korisnik = $mysqli->query($sql_korisnik);
                                $row_korisnik = $result_korisnik->fetch_assoc();
                                $korisnik_ime = htmlspecialchars($row_korisnik['ime']);
                                
                                $id_artikla = htmlspecialchars($row['id_produkta']);
                                $sql_artikal = "SELECT ime_produkta FROM narudzbe WHERE id_produkta = '$id_artikla'";
                                $result_artikal = $mysqli->query($sql_artikal);
                                $row_artikal = $result_artikal->fetch_assoc();
                                $artikal_ime = htmlspecialchars($row_artikal['ime_produkta']);
                            
                                echo '
                                <tr>
                                    <td>
                                        <a href="javascript:void(0);">' . htmlspecialchars($row['id']) . '</a>
                                        </td>
                                    <td>
                                        <a href="javascript:void(0);">' . htmlspecialchars($artikal_ime) . '</a>
                                    <p class="fs-12 text-muted text-truncate-1-line tickets-sort-desc">' . htmlspecialchars($korisnik_ime) . '</p>
                                    </td>
                                    <td>
                                        <a href="javascript:void(0);">' . htmlspecialchars($row['lokacija']) . '</a>
                                    </td>
                                    <td>
                                        <a href="javascript:void(0);">' . htmlspecialchars($row['vrijeme']) . '</a>
                                    </td>
                                </tr>';
                            }

                            echo '
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                        } else {
                            echo "No records found.";
                        }

                        $mysqli->close();
                        ?>

                    
        </div>
        <!-- [ Footer ] start -->
        <footer class="footer">
            <p class="fs-11 text-muted fw-medium text-uppercase mb-0 copyright">
                <span>Copyright ©</span>
                <script>
                    document.write(new Date().getFullYear());
                </script>
            </p>
            <div class="d-flex align-items-center gap-4">
                <a href="javascript:void(0);" class="fs-11 fw-semibold text-uppercase">Help</a>
                <a href="javascript:void(0);" class="fs-11 fw-semibold text-uppercase">Terms</a>
                <a href="javascript:void(0);" class="fs-11 fw-semibold text-uppercase">Privacy</a>
            </div>
        </footer>
        <!-- [ Footer ] end -->
    </main>

    <script>
        $(document).ready(function() {
            $.ajax({
                url: 'getData.php',
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    console.log(data);

                    var ime_artikla = data.map(function(item) {
                        return item.ime_artikla;
                    });
                    var total_quantity = data.map(function(item) {
                        return parseInt(item.total_quantity, 10);
                    });

                    var options = {
                        chart: {
                            height: 350,
                            width: "100%",
                            type: "bar",
                            toolbar: { show: false }
                        },
                        plotOptions: {
                            bar: {
                                endingShape: "rounded",
                                columnWidth: "15%",
                                distributed: true,
                                dataLabels: { position: "top" }
                            }
                        },
                        dataLabels: {
                            enabled: true,
                            formatter: function(val) { return val; },
                            offsetY: -20,
                            style: { fontSize: "12px", colors: ["#304758"] }
                        },
                        colors: ["#3454D1"],
                        series: [{
                            name: "Količina",
                            data: total_quantity
                        }],
                        xaxis: {
                            categories: ime_artikla,
                            labels: { style: { fontSize: "12px", colors: "#64748b" } }
                        },
                        yaxis: {
                            labels: {
                                formatter: function(val) { return val; },
                                style: { color: "#64748b" }
                            }
                        },
                        grid: {
                            xaxis: { lines: { show: false } },
                            yaxis: { lines: { show: false } }
                        },
                        tooltip: {
                            y: { formatter: function(val) { return val; } },
                            style: { fontSize: "12px", fontFamily: "Inter" }
                        },
                        legend: {
                            show: false,
                            labels: { fontSize: "12px", colors: "#64748b" },
                            fontSize: "12px",
                            fontFamily: "Inter"
                        }
                    };

                    var chart = new ApexCharts(document.querySelector("#grafik"), options);
                    chart.render();
                }
            });
        });

        
    </script>

<script>
  if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('/service-worker.js')
      .then(registration => {
        console.log('ServiceWorker registration successful with scope: ', registration.scope);
      })
      .catch(error => {
        console.log('ServiceWorker registration failed: ', error);
      });
  }
</script>
</body>

</html>
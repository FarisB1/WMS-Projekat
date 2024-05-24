<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keyword" content="">
    <meta name="author" content="theme_ocean">
    <title>WMS - Warehouse Management System</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendors/css/vendors.min.css">
    <link type="text/css" rel="stylesheet" href="assets/vendors/css/tui-calendar.min.css">
    <link type="text/css" rel="stylesheet" href="assets/vendors/css/tui-theme.min.css">
    <link type="text/css" rel="stylesheet" href="assets/vendors/css/tui-time-picker.min.css">
    <link type="text/css" rel="stylesheet" href="assets/vendors/css/tui-date-picker.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/theme.min.css">
			<script src="https:oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https:oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
</head>

        <nav class="nxl-navigation">
        <div class="navbar-wrapper">
            <div class="m-header">
                <a href="index.php" class="b-brand">
                    <img src="assets/images/logo-no-background.png" alt="" class="logo logo-lg" style=" width: 50% !important;" />
                    <img src="assets/images/favico.png" alt="" class="logo logo-sm" />
                </a>
            </div>
            <div class="navbar-content">
                <ul class="nxl-navbar">
                    <li class="nxl-item nxl-caption">
                        <label>Meni</label>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="index.php" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-home"></i></span>
                            <span class="nxl-mtext">Početna</span>
                        </a>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="pretraga.php" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-search"></i></span>
                            <span class="nxl-mtext">Pretraga</span><span class="nxl-arrow"></span>
                        </a>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-airplay"></i></span>
                            <span class="nxl-mtext">Dodavanje</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="artikal.php">Artikal</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="kutija.php">Kutija</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="paleta.php">Paleta</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="regal.php">Regal</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="hala.php">Hala</a></li>
                        </ul>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-shuffle"></i></span>
                            <span class="nxl-mtext">Premještanje</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="premjestanje/artikalkutija.php"> Artikal - Kutija</a> </li>
                            <li class="nxl-item"><a class="nxl-link" href="premjestanje/kutijapaleta.php">Kutija - Paleta</a></li>
                            <li class="nxl-item"><a class="nxl-link" href="premjestanje/paletaregal.php">Paleta - Regal</a></li>
                        </ul>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-file-text"></i></span>
                            <span class="nxl-mtext">Izvještaj</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="izvjestaj_artikli.php"> Artikala</a> </li>
                            <a href="izvjestaj"><li class="nxl-item"><a class="nxl-link" href="izvjestaj.php">Kutija</a></li></a>
                        </ul>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="historija.php" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-rotate-ccw"></i></span>
                            <span class="nxl-mtext">Historija</span><span class="nxl-arrow"></i></span>
                        </a>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="izlazrobe.php" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-dollar-sign"></i></span>
                            <span class="nxl-mtext">Izlaz Robe</span><span class="nxl-arrow"></i></span>
                        </a>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="korisnici.php" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-users"></i></span>
                            <span class="nxl-mtext">Korisnici</span><span class="nxl-arrow"></i></span>
                        </a>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-power"></i></span>
                            <span class="nxl-mtext">Odjava</span><span class="nxl-arrow"></span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="logout.php">Odjavi se</a></li>
                        </ul>
                    </li>
                
            </div>
        </div>
    </nav>
    
    <header class="nxl-header">
        <div class="header-wrapper">
            <div class="header-left d-flex align-items-center gap-4">
                <a href="javascript:void(0);" class="nxl-head-mobile-toggler" id="mobile-collapse">
                    <div class="hamburger hamburger--arrowturn">
                        <div class="hamburger-box">
                            <div class="hamburger-inner"></div>
                        </div>
                    </div>
                </a>
                <div class="nxl-navigation-toggle">
                    <a href="javascript:void(0);" id="menu-mini-button">
                        <i class="feather-align-left"></i>
                    </a>
                    <a href="javascript:void(0);" id="menu-expend-button" style="display: none">
                        <i class="feather-arrow-right"></i>
                    </a>
                </div>
            </div>
</header>


    <style>
        .nxl-navigation .navbar-wrapper {
            height: 100vh; 
            overflow-y: auto; 
        }
        
        @media screen and (min-width: 768px){
            .nxl-header{
                display: none;
            }
            
        }
    </style>

    <script src="assets/vendors/js/vendors.min.js"></script>
    <script src="assets/vendors/js/daterangepicker.min.js"></script>
    <script src="assets/vendors/js/apexcharts.min.js"></script>
    <script src="assets/vendors/js/circle-progress.min.js"></script>
    <script src="assets/js/common-init.min.js"></script>
    <script src="assets/js/dashboard-init.min.js"></script>
    <script src="assets/js/theme-customizer-init.min.js"></script>
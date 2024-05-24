<!DOCTYPE html>
<html lang="zxx">

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
    <link rel="stylesheet" type="text/css" href="assets/css/theme.min.css">
			<script src="https:oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https:oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
</head>

<body>
    <main class="auth-minimal-wrapper">
        <div class="auth-minimal-inner">
            <div class="minimal-card-wrapper">
                <div class="card mb-4 mt-5 mx-4 mx-sm-0 position-relative">
                    <div class="wd-50 bg-white p-2 rounded-circle shadow-lg position-absolute translate-middle top-0 start-50">
                        <img src="assets/images/logo-abbr.png" alt="" class="img-fluid">
                    </div>
                    <div class="card-body p-sm-5">
                        <h2 class="fs-20 fw-bolder mb-4">Registracija</h2>
                        <h4 class="fs-13 fw-bold mb-2">Warehouse Management System</h4>
                        <p class="fs-12 fw-medium text-muted">Postavimo sve kako biste mogli potvrditi svoj osobni račun i početi postavljati svoj profil.</p>
                        <form action="registracija_logika.php" class="w-100 mt-4 pt-2">
                            <div class="mb-4">
                                <input type="text" class="form-control" placeholder="Ime i prezime" name="ime" required>
                            </div>
                            <div class="mb-4">
                                <input type="email" class="form-control" placeholder="Email" name="email" required>
                            </div>
                            <div class="mb-4">
                                <input type="text" class="form-control" placeholder="Korisničko ime" name="korisnicko_ime" required>
                            </div>
                            <div class="mb-4 generate-pass">
                                <div class="input-group field">
                                    <input type="password" class="form-control password" id="sifra" name="sifra" placeholder="Šifra" required>
                                    <div class="input-group-text c-pointer gen-pass" data-bs-toggle="tooltip" title="Generate Password"><i class="feather-hash"></i></div>
                                    <div class="input-group-text border-start bg-gray-2 c-pointer show-pass" data-bs-toggle="tooltip" title="Show/Hide Password"><i></i></div>
                                </div>
                                <div class="progress-bar mt-2">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="termsCondition" required>
                                    <label class="custom-control-label c-pointer text-muted" for="termsCondition" style="font-weight: 400 !important" required>Slažem se sa svim Uvjetima i odredbama i naknadama.</label>
                                </div>
                            </div>
                            
                            <?php
                                if (isset($_GET['message'])) {
                                    $message = urldecode($_GET['message']);
                                
                                    echo "<div class='alert alert-danger mt-5'>{$message}</div>";
                                }
                            ?>
                            <div class="mt-5">
                                <button type="submit" class="btn btn-lg btn-primary w-100">Kreiraj račun</button>
                            </div>
                        </form>
                        <div class="mt-5 text-muted">
                            <span>Već imate račun?</span>
                            <a href="login.php" class="fw-bold">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="assets/vendors/js/vendors.min.js"></script>
    <script src="assets/vendors/js/lslstrength.min.js"></script>
    <script src="assets/js/common-init.min.js"></script>
    <script src="assets/js/theme-customizer-init.min.js"></script>
    
    
<script>
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('message')) {
            window.history.replaceState({}, document.title, window.location.pathname);
        }
    </script>
</body>

</html>
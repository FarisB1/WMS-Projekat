<?php 
    session_start();
    if (isset($_SESSION['user_id'])) {
        header("Location: index.php");
        exit();
    }
?>

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
                        <img src="assets/images/favicon.png" alt="" class="img-fluid">
                    </div>
                    <div class="card-body p-sm-5">
                        <h2 class="fs-20 fw-bolder mb-4">Login</h2><h4 class="fs-13 fw-bold mb-2">Prijavite se na svoj račun</h4>
<p class="fs-12 fw-medium text-muted">Hvala što ste se odlučili za našu <strong>WMS Software</strong> web aplikaciju.</p>
                        <form action="login_logika.php" method="POST" class="w-100 mt-4 pt-2">
                            <div class="mb-4">
                                <input type="text" class="form-control" placeholder="Korisničko ime" name="korisnicko_ime" required>
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" placeholder="Šifra" name="sifra" required>
                            </div>
                            
                            <div class="mt-5">
                                <button type="submit" class="btn btn-lg btn-primary w-100">Login</button>
                            </div>
                            <?php
                                if (isset($_GET['message'])) {
                                    $message = urldecode($_GET['message']);
                                    if ($message == 'Neuspješan login. Provjerite korisničko ime ili šifru!') {
                                    echo "<div class='alert alert-danger mt-5'>{$message}</div>";}
                                    else { echo "<div class='alert alert-success mt-5'>{$message}</div>"; }
                                }
                            ?>
                            <div class="mt-5 text-muted">
                                <span>Nemate račun?</span>
                                <a href="registracija.php" class="fw-bold">Registracija</a>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
<script>
        // Check if there is a message parameter in the URL
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('message')) {
            // Remove the message parameter from the URL
            window.history.replaceState({}, document.title, window.location.pathname);
        }
    </script>
</html>
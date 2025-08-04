<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Article</title>
    <base href="/GitHubProjects/Vault/app/">

    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="model/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="model/assets/img/favicon.png" rel="icon">
 
    <!-- Vendor CSS Files -->
    <link href="model/dist/vendor/bootstrap/css/bootstrap.min.css?<?php echo time(); ?>" rel="stylesheet">
    <link href="model/dist/vendor/bootstrap-icons/bootstrap-icons.css?<?php echo time(); ?>" rel="stylesheet">
    <link rel="stylesheet" href="model/assets/icons/css/all.css?<?php echo time(); ?>">
    <link href="model/dist/vendor/aos/aos.css?<?php echo time(); ?>" rel="stylesheet">
    <link href="model/dist/vendor/glightbox/css/glightbox.min.css?<?php echo time(); ?>" rel="stylesheet">
    <link href="model/dist/vendor/swiper/swiper-bundle.min.css?<?php echo time(); ?>" rel="stylesheet">
    <link rel="stylesheet" href="model/dist/css/boxicons.min.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="model/dist/css/animated.css?<?php echo time(); ?>">
    
    
    <!-- Main CSS File -->
    <link href="model/dist/css/main.css?<?php echo time(); ?>" rel="stylesheet">

     
    

</head>

<body> 
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="container head d-flex align-items-center justify-content-between">

            <a href="index.php" class="logo d-flex align-items-center me-auto me-lg-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="model/assets/img/logo.png" width="80" height="80" alt="">
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="index.php"><i class="bi bi-house-door me-1"></i><?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'Home' : 'Accueil'); ?></a></li>
                    <li><a href="articles.php"><i class="bi bi-newspaper me-1"></i><?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'Articles' : 'Articles'); ?></a></li>
                    <li><a href="index.php#about"><i class="bi bi-info-circle me-1"></i><?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'About' : 'À propos'); ?></a></li>
                    <li><a href="index.php#contact"><i class="bi bi-envelope me-1"></i><?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'Contact' : 'Contact'); ?></a></li>
                    <li class="dropdown">
                        <a><i class="bi bi-translate me-1"></i><span><?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'Language' : 'Langage'); ?>
                                <b style="color:#00175de8"><?php echo $_SESSION['language'] ?></b></span> <i
                                class="bi bi-chevron-down dropdown-indicator"></i></a>
                        <ul>
                            <form method="get">
                                <li>
                                    <label htmlfor="en" class="d-flex align-items-center">
                                        <img src="model/assets/img/en.png" alt="" width="20" height="20" class="ms-2">
                                        <a href="index.php?lang=en"
                                            style="color:<?php echo $_SESSION['language'] == 'en' ? 'red' : '' ?>"><?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'English' : 'Anglais'); ?></a>
                                    </label>
                                </li>
                                <li>
                                    <label htmlfor="fr" class="d-flex align-items-center">
                                        <img src="model/assets/img/fr.png" alt="" width="20" height="20" class="ms-2">
                                        <a href="index.php?lang=fr"
                                            style="color:<?php echo $_SESSION['language'] == 'fr' ? 'red' : '' ?>"><?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'French' : 'Français'); ?></a>
                                    </label>
                                </li>
                            </form>
                        </ul>
                    </li>
                    <li>
                        <a href="login.php" class="text-black">
                            <i class="fas fa-door-open user fs-6 me-1"></i>
                            <span class="hovers float-end text-black"
                                style="font-size: 14px;"><?php echo htmlspecialchars($_SESSION['language'] == 'en' ? 'Sign In' : 'Se connecter'); ?></span>
                        </a>
                    </li>
                </ul>
            </nav><!-- .navbar -->

            <a class="btn-book-a-table d-sm-flex d-none" href="<?php echo $whatsAppLink ?>"><i
                    class="fab fa-whatsapp text-white fs-4"></i>&nbsp; 670-844-193</a>
            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

        </div>
    </header><!-- End Header -->

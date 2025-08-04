<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

// session_start();
// Language : fr $ en
if (!isset($_SESSION['language'])) {
  $_SESSION['language'] = "fr";
}
if ($_GET) {
  // var_dump($_GET);
  // die();
  switch ($_GET['lang']) {
    case 'fr':
      $_SESSION['language'] = 'fr';
      break;
    case 'en':
      $_SESSION['language'] = 'en';
      break;
    default:
      $_SESSION['language'] = 'fr';
  }
}

?>
<?php echo require_once "$header";?>
<style>
    body {
        background: #f8f9fa;
        overflow: hidden;
    }

    .login-section {
        background: #f8f9fa;
        padding: 80px 0;
    }

    .card {
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    .logo img {
        border-radius: 50%;
    }
</style>
<main id="main">
    <section class="login-section d-flex align-items-center justify-content-center" style="min-height: 80vh;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="card p-4">
                        <div class="text-center mb-4">
                            <a href="/" class="logo d-flex align-items-center justify-content-center">
                                <img src="assets/img/logo.png" width="80" height="80" alt="">
                            </a>
                            <h2 class="mt-3">Login to MindVault</h2>
                        </div>
                        <?php
                        if (isset($loginMessage)) {
                        ?>
                            <div class="alert alert-info text-center">
                                <?php
                                if ($loginMessage[0]) {
                                    echo '<div id="sentMsg" class="sent-message" style="display:block">' . $loginMessage[1] . '</div>';
                                } else {
                                    echo '<div id="errorMsg" class="error-message" style="display:block">' . $loginMessage[1] . '</div>';
                                }
                                unset($loginMessage);
                                ?>
                            </div>
                        <?php } ?>
                        <form class="php-email-form" method="post">
                            <input type="hidden" name="i-action" value="IndexController" />
                            <input type="hidden" name="action" value="login" />

                            <div class="form-group mb-3">
                                <input type="email" class="form-control" name="creds" placeholder="Your Email" required>
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" class="form-control" name="password" placeholder="Your Password" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                            <div class="text-center mt-3">
                                <!-- <p>Don't have an account? <a href="tel:673951702">Contact Dev</a></p> -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>


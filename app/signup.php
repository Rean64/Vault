<?php
    session_start();
    if(isset($_SESSION['unique_id'])){//if user is logged in
      header("Location: users.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="model/assets/favicon.png" type="image/x-icon"> 
    <title>CHATME</title>
  <link rel="stylesheet" href="model/dist/css/style.css">
  <link rel="stylesheet" href="model/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="model/fontawesome-free-6.4.0-web/css/all.min.css">
  <script defer src="model/fontawesome-free-6.4.0-web/js/all.min.js"></script>
  <script defer src="model/dist/js/pass-show-hide.js"></script>
  <script defer src="model/dist/js/jquery.js?<?php echo time(); ?>"></script>
  <script defer src="model/dist/js/signup.js?<?php echo time(); ?>"></script>
  <script  src="model/dist/js/bootstrap.min.js"></script>
</head>
<body>
<div class="wrapper">
  <section class="form signup">
    <header id="header">Real Chat App</header>
    <form action="#"  enctype="multipart/form-data" autocomplete="off"  class="needs-validation" novalidate>
      <div class="error-text"></div>
      <div class="name-details">
        <div class="field input">
          <label id="label">Name</label>
          <input type="text" class="form-control" name="fname" id="validationCustom01" aria-describedby="emailHelp" placeholder="First Name" required>
        </div>
        <div class="field input">
          <label id="labels"></label>
          <input type="text" name="lname" class="form-control" id="validationCustom02" aria-describedby="emailHelp" placeholder="Last Name" required>
        </div>
      </div>
      <div class="field input">
        <label id="label">Email Address</label>
        <input type="email" name="email" class="form-control" id="validationCustom03" aria-describedby="emailHelp" placeholder="Enter your email" required>
      </div>
      <div class="field input">
        <label id="label">Password</label>
        <input type="password" name="password" class="form-control" id="validationCustom04" aria-describedby="emailHelp" placeholder="Enter new password" required>
        <div class="i"><i class="fas fa-eye"></i></div>
      </div>
      <div class="field image">
        <label>Select Image</label>
        <input type="file" name="image" required>
      </div>
      <div class="field button">
        <input type="submit" value="Continue to Chat">
      </div>
    </form>
    <div class="link">Already signed up? <a href="login.php">Login now</a></div>
  </section>
</div>



<script>
          // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
      'use strict'

      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      const forms = document.querySelectorAll('.needs-validation')

      // Loop over them and prevent submission
      Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }

          form.classList.add('was-validated')
        }, false)
      })
    })()
  </script>
</body>
</html>
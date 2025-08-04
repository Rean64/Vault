<?php
    session_start();
    if(!isset($_SESSION['unique_id'])){
      header("Location: login.php");
    }
require_once 'control/config.php';
    if (isset($_GET['user_id'])) {
      $user_id = $_GET['user_id'];
      $query = "UPDATE messages SET read_flag = 1 WHERE outgoing_msg_id = '$user_id'";
      // Re-run the query to update the message count
      $result = mysqli_query($conn, $query);
      $_SESSION['unread_messages'] = "";
    }
?> 

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" href="model/assets/favicon.png" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CHATME</title>
  <link rel="stylesheet" href="model/dist/css/style.css?<?php echo time(); ?>">
  <link rel="stylesheet" href="model/dist/css/lightbox.css?<?php echo time(); ?>">
  <link rel="stylesheet" href="model/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="model/fontawesome-free-6.4.0-web/css/all.min.css">
  <script defer src="model/dist/js/jquery.js?<?php echo time(); ?>"></script>
  <script defer src="model/dist/js/lightbox.js?<?php echo time(); ?>"></script>
  <script defer src="model/fontawesome-free-6.4.0-web/js/all.min.js"></script>
  <script defer src="model/dist/js/chat.js?<?php echo time(); ?>"></script>
</head>
<body style="background: transparent;" id="all">
<div class="wrapper">
  <section class="chat-area">
  <header class="header">
  <?php
        include_once 'control/config.php';
        $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
        if(mysqli_num_rows($sql) > 0) {
          $row = mysqli_fetch_assoc($sql);
        }
        $_SESSION['user_id'] = $user_id;
    ?>
      <a href="users.php?<?php $_SESSION['user_id'] ?>" class="back-arrow"><i class="fas fa-arrow-left"></i></a>
      <a href="control/users_images/<?php echo $row['img']; ?>" data-lightbox="models"><img src="control/users_images/<?php echo $row['img']; ?>" alt=""></a>
      <span class="bg-icon-show"><i class="fas fa-lightbulb"></i></span>
      <span class="video-icon-show"><i class="fas fa-video"></i></span>
      <div class="details">
        <span><?php echo $row['fname']. " " . $row['lname']; ?></span>
        <p><?php echo $row['status']; ?></p>
      </header>
      <div class="chat-box">
        
        </div>
    <form action="#" class="typing-area" enctype="multipart/form-data">
      <span class="send-photo" onclick="file()"><i class="fas fa-camera"></i></span>
      <input type="text" name="outgoing_id" value="<?php echo $_SESSION['unique_id']; ?>" hidden>
      <input type="text" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
      <input type="text" name="message" class="input-field message" placeholder="Type a message here...">
      <input type="file" name="photo" class="input-field photo hide" placeholder="Type a message here...">
      <button><i class="fas fa-check"></i></button>
    </form>
  </section>
</div>


<script>
  lightGallery(document.querySelector('.gallery'));
</script>

</body>
</html>
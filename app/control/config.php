<?php
   $conn = mysqli_connect('localhost', 'root', '', 'MindVault');
   if(!$conn){
    echo "Database not connected". mysqli_connect_error($conn);
   }
?>
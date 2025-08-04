<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
      include_once "config.php";
      $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
      $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
      $message = mysqli_real_escape_string($conn, $_POST['message']);

      
      if(!empty($message)){
        $sql = mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg, read_flag)
               VALUES ({$incoming_id}, {$outgoing_id}, '{$message}', 0)") OR die();
        // $query = "UPDATE messages SET read_flag = 0 WHERE incoming_msg_id = '{$incoming_id}' AND outgoing_msg_id = '{{$outgoing_id}}'";
        // // Re-run the query to update the message count
        // $result = mysqli_query($conn, $query);
      }else{
        
        if(isset($_FILES['photo'])){// if file is uploaded
           
          $img_name = $_FILES['photo']['name']; //getting the users uploaded img name
          $tmp_name = $_FILES['photo']['tmp_name']; //this temporary name is used to save/move file in our folder
     

          //let's explode photo and get the last extension like jpg png
          $img_explode = explode('.', $img_name);
          $img_ext = end($img_explode); //here we get the extension of a user uploaded img file

          $extensions = ['png', 'jpeg', 'jpg', 'txt', 'docx', 'pptx', 'html', 'xlsx', 'pdf'];//these are some valid img ext and we've stored them in an array
          if(in_array($img_ext, $extensions) === true){//if user uploaded img ext is matched with any array extensions
            $time = time();//this will return to us the current time
                          //we need this time because when you uploading user img to in our folder we rename user file with the current time
                          //so all the image file will have a unique name
            //let's move the user uploaded img to our particular folder
            $new_img_name = $time.$img_name;

            if(move_uploaded_file($tmp_name, "sent_images/".$new_img_name)){//if user upload img move to our folder successfully
              $status = "online"; //once user signed up then his/her status will be active now               
              //let's insert all user data inside table
              $sql2 = mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg)
               VALUES ({$incoming_id}, {$outgoing_id}, '{$new_img_name}')") OR die();
              if($sql2){//if this data inserted
                $_SESSION['posted'] = true;
                header("Location: post.php");
              }else{
                echo "Something went wrong!";
              }
            }
          }else{
            echo "Please select an image file - jpeg, png, jpg!";
          }

        }else{
          echo "Please select an image file!";
        }

      }
    }else{
      header("Location: ./login.php");
    }
?>
<?php
    session_start();
    include_once "config.php";
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $newpassword = mysqli_real_escape_string($conn, $_POST['newpassword']);

        $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
        if(mysqli_num_rows($sql) > 0) {
          $rows = mysqli_fetch_assoc($sql);
        }


        

    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($newpassword)){
      // lets's check if user email is valid or not
      if(password_verify($password, $rows['password']) === false){
        //let's check user upload file or not
        if(isset($_FILES['image'])){// if file is uploaded
          $img_name = $_FILES['image']['name']; //getting the users uploaded img name
          $tmp_name = $_FILES['image']['tmp_name']; //this temporary name is used to save/move file in our folder

          //let's explode image and get the last extension like jpg png
          $img_explode = explode('.', $img_name);
          $img_ext = end($img_explode); //here we get the extension of a user uploaded img file

          $extensions = ['png', 'jpeg', 'jpg'];//these are some valid img ext and we've stored them in an array
          if(in_array($img_ext, $extensions) === true){//if user uploaded img ext is matched with any array extensions
            $time = time();//this will return to us the current time
                          //we need this time because when you uploading user img to in our folder we rename user file with the current time
                          //so all the image file will have a unique name
            //let's move the user uploaded img to our particular folder
            $new_img_name = $time.$img_name;

            if(move_uploaded_file($tmp_name, "users_images/".$new_img_name)){//if user upload img move to our folder successfully
              $status = "online"; //once user signed up then his/her status will be active now               

              //let's insert all user data inside table
              $sql2 = mysqli_query($conn, "UPDATE users SET fname = '{$fname}', lname = '{$lname}', email = '{$email}', password ='{$newpassword}', img = '{$new_img_name}', status = '{$status}' WHERE unique_id = {$_SESSION['unique_id']} ");
              if($sql2){//if this data inserted
                $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                if(mysqli_num_rows($sql3) > 0 ){
                  $row = mysqli_fetch_assoc($sql3);
                  echo "Account Updated";
                }
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
      }else{
          echo "This Password Dosn't exist!";
        }
    }else{
      echo "All input field are required";
    }
?>
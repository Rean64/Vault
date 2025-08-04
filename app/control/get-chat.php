<?php
      session_start();
       $icons = [
            'html' => 'control/icons/html.png',
            'pptx' => 'control/icons/pptx.png',
            'txt' => 'control/icons/txt.png',
            'docx' => 'control/icons/word.png',
            'xlsx' => 'control/icons/xlsx.png',
            'pdf' => 'control/icons/pdf.png'
       ];
      if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $output = "";

        $sql = "SELECT * FROM messages 
                LEFT JOIN users ON users.unique_id = messages.outgoing_msg_id
                WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
                OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){
          while($row = mysqli_fetch_assoc($query)){
            if($row['outgoing_msg_id'] === $outgoing_id){//if this is equal to then he is a msg sender
              
              $img_explode = explode('.', $row['msg']);
              $img_ext = end($img_explode);
              $extensions = ['png', 'jpeg', 'jpg'];
              $textRander = ['txt', 'docx', 'pptx', 'html', 'xlsx', 'pdf'];
              if(in_array($img_ext, $extensions) === true){
                $output .= '<div class="chat outgoing">
                <div class="details">
                <a href="control/sent_images/'. $row['msg'] .'" data-lightbox="models"><img src="control/sent_images/'. $row['msg'] .'" /></a>
                </div>
                </div>
                ';
              }else{
                if(in_array($img_ext, $textRander)){
                  $ext = $img_explode[1];
                  $output .= '<div class="chat outgoing">
                    <div class="details icon">
                        <a href="control/sent_images/'. $row['msg'] .'"><img id="icons" src="'. $icons[$ext] .'" /></a>
                    </div>
                </div>';
                  }else{
                    $output .= '<div class="chat outgoing">
                      <div class="details">
                        <p>'. $row['msg'] .'</p>
                      </div>
                      <a href="control/users_images/'. $row['img'] .'" data-lightbox="models"><img src="control/users_images/'. $row['img'] .'" alt=""></a>
                  </div>
                  ';
                }
              }
            }else{//he is a message receiver
              $img_explode = explode('.', $row['msg']);
              $img_ext = end($img_explode);
              $extensions = ['png', 'jpeg', 'jpg'];
              $textRander = ['txt', 'docx', 'pptx', 'html', 'xlsx', 'pdf'];
              if(in_array($img_ext, $extensions) === true){
              $output .= '<div class="chat incoming">
                            <div class="details">
                               <a href="control/sent_images/'. $row['msg'] .'" data-lightbox="models"><img src="control/sent_images/'. $row['msg'] .'" /></a>
                            </div>
                        </div>
                        ';
              }else{
                if(in_array($img_ext, $textRander)){
                  $ext = $img_explode[1];
                  $output .= '<div class="chat incoming">
                    <div class="details">
                      <a onclick="save()" href="control/sent_images/'. $row['msg'] .'" download class="clicked"><img id="icons" src="'. $icons[$ext] .'" />
                     <p id="iconsp">Click To Download<i class="fas fa-download text-black"></i></p></a>
                    </div>
                </div>';
                  }else{
                      $output .= '<div class="chat incoming">
                    <a href="control/users_images/'. $row['img'] .'" data-lightbox="models"><img src="control/users_images/'. $row['img'] .'" alt=""></a>
                      <div class="details">
                        <p>'. $row['msg'] .'</p>
                      </div>
                  </div>
                  ';
                }
              }
            }
          }
        }else{
          $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
        }
        echo $output;
      }else{
        header("./login.php");
      }
?>
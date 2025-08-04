<?php
      
      while($row = mysqli_fetch_assoc($sql)){
        $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']}
                OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id}
                OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
        $query2  = mysqli_query($conn, $sql2);  
        $row2 = mysqli_fetch_assoc($query2);
        if(mysqli_num_rows($query2) > 0){
          $result = $row2['msg'];
        }else{
          $result = "No message available";
        }

          //adding you: text before msg if login id send msg 
        if(isset($row2['outgoing_msg_id']) && ($outgoing_id == $row2['outgoing_msg_id'])){
            $you = "You: ";
        }else{
            $you = "";
        }
      
        //trimming message if words are more than 15
        (strlen($result) > 15) ? $msg = substr($result, 0, 15).'...' : $msg = $result;

        $img_explode = explode('.', $result);
        $img_ext = end($img_explode);
        $extensions = ['png', 'jpeg', 'jpg'];
        $textRander = ['txt', 'docx', 'pptx', 'html', 'xlsx', 'pdf'];
        if(in_array($img_ext, $extensions) === true){
          $msg = "You have an image";
        }elseif(in_array($img_ext, $textRander) === true){
          $msg = "Document file";
        }
     
        
        //check if user is online or offline
        if(isset($row['status']) && ($row['status'] == "offline")){
              $offline = "offline";
          }else{
            $offline = "";
          }

          
          //getting the number of message inbox
          $sql3 = "SELECT COUNT(*) AS unread_messages FROM messages WHERE (outgoing_msg_id = {$row['unique_id']}) AND read_flag = 0";
          $query3  = mysqli_query($conn, $sql3);  
          $row3 = mysqli_fetch_assoc($query3);
          $_SESSION['unread_messages'] = $row3['unread_messages'];
          $true = strlen($msg) > 0;
          if($row3['unread_messages'] > 0 && !empty($msg)){
            $show =  $row3['unread_messages'];
            $display = 'flex'; 
            $class = "active";
          }else{
            $class = "active";
            $display = 'none';
            $show = "";
          }
          

          // Update the message count when a message is opened

        $output .= '<a href="chat.php?user_id='. $row['unique_id'] .'">
                    <div class="content">
                      <img src="control/users_images/'. $row['img'] .'" alt="">
                      <div class="details">
                        <span>'. $row['fname']. " " . $row['lname'] .'</span>
                        <p>'. $you . $msg .' <span class="num '. $class .'" style="display: '.$display.'">'. $show  .'</span></p>
                      </div>
                    </div>
                    
                    <div class="status-dot '.$offline.'"><i class="fas fa-circle"></i>
                    
                    </div>
                  </a>';
      }
?>
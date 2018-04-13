<?php

     require_once 'inc.php'; 
   /* this is because of angular the if information is in a json format*/
    $data=json_decode(file_get_contents("php://input"));
     
     if (count($data)>0){

            $username = mysqli_real_escape_string($connect, $data->username);     
            $errors = array();
        
              $user_sel= "select user_password,user_email from user where user_email='$username'"; 
                         
              $run_query = mysqli_query($connect,$user_sel);
              $check_user = mysqli_num_rows($run_query);

              if($check_user>0)
                {    
                      $select = mysqli_fetch_assoc($run_query);
                       $to =  $select["user_email"];
                        $subject = "Forgot Password";
                       $message = "Your password is "." ".$select["user_password"];
                       $headers = "From: e-funde"; 
                       mail($to,$subject,$message,$headers);

                   $data=1;
                }else{
                  $data=2;
                    
                }    
            } 
            
            print  json_encode($data);
    
?>
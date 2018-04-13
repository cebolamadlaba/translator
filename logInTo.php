<?php
      require_once 'inc.php'; 
   /* this is because of angular the if information is in a json format*/
    $data=json_decode(file_get_contents("php://input"));
     
     if (count($data)>0){
               $username = mysqli_real_escape_string($connect, $data->username);
               $password = mysqli_real_escape_string($connect, $data->password);
               $errors = array();
                //check if user exist
                  $user_pas= "select * from user where user_email='$username'";
                  $run_queryP = mysqli_query($connect,$user_pas);
                  $check_pas = mysqli_num_rows($run_queryP);
                  if($check_pas > 0){
                        $rowP=$run_queryP->fetch_assoc();
                      if($password == $rowP['user_password']){
                          $user_sel= "select * from user where user_email='$username' and user_password='$password'";
                          $run_query = mysqli_query($connect,$user_sel);
                          $row=$run_query->fetch_assoc();
                          $data=$row;
                      }else{ $data = 1; }
                 }else{ $data=2; } 
              
       } 
          print  json_encode($data)
?>
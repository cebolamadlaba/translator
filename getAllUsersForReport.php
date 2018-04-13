<?php
   //opening connection
     require_once 'inc.php';
       //decode json object         
             $staffObj=json_decode(file_get_contents("php://input"));
               $errors = array();
          //using view from db
              $user_sel= "SELECT id_number,user_name,user_surname,DATE_FORMAT(date_of_birth,'%d-%M-%Y') AS date_of_birth,gender,user_cellphone,user_email, DATE_FORMAT(created_date,'%d-%M-%Y' ) AS created_date,user_password,user_role,currently_active,last_loggin  
                          FROM `user`
                           ORDER BY user_surname ASC  ";
              
              $run_query = mysqli_query($connect,$user_sel);
              $check_user = mysqli_num_rows($run_query);
              if($check_user>0)
                {                                
                      while(  $row=$run_query->fetch_assoc())
                     {
                       //add to array  
                          $d [] =$row;
                     }
                }else{
                   $d=0;
                }
   print  json_encode($d); 
?>
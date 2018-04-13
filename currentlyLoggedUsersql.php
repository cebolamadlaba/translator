<?Php      
   //opening connection
     require_once 'inc.php';              
    $data=json_decode(file_get_contents("php://input"));
    if (count($data)>0){
               $userID=mysqli_real_escape_string($connect, $data->userID);
               $user_sel= "SELECT id_number,user_name,user_surname,DATE_FORMAT(date_of_birth,'%d-%M-%Y') AS date_of_birth,gender,user_cellphone,user_email, DATE_FORMAT(created_date,'%d-%M-%Y' ) AS created_date,user_password,user_role,currently_active FROM user where id_number ='$userID'";
               $run_query = mysqli_query($connect,$user_sel);
               $check_user = mysqli_num_rows($run_query);
               if($check_user>0){
                $row=$run_query->fetch_assoc();
                $d=$row;
               }else{
                 $d=0;
              }
               print  json_encode($d);
     }       
mysqli_close($connect)

?>
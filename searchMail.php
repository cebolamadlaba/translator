<?Php      
   //opening connection
     require_once 'inc.php';              
    $data=json_decode(file_get_contents("php://input"));
    if (count($data)>0){
               $Email=mysqli_real_escape_string($connect, $data->Email);
              $user_sel= "SELECT * FROM user where user_email ='$Email'";
               $run_query = mysqli_query($connect,$user_sel);
               $check_user = mysqli_num_rows($run_query);
               if($check_user>0){
                 $d=1;
               }else{
                 $d=0;
              }
               print  json_encode($d);
     }       
mysqli_close($connect)

?>
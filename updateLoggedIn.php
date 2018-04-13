
<?Php      
   //opening connection
     require_once 'inc.php';        
    $data=json_decode(file_get_contents("php://input"));
    if (count($data)>0){
               $idNumber=mysqli_real_escape_string($connect, $data->idNumber);
               $logged=mysqli_real_escape_string($connect, $data->logged);
               $last_loggin=mysqli_real_escape_string($connect, $data->last_loggin);
                 $user_sel= "UPDATE `user` SET currently_active ='$logged',last_loggin='$last_loggin' where id_number ='$idNumber'";
                $run_query = mysqli_query($connect,$user_sel); 
             }       
mysqli_close($connect);  
?>
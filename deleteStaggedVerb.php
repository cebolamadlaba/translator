
<?Php      
   //opening connection
     require_once 'inc.php';        
    $data=json_decode(file_get_contents("php://input"));
    if (count($data)>0){
               $verb=mysqli_real_escape_string($connect, $data->verb);
                 $user_sel= "DELETE FROM  `unavailableword` WHERE verbName='$verb'";
                $run_query = mysqli_query($connect,$user_sel); 
             }       
mysqli_close($connect);  
?>
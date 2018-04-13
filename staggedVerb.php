
<?Php      
   //opening connection
     require_once 'inc.php';        
    $data=json_decode(file_get_contents("php://input"));
    if (count($data)>0){
               $verb=mysqli_real_escape_string($connect, $data->verb);
               $usrID=mysqli_real_escape_string($connect, $data->id);
                 $user_sel= "INSERT INTO `unavailableword`(verbName,userId) VALUES('$verb','$usrID')";
                $run_query = mysqli_query($connect,$user_sel); 
             }       
mysqli_close($connect);  
?>
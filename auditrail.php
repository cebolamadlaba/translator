
<?Php      
   //opening connection
     require_once 'inc.php';        
    $data=json_decode(file_get_contents("php://input"));
    if (count($data)>0){
               $name=mysqli_real_escape_string($connect, $data->name);
               $idNo=mysqli_real_escape_string($connect, $data->id);
               $activityDetail=mysqli_real_escape_string($connect, $data->Detail);
                $user_sel= "INSERT INTO `useractivity`(name,idNo,activityDetail) VALUES('$name','$idNo','$activityDetail')";
                $run_query = mysqli_query($connect,$user_sel); 
             }       
mysqli_close($connect);  
?>
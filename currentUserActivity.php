<?Php      
   //opening connection
     require_once 'inc.php';              
    $data=json_decode(file_get_contents("php://input"));
    if (count($data)>0){
               $userID=mysqli_real_escape_string($connect, $data->userID);
               $user_sel= "SELECT name,DATE_FORMAT(dateOfEvent,'%d-%M-%Y') AS dateOfEvent,activityDetail FROM useractivity where idNo ='$userID'";
               $run_query = mysqli_query($connect,$user_sel);
               $check_user = mysqli_num_rows($run_query);
               if($check_user>0){
                while(  $row=$run_query->fetch_assoc())
                {
                  //add to array  
                     $d [] =$row;
                }
               }else{
                 $d=0;
              }
               print  json_encode($d);
     }       
mysqli_close($connect)

?>

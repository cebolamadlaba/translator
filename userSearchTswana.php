<?Php      
   //opening connection
     require_once 'inc.php';              
    $data=json_decode(file_get_contents("php://input"));
    if (count($data)>0){
               $verb=mysqli_real_escape_string($connect, $data->verb);
               $user_sel= "SELECT * FROM tswanaEnglishWord where `tswanaWord` like '%$verb%'";
               $run_query = mysqli_query($connect,$user_sel);
               $check_user = mysqli_num_rows($run_query);
               if($check_user>0){
                while($row=$run_query->fetch_assoc()){
                 $d[]=$row;
                }
               }else{
                 $d=0;
              }
               print  json_encode($d);
     }       
mysqli_close($connect)

?>
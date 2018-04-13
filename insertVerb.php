
<?Php      
   //opening connection
     require_once 'inc.php';        
    $data=json_decode(file_get_contents("php://input"));
    if (count($data)>0){
               $englishWord=mysqli_real_escape_string($connect, $data->verb);
               $tswanaWord=mysqli_real_escape_string($connect, $data->sentence);
               $checkVerb="SELECT * FROM tswanaenglishword WHERE englishWord='$englishWord' and tswanaWord='$tswanaWord'";
               $run_quer = mysqli_query($connect,$checkVerb); 

             if(mysqli_num_rows($run_quer)>0){
                 $da=1;
             }else{
                $user_sel= "INSERT INTO `tswanaenglishword`(englishWord,tswanaWord) VALUES('$englishWord','$tswanaWord')";
                $run_query = mysqli_query($connect,$user_sel); 
                $da=0;
             }

             print  json_encode($da);  
     } 
           
mysqli_close($connect);  
?>
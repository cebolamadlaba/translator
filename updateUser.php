<?Php  
     //opening connection
       require_once 'inc.php';

      //decode json object         
    $patientObj=json_decode(file_get_contents("php://input"));

    if (count($patientObj)>0){
             //assign Variables with json information
              $id_number=mysqli_real_escape_string($connect, $patientObj->idno);
              $user_name=mysqli_real_escape_string($connect, $patientObj->name);
              $Surname=mysqli_real_escape_string($connect, $patientObj->Surname);
              $CellNumber=mysqli_real_escape_string($connect, $patientObj->cell);
              $Email=mysqli_real_escape_string($connect, $patientObj->Email);
              $Gender=mysqli_real_escape_string($connect, $patientObj->gender);
              $dateOfBirth=mysqli_real_escape_string($connect, $patientObj->dateOfBirth);          
              $createDate=mysqli_real_escape_string($connect, $patientObj->createdDate);  
              $password=mysqli_real_escape_string($connect, $patientObj->user_password);
              $errors = array();

                            //update to DB
                            $sql = "UPDATE user
                                    SET user_surname='$Surname',
                                     user_cellphone='$CellNumber',
                                     user_email='$Email',
                                     user_password='$password' 
                                     WHERE id_number='$id_number'";
                        
                            if (mysqli_query($connect,$sql)) {
                                
                                   $to = $Email;
                                   $subject = "Profile Changes";
                                   $message = "Changes has been made to you profile if you not aware please contact system admin ASAP" ;
                                   $headers = "From:e-funde"; 
                                    mail($to,$subject,$message,$headers);
                                    $data= 1;
                                } else {
                                $data= 10;
                                
                            }
                    
                  print  json_encode($data);
    } 
mysqli_close($connect)
    
?>
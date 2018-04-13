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
              $role=mysqli_real_escape_string($connect, $patientObj->role); 
              $password=substr($id_number,1,5); 
              $errors = array();

                        //checking if the patient already exist
                        $user_sel= "SELECT * FROM `user` where id_number ='$id_number'";
                        $run_query = mysqli_query($connect,$user_sel);
                        //ccheck/counting number of rows for the same use if the exist from database
                        $check_user = mysqli_num_rows($run_query);

                        if($check_user>0)
                          { 
                              //use for error msg on controlller
                              $data= 0;
                          }else{
                            //insert to DB
                            $sql = "INSERT INTO user(id_number,user_name,user_surname,date_of_birth, gender,user_cellphone,user_email,user_password,user_role,created_date)
                                    VALUES('$id_number','$user_name','$Surname','$dateOfBirth','$Gender','$CellNumber','$Email','$password','$role','$createDate')";
                        
                            if (mysqli_query($connect,$sql)) {
                                
                                //  $to = $Email;
                                 //$subject = "Registration Confirmation";
                                //  $message = "Your Username is". " " . $username . " " ."Passwors is " . $password ;
                                // $headers = "From:e-funde"; 
                                //  mail($to,$subject,$message,$headers);
                                    $data= 1;
                                } else {
                                $data= 10;
                                
                            }
                    
                    
                    
                    }
                       

                  print  json_encode($data);
    } 
mysqli_close($connect)
    
?>
app.controller("logincontroller", function ($scope, $http,$modal,$window,sharedService,toaster) {
    "use strict"

    var selectUser = [];
    
    $scope.logOn=function(data){
        $scope.showError = 0;
        if(data.forgot=='Y'){
            $http.post(
               "forgotPassword.php", {
                         'username': data.username
                           }     
                       ).then(function (response) {
                          if(response.data == 2){
                                $scope.errors= "No Password Found For" + " " + data.username;
                                $scope.showError = 1;
                           }else if(response.data == 1){ 
                                toaster.success("Password has been sent to "+ data.username );
                           }else{
                                $scope.errors= "Unknown Errror Occur";
                                $scope.showError = 1;
                           }
                       })              
          }else{
            $http.post(
                "logInTo.php", {               
                'username':data.username,'password':data.password
            }).then(function (response) {
            if(response.data ==1){
                $scope.errors= "Wrong Password Please correct";
                $scope.showError = 1;
            }else if(response.data ==2){
                $scope.errors= "Wrong Username Please correct ";
                $scope.showError = 1;
            }else {
                if(response.data.user_password==$scope.data.password && response.data.user_email==$scope.data.username){
                    $scope.dataToShare = [];                                          
                         $scope.dataToShare = response.data;
                         var todayDate =new Date();
                         var selDate = todayDate.toISOString();
                       var createDa=selDate.substring(0,17);
                         sharedService.addData($scope.dataToShare);
                         if($scope.dataToShare.user_role=="User"){
                            if($scope.dataToShare.currently_active=="0"){
                                $scope.dataToShare.logged=="1";
                                $http.post(
                                    "updateLoggedIn.php", {               
                                       'last_loggin':createDa, 'logged':"1",'idNumber':$scope.dataToShare.id_number 
                                                }
                                ).then(function (response) {
                                    window.location.href='userScreen.php';  
                                });
                            }else{
                                 toaster.error('User already signed in',
                                             '', toaster.options = {
                                             "positionClass": "toast-top-right",
                                            "closeButton": true
                                });                               
                            } 
                         }else if ($scope.dataToShare.user_role=="Admin"){
                            if($scope.dataToShare.currently_active=="0"){
                                $scope.dataToShare.logged=="1";
                                $http.post(
                                    "updateLoggedIn.php", {               
                                        'last_loggin':createDa,'logged':"1",'idNumber':$scope.dataToShare.id_number 
                                                }
                                ).then(function (response) {
                                    window.location.href='adminScreen.php';  
                                });
                            }else{
                                 toaster.error('User already signed in',
                                             '', toaster.options = {
                                             "positionClass": "toast-top-right",
                                            "closeButton": true
                                });                               
                            } 




                         }

                }else{
                    $scope.errors= "Cannot log in Unkown error occurr ";
                    $scope.showError = 1;
                }






            }

        });   
    }            
}


});
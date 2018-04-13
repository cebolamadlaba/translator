
app.controller("userViewcontroller", function ($scope,$http,$modal,$window,sharedService,toaster) {
    "use strict"
    $scope.showError = 0;
    $scope.showempty = 0;
    $scope.openUpdateProfile = 0;
    //$scope.Verb.status="English";
    $scope.sharedData = sharedService.getData();
    $scope.details=$scope.sharedData[0];
     if( $scope.details==undefined){
       window.location.href='index.php'; 
      }
      var userID=$scope.sharedData[0].id_number;

     $scope.upGet=function(userID){
        $http.post(
            "currentlyLoggedUsersql.php", {               
               'userID':userID
           }).then(function (response) {
            $scope.userD= response.data;
        });               
    };
    $scope.upGet(userID);
    $scope.searchVerb=function(verb){
        $scope.showempty = 1; 
        if(verb.status=="Tswana"){
            $http.post(
                "userSearchTswana.php", {               
                   'verb':verb.verb_name
               }).then(function (response) {
                $scope.userverbSentence= response.data;
                $http.post(
                    "auditrail.php", {               
                       'Detail':'Searched the word '+' '+'"'+verb.verb_name+'"','id':userID,'name':$scope.details.user_name +' '+$scope.details.user_surname
                 })
                if(response.data==" 0"){
                    $http.post(
                        "staggedVerb.php", {               
                           'verb':verb.verb_name,'id':userID
                     })
                }
            });        
        }else{
           
            $http.post(
                "userSearchSentence.php", {               
                   'verb':verb.verb_name
               }).then(function (response) {
                $scope.userverbSentence= response.data;
                if($scope.userverbSentence.startsWith("")){
                    $scope.showempty = 2
                }
                $http.post(
                    "auditrail.php", {               
                       'Detail':'Searched the word '+' '+'"'+verb.verb_name+'"','id':userID,'name':$scope.details.user_name +' '+$scope.details.user_surname
                 })
                if(response.data==" 0"){
                    $http.post(
                        "staggedVerb.php", {               
                           'verb':verb.verb_name,'id':userID
                     })
                }
            });        
        }
               
    }

    $scope.openUpdateProfile = function(){
        $scope.openUpdateProfile = 1;
    }

    $scope.updateUser=function(data){
        $scope.showError = 0;
        $http.post(
            "updateUser.php", {               
               'Surname':data.user_surname,'cell':data.user_cellphone,'Email':data.user_email,'user_password':data.user_password,'idno':data.id_number
           }).then(function (response) {
            $scope.upGet(userID);
            toaster.success(data.user_name  + " " +"Profiled updated ");
            $scope.openUpdateProfile = 0;
            $http.post(
                "auditrail.php", {               
                   'Detail':'Updated Profile','id':userID,'name':$scope.details.user_name +' '+$scope.details.user_surname
             })
        }); 
                  
    }

   //log out and update logged on as xero
   $scope.logout=function(){               
    $http.post(
     "updateLoggedIn.php", {               
         'logged':"0",'idNumber':userID
    }).then(function (response) {
     $window.sessionStorage.clear();
     window.location.href='index.php';
   });              
}








});
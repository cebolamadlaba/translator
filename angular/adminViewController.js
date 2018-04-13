
app.controller("adminViewcontroller", function ($scope,$http,$modal,$window,sharedService,toaster,$dialogs) {
    "use strict"
    $scope.showError = 0;
    $scope.showempty = 0;
    $scope.openUpdateProfile = 0;
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

    $scope.AllUsers=function(){
        $http({
            url: "getAllUsers.php",
            method: "GET"
            }).then(function (results) {
            $scope.allUserss= results.data;                
        });
    };
    $scope.AllUsers();

    $scope.openUpdateProfile=function(){
        $scope.openUpdateProfile = 1;
    }

    $scope.StaggedVerb=function(){
        $http({
            url: "getAllStaggedVerb.php",
            method: "GET"
            }).then(function (results) {
            $scope.allStagedVerbs= results.data;                
        });
   };
    $scope.StaggedVerb();
    
        $scope.deleteSagge=function(verbName){
            var dlg = null;
            dlg = $dialogs.confirm("Have you added the word on the system ?", "");
            dlg.result.then(function (btn) {
            $http.post(
                "deleteStaggedVerb.php", {               
                'verb':verbName
            })
            window.location.reload();
           }, function (btn) { }); 
        }
    $scope.updateUser=function(data){
        $scope.showError = 0;
        $http.post(
            "updateUser.php", {               
               'Surname':data.user_surname,'cell':data.user_cellphone,'Email':data.user_email,'user_password':data.user_password,'idno':data.id_number
           }).then(function (response) {
            $scope.upGet(userID);
            toaster.success(data.user_name + " " + "Profiled updated" );
            $scope.openUpdateProfile = 0;
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

$scope.openVerbModal = function (pres) {
    var modalInstance = $modal.open({
        backdrop: 'static',
        animation: true,
        templateUrl: 'verbModalContent.html',
        controller: 'presRegController',
        size: 'md',
         resolve: {
            pres: function () {
                     return pres;
                 }
              }
    });;
         modalInstance.result.then(function (selectedItem) {
                         $scope.selected = selectedItem;
             }, function () {
         });
     };

     $scope.openUserAddModal = function (addUser) {
        var modalInstance = $modal.open({
            backdrop: 'static',
            animation: true,
            templateUrl: 'addUserModalContent.html',
            controller: 'userAddRegController',
            size: 'lg',
             resolve: {
                addUser: function () {
                         return addUser;
                     }
                  }
        });;
             modalInstance.result.then(function (selectedItem) {
                             $scope.selected = selectedItem;
                 }, function () {
             });
         };
    




});

app.controller("presRegController", function ($scope, $http, $modalInstance,sharedService, toaster, $dialogs,$window) {

    $scope.sharedData = sharedService.getData();
    $scope.details=$scope.sharedData[0];
      var userID=$scope.sharedData[0].id_number;
    //saving prescription
    $scope.saveTreatment=function(press){
            $http.post(
                "insertVerb.php", {
                    'verb': press.verb_name,'sentence': press.sentence
                }
            ).then(function (response) {
                if(response.data==" 1"){
                    toaster.error('Word with the same translation already exists',
                    '', toaster.options = {
                    "positionClass": "toast-top-right",
                   "closeButton": true
                 }); 
                 $http.post(
                    "auditrail.php", {               
                       'Detail':'Try to add existing word translation'+' '+'"'+press.verb_name+'"','id':userID,'name':$scope.details.user_name +' '+$scope.details.user_surname
                 }) 
                        $modalInstance.dismiss('cancel'); 
             }else{
                $http.post(
                    "auditrail.php", {               
                       'Detail':'Added a word '+' '+'"'+press.verb_name+'"','id':userID,'name':$scope.details.user_name +' '+$scope.details.user_surname
                 }) 
                toaster.success("English and Tswana word saved");
                $modalInstance.dismiss('cancel');
                window.location.reload();
            }
                               
        });
    };

       $scope.close = function () {
             $modalInstance.dismiss('cancel'); 
        }

})

app.controller("userAddRegController", function ($scope, $http,$modalInstance,sharedService, toaster,addUser, $dialogs,$window) {    
    "use strict"
    $scope.sharedData = sharedService.getData();
    $scope.details=$scope.sharedData[0];
      var userID=$scope.sharedData[0].id_number;

    $scope.updateStatus = addUser != undefined ? 'Update' : 'Create';
    //for readonly on update
    if ($scope.updateStatus == 'Update')
        { $scope.truefalse = "true"; }
    //assigning selected patient from modal
    $scope.data=addUser;
    $scope.showError = 0;
  //ID validation
  $scope.ValidateIdnumber = function(){
    var resultArray =  ValidateID($('#id_number').val());
    if(resultArray[0] === 0){
         var msg ="";
        $.each(resultArray[2], function(index,row){
         msg = row +"<br/>";
        })
       $("#errors").html(msg);
    }
    else{
          $("#errors").html('');
    }
 }

$scope.saveReg=function(regData){
    $scope.showError = 0;
  var saIds =regData.id_number;
   var saId=(saIds.substr ( 6 , 4));
      if ((saId > 4999) & (saId < 10000)){
          regData.gender='Male';
        }else
       {
          regData.gender='Female'; 
        }
        var day=saIds.substr(4,2);
        var year='19'+saIds.substr(0,2);
        var monnth =saIds.substr(2,2);
        var dateOfBirth=year+'-'+monnth+'-'+day;
     //get current date 
    var todayDate =new Date();
    var selDate = todayDate.toISOString();
    regData.createDate=selDate.substring(0,10);
    var userName=saIds.substr (6,4);
    var password=saIds.substr (1,5);


  
  if ($scope.updateStatus == 'Create'){
            $http.post(
            "insertUser.php", {               
                'role':regData.user_role,'idno':saIds,'createdDate':regData.createDate,'gender': regData.gender,'dateOfBirth':dateOfBirth,'Email':regData.user_email,'cell':regData.user_cellphone,'Surname':regData.user_surname,'name':regData.user_name
            }).then(function (response) {
            if(response.data ==0){
                toaster.error("User Already Exists");
                $modalInstance.dismiss('cancel'); 
            }else if(response.data ==1){
                $http.post(
                    "auditrail.php", {               
                       'Detail':'Created user '+' '+'"'+regData.user_name + ''+regData.user_name+'"','id':userID,'name':$scope.details.user_name +' '+$scope.details.user_surname
                 }) 
                toaster.success("Email with log in details has been sent to" + regData.Email);
                $modalInstance.dismiss('cancel'); 
                $scope.showError = 1;
            }else {
                toaster.error("Unkown Error occurred");
                $modalInstance.dismiss('cancel'); 
            };


        }); 

    }else{
        $http.post(
            "updateUser.php", {               
               'Surname':regData.user_surname,'cell':regData.user_cellphone,'Email':regData.user_email,'user_password':regData.user_password,'idno':regData.id_number
           }).then(function (response) {
            toaster.success("Profiled updated For" + " " + regData.user_name );
            $http.post(
                "auditrail.php", {               
                   'Detail':'Updated user '+' '+'"'+regData.user_name + ' '+''+regData.user_surname+'"','id':userID,'name':$scope.details.user_name +' '+$scope.details.user_surname
             })
            $modalInstance.dismiss('cancel'); 
           
        }); 
    }

}
         $scope.close = function () {
                 $modalInstance.dismiss('cancel'); 
            }
         
})
    


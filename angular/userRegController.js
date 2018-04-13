app.controller("regcontroller", function ($scope, $http,$modal,$window,sharedService,toaster) {
    "use strict"
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
  var saIds =regData.idno;
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
    $http.post(
      "insertUser.php", {               
          'role':'User','idno':saIds,'createdDate':regData.createDate,'gender': regData.gender,'dateOfBirth':dateOfBirth,'Email':regData.Email,'cell':regData.cell,'Surname':regData.Surname,'name':regData.name
      }).then(function (response) {
      if(response.data ==0){
          toaster.error("User Has Already Been Registered");
          $scope.showError = 2;
      }else if(response.data ==1){
           toaster.success("Email with log in details has been sent to" + regData.Email); 
           $scope.showError = 2;
      }else {
        $scope.errors= "Unkown Error occurred" ;
        $scope.showError = 1;
     }

}); 


}
 

 $scope.clear=function(gfg){
    gfg.name='';
    gfg.Surname='';
    gfg.idno='';
    gfg.cell='';
    gfg.Email='';
 }

    


});
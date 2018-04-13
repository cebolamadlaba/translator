
app.controller("indexcontroller", function ($scope, $http,$modal,$window) {
    "use strict"

    $scope.searchMail=function(data){
        $http.post(
            "searchMail.php", {               
               'Email':data.mail
           }).then(function (response) {
            if(response.data==" 1"){
                window.location.href='logIn.php';  
            }else if (response.data==" 0"){
                window.location.href='register.php';  
            }
        });               
    }
  


});
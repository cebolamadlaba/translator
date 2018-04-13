
app.controller("adminViewReportController", function ($scope,$http,$modal,$window,sharedService,toaster) {
    "use strict"
    $scope.showError = 0;
    $scope.showempty = 0;
    $scope.sharedData = sharedService.getData();
    $scope.details=$scope.sharedData[0];
     if( $scope.details==undefined){
       window.location.href='index.php'; 
      }
      var userID=$scope.sharedData[0].id_number;
    
      $http({
        url: "getAllUsersForReport.php",
        method: "GET"
        }).then(function (results) {
        $scope.allLetters= results.data;                
    });
    
    $scope.eAction = function (option) {
        switch (option) {
            case 'pdf': $scope.$broadcast('export-pdf', {}); 
                break; 
            case 'excel': $scope.$broadcast('export-excel', {});
                break; 
            case 'doc': $scope.$broadcast('export-doc', {});
                break;
            case 'csv': $scope.$broadcast('export-csv', {});
                break;
            default: console.log('no event caught'); 
        }
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
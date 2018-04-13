<!DOCTYPE html>
<html lang="en"  ng-app="VerbApp" >
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/bootstrap-theme.css">
  <link rel="stylesheet" href="css/angular-toastr.min.css">
  <style>
    body{
      filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00589F', endColorstr='#0073CF', GradientType=0);
      background: -webkit-linear-gradient(to bottom, #00589F 50%, #0073CF) !important;
      background: -moz-linear-gradient(to bottom, #00589F 50%, #0073CF) !important;
      background: -ms-linear-gradient(to bottom, #00589F 50%, #0073CF) !important;
      background: -o-linear-gradient(to bottom, #00589F 50%, #0073CF) !important;
      background: linear-gradient(to bottom, #00589F 50%, #0073CF) !important;
      color: white;
    }
    
    div.well{
      height: 250px;
    } 
    
    .Absolute-Center {
      margin: auto;
      position: absolute;
      top: 0; left: 0; bottom: 0; right: 0;
    }
    
    .Absolute-Center.is-Responsive {
      width: 50%; 
      height: 50%;
      min-width: 200px;
      max-width: 400px;
      padding: 40px;
    }
    
    #logo-container{
      margin: auto;
      margin-bottom: 10px;
      width:200px;
      height:30px;
      background-image:url('http://placehold.it/200x30/000000/ffffff/&text=BRAND+LOGO');
    }
    
</style>
</head>
<body ng-controller="regcontroller">
<div class="col-md-7">
    <div class="container ">
        <h2> Register as a user</h2>
        <form name="registerForm" >
         <div class="col-md-4">
         <div class="form-group ">
            <label >Name</label>
                 <input class="form-control" type="text" name='name' ng-model="data.name" maxlength="25" ng-pattern="/^[a-zA-Z_ ]*$/" required/>                                        
                  <div style="color:red" ng-show="registerForm.name.$error.pattern">invalid Name!</div>  
           </div>  
          <div class="form-group  ">
            <label >Surname</label>
            <input class="form-control" type="text"  name="Surname" ng-model="data.Surname" ng-pattern="/^[a-zA-Z -]*$/" required>
            <div style="color:red" ng-show="registerForm.Surname.$error.pattern">invalid Surname!</div>
          </div>
          <div class="form-group ">
            <label >Id Number</label>
            <input type="text" class="form-control"  name="idno" ng-keyup="ValidateIdnumber()" id="id_number"  ng-model="data.idno" maxlength="13" ng-pattern="/^[0-9]{13}$/" required>
            <br /> <span id="errors" style="color:red" ></span>
          </div>
          <div class="form-group ">
            <label >Cell Number</label>
            <input type="text" class="form-control"   name="cell" ng-model="data.cell" maxlength="10" ng-pattern="/^[0-0][6-8][0-9]{8}$/" required>
            <div style="color:red" ng-show="registerForm.cell.$error.pattern">invalid cell!</div> 
          </div>
          <div class="form-group ">
            <label >Email</label>
            <input type="Email" class="form-control" id="Email" name="Email"ng-model="data.Email" ng-pattern="/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/" required>
            <div style="color:red" ng-show="registerForm.Email.$error.pattern">invalid email!</div> 
          </div>      
          <button type="submit" class="btn btn-warning" ng-click="clear(data)">Clear</button>  
          <button type="submit" class="btn btn-success" ng-click="saveReg(data)">Submit</button>
        </div>
       </form>
        <br>
      </div>
      </div>
      <div class="col-md-5">
      <br>
      
      <div class="col-md-8">
             <button class="btn btn-warning" onclick="location.href='logIn.php'" ng-if="showError==2">Log In</button>
                <div class="alert alert-danger alert-dismissible" style="background-color:lightcoral ; color:black" role="alert" ng-if="showError==1">  
                  <strong></strong> {{errors}}
                </div>
           </div>
      </div>
      <script src="js/jquery.js" type="text/javascript"></script>
      <!-- angular extentions-->
    <script src="js/angular.js" type="text/javascript"></script> 
    <script src="app.js" type="text/javascript"></script>
    <script src="js/toaster.min.js" type="text/javascript"></script>
    <script src="js/angular-moment.min.js" type="text/javascript"></script>
    <script src="js/angular-route.min.js" type="text/javascript"></script>
    <script src="js/angular-ui-router.js" type="text/javascript"></script>
    <script src="js/ui-bootstrap-tpls.min.js" type="text/javascript"></script> 
    <script src="js/dialogs.min.js" type="text/javascript"></script> 
    <script src="js/idvalidator.js" type="text/javascript"></script> 
      <!-- Load controllers -->
   <script src="angular/userRegController.js" type="text/javascript"></script>   
   <script src="angular/sharedService.js" type="text/javascript"></script>  
</body>
</html>
<toaster-container></toaster-container>

<!DOCTYPE html>
<html lang="en" ng-app="VerbApp" >
<head>
  <title>Log in</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/bootstrap-theme.css">
  <link rel="stylesheet" href="css/angular-toastr.min.css">
  
  <style>
    body{
      filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#e6e6e6', endColorstr='#0073CF', GradientType=0);
      background: -webkit-linear-gradient(to bottom, #e6e6e6 50%, #0073CF) !important;
      background: -moz-linear-gradient(to bottom, #e6e6e6 50%, #0073CF) !important;
      background: -ms-linear-gradient(to bottom, #e6e6e6 50%, #0073CF) !important;
      background: -o-linear-gradient(to bottom, #e6e6e6 50%, #0073CF) !important;
      background: linear-gradient(to bottom, #e6e6e6 50%, #0073CF) !important;
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
    .logo{display: block;background: url(img/images-1-486x303.png)}
    #logo-container{
      margin: auto;
      margin-bottom: 10px;
      width:200px;
      height:30px;
      background-image:url('http://placehold.it/200x30/000000/ffffff/&text=BRAND+LOGO');
    }
</style>
</head>
<body ng-controller="logincontroller" >
    <div class="container ">
        <div class="row">
          <div class="Absolute-Center is-Responsive">
            <h3 style="color:#6B6B8A;font-size:30px;width:200%;">Log on To Setswana Translator</h3>
            <br>
            <div class="col-sm-12 col-md-10 col-md-offset-1">
              <form  name="loginForm">
                <div class="form-group input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input class="form-control" type="text" name='username' ng-model="data.username" ng-pattern="/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/" required/>                                        
                  <div style="color:red" ng-show="loginForm.username.$error.pattern">invalid email!</div>  
                </div>                       
                <div class="form-group input-group" ng-if="data.forgot !=='Y'">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                  <input class="form-control" type="text" name='password' ng-model="data.password" maxlength="6" ng-pattern="/^[0-9]{1,6}$/" required />
                  <span ng-show="loginForm.password.$error.pattern" style="color:red">invalid password!</span>
                 <br />     
                </div>
               
                <div class="form-group">
                  <button type="button" class="btn btn-primary btn-block" ng-click="logOn(data)" ng-disabled="loginForm.$invalid">Submit</button>
                </div>
                <div class="form-group text-center">
                   <input type="checkbox" ng-model="data.forgot" ng-true-value="'Y'" ><label style="color:black">Forgot Password?</label>
                </div>
              </form>   
                  
            </div> 
            <div class="col-md-12">
                                 <div class="alert alert-danger alert-dismissible" style="background-color:lightcoral ; color:black" role="alert" ng-if="showError==1">  
                                 <strong><span class="glyphicon glyphicon-thumbs-down"></span></strong> {{errors}}
                      </div>
               </div> 
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
   <script src="angular/logincontroller.js" type="text/javascript"></script>   
   <script src="angular/sharedService.js" type="text/javascript"></script>  
</body>
</html>
<toaster-container></toaster-container>
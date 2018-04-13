<!DOCTYPE html>
<html lang="en"  ng-app="VerbApp" >
<head>
  <title>User</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/bootstrap-theme.css">
  <link rel="stylesheet" href="css/angular-toastr.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    body{
      background:gray;
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
<body ng-controller="userViewcontroller">
<nav class="navbar navbar-default" style="background:#D3DCE3">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li ><a href="#" style="color:white">Home <span class="sr-only">(current)</span></a></li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color:white">Reports <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="userReportScreen.php">user report</a></li>
          <li><a href="userActivityReportScreen.php">user activity report</a></li>
          
        </ul>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:white;font-size:2em"   >User View </a>
     
        </li>
       
      </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <p></p>
        <li class="logged-in-user" ><button type="button" class="btn btn-default" ng-click="logout()" >Log Out</button></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<br>
<br>
<div class="col-md-4">
    <div class="container ">
   <div ng-hide="openUpdateProfile==1">
    <button class="btn btn-primary" ng-click="openUpdateProfile()" >Edit Profile</button>
   </div>
    <div ng-if="openUpdateProfile==1">
    <div class="form-group row">
          <label  class="col-sm-1 control-label">Name</label>
          <div class="col-sm-2">
            <input type="text" class="form-control" ng-model="userD.user_name" readonly >
          </div>
    </div>
    <div class="form-group row">
      <label  class="col-sm-1 control-label">Surname</label>
      <div class="col-sm-2">
      <input type="text" class="form-control" ng-model="userD.user_surname"  >
      </div>
  </div>
  <div class="form-group row">
          <label  class="col-sm-1 control-label">D O B</label>
          <div class="col-sm-2">
            <input type="text" class="form-control" ng-model="userD.date_of_birth" readonly>
          </div>
    </div>
    <div class="form-group row">
          <label  class="col-sm-1 control-label">Gender</label>
          <div class="col-sm-2">
            <input type="text" class="form-control" ng-model="userD.gender" readonly>
          </div>
    </div>
    <div class="form-group row">
          <label  class="col-sm-1 control-label">Cell </label>
          <div class="col-sm-2">
            <input type="text" class="form-control" ng-model="userD.user_cellphone"  >
          </div>
    </div>
    <div class="form-group row">
          <label  class="col-sm-1 control-label">Email</label>
          <div class="col-sm-2">
            <input type="text" class="form-control" ng-model="userD.user_email" >
          </div>
    </div>
    <div class="form-group row">
          <label  class="col-sm-1 control-label" >Password</label>
          <div class="col-sm-2">
            <input type="password" class="form-control"ng-model="userD.user_password"  >
          </div>
    </div>
    <button type="button" class="btn btn-primary" ng-click="updateUser(userD)">Save</button>
     </div>
 </div>
 </div>
<div class="col-md-8">
<div class="row">

        <div class="col-md-7">
       Choose the language You would like to search words for
       <p></p>
        <div class="form-group" >
          <label class="control-label col-sm-3"></label>
              <div class="col-md-3">
                    <label class="radioBtnLabel">English </label><input type="radio"  data-ng-model="Verb.status" value="English">
                 </div>
                <div class="col-md-3">
                <label class="radioBtnLabel">Tswana</label><input type="radio" data-ng-model="Verb.status" value="Tswana">
               </div>
            </div>
              <div id="imaginary_container" class="col-md-12"> 
                  <div class="input-group stylish-input-group">
                      <input type="text" class="form-control"  placeholder="Search a Word" ng-model="Verb.verb_name" >
                      <span class="input-group-addon">
                          <button type="button" ng-click="searchVerb(Verb)">
                              <span  class="glyphicon glyphicon-search"></span>
                          </button>  
                      </span>
                  </div>
              </div>
          </div>
	</div>
  <p></p>
<div class="row col-md-7" style="background:white;color:black">
  <div ng-repeat="userVerb in userverbSentence" ng-if="userverbSentence!==' 0' || showempty!==2" >
  <p>Translated word:</P>
     <p ng-if="Verb.status=='Tswana'">: {{userVerb.englishWord}} is translated to  {{userVerb.tswanaWord}}  in Setswana</p>
     <p ng-if="Verb.status=='English'"> : {{userVerb.tswanaWord}} is translated to  {{userVerb.englishWord}} in English</p>
  </div>
  <div  ng-if="showempty==0">
     <p ng-if="Verb.status=='Tswana'">Please Enter an Setswana word that you would like to translate it to English language </p>
     <p ng-if="Verb.status=='English'">Please Enter an English word that you would like to translate it to Setswana language </p>
  </div>
  <div  ng-if="showempty==2">
     <p ng-if="Verb.status=='Tswana'"> No Setswana word matching <a style="color:red">{{Verb.verb_name}}</a> was found but the administrator has been notified,<br>An email will be sent to you once the word has added.  </p>
     <p ng-if="Verb.status=='English'"> No English word matching <a style="color:red">{{Verb.verb_name}}</a> was found but the administrator has been notified,<br>An email will be sent to you once the word has added.  </p>
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
   <script src="angular/userViewController.js" type="text/javascript"></script>   
   <script src="angular/sharedService.js" type="text/javascript"></script>  
</body>
</html>
<toaster-container></toaster-container>

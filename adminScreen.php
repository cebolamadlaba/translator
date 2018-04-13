<!DOCTYPE html>
<html lang="en"  ng-app="VerbApp" >
<head>
  <title>Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/bootstrap-theme.css">
  <link rel="stylesheet" href="css/angular-toastr.min.css">
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
<body ng-controller="adminViewcontroller">
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
        <li><a style="color:white" href="adminReportScreen.php">Report</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:white;font-size:2em">Admin View </a>
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
    <button class="btn btn-primary" ng-click="openUpdateProfile()" ng-hide="openUpdateProfile==1">Edit Profile</button>
    <div ng-if="openUpdateProfile==1">
    <form name="registerForm" >
      <div class="form-group row">
            <label  class="col-sm-1 control-label">Name</label>
            <div class="col-sm-2">
              <input type="text" class="form-control" ng-model="userD.user_name" readonly >
            </div>
      </div>
      <div class="form-group row">
        <label  class="col-sm-1 control-label">Surname</label>
        <div class="col-sm-2">
        <input type="text" class="form-control" ng-model="userD.user_surname">
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
      <button type="button" class="btn btn-primary" ng-click="updateUser(userD)">Save</button>
      </div>
 </div>
 </div>
<div class="col-md-8">
  <div class="row">
          <div class="col-md-6">
          <div class="col-md-3"><button type="button" class="btn btn-primary" ng-click="openUserAddModal()">Add User</button></div>
          <div class="col-md-3"><button type="button" class="btn btn-primary" ng-click="openVerbModal()">Add Words</button> </div>
              <div id="imaginary_container" class="col-md-6"> 
              <table class="table table-bordered  header-fixed">
                <thead>
                <tr>
                     <th style="width:200%">Searched but unavailable words</th>
                     <th></th>                 
                </tr>
                </thead>
                <tbody>
                <tr ng-repeat="bvrv in allStagedVerbs">
                   <td>{{bvrv.verbName}} </td>
                   <td ng-click="deleteSagge(bvrv.verbName)">x</td>
                </tr>               
              </tbody>
        </table>
               
             </div>
    </div>
    </form>
</div>
</div>
<div class="col-md-12">
  <div class="col-md-2">
  </div>
  <div class="col-md-8">  
  <div class="input-group add-on">
             <input class="form-control" placeholder="Search User" name="srch-term" id="srch-term" type="text"  ng-model="filterUsers">
               <div class="input-group-btn">
                    <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-search"></i></button>
             </div>
          </div>
            <table class="table table-bordered  header-fixed">
              <thead>
                 <tr>
                     <th>Name</th>
                     <th>Date Of Birth</th>
                     <th>Contact</th>
                     <th>Reg Date</th>  
                     <th>State</th>                 
                 </tr>
               </thead>
               <tbody>
                <tr ng-repeat="patient in allUserss | filter:filterUsers" ng-click="openUserAddModal(patient)">
                   <td>{{patient.user_surname}} {{patient.user_name}} </td>
                   <td>{{patient.date_of_birth}}</td>
                   <td>{{patient.user_cellphone}} {{patient.user_email}}</td>
                   <td>{{patient.created_date}}</td>
                   <td ng-show="{{patient.currently_active ==0}}" style="background:orange">offline</td>
                   <td ng-show="{{patient.currently_active ==1}}" style="background:green">online</td>
                </tr>               
             </tbody>
        </table>
     </div>
  </div>
  <script type="text/ng-template" id="verbModalContent.html">  
        <form class="form-horizontal" name="presForm">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" ng-click="close()">&times;</button>
                <h4 class="modal-title" style="color:blue">Add English And Setswana Words</h4>
            </div>
            <div class="modal-body">
            <div class="form-group row">
          <label  class="col-sm-3 control-label" style="color:blue">English word:</label>
           <div class="col-sm-9">
              <input type="text" name="verb_name" class="form-control" ng-model="data.verb_name"  maxlength="20" ng-pattern="/^[a-zA-Z_]*$/" required>
              <div style="color:red" ng-show="presForm.verb_name.$error.pattern">invalid word!!</div> 
          </div>
         </div>
            <div class="form-group" >
            <label class="control-label col-sm-3" style="color:blue">Tswana word:</label>
            <div class="col-sm-9" >
            <input name="" id="" cols="30" rows="10" type="text" class="form-control" id="sentence" name="sentence"  ng-model="data.sentence"  maxlength="20" ng-pattern="/^[a-zA-Z_ ]*$/" required>             
            <div style="color:red" ng-show="presForm.sentence.$error.pattern">invalid word!</div> 
            </div>
        </div>   
            <div class="modal-footer row">
                <button type="button" value="submit" class="btn btn-success" ng-disabled="presForm.$invalid" ng-click="saveTreatment(data)">Submit</button>
            </div>
        </form>
    </script>
    <script type="text/ng-template" id="addUserModalContent.html">  
        <form class="form-horizontal" name="registerForm">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" ng-click="close()">&times;</button>
                <h4 class="modal-title" style="color:blue">{{updateStatus}} User</h4>
            </div>
            <div class="modal-body">
            <div class="container ">
                <div class="col-md-4">
                  <div class="form-group row">
                      <label style="color:blue">Name</label>
                          <input class="form-control" type="text" name='name' ng-model="data.user_name" maxlength="25" ng-pattern="/^[a-zA-Z_ ]*$/" ng-readonly="{{truefalse}}"  required/>                                        
                            <div style="color:red" ng-show="registerForm.name.$error.pattern">invalid Name!</div>  
                    </div>  
                    <div class="form-group row ">
                      <label style="color:blue">Surname</label>
                      <input class="form-control" type="text"  name="Surname" ng-model="data.user_surname" ng-pattern="/^[a-zA-Z -]*$/" required>
                      <div style="color:red" ng-show="registerForm.Surname.$error.pattern">invalid Surname!</div>
                    </div>
                    <div class="form-group row ">
                      <label style="color:blue">Id Number</label>
                      <input type="text" class="form-control"  name="idno" ng-keyup="ValidateIdnumber()" id="id_number"  ng-model="data.id_number" maxlength="13" ng-pattern="/^[0-9]{13}$/" ng-readonly="{{truefalse}}" required>
                      <br /> <span id="errors" style="color:red" ></span>
                    </div>
                    <div class="form-group row">
                      <label style="color:blue">Cell Number</label>
                      <input type="text" class="form-control"   name="cell" ng-model="data.user_cellphone" maxlength="10" ng-pattern="/^[0-0][6-8][0-9]{8}$/" required>
                      <div style="color:red" ng-show="registerForm.cell.$error.pattern">invalid cell!</div> 
                    </div>
                    <div class="form-group ">
                      <label style="color:blue">Email</label>
                      <input type="Email" class="form-control" id="Email" name="Email"ng-model="data.user_email" ng-pattern="/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/" required>
                      <div style="color:red" ng-show="registerForm.Email.$error.pattern">invalid email!</div> 
                     <p></p>
                      <div class="col-md-4">
                                        <label class="radioBtnLabel" style="padding:3px;color:blue" >Admin</label><input  type="radio" data-ng-model="data.user_role" value="Admin">
                                    </div>
                                    <div class="col-md-4">
                          <label class="radioBtnLabel" style="padding:3px;color:blue">User</label><input  type="radio" data-ng-model="data.user_role" value="User">
                       </div>
                    </div>  
                    
                    <div class="modal-footer row">
                    <button type="button" value="submit" class="btn btn-warning"  ng-click="close()">Close</button>
                     <button type="button" value="submit" class="btn btn-success" ng-disabled="registerForm.$invalid" ng-click="saveReg(data)">Submit</button>
                  </div>    
                  </div>  
                 
                </form>
               
            </div>           
    </script>

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
   <script src="angular/adminViewController.js" type="text/javascript"></script>   
   <script src="angular/sharedService.js" type="text/javascript"></script>  
</body>
</html>
<toaster-container></toaster-container>

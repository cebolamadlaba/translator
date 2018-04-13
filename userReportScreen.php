<!DOCTYPE html>
<html lang="en"  ng-app="VerbApp" >
<head>
  <title>User Report</title>
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
<body ng-controller="userViewReportController">
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
        <li ><a href="userScreen.php" style="color:white">Home <span class="sr-only">(current)</span></a></li>
        <li><a href="#"></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color:white;font-size:2em">User Report View </a>
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
<div class="col-md-8"> 
<div id="exportable">
        <div class="col-md-9 " style="text-align: center;"> User Report</div> 
            <table class="table export-table table-bordered  header-fixed">
              <thead>
                 <tr>
                     <th>Name</th>
                     <th>Date Of Birth</th>
                     <th>Contact</th>
                     <th>Gender</th> 
                     <th>Reg Date</th> 
                     <th>Non available word Searched</th>                    
                 </tr>
               </thead>
               <tbody>
                <tr>
                   <td>{{details.user_surname}} {{details.user_name}} </td>
                   <td>{{details.date_of_birth}}</td>
                   <td>{{details.user_cellphone}} {{details.user_email}}</td>
                   <td>{{details.gender}}</td>
                   <td>{{details.created_date}}</td>
                   <td>{{userDverb.userCount}}</td>
                </tr>               
             </tbody>
        </table>
     </div>
     <div class="col-md-2">    
     <select class="form-control"  name="appointment_time"  ng-model="selectedExport"  required>
     <option value='excel'>EXCEL</option>
     <option value="doc">WORD</option>
      <option value="" selected hidden />
   </select>   
   </div>
   <button type="button"  value="submit" class="btn btn-primary" ng-click="eAction(selectedExport)">Export</button>
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
    <script src="js/tableExport.js" type="text/javascript"></script> 
    <script src="js/jquery.base64.js" type="text/javascript"></script>
    <script src="js/sprintf.js" type="text/javascript"></script>
    <script src="js/jspdf.js" type="text/javascript"></script>
    <script src="js/base64.js" type="text/javascript"></script> 
      <!-- Load controllers -->
   <script src="angular/userViewReportController.js" type="text/javascript"></script>   
   <script src="angular/sharedService.js" type="text/javascript"></script>  
</body>
</html>
<toaster-container></toaster-container>

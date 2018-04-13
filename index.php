

<div ng-app="VerbApp">
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

#logo-container{
  margin: auto;
  margin-bottom: 10px;
  width:200px;
  height:30px;
  background-image:url('http://placehold.it/200x30/000000/ffffff/&text=BRAND+LOGO');
}

</style>
<div ng-controller="indexcontroller">
<div class="container">
  <div class="row">
    <div class="Absolute-Center is-Responsive">
      <h1 style="width:200%;color:black">Check if you registered on Setswana Translator</h1>
      <br>
      <div class="col-sm-12 col-md-10 col-md-offset-1">
        <form action="" id="loginForm">
         <ng-form name="mailForm">
          <div class="form-group input-group">         
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input style="width:60%;height:10%" class="form-control" type="text" name='mail'ng-model="data.mail" placeholder="Enter Email"  ng-pattern="/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i" />     
           </div> 
           <span ng-show="mailForm.mail.$error.pattern" style="color:red">Please enter correct email address.</span> 
        </ng-form>      
          <br>      
          <div class="form-group">
            <button type="button" class="btn btn-def btn-block" ng-click="searchMail(data)">Submit</button>
          </div>
        </form>        
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
<script src="angular/indexcontroller.js" type="text/javascript"></script>   
</div>
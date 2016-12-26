
<div class="content-wrapper">
  <section class="content"> 
    <div class="row">
      <div class="col-md-12">


  <title>Angularjs Image Uploading</title>

  <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>


<body ng-controller="myCtrl">
    <div class="file-upload">
        <input type="text" ng-model="name">
        <input type="file" file-model="myFile"/>
        <button ng-click="uploadFile()">upload me</button>
    </div>
</body>

<script type="text/javascript">

  var myApp = angular.module('myApp', []);

myApp.directive('fileModel', ['$parse', function ($parse) {
    return {
    restrict: 'A',
    link: function(scope, element, attrs) {
        var model = $parse(attrs.fileModel);
        var modelSetter = model.assign;

        element.bind('change', function(){
            scope.$apply(function(){
                modelSetter(scope, element[0].files[0]);
            });
        });
    }
   };
}]);

// We can write our own fileUpload service to reuse it in the controller
myApp.service('fileUpload', ['$http', function ($http) {
    this.uploadFileToUrl = function(file, uploadUrl, name){
         var fd = new FormData();
         fd.append('file', file);
         fd.append('name', name);
         $http.post(uploadUrl, fd, {
             transformRequest: angular.identity,
             headers: {'Content-Type': undefined,'Process-Data': false}
         })
         .success(function(){
            console.log("Success");
         })
         .error(function(){
            console.log("Success");
         });
     }
 }]);

 myApp.controller('myCtrl', ['$scope', 'fileUpload', function($scope, fileUpload){

   $scope.uploadFile = function(){
        var file = $scope.myFile;
        console.log('file is ' );
        console.dir(file);

        var uploadUrl = "<?php echo site_url('forms/uploadimg')?>";
        var text = $scope.name;
        fileUpload.uploadFileToUrl(file, uploadUrl, text);
   };

}]);
</script>
</div>
</div>
</section>
</div>


 <!--  <body ng-app="main-App" ng-controller="AdminController">
  <form ng-submit="submit()" name="form" role="form">
    <input ng-model="form.image" type="file" class="form-control input-lg" accept="image/*" onchange="angular.element(this).scope().uploadedFile(this)" style="width:400px" >
    <input type="submit" id="submit" value="Submit" />
    <br/>
    <img ng-src="{{image_source}}" style="width:300px;">
  </form>

  <form ng-submit="submit()" name="form" role="form">
    <input ng-model="form.image" type="file" class="form-control input-lg" accept="image/*" onchange="angular.element(this).scope().uploadedFile(this)" style="width:400px" >
    <input type="submit" id="submit" value="Submit" />
    <br/>
   
  </form>
 -->
  <!-- <script type="text/javascript">

      var app =  angular.module('main-App',[]);


      app.controller('AdminController', function($scope, $http) {


        $scope.form = [];

        $scope.files = [];


        $scope.submit = function() {

          $scope.form.image = $scope.files[0];


          $http({

        method  : 'POST',

        url     : '<?php// echo site_url('forms/uploadimg');?>',

        processData: false,

        transformRequest: function (data) {

            var formData = new FormData();

            formData.append("image", $scope.form.image);  

            return formData;  

        },  

        data : $scope.form,

        headers: {

               'Content-Type': undefined

        }

       }).success(function(data){

            alert(data);

       });


        };


        $scope.uploadedFile = function(element) {

        $scope.currentFile = element.files[0];

        var reader = new FileReader();


        reader.onload = function(event) {

          $scope.image_source = event.target.result

          $scope.$apply(function($scope) {

            $scope.files = element.files;

          });

        }

                    reader.readAsDataURL(element.files[0]);

      }


      });

  </script> -->

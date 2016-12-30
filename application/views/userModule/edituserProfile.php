
<div class="content-wrapper">
  <section class="content"> 
    <div class="row">
      <div class="col-md-12">


  <form name="photo" id="imageUploadForm" enctype="multipart/form-data" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
     <input type="file" id="ImageBrowse"  name="image" size="30"/>
     <input type="text" id="text"  value="nice man" name="text" size="30"/>
     <input type="submit" name="upload" value="Upload" />
   
</form>

<!-- <form action="" id="formContent" method="post" enctype="multipart/form-data" >
        <label for="upload" title="Upload photo"  class="camera"></label>
        <input  type="text" name="id"  required id="id">
        <input  type="file" name="file"  required id="upload">
        <button class="submitI" >Upload Image</button>
</form> -->
<!-- <script>

$("#upload").change(function(){
var file=this.files[0];
var imageFile=file.type;
var match=["image/jpeg","image/png","image/jpg"]; 

if(!((imageFile==match[0]) || (imageFile==match[1]) || (imageFile==match[2]))){
  $("#type").text("Only Jpeg/ Jpg /Png /Gif are allowed");
  return false;
}else{
  $("#type").hide();
  //alert("required");
  var reader=new FileReader();
  reader.onload=imageIsLoaded;
  reader.readAsDataURL(this.files[0]);
}

});
             function imageIsLoaded(e){
      $("#imageReader").attr('src', e.target.result);
         $(".camera").hide();
       $("#imgRead").show();
    }
       
    $("#formContent").submit(function(e){
      e.preventDefault();
       
    var formdata = new FormData(this);
      //formdata.append('file',$('#upload')[0].files[0]);
      $("#uploadIm").show();
      $.ajax({
        url: "<?php //echo site_url('forms/uploadimg');?>",
        type: "POST",
        data: formdata,
        mimeTypes:"multipart/form-data",
        contentType: false,
        cache: false,
        processData: false,
        success: function(data){
            alert(data);
          $("#uploadIm").hide();
          $("#type").show().html("Image uploaded successfully<br><br>File Name:"+data);
                       //document.execCommand("InsertImage", false, "upload/"+data);
          //alert(data);
          //$("#progressbar").hide();
          //location.reload();
          //$("#article").load("submitArticle.php");
          $("#uploadSuccess").attr('src','upload/'+data);
        },error: function(){
          alert("okey");
        }
    });
    });
     </script>   -->

<!-- <form>
    <input type="file" onchange="angular.element(this).scope().setFile(this)"/>
    <button ng-click="submitForm()">Submit</button>
</form> -->
<!-- <script type="text/javascript">
  
$scope.setFile = function(element){
    $scope.$apply(function($scope) {
        $scope.file = element.files[0];
    });
}
 
$scope.submitForm = function() {
    var url="<?php// echo site_url('forms/uploadimg');?>"
    var formData = new FormData();
    formData.append("UploadedFile", $scope.file);
    var xhr = new XMLHttpRequest();
    xhr.open("POST", url);
    xhr.send(formData);
}

</script> -->

<!-- <form id="uploadForm" action="" method="post">
<label>Upload Image File:</label><br/>
<input name="id" type="text" class="inputtext" >
<input name="image" type="file" class="inputFile" />
<input type="submit" value="Submit" class="btnSubmit" />
</form>
 -->
<!-- <script type="text/javascript">
$(document).ready(function (e){
$("#uploadForm").on('submit',(function(e){
e.preventDefault();
$.ajax({
url: "<?php //echo site_url('forms/uploadimg')?>",
type: "POST",
data:  new FormData(this),
contentType: false,
cache: false,
processData:false,
success: function(data){
 alert(data);
},
error: function(){}           
});
}));
});
</script> -->

 <!--  <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script> -->


<!-- <body ng-controller="myCtrl">
    <div class="file-upload">
        <input type="text" ng-model="name">
        <input type="file" file-model="myFile"/>
        <button ng-click="uploadFile()">upload me</button>
    </div>
</body>
 -->
<script type="text/javascript">


// var myApp = angular.module('myApp', []);
// myApp.directive('fileModel', ['$parse', function ($parse) {
//     return {
//     restrict: 'A',
//     link: function(scope, element, attrs) {
//         var model = $parse(attrs.fileModel);
//         var modelSetter = model.assign;

//         element.bind('change', function(){
//             scope.$apply(function(){
//                 modelSetter(scope, element[0].files[0]);
//             });
//         });
//     }
//    };
// }]);

// We can write our own fileUpload service to reuse it in the controller
// myApp.service('fileUpload', ['$http', function ($http) {
//     this.uploadFileToUrl = function(file, uploadUrl, name){
//          var fd = new FormData();
//          fd.append('file', file);
//          fd.append('name', name);
//          $http.post(uploadUrl, fd, {
//              transformRequest: angular.identity,
//              headers: {'Content-Type': undefined,'Process-Data': false}
//          })
//          .success(function(){
//             console.log("Success");
//          })
//          .error(function(){
//             console.log("Success");
//          });
//      }
//  }]);

//  myApp.controller('myCtrl', ['$scope', 'fileUpload', function($scope, fileUpload){

//    $scope.uploadFile = function(){
//         var file = $scope.myFile;
//         console.log('file is ' );
//         console.dir(file);

//         var uploadUrl = "<?//php echo site_url('forms/uploadimg')?>";
//         var text = $scope.name;
//         fileUpload.uploadFileToUrl(file, uploadUrl, text);
//    };

// }]);
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
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="application/javascript">
$(document).ready(function (e) {
       $('#imageUploadForm').on('submit',(function(e) {
          
      var id=$('#text').val();
      var image=$('#ImageBrowse').val();

        alert(id);

        e.preventDefault();
        var formData = new FormData();
        var text = $('input[type=text]').val();
        formData.append('image', $('input[type=file]')[0].files[0]);
        formData.append('test', text);


        $.ajax({
            type:'POST',
            url: $(this).attr('action'),
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
             // alert(data);
               // console.log("success");
               // console.log(data);
                $('#imageUploadForm')[0].reset();
                 },
                error: function(data){
                console.log("error");
                console.log(data);
                }
        });
    }));
        $("#ImageBrowse").on("change", function() {
        $("#imageUploadForm").submit();
    });
});
</script>

<?php
if(isset($_FILES['image'])){
if(!is_dir('uploads')){
mkdir('uploads');
}
//echo "GET TEXT BOX VALUE = ".$_POST['test'];
//$id=$_POST('text');
$ext = pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);
$path = $_FILES['image']['tmp_name'];
$new = "uploads/".'res_'.time().'.'.$ext;

echo $path;
echo $new;

move_uploaded_file($path,$new);

$res = $this->register->saveCSVImage($id,$new);
//echo $res;
}
?>
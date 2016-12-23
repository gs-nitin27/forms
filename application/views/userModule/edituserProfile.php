<style type="text/css">
  @charset "utf-8";
/* CSS Document */

h1{
    font-family: Georgia, "Times New Roman", Times, serif;
    font-size: 170%;
    color: #645348;
    font-weight: 100;
    padding: 10px;
  }
  body{
    background: #E7EDEE;
    width: 100%;
    margin: 0;
    padding: 0;
  }
  .container{
    width: 700px;
    margin: 10px auto;
    padding: 10px 15px;
    background: white;
    border: 2px solid #DBDBDB;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    text-align: center;
    overflow: hidden;
  }
  #preview {
    margin-top:30px;
  }
  #err{
    color: red;
  }
  #preview img{
    max-width: 100%;
    border: solid #cdcdcd 1px;
    padding:5px;
    border-radius: 3px;
    -webkit-box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, .2);
    box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, .2);
    overflow: hidden;
    width:200px;
    height:220px;
  }
  input[type="submit"]{
    border-radius: 10px;
    background-color: #00A2D1;
    border: 0;
    color: white;
    font-weight: bold;
    padding: 6px 15px 5px;
    cursor: pointer;
  }
  #form{
    margin-top: 30px;
    margin-bottom:30px;
  }
</style>
<div class="content-wrapper">
  <section class="content"> 
    <div class="row">
      <div class="col-md-12">


<!-- <form>
    <input id="avatar" type="file" name="avatar" />
    <button id="upload" value="Upload" />
</form> -->




  <title>Angularjs Image Uploading</title>

  <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>





  <body ng-app="main-App" ng-controller="AdminController">
  <form ng-submit="submit()" name="form" role="form">
    <input ng-model="form.image" type="file" class="form-control input-lg" accept="image/*" onchange="angular.element(this).scope().uploadedFile(this)" style="width:400px" >
    <input type="submit" id="submit" value="Submit" />
    <br/>
   <!--  <img ng-src="{{image_source}}" style="width:300px;"> -->
  </form>

  <form ng-submit="submit()" name="form" role="form">
    <input ng-model="form.image" type="file" class="form-control input-lg" accept="image/*" onchange="angular.element(this).scope().uploadedFile(this)" style="width:400px" >
    <input type="submit" id="submit" value="Submit" />
    <br/>
   <!--  <img ng-src="{{image_source}}" style="width:300px;"> -->
  </form>

  <script type="text/javascript">

      var app =  angular.module('main-App',[]);


      app.controller('AdminController', function($scope, $http) {


        $scope.form = [];

        $scope.files = [];


        $scope.submit = function() {

          $scope.form.image = $scope.files[0];


          $http({

        method  : 'POST',

        url     : '<?php echo site_url('forms/uploadimg');?>',

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

  </script>






        <!-- <div><h3>hello here you can upload with csv</h3> -->

  <!--  <div class="container">
  
  <hr>  
  <div id="preview"><img src="<?php// echo base_url('img/no-image.jpg');?>" /></div>
    
  <form id="form" action="#" method="post" enctype="multipart/form-data">
    <input id="uploadImage" type="file" accept="image/*" name="image" />
    <input id="button" type="submit" value="Upload">
  </form>
    <div id="err"></div>
  <hr>
  
</div> -->




<!-- <form name="multiform" id="multiform" action="<?php //echo site_url('forms/imageuploadCSV'); ?>" method="POST" enctype="multipart/form-data">
             <input type="file" name="fileToUpload" id="fileToUpload">
             <input type="submit" value="Upload Image" name="submit">
          </form>
              
              

<form action="<?php //echo site_url('forms/Csvfileupload'); ?>" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form> -->



        </div>
       </div>
      </div>
</section>
</div>

<script type="text/javascript">

function imagesave(){

var data = new FormData(document.getElementById("yourFormID"));


console.log(data)
 //your form ID
var url = $("#yourFormID").attr("<?php echo site_url('forms/uploadimg'); ?>"); // action that you mention in form action.
$.ajax({
    type: "POST",
    url: url,
    data:  data,
    enctype: 'multipart/form-data',
    processData: false,  // tell jQuery not to process the data
    contentType: false,   // tell jQuery not to set contentType
    dataType: "json",
    success: function(response)
    {
        // some code after succes from php
    },
    beforeSend: function()
    {
        // some code before request send if required like LOADING....
    }
});

}
</script>
<script>


    //   $(document).on("click", "#upload", function() {
    //   var file_data = $("#avatar").prop("files")[0];   
    //   // var form_data = new FormData();                  
    //   form_data.append("file", file_data)   

    //   console.log(JSON.stringify(form_data));     
    //   // form_data.append("user_id", 123)                 
    //   $.ajax({
    //                 url: "<?php //echo site_url('forms/uploadimg'); ?>",
    //                 dataType: 'script',
    //                 cache: false,
    //                 contentType: false,
    //                 processData: false,
    //                 data: form_data,                         // Setting the data attribute of ajax with file_data
    //                 type: 'post'
    //        });
    // });



// $(document).ready(function (e) {
//   $("#form").on('submit',(function(e) {
//     e.preventDefault();
//     $.ajax({
    
//      url: "<?php //echo site_url('forms/uploadimg'); ?>",
//       type: "POST",
//       data:  new FormData(this),
//       contentType: false,
//           cache: false,
//       processData:false,
//       beforeSend : function()
//       {
//         //$("#preview").fadeOut();
//         $("#err").fadeOut();
//       },
//       success: function(data)
//         {
//         if(data=='invalid')
//         {
//           // invalid file format.
//           $("#err").html("Invalid File !").fadeIn();
//         }
//         else
//         {
//           // view uploaded file.
//           $("#preview").html(data).fadeIn();
//           $("#form")[0].reset();  
//         }
//         },
//         error: function(e) 
//         {
//         $("#err").html(e).fadeIn();
//         }           
//      });
//   }));
// });


</script>

<!-- <script type="text/javascript">



$(document).on("click", "#upload", function() {
  var file_data = $("#avatar").prop("files")[0];   // Getting the properties of file from file field
  var form_data = new FormData();                  // Creating object of FormData class
  form_data.append("file", file_data)              // Appending parameter named file with properties of file_field to form_data
  form_data.append("user_id", 123)   
                 alert("hiii"); 
  $.ajax({
             
                url: "<?php //.echo base_url('forms/imageuploadCSV');?>",,
                dataType: 'script',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                         // Setting the data attribute of ajax with file_data
                type: 'post'
       });
});





// function upload(){
//           $.ajax({
//                 url: "<?php// echo base_url('forms/uploadimg');?>", // Url to which the request is send
//                 type: "POST",             // Type of request to be send, called as method
//                 data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
//                 contentType: false,       // The content type used when sending data to the server.
//                 cache: false,             // To unable request pages to be cached
//                 processData:false,        // To send DOMDocument or non processed data file it is set to false
//                 success: function(data)   // A function to be called if request succeeds
//                {
//                 alert("hi");
//               // $('#loading').hide();
//               // $("#message").html(data);
//                }
//                 });
//                   }


//   function readURL(input, target) {
//         if (input.files && input.files[0]) {
//             var reader = new FileReader();
//             var image_target = $(target);
//             reader.onload = function (e) {
//                 image_target.attr('src', e.target.result).show();
//             };
//             reader.readAsDataURL(input.files[0]);
//          }
//      }
</script> -->
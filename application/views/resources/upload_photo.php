<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
</head>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>

<div class="loading" id="imagelodar" hidden="">Loading&#8230;</div>

<div class="wrapper">
  <div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header" style="text-align: center;">
              <h2 class="box-title"><b>Resource List</b></h2>
               </div>
               <div class="box-body">
               <table id="example1" class="table table-bordered table-striped">
               <thead>
               <tr>
               <th style="width: 10px; background: #5262bc; color: #ffffff;">#</th>
               <th style="background: #5262bc; color:#ffffff;">Title<img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th>
               <th style="background: #5262bc; color: #ffffff;">Image <img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th>
               <th style="background: #5262bc; color: #ffffff;">Image Upload<img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th>
               <th style="background: #5262bc; color: #ffffff;">Save Image  <img src="<?php echo base_url('img/sort.png')?>" alt="" height=10px width=10px></img></th>
               </tr>
               </thead>
		        	 <tbody>
               
                  <?php 
                       $i=1; 
                      
                        if($resourcesArray){
                       foreach ($resourcesArray as $res) {
                       $resource=$this->register->getResourceInfo($res);      
                    ?>
                    <tr>
                    <td><?php echo $i++; ?></td>
                    <td style="width:400px"><?php echo $resource[0]['title']; ?></td>

                    <td style="width:200px">
                     <!--  <?php //if($resource[0]['image']) { print_r($resource[0]['image']); ?> -->
                    <img style="width: 75px;height: 50px;" id="<?php echo $resource[0]['id']; ?>" src="<?php echo base_url('img/no-image.jpg')?>"/>
                     <!--  <?php// } else { ?> -->
                      <!-- <img style="width: 75px;height: 50px;" src="<?php// echo base_url('img/no-image.jpg')?>"/>
                      <?php// } ?> -->
                    </td>	



                 <!-- <form id="uploadForm" action="" method="post">
                 <td><input name="id" type="text" class="inputtext" value="<?php// echo $resource[0]['id'];?>" >
                 <input name="image" type="file" class="inputFile" /></td>
                 <td><input type="button" value="Submit" class="btnSubmit" /></td>
                 </form> -->

                      <td><body ng-app="main-App" ng-controller="AdminController">
                      <form ng-submit="submit()" name="form" role="form">



             <!--  <input name="resid" type="text" id="resid" value="{{<?php// echo $resource[0]['id'];?>}}" >  -->
        
                  

              <input ng-model="form.image" type="file" name="<?php echo $resource[0]['id']; ?>" id="<?php echo $resource[0]['id']; ?>" class="form-control input-lg" accept="image/*" onchange="angular.element(this).scope().uploadedFile(this)" onclick="getid(id);" style="width:300px;height: 0%;"></td>

                       <td style="text-align: center;width:98px;" >
                       <input type="submit" id="submit" value="Submit" />

                      <!--  <input type="text"  id="<?php// echo $resource[0]['id']; ?>"  value="<?php// echo $resource[0]['id']; ?>" /> -->
                        <img src="<?php echo base_url("img/loader.gif");?>"   id="<?php echo 'id'.$resource[0]['id']; ?>" hidden></img> 
                        <label id="<?php echo 'msg'.$resource[0]['id']; ?>" hidden>Uploaded </label>
                       </td>
                        </form>
                </tr>
                <?php  }
                       }
                     else {
                      echo "No data Uploaded";} ?>
                </tbody>
                <tfoot>
                 <tr>
                 <th style="width: 10px; background: #5262bc; color: #ffffff;">#</th>
                  <th style="background: #5262bc; color: #ffffff;">Title</th>
                  <th style="background: #5262bc; color: #ffffff;">Image</th>
                  <th style="background: #5262bc; color: #ffffff;">Image Upload</th>
                  <th style="background: #5262bc; color: #ffffff;">Save Image </th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
  <div class="control-sidebar-bg"></div>
</div>
</div>

<script type="text/javascript" src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.min.js'); ?>"></script>

<script>
  $(function () {
    $("#example1").DataTable();
  });
</script>

<script type="text/javascript">
      var app =  angular.module('main-App',[]);
      app.controller('AdminController', function($scope, $http) {
      
      var imgid='';
      $scope.form = [];
      $scope.files = [];
      getid = function(id)
      {
        
        imgid = id;

      }
      $scope.submit = function() {
         var loader = '#' +'id' + imgid;
        // alert(loader);
          // $(loader).show();
           $('#imagelodar').show();

      $scope.form.image = $scope.files[0];
      console.log($scope.files[0]);
      //$scope.form.image= $scope.files[0];
      $http({
        method  : 'POST',
        url     : '<?php echo site_url('forms/uploadimg');?>',
        processData: false,
        transformRequest: function (data) {
            var formData = new FormData();
            formData.append("image", $scope.form.image);  
            formData.append("resid", imgid);
             //formData.append("image", $scope.form.name);
            return formData;  
        },  
        data : $scope.form,
        headers: {
               'Content-Type': undefined
        }
       }).success(function(data){
          //alert(data);
          var loader = '#' + 'id' + imgid;
          var msg = '#' + 'msg' + imgid;
          $(msg).show();
          $(loader).hide();
          $('#imagelodar').hide();
          var textid= "#" + imgid ;
         $(textid).attr("src","<?php  echo base_url()."uploads/resources/"; ?>" + data );
            
       });
        };
          $scope.uploadedFile = function(element,name) {
          $scope.currentFile  = element.files[0];
          //$scope.currentFile  = id;
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









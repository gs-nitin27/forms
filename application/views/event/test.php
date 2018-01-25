
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
 <section class="content-header">
  <script data-require="angular.js@*" data-semver="1.3.0-beta.5" src="https://code.angularjs.org/1.3.0-beta.5/angular.js"></script>

  <link rel="stylesheet" href="<?php echo base_url('assets/inputfieldadd/style.css');?>" type="text/ css" media="all" />
  <script  src= "<?php echo base_url('assets/inputfieldadd/script.js'); ?>"></script>


 <div ng-app="myApp" class="form-group">
  <form ng-controller="NewTableCtrl" ng-submit="submitTable()">
    <input ng-repeat="field in table.fields track by $index" class="form-control" type='text' ng-model='table.fields[$index]' placeholder='Field:'>
    <div>
      <button type='submit' onclick="ndata();">Submit</button>
      <button ng-click="addFormField()">Add</button>
    </div>
    <pre id="textdata" dissable>{{ table | json }}</pre>
  </form>
  </div>
  </section>
  </div>
  <script type="text/javascript">
    function ndata() {
      alert($("#textdata").text());
    }
  </script>


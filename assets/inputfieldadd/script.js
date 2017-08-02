var app = angular.module('myApp', []);

app.controller('NewTableCtrl', function($scope) {
  
  $scope.table = { conditation : [] };

  $scope.addFormField = function() {
    $scope.table.fields.push('');
  }

  $scope.submitTable = function() { 
    console.log($scope.table);
  }
  
});
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <script src="bower_components/angular/angular.min.js"></script>
    <script src="bower_components/angular-ui-select/dist/select.min.js"></script>
    <script src="bower_components/angular-sanitize/angular-sanitize.min.js"></script>
    <link rel="stylesheet" type="text/css" href="bower_components/angular-ui-select/dist/select.css">
    <link rel="stylesheet" type="text/css" href="bower_components/bootstrap/dist/css/bootstrap.css">

</head>
<body ng-app="app" >

    <div ng-controller="ctrl" >

  <span>Selected: {name: {{selectedItem.name}}, id: {{selectedItem.id}} }</span>
  <ui-select ng-model="selectedItem">
    <ui-select-match>
        <span ng-bind="$select.selected.name"></span>
    </ui-select-match>
    <ui-select-choices repeat="item in (itemArray | filter: $select.search) track by item.id">
        <span ng-bind="item.name"></span>
    </ui-select-choices>
  </ui-select>


    </div>


    <script>
        var module = angular.module('app', ['ui.select', 'ngSanitize']);

        
        angular.module('app')
        .controller('ctrl', ['$scope', function ($scope){
            $scope.itemArray = [
                {id: 1, name: 'first'},
                {id: 2, name: 'second'},
                {id: 3, name: 'third'},
                {id: 4, name: 'fourth'},
                {id: 5, name: 'fifth'},
            ];

            $scope.selectedItem = $scope.itemArray[0];
        }]);

    </script>


</body>
</html>
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
    

    <?php if (! empty( $_POST )): ?>
        
    <?php 
        echo '<pre>'; 
        print_r( $_POST );
        echo '</pre>'; 
    
    ?>

    <?php endif ?>


    <form action="" method="post" accept-charset="utf-8" >

        <div class="ng-cloak" ng-controller="DemoCtrl as ctrl" >

            <p>Selected: {{ctrl.country.selected}}</p>
            <ui-select  ng-model="ctrl.country.selected" ng-disabled="ctrl.disabled" style="width: 300px;" title="Choose a country">
                <ui-select-match placeholder="Select or search a country in the list...">{{$select.selected.name}}</ui-select-match>
                <ui-select-choices repeat="country in ctrl.countries | filter: $select.search">
                    <span ng-bind-html="country.name | highlight: $select.search"></span>
                    <small ng-bind-html="country.code | highlight: $select.search"></small>
                </ui-select-choices>
            </ui-select>
            <input type="hidden" name="country_2" ng-value="ctrl.country.selected.name" />

        </div>

        <hr>
        <button type="sublimt"> sent </button>

    </form>


    <script>
        var module = angular.module('app', ['ui.select', 'ngSanitize']);


        angular.module('app')
        .controller('DemoCtrl', function ($scope, $http, $timeout, $interval) {
            var vm = this;
            vm.disabled = undefined;
            vm.country = {};
            vm.countries = [ 
                {name: 'Afghanistan', code: 'AF'},
                {name: 'Åland Islands', code: 'AX'},
                {name: 'Albania', code: 'AL'}
            ]


        });



    </script>


</body>
</html>
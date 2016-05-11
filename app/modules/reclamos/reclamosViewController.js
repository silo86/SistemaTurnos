/**
 * Created by silo on 11/03/2016.
 */
var reclamos = angular.module('reclamos',[]);

reclamos.controller('reclamosController', ['$scope','$http', function($scope, $http) {

    $scope.a = parseInt('2016-02-03') ;
    console.log($scope.a);
    $scope.reclamos = [];
    $scope.misoptions = ['a', 'bb'];
    $scope.misoptions2 = ['b', 'a'];






    $scope.getReclamos = function(){
        $http({
            method: 'GET',
            url: 'http://127.0.0.1/sistemaReclamo/api/reclamos.php'
        }).success(function(response){
            console.log(response);

            $scope.reclamos = response;

            /*        angular.forEach($scope.clientes, function(value, key){

             })*/
        }).error(function(response){
            console.log(response);
        });
    };


    $scope.getReclamos();
    $scope.quitarFiltros = function(){
        $scope.localidad=null;
        $scope.Tramite=null;
        $scope.Prioridad=null;
        $scope.Estado=null;
        $scope.Fecha = null;
    };






    $scope.show = function(reclamo){
        if(!$scope.localidad && !$scope.Prioridad && !$scope.Tramite && !$scope.Estado){
            return true;
        }
        if (reclamo.Area == $scope.localidad && $scope.Tramite==null && $scope.Prioridad==null && $scope.Estado==null) {

                return true;
        }
        if(reclamo.Area==$scope.localidad && reclamo.Tramite==$scope.Tramite && reclamo.Prioridad==$scope.Prioridad && !$scope.Estado==null) {
            return true;
        }
        if(reclamo.Area==$scope.localidad && reclamo.Tramite==$scope.Tramite && reclamo.Prioridad==$scope.Prioridad && reclamo.Estado==$scope.Estado){
            return true;
        }
        if(!$scope.localidad && reclamo.Tramite==$scope.Tramite && !$scope.Prioridad && !$scope.Estado){
            return true;
        }
        if(!$scope.localidad && !!$scope.Tramite && reclamo.Prioridad==!$scope.Prioridad && !!$scope.Estado){
            return true;
        }
        if(!$scope.localidad && !$scope.Tramite && !$scope.Prioridad && reclamo.Estado==$scope.Estado){
            return true;
        }
        if(!$scope.localidad && reclamo.Tramite==$scope.Tramite && reclamo.Prioridad==$scope.Prioridad && !$scope.Estado){
            return true;
        }
        if(!$scope.localidad && reclamo.Tramite==$scope.Tramite && reclamo.Prioridad==$scope.Prioridad && reclamo.Estado==$scope.Estado){
            return true;
        }
        if(reclamo.Area==$scope.localidad && !$scope.Tramite && reclamo.Prioridad==$scope.Prioridad && !$scope.Estado){
            return true;
        }
        if(reclamo.Area==$scope.localidad && !$scope.Tramite && reclamo.Prioridad==$scope.Prioridad && reclamo.Estado==$scope.Estado){
            return true;
        }
        if(reclamo.Area==$scope.localidad && !$scope.Tramite && !$scope.Prioridad && reclamo.Estado==$scope.Estado){
            return true;
        }
        if(reclamo.Area==$scope.localidad && reclamo.Tramite==$scope.Tramite && !$scope.Prioridad && reclamo.Estado==$scope.Estado){
            return true;
        }
        if(!$scope.localidad && !$scope.Tramite && reclamo.Prioridad==$scope.Prioridad && reclamo.Estado==$scope.Estado){
            return true;
        }
        if(!$scope.localidad && reclamo.Tramite==$scope.Tramite && !$scope.Prioridad && reclamo.Estado==$scope.Estado){
            return true;
        }
        if(reclamo.Area==$scope.localidad && reclamo.Tramite==$scope.Tramite && !$scope.Prioridad && !$scope.Estado){
            return true;
        }
        if(reclamo.Area==$scope.localidad && reclamo.Tramite==$scope.Tramite && reclamo.Prioridad==$scope.Prioridad && !$scope.Estado){
            return true;
        }
        if ($scope.Fecha < reclamo.FechaInicio && !$scope.localidad && !$scope.Prioridad && !$scope.Tramite && !$scope.Estado){
            return true;

        }





    };



}]);

reclamos.directive('idearSelect', function(){
    return{
        restrict: 'E',
        template: '<div id="insert-here"> div </div>',
        scope: {
            options: '=data'
        },
        controller: function($scope){

        },
        link: function(scope, elem, attr){

//var options = ["aasdf", "b", "c", "d"];

            var insertPoint = 'insert-here';
            var numberOfDropdowns = 0;
// create the button

//var button = angular.createElement('BUTTON');
            var button = document.createElement('BUTTON');
            button.id = numberOfDropdowns; // this is how Material Design associates option/button
//button.setAttribute('id', numberOfDropdowns);

            button.setAttribute('class', 'mdl-button mdl-js-button');

            button.innerHTML = 'Default';

            document.getElementById(insertPoint).appendChild(button);

// add the options to the button (unordered list)
            var ul = document.createElement('UL');
            ul.setAttribute('class', 'mdl-menu mdl-js-menu mdl-js-ripple-effect');
            ul.setAttribute('for', numberOfDropdowns); // associate button
            for (var index in scope.options) {
// add each item to the list
                var li = document.createElement('LI');
                li.setAttribute('class', 'mdl-menu__item');
                li.innerHTML = scope.options[index];
                li.button = button;
                li.onclick = function() {
                    this.button.innerHTML = this.innerHTML;
                };
                ul.appendChild(li);
            }
            document.getElementById(insertPoint).appendChild(ul);
            numberOfDropdowns = numberOfDropdowns + 1 ;
// and finally add the list to the HTML

        }
    };
});


angular.module('HealthOnApp.controllers', ['infinite-scroll']).
  controller('clientsController', function($scope, ergastAPIservice) {
    $scope.nameFilter = null;
    $scope.clientsList = [];

    ergastAPIservice.getDrivers().success(function (response) {
        //Dig into the responde to get the relevant data
        $scope.clientsList = response
    });
  });
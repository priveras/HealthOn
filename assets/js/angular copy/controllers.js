angular.module('HealthOnApp.controllers', []).
  controller('clientsController', function($scope, ergastAPIservice) {
    $scope.nameFilter = null;
    $scope.clientsList = [];

    ergastAPIservice.getDrivers().success(function (response) {
        //Dig into the responde to get the relevant data
        $scope.clientsList = response;
    });
  });
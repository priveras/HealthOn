angular.module('HealthOnApp2.controllers', ['infinite-scroll']).
  controller('suppliersController', function($scope, ergastAPIservice) {
    $scope.nameFilter = null;
    $scope.suppliersList = [];

    ergastAPIservice.getDrivers().success(function (response) {
        //Dig into the responde to get the relevant data
        $scope.suppliersList = response
    });
  });
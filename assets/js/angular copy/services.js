angular.module('HealthOnApp.services', []).
  factory('ergastAPIservice', function($http) {

    var ergastAPI = {};

    ergastAPI.getDrivers = function() {
      return $http({
        method: 'JSON', 
        url: 'http://localhost:8888/codeigniter/HealthOn/main/json_clients'
      });
    }

    return ergastAPI;
  });
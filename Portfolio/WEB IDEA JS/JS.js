var app = angular.module('fruteriaApp', ['ngSanitize']);
app.controller('contenidoController', function($scope, $http, $sce, $compile) {
  $scope.noticiasExtras = 0;
  $scope.textoBoton = 'Cargar Más Noticias';

  $scope.cargarMasNoticias = function() {
    if ($scope.noticiasExtras === 0) {
      $scope.noticiasExtras = 2;
      $scope.textoBoton = 'Cargar Menos Noticias';
    } else {
      $scope.noticiasExtras = 0;
      $scope.textoBoton = 'Cargar Más Noticias';
    }
  };
});

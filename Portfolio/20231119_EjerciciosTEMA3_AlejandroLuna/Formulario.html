<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Ejemplo</title>
    <link rel="stylesheet" href="formularioCSS.css">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: { lat: 40.7128, lng: -74.0060 },
                zoom: 12
            });
        }
    </script>
</head>
<body ng-app="myApp" ng-controller="formCtrl">

<div class="container">
    <h1>Formulario de Ejemplo</h1>
    <center>
        <form ng-submit="submitForm()">
            <label>Nombre:</label>
            <input type="text" ng-model="formData.nombre" required><br><br>

            <label>Edad:</label>
            <input type="number" ng-model="formData.edad" required><br><br>

            <label>País:</label>
            <select ng-model="formData.pais">
                <option value="España" selected>España</option>
                <option value="Francia">Francia</option>
                <option value="Alemania">Alemania</option>
            </select><br><br>

            <label>Comentarios:</label>
            <textarea ng-model="formData.comentarios"></textarea><br><br>

            <label>Fecha de Nacimiento:</label>
            <input type="date" ng-model="formData.fechaNacimiento" required><br><br>

            <label>Hora de Contacto:</label>
            <input type="time" ng-model="formData.horaContacto" required><br><br>

            <label>¿Tiene experiencia laboral?</label>
            <input type="checkbox" ng-model="formData.experienciaLaboral"><br><br>

            <label>¿Nivel de Educación?</label><br>
            <input type="radio" ng-model="formData.nivelEducacion" value="Bachiller"> Bachiller<br>
            <input type="radio" ng-model="formData.nivelEducacion" value="Universidad"> Universidad<br>
            <input type="radio" ng-model="formData.nivelEducacion" value="Posgrado"> Posgrado<br><br>

            <input type="submit" value="Enviar">
            <button type="button" ng-click="clearForm()">Borrar Formulario</button>
        </form>
    </center>

    <div ng-show="mostrarDatos">
        <h2>Datos del Formulario</h2>
        <p>Nombre: {{formData.nombre}}</p>
        <p>Edad: {{formData.edad}}</p>
        <p>País: {{formData.pais}}</p>
        <p>Comentarios: {{formData.comentarios}}</p>
        <p>Fecha de Nacimiento: {{formData.fechaNacimiento}}</p>
        <p>Hora de Contacto: {{formData.horaContacto}}</p>
        <p>Experiencia Laboral: {{formData.experienciaLaboral ? 'Sí' : 'No'}}</p>
        <p>Nivel de Educación: {{formData.nivelEducacion}}</p>
    </div>

    <div id="map"></div>

    <div class="redes">
        <a href="https://mcdonalds.es/">Enlace a red social</a>
    </div>

    <button ng-click="changeColor()">Cambiar Color</button>
</div>
<script>
    angular.module('myApp', [])
        .controller('formCtrl', function ($scope) {
            $scope.formData = {};
            $scope.mostrarDatos = false;

            $scope.submitForm = function () {
                $scope.mostrarDatos = true;
            };

            $scope.clearForm = function () {
                $scope.formData = {};
                $scope.mostrarDatos = false;
            };

            $scope.changeColor = function () {
                var elements = document.querySelectorAll('input[type="text"], input[type="number"], textarea');
                elements.forEach(function (element) {
                    element.style.backgroundColor = '#4CAF50';
                });
            };
        });
        
        var map = L.map('map').setView([40.7128, -74.0060], 12); 

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        var marker = L.marker([40.7128, -74.0060]).addTo(map); 
</script>
</body>
</html>
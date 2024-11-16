<?php
$fecha = date("Y");
/*<?php
echo date("Y"); // Muestra la fecha en formato Año-Mes-Día, por ejemplo: 2024-11-15
?>*/
echo "<footer class='bg-dark-subtle footer'>";
echo "<div class='container-fluid m-0 py-5'>";
echo "<div class='row text-center'>";
echo "<p class='font-weight-bold col'>Programacion Avanzada 2</p>";
echo "</div>";
echo "<div class='row text-center'>";
echo "<small class='col'>&copy; Copyright 2024-$fecha <b>UTN FRGP</b> - Todos los Derechos Reservados</small>";
echo "</div>";
echo "</div>";
echo "</footer>";
?>
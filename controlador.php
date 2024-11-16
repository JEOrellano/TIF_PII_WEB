<?php
// Incluir el archivo de modelo
require 'modelo.php';

$conn = conectarBD();


// c/u de las consultas-módulo
$resultRespondentes = obtenerRespondentesPorGenero($conn);

$resultGeneral = obtenerGeneroSalario($conn);

$resultEstudios = obtenerEstudiosIngresos($conn);

$resultRubro = obtenerRubroSalario($conn);

$resultConformidad = obtenerConformidadPorSexo($conn);

$conformidadData = [];
if ($resultConformidad && $resultConformidad->num_rows > 0) {
    while ($row = $resultConformidad->fetch_assoc()) {
        $sexo = $row['sexo'];
        $conformidad = $row['conformidad'];
        $porcentaje = $row['porcentaje_respuestas'];
        
        $conformidadData[$sexo][$conformidad] = $porcentaje;
    }
}

$conn->close();
// los 'modulos' require agrupados acá
require 'vistas/index.php'

?>

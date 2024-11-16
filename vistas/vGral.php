<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de la Encuesta</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Tabla de Género y Rango de Salario Promedio</h2>
        <?php

        if ($resultGeneral->num_rows > 0) {
            echo "<div class='row'>"; 
            
            // Recorremos los resultados
            while ($row = $resultGeneral->fetch_assoc()) {
                
                echo "<div class='col-md-6 mb-4'>"; 
                echo "<div class='card shadow-sm'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title' style='font-size: 0.8rem;'>" . htmlspecialchars($row["genero"]) . "</h5>"; 
                echo "<p class='card-text' style='font-size: 1.25rem;'>" . htmlspecialchars($row["rango_salario"]) . "</p>"; // Rango de salario
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
            
            echo "</div>"; 
        } else {
            echo "<div class='alert alert-warning text-center'>No se encontraron resultados para la primera consulta</div>";
        }

        /*
        if ($resultGeneral->num_rows > 0) {
            echo "<table class='table table-striped table-bordered'>";
            echo "<thead class='thead-dark'><tr><th>Género</th><th>Rango de Salario</th></tr></thead>";
            echo "<tbody>";
            while ($row = $resultGeneral->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row["genero"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["rango_salario"]) . "</td>";
                echo "</tr>";
            }
            echo "</tbody></table>";
        } else {
            echo "<div class='alert alert-warning text-center'>No se encontraron resultados para la primera consulta</div>";
        }
        */


        echo "<h2 class='text-center mt-5 mb-4'>Tabla de Sexo, Nivel de Estudios y Promedio de Ingresos</h2>";
        if ($resultEstudios->num_rows > 0) {
            echo "<table class='table table-striped table-bordered'>";
            echo "<thead class='thead-dark'><tr><th>Sexo</th><th>Nivel de Estudios</th><th>Promedio de Ingresos</th></tr></thead>";
            echo "<tbody>";
            while ($row = $resultEstudios->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row["sexo"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["nivelEstudios"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["promedio_ingresos"]) . "</td>";
                echo "</tr>";
            }
            echo "</tbody></table>";
        } else {
            echo "<div class='alert alert-warning text-center'>No se encontraron resultados para la segunda consulta</div>";
        }

        echo "<h2 class='text-center mt-5 mb-4'>Tabla de Sexo, Rubro y Rango de Salario</h2>";
        if ($resultRubro->num_rows > 0) {
            echo "<table class='table table-striped table-bordered'>";
            echo "<thead class='thead-dark'><tr><th>Sexo</th><th>Rubro</th><th>Rango de Salario</th></tr></thead>";
            echo "<tbody>";
            while ($row = $resultRubro->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row["sexo"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["rubro"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["rango_salario"]) . "</td>";
                echo "</tr>";
            }
            echo "</tbody></table>";
        } else {
            echo "<div class='alert alert-warning text-center'>No se encontraron resultados para la tercera consulta</div>";
        }

        echo "<h2 class='text-center mt-5 mb-4'>Tabla de Conformidad por Sexo</h2>";
        
        if ($resultConformidad->num_rows > 0) {
            echo "<table class='table table-striped table-bordered'>";
            echo "<thead class='thead-dark'><tr><th>Sexo</th><th>Conformidad</th><th>Porcentaje de Respuestas</th></tr></thead>";
            echo "<tbody>";
            while ($row = $resultConformidad->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row["sexo"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["conformidad"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["porcentaje_respuestas"]) . "%</td>";
                echo "</tr>";
            }
            echo "</tbody></table>";
        } else {
            echo "<div class='alert alert-warning text-center'>No se encontraron resultados para la cuarta consulta</div>";
        }


        ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

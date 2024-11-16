<?php
 echo "<h2 class='text-center mt-5 mb-4'>Ingresos Según Nivel de Estudios</h2>";
        if ($resultEstudios->num_rows > 0) {
            echo "<table class='table table-striped table-bordered'>";
            echo "<thead class='thead-dark'><tr><th>Género</th><th>Nivel de Estudios</th><th>Promedio de Ingresos</th></tr></thead>";
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

        echo "<hr class='my-4 border-primary'>";
?>
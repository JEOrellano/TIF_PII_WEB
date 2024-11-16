<?php
echo "<h2 class='text-center mt-5 mb-4'>Ingresos Según Rubro o Especialidad</h2>";
        if ($resultRubro->num_rows > 0) {
            echo "<table class='table table-striped table-bordered'>";
            echo "<thead class='thead-dark'><tr><th>Género</th><th>Rubro</th><th>Rango de Salario</th></tr></thead>";
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
            echo "<div class='alert alert-warning text-center'>No se encontraron resultados para la consulta Rubro o Especialidad</div>";
        }

        echo "<hr class='my-4 border-primary'>";
?>
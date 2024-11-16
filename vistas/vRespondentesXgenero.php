<?php
echo "<h5 class='text-center mb-4'><em>Cantidad de Respondentes por Género</em></h5>";
        

        if ($resultRespondentes->num_rows > 0) {
            echo "<div class='row'>"; 
                   
            while ($row = $resultRespondentes->fetch_assoc()) {
                          
               
                
                echo "<div class='col-md-6 mb-4'>";  
                echo "<div class='card shadow-sm'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title' style='font-size: 0.8rem;'>" . htmlspecialchars($row["genero"]) . "</h5>"; 
                echo "<p class='card-text' style='font-size: 1.25rem;'>" . htmlspecialchars($row["cantidad"]) . "</p>"; 
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
            
            echo "</div>"; 
        } else {
            echo "<div class='alert alert-warning text-center'>No se encontraron resultados para la primera consulta</div>";
        }

?>
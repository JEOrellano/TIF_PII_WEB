<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encuesta de Brecha Salarial de Género</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
         <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
     <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <style>
        body {
            
            background-image: URL("https://img.freepik.com/vector-gratis/tema-fondo-abstracto-blanco_23-2148830881.jpg");
            background-repeat: no-repeat;
            background-size:cover;
          
        }
        h1, h3, h4 {
            text-align: center;
            margin-bottom: 15px;
        }
        .highlight-box {
            background-color: #e3f2fd;
            border: 1px solid #90caf9;
            border-radius: 10px;
            padding: 20px;
            margin: 20px auto;
            max-width: 600px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .btn-custom {
            margin: 30px 0;
            background-color: #2196f3;
            color: #fff;
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .btn-custom:hover {
            background-color: #1976d2;
        }
        .developer-section {
            margin-top: 40px;
            text-align: center;
        }
        .developer-box {
            background-color: #f0f0f0;
            border-radius: 10px;
            padding: 15px 15px 5px 15px; /* 5px en la parte inferior */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: fit-content; 
            max-width: 100%; 
            margin: 0 auto; 
        }
        
        .developer-box h6 {
            font-weight: bold;
            margin-bottom: 10px;
            font-size: 0.85rem; 
        }

        /* Estilo de los elementos de los desarrolladores */
        .developer-list {
            list-style: none;
            padding: 0;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            margin: 0; 
        }
        .developer-item {
            margin: 5px 10px; 
            font-size: 0.8rem; 
            display: flex;
            align-items: center;
        }
        .developer-icon {
            font-size: 1.1rem; 
            color: #2196f3;
            margin-right: 8px;
        }
    </style>
</head>
<body>
    <br />
    <div class="container text-center">
     <!-- Breadcrumb para navegación -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Portada /</li>
        </ol>
    </nav>
        <!-- Subtítulo -->
        <h4>Central Rosario Ltd.</h4>
        <!-- Título principal -->
        <h1>Encuesta de Brecha Salarial de Género</h1>
        <h3>Módulo de análisis</h3>

        <!-- Cantidad de encuestas realizadas -->
        <div class="highlight-box">
            <p class="lead m-0">Cantidad de encuestas realizadas:</p>
            <h3 class="font-weight-bold">
                <?php
                require 'modelo.php';
                $conn = conectarBD();
                $countQuery = "SELECT COUNT(*) AS total FROM Encuesta";
                $result = $conn->query($countQuery);
                if ($result && $row = $result->fetch_assoc()) {
                    echo htmlspecialchars($row['total']);
                } else {
                    echo "N/D";
                }
                $conn->close();
                ?>
            </h3>
        </div>
        
        <!-- Botón de navegación -->
        <a href="controlador.php" class="btn btn-custom btn-lg">Analizar Datos</a>
        <br>
         <!--<a href="https://app.powerbi.com/reportEmbed?reportId=f4e79ada-7c02-41c8-841c-0fe7751e4fc5&autoAuth=true&ctid=57dbd56f-b6e0-4b0a-920a-52f15e3d178c" class="btn btn-custom btn-lg">Analizar en PBI</a>-->
          <a href="vistas/index2.php" class="btn btn-custom btn-lg">Base Completa</a>
        <!-- Sección de créditos -->
        <div class="developer-section">
            <div class="developer-box">
                <h6>Desarrollado para la UTN-FRGP por:</h6>
                <ul class="developer-list">
                    <li class="developer-item">
                        <i class="developer-icon fas fa-user"></i>
                        Diaz, Juan Pablo
                    </li>
                    <li class="developer-item">
                        <i class="developer-icon fas fa-user"></i>
                        Encinas, William Iván
                    </li>
                    <li class="developer-item">
                        <i class="developer-icon fas fa-user"></i>
                        Orellano, Esteban Joselo
                    </li>
                    <li class="developer-item">
                        <i class="developer-icon fas fa-user"></i>
                        Silva, Carlos Andres
                    </li>
                    <li class="developer-item">
                        <i class="developer-icon fas fa-user"></i>
                        Ayala, Orlando Gastón
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- dependencias -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
</body>
</html>

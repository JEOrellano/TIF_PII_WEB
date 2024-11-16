<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de la Encuesta</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/styles.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <!-- Breadcrumb para navegación -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../token1234.php">Portada</a></li>
                <li class="breadcrumb-item active" aria-current="page">Análisis de Encuestas</li>
            </ol>
        </nav>

        <div class="container text-center">
            <div class="row align-items-start">
                <div class="col">
                    <?php
                    require 'vPromSalarioXgenero.php';
                    require 'vRespondentesXgenero.php';
                    ?>
                </div>
                <div class="col">
                    <?php
                    require 'vSubjetivaGraph.php';
                    ?>
                </div>
            </div>
        </div>
        <hr class='my-4 border-primary'>
        <?php
        require 'vIngresosXestudios.php';
        require 'vIngresosXrubro.php';
        ?>
        <!-- Breadcrumb para navegación -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../token1234.php">Portada</a></li>
                <li class="breadcrumb-item active" aria-current="page">Análisis de Encuestas</li>
            </ol>
        </nav>
    </div>

    <!-- Footer -->
    <?php
    require 'footer.php';
    ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
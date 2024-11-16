<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Porcentaje de Conformidad por Sexo</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">¿Considera su remuneración acorde a el trabajo realizado?</h2>
        <canvas id="conformidadChart" width="400" height="200"></canvas>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    
    <script>
        
        const conformidadData = <?php echo json_encode($conformidadData); ?>;
        const conformidadLabels = ['Si', 'No', 'NS/NC'];

        const datasets = [];
        const colores = [
            { backgroundColor: 'rgba(54, 162, 235, 0.5)', borderColor: 'rgba(54, 162, 235, 1)' },
            { backgroundColor: 'rgba(255, 99, 132, 0.5)', borderColor: 'rgba(255, 99, 132, 1)' },  
        ];
        let colorIndex = 0;

        for (const [sexo, conformidades] of Object.entries(conformidadData)) {
            const data = conformidadLabels.map(label => conformidades[label] || 0);
            datasets.push({
                label: sexo,
                data: data,
                backgroundColor: colores[colorIndex].backgroundColor,
                borderColor: colores[colorIndex].borderColor,
                borderWidth: 1
            });
            colorIndex++;
        }

        const ctxConformidad = document.getElementById('conformidadChart').getContext('2d');
        new Chart(ctxConformidad, {
            type: 'bar',
            data: {
                labels: conformidadLabels,
                datasets: datasets
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Porcentaje de Conformidad por Sexo'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100
                    }
                }
            }
        });
    </script>
</body>
</html>

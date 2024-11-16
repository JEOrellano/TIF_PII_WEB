<!DOCTYPE html>
	

<head>
    
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />


  


<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
        <script type="text/javascript" src="	https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js	"></script>
        <script type="text/javascript" src="	https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js	"></script>
    <script type="text/javascript" src="	https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js	"></script>
    <script type="text/javascript" src="	https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js	"></script>
    <script type="text/javascript" src="	https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js	"></script>
    <script type="text/javascript" src="	https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js	"></script>
    <script type="text/javascript" src="	https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js	"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<title>Lista de Encuestas</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

        
</td>

</head>


         <style>

          body {
            
            background-image: URL("https://img.freepik.com/vector-gratis/tema-fondo-abstracto-blanco_23-2148830881.jpg");
            background-repeat: no-repeat;
            background-size:cover;
          
        }

              a {
            color: black;
            text-decoration: none;
            background-color: transparent;
        }
               thead input {
        width: 110%;
    }

        table {
  width: 110%;
}

        table {
  width: 100%;
}

th {

  
    font-size:100%;
}
td {
  text-align: center;
  font-size:75%;
}
        div.container {
            width: 100%;
        }
        container-fluid2{
        width: 20%;
        padding-right: 5px;
        padding-left: 5px;
        margin-right: auto;
        margin-left: auto;
                        }
        @media (min-width: 1200px) .container, .container-lg, .container-md, .container-sm, .container-xl {
            max-width: 100px;
        }
           .moveall,
.removeall {
  border: 1px solid #ccc !important;
  
  &:hover {
    background: #efefef;
  }
}

// Only included because button labels aren't showing 

.moveall::after {
  content: attr(title);
  
}

.removeall::after {
  content: attr(title);
}

// Custom styling form
.form-control option {
    padding: 10px;
    border-bottom: 1px solid #efefef;
}

    </style>
    <script>
    $(document).ready(function () {

        // Setup - add a text input to each footer cell
        $('#table_data_encuesta thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('#table_data_encuesta thead');

        var table = $('#table_data_encuesta').DataTable({

            order: [[0, 'desc']],
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],

            orderCellsTop: true,
            fixedHeader: true,
            initComplete: function () {
                var api = this.api();

                // For each column
                api
                    .columns()
                    .eq(0)
                    .each(function (colIdx) {
                        // Set the header cell to contain the input element
                        var cell = $('.filters th').eq(
                            $(api.column(colIdx).header()).index()
                        );
                        var title = $(cell).text();
                        $(cell).html('<input type="text" placeholder="' + title + '" />');

                        // On every keypress in this input
                        $(
                            'input',
                            $('.filters th').eq($(api.column(colIdx).header()).index())
                        )
                            .off('keyup change')
                            .on('change', function (e) {
                                // Get the search value
                                $(this).attr('title', $(this).val());
                                var regexr = '({search})'; //$(this).parents('th').find('select').val();

                                var cursorPosition = this.selectionStart;
                                // Search the column for that value
                                api
                                    .column(colIdx)
                                    .search(
                                        this.value != ''
                                            ? regexr.replace('{search}', '(((' + this.value + ')))')
                                            : '',
                                        this.value != '',
                                        this.value == ''
                                    )
                                    .draw();
                            })
                            .on('keyup', function (e) {
                                e.stopPropagation();

                                $(this).trigger('change');
                                $(this)
                                    .focus()[0]
                                    .setSelectionRange(cursorPosition, cursorPosition);
                            });
                    });
            },
        });
    });
    </script>
<form id="form1">
 <div class="container mt-5">
    <!-- Breadcrumb para navegación -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="..\token1234.php">Portada</a></li>
            <li class="breadcrumb-item active" aria-current="page">Encuestas Realizadas</a></li>            
        </ol>
    </nav>
</div>

  <div class="container text-center">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="container text-center">
        <div class="row">
            <div class="col-sm-5 mb-0 mb-sm-2">
            <h1 style=”color:red;”>Encuestas Realizadas</h1>         
            </div>
             <div class="col-sm-3 mb-0 mb-sm-2">
             <h1 class="h3">Analizar :</h1>
            </div>
            <div class="col-sm-3 mb-0 mb-sm-2">   
            <a title="Analizar en Power BI" href="https://app.powerbi.com/reportEmbed?reportId=f4e79ada-7c02-41c8-841c-0fe7751e4fc5&autoAuth=true&ctid=57dbd56f-b6e0-4b0a-920a-52f15e3d178c"><img src="/img/PBI.png" alt="Analizar en Power BI" width="250" height="100"></a>
            </div>
        </div>
        </div>
        </div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-1">
                <div class="form-group row" runat="server">                  
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                  <table id="table_data_encuesta" class="display" style="width:20%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Género</th>
                                <th>Estudio</th>
                                <th>Edad</th>
                                <th>Trabajo</th>
                                <th>Relación Contractual</th>
                                <th>Rubro</th>
                                <th>Horas Semanales</th>
                                <th>Antigüedad</th>
                                <th>Salario</th>
                                <th>Conforme</th>
                                <th>Encuestador</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            try {
                                $conexion = new PDO("mysql:host=sql10.freesqldatabase.com;port=3306;dbname=sql10737404","sql10737404","7WcqHbE7Wr", [ PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8']);
                                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                // Consulta SQL
                                $res = $conexion->query('                
                                    SELECT E.ID AS id, S.Descripcion AS id_sexo, Est.Descripcion AS id_estudio, Ed.Descripcion AS id_edad, 
                                        Tra.Descripcion AS id_trabajo, RT.Descripcion AS id_relacion_contractual, Ru.Descripcion AS id_rubro, 
                                        HS.Descripcion AS id_hora_semanal, An.Descripcion AS antiguedad, Sa.Descripcion AS id_salario, 
                                        Con.Descripcion AS id_conforme, Enc.cue AS id_encuestador 
                                    FROM Encuesta E 
                                    INNER JOIN Sexo S ON S.id = E.id_sexo 
                                    INNER JOIN Estudio Est ON Est.id = E.id_estudio 
                                    INNER JOIN Edad Ed ON Ed.ID = E.id_edad 
                                    INNER JOIN Trabajo Tra ON Tra.id = E.id_Trabajo 
                                    INNER JOIN Relacion_Contractual RT ON RT.ID = E.id_relacion_contractual 
                                    INNER JOIN Rubro Ru ON Ru.id = E.id_rubro 
                                    INNER JOIN Hora_Semanal HS ON HS.id = E.id_hora_Semanal 
                                    INNER JOIN Antiguedad An ON An.id = E.id_antiguedad 
                                    INNER JOIN Salario Sa ON Sa.id = E.id_Salario 
                                    INNER JOIN Conforme Con ON Con.id = E.id_conforme 
                                    INNER JOIN Encuestador Enc ON Enc.cue = E.id_encuestador
                                    
                                ');
                            
                                // Genera filas de la tabla con los resultados
                                while ($item = $res->fetch(PDO::FETCH_OBJ)) {
                                    echo "<tr>
                                            <td>{$item->id}</td>
                                            <td>{$item->id_sexo}</td>
                                            <td>{$item->id_estudio}</td>
                                            <td>{$item->id_edad}</td>
                                            <td>{$item->id_trabajo}</td>
                                            <td>{$item->id_relacion_contractual}</td>
                                            <td>{$item->id_rubro}</td>
                                            <td>{$item->id_hora_semanal}</td>
                                            <td>{$item->antiguedad}</td>
                                            <td>{$item->id_salario}</td>
                                            <td>{$item->id_conforme}</td>
                                            <td>{$item->id_encuestador}</td>
                                        </tr>";
                                }
                            } catch(PDOException $error) {
                                echo "<tr><td colspan='12'>Error: " . $error->getMessage() . "</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</form>









</html>
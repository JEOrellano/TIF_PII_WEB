<?php
// Funciones para interactuar con la base de datos (conexión y consultas)
function conectarBD() {
    $host = "sql10.freesqldatabase.com";
    $dbname = "sql10737404";
    $user = "sql10737404";
    $password = "7WcqHbE7Wr";

    $conn = new mysqli($host, $user, $password, $dbname);
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }
    return $conn;
}

function obtenerRespondentesPorGenero($conn){
    $qryRespondentes = "SELECT 
                            s.descripcion as genero, 
                            COUNT(e.id_sexo) as cantidad
                        FROM
                            Encuesta e,
                                Sexo s
                        WHERE
                            s.id=e.id_sexo
                        GROUP BY
                            s.descripcion";
                            
    return $conn->query($qryRespondentes);
}



function obtenerGeneroSalario($conn) {
    $qryGeneral = "SELECT 
                        sexo.descripcion AS genero,
                        s.descripcion AS rango_salario
                   FROM 
                       (SELECT 
                            id_sexo,
                            ROUND(AVG(id_salario)) AS promedio_id_salario
                        FROM 
                            Encuesta
                         WHERE 
                            id_salario != 6
                        GROUP BY 
                            id_sexo) subquery
                   JOIN 
                       Salario s ON subquery.promedio_id_salario = s.id
                   JOIN 
                       Sexo sexo ON subquery.id_sexo = sexo.id";
    
    return $conn->query($qryGeneral);
}


function obtenerEstudiosIngresos($conn) {
    $qryEstudios = "SELECT 
                        sexo.descripcion AS sexo,
                        estudio.descripcion AS nivelEstudios,
                        salario.descripcion AS promedio_ingresos
                    FROM 
                        (SELECT 
                             id_sexo,
                             id_estudio,
                             ROUND(AVG(id_salario)) AS promedio_id_salario
                         FROM 
                             Encuesta
                         WHERE 
                             id_salario != 6
                         GROUP BY 
                             id_sexo, id_estudio) subquery
                    JOIN 
                        Sexo sexo ON subquery.id_sexo = sexo.id
                    JOIN 
                        Estudio estudio ON subquery.id_estudio = estudio.id
                    JOIN 
                        Salario salario ON subquery.promedio_id_salario = salario.id
                    ORDER BY 
                        estudio.descripcion, sexo.descripcion";
    
    return $conn->query($qryEstudios);
}


function obtenerRubroSalario($conn) {
    $qryRubro = "SELECT 
                    s.descripcion AS sexo,
                    r.descripcion AS rubro,
                    sa.descripcion AS rango_salario
                 FROM 
                     (SELECT 
                          e.id_sexo,
                          e.id_rubro,
                          ROUND(AVG(e.id_salario)) AS promedio_id_salario
                      FROM 
                          Encuesta e
                      WHERE 
                          e.id_salario != 6
                      GROUP BY 
                          e.id_sexo, e.id_rubro) subquery
                 JOIN 
                     Sexo s ON subquery.id_sexo = s.id
                 JOIN 
                     Rubro r ON subquery.id_rubro = r.id
                 JOIN 
                     Salario sa ON ROUND(subquery.promedio_id_salario) = sa.id
                 GROUP BY 
                     s.descripcion, r.descripcion, sa.descripcion
                 ORDER BY 
                     r.descripcion, s.descripcion";
    
    return $conn->query($qryRubro);
}


function obtenerConformidadPorSexo($conn) {
    $qryConformidad = "SELECT 
                           s.descripcion AS sexo,
                           c.descripcion AS conformidad,
                           ROUND(COUNT(*) * 100.0 / (SELECT COUNT(*) FROM Encuesta e2 WHERE e2.id_sexo = e.id_sexo), 2) AS porcentaje_respuestas
                       FROM 
                           Encuesta e
                       JOIN 
                           Sexo s ON e.id_sexo = s.id
                       JOIN 
                           Conforme c ON e.id_conforme = c.id
                       WHERE 
                           c.descripcion IN ('Si', 'No', 'NS/NC')
                       GROUP BY 
                           s.descripcion, c.descripcion
                       ORDER BY 
                           s.descripcion, c.descripcion";

    return $conn->query($qryConformidad);
}

?>

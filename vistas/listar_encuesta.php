<?php

try {
    $conexion = new PDO("mysql:host=sql10.freesqldatabase.com;port=3306;dbname=sql10737404","sql10737404","7WcqHbE7Wr");
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

    $res = $conexion->query('select E.ID as id,S.Descripcion as id_sexo,Est.Descripcion as id_estudio,Ed.Descripcion as id_edad, Tra.Descripcion as id_trabajo, RT.Descripcion as id_relacion_contractual,Ru.Descripcion as id_rubro, HS.Descripcion as id_hora_semanal,An.Descripcion as antiguedad,Sa.Descripcion as id_salario, Con.Descripcion as id_conforme, Enc.cue as id_encuestador from Encuesta E inner join Sexo S on S.id=E.id_sexo inner join Estudio Est on Est.id=E.id_estudio inner join Edad Ed on Ed.ID=E.id_edad  inner join Trabajo Tra on Tra.id=E.id_Trabajo  inner join Relacion_Contractual RT on RT.ID=E.id_relacion_contractual inner join Rubro Ru on Ru.id=E.id_rubro  inner join Hora_Semanal HS on HS.id=E.id_hora_Semanal  inner join Antiguedad An on An.id=E.id_antiguedad  inner join Salario Sa on Sa.id=E.id_Salario  inner join Conforme Con on Con.id=E.id_conforme inner join Encuestador Enc on Enc.cue=E.id_encuestador') or die(print($conexion->errorInfo()));

    $data = [];

    while($item = $res->fetch(PDO::FETCH_OBJ)) {
        $data[] = [
            'id' => $item->id,
            'sexo' => $item->id_sexo,
            'estudio' => $item->id_estudio,
            'edad' => $item->id_edad,
            'trabajo' => $item->id_trabajo,
            'relacion_contractual' => $item->id_relacion_contractual,
            'rubro' => $item->id_rubro,
            'hora_semanal' => $item->id_hora_semanal,
            'antiguedad' => $item->id_antiguedad,
            'salario' => $item->id_salario,
            'conforme' => $item->id_conforme,
            'encuestador' => $item->id_encuestador,
        ];
    }

    echo json_encode($data);

} catch(PDOException $error) {
    echo $error->getMessage();
    die();

}
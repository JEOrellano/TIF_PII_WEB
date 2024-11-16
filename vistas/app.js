/* TABLAS */

// Encuesta
fetch("listar_encuesta.php")
    .then(res => res.json())
    .then(data => {
        let str = '';
        data.map(item => {
            console.log(item.id)
            str += 
        <tr>
            <td>${item.id}</td>
            <td>${item.sexo}</td>
            <td>${item.estudio}</td>
            <td>${item.edad}</td>
            <td>${item.trabajo}</td>
            <td>${item.relacion_contractual}</td>
            <td>${item.rubro}</td>
            <td>${item.hora_semanal}</td>
            <td>${item.antiguedad}</td>
            <td>${item.salario}</td>
            <td>${item.conforme}</td>
            <td>${item.encuestador}</td>
        </tr>
        
        });

        document.getElementById('table_data_encuesta').innerHTML = str;

    });

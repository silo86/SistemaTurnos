<?php
// reclamos.php?op=getReclamoByID&id=12

// reclamos/getReclamoByID/12






require '../config.php';
require './_libs/Database.php';

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *'); //permite que el servicio pueda ser consumido desde otros dominios o clientes moviles
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');


//print_r($_GET);

/*
* check for user session
*
if(!isset($_SESSION['userID'])){
    header('HTTP/1.1 401 Unauthorized');
    exit;
}
*/

/* $areas = array(
    array('id' => '1', 'descripcion' => 'Ciencias Naturales'),
    array('id' => '2', 'descripcion' => 'Ciencias Naturales'),
    array('id' => '3', 'descripcion' => 'Matematicas'),
    array('id' => '4', 'descripcion' => 'Lengua')
    );*/

function getAll(){
    $db = new Database();
    /*    $stm = $db->prepare('SELECT
                                ClienteID,
                                NombreApellido,
                                DNI,
                                FechaNacimiento,
                                Domicilio,
                                Localidad,
                                Email,
                                Telefono,
                                Celular,
                                Foto,
                                Trabajo_Lugar,
                                Trabajo_Domicilio,
                                Trabajo_Horarios,
                                Trabajo_Sueldo,
                                Observaciones,
                                Estado,
                                FechaActualizacion
                              FROM clientes');    */
    $stm = $db->prepare('SELECT
          reclamos.ReclamoID,
          reclamos.Ubicacion,
          reclamos.Imagen,
          reclamos.Observaciones,
          reclamos.Prioridad,
          reclamos.FechaInicio,
          reclamos.FechaFin,
          reclamos.Estado,
          areas.Descripcion AS Area,
          tramites.Descripcion AS Tramite,
          denunciantes.DenuncianteID,
          denunciantes.DNI,
          denunciantes.NombreApellido,
          denunciantes.Tipo,
          denunciantes.Direccion,
          denunciantes.Telefono,
          denunciantes.Email

        FROM reclamos
          LEFT JOIN tramites
            ON reclamos.TramiteID = tramites.TramiteID
          LEFT JOIN areas
            ON reclamos.AreaID = areas.AreaID
          LEFT JOIN denunciantes
            ON reclamos.DenuncianteID = denunciantes.DenuncianteID');

    $stm->execute();
    $count = $stm->rowCount();
    if($count > 0){
        $data = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    return null;

}

/*if($_GET){

    if(isset($_GET['op'])){
        $op = $_GET['op'];

        switch($op){
            case 'getAll':
                getAll();
                break;
            case 'getReclamoByID':

                getReclamoByID($_GET['id']);
                break;
            default:
                echo 'Metodo inexistente.';
                exit();

        }

    }

}*/

if(function_exists('getAll')){
    $output = getAll();



    echo json_encode($output);
}



?>

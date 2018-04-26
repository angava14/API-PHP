

<?php
date_default_timezone_set("America/Bogota");
$dir = explode("/", $_SERVER['PHP_SELF']);
$projectName = $dir[1];

require_once ($_SERVER['DOCUMENT_ROOT'] . '/' . $projectName . '/dao/db.class.php');

class TrucksDao extends Database {

                                                          /*  Funciones y Querys  */

                                                        /*Ejemplo Post*/
    function nuevasolicitud($data){
        $query = "INSERT INTO solicitudes (id, nombre, aprobador, fecha) VALUES (null , '$data->nombre' , '$data->aprobador' , '$data->fecha'    )" ;
        $this->connect();
        $newDatas = $this->execute($query);
        $this->disconnect();
        return $newDatas ; 
    }
                                                        /*Ejemplo Get*/
    function getjefes(){
        $query = "SELECT * FROM  jefes " ;
        $this->connect();
        $newDatas = $this->execute($query);
        $this->disconnect();
        if ($this->num_rows($newDatas) > 0) {
            while ($row = $this->to_array($newDatas)) {
                $response[] = $row;
            }
            return $response;
        } else {
            $response[0] = "No hay datos";
            return $response;
        }
    }


}
?>

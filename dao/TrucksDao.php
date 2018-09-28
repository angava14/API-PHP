

<?php
date_default_timezone_set("America/Bogota");
$dir = explode("/", $_SERVER['PHP_SELF']);
$projectName = $dir[1];

require_once ($_SERVER['DOCUMENT_ROOT'] . '/' . $projectName . '/dao/db.class.php');

class TrucksDao extends Database {

                                                          /*  Funciones y Querys  */

                                                        /*Ejemplo Post*/
    function crearusuario($data){
        $query = "INSERT INTO usuarios(id , user, password, fecha) VALUES (null,'{$data['Userid']}', '{$data['Password']}' , null)" ;
        $this->connect();
        $newDatas = $this->execute($query);
        $this->disconnect();
        return $newDatas ; 
    }
                                                        /*Ejemplo Get*/
    function usuarios(){
        $query = "SELECT * FROM usuarios" ;
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

    function login($data){                                          /*Ejemplo Get parametro*/
        $query = "SELECT * from usuarios WHERE user ='{$data['Userid']}'' AND password ='{$data['Password']}'" ;
        $this->connect();
        $newDatas = $this->execute($query);
        $this->disconnect();
        return $newDatas ; 
    }

}
?>

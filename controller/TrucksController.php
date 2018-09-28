
<?php

$dir = explode("/", $_SERVER['PHP_SELF']);
$projectName = $dir[1];
//ini_set("memory_limit", "200M");
require ($_SERVER['DOCUMENT_ROOT'] . '/' . $projectName . '/dao/TrucksDao.php');

class TrucksController {
                                        /* Controlador entre API - DAO*/
    private $trunk = null;

    function crearusuario($data){
        $this->trunk = new TrucksDao;
        $data = $this->trunk->crearusuario($data);
            /*  Funciones para operar datos*/
        return json_encode($data);
    }

    function usuarios(){
        $this->trunk = new TrucksDao;
        $data = $this->trunk->usuarios();
            /*  Funciones para operar datos*/
        return json_encode($data);
    }

    function login(){
        $this->trunk = new TrucksDao;
        $data = $this->trunk->login();
            /*  Funciones para operar datos*/
        return json_encode($data);
    }


}


<?php

$dir = explode("/", $_SERVER['PHP_SELF']);
$projectName = $dir[1];
//ini_set("memory_limit", "200M");
require ($_SERVER['DOCUMENT_ROOT'] . '/' . $projectName . '/dao/TrucksDao.php');

class TrucksController {
                                        /* Controlador entre API - DAO*/
    private $trunk = null;


    function nuevasolicitud($data){
        $this->trunk = new TrucksDao;
        $data = $this->trunk->nuevasolicitud($data);

            /*  Funciones para operar datos*/


        return json_encode($data);
    }

    function getjefes(){
        $this->trunk = new TrucksDao;
        $data = $this->trunk->getjefes();

            /*  Funciones para operar datos*/


        return json_encode($data);
    }

}

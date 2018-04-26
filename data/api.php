<?php
require_once("Rest.inc.php");
//header("Access-Control-Allow-Origin: https://www.onlinedst.com",false);
header("Access-Control-Allow-Origin: *");
date_default_timezone_set('America/Bogota');
$dir = explode("/", $_SERVER['PHP_SELF']);
// server should keep session data for AT LEAST 1 hour
ini_set('session.gc_maxlifetime', 86400);
// each client should remember their session id for EXACTLY 24 hour     
session_set_cookie_params(86400);
define('PROYECT_NAME', $dir[1]);
define('DIR', $_SERVER["DOCUMENT_ROOT"] . DIRECTORY_SEPARATOR . PROYECT_NAME);
session_start();
ini_set('memory_limit', -1);
ini_set('max_execution_time', 2400);

class API extends REST {

    public function processApi() {
        $func = strtolower(trim(str_replace("/", "", $_REQUEST['rquest'])));
        if ((int) method_exists($this, $func) > 0)
            $this->$func();
        else
            $this->response('', 404); // If the method not exist with in this class, response would be "Page not found".
    }

      

    private function session() {
        if (!empty($_SESSION['login_sims'])) {
            return $_SESSION['login_sims'];
        } else {
            $this->response('NO_SESSION', 306);
        }
    }

    private function checkMethod($method) {
        // Cross validation if the request method is POST else it will return "Not Acceptable" status
        if ($this->get_request_method() != $method) {
            $this->response('', 406);
        }
    }

    private function nuevasolicitud() {
        $this->checkMethod('POST');
        require '../controller/TrucksController.php';
        $trucksController = new TrucksController();
        $data = json_decode(file_get_contents("php://input"));
        $data = $trucksController->nuevasolicitud($data->body);
        $this->response($data, 200);
    }

    private function getjefes(){
        $this->checkMethod('GET');
        require '../controller/TrucksController.php';
        $trucksController = new TrucksController();
        $data = $trucksController->getjefes();
        $this->response($data, 200);
    }

}

// Initiiate Library
$api = new API;
$api->processApi();
?>

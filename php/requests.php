<?php

function send_response($data, $code) {
    $messages = array(
        200 => "OK",
        400 => "Bad Request",
        500 => "Internal Server Error"
    );

    // Headers de la requête
    header("Content-Type: application/json; charset=utf8");
    header("Cache-control: no-store, no-cache, must-revalidate");
    header("Pragma: no-cache");
    header("HTTP/1.1 $code " . $messages[$code]);

    // Si les données existent, elles sont encodées en JSON et envoyées au client
    if (isset($data))
        echo json_encode($data);

    exit;
}

require_once("database.php");

// Si le type de requête n'est pas GET, la requête n'est pas traitable
if ($_SERVER["REQUEST_METHOD"] != "GET")
    send_response(null, 400);

$request = substr($_SERVER["PATH_INFO"], 1);
$request = explode("/", $request);
$ressource = array_shift($request);
$apiVersion = array_shift($request);
$requestRessource = array_shift($request);

// Si ce n'est pas l'API qui est demandée, que la version n'est pas v1
// ou que la ressource n'est pas spécifiée, la requête n'est pas traitable
/*if ($ressource != "api" || $apiVersion != "v1" || !isset($requestRessource))
    send_response(null, 400);*/


try {
    $db = new dbConnector();
} catch (PDOException $exception) {
    // S'il y a un problème a la connection à la base de données,
    // on renvoie une erreure interne au client
    error_log("Request error" . $exception->getMessage());
    send_response(null, 500);
}

$data = null;
switch ($ressource) {
    // On récupère les sites de l'isen"
    case "site_isen":
        $data = $db->getSiteIsen();
        break;

    // Requête pour réqupérer les villes qui ont un trajet
    //debute_isen=false&ville=Chateaulin&site=ISEN Brest&date=2021-06-23
    case "trajet": 
        if (isset($_GET["debute_isen"]) && isset($_GET["ville"]) && isset($_GET["site"]) && isset($_GET["date"]))
            $data = $db->getTrajet($_GET["debute_isen"],$_GET["ville"],$_GET["site"],$_GET["date"]); 
        else if (isset($_GET["id"]) && isset($_GET["place"]))
            $data = $db->addPassanger($_GET["debute_isen"],$_GET["ville"],$_GET["site"],$_GET["date"]);
        else if (isset($_GET["id"]))
            $data = $db->getTrajetByID($_GET["id"]); 
        else
            send_response(null, 400);
        break;
    default:
        send_response($ressource, 400);
}

$code = isset($data) ? 200 : 400;
send_response($data, $code);

?>

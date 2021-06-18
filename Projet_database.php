<?php

require_once('Projet_cste.php');

function dbConnect(){
  try{
    $db = new PDO('mysql:host='.DB_SERVER.';dbname='.DB_NAME.';charset=utf8',
      DB_USER, DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
  }

  catch (PDOException $exception){
    error_log( 'Connection error: '.$exception->getMessage() );
    return false;
  }

  return $db;
}

function dbRequest($db, $request, $dbInformation = '') {
  try   {
    if ($dbInformation != '')
            $request .= ' WHERE dbInformation=:dbInformation';

    $statement = $db->prepare($request);

    if ($dbInformation != '')
            $statement->bindParam(':dbInformation', $dbInformation, PDO::PARAM_STR, 20);

    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
  }

  catch (PDOException $exception)  {
    error_log('Request error: '.$exception->getMessage());
    return false;
  }

  return $result;
}

?>
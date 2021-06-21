<?php
  /*require_once('Projet_database.php');

  // Database connexion.
  $db = dbConnect();
  if (!$db)  {
    header ('HTTP/1.1 503 Service Unavailable');
    exit;
  }

  // Check the request.
  $requestMethod = $_SERVER['REQUEST_METHOD'];
  $request = substr($_SERVER['PATH_INFO'], 1);
  $request = explode('/', $request);
  $requestRessource = array_shift($request);
  
  // Check the id associated to the request.
  $id = array_shift($request);
  if ($id == '')
        $id = NULL;
  $data = false;

  //request 1 :
  function user()
    //$au = fetch('INSERT INTO utilisateur VALUES (val_pseudo, val_nom, val_prenom, val_email, SHA1(val_mot_de_passe) , val_num_tel);');
    //echo json_encode($au);
  }

  //request 2 :
  function search_travel(bool $depart)
    $aud = fetch('SELECT * FROM trajet WHERE nombre_place_restante>0 AND debute_isen==$depart AND id_trajet<=10;');
    echo json_encode($aud);
  }

  //request 3 :
  function check_connect()
    $am = fetch('SELECT * FROM utilisateur WHERE pseudonyme==(val_pseudo) AND mot_de_passe==SHA1(val_mot_de_passe);');
    echo json_encode($am);
  }

  //request 4 :
  function add_travel(smallint $val_place, smallint $val_prix, varchar $adresse, datetime $date_debut, datetime $date_fin, bool $depart)
    $amt = fetch('INSERT INTO trajet (nombre_place, nombre_place_restante, prix, adresse, date_depart, date_arrivee, debute_isen)
VALUES ($val_place, $val_place, $val_prix, $adresse, $date_debut, $date_fin, $depart);');

    echo json_encode($amt);
  }

  //request 5 :
  function search_travel_by_ID(int val_id)
    $aa1 = fetch('SELECT * FROM trajet WHERE id_trajet==(val_id);');
    echo json_encode($aa1);
  }

  //request 6 :
  function take_a_place()
    $aa2 = fetch('UPDATE TABLE trajet SET nombre_place_restante -= 1 WHERE id_trajet==(val);');
    echo json_encode($aa2);
  }

    $phrase_request = 'SELECT prenom, nom FROM user';
    $statement = $db->prepare($phrase_request);
    $statement->execute();
    
    $res = $statement->fetchAll(PDO::FETCH_ASSOC);

    echo"<pre>";
      print_r($res);
    echo"</pre>"*/

  // Send data to the client.
  //echo json_encode($data);

?>

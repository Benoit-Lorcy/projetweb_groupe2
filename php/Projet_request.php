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

  //request 1 : créer les utilisateurs
  function user( varchar $val_pseudo, varchar $val_nom, varchar $val_prenom, varchar $val_email, varchar $val_mot_de_passe, varchar $val_num_tel )
    //$request_1 = fetch('INSERT INTO utilisateur VALUES ($val_pseudo, $val_nom, $val_prenom, $val_email, SHA1($val_mot_de_passe) , $val_num_tel);');
    
    //echo json_encode($request_1);
  }
  
    //request 2 : vérifie les données d'un utilisateur
  function check_connect( varchar $val_pseudo, varchar $val_mot_de_passe )
    $request_2 = fetch('SELECT * FROM utilisateur WHERE pseudonyme==$val_pseudo AND mot_de_passe==SHA1($val_mot_de_passe);');
    
    echo json_encode($request_2);
  }

//request 3 : créer les trajets
  function add_travel( smallint $val_place, smallint $val_prix, varchar $adresse, datetime $date_debut, datetime $date_fin, bool $depart )
    $request_3 = fetch('INSERT INTO trajet (nombre_place, nombre_place_restante, prix, adresse, date_depart, date_arrivee, debute_isen)
VALUES ($val_place, $val_place, $val_prix, $adresse, $date_debut, $date_fin, $depart);');

    echo json_encode($request_3);
  }

  //request 4 : recherche de trajets
  function search_travel( bool $depart )
  $ind=0;
  $ind_test=0;
  
  while( $ind<=10 ){
    if( fetch(SELECT nombre_place_restante FROM trajet WHERE id_trajet==$ind_test) > 0 ){
      $request_4 = fetch('SELECT * FROM trajet WHERE AND debute_isen==$depart;');
      
      $ind++;
    }
    
    $ind_test++;
    
    echo json_encode($request_4);
  }

  //request 5 : recherche un trajet particulier
  function search_travel_by_ID( int $val_id )
    $request_5 = fetch('SELECT * FROM trajet WHERE id_trajet==$val_id;');
    
    echo json_encode($request_5);
  }

  //request 6 : reserve une ou plusieurs places pour le trajet
  function take_place( smallint $nb_place_prise, int $val_id )
    $request_6 = fetch('UPDATE TABLE trajet SET nombre_place_restante -= $nb_place_prise WHERE id_trajet==$val_id;');
    
    echo json_encode($request_6);
  }
  
       //en plus
  //request 7 : trajet le moins cher
  function sort_min_price(bool $depart )
    $request_7 = fetch('SELECT * FROM trajet WHERE debute_isen==$depart ORDER BY prix ASC;');
    
    echo json_encode($request_7);
  }


  //request 8 : recherche tous les trajets proposés par un utilisateur
  function seek_travel_by_user( varchar $val_pseudo )
    $request_8 = fetch('SELECT * FROM trajet INNER JOIN utilisateur ON trajet.pseudonyme=utilisateur.pseudonyme WHERE utilisateur.pseudonyme==$val_pseudo;');

    echo json_encode($request_8);
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

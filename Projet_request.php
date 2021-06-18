<?php
  require_once('Projet_database.php');

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

    $au = fetch('');

    echo json_encode($au);

  }

  //request 2 :

  function user_det()

    $aud = fetch('');

    echo json_encode($aud);

  }

  //request 3 :

  function materiel()

    $am = fetch('');

    echo json_encode($am);

  }

  //request 4 :

  function materiel_det()

    $amt = fetch('');

    echo json_encode($amt);

  }

  //request 5 :

  function aff1()

    $aa1 = fetch('');

    echo json_encode($aa1);

  }

  //request 6 :

  function aff2()

    $aa2 = fetch('');

    echo json_encode($aa2);

  }

    $phrase_request = 'SELECT prenom, nom FROM user';
    $statement = $db->prepare($phrase_request);
    $statement->execute();
    
    $res = $statement->fetchAll(PDO::FETCH_ASSOC);

    echo"<pre>";
      print_r($res);
    echo"</pre>"

  // Send data to the client.
  //echo json_encode($data);

?>

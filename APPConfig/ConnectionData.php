<?php
class TableRows extends RecursiveIteratorIterator {
      function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
      }}


$servername = "localhost";
$username = "root";
$password = "";
$message = "";

try {
//    we try to connect to our local db machine with the localhost and username root to rich the db prjfinformation
    $conn = new PDO("mysql:host=$servername;dbname=prjfinformation", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $message ="Connected successfully";
    
  } catch(PDOException $e) {
    $message = "Connection failed: " . $e->getMessage();
  }

  function idAdmin($id_c,$conn){
       $stmt = $conn->prepare("Select Id_raison_social from Client where Id_Client= ?");
       $stmt->bindParam(1, $id_c, PDO::PARAM_INT);
       $stmt->execute();
       $dataid = $stmt->fetchAll(PDO::FETCH_OBJ);
       foreach($dataid as $data){
         if($data->Id_raison_social == 1){
             return true;
         }
         break;
     }
     session_start();
     $_SESSION=array();
     session_destroy();
     return false;
     
}
  function idClient($id_c,$conn){
    $stmt = $conn->prepare("Select Id_raison_social from Client where Id_Client= ?");
    $stmt->bindParam(1, $id_c, PDO::PARAM_INT);
    $stmt->execute();
    $dataid = $stmt->fetchAll(PDO::FETCH_OBJ);
    foreach($dataid as $data){
      if($data->Id_raison_social ==2){
          return true;
      }
      break;
  }
  return false;

}
function idDirecteur($id_c,$conn){
  $stmt = $conn->prepare("Select Id_raison_social from Client where Id_Client= ?");
  $stmt->bindParam(1, $id_c, PDO::PARAM_INT);
  $stmt->execute();
  $dataid = $stmt->fetchAll(PDO::FETCH_OBJ);
  foreach($dataid as $data){
    if($data->Id_raison_social ==3){
        return true;
    }
    break;
}
return false;

}
function idConsult($id_c,$conn){
  $stmt = $conn->prepare("Select Id_raison_social from Client where Id_Client= ?");
  $stmt->bindParam(1, $id_c, PDO::PARAM_INT);
  $stmt->execute();
  $dataid = $stmt->fetchAll(PDO::FETCH_OBJ);
  foreach($dataid as $data){
    if($data->Id_raison_social ==4){
        return true;
    }
    break;
}
return false;

}
function idFlag0($id_c,$conn){
  $stmt = $conn->prepare("Select Flag from Client where Id_Client= ?");
  $stmt->bindParam(1, $id_c, PDO::PARAM_INT);
  $stmt->execute();
  $dataid = $stmt->fetchAll(PDO::FETCH_OBJ);
  foreach($dataid as $data){
    if($data->Flag ==0){
        return true;
    }
    break;
}
return false;

}
function idFlag1($id_c,$conn){
  $stmt = $conn->prepare("Select Flag from Client where Id_Client= ?");
  $stmt->bindParam(1, $id_c, PDO::PARAM_INT);
  $stmt->execute();
  $dataid = $stmt->fetchAll(PDO::FETCH_OBJ);
  foreach($dataid as $data){
    if($data->Flag ==1){
        return true;
    }
    break;
}
return false;

}
function idFlag2($id_c,$conn){
  $stmt = $conn->prepare("Select Flag from Client where Id_Client= ?");
  $stmt->bindParam(1, $id_c, PDO::PARAM_INT);
  $stmt->execute();
  $dataid = $stmt->fetchAll(PDO::FETCH_OBJ);
  foreach($dataid as $data){
    if($data->Flag ==2){
        return true;
    }
    break;
}
return false;

}
function idFlag3($id_c,$conn){
  $stmt = $conn->prepare("Select Flag from Client where Id_Client= ?");
  $stmt->bindParam(1, $id_c, PDO::PARAM_INT);
  $stmt->execute();
  $dataid = $stmt->fetchAll(PDO::FETCH_OBJ);
  foreach($dataid as $data){
    if($data->Flag ==3){
        return true;
    }
    break;
}
return false;

}
function idFlag4($id_c,$conn){
  $stmt = $conn->prepare("Select Flag from Client where Id_Client= ?");
  $stmt->bindParam(1, $id_c, PDO::PARAM_INT);
  $stmt->execute();
  $dataid = $stmt->fetchAll(PDO::FETCH_OBJ);
  foreach($dataid as $data){
    if($data->Flag ==4){
        return true;
    }
    break;
}
return false;

}
function idFlag5($id_c,$conn){
  $stmt = $conn->prepare("Select Flag from Client where Id_Client= ?");
  $stmt->bindParam(1, $id_c, PDO::PARAM_INT);
  $stmt->execute();
  $dataid = $stmt->fetchAll(PDO::FETCH_OBJ);
  foreach($dataid as $data){
    if($data->Flag ==5){
        return true;
    }
    break;
}
return false;

}
function idFlag6($id_c,$conn){
  $stmt = $conn->prepare("Select Flag from Client where Id_Client= ?");
  $stmt->bindParam(1, $id_c, PDO::PARAM_INT);
  $stmt->execute();
  $dataid = $stmt->fetchAll(PDO::FETCH_OBJ);
  foreach($dataid as $data){
    if($data->Flag ==6){
        return true;
    }
    break;
}
return false;

}
function idFlag7($id_c,$conn){
  $stmt = $conn->prepare("Select Flag from Client where Id_Client= ?");
  $stmt->bindParam(1, $id_c, PDO::PARAM_INT);
  $stmt->execute();
  $dataid = $stmt->fetchAll(PDO::FETCH_OBJ);
  foreach($dataid as $data){
    if($data->Flag ==7){
        return true;
    }
    break;
}
return false;

}
?>
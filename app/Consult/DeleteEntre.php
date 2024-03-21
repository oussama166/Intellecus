<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="vendor/css/table.css">
  <?php

  require("../../APPConfig/ConnectionData.php");
  session_start();
  if (!$_SESSION['Id_Client']) {
    session_start();
    $_SESSION = array();
    session_destroy();
    header('Location: ../error/error.php');
  }
  if (!idAdmin($_SESSION['Id_Client'], $conn)) {

    header('Location: ../error/error.php');
  }
  $entreprises = afficherEntre($conn);
  ?>
</head>

<body>
  <div class="principale">
    <div class="principale-head">
      <div class="left-head">
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati
          quis deleniti voluptatibus.
        </p>
        <p>Suiver Notre Pas</p>
      </div>
      <form method="POST">
      <div class="right-head">
        <button name="DECO" class="deco">Deconnecter</button>
        <button name="Menu" class="mn">Menu</button>
      </div>
      </form>
    </div>
    <div class="principale-boody">
      <form method="POST" enctype="multipart/form-data">

        <body>

          <table class="container">
            <thead>
              <tr>
                <th><h1>Entreprise</h1></th>
                <th><h1>Avencemant</h1></th>
                <th><h1>Supprimer</h1></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($entreprises as $entreprise) : ?>
                <tr>
                  <td><?= $entreprise->Nom ?></td>
                  <td><?php switch ($entreprise->Flag) {
                        case 0:
                          echo "Eligibite";
                          break;
                        case 1:
                          echo "Dossier admin ofppt";
                          break;
                        case 2:
                          echo "Dossier admin giac entreprise";
                          break;
                        case 3:
                          echo "Dossier admin giac cabinet";
                          break;
                        case 4:
                          echo "Dossier technique giac";
                          break;
                        case 5:
                          echo "Dossier finnancier giac ";
                          break;
                        case 6:
                          echo "Dossier technique ofppt";
                          break;
                        case 7;
                          echo "Dossier finnancier ofppt";
                          break;
                        default:
                          echo "Teminer";
                          break;
                      } ?></td>
                  <td><button type=" submit" name="Supp"><a href="delet.php?id=<?= $entreprise->ID ?>"> Supprimer</a></button></td>
                </tr>
              <?php endforeach; ?>
            </tbody>

          </table>
    </div>
  </div>


  <?php

  $Id_Client = $_SESSION['Id_Client'];
  if(isset($_POST["Menu"])){

    header('Location: ../menue/menue.php');
  }
  // function Supp($id, $conn)
  // {
  //   $stmt = $conn->prepare("CALL `prjfinformation`.`ProSupp`(?);");
  //   $stmt->bindParam(1, $id, PDO::PARAM_INT);
  //   $stmt->execute();
  // }
  if(isset($_POST["DECO"])){
    $_SESSION = array();
  session_destroy();
  header('Location: ../../connection.php');
}
  function afficherEntre($conn)
  {

    $req = $conn->prepare("SELECT entreprise.Id_Entreprise as ID,entreprise.Nom_Entreprise as Nom,Flag FROM `client` ,entreprise WHERE client.Id_entreprise= entreprise.Id_Entreprise and client.Id_raison_social=2 ");
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $req->closeCursor();
  }
  ?>
</body>

</html>
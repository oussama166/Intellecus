<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="./vendor/css/table.css">
</head>
<?php
require("../../APPConfig/ConnectionData.php");

session_start();
if (!$_SESSION['Id_Client']) {
  $_SESSION = array();
  session_destroy();
  header('Location: ../../connection.php');
}
if (!idDirecteur($_SESSION['Id_Client'], $conn)) {

  $_SESSION = array();
  session_destroy();
  header('Location: ../error/error.php');
};


$affclient = afficheclient($conn);
?>

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
            </div>
            </form>
        </div>
        <div class="principale-boody">
            <table class="container">
                <thead>
                    <tr>
                        <th><h1>Entreprise</h1></th>
                        <th><h1>eligibite</h1></th>
                        <th><h1>Dossier administratif ofppt</h1></th>
                        <th><h1>Dossier admin  ofppt</h1></th>
                        <th><h1>Dossier admin giac entreprise</h1></th>
                        <th><h1>Dossier admin giac cabinet</h1></th>
                        <th><h1>Dossier finnancier giac</h1></th>
                        <th><h1>Dossier finnancier ofppt</h1></th>
                        <th><h1>Dossier technique giac</h1></th>
                        <th><h1>Dossier</h1></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($affclient as $client) : ?>
                        <tr>
                            <td><?= $client->Nom ?></td>
                            <td style="background-color:<?php if ($client->Flag >= 1) { echo 'green';}else{echo 'red';}?>"></td>
                            <td style="background-color:<?php if ($client->Flag >= 2) { echo 'green';}else{echo 'red';}?>"></td>
                            <td style="background-color:<?php if ($client->Flag >= 3) { echo 'green';}else{echo 'red';}?>"></td>
                            <td style="background-color:<?php if ($client->Flag >= 4) { echo 'green';}else{echo 'red';}?>"></td>
                            <td style="background-color:<?php if ($client->Flag >= 5) { echo 'green';}else{echo 'red';} ?>"></td>
                            <td style="background-color:<?php if ($client->Flag >= 6) { echo 'green';}else{echo 'red';} ?>"></td>
                            <td style="background-color:<?php if ($client->Flag >= 7) { echo 'green';}else{echo 'red';} ?>"></td>
                            <td style="background-color:<?php if ($client->Flag >= 8) { echo 'green';}else{echo 'red';} ?>"></td>
                            <td ><label><?php if ($client->Flag >= 8) {echo 'Dossier complete';
                                        } else if ($client->Flag >= 7) {echo 'Dant etape 7 ';
                                        } else if ($client->Flag >= 6) { echo 'Dant etape 6 ';
                                        } else if ($client->Flag >= 5) {echo 'Dant etape 5 ';
                                        } else if ($client->Flag >= 4) { echo 'Dant etape 4 ';
                                        } else if ($client->Flag >= 3) {echo 'Dant etape 3 ';
                                        } else if ($client->Flag >= 2) {echo 'Dant etape 2 ';
                                        } else if ($client->Flag >= 1) {echo 'Dant etape 1 ';
                                        } else if ($client->Flag < 1) {echo 'Dossier vide';} ?></label></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
        </div>
    </div>
    </table>
</body>
<?php
if(isset($_POST["DECO"])){
    $_SESSION = array();
  session_destroy();
  header('Location: ../../connection.php');
}
function afficheclient($conn)
{
    
        $req = $conn->prepare("select entreprise.Nom_Entreprise as Nom,Flag FROM client,entreprise WHERE client.Id_entreprise= entreprise.Id_Entreprise and client.Id_raison_social=2 and client.Id_entreprise in (SELECT Id_entreprise from client where Id_Client=".$_SESSION['Id_Client'].") ;");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        return $data;
        $req->closeCursor();
}
?>
</html>
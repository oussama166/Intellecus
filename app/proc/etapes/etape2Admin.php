<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="shortcut icon" href="../../../../vendor/img/favicon.png" type="image/x-icon" />
  <!-- css -->
  <link rel="stylesheet" href="../etapes/vendor/css/etapes.css" />
  <title>Eligibilité | PFE</title>
  <?php
  require("../../../APPConfig/ConnectionData.php");

  session_start();
  if (!$_SESSION['Id_Client']) {
    $_SESSION = array();
    session_destroy();
    header('Location: ../../../connection.php');
  } else 
    if (!idAdmin($_SESSION['Id_Client'], $conn)) {


    $_SESSION = array();
    session_destroy();
    header('Location: ../../error/error.php');
  } 
  ?>
</head>

<body>
  <div class="container">
    <div class="left-side">
      <div class="uper-left">
        <h1 class="pd-1 ml-1 txt-ctr">Dossier Admin GIAC</h1>
      </div>
      <div class="body-left">
        <ul class="list-unstyled multi-steps">
          <li id="progress-itms" class="is-active">
            <span class="title">Fiche d'information</span>
          </li>
          <li id="progress-itms"><span class="title">Offre commerciale IF</span></li>
          <li id="progress-itms"><span class="title">Facture proforma</span></li>
          <li id="progress-itms"><span class="title">Eligibilite du cabinet</span></li>
        </ul>
      </div>
      <div class="footer-left"></div>
    </div>
    <form method="POST" enctype="multipart/form-data">
      <div class="card card-active">
        <div class="right-side">
          <div class="uper-right pd-4">
            <img src="../../../../vendor/img/favicon.png" alt="Intellecus" />
            <h2>Intellecus</h2>
          </div>
          <div class="body-right">
            <div class="input-section">
              <input type="file" class="file" name="pdf" value="" />
              <small><sub>*</sub> Veuiller inserer Fiche D'information</small><br>
            </div>
          </div>
          <div class="footer-right">
            <button class="btn btn-suivant" id="btn-suivant"  type="button">
              <span class="arrow">Suivant</span>
            </button>
            <button type="button" class="btn btn-quitter" id="btn-quitter" onclick="quitter()">
              Quitter
            </button>
          </div>
        </div>
      </div>
      <div class="card ">
        <div class="right-side">
          <div class="uper-right pd-4">
            <img src="../../../../vendor/img/favicon.png" alt="Intellecus" />
            <h2>Intellecus</h2>
          </div>
          <div class="body-right">
            <div class="input-section">
              <input type="file" class="file" name="pdf1" value="" />
              <small><sub>*</sub> Veuiller inserer Facture performa</small><br>
            </div>
          </div>
          <div class="footer-right">
            <button class="btn btn-suivant"  id="btn-suivant"  type="button">
              <span class="arrow">Suivant</span>
            </button>
            <button type="button" class="btn btn-quitter" id="btn-quitter" onclick="quitter()">
              Quitter
            </button>
          </div>
        </div>
      </div>
      <div class="card ">
        <div class="right-side">
          <div class="uper-right pd-4">
            <img src="../../../../vendor/img/favicon.png" alt="Intellecus" />
            <h2>Intellecus</h2>
          </div>
          <div class="body-right">
            <div class="input-section">
              <input type="file" class="file" name="pdf2" value="" />
              <small><sub>*</sub> Veuiller inserer L'offre commerciale IF</small><br>
            </div>
          </div>
          <div class="footer-right">
            <button class="btn btn-suivant" id="btn-suivant"   type="button">
              <span class="arrow">Suivant</span>
            </button>
            <button type="button" class="btn btn-quitter" id="btn-quitter" onclick="quitter()">
              Quitter
            </button>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="right-side">
          <div class="uper-right pd-4">
            <img src="/vendor/img/favicon.png" alt="Intellecus" />
            <h2>Intellecus</h2>
          </div>
          <div class="body-right">
            <div class="input-section">
              <input type="file" class="file" name="img" value="" />
              <small><sub>*</sub> Veuiller inserer Image d'eligibliter de cabinet</small>
              <br />
            </div>
          </div>
          <div class="footer-right">
            <button class="btn btn-suivant" type="submit" name="Valider" id="btn-suivant">
              <span>terminer</span>
            </button>
            <button class="btn btn-quitter" id="btn-quitter" onclick="quitter()" type="button">
              Quitter
            </button>
          </div>
        </div>
      </div>
    </form>
  </div>
  <script src="../etapes/vendor/script/etapes.js"></script>
  <script>
    //Quitter button
    function quitter() {
      window.location.href = "../../Consult/DossierGiacCabin.php";
    }
  </script>
</body>
<?php
//echo "<script>alert('".$_SESSION['Id_Client']."');</script>";
if (isset($_POST['Valider'])) {
  $Id_Client = $_GET["id"];
  if (mkdir($curdir . "../../../Assest/C" . $_GET["id"] . "/D4", 0777)) {
  }
  // $chiffre =  htmlspecialchars(strip_tags($_POST['chiffre']));
  // $Appellation =  htmlspecialchars(strip_tags($_POST['Appellation']));
  // $Adresse =  htmlspecialchars(strip_tags($_POST['Adresse']));

  $chemin = "../../../Assest/C" . $_GET["id"] . "/D4" . "/";

  $pdf = $_FILES['pdf']['name'];
  $pdf_type = $_FILES['pdf']['type'];
  $pdf_size = $_FILES['pdf']['size'];
  $pdf_tem_loc = $_FILES['pdf']['tmp_name'];
  $pdf_store = $chemin . $pdf;
  move_uploaded_file($pdf_tem_loc, $pdf_store);

  $pdf1 = $_FILES['pdf1']['name'];
  $pdf1_type = $_FILES['pdf1']['type'];
  $pdf1_size = $_FILES['pdf1']['size'];
  $pdf1_tem_loc = $_FILES['pdf1']['tmp_name'];
  $pdf1_store = $chemin . $pdf1;
  move_uploaded_file($pdf1_tem_loc, $pdf1_store);

  $pdf2 = $_FILES['pdf2']['name'];
  $pdf2_type = $_FILES['pdf2']['type'];
  $pdf2_size = $_FILES['pdf2']['size'];
  $pdf2_tem_loc = $_FILES['pdf2']['tmp_name'];
  $pdf2_store = $chemin . $pdf2;
  move_uploaded_file($pdf2_tem_loc, $pdf2_store);

  $img = $_FILES['img']['name'];
  $img_type = $_FILES['img']['type'];
  $img_size = $_FILES['img']['size'];
  $img_tem_loc = $_FILES['img']['tmp_name'];
  $img_store = $chemin . $img;
  move_uploaded_file($img_tem_loc, $img_store);

  $stmt = $conn->prepare("INSERT INTO dossier_admin_giac_cabinet(Id_client,Fiche_Information,Offre_Commercial_IF,Facture_proforma,Eligibite_Cabinet) VALUES (?,?,?,?,?);");
  $stmt->bindParam(1, $_GET["id"], PDO::PARAM_INT);
  $stmt->bindParam(2, $pdf, PDO::PARAM_STR, 200);
  $stmt->bindParam(3, $pdf1, PDO::PARAM_STR, 200);
  $stmt->bindParam(4, $pdf2, PDO::PARAM_STR, 200);
  $stmt->bindParam(5, $img, PDO::PARAM_STR, 200);
  $stmt->execute();

  require_once './vendor/mail/mail.php';

        $mail->setFrom('testmailhakim@gmail.com', 'hakim');
        $mail->addAddress('oussamaouardi80@gmail.com');
        $mail->Subject = 'message pour ADMIN TECH GIAC';
        $mail->Body    = 'bonsoir bien recu???,reponder <b>Merci!</b>';
        $mail->send();
  
  echo "<script>quitter();</script>";
  //header( 'Location: ../prog.php');*/
}


?>

</html>
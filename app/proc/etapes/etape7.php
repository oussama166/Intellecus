<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../../../vendor/img/favicon.png" type="image/x-icon">
  <title>Dossier Finnacier OFPPT</title>
  <!-- css -->
  <link rel="stylesheet" href="./vendor/css/etapes.css">
  <?php
    require("../../../APPConfig/ConnectionData.php");

    session_start();
    if (!$_SESSION['Id_Client']) {
      $_SESSION = array();
      session_destroy();
      header('Location: ../../../connection.php');
    }
    else if (!idClient($_SESSION['Id_Client'], $conn)) {

      $_SESSION = array();
      session_destroy();
      header('Location: ../../error/error.php');
    }else if (!idFlag7($_SESSION['Id_Client'], $conn)) {

      $_SESSION = array();
      session_destroy();
      header('Location: ../../error/error.php');
    };
    ?>
</head>
<body>
  <div class="container">
    <div class="left-side">
        <div class="uper-left">
          <h1 class="pd-1 ml-1 txt-ctr">Dossier Finnacier OFPPT</h1>
        </div>
        <div class="body-left p-4">
          <ul class="list-unstyled multi-steps">
            <li id="progress-itms" class="is-active">
              <span class="title">Model 6</span>
            </li>
            <li id="progress-itms" calss="">
              <span class="title">Factures de realisation du cabinet</span>
            </li>
            <li id="progress-itms" class="">
              <span class="title">Justificatif de paiment</span>
            </li>
          </ul>
        </div>
        <div class="footer-left"></div>
    </div>
    <form method="POST" enctype="multipart/form-data">
            <div class="card card-active">
                <div class="right-side">
                    <div class="uper-right p-4">
                        <img src="../../../vendor/img/favicon.png" alt="Intellecus" />
                        <h2 class="">Intellecus</h2>
                    </div>
                    <div class="body-right">
                        <div class="input-section p-5">
                            <div class="section">
                                <input type="file" class="file" id="file" name="pdf" />
                                <br><br> 
                                <sub class="pd-4">*</sub><small class="pd-4 ">Tableau recapulatif des actions realisees & payees</small>
                            </div>
                        </div>
                    </div>
                    <div class="footer-right">
                        <button class="btn btn-suivant" id="btn-suivant" type="button">
                            <span class="arrow">Suivant</span></button>
                        <button type="button" class="btn btn-quitter" id="btn-quitter" onclick="quitter()">Quitter</button>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="right-side">
                    <div class="uper-right p-4">
                        <img src="/vendor/img/favicon.png " alt="Intellecus" />
                        <h2>Intellecus</h2>
                    </div>
                    <div class="body-right">
                        <div class="input-section ">
                            <input type="file" class="file" name="pdf1"  />
                            <br><br> 
                                <sub class="pd-4">*</sub><small class="pd-4">Factures de realisations du cabinet</small>
                        </div>
                    </div>
                    <div class="footer-right">
                        <button class="btn btn-suivant" id="btn-suivant" type="button">
                            <span class="arrow">Suivant</span></button>
                        <button type="button" class="btn btn-quitter" id="btn-quitter" onclick="quitter()">Quitter</button>
                    </div>
                </div>
            </div>
            <div class="card ">
                <div class="right-side ">
                    <div class="uper-right pd-4 ">
                        <img src="/vendor/img/favicon.png " alt="Intellecus " />
                        <h2>Intellecus</h2>
                    </div>
                    <div class="body-right ">
                        <div class="input-section ">
                            <input type="file" name="pdf2" class="file">
                            <br>
                            <br> 
                            <sub class="">*</sub><small class="pd-4">Justificatif de paiment</sub></small>
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
  <!-- js -->
  <script src="./vendor/script/etapes.js"></script>
  <script>
        //Quitter button
        function quitter() {
            window.location.href = "../prog.php";
        }
    </script>
  <?php
//echo "<script>alert('".$_SESSION['Id_Client']."');</script>";
if (isset($_POST['Valider'])){
  $Id_Client = $_SESSION['Id_Client'];
  if(mkdir($curdir . "../../../Assest/C".$Id_Client."/D8",0777)){} 

//   $chiffre =  htmlspecialchars(strip_tags($_POST['chiffre']));
//   $Appellation =  htmlspecialchars(strip_tags($_POST['Appellation']));
//   $Adresse =  htmlspecialchars(strip_tags($_POST['Adresse']));
  
  $chemin = "../../../Assest/C".$Id_Client."/D8"."/";

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
        move_uploaded_file($pdf2_tem_loc, $pdf2_store);;

$stmt = $conn->prepare("INSERT INTO dossier_finnancier_ofppt(Id_client,Model_6,Facture_Realisation_Cabinet,Jusstificatifs_paiements) VALUES (?,?,?,?)");
$stmt->bindParam(1, $Id_Client, PDO::PARAM_INT);
$stmt->bindParam(2, $pdf, PDO::PARAM_STR,200);
$stmt->bindParam(3, $pdf1, PDO::PARAM_STR,200);
$stmt->bindParam(4, $pdf2, PDO::PARAM_STR,150);
$stmt->execute();
echo "<script>quitter();</script>";
  //header( 'Location: ../prog.php');


}
?>
</body>
</html>
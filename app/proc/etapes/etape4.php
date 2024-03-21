<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
	<title>Dossier Techni GIAC | PFE</title>
	<link rel="shortcut icon" href="../../../vendor/img/favicon.png" type="image/x-icon">
  <!-- css  -->
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
    }else if (!idFlag4($_SESSION['Id_Client'], $conn)) {

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
          <h1 class="pd-1 ml-1 txt-ctr">Fichier Techni GIAC</h1>
        </div>
        <div class="body-left p-4">
          <ul class="list-unstyled multi-steps">
            <li id="progress-itms" class="is-active">
              <span class="title">Plaging de realisation</span>
            </li>
            <li id="progress-itms" calss="">
              <span class="title">Intervention de cabinet</span>
            </li>
            <li id="progress-itms" class="">
              <span class="title">Cloture de dossier<sub>(1)</sub></span>
            </li>
            <li id="progress-itms" class="">
              <span class="title">Cloture de dossier<sub>(2)</sub></span>
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
                                <input type="file" class="file" id="file" name="pdf"/>
                                <br><br> 
                                <sub class="pd-4">*</sub><small class="pd-4 ">Plaging de realisation</small>
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
                            <input type="file" class="file" name="pdf1" value=""   />
                            <br><br> 
                                <sub class="pd-4">*</sub><small class="pd-4">Intervention de cabinet</small>
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
                            <sub class="">*</sub><small class="pd-4 ">Fiche d'entretient conformement au plaging <br><sub>Cachté par entreprose & cabinet</sub></small>
                        </div>
                        <div class="input-section ">
                            <input type="file" name="pdf3" class="file"> 
                            <sub class="">*</sub><small class="pd-4 ">Page de garde</small>
                        </div>
                        <div class="input-section ">
                            <input type="file" name="pdf4" class="file">
                            <br>
                            <br> 
                            <sub class="">*</sub><small class="pd-4">Rapport d'etude</small>
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
                            <input type="file" name="pdf5" class="file">
                            <br>
                            <br> 
                            <sub class="">*</sub><small class="pd-4">Model 1</sub></small>
                        </div>
                        <div class="input-section ">
                            <input type="file" name="pdf6" class="file"> 
                            <sub class="">*</sub><small class="pd-4">Fiche Technique (par cabinet)</small>
                        </div>
                        <div class="input-section ">
                            <input type="file" name="pdf7" class="file">
                            <br>
                            <br> 
                            <sub class="">*</sub><small class="pd-4">Fiche F3 (Cachté par cabinet)</small>
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

    <!-- script js -->
    <script src="./vendor/script/etapes.js"></script>
    <script>
        //Quitter button
        function quitter() {
            window.location.href = "../prog.php";
        }
    </script>
</body>
<?php
if (isset($_POST['Valider'])) {
    //echo "<script>alert('HIIIII');</script>";
    $Id_Client = $_SESSION['Id_Client'];
    if(mkdir($curdir . "../../../Assest/C".$Id_Client."/D5",0777)){} 


        $chemin = "../../../Assest/C".$Id_Client."/D5"."/";

        $pdf=$_FILES['pdf']['name'];
        $pdf_type=$_FILES['pdf']['type'];
        $pdf_size=$_FILES['pdf']['size'];
        $pdf_tem_loc=$_FILES['pdf']['tmp_name'];
        $pdf_store=$chemin.$pdf;
        move_uploaded_file($pdf_tem_loc, $pdf_store);

         $pdf1=$_FILES['pdf1']['name'];
        $pdf1_type=$_FILES['pdf1']['type'];
        $pdf1_size=$_FILES['pdf1']['size'];
        $pdf1_tem_loc=$_FILES['pdf1']['tmp_name'];
        $pdf1_store=$chemin.$pdf1;
        move_uploaded_file($pdf1_tem_loc, $pdf1_store);

        $pdf2=$_FILES['pdf2']['name'];
        $pdf2_type=$_FILES['pdf2']['type'];
        $pdf2_size=$_FILES['pdf2']['size'];
        $pdf2_tem_loc=$_FILES['pdf2']['tmp_name'];
        $pdf2_store=$chemin.$pdf2;
        move_uploaded_file($pdf2_tem_loc, $pdf2_store);

        $pdf3=$_FILES['pdf3']['name'];
        $pdf3_type=$_FILES['pdf3']['type'];
        $pdf3_size=$_FILES['pdf3']['size'];
        $pdf3_tem_loc=$_FILES['pdf3']['tmp_name'];
        $pdf3_store=$chemin.$pdf3;
        move_uploaded_file($pdf3_tem_loc, $pdf3_store);

        $pdf4=$_FILES['pdf4']['name'];
        $pdf4_type=$_FILES['pdf4']['type'];
        $pdf4_size=$_FILES['pdf4']['size'];
        $pdf4_tem_loc=$_FILES['pdf4']['tmp_name'];
        $pdf4_store=$chemin.$pdf4;
        move_uploaded_file($pdf4_tem_loc, $pdf4_store);

        $pdf5=$_FILES['pdf5']['name'];
        $pdf5_type=$_FILES['pdf5']['type'];
        $pdf5_size=$_FILES['pdf5']['size'];
        $pdf5_tem_loc=$_FILES['pdf5']['tmp_name'];
        $pdf5_store=$chemin.$pdf5;
        move_uploaded_file($pdf5_tem_loc, $pdf5_store);

        $pdf6=$_FILES['pdf6']['name'];
        $pdf6_type=$_FILES['pdf6']['type'];
        $pdf6_size=$_FILES['pdf6']['size'];
        $pdf6_tem_loc=$_FILES['pdf6']['tmp_name'];
        $pdf6_store=$chemin.$pdf6;
        move_uploaded_file($pdf6_tem_loc, $pdf6_store);

        $pdf7=$_FILES['pdf7']['name'];
        $pdf7_type=$_FILES['pdf7']['type'];
        $pdf7_size=$_FILES['pdf7']['size'];
        $pdf7_tem_loc=$_FILES['pdf7']['tmp_name'];
        $pdf7_store=$chemin.$pdf7;
        move_uploaded_file($pdf7_tem_loc, $pdf7_store);

        $stmt = $conn->prepare("INSERT INTO dossier_technique_giac(Id_client,Planing_Realisation,Intervention_de_cabinet,Fiches_Entretien_Confo_Planing,Page_Garde_Suivant_MDL,Rapport_Etude_IF,Plan_Formation,Fiche_Technique_Action,Fiche_F3) VALUES (?,?,?,?,?,?,?,?,?);");
        $stmt->bindParam(1, $Id_Client, PDO::PARAM_INT);
        $stmt->bindParam(2, $pdf, PDO::PARAM_STR,200);
        $stmt->bindParam(3, $pdf1, PDO::PARAM_STR,200);
        $stmt->bindParam(4, $pdf2, PDO::PARAM_STR,200);
        $stmt->bindParam(5, $pdf3, PDO::PARAM_STR,200);
        $stmt->bindParam(6, $pdf4, PDO::PARAM_STR,200);
        $stmt->bindParam(7, $pdf5, PDO::PARAM_STR,200);
        $stmt->bindParam(8, $pdf6, PDO::PARAM_STR,200);
        $stmt->bindParam(9, $pdf7, PDO::PARAM_STR,200);

        $stmt->execute();
        echo "<script>quitter();</script>";
    //header( 'Location: ../prog.php');


}
?>
</html>
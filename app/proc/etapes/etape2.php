<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="/vendor/img/favicon.png" type="image/x-icon" />

    <script type="text/javascript" src="../../../vendor/lib/Datejs-master/build/date-fr-FR.js"></script>
    <!-- <script src="../../../vendor/lib/Datejs-master/src/core.js"></script> -->
    <script src="../../../vendor/lib/Datejs-master/src/core.js"></script>
    <script src="../../../vendor/lib/Datejs-master/src/parser.js"></script>
    <script src="../../../vendor/lib/Datejs-master/src/sugarpak.js"></script>
    <script src="../../../vendor/lib/Datejs-master/src/time.js"></script>
    <script src="../../../vendor/lib/Datejs-master/src/extras.js"></script>
    <!-- css -->
    <link rel="stylesheet" href="./vendor/css/etapes.css" />
    <title>Dossier Administratif OFPPT | PFE</title>
    <?php
    require("../../../APPConfig/ConnectionData.php");

    session_start();
    if (!$_SESSION['Id_Client']) {
        $_SESSION = array();
        session_destroy();
        header('Location: ../../../connection.php');
    } else if (!idClient($_SESSION['Id_Client'], $conn)) {

        $_SESSION = array();
        session_destroy();
        header('Location: ../../error/error.php');
    } else if (!idFlag1($_SESSION['Id_Client'], $conn)) {

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
                <h1 class="pd-1 ml-1 txt-ctr">Fichier Admin OFPPT</h1>
            </div>
            <div class="body-left">
                <ul class="list-unstyled multi-steps">
                    <li id="progress-itms" class="is-active">
                        <span class="title">Fichier F1</span>
                    </li>
                    <li id="progress-itms" calss="">
                        <span class="title">Extrait de model J</span>
                    </li>
                    <li id="progress-itms" class="">
                        <span class="title">Signature</span>
                    </li>
                    <li id="progress-itms" class="">
                        <span class="title">Rib</span>
                    </li>
                </ul>
            </div>
            <div class="footer-left "></div>
        </div>
        <form method="POST" enctype="multipart/form-data">
            <div class="card card-active">
                <div class="right-side">
                    <div class="uper-right pd-4">
                        <img src="/vendor/img/favicon.png" alt="Intellecus" />
                        <h2 class="">Intellecus</h2>
                    </div>
                    <div class="body-right">
                        <div class="input-section">
                            <div class="section">
                                <input type="file" class="file" name="pdf" id="file" /><br>
                                <br>
                                <sub class="pd-4">*</sub><small class="pd-4">Fichier F1</small>
                            </div>
                            <ul>
                                <li>
                                    <label><input type="checkbox" name="check-one">
                                        Rensigné
                                        <label>
                                </li>
                                <br>
                                <li>
                                    <label><input type="checkbox" name="check-two ">
                                        Rensigné
                                    </label>
                                </li>
                                <br>
                                <li>
                                    <label>
                                        <input type="checkbox" name="check-last">Rensigné
                                    </label>
                                </li>
                                <br>
                                <li>
                                    <label>
                                        <input type="checkbox" name="check-last-one">Rensigné
                                    </label>
                                </li>
                                <br>
                            </ul>

                        </div>
                        <!---<div class=" input-section ">
                        <small class="Ou">ou</small>
                    </div>
                    <div class="input-section">
                        <p>vous pouvez remplir le fichier
                            <a href="../../../vendor/doc/Formulaire_F1.pdf ">F1</a> puis le telecharger
                        </p>
                    </div>-->
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
                        <div class="input-section">
                            <input type="date" class="date" id="ladate" name="ladate" />
                        </div>
                        <div class="input-section ">
                            <input type="file" class="file" name="pdf1" value="" />
                        </div>
                    </div>
                    <div class="footer-right">
                        <button class="btn btn-suivant " id="btnsuiv" type="button">
                            <span class="arrow ">Suivant</span></button>
                        <button type="button " class="btn btn-quitter " id="btn-quitter " onclick="quitter() ">Quitter</button>
                    </div>
                </div>
            </div>
            <div class="card ">
                <div class="right-side ">
                    <div class="uper-right pd-4 ">
                        <img src="/vendor/img/favicon.png " alt="Intellecus " />
                        <h2>Intellecus</h2>
                    </div>
                    <div class="body-right">
                        <div class="input-section ">
                            <input type="file" name="pdf2" class="file">
                        </div>
                        <div class="input-section ">
                            <label for="status" class="mr-1">
                                <input type="radio" name="ljust" value="status" id="signature" checked>
                                status
                            </label>
                            <label for="status">
                                <input type="radio" name="ljust" value="status+pouvoire" id="signature">
                                status+pouvoire
                            </label>
                        </div>
                    </div>
                    <div class="footer-right ">
                        <button class="btn btn-suivant " id="btn-suivant " type="button" >
                            <span class="arrow ">Suivant</span></button>
                        <button type="button " class="btn btn-quitter " id="btn-quitter " onclick="quitter() ">Quitter</button>
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
                            <input type="file" name="pdf3" class="file" />
                        </div>
                        <div class="input-section ">
                            <label for="copie" class="mr-1"><input type="radio" name="rib" id="copie" value="Copie" checked> Copie</label>
                            <label for="original"><input type="radio" name="rib" id="original" value="original"> original</label>
                        </div>
                    </div>
                    <div class="footer-right ">
                        <button class="btn btn-suivant" name="Valider" id="btn-suivant" type="submit">
                            <span>terminer</span>
                        </button>
                        <button type="button " class="btn btn-quitter " id="btn-quitter " onclick="quitter()">Quitter</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    </div>
    <script src="vendor/script/etapes.js"></script>
    <script>
        //Quitter button
        var dates = document.getElementById("ladate");

        dates.addEventListener(
            "change",
            function(e) {
                var dateMst = Date.parse(dates.value);
                var btn = document.getElementById('btnsuiv');

                if (dateMst.addMonths(3).getTime()>=Date.today().getTime()) {
                    
                    btn.removeAttribute('disabled') ;
                } else {
                    btn.setAttribute('disabled','true') ;
                    //btn.style.display= 'block' ;
                    
                }
            },
            false
        );

        function quitter() {
            window.location.href = "../prog.php";
        }
    </script>
    <?php
    //echo "<script>alert('".$_SESSION['Id_Client']."');</script>";
    if (isset($_POST['Valider'])) {
        //echo "<script>alert('HIIIII');</script>";
        $Id_Client = $_SESSION['Id_Client'];
        if (mkdir($curdir . "../../../Assest/C" . $Id_Client . "/D2", 0777)) {
        };

        $date =  htmlspecialchars(strip_tags($_POST['ladate']));
        $detailjust = htmlspecialchars(strip_tags($_POST['ljust']));
        $detailRIB = htmlspecialchars(strip_tags($_POST['rib']));
        $chemin = "../../../Assest/C" . $Id_Client . "/D2" . "/";
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

        $pdf3 = $_FILES['pdf3']['name'];
        $pdf3_type = $_FILES['pdf3']['type'];
        $pdf3_size = $_FILES['pdf3']['size'];
        $pdf3_tem_loc = $_FILES['pdf3']['tmp_name'];
        $pdf3_store = $chemin . $pdf3;
        move_uploaded_file($pdf3_tem_loc, $pdf3_store);

        $detailjust = htmlspecialchars(strip_tags($_POST['status']));
        $detailRIB = htmlspecialchars(strip_tags($_POST['rib']));
        $stmt = $conn->prepare("INSERT INTO dossier_admin_ofppt(Id_client, Fichier_F1,Extrait_mdi_J,Date_Expir_Mdi_J,Justificatif_pouv,Detail_Justifi_pouv,Rib,Detail_Rib) VALUES (?,?,?,?,?,?,?,?);");
        $stmt->bindParam(1, $Id_Client, PDO::PARAM_INT);
        $stmt->bindParam(2, $pdf, PDO::PARAM_STR, 200);
        $stmt->bindParam(3, $pdf1, PDO::PARAM_STR, 200);
        $stmt->bindParam(4, $date, PDO::PARAM_STR, 150);
        $stmt->bindParam(5, $pdf2, PDO::PARAM_STR, 200);
        $stmt->bindParam(6, $detailjust, PDO::PARAM_STR, 50);
        $stmt->bindParam(7, $pdf3, PDO::PARAM_STR, 200);
        $stmt->bindParam(8, $detailRIB, PDO::PARAM_STR, 50);
        $stmt->execute();
        echo "<script>quitter();</script>";
    }
    ?>
</body>

</html>
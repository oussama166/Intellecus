<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="/vendor/img/favicon.png" type="image/x-icon" />
    <!-- css -->
    <link rel="stylesheet" href="./vendor/css/etapes.css" />
    <title>Eligibilité | PFE</title>
</head>

<body>
<div class="container">
    <div class="left-side">
        <div class="uper-left">
            <h1 class="pd-1 ml-1 txt-ctr">Eligibilité</h1>
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
                    <span class="title ">Signature</span>
                </li>
                <li id="progress-itms" class="">
                    <span class="title ">Rib</span>
                </li>
            </ul>
        </div>
        <div class="footer-left"></div>
    </div>
    <form  method="POST" enctype="multipart/form-data">
        <div class="card card-active">
            <div class="right-side">
                <div class="uper-right pd-4">
                    <img src="/vendor/img/favicon.png" alt="Intellecus" />
                    <h2 class="">Intellecus</h2>
                </div>
                <div class="body-right">
                    <div class="input-section">
                        <div class="section">
                            <input type="file" class="file" id="file" /><br>
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
                                <label><input type="checkbox" name="check-two " >
                                    Rensigné
                                </label>
                            </li>
                            <br>
                            <li>
                                <label>
                                    <input type="checkbox" name="check-last" >Rensigné
                                </label>
                            </li>
                            <br>
                            <li>
                                <label>
                                    <input type="checkbox" name="check-last-one" >Rensigné
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
                        <input type="date" class="date"/>
                    </div>
                    <div class="input-section">
                        <input type="file" class="file" name="img" value=""/>
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
            <div class="right-side">
                <div class="uper-right pd-4">
                    <img src="/vendor/img/favicon.png" alt="Intellecus" />
                    <h2>Intellecus</h2>
                </div>
                <div class="body-right">
                    <div class="input-section">
                        <input type="file" class="file" name="img" value=""   />
                        <small><sub>*</sub> Veuiller inserer le za3tr</small><br>
                    </div>
                </div>
                <div class="footer-right">
                    <button class="btn btn-suivant" type="button" id="btn-suivant">
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
                        <input type="text" id="text" placeholder="Appelation" name="Appellation" />
                    </div>
                    <div class="input-section">
                        <input type="text" id="text" placeholder="Adresse" name="Adresse"/>
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
<script>//Quitter button
    function quitter() {
        window.location.href = "../prog.php";
    }</script>
</body>
<?php
//echo "<script>alert('".$_SESSION['Id_Client']."');</script>";
    if (isset($_POST['Valider'])){
    /*$Id_Client = $_SESSION['Id_Client'];*/
    /*if(mkdir($curdir . "../../Assest/C".$Id_Client."/D1",0777)){}*/
        echo"<script>alert('hakim');</script>";
    /* $chiffre =  htmlspecialchars(strip_tags($_POST['chiffre']));
     $Appellation =  htmlspecialchars(strip_tags($_POST['Appellation']));
     $Adresse =  htmlspecialchars(strip_tags($_POST['Adresse']));

     $chemin = "../../../Assest/C".$Id_Client."/D1"."/";

      $img=$_FILES['img']['name'];
     $img_type=$_FILES['img']['type'];
     $img_size=$_FILES['img']['size'];
     $img_tem_loc=$_FILES['img']['tmp_name'];
     $img_store=$chemin.$img;
     move_uploaded_file($img_tem_loc, $img_store);
     $stmt = $conn->prepare("INSERT INTO eligibite VALUES (?,?,?,?,?);");
     $stmt->bindParam(1, $Id_Client, PDO::PARAM_INT);
     $stmt->bindParam(2, $chiffre, PDO::PARAM_INT);
     $stmt->bindParam(3, $img, PDO::PARAM_STR,200);
     $stmt->bindParam(4, $Appellation, PDO::PARAM_STR,150);
     $stmt->bindParam(5, $Adresse, PDO::PARAM_STR,200);
     $stmt->execute();
     echo "<script>quitter();</script>";
     //header( 'Location: ../prog.php');*/
}


?>

</html>
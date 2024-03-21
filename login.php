<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./vendor/css/style.css">
    <link rel="shortcut icon" href="vendor/img/favicon.png" type="image/x-icon">
    
    <title>Inscription |PFE</title>

    <?php 
    
      require("./APPConfig/ConnectionData.php");
      session_start();
    if(!$_SESSION['Id_Client'] ){
        $_SESSION=array();
        session_destroy();
        header('Location: app/error/error.php');
      }
      if(!idAdmin($_SESSION['Id_Client'],$conn)){
        header('Location: app/error/error.php');
      }
      
    
    $raison = afficherRaison($conn);
    $entrepriseT = afficherentreprise($conn);
    
    ?>
    
  </head>
  <body >
    <div class="inscription">
      <div class="header" style="margin-top: -10%;">
        <h1>Inscription</h1>
        <h3>Inscription dans la platform intellecus</h3>
        <form method="POST">
        <button name="Menu" style="margin-bottom: 2em;" type="submit">Menu</button>
        </form>
      </div>
      <div class="body">
        <form method="POST">
          <div class="ligne">
            <input type="text" placeholder="Name (*)"  name ="nom" required autofocus/>
            <input type="text" placeholder="Prenom (*)" required  name="prenom"/>
          </div>
          <div class="ligne">
            <input type="email" placeholder="Email (*)" name="email" required />
            <select name="raisonsos" id="">
            <?php foreach($raison as $raisonsocial): ?>
            <option value="<?= $raisonsocial->Id_Raison_Social?>"><?= $raisonsocial->Designation?></option>
            <?php endforeach; ?>
            </select>
          </div>
          <div class="ligne">
              <select name="Id_entreprise" >
              <?php foreach($entrepriseT as $entreprise):?>
              <option value="<?= $entreprise->Id_Entreprise?>" selected ><?= $entreprise->Nom_Entreprise?></option>
              <?php endforeach;?>
              </select>
          </div>
          <div class="ligne">
            <input type="password" placeholder="Mots de passe (*)" name="password" required />
            <input type="password" placeholder="Confirmation de mots de passe (*)"required />
            
          </div>
          <div class="ligne">
            <input type="checkbox" name="policy" required="required">
            <lable for="policy">Je confirme les<samll> Tersmes,Conditions,Policy</samll>
            (*)
            </lable>
          </div>
          <div class="ligne">
            <input type="submit" value="Submit" name="AJOUTER"/>
          </div>
        </form>
      </div>
    </div>
    <?php 
    if(isset($_POST["Menu"])){

      header('Location: app/menue/menue.php');
    }
    if (isset($_POST['AJOUTER'])){
      $nom =  htmlspecialchars(strip_tags($_POST['nom']));
      $prenom =  htmlspecialchars(strip_tags($_POST['prenom']));
      $email =  htmlspecialchars(strip_tags($_POST['email']));
      $raisonsos =  htmlspecialchars(strip_tags($_POST['raisonsos']));
      $Id_entreprise =  htmlspecialchars(strip_tags($_POST['Id_entreprise']));
      $password =  htmlspecialchars(strip_tags($_POST['password']));
      $Id_Client = $_SESSION['Id_Client'];
      $stmt = $conn->prepare("insert into Client (Nom_Client,Prenom_Client,Email,Password_Client,Id_raison_social,Id_entreprise) values(?,?,?,?,?,?); ");
      $stmt->bindParam(1, $nom, PDO::PARAM_STR,50);
      $stmt->bindParam(2, $prenom, PDO::PARAM_STR,50);
      $stmt->bindParam(3, $email, PDO::PARAM_STR,125);
      $stmt->bindParam(4, $password, PDO::PARAM_STR,50);
      $stmt->bindParam(5, $raison, PDO::PARAM_INT);
      $stmt->bindParam(6, $Id_entreprise, PDO::PARAM_INT);
      $stmt->execute();
      
      echo "<script>alert('Client a été ajouter avec succèès');</script>";
              

    }




    function afficherRaison($conn){
        
      $req = $conn->prepare("SELECT * FROM raisonsocial");
      $req->execute();
      $data = $req->fetchAll(PDO::FETCH_OBJ);
      RETURN $data;
      $req->closeCursor();
}

function afficherentreprise($conn){
  
      $req = $conn->prepare("SELECT * FROM entreprise");
      $req->execute();
      $data = $req->fetchAll(PDO::FETCH_OBJ);
      RETURN $data;
      $req->closeCursor($conn);
}
    ?>
    <script src="vendor/js/script.js"></script>
  </body>
</html>

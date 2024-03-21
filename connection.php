<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="vendor/css/connection.css" />
      <link rel="shortcut icon" href="vendor/img/favicon.png" type="image/x-icon">
    <title>Connection |PFE</title>
    <?php 
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      require("./APPConfig/ConnectionData.php");
    }

    ?>
  </head>
  <body>
    <div class="back">
      <div class="left-side"></div>
      <div class="right-side"></div>
    </div>
    <div class="principal">
      <div class="left">
        <video autoplay loop>
          <source src="vendor/img/vedio/pexels-pavel-danilyuk-8639839.mp4" type="video/mp4" />
        </video>
      </div>
      <div class="right">
        <div class="upper">
          <div class="ligne">
            <hr/>
            <img src="vendor/img/favicon.png" alt="Intellecus" />
          </div>
        </div>
        <div class="body">
          <h1>Connectez-vous</h1>
          <h3>pour accedrer a notre application</h3>
          <form method="POST">
            <input type="email" placeholder="mail@gmail.com" name="email" required/><br/>
            <input type="password" placeholder="mot de passe" name="Pasword" required/><br/>
            <!--AJOUTER-->
            <div class="section-rcpt">
              <input type="text" minlength="0" maxlength="4" pattern="[0-9]{4}" placeholder="Rcaptcha" id="rc" class="rcpst" required/>
              <input type="text" minlength="0" maxlength="4" placeholder="Rcaptcha"  id="rcp" disabled="true" /><br/>
            </div>
            <!--FIN AJOUTER-->
            <input type="submit" value="Connecter"  name="button1" /><br/>
          </form>
        </div>
      </div>
    </div>
    <script>
    <?php
    
    session_start();
    if (isset($_POST['button1'])) {
      $email = $_POST['email'];
      $pass = $_POST['Pasword'];
      $stmt = $conn->prepare("Select * from Client where Email= ? and Password_Client= ?");
      $stmt->bindParam(1, $email, PDO::PARAM_STR,30);
      $stmt->bindParam(2, $pass, PDO::PARAM_STR,30);
      $stmt->execute();
      $datas = $stmt->fetchAll(PDO::FETCH_OBJ);
      foreach($datas as $data){
        if($data->Id_Client >0){
          $_SESSION['Id_Client']=$data->Id_Client;
          if($data->Id_raison_social==1){
            header("Location: ./app/menue/menue.php");
          }
          elseif($data->Id_raison_social==2){
            header("Location: ./app/home/home.php");
          }
          elseif($data->Id_raison_social==3){
            header("Location: /app/Consult/Directeur.php");
            $_SESSION["entreor"]=1;
          }
          elseif($data->Id_raison_social==4){
            header("Location: ./app/Consult/table.php");
            $_SESSION["entreor"]=0;
          }
        }
        else{
        echo "<script> document.getElementById('Error').innerHTML=\"L'Email ou Mot de passe Not valid\";</script>";
      }
      break;
    }
  }

      // $resultadmin = mysqli_query($cont,$sql);
      // $sql1 = "Select *from Client where email='".$_POST['email']."' and password='".$_POST['Pasword']."'";
      //$resultclient = mysqli_query($cont,$sql1);
      

      
    
      //header("Location: ./login.php");
      
      // if(mysqli_num_rows($resultadmin)>0){
      //   while($row=mysqli_fetch_assoc($resultadmin)){
      //     $_SESSION['id_Admin']=$row['id_admin'];
      //     $_SESSION['email']=$_POST['email'];
      //     $rootadmin="/login.php";
      //     break;
      //   }
      // }
      // elseif(mysqli_num_rows($resultclient)>0)
      // {
      //   while($row=mysqli_fetch_assoc($resultclient)){
      //     $_SESSION['id_Client']=$row['id_Client'];
      //     $_SESSION['email']=$_POST['email'];
      //     $rootclient="/app/home/home.php";
      //     break;
      //   }
      // }
      // else{
      //   echo "<script> document.getElementById('Error').innerHTML=\"L'Email ou Mot de passe Not valid\";</script>";
      // }
    //}
    ?>
    </script>
    <!-- script -->
    <script src="vendor/js/script.js"></script>
  </body>
</html>

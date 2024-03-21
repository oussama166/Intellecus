<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="vendor/css/home.css" />
    <link rel="shortcut icon" href="../../vendor/img/favicon.png" type="image/x-icon">
  <title>Acceuil |PFE</title>
  <?php



  require("../../APPConfig/ConnectionData.php");
      session_start();
      if(!$_SESSION['Id_Client'] ){
        $_SESSION=array();
        session_destroy();
      header('Location: ../error/error.php');
      
      }
      
      if(!idClient($_SESSION['Id_Client'],$conn)){
        $_SESSION=array();
        session_destroy();
        header('Location: ../error/error.php');
        
      
      };


      ?>
</head>

<body>
  <div class="start translation">
    <h1>Depart</h1><span></span><span></span><span></span>
  </div>
  <form method="POST">
    <div class="principale">
      <div class="header">
        <div class="left">
          <img src="../../vendor/img/favicon.png" alt="Intllecus" />
          <h2>Intellecus</h2>
        </div>
        <div class="right">
          <button type="submit" name="Deconn">Deconnecter</button>
        </div>
      </div>


      <div class="body">
        <p>Centre formation & Consultation</p>
        <h2>Intellecus</h2>
        <p>Degitalisation de proccusse de disposition <br />des données</p>
      </div>

      <div class="bottom">
        <div class="left-layer"></div>
        <div class="right-layer">
          <span>Click moi!</span><br />
          <span>pour commoncer</span>
        </div>
      </div>
    </div>
  </form>
  <?php
  if (isset($_POST['Deconn'])){
    require("../../APPConfig/DeconnexionData.php");
    //echo "<script>alert('HI');</script>";
    header( 'Location: ../../connection.php');
  }
  $Id_Client = $_SESSION['Id_Client'];
  if(mkdir($curdir . "../../Assest/C".$Id_Client,0777)){} 

  // This process to send query to client table to get the flag client
  $stmt = $conn->prepare("select Flag from Client where Id_Client=?; ");
  // this send the pramater to the previous select query
  $stmt->bindParam(1, $Id_Client, PDO::PARAM_INT);
  $stmt->execute();
  $datas = $stmt->fetchAll(PDO::FETCH_OBJ);
  foreach ($datas as $data) {
    $flag = $data->Flag;
    break;
  }
  $_SESSION["fla"]=$flag;
  ?>
  <!-- Script -->
  <script src="/PFE/vendor/js/trans.js"></script>
</body>

</html>
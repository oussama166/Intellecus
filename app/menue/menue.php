<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="vendor/menue.css" />
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
  ?>
</head>

<body>
  <div class="container">
    <div class="header">
      <div class="left-head">
        <p>
          Lorem ipsum domlor sit amet consectetur adipisicing elit. Obcaecati
          quis deleniti voluptatibus.
        </p>
        <p>Suiver Notre Pas</p>
      </div>
      <div class="right-head">
        <button type="button" id="deco" name="DECO" onclick="Deconnection()">
          Deconnecter
        </button>
      </div>
    </div>

    <form method="POST">
      <div class="menue">
        <h1>Menue d'Admin</h1>
        <ul>
          <li>
            <button name="insc" type="submit">Inscription</button>
          </li>
          <li>
            <button name="supp" type="submit">Suppression d'une entreprise</button>
          </li>
          <li>
            <button name="Gest" type="submit">Gestion de dossier GIAC Cabinet</button>
          </li>
        </ul>
      </div>

    </form>
  </div>
  <?php
  if (isset($_POST["DECO"])) {
    $_SESSION = array();
    session_destroy();
    header('Location: ../../connection.php');
  }
  if (isset($_POST["insc"])) {

    header('Location: ../../login.php');
  }
  if (isset($_POST["supp"])) {
    header('Location: ../Consult/DeleteEntre.php');
  }
  if (isset($_POST["Gest"])) {
    header('Location: ../Consult/DossierGiacCabin.php');
  }
  ?>
</body>

</html>

  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php 
        require("../../../APPConfig/ConnectionData.php");

        session_start();
        if (!$_SESSION['Id_Client']) {
          $_SESSION = array();
          session_destroy();
          header('Location: ../../../connection.php');
        }
        if (!idClient($_SESSION['Id_Client'], $conn)) {

          $_SESSION = array();
          session_destroy();
          header('Location: ../../../connection.php');
        };
        if (!idFlag($_SESSION['Id_Client'], $conn)) {

          $_SESSION = array();
          session_destroy();
          header('Location: ../../../connection.php');
        };
    ?>
</head>
<body>
<form class="" action="" method="POST" enctype="multipart/form-data">
<input type="text" id="number" name="chiffre" placeholder="Montant de chiffre d'affairs"
                  
                />
  <label for="">Choose Your PDF File</label><br><br>
  Ficher 1: <br>
  <input id="pdf" type="file" name="img" value="" required><br>
  <input type="text" id="number" name="Appellation" placeholder="Appellation" /><br>
  <input type="text" id="number" name="Adresse" placeholder="Adresse" /><br>


  <input id="upload" type="submit" name="Valider" value="Upload">
</form>

    <?php 
    
    $Id_Client = $_SESSION['Id_Client'];
   

      if (isset($_POST['Valider'])){
        $Id_Client = $_SESSION['Id_Client'];
        $chiffre =  htmlspecialchars(strip_tags($_POST['chiffre']));
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
        
        header('Location: ../prog.php');
  
      }
    ?>
  </body>
</html>

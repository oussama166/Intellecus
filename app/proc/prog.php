<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.min.css" integrity="sha512-gMjQeDaELJ0ryCI+FtItusU9MkAifCZcGq789FrzkiM49D8lbDhoaUaIX4ASU187wofMNlgBJ4ckbrXM9sE6Pg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="./vendor/css/proc.css" />
  <title>Progress |PFE</title>
  <?php
  require("../../APPConfig/ConnectionData.php");

  session_start();
  //echo  "<script>alert('".$_SESSION['Id_Client']."');</script>";
  if (!$_SESSION['Id_Client']) {
    $_SESSION = array();
    session_destroy();
    //echo  "<script>alert('HIIIII');</script>";
    header('Location: ../../connection.php');
  } else if (!idClient($_SESSION['Id_Client'], $conn)) {

    //echo  "<script>alert('2');</script>";
    $_SESSION = array();
    session_destroy();
    header('Location: ../error/error.php');
  };
  if (isset($_POST['Deconn'])) {
    require("../../APPConfig/DeconnexionData.php");
    //echo "<script>alert('HI');</script>";
    header('Location: ../../connection.php');
  }

  ?>
</head>

<body>
  <div class="inscription" id="ins">
    <div class="inscription-fiche">
      <form method="POST">
        <h1>Inscription</h1>
        <input type="text" placeholder="Nom" name="Name" required />
        <br>
        <input type="text" placeholder="Prenom" name="Prenom" required />
        <br>
        <input type="text" placeholder="CIN" name="CIN" required />
        <br>
        <input type="submit" id="sub" value="Inscript" name="Inscript" />
      </form>
    </div>
  </div>
  <div class="alert" id="alrt">
    <div class="box">
      <p>Vous pouver pas contunier le procuces tans que entreprise</p>
      <p style="text-align: center;">Veuiller Deconnecter</p>
    </div>
  </div>
  <div class="principale">
    <div class="header">
      <div class="left-head">
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati
          quis deleniti voluptatibus.
        </p>
        <p>Suiver Notre Pas</p>
      </div>
      <div class="right-head">
        <form method="POST">
          <button type="submit" name="Deconn">Deconnecter</button>
        </form>
      </div>
    </div>
    <div class="body">
      <div class="left-body">
        <small>Lorem ipsum dolor sit amet consectetur adipisicing elit.
          Aspernatur, asperiores?
        </small>
      </div>
      <div class="right-body">
        <progress id="progress" max="100" value="0"></progress>
        <label id="prgssPor">0%</label>
      </div>
    </div>
    <div class="footer">
      <div class="uper-footer">
        <div class="card ">
          <div class="uper-card">
            <input type="checkbox" class="check" onclick="toggle(this,'input[type=checkbox]')" />
          </div>
          <div class="body-card">
            <svg width="100" height="100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg" class="check">
              <path d="M49.5833 0C60.0815 0 70.1497 4.17037 77.573 11.5937C84.9963 19.017 89.1667 29.0852 89.1667 39.5833C89.1667 50.0815 84.9963 60.1497 77.573 67.573C70.1497 74.9963 60.0815 79.1667 49.5833 79.1667C39.0852 79.1667 29.017 74.9963 21.5937 67.573C14.1704 60.1497 10 50.0815 10 39.5833C10 29.0852 14.1704 19.017 21.5937 11.5937C29.017 4.17037 39.0852 0 49.5833 0ZM49.5833 4.16667C40.1902 4.16667 31.1819 7.89806 24.54 14.54C17.8981 21.1819 14.1667 30.1903 14.1667 39.5833C14.1667 48.9764 17.8981 57.9848 24.54 64.6267C31.1819 71.2686 40.1902 75 49.5833 75C58.9764 75 67.9848 71.2686 74.6267 64.6267C81.2686 57.9848 85 48.9764 85 39.5833C85 30.1903 81.2686 21.1819 74.6267 14.54C67.9848 7.89806 58.9764 4.16667 49.5833 4.16667ZM47.5 20.8333V29.1667H51.6667V20.8333H47.5ZM47.5 37.5V58.3333H51.6667V37.5H47.5Z" fill="#C4C4C4" />
            </svg>
            <a href="../proc/etapes/etape1.php"><span>Eligibilité</span></a>
          </div>
        </div>
        <div class="card ">
          <div class="uper-card">
            <input type="checkbox" class="check" onclick="toggle(this,'input[type=checkbox]')" />
          </div>
          <div class="body-card">
            <svg width="100" height="100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg" class="check">
              <path d="M49.5833 0C60.0815 0 70.1497 4.17037 77.573 11.5937C84.9963 19.017 89.1667 29.0852 89.1667 39.5833C89.1667 50.0815 84.9963 60.1497 77.573 67.573C70.1497 74.9963 60.0815 79.1667 49.5833 79.1667C39.0852 79.1667 29.017 74.9963 21.5937 67.573C14.1704 60.1497 10 50.0815 10 39.5833C10 29.0852 14.1704 19.017 21.5937 11.5937C29.017 4.17037 39.0852 0 49.5833 0ZM49.5833 4.16667C40.1902 4.16667 31.1819 7.89806 24.54 14.54C17.8981 21.1819 14.1667 30.1903 14.1667 39.5833C14.1667 48.9764 17.8981 57.9848 24.54 64.6267C31.1819 71.2686 40.1902 75 49.5833 75C58.9764 75 67.9848 71.2686 74.6267 64.6267C81.2686 57.9848 85 48.9764 85 39.5833C85 30.1903 81.2686 21.1819 74.6267 14.54C67.9848 7.89806 58.9764 4.16667 49.5833 4.16667ZM47.5 20.8333V29.1667H51.6667V20.8333H47.5ZM47.5 37.5V58.3333H51.6667V37.5H47.5Z" fill="#C4C4C4" />
            </svg>
            <a href="../proc/etapes/etape2.php"><span>Administratif ofppt</span></a>
          </div>
        </div>
        <div class="card ">
          <div class="uper-card">
            <input type="checkbox" class="check" onclick="toggle(this,'input[type=checkbox]')" />
          </div>
          <div class="body-card">
            <svg width="100" height="100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg" class="check">
              <path d="M49.5833 0C60.0815 0 70.1497 4.17037 77.573 11.5937C84.9963 19.017 89.1667 29.0852 89.1667 39.5833C89.1667 50.0815 84.9963 60.1497 77.573 67.573C70.1497 74.9963 60.0815 79.1667 49.5833 79.1667C39.0852 79.1667 29.017 74.9963 21.5937 67.573C14.1704 60.1497 10 50.0815 10 39.5833C10 29.0852 14.1704 19.017 21.5937 11.5937C29.017 4.17037 39.0852 0 49.5833 0ZM49.5833 4.16667C40.1902 4.16667 31.1819 7.89806 24.54 14.54C17.8981 21.1819 14.1667 30.1903 14.1667 39.5833C14.1667 48.9764 17.8981 57.9848 24.54 64.6267C31.1819 71.2686 40.1902 75 49.5833 75C58.9764 75 67.9848 71.2686 74.6267 64.6267C81.2686 57.9848 85 48.9764 85 39.5833C85 30.1903 81.2686 21.1819 74.6267 14.54C67.9848 7.89806 58.9764 4.16667 49.5833 4.16667ZM47.5 20.8333V29.1667H51.6667V20.8333H47.5ZM47.5 37.5V58.3333H51.6667V37.5H47.5Z" fill="#C4C4C4" />
            </svg>
            <a href="../proc/etapes/etape3.php"><span>Administratif GIAC</span></a>
          </div>
        </div>
        <div class="card ">
          <div class="uper-card">
            <input type="checkbox" class="check" onclick="toggle(this,'input[type=checkbox]')" />
          </div>
          <div class="body-card">
            <svg width="100" height="100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg" class="check">
              <path d="M49.5833 0C60.0815 0 70.1497 4.17037 77.573 11.5937C84.9963 19.017 89.1667 29.0852 89.1667 39.5833C89.1667 50.0815 84.9963 60.1497 77.573 67.573C70.1497 74.9963 60.0815 79.1667 49.5833 79.1667C39.0852 79.1667 29.017 74.9963 21.5937 67.573C14.1704 60.1497 10 50.0815 10 39.5833C10 29.0852 14.1704 19.017 21.5937 11.5937C29.017 4.17037 39.0852 0 49.5833 0ZM49.5833 4.16667C40.1902 4.16667 31.1819 7.89806 24.54 14.54C17.8981 21.1819 14.1667 30.1903 14.1667 39.5833C14.1667 48.9764 17.8981 57.9848 24.54 64.6267C31.1819 71.2686 40.1902 75 49.5833 75C58.9764 75 67.9848 71.2686 74.6267 64.6267C81.2686 57.9848 85 48.9764 85 39.5833C85 30.1903 81.2686 21.1819 74.6267 14.54C67.9848 7.89806 58.9764 4.16667 49.5833 4.16667ZM47.5 20.8333V29.1667H51.6667V20.8333H47.5ZM47.5 37.5V58.3333H51.6667V37.5H47.5Z" fill="#C4C4C4" />
            </svg>
            <a href="../proc/etapes/etape4.php"><span>Technique GIAC</span></a>
          </div>
        </div>
        <div class="card ">
          <div class="uper-card">
            <input type="checkbox" class="check" onclick="toggle(this,'input[type=checkbox]')" />
          </div>
          <div class="body-card">
            <svg width="100" height="100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg" class="check">
              <path d="M49.5833 0C60.0815 0 70.1497 4.17037 77.573 11.5937C84.9963 19.017 89.1667 29.0852 89.1667 39.5833C89.1667 50.0815 84.9963 60.1497 77.573 67.573C70.1497 74.9963 60.0815 79.1667 49.5833 79.1667C39.0852 79.1667 29.017 74.9963 21.5937 67.573C14.1704 60.1497 10 50.0815 10 39.5833C10 29.0852 14.1704 19.017 21.5937 11.5937C29.017 4.17037 39.0852 0 49.5833 0ZM49.5833 4.16667C40.1902 4.16667 31.1819 7.89806 24.54 14.54C17.8981 21.1819 14.1667 30.1903 14.1667 39.5833C14.1667 48.9764 17.8981 57.9848 24.54 64.6267C31.1819 71.2686 40.1902 75 49.5833 75C58.9764 75 67.9848 71.2686 74.6267 64.6267C81.2686 57.9848 85 48.9764 85 39.5833C85 30.1903 81.2686 21.1819 74.6267 14.54C67.9848 7.89806 58.9764 4.16667 49.5833 4.16667ZM47.5 20.8333V29.1667H51.6667V20.8333H47.5ZM47.5 37.5V58.3333H51.6667V37.5H47.5Z" fill="#C4C4C4" />
            </svg>
            <a href="../proc/etapes/etape5.php"><span>Finnacier GIAC</span></a>
          </div>
        </div>
        <div class="card ">
          <div class="uper-card">
            <input type="checkbox" class="check" onclick="toggle(this,'input[type=checkbox]',flag)" />
          </div>
          <div class="body-card">
            <svg width="100" height="100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg" class="check">
              <path d="M49.5833 0C60.0815 0 70.1497 4.17037 77.573 11.5937C84.9963 19.017 89.1667 29.0852 89.1667 39.5833C89.1667 50.0815 84.9963 60.1497 77.573 67.573C70.1497 74.9963 60.0815 79.1667 49.5833 79.1667C39.0852 79.1667 29.017 74.9963 21.5937 67.573C14.1704 60.1497 10 50.0815 10 39.5833C10 29.0852 14.1704 19.017 21.5937 11.5937C29.017 4.17037 39.0852 0 49.5833 0ZM49.5833 4.16667C40.1902 4.16667 31.1819 7.89806 24.54 14.54C17.8981 21.1819 14.1667 30.1903 14.1667 39.5833C14.1667 48.9764 17.8981 57.9848 24.54 64.6267C31.1819 71.2686 40.1902 75 49.5833 75C58.9764 75 67.9848 71.2686 74.6267 64.6267C81.2686 57.9848 85 48.9764 85 39.5833C85 30.1903 81.2686 21.1819 74.6267 14.54C67.9848 7.89806 58.9764 4.16667 49.5833 4.16667ZM47.5 20.8333V29.1667H51.6667V20.8333H47.5ZM47.5 37.5V58.3333H51.6667V37.5H47.5Z" fill="#C4C4C4" />
            </svg>
            <a href="../proc/etapes/etape6.php"><span>Technique OFPPT</span></a>
          </div>
        </div>
        <div class="card ">
          <div class="uper-card">
            <input type="checkbox" />
          </div>
          <div class="body-card">
            <svg width="100" height="100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg" class="check">
              <path d="M49.5833 0C60.0815 0 70.1497 4.17037 77.573 11.5937C84.9963 19.017 89.1667 29.0852 89.1667 39.5833C89.1667 50.0815 84.9963 60.1497 77.573 67.573C70.1497 74.9963 60.0815 79.1667 49.5833 79.1667C39.0852 79.1667 29.017 74.9963 21.5937 67.573C14.1704 60.1497 10 50.0815 10 39.5833C10 29.0852 14.1704 19.017 21.5937 11.5937C29.017 4.17037 39.0852 0 49.5833 0ZM49.5833 4.16667C40.1902 4.16667 31.1819 7.89806 24.54 14.54C17.8981 21.1819 14.1667 30.1903 14.1667 39.5833C14.1667 48.9764 17.8981 57.9848 24.54 64.6267C31.1819 71.2686 40.1902 75 49.5833 75C58.9764 75 67.9848 71.2686 74.6267 64.6267C81.2686 57.9848 85 48.9764 85 39.5833C85 30.1903 81.2686 21.1819 74.6267 14.54C67.9848 7.89806 58.9764 4.16667 49.5833 4.16667ZM47.5 20.8333V29.1667H51.6667V20.8333H47.5ZM47.5 37.5V58.3333H51.6667V37.5H47.5Z" fill="#C4C4C4" />
            </svg>
            <a href="../proc/etapes/etape7.php"><span>Finacier OFPPT</span></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>

  <!-- Script -->
  <!-- Lib js -->
  <!-- Jquery js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="../../vendor/js/script.js">



  </script>
  <?php
  $Id_Client = $_SESSION['Id_Client'];
  if ($_SESSION["Inscr"] == true) {
    echo "<script>desacOverFlow();</script>";
  }


  if (isset($_POST['Inscript'])) {
    $Name =  htmlspecialchars(strip_tags($_POST['Name']));
    $Prenom =  htmlspecialchars(strip_tags($_POST['Prenom']));
    $CIN =  htmlspecialchars(strip_tags($_POST['CIN']));

    $stmt = $conn->prepare("INSERT INTO inscription (Nom, Prenom, CIN, Id_client) VALUES (?,?,?,?);");
    $stmt->bindParam(1, $Name, PDO::PARAM_STR, 100);
    $stmt->bindParam(2, $Prenom, PDO::PARAM_STR, 100);
    $stmt->bindParam(3, $CIN, PDO::PARAM_STR, 10);
    $stmt->bindParam(4, $Id_Client, PDO::PARAM_INT);
    $stmt->execute();
    echo "<script>desacOverFlow();</script>";
    if ($_SESSION["Inscr"] == null) {
      $_SESSION["Inscr"] = true;
    }
  }

  $stmt = $conn->prepare("select Flag from Client where Id_Client=?; ");
  $stmt->bindParam(1, $Id_Client, PDO::PARAM_INT);
  $stmt->execute();
  $datas = $stmt->fetchAll(PDO::FETCH_OBJ);
  $flag;
  foreach ($datas as $data) {
    $flag = $data->Flag;
    break;
  }
  ?>
  <script>
    var flag = <?php echo '' . $flag; ?>;
    //var elem = document.querySelectorAll(".card");
    window.onload = ch(flag);

    function ch(flag) {
      if (flag > 3) {
        flag = flag - 1;
        var elem = document.querySelectorAll(".card");
        for (var i = 0; i < flag; i++) {
          elem[i].classList.remove("check");
          elem[i].children[0].children[0].checked = false;
          elem[i].children[0].children[0].setAttribute("disabled", "true");
          elem[i].classList.add("disabled");
        }
        elem[flag].classList.add("check");
        elem[flag].children[0].children[0].checked = true;

        abc(flag, true);
      } {
        var elem = document.querySelectorAll(".card");
        for (var i = 0; i < flag; i++) {
          elem[i].classList.remove("check");
          elem[i].children[0].children[0].checked = false;
          elem[i].children[0].children[0].setAttribute("disabled", "true");
          elem[i].classList.add("disabled");
        }
        elem[flag].classList.add("check");
        elem[flag].children[0].children[0].checked = true;

        abc(flag, true);
      }
    }
    displayDis(flag);

    function displayDis(flg) {

      if (flg === 3) {
        document.getElementById('alrt').style.display = "flex";
      } else {
        document.getElementById('alrt').style.display = "none";
      }
    }
  </script>

</body>

</html>
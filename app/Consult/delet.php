<?php
require("../../APPConfig/ConnectionData.php");
session_start();

        if(isset($_GET['id'])){
            $stmt = $conn->prepare("CALL `prjfinformation`.`ProSupp`(?);");
            $stmt->bindParam(1, $_GET["id"], PDO::PARAM_INT);
            $stmt->execute();
        }
         header('Location: DeleteEntre.php');
?>
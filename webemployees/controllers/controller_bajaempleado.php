<?php
    session_start();
    require_once "../db/db.php";
    require_once "../models/model_bajaempleado.php";

    function todo(){
        if(isset($_POST["enviar"])){
            if($_POST["user"] !=""){
                despedir($_POST['user'],date("Y-m-d H:i:s"));
            }
        }
    }
    todo();
    require_once "../views/bajaempleado.php";
?>
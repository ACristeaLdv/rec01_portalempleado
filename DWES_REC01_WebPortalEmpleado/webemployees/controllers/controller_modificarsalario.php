<?php
    session_start();
    require_once "../db/db.php";
    require_once "../models/model_modificarsalario.php";

    function todo(){
        if(isset($_POST["enviar"])){
            if($_POST["user"] !="" && $_POST["numero"] !=""){
                $respuesta = getEmpDep($_POST["user"]);
                if($respuesta->rowCount()==1){
                    cambiarSalario($_POST['user'],$_POST['numero']);
                }
            }
        }
    }
todo();
require_once "../views/modificarsalario.php";
?>
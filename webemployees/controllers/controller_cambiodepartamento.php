<?php
    session_start();
    require_once "../db/db.php";
    require_once "../models/model_cambiodepartamento.php";

    function todo(){
        if(isset($_POST["enviar"])){
            if($_POST["user"] !="" && $_POST["numero"] !=""){
                $respuesta = getEmpDep($_POST["user"]);
                if($respuesta->rowCount()==1){
                    cambiarDepartamento($_POST['user'],$_POST['numero'],date("Y-m-d H:i:s"));
                }else{
                    asignarDepartamento($_POST['user'],$_POST['numero'],date("Y-m-d H:i:s"));
                }
            }
        }
    }
todo();
require_once "../views/cambiodepartamento.php";
?>
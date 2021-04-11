<?php
    session_start();
    require_once "../db/db.php";
    require_once "../models/model_jefedepartamento.php";

    function todo(){
        if(isset($_POST["enviar"])){
            if($_POST["departamento"] !="" && $_POST["jefe"] !=""){
                $respuesta = getEmpDep($_POST["departamento"]);
                if($respuesta->rowCount()==1){
                    cambiarJefe($_POST['departamento'],$_POST['jefe'],date("Y-m-d H:i:s"));
                    echo "Se ha modificado el Jefe de departamento con éxito";
                }else{
                    asignarJefe($_POST['departamento'],$_POST['jefe'],date("Y-m-d H:i:s"));
                    echo "Se ha asignado el Jefe de departamento con éxito";
                }
            }
        }
    }
todo();
require_once "../views/jefedepartamento.php";
?>
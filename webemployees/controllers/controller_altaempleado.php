<?php
    session_start();
    require_once "../db/db.php";
    require_once "../models/model_altaempleado.php";

    function todo(){
        if(isset($_POST["enviar"])){
            if($_POST["fecha"] !="" && $_POST["nombre"] !="" && $_POST["apellido"] !="" && $_POST["cargo"] !="" && $_POST["salario"] !=""){
                $genero;
                if($_POST['genero'] == 'Masculino'){
                    $genero = "M";
                }else{
                    $genero = "F";
                }
                $respuesta = getEmpno();
                $fila = $respuesta->fetch(PDO::FETCH_ASSOC);
                altaEmpleado($fila['numero']+1,$_POST["fecha"],$_POST["nombre"],$_POST["apellido"],$_POST["genero"],date("Y-m-d"),$_POST["salario"],$_POST["cargo"]);
            }
        }
    }

    todo();
    require_once "../views/altaempleado.php";
?>
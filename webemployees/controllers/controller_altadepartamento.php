<?php
    session_start();
    require_once "../db/db.php";
    require_once "../models/model_altadepartamento.php";

    function todo(){
        if(isset($_POST["enviar"])){
            if($_POST["nombre"] !=""){
                $respuesta = getDepNumero();
                $fila = $respuesta->fetch(PDO::FETCH_ASSOC);
                $num = intval(substr($fila['numero'], 1))+1;
                $numfinal = "d".str_pad(strval($num),3,"0",STR_PAD_LEFT);
                altaDepartamento($numfinal,$_POST["nombre"]);
            }
        }

    }

    todo();
    require_once "../views/altadepartamento.php";
?>
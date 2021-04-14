<?php
    session_start();
    require_once "../db/db.php";
    require_once "../models/model_altadepartamento.php";

    function todo(){
        if (isset($_SESSION["mensaje"])) {
            unset($_SESSION["mensaje"]);
        }
        if(isset($_POST["enviar"])){
            if($_POST["nombre"] !=""){
                $respuesta = getDepNumero();
                $fila = $respuesta->fetch(PDO::FETCH_ASSOC);
                $num = intval(substr($fila['numero'], 1))+1;
                $numfinal = "d".str_pad(strval($num),3,"0",STR_PAD_LEFT);
                altaDepartamento($numfinal,$_POST["nombre"]);
                $_SESSION["mensaje"] = "Se ha dado de alta el departamento con exito";
            }else{
                echo "<script>alert('Faltan campos por rellenar');</script>";
            }
        }elseif (isset($_POST["volver"])) {
            header ("location:../views/menuRRHH.php");
        }

    }

    todo();
    require_once "../views/altadepartamento.php";
?>
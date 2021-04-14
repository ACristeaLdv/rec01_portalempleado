<?php
    session_start();
    require_once "../db/db.php";
    require_once "../models/model_bajaempleado.php";

    function todo(){
        if (isset($_SESSION["mensaje"])) {
            unset($_SESSION["mensaje"]);
        }
        if(isset($_POST["enviar"])){
                despedir($_SESSION["nombresnumeros"][$_POST["user"]],date("Y-m-d H:i:s"));
                $_SESSION["mensaje"] = "Se ha despedido al empleado con exito";
        }elseif (isset($_POST["volver"])) {
            header ("location:../views/menuRRHH.php");
        }

        $respuesta = datosEmpleado();
        $_SESSION["opciones"]="";
        $_SESSION["nombresnumeros"]= Array();
        while ($fila = $respuesta->fetch(PDO::FETCH_ASSOC)) {
            $_SESSION["opciones"].="<option>".$fila["first_name"]." ".$fila["last_name"]."</option>";
            $_SESSION["nombresnumeros"][$fila["first_name"]." ".$fila["last_name"]] = $fila["emp_no"];
        }
    }
    todo();
    require_once "../views/bajaempleado.php";
?>
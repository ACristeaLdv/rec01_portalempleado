<?php
    session_start();
    require_once "../db/db.php";
    require_once "../models/model_modificarsalario.php";

    function todo(){
        if (isset($_SESSION["mensaje"])) {
            unset($_SESSION["mensaje"]);
        }
        if(isset($_POST["enviar"])){
            if($_POST["user"] !="" && $_POST["numero"] !=""){
                $respuesta = getEmpDep($_POST["user"]);
                if($respuesta->rowCount()==1){
                    cambiarSalario($_POST['user'],$_POST['numero'],date("Y-m-d H:i:s"));
                    $_SESSION["mensaje"] = "Se ha cambiado el salario con exito";
                }
            }
        }elseif (isset($_POST["volver"])) {
            header ("location:../views/menuRRHH.php");
        }
        $respuesta = datosEmpleado();
        $_SESSION["opciones"]="";
        $_SESSION["nombresnumeros"]= Array();
        while ($fila = $respuesta->fetch(PDO::FETCH_ASSOC)) {
            $_SESSION["opciones"].="<option value=".$fila["emp_no"].">".$fila["first_name"]." ".$fila["last_name"]."</option>";  // Se usa el value para coger el valor que quieres del select independientemente de lo que se muestre.
            //$_SESSION["nombresnumeros"][$fila["first_name"]." ".$fila["last_name"]] = $fila["emp_no"];
        }
    }
todo();
require_once "../views/modificarsalario.php";
?>
<?php
    session_start();
    require_once "../db/db.php";
    require_once "../models/model_cambiodepartamento.php";

    function todo(){
        if (isset($_SESSION["mensaje"])) {
            unset($_SESSION["mensaje"]);
        }
        if(isset($_POST["enviar"])){
            if($_POST["user"] !="" && $_POST["departamento"] !=""){
                $respuesta = getEmpDep($_POST["user"]);
                if($respuesta->rowCount()==1){
                    cambiarDepartamento($_POST['user'],$_POST['departamento'],date("Y-m-d H:i:s"));
                    $_SESSION["mensaje"] = "Se ha cambiado el departamento con exito";
                }else{
                    asignarDepartamento($_POST['user'],$_POST['departamento'],date("Y-m-d H:i:s"));
                    $_SESSION["mensaje"] = "Se ha asignado un departamento con exito";
                }
            }else{
                echo "<script>alert('Faltan campos por rellenar');</script>";
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

        $respuesta2 = datosDepartamento();
        $_SESSION["opciones2"]="";
        $_SESSION["departamentosnumeros"]= Array();
        while ($filas = $respuesta2->fetch(PDO::FETCH_ASSOC)) {
            $_SESSION["opciones2"].="<option value= ".$filas["dept_no"].">".$filas["dept_name"]."</option>";
            //$_SESSION["departamentosnumeros"][$filas["dept_name"]];
        }
    }
todo();
require_once "../views/cambiodepartamento.php";
?>
<?php
    session_start();
    require_once "../db/db.php";
    require_once "../models/model_jefedepartamento.php";

    function todo(){
        if (isset($_SESSION["mensaje"])) {
            unset($_SESSION["mensaje"]);
        }
        if(isset($_POST["enviar"])){
            if($_POST["departamento"] !="" && $_POST["jefe"] !=""){
                $respuesta = getEmpDep($_POST["departamento"]);
                if($respuesta->rowCount()==1){
                    cambiarJefe($_POST['departamento'],$_POST['jefe'],date("Y-m-d H:i:s"));
                    $_SESSION["mensaje"] = "Se ha modificado el Jefe del departamento con exito";
                }else{
                    asignarJefe($_POST['departamento'],$_POST['jefe'],date("Y-m-d H:i:s"));
                    $_SESSION["mensaje"] = "Se ha asignado un Jefe de departamento con exito";
                }
            }
        }elseif (isset($_POST["volver"])) {
            header ("location:../views/menuRRHH.php");
        }
        $respuesta2 = datosDepartamento();
        $_SESSION["opciones2"]="";
        $_SESSION["departamentosnumeros"]= Array();
        while ($filas = $respuesta2->fetch(PDO::FETCH_ASSOC)) {
            $_SESSION["opciones2"].="<option value= ".$filas["dept_no"].">".$filas["dept_name"]."</option>";
        }

        $respuesta = datosEmpleado();
        $_SESSION["opciones"]="";
        $_SESSION["nombresnumeros"]= Array();
        while ($fila = $respuesta->fetch(PDO::FETCH_ASSOC)) {
            $_SESSION["opciones"].="<option value=".$fila["emp_no"].">".$fila["first_name"]." ".$fila["last_name"]."</option>";
        }
    }
todo();
require_once "../views/jefedepartamento.php";
?>
<?php
    session_start();
    require_once "../db/db.php";
    require_once "../models/model_altaempleado.php";

    function todo(){
        if (isset($_SESSION["mensaje"])) {
            unset($_SESSION["mensaje"]);
        }
        if(isset($_POST["enviar"])){
            if($_POST["fecha"] !="" && $_POST["nombre"] !="" && $_POST["apellido"] !="" && $_POST["cargo"] !="" && $_POST["salario"] !=""){
                $genero;
                if($_POST['genero'] == 'Masculino'){
                    $genero = "M";
                }else{
                    $genero = "F";
                }
                $fechaDate = strtotime($_POST['fecha']);
                $fechaFormatoBien = date("Y-m-d",$fechaDate);
                $respuesta = getEmpno();
                $fila = $respuesta->fetch(PDO::FETCH_ASSOC);
                altaEmpleado($fila['numero']+1,$fechaFormatoBien,$_POST["nombre"],$_POST["apellido"],$genero,date("Y-m-d"),$_POST["salario"],$_POST["cargo"]);
                $_SESSION["mensaje"] = "Se ha dado de alta el empleado con exito";
            }else{
                echo "<script>alert('Faltan campos por rellenar');</script>";
            }
        }elseif (isset($_POST["volver"])) {
            if ($_SESSION["esRRHH"]) {
                header ("location:../views/menuRRHH.php");
            }else{
                header ("location:../views/menu.php");
            }
        }
    }

    todo();
    require_once "../views/altaempleado.php";
?>
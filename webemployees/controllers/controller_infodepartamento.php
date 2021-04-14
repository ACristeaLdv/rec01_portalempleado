<?php
    session_start();
    require_once "../db/db.php";
    require_once "../models/model_infodepartamento.php";

    function todo(){
        if (isset($_SESSION["mensaje"])) {
            unset($_SESSION["mensaje"]);
        }
        if(isset($_POST["enviar"])){
            $datos = getJefes($_POST['departamento']);
            $empleados = getEmpleados($_POST['departamento']);
            if($datos->rowCount() > 0){
                $_SESSION['tablajefes']= mostrarTabla($datos);
            }else{
                unset($_SESSION["tablajefes"]);
            }
            if($empleados->rowCount() > 0){
                $_SESSION['tablaempleados']= mostrarTabla($empleados);
            }else{
                unset($_SESSION["tablaempleados"]);
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
            
    }
    function mostrarTabla($datos){
        $i=0;
        $tabla = "<table border = '3'>";
        while ($fila = $datos->fetch(PDO::FETCH_ASSOC)) {
            if ($i==0) {
                $tabla .= "<tr border = '1'>";
                foreach ($fila as $key => $value) {
                    $tabla .= "<td>".$key."</td>";
                }
                $tabla .= "</tr>";
            }
            $tabla .= "<tr>";
            foreach ($fila as $key => $value) {
                $tabla .= "<td>".$value."</td>";
            }
            $tabla .= "</tr>";
            $i++;
        }
        $tabla .= "</table>";
        return $tabla;
    }
                
todo();
require_once "../views/infodepartamento.php";
?>
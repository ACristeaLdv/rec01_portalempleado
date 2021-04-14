<?php
    session_start();
    require_once "../db/db.php";
    require_once "../models/model_vidalaboral.php";

    function todo(){
        if (isset($_SESSION["mensaje"])) {
            unset($_SESSION["mensaje"]);
        }
        if(isset($_POST["enviar"])){
            $datos = getDatosPersonales($_POST['user']);
            if($datos->rowCount()>0){
                $departamentos = getDepartamentos($_POST['user']);
                $salarios = getSalarios($_POST['user']);
                $titulos = getTitulos($_POST['user']);
                $_SESSION['tablapersonales']=mostrarTabla($datos);
                $_SESSION['tabladepts']=mostrarTabla($departamentos);
                $_SESSION['tablasalaries']=mostrarTabla($salarios);
                $_SESSION['tablatitles']=mostrarTabla($titulos);
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
require_once "../views/vidalaboral.php";
?>
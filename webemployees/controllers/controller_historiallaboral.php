<?php
    session_start();
    require_once "../db/db.php";
    require_once "../models/model_historiallaboral.php";

    function todo(){
        if (isset($_SESSION["mensaje"])) {
            unset($_SESSION["mensaje"]);
        }
            $departamentos = getTrabajados($_SESSION["usuario"]);
            $salarios = getHistSalarial($_SESSION["usuario"]);
            $_SESSION['tabladeps']=mostrarTabla($departamentos);
            $_SESSION['tablasalarios']=mostrarTabla($salarios);
        if (isset($_POST["volver"])) {
            if ($_SESSION["esRRHH"]) {
                header ("location:../views/menuRRHH.php");
            }else{
                header ("location:../views/menu.php");
            }
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
require_once "../views/historiallaboral.php";
?>
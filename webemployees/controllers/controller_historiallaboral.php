<?php
    session_start();
    require_once "../db/db.php";
    require_once "../models/model_historiallaboral.php";

    function todo(){
        if(isset($_POST["enviar"])){
            $departamentos = getTrabajados($_POST['user']);
            $salarios = getHistSalarial($_POST['user']);
            mostrarTabla($departamentos);
            mostrarTabla($salarios);
        }
            
    }

    function mostrarTabla($datos){
        $i=0;
        echo "<table border = '3'>";
        while ($fila = $datos->fetch(PDO::FETCH_ASSOC)) {
            if ($i==0) {
                echo "<tr border = '1'>";
                foreach ($fila as $key => $value) {
                    echo "<td>".$key."</td>";
                }
                echo "</tr>";
            }
            echo "<tr>";
            foreach ($fila as $key => $value) {
                echo "<td>".$value."</td>";
            }
            echo "</tr>";
            $i++;
        }
        echo "</table>";
    }
                
todo();
require_once "../views/historiallaboral.php";
?>
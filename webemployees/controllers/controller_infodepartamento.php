<?php
    session_start();
    require_once "../db/db.php";
    require_once "../models/model_infodepartamento.php";

    function todo(){
        if(isset($_POST["enviar"])){
            $datos = getJefes($_POST['departamento']);
            $empleados = getEmpleados($_POST['departamento']);
            if($datos->rowCount() > 0){
                echo "Jefe:<br>";
                mostrarTabla($datos);
            }
            if($empleados->rowCount() > 0){
                echo "empleados:<br>";
                mostrarTabla($empleados);
            }
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
require_once "../views/infodepartamento.php";
?>
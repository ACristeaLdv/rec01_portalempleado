<?php
    function getDepNumero(){
        try{
            global $conexion;
            $consulta = $conexion->prepare("SELECT dept_no AS 'numero' FROM departments ORDER BY dept_no DESC");
            $consulta->execute();
            return $consulta;
            
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    function altaDepartamento($numero,$nombre){
        global $conexion;
        try{
            $insert = $conexion->prepare("INSERT INTO departments(dept_no,dept_name) VALUES ('$numero','$nombre')");
            $insert->execute();

        }catch(PDOException $e){
            echo $e->getMessage();
        }

    }

?>
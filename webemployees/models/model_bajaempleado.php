<?php
    function despedir($user,$fechains){
        try{
            global $conexion;
            $consulta = $conexion->prepare("UPDATE dept_emp SET to_date='$fechains' WHERE to_date = '9999-01-01 00:00:00' AND emp_no= $user");
            $consulta->execute();
            return $consulta;
            
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
?>
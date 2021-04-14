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
    function datosEmpleado(){
        try{
            global $conexion;
            $consulta = $conexion->prepare("SELECT employees.emp_no,first_name,last_name FROM employees JOIN dept_emp ON employees.emp_no=dept_emp.emp_no WHERE to_date = '9999-01-01 00:00:00'");
            $consulta->execute();
            return $consulta;
            
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
?>
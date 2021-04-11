<?php
    function getEmpleados($departamento){
        try{
            global $conexion;
            $consulta = $conexion->prepare("SELECT first_name,last_name,gender,birth_date,hire_date FROM employees JOIN dept_emp ON employees.emp_no = dept_emp.emp_no WHERE dept_no = '$departamento' AND to_date = '9999-01-01 00:00:00'");
            $consulta->execute();
            return $consulta;
            
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    function getJefes($departamento){
        try{
            global $conexion;
            $consulta = $conexion->prepare("SELECT first_name,last_name,gender,birth_date,hire_date FROM employees JOIN dept_manager ON employees.emp_no = dept_manager.emp_no WHERE dept_no = '$departamento' AND to_date = '9999-01-01 00:00:00'");
            $consulta->execute();
            return $consulta;
            
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
?>
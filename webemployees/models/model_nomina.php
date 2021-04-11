<?php
    function getDatosPersonales($user){
        try{
            global $conexion;
            $consulta = $conexion->prepare("SELECT * FROM employees WHERE emp_no = $user");
            $consulta->execute();
            return $consulta;
            
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    function getDepartamentos($user){
        try{
            global $conexion;
            $consulta = $conexion->prepare("SELECT dept_name FROM departments JOIN dept_emp ON departments.dept_no = dept_emp.dept_no WHERE emp_no = $user AND to_date = '9999-01-01 00:00:00'");
            $consulta->execute();
            return $consulta;
            
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    function getTitulos($user){
        try{
            global $conexion;
            $consulta = $conexion->prepare("SELECT title FROM titles WHERE emp_no = $user AND to_date = '9999-01-01 00:00:00'");
            $consulta->execute();
            return $consulta;
            
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    function getSalario($user){
        try{
            global $conexion;
            $consulta = $conexion->prepare("SELECT salary FROM salaries WHERE emp_no = $user AND to_date = '9999-01-01 00:00:00'");
            $consulta->execute();
            return $consulta;
            
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    function getEngineer($user){
        try{
            global $conexion;
            $consulta = $conexion->prepare("SELECT * FROM titles WHERE emp_no = $user AND to_date = '9999-01-01 00:00:00' AND title LIKE '%Engineer%'");
            $consulta->execute();
            return $consulta;
            
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
?>
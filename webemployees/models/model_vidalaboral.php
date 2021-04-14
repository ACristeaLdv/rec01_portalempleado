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
            $consulta = $conexion->prepare("SELECT dept_name AS 'nombreDepartamento',from_date AS 'desde',to_date AS 'hasta' FROM departments JOIN dept_emp ON departments.dept_no = dept_emp.dept_no WHERE emp_no = $user ORDER BY from_date ASC");
            $consulta->execute();
            return $consulta;
            
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    function getSalarios($user){
        try{
            global $conexion;
            $consulta = $conexion->prepare("SELECT * FROM salaries WHERE emp_no = $user ORDER BY from_date");
            $consulta->execute();
            return $consulta;
            
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    function getTitulos($user){
        try{
            global $conexion;
            $consulta = $conexion->prepare("SELECT * FROM titles WHERE emp_no = $user ORDER BY from_date");
            $consulta->execute();
            return $consulta;
            
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    function datosEmpleado(){
        try{
            global $conexion;
            $consulta = $conexion->prepare("SELECT employees.emp_no,first_name,last_name FROM employees");
            $consulta->execute();
            return $consulta;
            
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
?>
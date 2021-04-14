<?php
    function getEmpDep($user){
        try{
            global $conexion;
            $consulta = $conexion->prepare("SELECT * FROM dept_emp WHERE emp_no = $user AND to_date = '9999-01-01 00:00:00'");
            $consulta->execute();
            return $consulta;
            
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    function asignarDepartamento($user,$departamento,$fechains){
        try{
            global $conexion;
            $insert = $conexion->prepare("INSERT INTO dept_emp(emp_no,dept_no,from_date,to_date) VALUES ($user,'$departamento','$fechains','9999-01-01 00:00:00')");
            $insert->execute();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    function cambiarDepartamento($user,$departamento,$fechains){
        try{
            global $conexion;
            $update = $conexion->prepare("UPDATE dept_emp SET to_date='$fechains' WHERE to_date = '9999-01-01 00:00:00' AND emp_no =$user");
            $update->execute();
            $insert = $conexion->prepare("INSERT INTO dept_emp(emp_no,dept_no,from_date,to_date) VALUES ($user,'$departamento','$fechains','9999-01-01 00:00:00')");
            $insert->execute();
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
    function datosDepartamento(){
        try{
            global $conexion;
            $consulta = $conexion->prepare("SELECT * FROM departments");
            $consulta->execute();
            return $consulta;
            
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
?>
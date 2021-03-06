<?php
    function getEmpDep($departamento){
        try{
            global $conexion;
            $consulta = $conexion->prepare("SELECT emp_no FROM dept_manager WHERE dept_no = '$departamento' AND to_date= '9999-01-01 00:00:00'");
            $consulta->execute();
            return $consulta;
            
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    function asignarJefe($departamento,$jefe,$fechains){
        try{
            global $conexion;
            $insert = $conexion->prepare("INSERT INTO dept_manager(dept_no,emp_no,from_date,to_date) VALUES ('$departamento',$jefe,'$fechains','9999-01-01 00:00:00')");
            $insert->execute();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    function cambiarJefe($departamento,$jefe,$fechains){
        try{
            global $conexion;
            $update = $conexion->prepare("UPDATE dept_manager SET to_date='$fechains' WHERE to_date = '9999-01-01 00:00:00' AND dept_no = '$departamento'");
            $update->execute();
            $insert = $conexion->prepare("INSERT INTO dept_manager(dept_no,emp_no,from_date,to_date) VALUES ('$departamento',$jefe,'$fechains','9999-01-01 00:00:00')");
            $insert->execute();
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

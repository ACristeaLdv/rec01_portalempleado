<?php
    function validar($user,$password){
        global $conexion;
        try{
            $consulta = $conexion->prepare("SELECT * FROM employees WHERE emp_no = :username AND last_name = :password");
            $consulta->bindParam(":username", $user);
            $consulta->bindParam(":password", $password);
            $consulta->execute();
            return $consulta;
            
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
//d003
    function departamento($user){
        global $conexion;
        try{
            $departamentos = $conexion->prepare("SELECT * FROM dept_emp WHERE emp_no = :username AND dept_no='d003' AND to_date = '9999-01-01 00:00:00'");
            $departamentos->bindParam(":username", $user);
            $departamentos->execute();
            return $departamentos;

        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
?>
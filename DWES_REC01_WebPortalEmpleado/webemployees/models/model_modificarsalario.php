<?php
    function getEmpDep($user){
        try{
            global $conexion;
            $consulta = $conexion->prepare("SELECT * FROM employees WHERE emp_no = $user ");
            $consulta->execute();
            return $consulta;
            
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    function cambiarSalario($user,$salario){
        try{
            global $conexion;
            $update = $conexion->prepare("UPDATE salaries SET emp_no='$user' AND salary='$salario");
            $update->execute();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
?>
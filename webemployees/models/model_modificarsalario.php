<?php
    function getEmpDep($user){
        try{
            global $conexion;
            $consulta = $conexion->prepare("SELECT * FROM employees WHERE emp_no = $user");
            $consulta->execute();
            return $consulta;
            
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    function cambiarSalario($user,$salario,$fechains){
        try{
            global $conexion;
            $update = $conexion->prepare("UPDATE salaries SET to_date ='$fechains' WHERE emp_no = $user AND to_date='9999-01-01 00:00:00'");
            $update->execute();
            $insert = $conexion->prepare("INSERT INTO salaries(emp_no,salary,from_date,to_date) VALUES ($user,$salario,'$fechains','9999-01-01 00:00:00')");
            $insert->execute();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
?>

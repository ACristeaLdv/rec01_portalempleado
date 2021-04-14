<?php

    function getEmpno(){
        try{
            global $conexion;
            $consulta = $conexion->prepare("SELECT max(emp_no) AS 'numero' FROM employees");
            $consulta->execute();
            return $consulta;
            
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    function altaEmpleado($user,$fechanac,$nombre,$apellido,$genero,$fechains,$salario,$cargo){
        try{
        global $conexion;
        $insert = $conexion->prepare("INSERT INTO employees(emp_no,birth_date,first_name,last_name,gender,hire_date) VALUES ($user,'$fechanac','$nombre','$apellido','$genero','$fechains')");
        $insert->execute();

        $insert = $conexion->prepare("INSERT INTO salaries(emp_no,salary,from_date,to_date) VALUES ($user,$salario,'$fechains','9999-01-01 00:00:00')");
        $insert->execute();

        $insert = $conexion->prepare("INSERT INTO titles(emp_no,title,from_date,to_date) VALUES ($user,'$cargo','$fechains','9999-01-01 00:00:00')");
        $insert->execute();


        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

?>
<?php
    function getTrabajados($user){
        try{
            global $conexion;
            $consulta = $conexion->prepare("SELECT dept_name,from_date,to_date FROM departments JOIN dept_emp ON departments.dept_no = dept_emp.dept_no WHERE emp_no = $user");
            $consulta->execute();
            return $consulta;
            
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    function getHistSalarial($user){
        try{
            global $conexion;
            $consulta = $conexion->prepare("SELECT salary,from_date,to_date FROM salaries JOIN employees ON employees.emp_no = salaries.emp_no WHERE employees.emp_no = $user");
            $consulta->execute();
            return $consulta;
            
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
?>
<?php
    session_start();
    require_once "../db/db.php";
    require_once "../models/model_nomina.php";

    function todo(){
        if (isset($_SESSION["mensaje"])) {
            unset($_SESSION["mensaje"]);
        }
        
        $respuesta2 = getDatosPersonales($_SESSION["usuario"]);
        $respuesta = getSalario($_SESSION["usuario"]);
        $respuesta3 = getDepartamentos($_SESSION["usuario"]);
        $respuesta4 = getTitulos($_SESSION["usuario"]);
        if($respuesta->rowCount()==1){
            $arraytabla = Array();
            $brutointacto = floatval($respuesta->fetch(PDO::FETCH_ASSOC)['salary']);
            array_push($arraytabla,Array('Concepto'=>'Salario Bruto','Valor'=>$brutointacto));//Salario bruto
            $bruto = $brutointacto*0.925;//DESCUENTO SS
            array_push($arraytabla,Array('Concepto'=>'Seguridad Social','Valor'=>round($brutointacto*0.075,2)));//Seguridad Social
            if($brutointacto < 40000.00){
                array_push($arraytabla,Array('Concepto'=>'IRPF','Valor'=>round($bruto*0.1,2)));//IRPF
                $bruto = $bruto * 0.9;
            }else if($brutointacto >=40000 && $brutointacto<=70000){
                array_push($arraytabla,Array('Concepto'=>'IRPF','Valor'=>round($bruto*0.2,2)));//IRPF
                $bruto = $bruto * 0.8;
            }else{ // (>70.000)
                array_push($arraytabla,Array('Concepto'=>'IRPF','Valor'=>round($bruto*0.3,2)));//IRPF
                $bruto = $bruto * 0.7;
            }
            $resultado = getEngineer($_SESSION["usuario"]);
            if($resultado->rowCount()==1){
                $bruto = $bruto + 10000;
                array_push($arraytabla,Array('Concepto'=>'Complemento Engineer','Valor'=>10000));//Complemento Engineer
            }
            array_push($arraytabla,Array('Concepto'=>'Salario Neto','Valor'=>round($bruto,2)));
            $_SESSION['tablasalario']= mostrarTabla($arraytabla);
            $_SESSION['tabladatos'] = mostrarTabla2($respuesta2);
            $_SESSION['tabladepartamentos'] = mostrarTabla2($respuesta3);
            $_SESSION['tablatitulos'] = mostrarTabla2($respuesta4);
        }
            
        if (isset($_POST["volver"])) {
            if ($_SESSION["esRRHH"]) {
                header ("location:../views/menuRRHH.php");
            }else{
                header ("location:../views/menu.php");
            }
        }
    }
    function mostrarTabla($filas){
        $tabla = "<table border = '3'>";
        for($i = 0; $i < count($filas); $i++) {
            if ($i==0) {
                $tabla .= "<tr border = '1'>";
                foreach ($filas[$i] as $key => $value) {
                    $tabla .= "<td>".$key."</td>";
                }
                $tabla .= "</tr>";
            }
            $tabla .= "<tr>";
            foreach ($filas[$i] as $key => $value) {
                $tabla .= "<td>".$value."</td>";
            }
            $tabla .= "</tr>";
        }
        $tabla .= "</table>";
        return $tabla;
    }

    function mostrarTabla2($datos){
        $i=0;
        $tabla = "<table border = '3'>";
        while ($fila = $datos->fetch(PDO::FETCH_ASSOC)) {
            if ($i==0) {
                $tabla .= "<tr border = '1'>";
                foreach ($fila as $key => $value) {
                    $tabla .= "<td>".$key."</td>";
                }
                $tabla .= "</tr>";
            }
            $tabla .= "<tr>";
            foreach ($fila as $key => $value) {
                $tabla .= "<td>".$value."</td>";
            }
            $tabla .= "</tr>";
            $i++;
        }
        $tabla .= "</table>";
        return $tabla;
    }
todo();
require_once "../views/nomina.php";
?>
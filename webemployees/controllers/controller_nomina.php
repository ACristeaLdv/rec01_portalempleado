<?php
    session_start();
    require_once "../db/db.php";
    require_once "../models/model_nomina.php";

    function todo(){
        if(isset($_POST["enviar"])){
            if($_POST["user"] !=""){
                $respuesta2 = getDatosPersonales($_POST['user']);
                $respuesta = getSalario($_POST['user']);
                $respuesta3 = getDepartamentos($_POST['user']);
                $respuesta4 = getTitulos($_POST['user']);
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
                    $resultado = getEngineer($_POST['user']);
                    if($resultado->rowCount()==1){
                        $bruto = $bruto + 10000;
                        array_push($arraytabla,Array('Concepto'=>'Complemento Engineer','Valor'=>10000));//Complemento Engineer
                    }
                    array_push($arraytabla,Array('Concepto'=>'Salario Neto','Valor'=>round($bruto,2)));
                    mostrarTabla($arraytabla);
                    //Mostrar datos
                    mostrarTabla2($respuesta2);
                    mostrarTabla2($respuesta3);
                    mostrarTabla2($respuesta4);
                }
            }
        }
    }
    function mostrarTabla($filas){
        echo "<table border = '3'>";
        for($i = 0; $i < count($filas); $i++) {
            if ($i==0) {
                echo "<tr border = '1'>";
                foreach ($filas[$i] as $key => $value) {
                    echo "<td>".$key."</td>";
                }
                echo "</tr>";
            }
            echo "<tr>";
            foreach ($filas[$i] as $key => $value) {
                echo "<td>".$value."</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
    function mostrarTabla2($datos){
        $i=0;
        echo "<table border = '3'>";
        while ($fila = $datos->fetch(PDO::FETCH_ASSOC)) {
            if ($i==0) {
                echo "<tr border = '1'>";
                foreach ($fila as $key => $value) {
                    echo "<td>".$key."</td>";
                }
                echo "</tr>";
            }
            echo "<tr>";
            foreach ($fila as $key => $value) {
                echo "<td>".$value."</td>";
            }
            echo "</tr>";
            $i++;
        }
        echo "</table>";
    }
todo();
require_once "../views/nomina.php";
?>
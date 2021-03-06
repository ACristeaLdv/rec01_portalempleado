<?php
    session_start();
    require_once "../db/db.php";
    require_once "../models/model_altaempleadomasiva.php";

    function todo(){
        if (isset($_SESSION["mensaje"])) {
            unset($_SESSION["mensaje"]);
        }
        if(isset($_POST["anadir"])){
            if($_POST['nombre']!="" && $_POST['apellido']!="" && $_POST['cargo']!="" && $_POST['salario']!="" && $_POST['fecha']!=""){
                if($_POST['genero'] == 'Masculino'){
                    $genero = "M";
                }else{
                    $genero = "F";
                }
                $fechaDate = strtotime($_POST['fecha']);
                $fechaFormatoBien = date("Y-m-d",$fechaDate);
                if(!isset($_SESSION['carro'])){
                    $_SESSION['carro'] = Array();
                }
                array_push($_SESSION['carro'], Array('nombre'=>$_POST['nombre'], 'apellido'=>$_POST['apellido'], 'genero'=>$genero, 'cargo'=>$_POST['cargo'], 'salario'=>$_POST['salario'], 'fecha'=>$fechaFormatoBien));
            }else{
                echo "<script>alert('Faltan campos por rellenar');</script>";
            }
        }else if(isset($_POST["vaciar"])){
            unset($_SESSION['carro']);
        }else if(isset($_POST["alta"])){
            if(isset($_SESSION['carro'])){
                if(count($_SESSION['carro']) > 0 ){
                    for ($i=0; $i < count($_SESSION['carro']); $i++) { 
                        $nombre = $_SESSION['carro'][$i]['nombre'];
                        $apellido = $_SESSION['carro'][$i]['apellido'];
                        $genero = $_SESSION['carro'][$i]['genero'];
                        $cargo = $_SESSION['carro'][$i]['cargo'];
                        $salario = $_SESSION['carro'][$i]['salario'];
                        $fechanac = $_SESSION['carro'][$i]['fecha'];
                        $user = getEmpno()->fetch(PDO::FETCH_ASSOC)['numero']+1;
                        $fechains = date("Y-m-d H:i:s");

                        altaEmpleado($user,$fechanac,$nombre,$apellido,$genero,$fechains,$salario,$cargo);
                        $_SESSION["mensaje"] = "Se han dado de alta los empleados con exito";
                    }
                }
                
            }else{
                echo "El carrito est?? vacio";
            }
            unset($_SESSION['carro']);
            unset($_SESSION['tablacarro']);
        }elseif (isset($_POST["volver"])) {
            header ("location:../views/menuRRHH.php");
        }
        if(isset($_SESSION['carro'])){
            $_SESSION['tablacarro']=mostrarTabla($_SESSION['carro']);
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

    todo();
    require_once "../views/altaempleadomasiva.php";
?>
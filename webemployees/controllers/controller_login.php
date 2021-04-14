<?php
    session_start();
    require_once "models/model_login.php";
    function todo(){
        if(isset($_POST["enviar"])){
            if($_POST["user"] !="" && $_POST["password"] !=""){
                $respuesta = validar($_POST["user"],$_POST["password"]);
                if($respuesta->rowCount()==1){
                    $_SESSION["usuario"]=$_POST["user"];
                    $respDepartamento = departamento($_POST["user"]);
                    if($respDepartamento->rowCount()==1){
                        $_SESSION["esRRHH"] = true;
                        header("location: views/menuRRHH.php");
                    }else{
                        $_SESSION["esRRHH"] = false;
                        header("location: views/menu.php");
                    }
                }else{
                    echo "<script>alert('Los datos introducidos son incorrectos');</script>";
                }
            }else{
                echo "<script>alert('Faltan campos por rellenar');</script>";
            }
        }

    }
    todo();
    require_once "views/login.php";
?>




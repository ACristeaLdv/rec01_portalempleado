<!DOCTYPE html>
<html>
<head>
    <title>CAMBIO DEPARTAMENTO</title>
    <meta charset="UTF-8"/>
</head>
<body>
    <h1>CAMBIO DEPARTAMENTO </h1>
    <form method="POST" action="controller_cambiodepartamento.php">
        <label>Usuario:</label><br>
        <select name="user">
            <?php
                echo $_SESSION["opciones"];
            ?>
        </select><br>
        <label>Nombre del Nuevo Departamento:</label><br>
        <select name="departamento">
            <?php
                echo $_SESSION["opciones2"];
            ?>
        </select><br><br>

        <input type="submit" name="enviar" value="Cambiar/Asignar">
        
        <input type="submit" name="volver" value="Volver">
    </form>
    <?php
        if(isset($_SESSION["mensaje"])){
            echo $_SESSION["mensaje"];
        }
    ?>

</body>
</html>
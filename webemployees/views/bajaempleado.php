<!DOCTYPE html>
<html>
<head>
    <title>BAJA EMPLEADO</title>
    <meta charset="UTF-8"/>
</head>
<body>
    <h1>BAJA EMPLEADO</h1>
    <form method="POST" action="controller_bajaempleado.php">

        <label>Empleado:</label><br>
        <select name="user">
            <?php
                echo $_SESSION["opciones"];
            ?>
        </select>

        <input type="submit" name="enviar" value="Baja">
        
        <input type="submit" name="volver" value="Volver">
    </form><br>
    <?php
        if(isset($_SESSION["mensaje"])){
            echo $_SESSION["mensaje"];
        }
    ?>


</body>
</html>
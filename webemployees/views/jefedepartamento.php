<!DOCTYPE html>
<html>
<head>
    <title>JEFE DEPARTAMENTO</title>
    <meta charset="UTF-8"/>
</head>
<body>
    <h1>JEFE DEPARTAMENTO</h1>
    <form method="POST" action="controller_jefedepartamento.php">

        <label>Departamento:</label><br>
        <select name="departamento">
            <?php
                echo $_SESSION["opciones2"];
            ?>
        </select><br>
        <label>Jefe:</label><br>
        <select name="jefe">
            <?php
                echo $_SESSION["opciones"];
            ?>
        </select><br><br>

        <input type="submit" name="enviar" value="Asignar/Cambiar JEFE">
        
        <input type="submit" name="volver" value="Volver">
    </form>
    <?php
        if(isset($_SESSION["mensaje"])){
            echo $_SESSION["mensaje"];
        }
    ?>

</body>
</html>
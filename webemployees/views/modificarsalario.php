<!DOCTYPE html>
<html>
<head>
    <title>MODIFICAR SALARIO</title>
    <meta charset="UTF-8"/>
</head>
<body>
    <h1>MODIFICAR SALARIO</h1>
    <form method="POST" action="controller_modificarsalario.php">
        <label>Usuario:</label><br>
        <select name="user">
            <?php
                echo $_SESSION["opciones"];
            ?>
        </select><br>
        <label>Nuevo Salario:</label><br>
        <input type="number" name="numero"/><br><br>

        <input type="submit" name="enviar" value="Cambiar">
        
        <input type="submit" name="volver" value="Volver">
    </form>
    <?php
        if(isset($_SESSION["mensaje"])){
            echo $_SESSION["mensaje"];
        }
    ?>
</body>
</html>
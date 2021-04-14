<!DOCTYPE html>
<html>
<head>
    <title>ALTA EMPLEADO</title>
    <meta charset="UTF-8"/>
</head>
<body>
    <h1>ALTA EMPLEADO</h1>
    <form method="POST" action="controller_altaempleado.php">

        <label>Fecha de nacimiento:</label><br>
        <input type="date" name="fecha"><br><br>

        <label>Nombre:</label><br>
        <input type="text" name="nombre"/><br><br>

        <label>Apellido:</label><br>
        <input type="text" name="apellido"/><br><br>

        <label>Genero:</label><br>
        <select name="genero">
            <option>Masculino</option>
            <option>Femenino</option>
        </select><br><br>

        <label>Cargo:</label><br>
        <input type="text" name="cargo"/><br><br>

        <label>Salario:</label><br>
        <input type="number" name="salario"/><br><br>

        <input type="submit" name="enviar" value="Alta"><br><br>
        <input type="submit" name="volver" value="Volver">
    </form>
    <?php
        if(isset($_SESSION["mensaje"])){
            echo $_SESSION["mensaje"];
        }
    ?>
</body>
</html>
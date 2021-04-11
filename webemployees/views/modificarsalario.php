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
        <input type="text" name="user"/><br>

        <label>Nuevo Salario:</label><br>
        <input type="number" name="numero"/><br><br>

        <input type="submit" name="enviar" value="Cambiar">
    </form>

</body>
</html>
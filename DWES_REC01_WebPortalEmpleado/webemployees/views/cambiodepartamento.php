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
        <input type="text" name="user"/><br>

        <label>Numero del Nuevo Departamento:</label><br>
        <input type="text" name="numero"/><br><br>

        <input type="submit" name="enviar" value="Cambiar/Asignar">
    </form>

</body>
</html>
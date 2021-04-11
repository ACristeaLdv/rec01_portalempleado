<!DOCTYPE html>
<html lang="en">
<head>
    <title>ALTA MASIVA EMPLEADOS</title>
    <meta charset="UTF-8"/>
</head>
<body>
    <h1>ALTA MASIVA EMPLEADOS</h1>
    <form method="POST" action="../controllers/controller_altaempleadomasiva.php">
        <label>Fecha de nacimiento:</label><br>
        <input type="text" name="fecha"/><br><br>

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

        <input type="submit" name="anadir" value="Añadir al carrito">&nbsp;&nbsp;&nbsp;
        <input type="submit" name="vaciar" value="Vaciar">&nbsp;&nbsp;&nbsp;
        <input type="submit" name="alta" value="Alta">
    </form>
</body>
</html>
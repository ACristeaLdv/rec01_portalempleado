<!DOCTYPE html>
<html>
<head>
    <title>ALTA DEPARTAMENTO</title>
    <meta charset="UTF-8"/>
</head>
<body>
    <h1>ALTA DEPARTAMENTO</h1>
    <form method="POST" action="controller_altadepartamento.php">

        <label>Nombre Departamento:</label><br>
        <input type="text" name="nombre"/><br><br>

        <input type="submit" name="enviar" value="Alta Departamento">
        
        <input type="submit" name="volver" value="Volver">
    </form>
    <?php
        if(isset($_SESSION["mensaje"])){
            echo $_SESSION["mensaje"];
        }
    ?>

</body>
</html>
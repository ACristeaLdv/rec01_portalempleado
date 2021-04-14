<!DOCTYPE html>
<html>
<head>
    <title>INFO DEPARTAMENTO</title>
    <meta charset="UTF-8"/>
</head>
<body>
    <h1>INFO DEPARTAMENTO</h1>

    <?php
        if(isset($_SESSION['tablajefes'])){
            echo $_SESSION['tablajefes'];
        }
        ?>
        <br><br>
        <?php
        if(isset($_SESSION['tablaempleados'])){
            echo $_SESSION['tablaempleados'];
        }
        ?><br><br>
        
    <form method="POST" action="controller_infodepartamento.php">

        <label>Departamento:</label><br>
        <select name="departamento">
            <?php
                echo $_SESSION["opciones2"];
            ?>
        </select><br><br>

        <input type="submit" name="enviar" value="Ver Información"><br><br>
        
        <input type="submit" name="volver" value="Volver">
    </form>

</body>
</html>
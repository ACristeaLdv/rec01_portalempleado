<!DOCTYPE html>
<html>
<head>
    <title>VIDA LABORAL</title>
    <meta charset="UTF-8"/>
</head>
<body>
    <h1>VIDA LABORAL</h1>
    <?php
        if(isset($_SESSION['tablapersonales'])){
            echo $_SESSION['tablapersonales'];
        }
    ?>
    <br><br>
    <?php
        if(isset($_SESSION['tabladepts'])){
            echo $_SESSION['tabladepts'];
        }
    ?>
    <br><br>
    <?php
        if(isset($_SESSION['tablasalaries'])){
            echo $_SESSION['tablasalaries'];
        }
    ?>
    <br><br>
    <?php
        if(isset($_SESSION['tablatitles'])){
            echo $_SESSION['tablatitles'];
        }
    ?>
    <br><br>
    <form method="POST" action="controller_vidalaboral.php">

        <label>Usuario:</label><br>
        <select name="user">
            <?php
                echo $_SESSION["opciones"];
            ?>
        </select><br><br>

        <input type="submit" name="enviar" value="Visualizar">
        
        <input type="submit" name="volver" value="Volver">
    </form>
    <?php
        if(isset($_SESSION["mensaje"])){
            echo $_SESSION["mensaje"];
        }
    ?>

</body>
</html>
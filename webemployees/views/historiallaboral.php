<!DOCTYPE html>
<html>
<head>
    <title>HISTORIAL LABORAL</title>
    <meta charset="UTF-8"/>
</head>
<body>
    <h1>HISTORIAL LABORAL</h1>
        <br><br>
        <?php
        if(isset($_SESSION['tabladeps'])){
            echo $_SESSION['tabladeps'];
        }
        ?><br><br>
        <?php
        if(isset($_SESSION['tablasalarios'])){
            echo $_SESSION['tablasalarios'];
        }
        ?><br><br>
    <form method="POST" action="controller_historiallaboral.php">
        <input type="submit" name="volver" value="Volver">
    </form>

</body>
</html>
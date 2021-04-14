<!DOCTYPE html>
<html>
<head>
    <title>NOMINA</title>
    <meta charset="UTF-8"/>
</head>
<body>
    <h1>NOMINA</h1>
    <?php
        if(isset($_SESSION['tablasalario'])){
            echo $_SESSION['tablasalario'];
        }
    ?>
    <br><br>
    <?php
        if(isset($_SESSION['tabladatos'])){
            echo $_SESSION['tabladatos'];
        }
    ?>
    <br><br>
    <?php
        if(isset($_SESSION['tabladepartamentos'])){
            echo $_SESSION['tabladepartamentos'];
        }
    ?>
    <br><br>
    <?php
        if(isset($_SESSION['tablatitulos'])){
            echo $_SESSION['tablatitulos'];
        }
    ?>
    <br><br>
    <form method="POST" action="controller_nomina.php">
    
        <input type="submit" name="volver" value="Volver">
    </form>
    

</body>
</html>
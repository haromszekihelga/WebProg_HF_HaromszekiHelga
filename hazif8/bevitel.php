<!doctype html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>

        <?php
        include('db_config.php');

        if (isset($_POST['submit'])) {
            $nev = $_POST['nev'];
            $szak = $_POST['szak'];
            $atlag = $_POST['atlag'];
            
            $sql = "INSERT INTO hallgatok (nev,szak,atlag) VALUES ('$nev','$szak','$atlag')";

            if ($conn->query($sql) === TRUE) {
                $conn->close();
                echo "Köszönjük! Az adatokat elmentettük.<br>";
                echo "<a href='bevitel.php'>Uj adat</a><br>";
                echo "<a href='listazas.php'>Adatok listazasa</a><br>";
            }else{
                echo "Muveleti hiba.\n";
            }
        } else {
            ?>

            <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                Nev:<input type="Text" name="nev"><br>
                Szak:<input type="Text" name="szak"><br>
                Atlag:<input type="Text" name="atlag"><br>
                <input type="Submit" name="submit" value="Elkuld">
            </form>

            <?php
        }
        ?>

    </body>
</html>
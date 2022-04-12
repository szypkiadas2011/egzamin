<?php
    require_once 'db.php';

    $db = new DB();
    if (isset($_REQUEST['wpis']))
    {
        $wpis = $_REQUEST['wpis'];
        $db->sql("update zadania set wpis = '$wpis' where dataZadania = '2020-08-27'");
    }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style/style.css">
    <script type="module" src="script/main.js"></script>
    <title>Organizer</title>
</head>
<body>
    <header>
        <div><h2>MÓJ ORGANIZER</h2></div>
        <div>
            <form action="" method="POST">
                <label for="wpis">Wpis wydarzenia: </label>
                <input type="text" name="wpis">
                <input type="submit" value="ZAPISZ">
            </form>
        </div>
        <div><img src="img/logo.png" alt="Mój organizer"></div>
    </header>
    <main>
        <?php
            $res = $db->sql('select dataZadania, miesiac, wpis from zadania where miesiac = "sierpien"');
            while ($day = $res->fetch_assoc())
            {
                $data = $day['dataZadania'];
                $msc = $day['miesiac'];
                $wpis = $day['wpis'];
                echo "<div class='day'><h6>$data, $msc</h6><p>$wpis</p></div>";
            }
        ?>
    </main>
    <footer>
        <?php
            $res = $db->sql('select miesiac, rok from zadania where dataZadania = "2020-08-01"');
            $b = $res->fetch_assoc();
            $msc = $b['miesiac'];
            $rok = $b['rok'];
            echo "<h1>miesiąc: $msc, rok: $rok</h1>";
        ?>
        <p>Strone wykonał: numer pesel</p>
    </footer>
</body>
</html>
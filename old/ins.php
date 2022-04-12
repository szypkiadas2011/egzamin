<?php

if (!empty($_POST['name']) && !empty($_POST['age']) && !empty($_POST['lifetime']) && !empty($_POST['breed']) && !empty($_POST['color']))
{
    $name = $_POST['name'];
    $age = $_POST['age'];
    $lifetime = $_POST['lifetime'];
    $breed = $_POST['breed'];
    $color = $_POST['color'];

    $db = new mysqli('127.0.0.1', 'nonek', '', 'animals');

    if ($db->query("insert into animals values (null, '$name', $age, $lifetime, '$breed', '$color')"))
        echo "inserted $name $age $lifetime $breed $color";
    else
        echo $db->error;

    $db->close();
    exit;
}

?>

<form action="" method="POST">
    <input type="text" name="name"><br>
    <input type="number" name="age"><br>
    <input type="number" name="lifetime"><br>
    <input type="text" name="breed"><br>
    <input type="text" name="color"><br>

    <input type="submit" value="insert">
</form>

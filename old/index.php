<?php

function row($arr)
{
    echo '<tr>';
    foreach ($arr as $cell)
        echo '<td>' . $cell . '</td>';
    echo '</tr>';
}

$db = new mysqli('127.0.0.1', 'nonek', '', 'animals');

if (!$res = $db->query('select * from animals'))
{
    echo 'empty';
    exit;
}

$rows = array();
while ($row = $res->fetch_array(MYSQLI_ASSOC))
    $rows[] = $row;

echo '<style>td {padding: 2px 9px;}</style>';
echo '<table><tr><td></td><td>name</td><td>age</td><td>lifetime</td><td>breed</td><td>color</td></tr>';
foreach ($rows as $row)
    row($row);
echo '</table>';

$db->close();

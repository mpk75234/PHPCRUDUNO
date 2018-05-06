<?php

try
{
    $dbh = new PDO("mysql:host=localhost;dbname=cruduno","root","");
}
catch (Exception $e)
{
    echo "error connecting to mysql: " . $e->getMessage() . ".";
}

$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<?php
include('db.php');

$sql = ('SELECT * FROM users ORDER BY id LIMIT 3'); 
$stmt = $dbh->prepare($sql);

try
{
    $stmt->execute();
}
catch(PDOException $e)
{
    echo "read error: " . $e->getMessage();
}
while($row = $stmt->fetch(PDO::FETCH_OBJ)){
    
}
?>
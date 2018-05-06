<?php
include('db.php');
session_start();
    $id = $_GET['id'];

    $stmt = $dbh->prepare('DELETE FROM users WHERE id=:id ');
    $stmt->execute([':id'=>$id]);
    $_SESSION['message'] = "DELETE SUCCESS";

    header('location: http://localhost/cruduno');

    ?>


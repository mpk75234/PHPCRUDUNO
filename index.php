<?php
include('lib/db.php');

$sql = ('SELECT * FROM users ORDER BY id DESC LIMIT 3'); 
$csql = ('SELECT * FROM users ');
$cstmt = $dbh->prepare($csql);
$stmt = $dbh->prepare($sql);

try
{
     $stmt->execute();
     $cstmt->execute();
     $users = $stmt->fetchAll(PDO::FETCH_OBJ);
     $allusers = $cstmt->fetchAll(PDO::FETCH_OBJ);
}
catch(PDOException $e)
{
    echo "read error: " . $e->getMessage();
}
?>
<?php require('lib/header.php'); ?>
<?php $_SESSION['message']="READ SUCCESS"; ?>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h2>Read latest 3 from <?php echo count($allusers); ?> users</h2>
</div>
<div class="card-body">
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Password</th>
            <th>UpdateDelete</th>
            </tr>
            <?php foreach($users as $u): ?>
            <tr>
                <td><?= $u->id; ?></td>
                <td><?= $u->username; ?></td>
                <td><?= $u->email; ?></td>
                <td><?= $u->password; ?></td>
                <td>
                    <button class="btn btn-warning"><a href="lib/update.php?id=<?= $u->id ?>"> UUUU</a></button>
                    <button onclick="return confirm('u sure bro?');" class="btn btn-danger"><a href="lib/delete.php?id=<?= $u->id ?>"> DDDD</a></button>
                    
                    
</td>
</tr>
<?php endforeach; ?>
</table>
</div>
</div>
</div>
    
<?php
include('lib/footer.php');
?>
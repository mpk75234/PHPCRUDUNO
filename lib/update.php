<?php
include('header.php');
include('db.php');
$id = $_GET['id'];
$stmt = $dbh->prepare('SELECT * from users WHERE id=:id ');
$stmt->execute([':id' => $id]);
$user = $stmt->fetch(PDO::FETCH_OBJ);
?>
<div class="container">
<div class="card mt-2">
<div class="card-header">
<h2>Update</h2>
</div>
<div class="card-body">
<form method="post">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" value="<?= $user->username; ?>" name="username" id="username" class="form-control">
</div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" value="<?= $user->email; ?>" name="email" id="email" class="form-control">
</div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="text" value="<?= $user->password; ?>" name="password" id="password" class="form-control">
</div>
<div class="form-group">
    <button type="submit" name="sub"class="btn btn-success">Update</button>
</div>
</form>
</div>
</div>
</div>
<?php
if(isset($_POST['sub'])){
$username= $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];


$stmt = $dbh->prepare("UPDATE users SET username=:username, email=:email, password=:password WHERE id=:id ");

try {
    $stmt->execute([':username'=>$username, ':email'=>$email, ':password'=>$password, ':id'=>$id]);
    $_SESSION['message']="UPDATE SUCCESS";
    header('location: http://localhost/cruduno');    
}
catch(PDOException $e)
{
    echo "insert error: " . $e->getMessage();
}
}

include('footer.php');
?>
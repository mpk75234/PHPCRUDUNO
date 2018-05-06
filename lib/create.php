<?php
include('db.php');
include('header.php');
?>
<div class="container">
<div class="card mt-2">
<div class="card-header">
<h2>Create</h2>
</div>
<div class="card-body">
</div>
<form method="post">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" class="form-control">
</div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="email" id="email" class="form-control">
</div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="text" name="password" id="password" class="form-control">
</div>
<div class="form-group">
    <button type="submit" name="sub"class="btn btn-success">Create</button>
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


$stmt = $dbh->prepare("INSERT INTO users (username, email, password) VALUES(:username, :email, :password)");
$stmt->bindParam(':username', $username);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $password);

try {
    $stmt->execute();
    $last_id = $dbh->lastInsertId();
    $_SESSION['message'] = "CREATE SUCCESS";
    header('location: http://localhost/cruduno');    
}
catch(PDOException $e)
{
    echo "insert error: " . $e->getMessage();
}
}

include('footer.php');
?>
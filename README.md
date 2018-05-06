# PHPCRUDUNO
PHP CRUD using XAMPP/Bootstrap - I got bored with MERN, took a php break. ftw.

To whom it may concern,

I had two items to list that make this basic PHP CRUD app interesting. The first is , I used two prepared statements to get the last 3 users
entered, and another query to get a count of all users:

{
     $stmt->execute();
     $cstmt->execute();
     $users = $stmt->fetchAll(PDO::FETCH_OBJ);
     $allusers = $cstmt->fetchAll(PDO::FETCH_OBJ);
}

Secondly, you'll notice the associative array(I call them a hash from my python training, ymmv) used within Update, to generate the variables used in
the prepared statements:



try {
    $stmt->execute([':username'=>$username, ':email'=>$email, ':password'=>$password, ':id'=>$id]);
    $_SESSION['message']="UPDATE SUCCESS";
    header('location: http://localhost/cruduno');    
}

My initial PHP training covered using bindParam and bindValue, you'll see for the C in CRUD, I used the bindParam:

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

Both methods to create variables within prepared statements work great.

Thanks for reading.

burp,

Mike - somewhere in Texas 5/6/2018

<?php
session_start();
require_once 'utils/Database.php';
$db = new Database();

$user = $db->getUser();
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = $_POST['name'];
    $mail = $_POST['mail'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];


    if($password1 === $password2) {
        $response = $db->createUser($name, $mail, $password1);

        if($response) {
            $db->loginUser($mail, $password2);
            $message = 'User created successfully!Now You are Conected';
           

            
        } else {
            $message = 'An error occurred!';
        }
    } else {
        $message = 'Passwords are not the same!';
    }
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Join us!</title>
    <link href="http://fonts.googleapis.com/css?family=Nunito:400,300" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../css/CreateAccount.css">
    <link href="../css/nav.css" rel="stylesheet" type="text/css"/>
    <link href="../css/footer.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

</head>

<body>
<?php require '../nav.html'; ?>

<div class="form-wrap">
<form method="POST" action="./CreateAccount.php">
    <h1>Join us</h1>
    <div class="input">
         <input type="text" name="name" value="" placeholder="Name">
    </br>
         <input type="email" name="mail" value="" placeholder="Email">
        </br>
         <input type="password" name="password1" value="" placeholder="Password">
        </br>
        <input type="password" name="password2" value="" placeholder="Confirm Password">
    </div>
  <p class="message"><?= $message ?></p>



<div class="button">
    <button type="submit">Sign Up</button>
</div>
</form>
</div>

<?php require '../footer.html';?>
</body>
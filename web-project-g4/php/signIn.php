<?php
session_start();
require 'utils/Database.php';
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = new Database();

    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = $db->loginUser($email, $password);

    if($user['email'] != 'Guest') {
        $message = "{$user['email']} is logged in.";
header("Location:./index.php"); 
exit();
    } else {
        $message = 'An error occurred!';
    }
}
$db = new Database();
  $user= $db->getuser();
 if($user['email'] != 'Guest') {
ob_start();

header("Refresh: 0; url=./index.php");
echo"<script type='text/javascript'>alert('You are already conected ..you will redirect automatic to index page');</script>"; 

ob_end_flush();
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign In</title>
    <link href="http://fonts.googleapis.com/css?family=Nunito:400,300" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../css/signIn.css">
    <link href="../css/nav.css" rel="stylesheet" type="text/css"/>
    <link href="../css/footer.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

</head>
<body>
<?php require '../nav.html'; ?>


<div class="form-wrap">
<form method="post" action="./signIn.php">
        <h1>Sign In</h1>
        <div class="input">
            <input type="email" name="email" value="" placeholder="Email">
            <input type="password" name="password" value="" placeholder="Password">
        </div>

  


    <div class="button">
        <button type="submit">Sign In</button>
    </div>

    <p>
        Not a member yet?
        <a href="../html/CreateAccount.php">Create New Account</a>
    </p>
 <p class="message"><?= $message ?></p>
</div>
  </form>

<?php require '../footer.html';?>
</body>
<?php
session_start();
require_once 'utils/Database.php';
$db = new Database();
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $mail = $_POST['email'];
    $company = $_POST['company'];
    $message = $_POST['message'];
    $response = $db->contactus($name, $company, $mail,$message);

        if($response) { 
          $message = 'message send successfully!';
        } else {
            $message = 'An error occurred!';
        }
    
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us</title>
    <link href="http://fonts.googleapis.com/css?family=Nunito:400,300" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../css/ContactUs.css">
    <link href="../css/nav.css" rel="stylesheet" type="text/css"/>
    <link href="../css/footer.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    
</head>

<body>
<?php require '../nav.html'; ?>
     <main>
        <div class="Main">
        <div class="header">
            <h1>Contact Us</h1>
            <p> Thermax would <b>love</b> to hear from you!
                </br>Let us know what you think or if there's any way we can help you. </p>
            
        </div>

        <div class="form">
            <form method="POST" action="./ContactUS.php">
                <input type="text" name="name" placeholder="Name" required>
                <input type="email" name="email" value="" placeholder="Email" required>
                <input type="text" name="company" placeholder="Company">
                <textarea name="message"  id="field" rows="4" cols="50" value="" placeholder="Write your message here" ></textarea>

 <p class="message"><?= $message ?></p>
                <button type="submit">Let's Talk</button>
            </form>
        </div>
        </div>
</main>

 <?php require '../footer.html';?>
    
</body>
</html>
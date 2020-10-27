<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us</title>
    <link href="http://fonts.googleapis.com/css?family=Nunito:400,300" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../css/ContactUs.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src="../javascript/contact-us.js"></script>
</head>

<? include 'templates/menu.php'?>
<body>


<main>
    <div class="contact">
        <div class="header">
            <h1>Contact Us</h1>
            <p> CrazySocks is here to provide you with more information and answer any question you may have </p>
        </div>

        <div class="form">
            <form>
                <input type="text" name="name" placeholder="Name">
                <input type="text" name="message" id="msg" placeholder="Message">
                <button type="button">Let's Talk</button>
            </form>
        </div>
    </div>
</main>

</body>
<? include 'templates/footer.php'?>

</html>

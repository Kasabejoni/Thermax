<?php
session_start();

require_once '../utils/Database.php';
$db = new Database();

$user = $db->getAdmin();
 if(!isset($_SESSION['admin_email'])){
	
ob_start();

echo"<script type='text/javascript'>alert('You are not conected ..you will redirect automatic to sign-in page');
location = './signIn.php';
</script>"; 

ob_end_flush();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
<style>
body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  width: 130px;
  position: fixed;
  z-index: 1;
  top: 100px;
  left: 10px;
  background: #eee;
  overflow-x: hidden;
  padding: 8px 0;
}

.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 25px;
  color: #2196F3;
  display: block;
}

.sidenav a:hover {
  color: #064579;
}

.main {
  margin-left: 140px; /* Same width as the sidebar + left position in px */
  font-size: 28px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
    <meta charset="UTF-8">
    <title>Shopping Cart</title>
    <link href="http://fonts.googleapis.com/css?family=Nunito:400,300" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../../css/cart.css">
    <link href="../../css/nav.css" rel="stylesheet" type="text/css"/>
    <link href="../../css/footer.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>

<body>
<?php require '../../nav.html'; ?>



<div class="sidenav">
  <a href="#about">General</a>
  <a href="./shop.php">Shop</a>
  <a href="#clients">users</a>
  
</div>



    


<?php require '../../footer.html';?>
</body>
</html>
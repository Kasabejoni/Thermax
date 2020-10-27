<?php
session_start();

require_once 'utils/Database.php';
$db = new Database();

$user = $db->getUser();
?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Thermax Inc.</title>
    <link href="http://fonts.googleapis.com/css?family=Nunito:400,300" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../css/index.css">
    <link href="../css/nav.css" rel="stylesheet" type="text/css"/>
    <link href="../css/footer.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>

<body>
<?php require '../nav.html'; ?>
<div class="main1">
    
    <h2></br></br>Thermax Inc.</h2>
    <p>your own private medical store.</p>
    <p> </p>
  <br>   Medical equipment and items</br> for your every day use
</br>   in one click your worries will be over</br>
      simple as that.</p>


<div class="header">
 <ul>
     <p>                <a href="./shopNow.php"> Shop Now</a> </p>
 </ul>
</div>


<div class="sidenav">
    <ul>
        <li>news <img src="https://cdn4.iconfinder.com/data/icons/business-finance-vol-12-2/512/24-256.png" width="50px" height="50px" </li>
        <li><a href="https://www.mdais.org/news/2712191"  target="_blank"><IMG src="https://www.mdais.org/media/1973/6.jpeg" HEIGHT="100PX" WIDTH="200px" >  <p>    "    The Incredible Story of the man who died 3 times (27.12.19)"</p></a></li>
        <li> <a href="https://www.mdais.org/news/2612196"  target="_blank"><IMG src="https://www.mdais.org/media/1972/5.jpeg" HEIGHT="100PX" WIDTH="200PX" > <p>    6 years old was saved by the bell! (25.12.19)</p></a></li>
    </ul>
</div>
</div>

<?php require '../footer.html';?>
</body>



</html>
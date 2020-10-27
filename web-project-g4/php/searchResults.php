<?php
session_start();
require 'utils/Database.php';
$db = new Database();

$Items= $db->search($_GET['search']);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shop Now</title>
    <link href="http://fonts.googleapis.com/css?family=Nunito:400,300" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../css/shopnow.css">
    <link href="../css/nav.css" rel="stylesheet" type="text/css"/>
    <link href="../css/footer.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

</head>



<body>
<?php require '../nav.html'; ?>


<main>

    <div class="title">Shop Now</div>

   

    </div>
    
    
    <div class="items">
        <div class="medic">
            <h2>Medical Equipment</h2>
  <?php foreach ($Items as $Items):    ?>
                <div class="item">
                   <a href="product.php?id=<?= $Items['productId'] ?>">    <img src="<?= $Items['photo_url'] ?>"></a>   <!-- change link -->

                    <p><?= $Items['info'] ?></p>
                    <p><?= $Items['price'] ?>$</p>
                </div>

            <?php endforeach;  ?>


            </div>

      


    </div>



</main>


<?php require '../footer.html';?>
</body>

</html>
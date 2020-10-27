<?php
session_start();
require_once 'utils/Database.php';
$db = new Database();
$product = $db->getProduct($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>Product</title>
    <link rel="stylesheet" href="../../css/product.css">
    <link href="../css/nav.css" rel="stylesheet" type="text/css"/>
    <link href="../css/footer.css" rel="stylesheet" type="text/css"/>
    <link href="http://fonts.googleapis.com/css?family=Nunito:400,300" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">


</head>

<body>
<?php require '../nav.html'; ?>

<br>
<br>
<br>
<br>
<div class="product-card">
<div class="img">
        <img src="../<?= $product['photo_url'] ?>" alt="" height="200" width="200">
    </div>
  <div class="product-info">
        <h2><?= $product['name'] ?></h2>
        <span class="desc"> <?= $product['info'] ?>
</span>
        <span class="price"><i class="ion-social-usd"></i><?= $product['price'] ?></span>
        </br>

        </br></br>
<form method="post" action="./cart.php">
        <input type="hidden" name="product_id" value="<?= $product['productId'] ?>">
         
        
           <span class="price">  <p>Add Quantity</p></span>
            <input type="text" name="quantity" >
        
          
            <button type="submit" class="addbtn"><i class="ion-ios-cart"></i> Add To Cart</button>
</form>
<form method="post" action="./wishlist.php">
  <input type="hidden" name="product_id" value="<?= $product['productId'] ?>">
        <button type="submit" class="addbtn"><i class="ion-ios-cart"></i> Add To Wishlist</button>
</form>
        <div class="total-price"></div>


    </div>
    </div>

<?php require '../footer.html';?>
</body>

</html>
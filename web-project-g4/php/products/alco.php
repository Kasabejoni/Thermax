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
<?php require '../../nav.html'; ?>


<div class="product-card">
    <div class="img">
        <img src="/web-project-g4/photos/alco.jpg" alt="">
    </div>

    <div class="product-info">
        <h2>Alcoholic Gel</h2>
        <span class="desc"> Hand Sanitizer with Aloe 4 oz. Alcohol (Ethyl) Gel Bottle
</span>
        <span class="price"><i class="ion-social-usd"></i>12</span>
        </br>
        <div class="quantity">
            <button class="minus-button"><i class="fas fa-minus"></i> </button>
        
            <input type="text" name="name" value="1">
        
            <button class="plus-button"><i class="fas fa-plus"></i> </button>
    
        </div>
        </br></br>
        <a class="addbtn" href="#"><i class="ion-ios-cart"></i> Add To Cart</a></br></br>
        <a class="addbtn" href="#"><i class="ion-ios-heart"></i> Add To Wish List</a></br></br>
    
    
        <div class="total-price">Total Price:  12 $</div>


    </div>
    </div>




</div>
<?php require '../../footer.html';?>
</body>

</html>
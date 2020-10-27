<?php
session_start();
require 'utils/Database.php';
$db = new Database();

$Items= $db->getItems();


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

    <div class="filter">



        <div id="type">
            <label>Choose Type </label>
            <select name="type" id="medicType">
                <option id="all" selected> All </option>
                <option id="equipment"> Equipment </option>
                <option id="item"> items </option>
            </select>
        </div>
    </div>


 
    
    
    <div class="items">
<h2>Medical Equipment</h2>
     
      
  <?php foreach ($Items as $Items):    ?>
                      <div class="item" >
                    <b> <p><?= $Items['name'] ?></p></b>
                   <a href="product.php?id=<?= $Items['productId'] ?>">    <img src="../<?= $Items['photo_url'] ?>" height=120px width=120px ></a>   <!-- change link -->

                    <p><?= $Items['info'] ?></p>
              <b>      <p><?= $Items['price'] ?>$</p></b>
                </div>

            <?php endforeach;  ?>


            </div>
</main>


<?php require '../footer.html';?>
</body>

</html>
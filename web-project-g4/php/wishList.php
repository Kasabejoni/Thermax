<?php
session_start();

require_once 'utils/Database.php';
$db = new Database();

$user = $db->getUser();

     if($user['email'] == 'Guest') {
ob_start();

echo"<script type='text/javascript'>alert('You are not conected ..you will redirect automatic to sign-in page');
location = './signIn.php';
</script>"; 

ob_end_flush();
    }

$message = '';
$card_items = [];
if($user) {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $product_id = $_POST['product_id'];
        $user_id = $user['id'];

        $action = isset($_POST['action']) ? $_POST['action'] : null;
        switch ($action) {
            case 'DELETE': {
                $db->deleteFromWishList($product_id, $user['id']);
                break;
            }
            case 'UPDATE': {
                $db->updateQuantity($product_id, $user_email, $_POST['inc'] === 'true');
                break;
            }
            default: {
                $db->addToWishList($user['id'],$product_id);
            }
        }


    }

    $wish_list_items = $db->getWishListItems( $user['id']);

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Wish List</title>
    <link href="http://fonts.googleapis.com/css?family=Nunito:400,300" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../css/wishlist.css">
    <link href="../css/nav.css" rel="stylesheet" type="text/css"/>
    <link href="../css/footer.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

</head>

<body>
<?php require '../nav.html'; ?>
<h1>Wish List</h1>

<div class="wish-list">
    
    <div class="column-labels">
        <label class="image">Item</label>
        <label class="description">Description</label>
        <label class="price">Price</label>
         <label class="p-remove">Remove</label>
    </div>

      <?php foreach ($wish_list_items as $item): ?>
        <div class="item">
        
        <div class="image">
            <img src="../<?= $item['photo_url'] ?>" height="120" width="120" >
        </div>
        
        <div class="description">
            <div class="p-title"><?= $item['name'] ?></div>
            <p class="p-description"> <?= $item['info'] ?></p>
        </div>
        
        <div class="price"><?= $item['price'] ?>$</div>
        
      <div class="p-remove">
            <form method="post" action="./wishlist.php">
                <input type="hidden" name="action" value="DELETE">
                <input type="hidden" name="product_id" value="<?= $item['productId'] ?>">
                <button type="submit" class="delete-button">
                    <i class="far fa-trash-alt"></i>
                </button>
            </form>

        </div>
           </div>
    

        
        
  
        <?php endforeach; ?>
 
    
    <?php require '../footer.html';?>
</body>
</html>
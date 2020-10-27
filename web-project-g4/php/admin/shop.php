
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
	 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        
        $action = isset($_POST['action']) ? $_POST['action'] : null;
        switch ($action) {
            case 'DELETE': {
				$product_id = $_POST['product_id'];
                $db->deleteproduct($product_id);
                break;
            }
            case 'UPDATE': {
                $db->updateQuantity($product_id, $user_email, $_POST['inc'] === 'true');
                break;
            }
            default: {
				$name = $_POST['name'];
		$price = $_POST['price'];
		$info = $_POST['info'];
		$category = $_POST['category'];
              
				$target_dir = "../../";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$nf=$_FILES["fileToUpload"]["name"];
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

				$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
  $db->addToProducts($name, $price ,$nf,$info,$category);
            }
        }


    

	$card_items = [];
	$card_items = $db->getProducts();
?>
<!DOCTYPE html>
<html lang="en">

<head>
<style>
body {
	margin-top:80px;
	margin-left:150px;
  font-family: "Lato", sans-serif;
}

.sidenav {
  width: 130px;
  position: fixed;
  z-index: 1;
  top: 0px;
  left: 0px;
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




<div class="sidenav">
  <a href="#about">General</a>
  <a href="#services">Shop</a>
  <a href="#clients">users</a>
  
</div>
 <h1 style="padding-top:0px">Add Products</h1>
        <form method="POST" action="./shop.php" enctype="multipart/form-data"> 
                <input type="text" name="name" placeholder="name" required>
				 <input type="text" name="price" placeholder="price" required>
		
				  <input type="file" name="fileToUpload" id="fileToUpload"  placeholder="photo_url" >
				  				  <input type="text" name="info" placeholder="info" required>
								   <input type="text" name="category" placeholder="category" required>
       

                <button type="submit">Add Product</button>
            </form>
 <?php foreach ($card_items as $item): ?>
  <h1 style="padding-top:0px">Delete Products</h1>
    <div class="item">
        
        <div class="image">
            <img src="../../<?= $item['photo_url'] ?>" alt=""/ width="85" height="85" >
        </div>
        
        <div class="description">
            <div class="p-title"><?= $item['name'] ?></div>
            <p class="p-description">  <?= $item['info'] ?></p>
        </div>
        
        <div class="price"><?= $item['price'] ?></div>
      
            
       
 
                <form method="post" action="./shop.php">
         <input type="hidden" name="action" value="DELETE">
                <input type="hidden" name="product_id" value="<?= $item['productId'] ?>">
                <button type="submit" class="delete-button"><i class="far fa-trash-alt"></i> </button>
				</form>
    </div>
    </div>
<?php endforeach; ?>


    


<?php require '../../footer.html';?>
</body>
</html>
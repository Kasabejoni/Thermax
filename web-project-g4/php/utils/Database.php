<?php
class Database {
    public static $conn;

    public function __construct(){
        self::connect();
    }

    public static function connect(){ //connect to database
        if(self::$conn) { return self::$conn; }

        $servername = "localhost";
        $username = "root";
        $password = "";

        $conn = new mysqli($servername, $username, $password, 'web-project-g4');

        self::$conn = $conn;
        return $conn;
    }

    public function query($query) {
        $result = mysqli_query(self::$conn, $query);
        if(!$result) { return []; }

        $array = array();

        if (mysqli_num_rows($result)>0){
            while ($row = mysqli_fetch_assoc($result)){
                $array[] = $row;
            }
        }
        return $array;
    }

    public function getAllProducts() {
        $query = "SELECT * FROM product";
        return $this->query($query);
    }

    public function getItems() {
        $query = "SELECT * FROM products ";
        return $this->query($query);
    }


    public function getEquipments() {
        $query = "SELECT * FROM product where category='Equipments'";
        return $this->query($query);
    }

    public function getProduct($id) {
        $query = "SELECT * FROM products where ProductId=".$id;
        return $this->query($query)[0];
    }

    public function getUser() {
        if(isset($_SESSION['email'])) {
            return $_SESSION['email'];
        } else {
            return ['email'=> 'Guest'];
        }
    }
   public function getAdmin() {
        if(isset($_SESSION['admin_email'])) {
            return $_SESSION['admin_email'];
        } else {
            return ['admin_email'=> 'Guest'];
        }
    }

    public function loginUser($email, $password){
        $query = "SELECT * FROM users where password='$password' AND email='$email' limit 1";
        $result = $this->query($query);
        $email = sizeof($result) > 0 ? $result[0] : null;
        $_SESSION['email'] = $email;
        return $this->getUser();
    }
public function loginAdmin($email, $password){
        $query = "SELECT * FROM admin where password='$password' AND user='$email' limit 1";
        $result = $this->query($query);
        $email = sizeof($result) > 0 ? $result[0] : null;
        $_SESSION['admin_email'] = $email;
        return $this->getUser();
    }

    public function createUser($name, $mail, $password) {
        return mysqli_query(self::$conn, "INSERT INTO users (email, name, password) VALUES ('$mail','$name', '$password')");
    }
   public function contactus($name, $company, $mail,$message) {
        return mysqli_query(self::$conn, "INSERT INTO contactus (name,email,company,message) VALUES ('$name','$mail', '$company','$message')");
    }


    public function addToCart($product_id, $amount, $user_id) {
$test=$this->getorderid($user_id);
            return mysqli_query(self::$conn, "INSERT INTO productorder (productId, OrderId, amount) VALUES ('$product_id','$test', '$amount')");
    }
	   public function addToProducts($name, $price , $photo_url,$info,$category) {
            return mysqli_query(self::$conn, "INSERT INTO `products` (`productId`, `name`, `price`, `photo_url`, `info`, `category`, `supplierId`) VALUES ('','$name', '$price', '$photo_url', '$info', '$category', '')");
    }
	 
    public function getorderid($user_id) {
        $is_item_exist = $this->query("Select * from orders where customerId='$user_id' and status='0' limit 1");
        if(sizeof($is_item_exist) > 0) {
            return $is_item_exist[0]['id'];
        } else {
 mysqli_query(self::$conn, "INSERT INTO orders (`customerId`) Values ('$user_id')");
      return $this->getorderid($user_id);
        }
    }

    public function deleteCartItem($product_id, $user_id) {
$test=$this->getorderid($user_id);
        return mysqli_query(self::$conn, "delete from productorder where productId='$product_id' and OrderId='$test'");
    }
   public function deleteproduct($product_id) {
        return mysqli_query(self::$conn, "delete from products where productId='$product_id'");
    }
    public function getCartItems($customer_id) {
        return $this->query("SELECT * from orders INNER JOIN productorder ON orders.id= productorder.OrderId INNER JOIN products ON productorder.productId=products.productId where customerId='$customer_id' order by orders.id ");
    }


    public function getWishListItems($user_id) {
        return $this->query("SELECT * from wish_list INNER JOIN products ON wish_list.productId = products.productId where userID='$user_id'");
    }
 public function getproducts() {
        return $this->query("SELECT * from products");
    }
    public function addToWishList($user_id, $product_id) {
            return mysqli_query(self::$conn, "INSERT INTO wish_list (userID, productID) VALUES ('$user_id','$product_id')");
        }
    

    public function deleteFromWishList($product_id, $user_id) {
        return mysqli_query(self::$conn, "delete from wish_list where productId='$product_id' and userId='$user_id'");
    }

    public function search($text) {
        return $this->query("Select * from products where name LIKE \"%$text%\" or info like \"%$text%\"");
    }

}

<php

class ConnectDB{
    private $host = "localhost";
    private $db_name = "test";
    private $u_name = "root";
    private $p_word  = "";
    private $connDB;

    public function getConnectionDB(){
        $this->connDB = null;

        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->u_name, $this->p_word);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
        
        return $this->conn;
    }

}
?>

<php

class CoffeeMenu
{
    public $menuId;
    public $menuName;
    public $menuPrice;
    public $menuType;
    public $menuImg1;
    public $menuImg2;
    public $menuImg3;
    public $menuType;
    public $shopId;

    private $connDB;

    public function __construct($db)
    {
        $this->connDB = $db;
    }

    <!-- Function to add coffee menu to the database -->

    public function addCoffeeMenu()
    {
        $strSql = "INSERT INTO coffee_menu (menu_name, menu_price, menu_type, menu_img1, menu_img2, menu_img3, shop_id) VALUES (:menu_name, :menu_price, :menu_type, :menu_img1, :menu_img2, :menu_img3, :shop_id)";

        $stmt = $this->connDB->prepare($strSql);

        $stmt->bindParam(":menu_name", $this->menuName);
        $stmt->bindParam(":menu_price", $this->menuPrice);
        $stmt->bindParam(":menu_type", $this->menuType);
        $stmt->bindParam(":menu_img1", $this->menuImg1);
        $stmt->bindParam(":menu_img2", $this->menuImg2);
        $stmt->bindParam(":menu_img3", $this->menuImg3);
        $stmt->bindParam(":shop_id", $this->shopId);

        if ($stmt->execute()) {
            return true;
        } else {
        return false;
        }
    }
    
    
    <!-- A function to retrieve all menu information of each restaurant. -->

    public function getAllMenu()
    {
        $strSql = "SELECT * FROM coffee_menu";

        $stmt = $this->connDB->prepare($strSql);

        $stmt->execute();

        return $stmt;
    }













}

?>
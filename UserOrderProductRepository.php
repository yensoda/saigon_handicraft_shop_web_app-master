<?php 
require_once("connect.php");

class UserOrderProductRepository {
    public function insert($userOrderId, $productId, $productName, $orderProductAmount) {
        global $conn;
        $sql = "INSERT INTO user_order_product (user_order_id, product_id, product_name, order_product_amount) 
                VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iisi", $userOrderId, $productId, $productName, $orderProductAmount);
        $stmt->execute();
        $stmt->close();
    }

   private $products; // Khai báo biến products ở đầu class

    // Constructor và các phương thức khác của class

    public function getByUserAccountId($userAccountId) {
    global $conn;
    $sql = "SELECT uop.*, p.product_name, p.product_thumbnail_image, p.product_price, p.product_discount, p.product_inventory
            FROM user_order_product AS uop
            INNER JOIN user_order AS uo ON uop.user_order_id = uo.user_order_id
            INNER JOIN product AS p ON uop.product_id = p.product_id
            WHERE uo.user_account_id = ? AND uo.is_processed = 0"; // Thêm điều kiện uo.is_processed = 0
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userAccountId);
    $stmt->execute();
    $result = $stmt->get_result();
    $this->products = $result->fetch_all(MYSQLI_ASSOC); // Gán kết quả vào biến products của class
    $stmt->close();
    return $this->products;
}


    public function getTotalPrice() {
        $totalPrice = 0;
		foreach ($this->products as $product) {
			$totalPrice += $product['order_product_amount'] * ($product['product_price'] - $product['product_discount']);
		}
        return $totalPrice;
    }

    public function getTotalAmount() {
        $totalAmount = 0;
		foreach ($this->products as $product) {
            $totalAmount += $product['order_product_amount'];
        }
        return $totalAmount;
    }


    public function updateOrderProductAmount($userOrderId, $productId, $newAmount) {
        global $conn;
        $sql = "UPDATE user_order_product 
                SET order_product_amount = ? 
                WHERE user_order_id = ? AND product_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iii", $newAmount, $userOrderId, $productId);
        $stmt->execute();
        $stmt->close();
    }

    public function deleteByUserOrderId($userOrderId) {
        global $conn;
        $sql = "DELETE FROM user_order_product WHERE user_order_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $userOrderId);
        $stmt->execute();
        $stmt->close();
    }

    public function deleteByProductId($productId) {
        global $conn;
        $sql = "DELETE FROM user_order_product WHERE product_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $productId);
        $stmt->execute();
        $stmt->close();
    }
    
    public function getUserOrderId($userAccountId) {
        global $conn;
        $sql = "SELECT user_order_id FROM user_order WHERE user_account_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $userAccountId);
        $stmt->execute();
        $stmt->bind_result($userOrderId);
        $stmt->fetch();
        $stmt->close();
        return $userOrderId;
    }

    
}
?>

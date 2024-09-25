<?php
 require_once("../connect.php");


class ProductRepository {
    public function insert($name, $price, $discount, $description, $thumbnail, $category_id, $product_inventory) {
        global $conn;
        $sql = "INSERT INTO product (product_name, product_price, product_discount, product_description, product_thumbnail_image, product_category_id, product_inventory) 
                VALUES ('$name', $price, $discount, '$description', '$thumbnail', $category_id, $product_inventory)";
        mysqli_query($conn, $sql);
        return mysqli_insert_id($conn); 
    }
	public function getAllCategories() {
    global $conn;
    $sql = "SELECT * FROM product_category";
    $result = mysqli_query($conn, $sql);
    $categories = array();
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $categories[] = $row;
        }
    }
    return $categories;
}
	public function getProductByName($searchTerm) {
        global $conn;
        $searchTerm = mysqli_real_escape_string($conn, $searchTerm); // Đảm bảo an toàn cho truy vấn SQL
        $sql = "SELECT * FROM product WHERE product_name LIKE '%$searchTerm%'";
        return mysqli_query($conn, $sql);
    }
	 public function getAllProductsByCategory($category_id) {
        global $conn;
        $sql = "SELECT p.*, pc.product_category_name 
                FROM product p 
                JOIN product_category pc ON p.product_category_id = pc.product_category_id 
                WHERE p.product_category_id = $category_id";
        return mysqli_query($conn, $sql);
    }
	
	public function getRelatedProducts($categoryId, $limit = 4) {
    global $conn;
    $sql = "SELECT p.*, pc.product_category_name 
            FROM product p 
            JOIN product_category pc ON p.product_category_id = pc.product_category_id 
            WHERE p.product_category_id = $categoryId 
            ORDER BY RAND() 
            LIMIT $limit";
    return mysqli_query($conn, $sql);
}


    public function getAll($limit) {
        global $conn;
        $sql = "SELECT p.*, pc.product_category_name 
                FROM product p 
                JOIN product_category pc ON p.product_category_id = pc.product_category_id 
                ORDER BY p.product_id DESC";
        if ($limit != null)
            $sql .= " LIMIT 0, $limit";
        return mysqli_query($conn, $sql);     
    }

    public function getById($id) {
    global $conn;
    $sql = "SELECT p.*, pc.product_category_name 
            FROM product p 
            JOIN product_category pc ON p.product_category_id = pc.product_category_id 
            WHERE p.product_id = $id";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    } else {
        return null; // Trả về null nếu không tìm thấy sản phẩm
    }
}

    public function deleteById($id) {
        global $conn;
        $sql = "DELETE FROM product WHERE product_id = $id";
        mysqli_query($conn, $sql);
    }

    public function update($id, $name, $price, $discount, $description, $thumbnail, $category_id, $product_inventory) {
        global $conn;
        $sql = "UPDATE product 
                SET product_name = '$name', 
                    product_price = $price, 
                    product_discount = $discount, 
                    product_description = '$description', 
                    product_thumbnail_image = '$thumbnail', 
                    product_category_id = $category_id 
					product_inventory = $product_inventory
                WHERE product_id = $id";
        mysqli_query($conn, $sql);  
    }

    public function getTotalCount() {
        global $conn;
        $query = "SELECT COUNT(*) as total FROM product";
        $result = mysqli_query($conn, $query);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            return $row['total'];
        } else {
            return 0;
        }
    }
	
	public function getProductImages($productId) {
		global $conn;
    	$sql = "SELECT * FROM product_image WHERE product_id = $productId";
    	return mysqli_query($conn, $sql);
	}
	

    public function getAllWithPagination($startIndex, $limit) {
        global $conn;
        $sql = "SELECT p.*, pc.product_category_name 
                FROM product p 
                JOIN product_category pc ON p.product_category_id = pc.product_category_id 
                ORDER BY p.product_id DESC 
                LIMIT $startIndex, $limit";
        return mysqli_query($conn, $sql);
    }
	
public function getCategoryByProductId($product_id) {
    global $conn;
    $sql = "SELECT pc.product_category_name 
            FROM product p 
            JOIN product_category pc ON p.product_category_id = pc.product_category_id 
            WHERE p.product_id = $product_id";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row['product_category_name'];
    } else {
        return "Không xác định"; // Hoặc giá trị mặc định khác
    }
}

}
?>

<?php
require_once("connect.php");

class ProductCategoryRepository {
    public function getAllCategories() {
        global $conn;
        $sql = "SELECT * FROM product_category";
        return mysqli_query($conn, $sql);
    }

    public function getCategoryById($id) {
        global $conn;
        $sql = "SELECT * FROM product_category WHERE product_category_id = $id";
        return mysqli_query($conn, $sql);
    }

    public function insertCategory($name, $description) {
        global $conn;
        $sql = "INSERT INTO product_category (product_category_name, product_category_description) 
                VALUES ('$name', '$description')";
        mysqli_query($conn, $sql);
        return mysqli_insert_id($conn);
    }

    public function updateCategory($id, $name, $description) {
        global $conn;
        $sql = "UPDATE product_category 
                SET product_category_name = '$name', 
                    product_category_description = '$description' 
                WHERE product_category_id = $id";
        mysqli_query($conn, $sql);
    }

    public function deleteCategory($id) {
        global $conn;
        $sql = "DELETE FROM product_category WHERE product_category_id = $id";
        mysqli_query($conn, $sql);
    }
}
?>

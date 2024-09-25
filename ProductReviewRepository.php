<?php
require_once("connect.php");

class ProductReviewRepository {
    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    public function insertReview($userAccountId, $productId, $reviewContent, $reviewOwner) {
        $reviewContent = $this->conn->real_escape_string($reviewContent);
        $reviewOwner = $this->conn->real_escape_string($reviewOwner);
        $query = "INSERT INTO product_review (user_account_id, product_id, product_review_content, review_owner) 
                  VALUES ($userAccountId, $productId, '$reviewContent', '$reviewOwner')";
        return $this->conn->query($query);
    }

    public function getAllReviews() {
        $query = "SELECT * FROM product_review";
        $result = $this->conn->query($query);
        $reviews = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $reviews[] = $row;
            }
        }
        return $reviews;
    }

    public function getReviewById($reviewId) {
        $query = "SELECT * FROM product_review WHERE product_id = $reviewId";
        $result = $this->conn->query($query);
       $reviews = [];
        if ($result->num_rows > 0) {
             while ($row = $result->fetch_assoc()) {
                $reviews[] = $row;
            }
        }
        return $reviews;
    }

    public function deleteReview($reviewId) {
        $query = "DELETE FROM product_review WHERE product_review_id = $reviewId";
        return $this->conn->query($query);
    }
}
?>

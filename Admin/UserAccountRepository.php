<?php require_once("../connect.php");

class UserAccountRepository {
    public function insertUser($username, $password, $gender, $email, $phoneNumber, $address, $firstName, $lastName, $memberTier, $point) {
        global $conn;
        $sql = "INSERT INTO user_account (user_username, user_password, user_gender, user_email, user_phonenumber, user_address, user_firstname, user_lastname, user_member_tier, user_point) 
                VALUES ('$username', '$password', '$gender', '$email', '$phoneNumber', '$address', '$firstName', '$lastName', '$memberTier', $point)";
        mysqli_query($conn, $sql);
        return mysqli_insert_id($conn);
    }
	public function getAllUser() {
        global $conn;
        $sql = "SELECT * FROM user_account";
        return mysqli_query($conn, $sql);
    }

   public function getUserById($id) {
    global $conn;
    $sql = "SELECT * FROM user_account WHERE user_account_id = $id";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result); 
    } else {
        return null; 
    }
}

    public function getUserByUsername($username) {
        global $conn;
        $sql = "SELECT * FROM user_account WHERE user_username = '$username'";
        return mysqli_query($conn, $sql);
    }

    public function updateById($id, $username, $password, $gender, $email, $phone, $address, $firstname, $lastname) {
    global $conn;
    
    // Chuẩn bị câu lệnh SQL UPDATE
    $sql = "UPDATE user_account SET 
            user_username = '$username', 
            user_password = '$password', 
            user_gender = '$gender', 
            user_email = '$email', 
            user_phonenumber = '$phone', 
            user_address = '$address', 
            user_firstname = '$firstname', 
            user_lastname = '$lastname', 
            WHERE user_account_id = $id";
    
    if(mysqli_query($conn, $sql)) {
        return true; 
    } else {
        return false;
    }
}



    public function deleteUser($id) {
        global $conn;
        $sql = "DELETE FROM user_account WHERE user_account_id = $id";
        mysqli_query($conn, $sql);
    }
}
?>

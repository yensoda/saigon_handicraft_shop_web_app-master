<?php
class User {
    public $user_account_id;
    public $user_username;
    public $user_password;
    public $user_gender;
    public $user_email;
    public $user_phonenumber;
    public $user_address;
    public $user_firstname;
    public $user_lastname;
    public $user_member_tier;
    public $user_point;

    public function __construct($id, $username, $password, $gender, $email, $phonenumber, $address, $firstname, $lastname, $member_tier, $point) {
        $this->user_account_id = $id;
        $this->user_username = $username;
        $this->user_password = $password;
        $this->user_gender = $gender;
        $this->user_email = $email;
        $this->user_phonenumber = $phonenumber;
        $this->user_address = $address;
        $this->user_firstname = $firstname;
        $this->user_lastname = $lastname;
        $this->user_member_tier = $member_tier;
        $this->user_point = $point;
    }
}
?>
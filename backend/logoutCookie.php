<?php
if(isset($_COOKIE['user_username']) && isset($_COOKIE['user_password'])) {	
    setcookie('user_username','',time()-1314000,"/");
    setcookie('user_password','',time()-1314000,"/");
}
header('Location: ../layout.php');
?>
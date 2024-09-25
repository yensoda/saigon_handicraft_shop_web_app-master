<?php
    require_once("UserAccountRepository.php");
    $userRepository = new UserAccountRepository();
    $userRepository->deleteUser($_GET['id']);
    echo "<script>alert('Xóa thành công');
        window.location.href='UserList.php';
        </script>";
?>
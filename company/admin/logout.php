<?php
    // 引入設定檔
    include_once('../include/config.php');
    // 刪除所有 session
    session_destroy();

    header('location: '.URL.'admin/login.php');
?>
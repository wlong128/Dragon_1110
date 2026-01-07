<?php
    // 啟動 session 功能
    session_start();

    // 判斷 session 是否存在，若不存在則轉至登入頁
    if(empty($_SESSION['admin_name']) or empty($_SESSION['admin_account'])){
        header('location: login.php');
    }

    // 判斷 id 是否存在
    if(!empty($_GET['id'])) {
        $id = $_GET['id'];
    }else{
        echo '資料不存在';
        exit;
    }

    $host = 'localhost';      // 主機位址
    $db = 'dragon1101';        // 資料庫名稱
    $db_user = 'dragon1101';  // 帳號
    $db_pw = '1234';          // 密碼

    // 設定連線字串
    $conn = mysqli_connect($host, $db_user, $db_pw, $db);

    // 檢視連線結果
    // var_dump($conn);

    if($conn){
        // 設定 SQL 查詢指令
        $sql = "DELETE FROM product WHERE product_id = $id";
        // 向資料庫下指令並取回資料
        $datas = mysqli_query($conn, $sql);

        // 轉回清單頁
        header('location: product.php');
        
    }
?>
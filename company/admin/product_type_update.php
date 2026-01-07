<?php
    // 啟動 session 功能
    session_start();

    // 判斷 session 是否存在，若不存在則轉至登入頁
    if(empty($_SESSION['admin_name']) or empty($_SESSION['admin_account'])){
        header('location: login.php');
    }
    
    $id = $_POST['product_type_id'];
    $product_type = $_POST['product_type'];
    

    $host = 'localhost';      // 主機位址
    $db = 'dragon1101';        // 資料庫名稱
    $db_user = 'dragon1101';  // 帳號
    $db_pw = '1234';          // 密碼

    // 設定連線字串
    $conn = mysqli_connect($host, $db_user, $db_pw, $db);

    if($conn){
        // 改為使用 mysqli_prepare() 來執行指令較為安全
        $sql = "UPDATE product_type SET product_type = ? WHERE product_type_id = ?";

        // 向資料庫下指令並取回資料
        $datas = mysqli_prepare($conn, $sql);
        // 'sssss' 代表五個內容各別的資料型態
        // s -> 字串
        // i -> 整數
        // d -> 小數
        mysqli_stmt_bind_param(
            $datas,
            'si',
            $product_type,
            $id
        );
        // 確定執行綁定後的內容
        $check = mysqli_stmt_execute($datas);

        //  判斷是否新增成功
        if($check){
            // 強制轉址
            header('location: product_type.php');
        }
    }
?>
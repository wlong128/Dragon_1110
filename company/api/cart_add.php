<?php

    $m_id = $_POST['memberID'];
    $p_id = $_POST['productID'];
    // $m_id = 'dragon';
    // $p_id = 6;

    $host = 'localhost';      // 主機位址
    $db = 'dragon1101';        // 資料庫名稱
    $db_user = 'dragon1101';  // 帳號
    $db_pw = '1234';          // 密碼

    // 設定連線字串
    $conn = mysqli_connect($host, $db_user, $db_pw, $db);

    if($conn){
        $sql = "SELECT * FROM cart WHERE member_id = ? AND product_id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $m_id, $p_id);
        mysqli_stmt_execute($stmt);
        // 判斷如果有找到資料則抓取 cart_count 的值
        $result = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($result)){
            // 已經加入過的商品，使用更新資料`
            $cart_count = $row['cart_count']+1;
            $sql = "UPDATE cart SET cart_count = ? WHERE member_id = ? AND product_id = ?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "iss", $cart_count, $m_id, $p_id);
            mysqli_stmt_execute($stmt);
        }else{
            // 沒有加入過的商品，使用新增資料
            $cart_count = 0;
            $sql = "INSERT INTO cart (member_id, product_id) VALUES (?, ?)";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "ss", $m_id, $p_id);
            mysqli_stmt_execute($stmt);
        }
    
        

        // 預計JSON格式 $temp={data:[{0},{1},{2}...],msg:success}
        $temp['data']='加入購物車成功';
        $temp['msg']='success';
        // 將 $temp 轉換為 JSON 字串，並儲存在 $api 中
        $api = json_encode($temp, JSON_UNESCAPED_UNICODE);
        // 將 API 列印在頁面上
        echo $api;
    }
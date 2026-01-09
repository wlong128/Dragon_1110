<?php

    $member_id = $_POST['member_id'];

    $host = 'localhost';      // 主機位址
    $db = 'dragon1101';        // 資料庫名稱
    $db_user = 'dragon1101';  // 帳號
    $db_pw = '1234';          // 密碼

    // 設定連線字串
    $conn = mysqli_connect($host, $db_user, $db_pw, $db);

    // 檢視連線結果
    // echo var_dump($conn);

    if($conn){
        $sql = "SELECT * FROM member WHERE member_id = '$member_id'";

        // 向資料庫下指令並取回資料
        $datas = mysqli_query($conn, $sql);

        // 取得每筆資料放進 $row 中 (一維陣列)
        $i = 0;
        if($row = mysqli_fetch_assoc($datas)){
            // 組合出 $rows 的資料表格 (二維陣列)
            $rows['id']=$row['member_id'];
            $rows['pw']=$row['member_pw'];
            $rows['name']=$row['member_name'];
            $rows['tel']=$row['member_tel'];
            $rows['address']=$row['member_address'];
        }
        // 預計JSON格式 $temp={data:[{0},{1},{2}...],msg:success}
        $temp['data']=$rows;
        $temp['msg']='success';
        // 將 $temp 轉換為 JSON 字串，並儲存在 $api 中
        $api = json_encode($temp, JSON_UNESCAPED_UNICODE);
        // 將 API 列印在頁面上
        echo $api;
    }
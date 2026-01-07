<?php
    $type_id = isset($_GET['type']) ? $_GET['type'] : '%';

    $host = 'localhost';      // 主機位址
    $db = 'dragon1101';        // 資料庫名稱
    $db_user = 'dragon1101';  // 帳號
    $db_pw = '1234';          // 密碼

    // 設定連線字串
    $conn = mysqli_connect($host, $db_user, $db_pw, $db);

    // 檢視連線結果
    // echo var_dump($conn);

    if($conn){
        //echo 'conn done';

        // 分頁功能 LIMIT 有兩種寫法
        // 1:LIMIT n，這是取最得前面的 n 筆資料
        // 2:LIMIT m,n，這是先省略 m 筆資料，再取得最前面的 n 筆資料
        // 也就是可以把 n 當成每頁取得筆數，m/每頁筆數+1=目前的頁數
        $n = 20; // 每頁取得20筆
        // 三元運算子 (條件)?值1:值2
        $m = isset($_GET['p']) ? ($_GET['p'] - 1) * $n : 0;  // 目前是第1頁 $m = (目前頁數-1)*每頁筆數
        $sql = "SELECT * FROM product INNER JOIN product_type USING(product_type_id) WHERE product_posted = '上架' AND product_type_id LIKE '$type_id' LIMIT $m, $n";

        // 向資料庫下指令並取回資料
        $datas = mysqli_query($conn, $sql);

        // 取得每筆資料放進 $row 中 (一維陣列)
        $i = 0;
        while($row = mysqli_fetch_assoc($datas)){
            // 組合出 $rows 的資料表格 (二維陣列)
            $rows[$i]['id']=$row['product_id'];
            $rows[$i]['sn']=$row['product_sn'];
            $rows[$i]['name']=$row['product_name'];
            $rows[$i]['img']=$row['product_img'];
            // $rows[$i]['content']=$row['product_content'];
            $rows[$i]['price']=$row['product_price'];
            // $rows[$i]['posted']=$row['product_posted'];
            // 增加1列
            $i++;
        }
        // 預計JSON格式 $temp={data:[{0},{1},{2}...],msg:success}
        $temp['data']=$rows;
        $temp['msg']='success';
        // 將 $temp 轉換為 JSON 字串，並儲存在 $api 中
        $api = json_encode($temp, JSON_UNESCAPED_UNICODE);
        // 將 API 列印在頁面上
        echo $api;
    }
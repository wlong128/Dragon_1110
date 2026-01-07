<?php

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
        $n = 9; // 每頁取得15筆
        // 三元運算子 (條件)?值1:值2
        $m = isset($_GET['p']) ? ($_GET['p'] - 1) * $n : 0;  // 目前是第1頁 $m = (目前頁數-1)*每頁筆數
        
        // 取得 news 全部資料
        $sql = "SELECT * FROM news";

        // 向資料庫下指令並取回資料
        $datas = mysqli_query($conn, $sql);
        // 取得資料總筆數
        $r = mysqli_num_rows($datas);
        // 顯示總筆數
        // echo 'Total Rows: '.$r.'<br>';
        // 計算總頁數， ceil() 函數為無條件進位
        $pages = ceil($r / $n);
        //echo 'Total Pages: '.$pages.'<br>';

        // 組合出 news 分頁 JSON 資料
        $temp['data']=$pages;
        $temp['msg']='success';
        $api = json_encode($temp, JSON_UNESCAPED_UNICODE);
        echo $api;

        // 取得每筆資料放進 $row 中 (一維陣列)
        // $i = 0;
        // while($row = mysqli_fetch_assoc($datas)){
        //     // 組合出 $rows 的資料表格 (二維陣列)
        //     $rows[$i]['id']=$row['news_id'];
        //     $rows[$i]['title']=$row['news_title'];
        //     $rows[$i]['img']=$row['news_img'];
        //     // $rows[$i]['content']=$row['news_content'];
        //     $rows[$i]['date']=$row['news_created'];
        //     // $rows[$i]['poster']=$row['news_poster'];
        //     // 增加1列
        //     $i++;
        // }
        // // 預計JSON格式 $temp={data:[{0},{1},{2}...],msg:success}
        // $temp['data']=$rows;
        // $temp['msg']='success';
        // // 將 $temp 轉換為 JSON 字串，並儲存在 $api 中
        // $api = json_encode($temp, JSON_UNESCAPED_UNICODE);
        // // 將 API 列印在頁面上
        // echo $api;
    }
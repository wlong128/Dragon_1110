<?php
    if(!empty($_POST['account'])){
        $account = $_POST['account'];
    }
    if(!empty($_POST['pw'])){
        $pw = $_POST['pw'];
    }

    $host = 'localhost';      // 主機位址
    $db = 'dragon1101';        // 資料庫名稱
    $db_user = 'dragon1101';  // 帳號
    $db_pw = '1234';          // 密碼

    // 設定連線字串
    $conn = mysqli_connect($host, $db_user, $db_pw, $db);

    // 檢視連線結果
    // echo var_dump($conn);

    if($conn){
        // 設定 SQL 查詢指令,查出對應的帳號資料
        $sql = "SELECT * FROM admin WHERE admin_account = '$account'";
        // 向資料庫下指令並取回資料
        $datas = mysqli_query($conn, $sql);

        // 如果有該帳號
        if(mysqli_num_rows($datas)>0){
            $row = mysqli_fetch_assoc($datas);
            if(password_verify($pw, $row['admin_pw'])){
                echo '登入成功';
            }else{
                echo '登入錯誤，請檢查密碼';
            }
        }else{
            echo '查無此帳號！';
        }
    }
?>
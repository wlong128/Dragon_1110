<?php
    // 啟動 session 功能
    session_start();

    // 判斷 session 是否存在，若不存在則轉至登入頁
    if(empty($_SESSION['admin_name']) or empty($_SESSION['admin_account'])){
        header('location: login.php');
    }
    
    $id = $_POST['product_id'];
    $sn = $_POST['product_sn'];
    $type = $_POST['product_type_id'];
    $name = $_POST['product_name'];
    $content = $_POST['product_content'];
    $price = $_POST['product_price'];
    $posted = $_POST['product_posted'];$
    // 由於編輯功能不一定會上傳照片，所以必須將檔案名稱抓取原本務舊檔名
    $filename = $_POST['product_img_old'];

    // 宣告使用台北時間來當日期的計算
    date_default_timezone_set("Asia/Taipei");
    // 利用日期產生不會重覆的檔案名稱
    $num = date('YmdHis');

    // 設定可允許的檔案類型陣列
    $allow = ['jpg','jpeg','gif','png','webp'];
    if(!empty($_FILES['product_img'])){
        if($_FILES['product_img']['error']>0){
            echo '檔案錯誤：'.$_FILES['product_img']['error'];
        }else{
            echo '有檔案：'.$_FILES['product_img']['name'].
                 '('.$_FILES['product_img']['tmp_name'].')'.
                 $_FILES["product_img"]["type"];
            // 取得原始檔案的副檔名
            $ext = pathinfo($_FILES['product_img']['name'], PATHINFO_EXTENSION);
            // 判斷副檔名是否為允許的檔案類型
            if(in_array($ext, $allow)){
                // 使用日期組合出不重覆的檔案名稱(存進 product_img 的資料為 $filename
                $filename = $num.'.'.$ext;
                // 檔上傳至暫存目錄的檔案移至網站指定的目錄內並更換為指定檔案名稱
                move_uploaded_file($_FILES['product_img']['tmp_name'],'../upload/product/'.$filename);
            }else{
                // 強制結束 exit 以下所有PHP程式及網頁內容
                exit;
            }
        }
    }

    $host = 'localhost';      // 主機位址
    $db = 'dragon1101';        // 資料庫名稱
    $db_user = 'dragon1101';  // 帳號
    $db_pw = '1234';          // 密碼

    // 設定連線字串
    $conn = mysqli_connect($host, $db_user, $db_pw, $db);

    if($conn){
        // 改為使用 mysqli_prepare() 來執行指令較為安全
        $sql = "UPDATE product SET product_sn = ?, 
                                   product_type_id = ?, 
                                   product_name = ?, 
                                   product_img = ?, 
                                   product_content = ?, 
                                   product_price = ?, 
                                   product_posted = ? 
                               WHERE product_id = ?";

        // 向資料庫下指令並取回資料
        $datas = mysqli_prepare($conn, $sql);
        // 'sssss' 代表五個內容各別的資料型態
        // s -> 字串
        // i -> 整數
        // d -> 小數
        mysqli_stmt_bind_param(
            $datas,
            'sisssisi',
            $sn,
            $type,
            $name,
            $filename,
            $content,
            $price,
            $posted,
            $id
        );
        // 確定執行綁定後的內容
        $check = mysqli_stmt_execute($datas);

        //  判斷是否新增成功
        if($check){
            // 強制轉址
            header('location: product.php');
        }
    }
?>
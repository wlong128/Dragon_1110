<?php
    // 讀取網址上的參數 username
    // 如網址：http://localhost/dragon_1110/14.php?username=Tom&q=巫宏鈞
    // 將 $name 預設為空值
    $name = '';
    // 判斷網址有參數 username 時，將值寫入 $name 中
    if(!empty($_GET['username'])) {
        $name = $_GET['username'];   // $name = 'Tom'
    }
    // 判斷網址有參數 q 時，將值寫入 $q 中
    // 將 $q 預設為空值
    $q = '';
    if(!empty($_GET['q'])){
        $q = $_GET['q'];             // $q = '巫宏鈞'
    }

    // $account = '';
    // if(!empty($_POST['account'])){
    //     $account = $_POST['account'];
    // }
    // 三元運算子的運用 (類似 if...else...  的判斷式)
    $account = !empty($_POST['account'])?$_POST['account']:'';
    
    // $pw = '';
    // if(!empty($_POST['pw'])){
    //     $pw = $_POST['pw'];
    // }
    $pw = empty($_POST['pw'])?'':$_POST['pw'];

    // 判斷帳號與密碼是否正確
    if($account == 'admin' and $pw == '0000') {
        $msg = '<p style="color:green">登入成功</p>';
    }else{
        $msg = '<p style="color:red">帳號或密碼錯誤，請重試！</p>';
    }
    
    // echo $account;
    // echo '<br>';
    // echo $pw;

    // 常數的宣告與使用
    define("URL" , "http://localhost/dragon_1110/" );
    // echo URL.'resume';

    // $a = 1;
    // echo $a++.'<br>';
    // echo $a;
    // 日期物件

    // 宣告使用台北時間來當日期的計算
    date_default_timezone_set("Asia/Taipei");
    // 美東時區
    // date_default_timezone_set("America/New_York");


    echo date('Y-m-d H:i:s').'<br>';
    // 利用日期產生不會重覆的檔案名稱
    $num = date('YmdHis');
    echo $num.'.jpg<br>';

    // 檔案接收
    $upload = '';
    // 設定可允許的檔案類型陣列
    $allow = ['jpg','jpeg','gif','png'];
    if(!empty($_FILES['upload'])){
        if($_FILES['upload']['error']>0){
            echo '檔案錯誤：'.$_FILES['upload']['error'];
        }else{
            echo '有檔案：'.$_FILES['upload']['name'].
                 '('.$_FILES['upload']['tmp_name'].')'.
                 $_FILES["upload"]["type"];
            // 取得原始檔案的副檔名
            $ext = pathinfo($_FILES['upload']['name'], PATHINFO_EXTENSION);
            // 判斷副檔名是否為允許的檔案類型
            if(in_array($ext, $allow)){
                // 使用日期組合出不重覆的檔案名稱
                $filename = $num.'.'.$ext;
                // 檔上傳至暫存目錄的檔案移至網站指定的目錄內並換回原始名稱
                move_uploaded_file($_FILES['upload']['tmp_name'],'upload/'.$filename);
            }else{
                // 強制結束 exit 以下所有PHP程式及網頁內容
                exit;
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p><input type="text" name="" id="" value="<?php echo $q ?>"></p>

    <!-- 會員登入表單 -->
    <form action="" method="post">
        帳號：<input type="text" name="account" id=""><br>
        密碼：<input type="password" name="pw" id=""><br>
        <input type="submit" value="登入">
    </form>

    <div><?php echo $msg ?></div>

    <p><a href="<?php echo URL.'resume'; ?>" target="_blank">前往頁面</a></p>

    <!-- 檔案上傳表單 -->
    <form action="" method="post" enctype="multipart/form-data">
        <!-- 透過 accept 設定可選擇上傳的檔案類型 -->
        <input type="file" name="upload" id="" accept=".jpeg,.jpg,.gif,.png">
        <input type="submit" value="上傳">
    </form>
</body>
</html>

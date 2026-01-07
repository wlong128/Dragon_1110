<?php
header('Content-Type: application/json; charset=utf-8');

// 取得所有 POST 資料
$postData = $_POST;

$id = $postData['member_id'];
$pw = $postData['member_pw'];  // 資料庫比對時會用到 password_verify()，所以不需要加密

$host = 'localhost';      // 主機位址
$db = 'dragon1101';        // 資料庫名稱
$db_user = 'dragon1101';  // 帳號
$db_pw = '1234';          // 密碼

// 設定連線字串
$conn = mysqli_connect($host, $db_user, $db_pw, $db);

if($conn){
	
	// 改為使用 mysqli_prepare() 來執行指令較為安全
	$sql = "SELECT * FROM member WHERE member_id = '$id'";

	// 向資料庫下指令並取回資料
	$datas = mysqli_query($conn, $sql);

    // 如果有該帳號
    if(mysqli_num_rows($datas)>0){
        $row = mysqli_fetch_assoc($datas);

        // password_verify(未加密的字串, $row['member_pw'])
        if(password_verify($pw, $row['member_pw'])){
            // echo '登入成功';
            $data['id'] = $row['member_id'];
            $data['name'] = $row['member_name'];

            // 回傳結構：包含 data 與 msg，並提供 success 布林以方便前端判斷
            $response = array(
                'data' => $data,
                'msg' => 'success'
            );

            echo json_encode($response, JSON_UNESCAPED_UNICODE);

        }else{
            $response = array(
                'data' => '登入錯誤，請檢查密碼',
                'msg' => 'errer'
            );
            echo json_encode($response, JSON_UNESCAPED_UNICODE);
        }
    }else{
        $response = array(
            'data' => '查無此帳號！',
            'msg' => 'errer'
        );
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
    }
}

?>
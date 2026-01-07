<?php
header('Content-Type: application/json; charset=utf-8');

// 取得所有 POST 資料
$postData = $_POST;

$id = $postData['member_id'];
$pw = password_hash($postData['member_pw'], PASSWORD_DEFAULT);
$name = $postData['member_name'];
$tel = $postData['member_tel'];
$address = $postData['member_address'];

$host = 'localhost';      // 主機位址
$db = 'dragon1101';        // 資料庫名稱
$db_user = 'dragon1101';  // 帳號
$db_pw = '1234';          // 密碼

// 設定連線字串
$conn = mysqli_connect($host, $db_user, $db_pw, $db);

if($conn){
	
	// 改為使用 mysqli_prepare() 來執行指令較為安全
	$sql = "INSERT INTO member (member_id, member_pw, member_name, member_tel, member_address) VALUES (?, ?, ?, ?, ?)";

	// 向資料庫下指令並取回資料
	$datas = mysqli_prepare($conn, $sql);
	// 'sssss' 代表五個內容各別的資料型態
	// s -> 字串
	// i -> 整數
	// d -> 小數
	mysqli_stmt_bind_param(
		$datas,
		'sssss',
		$id,
		$pw,
		$name,
		$tel,
		$address
	);
	// 確定執行綁定後的內容
	$check = mysqli_stmt_execute($datas);

	//  判斷是否新增成功
	if($check){
		// 回傳結構：包含 data 與 msg，並提供 success 布林以方便前端判斷
		$response = array(
			'data' => $postData,
			'msg' => 'success'
		);

		echo json_encode($response, JSON_UNESCAPED_UNICODE);
	}
}

?>
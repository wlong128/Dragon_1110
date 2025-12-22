<?php
    // 引入設定檔
    include_once('../include/config.php');

    // 判斷 session 是否存在，若不存在則轉至登入頁
    if(empty($_SESSION['admin_name']) or empty($_SESSION['admin_account'])){
        header('location: '.URL.'login.php');
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
        //echo 'conn done';

        // 設定 SQL 查詢指令
        $sql = 'SELECT * FROM news';
        // 向資料庫下指令並取回資料
        $datas = mysqli_query($conn, $sql);
        
    }
?>
<!doctype html>
<html lang="en">

<head>
    <title>新聞管理</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous" />
</head>

<body>
    <header>
        <?php include_once(dirname(__DIR__).'/navbar.php') ?>
        <div class="container pt-5">
            <h1>新聞管理</h1>
        </div>
    </header>
    <main>
        <div class="container pt-5">
            <div class="row">
                <div class="col-12 text-end pb-3">
                    <a href="news_post.php" class="btn btn-info btn-sm">新增</a>
                </div>
                <div class="col-12">
                    <table class="table table-bordered">
                        <tr>
                            <th>編號</th>
                            <th>新聞標題</th>
                            <th width="100">焦點圖片</th>
                            <!-- <th>新聞內容</th> -->
                            <th>新聞日期</th>
                            <th>發佈人</th>
                            <th>功能</th>
                        </tr>
                        <?php
                            // 先判斷是否有資料
                            if(mysqli_num_rows($datas)>0){
                                // 將資料表的內容一筆筆抓到 $row 中
                                while($row = mysqli_fetch_assoc($datas)){
                                    echo '<tr>';
                                    echo '<td>'.$row['news_id'].'</td>';
                                    echo '<td><a href="../news_content.php?id='.$row['news_id'].
                                          '">'.$row['news_title'].'</a></td>';
                                    echo '<td><img class="img-fluid" src="../upload/news/'.
                                            $row['news_img'].
                                            '" alt=""></td>';
                                    // echo '<td>'.$row['news_content'].'</td>';
                                    echo '<td>'.$row['news_created'].'</td>';
                                    echo '<td>'.$row['news_poster'].'</td>';
                                    echo '<td><a href="16-2.php?id='.$row['news_id'].'" class="btn btn-info">編輯</a>';
                                    // 製作 刪除 按鈕，並傳送新聞編號給 del(id,title) 函數
                                    echo '<btn onclick="del('.$row['news_id'].',\''.$row['news_title'].'\')" class="btn btn-danger">刪除</btn></td>';
                                    echo '</tr>';
                                }
                            }
                        ?>
                    </table>
                    
                </div>
            </div>
        </div>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>

    <script>
        function del(id,title) {
            // 顯示確認視窗
            if(confirm("您確定要刪除「"+title+"」嗎？")){
                // 指定轉址
                window.location.href = '17-2.php?id='+id;
            }
        }
    </script>
</body>

</html>
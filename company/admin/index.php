<?php
    // 引入設定檔
    include_once('../include/config.php');

    // 判斷 session 是否存在，若不存在則轉至登入頁
    if(empty($_SESSION['admin_name']) or empty($_SESSION['admin_account'])){
        header('location: '.URL.'login.php');
    }
?>
<!doctype html>
<html lang="en">

<head>
    <title>管理後台</title>
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
            
        </div>
    </header>
    <main>
        <div class="container pt-5">
            <div class="row">
                管理後台
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
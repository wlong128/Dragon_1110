<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <header>
            <div class="container">
                <h1>第13堂</h1>
            </div>
        </header>
        <main>
            <div class="container">
                <h2>什麼是 XAMPP </h2>
                <p>
                    XAMPP 是一個免費且開源的跨平台網頁伺服器解決方案堆疊包，由 Apache Friends
                    提供。它主要用於在本地電腦上設置和測試 PHP 網頁應用程式，無需連接到互聯網。
                    XAMPP 包含了 Apache HTTP 伺服器、MySQL（或 MariaDB）資料庫、PHP 和 Perl 等組件，使開發人員能夠輕鬆地建立和測試動態網站和應用程式。
                </p>
                <ul>
                    <li>X - 跨系統 Linux、Mac、Windows</li>
                    <li>A - Apache Web 伺服器</li>
                    <li>M - Mysql 或 MariaDB 資料庫</li>
                    <li>P - PHP 編輯器</li>
                    <li>P - Perl</li>
                </ul>
                <p>因為我們要開始寫PHP程式，而PHP程式需要有編譯器轉成機器語言給伺服器看</p>
                <p>而伺服器要把處理好的內容轉成HTML給瀏覽器，所以需要有 Apache</p>
                <p>如果要將使用表送出的表單內容儲存，則需要透過PHP的語法將資料儲存至資料庫，所以需要 MySQL 資料庫</p>

                <h2>使用 PHP 輸出字串</h2>
                <pre>
&lt;?php
    echo "Hello World!";
?&gt;
                </pre>
                <?php
                    echo '<p class="text-danger">Hello World!</p>';
                ?>
            </div>
        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>

<?php
    session_start();
    session_destroy();
    echo '1234';
    echo '<br>';
    echo password_hash('1234', PASSWORD_DEFAULT);
?>
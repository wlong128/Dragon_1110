<?php
    // session_start();
    // session_destroy();
    // echo '1234';
    // echo '<br>';
    // echo password_hash('1234', PASSWORD_DEFAULT);

    $pw = "$2y$10$IxEZ4MdGPfX/.9ARr2uquOE2CukxZJvMnX3rMxIQPbVzTrzo7jUha";
    $input_pw ="$2y$10$Hvf.33DVcXh0MnWEtBLAbePC8zW9PjqqxZxBgqPhEDU5BGNmj6Pj.";


    echo password_verify($pw, $input_pw);
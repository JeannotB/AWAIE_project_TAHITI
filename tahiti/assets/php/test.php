<?php

    $test =  password_hash("a",PASSWORD_BCRYPT);
    $test2 = password_hash("a",PASSWORD_BCRYPT);
    echo password_verify("a",'$2y$10$fBdKJCy1jKR03InQB0KbjO.0pqtb5ou7KTbMDMRqBuPYeYeWjdH1.');

    echo $a/0;
?>
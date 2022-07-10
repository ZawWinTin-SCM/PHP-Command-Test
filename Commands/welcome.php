<?php

if (count($_SERVER['argv']) >= 3) {
    echo "Welcome ";
    foreach ($_SERVER['argv'] as $key => $value) {
        if ($key >= 2) {
            if ($key == 2) {
                echo $value;
                continue;
            }
            echo " & {$value}";
        }
    }
    echo " !";
} else {
    echo "Please add one more paramater !";
}

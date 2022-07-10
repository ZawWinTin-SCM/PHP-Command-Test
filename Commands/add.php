<?php

if (count($_SERVER['argv']) >= 4) {
    $result = 0;
    $is_valid = true;
    foreach ($_SERVER['argv'] as $key => $value) {
        if ($key >= 2) {
            if (!is_numeric($value)) {
                echo "{$value} is not a number.";
                $is_valid = false;
                break;
            }
            $result += $value;
        }
    }
    if ($is_valid) {
        echo $result;
    }
} else {
    echo "You need at least two numbers to add !";
}

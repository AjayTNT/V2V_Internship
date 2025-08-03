<?php

$number = 113;

if (isPrime($number)) {
    echo "$number is a Prime Number.";
} else {
    echo "$number is Not a Prime Number.";
}

function isPrime($num) {
    if ($num <= 1) return false;
    if ($num == 2) return true;

    for ($i = 2; $i <= sqrt($num); $i++) {
        if ($num % $i == 0) return false;
    }
    return true;
}
?>

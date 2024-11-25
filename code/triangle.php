<?php
function triangle($n) {
    for ($i = 1; $i <= $n; $i++) {
        echo str_repeat('*', $i) . "\n";
    }
    $n = isset($_GET['n']) ? (int)$_GET['n'] : 5;
}
?>
<?php

function tri_selection_valeur(array $t): array {
    $n = count($t);
    for ($i = 0; $i < $n - 1; $i++) { 
        $min = $i;
        for ($j = $i + 1; $j < $n; $j++) { 
            if ($t[$j] < $t[$min]) {
                $min = $j;
            }
        }
        if ($min != $i) {
            $temp = $t[$i];
            $t[$i] = $t[$min];
            $t[$min] = $temp;
        }
    }
    return $t; 
}

function tri_selection_reference(array &$t): void {
    $n = count($t); 
    for ($i = 0; $i < $n - 1; $i++) { 
        $min = $i;
        for ($j = $i + 1; $j < $n; $j++) { 
            if ($t[$j] < $t[$min]) {
                $min = $j;
            }
        }
        
        if ($min != $i) {
            $temp = $t[$i];
            $t[$i] = $t[$min];
            $t[$min] = $temp;
        }
    }
}
?>
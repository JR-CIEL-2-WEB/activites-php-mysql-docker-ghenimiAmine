<?php
function moyenne($tab) {
    if (count($tab) === 0) {
        return 0; 
    }
    
    $somme = array_sum($tab);
    return $somme / count($tab);
}
?>

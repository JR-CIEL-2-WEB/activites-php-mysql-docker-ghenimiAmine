<?php
include 'statistique.php';
$tab = [15, 12, 9]; 
$moyenneNotes = moyenne($tab);
echo "La moyenne des notes est : " . $moyenneNotes;
?>

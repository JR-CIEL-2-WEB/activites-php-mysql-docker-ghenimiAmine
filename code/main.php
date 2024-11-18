<?php
include 'statistique.php';
$tab = [15, 12, 9]; 
$moyenneNotes = moyenne($tab);
echo "La moyenne des notes est : " . $moyenneNotes . "<br>";

mediane([2007, 2002, 2003, 2005, 2020, 2016, 2011]);
mediane([1500, 4500, 2200, 1500, 3300, 1800,1700, 2000,4000]);
?>

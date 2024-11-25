<?php
include 'statistique.php';
include 'triangle.php';
include 'read_tab.php';
include 'tri_selection.php';


$tab = [15, 12, 9]; 
$moyenneNotes = moyenne($tab);
echo "La moyenne des notes est : " . $moyenneNotes . "<br>";

mediane([2007, 2002, 2003, 2005, 2020, 2016, 2011]);
mediane([1500, 4500, 2200, 1500, 3300, 1800,1700, 2000,4000]);

echo "\n";

echo "Tri du premier tableau :\n";
$tableau1 = [22, 13, 9, 50, 70];
$tableau1_trie = tri_selection_valeur($tableau1);
afficher_tableau_valeur($tableau1_trie);

echo "\n";


echo "Tri du deuxième tableau :\n";
$tableau2 = [20, 37, 12, 40, 56, 8];
tri_selection_reference($tableau2);
afficher_tableau_reference($tableau2);

echo "\n";


echo "Affichage du triangle :\n";
triangle(10);

echo "</pre>";
?>

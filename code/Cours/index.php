<?php
// Inclure la configuration de la base de données
include_once 'config.php';

// Fonction pour calculer la moyenne des salaires
function moyenne($tab) {
    if (count($tab) === 0) {
        return 0; 
    }
    
    $somme = array_sum($tab);
    return $somme / count($tab);
}

// Fonction pour calculer la médiane des salaires
function mediane(array $listes) {
    sort($listes);
    $nb_elements = count($listes);
    if ($nb_elements % 2 == 0) {
        $milieu = ($listes[$nb_elements / 2 - 1] + $listes[$nb_elements / 2]) / 2;
    } else {
        $milieu = $listes[floor($nb_elements / 2)];
    }
    echo "La médiane est : " . $milieu . " €<br>";
}

// Récupérer les salaires depuis la base de données
try {
    $query = "SELECT salaire FROM employes"; // Remplacez par votre table réelle
    $stmt = $pdo->query($query);
    $salaires = [];
    
    // Remplir le tableau avec les salaires
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $salaires[] = $row['salaire'];
    }

    // Vérifier si des salaires ont été récupérés
    if (!empty($salaires)) {
        // Calcul de la moyenne des salaires
        $moyenne = moyenne($salaires);
        echo "La moyenne des salaires est : " . $moyenne . " €<br>";
        
        // Calcul de la médiane des salaires
        mediane($salaires);
    } else {
        echo "Aucun salaire trouvé dans la base de données.<br>";
    }
} catch (PDOException $e) {
    echo "Erreur lors de la récupération des salaires : " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcul des Salaires</title>
</head>
<body>
    <h1>Calcul de la Moyenne et de la Médiane des Salaires</h1>

</body>
</html>

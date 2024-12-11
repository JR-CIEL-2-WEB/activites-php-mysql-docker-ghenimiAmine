<?php
include 'statistique.php';
include 'triangle.php';
include 'read_tab.php';
include 'tri_selection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data['t']) && is_array($data['t'])) {
        $tab = $data['t'];

        // Envoyer la liste brute si elle est demandée (si -1 est ajouté côté client)
        if (in_array(-1, $tab, true)) {
            $response = [
                'rawArray' => $tab
            ];
            header('Content-Type: application/json');
            echo json_encode($response);
            exit;
        }

        // Tri du tableau reçu
        $tabTrie = tri_selection_valeur($tab);

        // Création de deux autres tableaux fictifs pour concaténation
        $tableau1 = [2007, 2002, 2003, 2005, 2020, 2016, 2011];
        $tableau2 = [1500, 4500, 2200, 1500, 3300, 1800, 1700, 2000, 4000];

        // Concaténer et trier les tableaux
        $merged = array_merge($tabTrie, tri_selection_valeur($tableau1), tri_selection_valeur($tableau2));
        sort($merged);

        // Calcul de la médiane
        $count = count($merged);
        $median = ($count % 2 === 0)
            ? ($merged[$count / 2 - 1] + $merged[$count / 2]) / 2
            : $merged[floor($count / 2)];

        // Préparer la réponse JSON
        $response = [
            'sortedArray' => $tabTrie,
            'concatenatedArray' => $merged,
            'mediane' => $median
        ];

        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    } else {
        http_response_code(400);
        echo json_encode(['error' => 'Données invalides']);
        exit;
    }
}
?>

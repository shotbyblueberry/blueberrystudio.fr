<?php

function printArticlesList() { 
    $pdo = new PDO('mysql:host=CONTENT_REMOVED_FOR_SECURITY_PURPOSES;dbname=CONTENT_REMOVED_FOR_SECURITY_PURPOSES', 'CONTENT_REMOVED_FOR_SECURITY_PURPOSES', 'CONTENT_REMOVED_FOR_SECURITY_PURPOSES');
    $stmt = $pdo->prepare('SELECT * FROM articles');
    $stmt->execute();
    $rows = $stmt->fetchAll();

    foreach ($rows as $row) {
        $id = $row['Id'];
        echo $id . ': ' . $row['Position']  . ' - ' . $row['Categorie'] . ' - ' . $row['Auteur'] . ' - ' . $row['TitreEN'] . '<br>';
        echo '<img src="./'.getArticlesValue('URLImage', $id).'" id="bgPrev" alt="articleImage">';
        echo '<br>';
    }

    $stmt->closeCursor();
}
?>
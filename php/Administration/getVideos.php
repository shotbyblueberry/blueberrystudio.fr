<?php

function printVideosList() { 
    $pdo = new PDO('mysql:host=CONTENT_REMOVED_FOR_SECURITY_PURPOSES;dbname=CONTENT_REMOVED_FOR_SECURITY_PURPOSES', 'CONTENT_REMOVED_FOR_SECURITY_PURPOSES', 'CONTENT_REMOVED_FOR_SECURITY_PURPOSES');
    $stmt = $pdo->prepare('SELECT * FROM videos');
    $stmt->execute();
    $rows = $stmt->fetchAll();

    foreach ($rows as $row) {
        $id = $row['Id'];
        echo $id . ': ' . $row['Position'] . ' - ' . $row['Titre'] . ' - ' . $row['Artiste'] . ' - ' . $row['Date'] .'<br>';
        echo '<img src="./'.getVideosValue('URLImage', $id).'" id="bgPrev" alt="videoImage">';
        echo '<br>';
    }

    $stmt->closeCursor();
}
?>
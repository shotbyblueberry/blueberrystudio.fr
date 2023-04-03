<?php
function printNewsletterRegister() { 
    $pdo = new PDO('mysql:host=CONTENT_REMOVED_FOR_SECURITY_PURPOSES;dbname=CONTENT_REMOVED_FOR_SECURITY_PURPOSES', 'CONTENT_REMOVED_FOR_SECURITY_PURPOSES', 'CONTENT_REMOVED_FOR_SECURITY_PURPOSES');
    $stmt = $pdo->prepare('SELECT * FROM newsletter');
    $stmt->execute();
    $rows = $stmt->fetchAll();

    foreach ($rows as $row) {
        echo $row['id'] . ': ' . $row['name'] . ' - ' . $row['email'] . ' - ' . $row['lang'] . '<br>';
    }

    $stmt->closeCursor();
    //$pdo = new PDO(null); // eqquivalent de PDO close.
}
?>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

include_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/dotenv.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/encryption.php';
initEnvironmentVars();

/**
 * Connects to the database using the provided credentials.
 *
 * @return PDO|false Returns a PDO object representing the database connection if successful, or false if the connection fails.
 */
function connectToDB()
{
    $dbHost = getenv('DB_HOST');
    $dbUser = getenv('DB_USER');
    $dbPass = getenv('DB_PASS');
    $dbName = getenv('DB_NAME');

    try {
        $conn = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        // echo "Connection failed: " . $e->getMessage();
        return false;
    }
}
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $requestData = json_decode(file_get_contents('php://input'), true);
    if (isset($requestData['action']) && $requestData['action'] === 'changeLang') {
        if (isset($requestData['lang'])) {
            $lang = $requestData['lang'];
            changeLang($lang);
        } else {
            echo json_encode(['error' => 'Language not specified']);
        }
    } else {
        // echo json_encode(['error' => 'Invalid action']);
    }
}

/**
 * Retrieves a value from a JSON file based on the given key.
 *
 * @param string $key The key to search for in the JSON file.
 * @param bool $print Whether to print the retrieved value or not. Default is true.
 * @return mixed|null The retrieved value from the JSON file, or null if the key is not found.
 */
function getValueFromJson($key, $print = true)
{
    if (!isset($_SESSION)) {
        session_start();
    }

    # Get session variable lang
    $lang = 'en';
    if (isset($_SESSION['lang'])) {
        $lang = $_SESSION['lang'];
    }

    # Get file name
    $callerFile = debug_backtrace()[0]['file'];
    $callerFileName = basename($callerFile);
    $file = substr($callerFileName, 0, -4); # Remove .php extension
    $callerDir = dirname($callerFile);

    # Get value from json file
    $filePath = $_SERVER['DOCUMENT_ROOT'] . "/lang/$lang/$file.json";
    try {
        if (!file_exists($filePath)) {
            throw new Exception("File not found: $filePath");
        }
        $json = file_get_contents($filePath);
        if ($json === false) {
            throw new Exception("Failed to read file: $filePath");
        }
        $data = json_decode($json, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception("JSON decode error: " . json_last_error_msg());
        }
    } catch (Exception $e) {
        print("Error: " . $e->getMessage());
        return null;
    }

    # Split the key and get the value
    $keys = explode('.', $key);
    $current = $data;
    foreach ($keys as $part) {
        if (isset($current[$part])) {
            $current = $current[$part];
        } else {
            print("Error: key '$key' not found in $callerDir/$filePath");
            return null;
        }
    }

    if ($print) {
        echo($current);
    }
    return $current;
}

/**
 * Changes the language of the session.
 *
 * @param string $lang The language code to set.
 * @return void
 */
function changeLang($lang)
{
    if (!isset($_SESSION)) {
        session_start();
    }
    $_SESSION['lang'] = $lang;
    exit();
}
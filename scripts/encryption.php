<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

include_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/dotenv.php';
initEnvironmentVars();

/**
 * Encrypts a given string using AES-256-CBC encryption algorithm.
 *
 * @param string $string The string to be encrypted.
 * @return string The encrypted string.
 */
function encrypt($string)
{
    $key = getenv('ENCRYPTION_KEY');
    $cipher = 'AES-256-CBC';
    $ivLength = openssl_cipher_iv_length($cipher);
    $iv = openssl_random_pseudo_bytes($ivLength);
    $encrypted = openssl_encrypt($string, $cipher, $key, OPENSSL_RAW_DATA, $iv);
    $encryptedString = base64_encode($iv . $encrypted);
    return $encryptedString;
}

/**
 * Decrypts an encrypted string using AES-256-CBC encryption.
 *
 * @param string $encryptedString The encrypted string to decrypt.
 * @return string The decrypted string.
 */
function decrypt($encryptedString)
{
    $key = getenv('ENCRYPTION_KEY');
    $cipher = 'AES-256-CBC';
    $ivLength = openssl_cipher_iv_length($cipher);
    $data = base64_decode($encryptedString);
    $iv = substr($data, 0, $ivLength);
    $encrypted = substr($data, $ivLength);
    $decrypted = openssl_decrypt($encrypted, $cipher, $key, OPENSSL_RAW_DATA, $iv);
    return $decrypted;
}
?>
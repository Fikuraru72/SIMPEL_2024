<?php

require 'vendor/autoload.php';

use Defuse\Crypto\Key;

// Generate a new random key
$key = Key::createNewRandomKey();

// Output the key to a string and save it in a format that you can easily use
$keyAscii = $key->saveToAsciiSafeString();

echo 'Your new encryption key: ' . $keyAscii . PHP_EOL;

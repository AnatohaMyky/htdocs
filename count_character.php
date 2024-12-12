<?php
// php count_character.php a
if (php_sapi_name() == "cli") {
    if ($argc < 2) {
        echo "Використання: php count_character.php <символ>\n";
        exit(1);
    }
    $character = $argv[1];
} else {
    $character = isset($_GET['char']) ? $_GET['char'] : '';
    if (empty($character)) {
        echo "Будь ласка, надайте символ через параметр 'char' у запиті GET.\n";
        exit;
    }
}

if (mb_strlen($character, 'UTF-8') !== 1) {
    echo "Помилка: Будь ласка, надайте рівно один символ.\n";
    exit;
}

$url = "https://uk.wikipedia.org/";

try {
    $pageContent = file_get_contents($url);
    if ($pageContent === FALSE) {
        throw new Exception("Неможливо отримати вміст з $url.");
    }

    $pageContent = mb_strtolower($pageContent, 'UTF-8');
    $character = mb_strtolower($character, 'UTF-8');

    $count = mb_substr_count($pageContent, $character, 'UTF-8');

    echo "Символ '{$character}' зустрічається {$count} разів на головній сторінці Wikipedia.\n";
} catch (Exception $e) {
    echo "Помилка: " . $e->getMessage() . "\n";
    exit(1);
}
?>

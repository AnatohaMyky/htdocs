<?php
if (php_sapi_name() == "cli") {
    if ($argc < 2) {
        echo "Використання: php count_character.php <символ>\n";
        exit(1);
    }
    $character = $argv[1];
} else {
    $character = isset($_GET['char']) ? $_GET['char'] : '';
    if (empty($character)) {
        echo "Будь ласка, надайте символ через параметр 'char' у запиті GET.";
        exit;
    }
}

if (strlen($character) !== 1) {
    echo "Помилка: Будь ласка, надайте рівно один символ.";
    exit;
}

$url = "https://www.wikipedia.org/";

$pageContent = @file_get_contents($url);
if ($pageContent === FALSE) {
    echo "Помилка: Неможливо отримати вміст з $url.";
    exit;
}

$count = substr_count($pageContent, $character);

echo "Символ '{$character}' зустрічається {$count} разів на головній сторінці Wikipedia.\n";
?>

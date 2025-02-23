<?php
$stopWords = [
    "the", "and", "in", "of", "to", "a", "is", "that", "it", "on", "for", "with", "as", "this", 
    "but", "or", "are", "by", "was", "at", "be", "from", "not", "an", "have", "which", "you", "one"
];
function tokenizeText(string $text, array $stopWords): array {

    $text = strtolower($text);

    $text = preg_replace('/[^a-z\s]/', '', $text);

    $words = explode(" ", $text);

    return array_filter($words, function ($word) use ($stopWords) {
        return !empty($word) && !in_array($word, $stopWords);
    });
}
function calculateWordFrequency(array $words): array {
    return array_count_values($words);
}

function sortWordFrequency(array $wordFrequency, string $order): array {
    if ($order === "desc") {
        arsort($wordFrequency);
    } else {
        asort($wordFrequency);
    }
    return $wordFrequency;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $text = $_POST["text"] ?? "";
    $sortOrder = $_POST["sort"] ?? "desc";
    $limit = intval($_POST["limit"] ?? 10);

    if (empty(trim($text))) {
        echo "<p style='color: red;'>Error: No text provided. Please enter some text.</p>";
        exit;
    }

    $words = tokenizeText($text, $stopWords);
    $wordFrequency = calculateWordFrequency($words);
    $sortedFrequency = sortWordFrequency($wordFrequency, $sortOrder);

    $sortedFrequency = array_slice($sortedFrequency, 0, $limit, true);

    echo "<h2>Word Frequency Result</h2>";
    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr><th>Word</th><th>Frequency</th></tr>";
    foreach ($sortedFrequency as $word => $count) {
        echo "<tr><td>{$word}</td><td>{$count}</td></tr>";
    }
    echo "</table>";
    echo "<br><a href='index.php'>Return to Index</a>";

}
?>
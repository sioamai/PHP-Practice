<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Improving Code</title>
</head>
<body>
<?php
    function calculateTotalPrice(array $items): float
    {
        $total = 0;
        foreach ($items as $item) {
            $total += $item['price'];
        }
        return $total;
    }
    function formatString(string $input): string
    {
        $input = str_replace(' ', '', $input);
        return strtolower($input);
    }
    function checkEvenOrOdd(int $number): string
    {
        return ($number % 2 === 0) ? "$number is even number." : "$number is odd number.";
    }

    $items = [
        ['name' => 'Widget A', 'price' => 10],
        ['name' => 'Widget B', 'price' => 15],
        ['name' => 'Widget C', 'price' => 20]
    ];

    $totalPrice = calculateTotalPrice($items);
    echo "Total price: $" . $totalPrice . "\n";

    $originalString = "This is a poorly written program with little structure and readability.";
    $modifiedString = formatString($originalString);
    echo "Modified string: " . $modifiedString . "\n";

    $number = 42;
    echo checkEvenOrOdd($number) . "\n";

?>
</body>
</html>
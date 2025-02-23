<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Word Frequency Counter</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Word Frequency Counter</h1>
        <form action="process.php" method="post">
            <label for="text">Paste your text here:</label>
            <textarea id="text" name="text" rows="8" required></textarea>

            <label for="sort">Sort by:</label>
            <select id="sort" name="sort">
                <option value="asc">Ascending</option>
                <option value="desc">Descending</option>
            </select>

            <label for="limit">Number of words to display:</label>
            <input type="number" id="limit" name="limit" value="10" min="1">

            <input type="submit" value="Calculate Word Frequency">
        </form>
    </div>
</body>
</html>
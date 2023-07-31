<?php
// Conversion functions
function celsiusToFahrenheit($celsius)
{
    return ($celsius * 9/5) + 32;
}

function fahrenheitToCelsius($fahrenheit)
{
    return ($fahrenheit - 32) * 5/9;
}

// Handle form submissions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $celsius = isset($_POST["celsius"]) ? $_POST["celsius"] : null;
    $fahrenheit = isset($_POST["fahrenheit"]) ? $_POST["fahrenheit"] : null;

    if (isset($_POST["celsius_to_fahrenheit"]) && $celsius !== null) {
        $fahrenheit = celsiusToFahrenheit($celsius);
        echo "<h2>{$celsius} Celsius is equal to {$fahrenheit} Fahrenheit</h2>";
    } elseif (isset($_POST["fahrenheit_to_celsius"]) && $fahrenheit !== null) {
        $celsius = fahrenheitToCelsius($fahrenheit);
        echo "<h2>{$fahrenheit} Fahrenheit is equal to {$celsius} Celsius</h2>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Temperature Conversion Application</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Temperature Conversion Application</h1>
    <form method="post">
        <label for="celsius">Enter Temperature in Celsius:</label>
        <input type="number" name="celsius" id="celsius">
        <input type="submit" name="celsius_to_fahrenheit" value="Convert to Fahrenheit">
        <br>
        <label for="fahrenheit">Enter Temperature in Fahrenheit:</label>
        <input type="number" name="fahrenheit" id="fahrenheit">
        <input type="submit" name="fahrenheit_to_celsius" value="Convert to Celsius">
    </form>
    <br>
    <h2>Celsius to Fahrenheit Conversions</h2>
    <table>
        <tr>
            <th>Celsius</th>
            <th>Fahrenheit</th>
        </tr>
        <?php
        // Generate table rows with Celsius to Fahrenheit conversions
        for ($celsius = -50; $celsius <= 50; $celsius += 10) {
            $fahrenheit = celsiusToFahrenheit($celsius);
            echo "<tr><td>{$celsius}</td><td>{$fahrenheit}</td></tr>";
        }
        ?>
    </table>
</body>
</html>

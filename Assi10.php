<!DOCTYPE html>
<head>
    <title>Date Format Converter</title>
</head>
<body>
    <h1>Date Format Converter</h1>
    <form method="post">
        <label for="date">Enter a date (dd/mm/yyyy):</label>
        <input type="text" id="date" name="date" placeholder="dd/mm/yyyy" required>
        <button type="submit">Convert</button>
    </form>
</body>
</html>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $inputDate = $_POST['date'];

        try {
            // Use DateTime to parse and reformat the date
            $date = DateTime::createFromFormat('d/m/Y', $inputDate);
            // Check if the parsed date matches the original input to validate it
            if ($date && $date->format('d/m/Y') === $inputDate) {
                $convertedDate = $date->format('m/d/y');
                echo "<p>Original Date: $inputDate</p>";
                echo "<p>Converted Date: $convertedDate</p>";
            } else {
                echo "<p style='color:red;'>Invalid date format. Please use dd/mm/yyyy.</p>";
            }
        } catch (Exception $e) {
            echo "<p style='color:red;'>Error processing the date: {$e->getMessage()}</p>";
        }
    }
?>

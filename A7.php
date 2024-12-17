<?php
// Define the CSV file path
$csvFile = 'data.csv';

// Handle form submission to append data
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['new_value'])) {
    $newValue = trim($_POST['new_value']);

    // Append new value to the CSV file if not empty
    if (!empty($newValue)) {
        $file = fopen($csvFile, 'a'); // Open in append mode
        fputcsv($file, [$newValue]); // Add new value as a single row
        fclose($file); // Close the file
    }
}

// Read data from the CSV file
$data = [];
if (file_exists($csvFile)) {
    $file = fopen($csvFile, 'r'); // Open in read mode
    while (($row = fgetcsv($file)) !== false) {
        $data[] = implode(',', $row); // Combine row data into a string
    }
    fclose($file); // Close the file
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>CSV Viewer</title>
</head>
<body>
    <h1>CSV Data</h1>
    <pre>
<?php
if (!empty($data)) {
    echo implode("\n", $data); // Print all lines separated by newlines
} else {
    echo "No data available.";
}
?>
    </pre>
    <form action="" method="POST">
        <input type="text" name="new_value" placeholder="Enter new value" required>
        <button type="submit">Add Value</button>
    </form>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Text File Editor</title>
</head>
<body>
    <h1>Text File Editor</h1>
    <form action="" method="POST">
        <input type="text" name="text" placeholder="Enter your text here" required />
        <button type="submit" name="update">Update with this text</button>
        <button type="submit" name="append">Append this line</button>
    </form>

    <?php
    // Define the text file path
    $textFile = "example.txt";

    // Handle form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['text'])) {
        $inputText = trim($_POST['text']);

        try {
            if (isset($_POST['update'])) {
                // Open the file in write mode to overwrite
                $file = fopen($textFile, "w");
                fwrite($file, $inputText . "\n"); // Write input text to the file
                echo "<p style='color:green;'>File updated successfully.</p>";
            } elseif (isset($_POST['append'])) {
                // Open the file in append mode to add new content
                $file = fopen($textFile, "a");
                fwrite($file, $inputText . "\n"); // Append input text to the file
                echo "<p style='color:green;'>Text appended successfully.</p>";
            } else {
                throw new Exception("Invalid operation.");
            }
        } catch (Exception $e) {
            echo "<p style='color:red;'>Error: " . $e->getMessage() . "</p>";
        } finally {
            if (isset($file) && $file) {
                fclose($file); // Ensure the file is closed
            }
        }
    }

    // Display the contents of the file
    if (file_exists($textFile)) {
        echo "<h2>Contents of the File:</h2>";
        echo "<pre>" . htmlspecialchars(file_get_contents($textFile)) . "</pre>";
    } else {
        echo "<p>No file found. The file will be created upon submission.</p>";
    }
    ?>
</body>
</html>

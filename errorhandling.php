<!DOCTYPE html>
<html>
<head>
    <title>Multiplication with Exception Handling</title>
</head>
<body>
    <h1>Multiply Two Numbers</h1>
    <form method="POST">
        <label for="number1">Enter the first number:</label>
        <input type="text" name="number1" required>
        <br><br>
        <label for="number2">Enter the second number:</label>
        <input type="text" name="number2" required>
        <br><br>
        <button type="submit">Multiply</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = $_POST['number1'];
        $num2 = $_POST['number2'];

        try {
            // Check if both inputs are numeric
            if (!is_numeric($num1)) {
                throw new Exception("The first input is not a valid number.");
            }
            if (!is_numeric($num2)) {
                throw new Exception("The second input is not a valid number.");
            }

            // Perform multiplication
            $result = $num1 * $num2;
            echo "<h2>Result: $num1 × $num2 = $result</h2>";
        } 

        catch (Exception $e) {
            echo "<h2 style='color:red;'>Error: " . $e->getMessage() . "</h2>";
        } 
        
        finally {
            echo "<p>The execution has been completed.</p>";
        }
    }
    ?>
</body>
</html>

<!DOCTYPE html>
<head>
    <title>Encrypt</title>
</head>
<body>
    <h1>Encryption using OpenSSL</h1>
    <form method="POST">
        <label for="textbox1">Enter your string: </label>
        <input type="text" id="textbox1" name="textbox1" required>
        <br><br>
        <label for="textbox2">Enter your secret key: </label>
        <input type="text" id="textbox2" name="textbox2" required>
        <br><br>
        <button type="submit">Submit</button>
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $msg = htmlspecialchars($_POST['textbox1']);
            $key = htmlspecialchars($_POST['textbox2']);
            $cipher = "aes-256-cbc";
            $options = 0;
            $encryption_iv = "1234567891011121";

            $encrypted_msg = base64_encode(openssl_encrypt($msg, $cipher, $key, $options, $encryption_iv));

            echo "<br>";
            echo "Original text: " . $msg;
            echo "<br>";
            echo "Encrypted text: " . $encrypted_msg;
        }
    ?>
</body>
</html>

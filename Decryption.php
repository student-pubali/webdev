<!DOCTYPE html>
<head>
    <title>Decrypt</title>
</head>
<body>
    <h1>Decryption using OpenSSL</h1>
    <form method="POST">
        <label for="textbox1">Enter your encrypted string: </label>
        <input type="text" id="textbox1" name="textbox1" required>
        <br><br>
        <label for="textbox2">Enter your secret key: </label>
        <input type="text" id="textbox2" name="textbox2" required>
        <br><br>
        <button type="submit">Submit</button>
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $encrypted_msg = htmlspecialchars($_POST['textbox1']);
            $encrypted_msg = base64_decode($encrypted_msg);
            $key = htmlspecialchars($_POST['textbox2']);
            $cipher = "aes-256-cbc";
            $options = 0;
            $encryption_iv = "1234567891011121";

            $decrypted_msg = openssl_decrypt($encrypted_msg, $cipher, $key, $options, $encryption_iv);

            echo "<br>";
            echo "Encrypted text: " . base64_encode($encrypted_msg);
            echo "<br>";
            echo "Decrypted text: " . $decrypted_msg;
        }
    ?>
</body>
</html>

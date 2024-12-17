<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "pUk@5472#ka";
$database = "university";

// Connect to the database
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create the table (if not exists) and insert data
$sql_create_table = "
CREATE TABLE IF NOT EXISTS Cars (
    id INT AUTO_INCREMENT PRIMARY KEY,
    car_model VARCHAR(100) NOT NULL,
    launch_year INT NOT NULL
)";

if ($conn->query($sql_create_table) === TRUE) {
    echo "Table `Cars` created successfully or already exists.<br>";
} else {
    echo "Error creating table: " . $conn->error . "<br>";
}

// Insert data into the table
$sql_insert_data = "
INSERT IGNORE INTO Cars (car_model, launch_year) VALUES
('Toyota Corolla', 2000), ('Honda Civic', 2001), ('Ford Focus', 2002), ('Chevrolet Malibu', 2003),
('Nissan Altima', 2004), ('Volkswagen Jetta', 2005), ('Subaru Impreza', 2006), ('Mazda 3', 2007),
('Hyundai Elantra', 2008), ('Kia Optima', 2009), ('BMW 3 Series', 2010), ('Mercedes-Benz C-Class', 2011),
('Audi A4', 2012), ('Lexus IS', 2013), ('Acura TLX', 2014), ('Volvo S60', 2015), ('Jaguar XE', 2016),
('Alfa Romeo Giulia', 2017), ('Tesla Model 3', 2018), ('Porsche Macan', 2019), ('Toyota Camry', 2020),
('Honda Accord', 2021), ('Ford Mustang', 1995), ('Chevrolet Camaro', 1996), ('Nissan 370Z', 1997),
('Dodge Charger', 1998), ('Chrysler 300', 1999), ('Infiniti Q50', 2000), ('Lincoln MKZ', 2001),
('Cadillac ATS', 2002), ('Buick Regal', 2003), ('Mitsubishi Lancer', 2004), ('Suzuki Kizashi', 2005),
('Jeep Cherokee', 2006), ('Land Rover Discovery', 2007), ('Range Rover Evoque', 2008), ('Mini Cooper', 2009),
('Fiat 500', 2010), ('Peugeot 308', 2011), ('Renault Megane', 2012), ('Citroen C4', 2013), ('Opel Astra', 2014),
('Skoda Octavia', 2015), ('Seat Leon', 2016), ('Volkswagen Golf', 2017), ('Hyundai Sonata', 2018),
('Kia Sportage', 2019), ('Mazda CX-5', 2020), ('Subaru Forester', 2021), ('Honda CR-V', 1990),
('Toyota RAV4', 1991), ('Ford Escape', 1992), ('Chevrolet Equinox', 1993), ('Nissan Rogue', 1994),
('Jeep Compass', 1995), ('Land Rover Defender', 1996), ('Tesla Model Y', 2020), ('Toyota Supra', 1985),
('Mazda RX-7', 1986), ('Nissan Skyline', 1987), ('Porsche 911', 1988), ('BMW M3', 1989), ('Audi TT', 1990),
('Chevrolet Corvette', 1991), ('Dodge Viper', 1992), ('Ferrari F40', 1987), ('Lamborghini Countach', 1988),
('Aston Martin DB11', 2019), ('Pagani Zonda', 1999), ('Bugatti Veyron', 2005)";

if ($conn->query($sql_insert_data) === TRUE) {
    echo "Data inserted successfully or already exists.<br>";
} else {
    echo "Error inserting data: " . $conn->error . "<br>";
}

// 1. Fetch the first 50 entries
echo "<h3>First 50 Entries:</h3>";
$sql_first_50 = "SELECT * FROM Cars ORDER BY id ASC LIMIT 50";
$result_first_50 = $conn->query($sql_first_50);

if ($result_first_50->num_rows > 0) {
    while ($row = $result_first_50->fetch_assoc()) {
        echo "ID: " . $row['id'] . " - Car Model: " . $row['car_model'] . " - Launch Year: " . $row['launch_year'] . "<br>";
    }
} else {
    echo "No entries found.";
}

// 2. Fetch entries 20 to 50
echo "<h3>Entries 20 to 50:</h3>";
$sql_20_to_50 = "SELECT * FROM Cars LIMIT 19, 31";
$result_20_to_50 = $conn->query($sql_20_to_50);

if ($result_20_to_50->num_rows > 0) {
    while ($row = $result_20_to_50->fetch_assoc()) {
        echo "ID: " . $row['id'] . " - Car Model: " . $row['car_model'] . " - Launch Year: " . $row['launch_year'] . "<br>";
    }
} else {
    echo "No entries found.";
}

// 3. Fetch the last 50 entries
echo "<h3>Last 50 Entries:</h3>";
$sql_last_50 = "(SELECT * FROM Cars ORDER BY id DESC LIMIT 50) ORDER BY id ASC";
$result_last_50 = $conn->query($sql_last_50);

if ($result_last_50->num_rows > 0) {
    while ($row = $result_last_50->fetch_assoc()) {
        echo "ID: " . $row['id'] . " - Car Model: " . $row['car_model'] . " - Launch Year: " . $row['launch_year'] . "<br>";
    }
} else {
    echo "No entries found.";
}

// Close the database connection
$conn->close();
?>

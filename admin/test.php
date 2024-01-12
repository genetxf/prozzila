<?php
// Array of names
$names = [
    'Adam', 'Alex', 'Alice', 'Alice', 'Amelia', 'Arthur', 'Ava', 'Ava', 'Ava', 'Ava', 'Ava', 'Benjamin',
    'Benjamin', 'Benjamin', 'Catherine', 'Charlotte', 'Daniel', 'Daniel', 'Daniel', 'Dimitri', 'Eleanor',
    'Elena', 'Ella', 'Emily', 'Emma', 'Emma', 'Emma', 'Emma', 'Emma', 'Emma', 'Ethan', 'Ethan', 'Eva',
    'Eva', 'Eva', 'Eva', 'Felix', 'Finn', 'Finn', 'Grace', 'Hannah', 'Hans', 'Henry', 'Henry', 'Henry',
    'Henry', 'Isaac', 'Isaac', 'Isabella', 'Isabella', 'Jacob', 'John', 'Julia', 'Julia', 'Julia', 'Kevin',
    'Lara', 'Lena', 'Liam', 'Liam', 'Liam', 'Liam', 'Lily', 'Lily', 'Lucas', 'Luna', 'Maria', 'Mason',
    'Mateo', 'Matteo', 'Matteo', 'Max', 'Mia', 'Mia', 'Michael', 'Michael', 'Noah', 'Noah', 'Noah', 'Nora',
    'Oliver', 'Oliver', 'Oliver', 'Oliver', 'Oliver', 'Olivia', 'Olivia', 'Sarah', 'Sebastian', 'Sebastian',
    'Sophia', 'Sophia', 'Sophia', 'Sophia', 'Sophie', 'Sophie', 'Sophie', 'Sophie', 'Sophie', 'William'
];

include 'database.php';

foreach ($names as $name) {
    $randomNumber = mt_rand(10000, 99999); // Generating a random 5-digit number
    $firstName = $name . $randomNumber; // Concatenating the random number to the name

    // SQL query to insert into your table
    $sql = "INSERT INTO `employees`(`employee_id`) VALUES ('$firstName')";

    if ($conn->query($sql) === TRUE) {
        echo "Record created successfully<br>";
    } else {
        echo "Error creating record: " . $conn->error . "<br>";
    }
}

// Close the connection
$conn->close();
?>
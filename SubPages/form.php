<?php

$conn = mysqli_connect("localhost", "root", "", "mawlaservices");


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $country_code = $_POST['country_code'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    $service = $_POST['service'];

    $full_phone_number = $country_code . $phone_number;

    $sql = "INSERT INTO customer (first_name, last_name, phone_number, email, service)
    VALUES ('$first_name', '$last_name', '$full_phone_number', '$email', '$service')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

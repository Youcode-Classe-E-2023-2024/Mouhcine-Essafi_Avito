<?php
    include "connection.php";

// Check if the form is submitted
if (isset($_POST['submit'])) {
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
    // Get form data
    $full_name = $_POST["full-name"];
    $phone_number = $_POST["phone-number"];
    $title = $_POST["title"];
    $about = $_POST["about"];
    $price = $_POST["price"];
    $img = $_POST["img"];

    // Prepare SQL statement
    $sql = "INSERT INTO $table_name (fullname, phonenumber, title, about, price, img) VALUES ('$full_name', '$phone_number', '$title', '$about', '$price', '$img')";

    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
} else {
    echo "Form not submitted";
}
?>

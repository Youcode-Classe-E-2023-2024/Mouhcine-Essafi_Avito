<?php
    include "connection.php";

/**
 * Check if the form is submitted
 */
if (isset($_POST['submit']) && (!empty($_POST['full-name']))) {
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
    /**
     * Get form data
     */
    $full_name = $_POST["full-name"];
    $phone_number = $_POST["phone-number"];
    $title = $_POST["title"];
    $about = $_POST["about"];
    $price = $_POST["price"];
    $img_name = $_FILES["img"]["name"];
    $img_tmp = $_FILES["img"]["tmp_name"];

    
    /**
     * uploaded image to the specified directory
     */
    move_uploaded_file($img_tmp, "images/" . $img_name);
    /**
     * SQL for insert data
     */
    $sql = "INSERT INTO $table_name (fullname, phonenumber, title, about, price, img) VALUES ('$full_name', '$phone_number', '$title', '$about', '$price', '$img_name')";

    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    /**
     * Close connection
     */
    $conn->close();
} else {
    header("Location: add.php");
    exit;
}
/**
 * switch to home page after insert data
 */
header("Location: avito.php");

?>

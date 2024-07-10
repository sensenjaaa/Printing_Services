<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "127.0.0.1";
    $username = "usera";
    $password = "123098";
    $dbname = "printing_shops";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve form data
    $shop_name = $_POST['shop_name'];
    $services = isset($_POST['services']) ? implode(", ", $_POST['services']) : "";
    $other_services = $_POST['other_services'];
    $prices = $_POST['prices'];
    $address = $_POST['address'];
    $contact_info = $_POST['contact_info'];
    $email_address = $_POST['email_address'];
    $fb_page = $_POST['fb_page'];

    // Handle the uploaded file (front logo)
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["front_logo"]["name"]);

    // Check if file was uploaded without errors
    if (move_uploaded_file($_FILES["front_logo"]["tmp_name"], $target_file)) {
        // Insert data into the database
        $sql = "INSERT INTO shops (shop_name, services, other_services, prices, address, contact_info, email_address, fb_page, front_logo)
        VALUES ('$shop_name', '$services', '$other_services', '$prices', '$address', '$contact_info', '$email_address', '$fb_page', '$target_file')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    $conn->close();
} else {
    // If someone tries to access this page directly without submitting the form
    echo "Error: Form submission method not valid.";
}
?>

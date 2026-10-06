<?php
include '../database/db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    $stmt = $conn->prepare("SELECT email FROM userdata WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "<p style='color:green;'>✔ Email exists.</p>";
    } else {
        echo "<p style='color:red;'>✖ Email not found.</p>";
    }

    $stmt->close();
    $conn->close();
}
?>

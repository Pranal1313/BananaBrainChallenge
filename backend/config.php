
<?php
$host = "localhost";
$user = "root";  // your MySQL username
$pass = "";      // your MySQL password (keep empty if using XAMPP)
$db = "user_system";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

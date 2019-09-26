<?php
session_start(); // Starting Session
$error = ''; // Variable To Store Error Message
if (isset($_POST['login'])) {
if (empty($_POST['uname']) || empty($_POST['psw'])) {
$error = "Username or Password is invalid";
}
else{
// Define $username and $password
$username = $_POST['uname'];
$password = $_POST['psw'];
// mysqli_connect() function opens a new connection to the MySQL server.
$conn = mysqli_connect("localhost", "root", "", "licenta");
// SQL query to fetch information of registerd users and finds user match.
$query = "SELECT user_name, password from users where user_name=? AND password=? LIMIT 1";
// To protect MySQL injection for Security purpose
$stmt = $conn->prepare($query);
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$stmt->bind_result($username, $password);
$stmt->store_result();
if($stmt->fetch()) //fetching the contents of the row {
$_SESSION['login_user'] = $username; // Initializing Session
$_SESSION['login_pass'] = $password;
header("location: applications.php"); // Redirecting To Profile Page
}
mysqli_close($conn); // Closing Connection
}
?>
<?php

?>
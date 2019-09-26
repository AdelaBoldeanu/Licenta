<?php
// mysqli_connect() function opens a new connection to the MySQL server.
$conn = mysqli_connect("localhost", "root", "", "licenta");
session_start();// Starting Session
// Storing Session
$user_check = $_SESSION['login_user'];
$pass_check = $_SESSION['login_pass'];
// SQL Query To Fetch Complete Information Of User
$query = "SELECT user_name from users where user_name = '$user_check'";
$ses_sql = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($ses_sql);
$login_session = $row['user_name'];
$query2 = "SELECT position from users where user_name='".$user_check."' LIMIT 1";
$resultSelect =  mysqli_query($conn, $query2) or die ("Error in query: $query2. ".mysqli_error($conn)); 


?>
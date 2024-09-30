<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "rock_paper_scissors";

  $user_username = $_POST['username'];
  $user_password = $_POST['password'];

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $user_password = password_hash($user_password, PASSWORD_DEFAULT);

  $sql = "INSERT INTO users (username, password) VALUES ('$user_username', '$user_password')";

  if ($conn->query($sql) === TRUE) {
    echo "User created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}
?>

<title>f698ead8 - Rock Paper Scissors</title>

<form action="" method="post">
  <label>Username:</label>
  <input type="text" name="username"><br>
  <label>Password:</label>
  <input type="password" name="password"><br>
  <input type="submit" value="Register">
</form>

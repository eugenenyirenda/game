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

  $sql = "SELECT * FROM users WHERE username = '$user_username'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($user_password, $row['password'])) {
      $_SESSION['username'] = $user_username;
      header('Location: game.php');
    } else {
      echo "Invalid password";
    }
  } else {
    echo "Invalid username";
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
  <input type="submit" value="Login">
</form>

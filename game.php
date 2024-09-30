<?php
session_start();

if (!isset($_SESSION['username'])) {
  header('Location: login.php');
  exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rock_paper_scissors";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$user_username = $_SESSION['username'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $user_move = $_POST['move'];
  $computer_move = getComputerMove();
  $result = determineWinner($user_move, $computer_move);

  // Get user ID before inserting into game_history
  $user_id_sql = "SELECT id FROM users WHERE username = '$user_username'";
  $user_id_result = $conn->query($user_id_sql);
  $user_id_row = $user_id_result->fetch_assoc();
  $user_id = $user_id_row['id'];

  // Use prepared statement
  $sql = "INSERT INTO game_history (user_id, user_move, computer_move, result) VALUES (?, ?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("isss", $user_id, $user_move, $computer_move, $result);

  if ($stmt->execute()) {
    echo "Game history updated successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $stmt->close();
}

function getComputerMove() {
  $moves = array('rock', 'paper', 'scissors');
  return $moves[array_rand($moves)];
}

function determineWinner($user_move, $computer_move) {
  if ($user_move === $computer_move) {
    return "It's a tie!";
  } elseif (
    ($user_move === 'rock' && $computer_move === 'scissors') ||
    ($user_move === 'paper' && $computer_move === 'rock') ||
    ($user_move === 'scissors' && $computer_move === 'paper')
  ) {
    return 'You win!';
  } else {
    return 'Computer wins!';
  }
}

$conn->close();
?>

<title>f698ead8 - Rock Paper Scissors</title>

<h1>Rock Paper Scissors Game</h1>

<form action="" method="post">
  <input type="radio" id="rock" name="move" value="rock">
  <label for="rock">Rock</label><br>
  <input type="radio" id="paper" name="move" value="paper">
  <label for="paper">Paper</label><br>
  <input type="radio" id="scissors" name="move" value="scissors">
  <label for="scissors">Scissors</label><br>
  <input type="submit" value="Play">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  echo "<h2>Result:</h2>";
  echo "<p>You chose: $user_move</p>";
  echo "<p>Computer chose: $computer_move</p>";
  echo "<p>$result</p>";
}
?>

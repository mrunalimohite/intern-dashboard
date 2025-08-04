<?php 
// Show PHP errors
error_reporting(E_ALL);
ini_set('display_errors', 1);
ob_start();
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);

    // Load existing data.json
    $file = "data.json";
    if (!file_exists($file)) {
        die("data.json file not found.");
    }
    $data = json_decode(file_get_contents($file), true);

    // Update user name
    $data['user']['name'] = $username;

    // Update leaderboard rank 3
    foreach ($data['leaderboard'] as &$player) {
        if ($player['rank'] == 3) {
            $player['name'] = $username;
            break;
        }
    }

    // Save changes
    file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));

    // Store in session
    $_SESSION['username'] = $username;

    // Redirect to dashboard
    header("Location: dashboard.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="login-page">
    <div class="container">
        <h1 id="title">Login</h1>
        <form method="post" id="form">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" placeholder="Enter Username.." required>
            </div>
            <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" placeholder="Enter Password.." required>
            </div>
            <button type="submit" id="loginBtn">Login</button>
        </form>
    </div>
</body>
</html>
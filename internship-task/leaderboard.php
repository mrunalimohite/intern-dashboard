<?php
// Load data from JSON
$data = json_decode(file_get_contents("data.json"), true);

$leaderboard = $data['leaderboard'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboard Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="leaderboard-body">
    <div class="leaderboard-container">
        <h1>Leaderboard</h1>
        <table>
            <tr>
                <th>Rank</th>
                <th>Name</th>
                <th>Donations</th>
            </tr>
            <?php foreach($leaderboard as $row): ?>
            <tr>
                <td><?php echo $row['rank']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['donations']; ?></td>
            </tr>
            <?php endforeach ; ?>
        </table>
        <div class="back-btn-container">
            <a href="dashboard.php" class="back-btn">Back to Dashboard</a>
        </div>
    </div>
</body>
</html>
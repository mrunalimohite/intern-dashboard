<?php
session_start();
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

// Load data from JSON
$data = json_decode(file_get_contents("data.json"), true);

$user = $data['user'];
$recentActivity = $data['recentActivity'];
?>
<!DOCTYPE html>
<html>
<head>
  <title>Intern Dashboard</title>
  <link rel="stylesheet" href="style.css">
</head>
<body class="dashboard-body">
  <div class="container-box">
    <!--header section -->
    <div class="header">
      <h1>Intern Dashboard</h1>
      <p>Welcome, <strong><?php echo htmlspecialchars($user['name']); ?></strong></p>
      <a href="leaderboard.php">View Leaderboard</a>
    </div>
    <!-- Cards section -->
    <div class="cards">
      <div class="card">
        <h3>Referral Code</h3>
        <p><strong><?php echo htmlspecialchars($user['referralCode']); ?></strong></p>
      </div>
      <div class="card">
        <h3>Total Donations</h3>
        <p><strong><?php echo $user['donations']; ?></strong></p>
      </div>
    </div>

    <!--Rewards section-->
    <div class="rewards">
      <h3>Rewords / Unlockables</h3>
      <ul>
        <li>Bronz Donor: 500 <img src="icons/currency_rupee.png" alt="rupee"></li>
        <li>Silver Donor: 1000 <img src="icons/currency_rupee.png" alt="rupee"></li>
        <li>Gold Donor: 2000 <img src="icons/currency_rupee.png" alt="rupee"></li>
      </ul>
    </div>
    <!-- Recent Activity -->
    <div class="activity">
      <h3>Recent Activity</h3>
      <ul>
        <?php foreach($recentActivity as $activity): ?>
        <li><?php echo $activity; ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  
  </div>
  <footer>
    <div class="footer-content">
      <p>&copy; <span>2025</span></p>
      <p>Designed by Mrunali Mohite</p>
      <a href="index.php"><img src="icons/logout.png" alt="logout"></a>
    </div>
  </footer>
</body>
</html>

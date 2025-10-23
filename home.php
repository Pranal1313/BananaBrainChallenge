<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home - Banana Brain Challenge</title>
    <style>
        /* ======= BASIC STYLES ======= */
        body {
            font-family: 'Poppins', Arial, sans-serif;
            background: black;
            margin: 0;
            padding: 0;
        }

        /* ======= NAVBAR ======= */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #0077cc;
            padding: 15px 40px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .navbar h1 {
            color: white;
            margin: 0;
            font-size: 1.5rem;
        }

        .nav-links {
            display: flex;
            gap: 20px;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .nav-links a:hover {
            color: #ffeb3b;
        }

        /* ======= MAIN CONTENT ======= */
        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: calc(100vh - 80px);
            text-align: center;
        }

        .welcome-box {
            background: white;
            padding: 40px 60px;
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            max-width: 400px;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        .username {
            color: #0077cc;
            font-weight: bold;
        }

        .btn {
            display: inline-block;
            text-decoration: none;
            color: white;
            background-color: #4CAF50;
            padding: 12px 24px;
            border-radius: 25px;
            font-weight: bold;
            transition: background 0.3s ease;
            margin-top: 20px;
        }

        .btn:hover {
            background-color: #43a047;
        }

        .footer {
            text-align: center;
            font-size: 14px;
            color: #777;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <!-- ======= NAVBAR ======= -->
    <div class="navbar">
        <h1>🍌 Banana Brain Challenge</h1>
        <div class="nav-links">
            <a href="home.php">Home</a>
            <a href="game.php">Game</a>
            <a href="leaderboard.php">Leaderboard</a>
            <a href="auth.php?logout=true">Logout</a>
        </div>
    </div>

    <!-- ======= MAIN CONTENT ======= -->
    <div class="container">
        <div class="welcome-box">
            <h2>Welcome, <span class="username"><?php echo htmlspecialchars($_SESSION['username']); ?></span> 🎉</h2>
            <p>Get ready to test your logic skills and climb the leaderboard!</p>
            <a href="game.php" class="btn">Start Game</a>
        </div>
    </div>

    <div class="footer">
        © <?php echo date("Y"); ?> Banana Brain Challenge | All Rights Reserved
    </div>
</body>
</html>

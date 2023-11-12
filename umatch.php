<?php
$host = "localhost";
$user = "root";
$password = '';
$db_name = "sports";

$conn = mysqli_connect($host, $user, $password, $db_name);

if(mysqli_connect_errno()) {
    die("Failed to connect with MySQL: ". mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form submission, process the data and update the database
    $match_id = $_POST['match_id'];
    $hometeam_id = $_POST['hometeam_id'];
    $awayteam_id = $_POST['awayteam_id'];
    $date = $_POST['date'];
    $ground = $_POST['ground'];

    // Perform the SQL query to update data in the 'matches' table
    $sql = "UPDATE matches SET hometeam_id = '$hometeam_id', awayteam_id = '$awayteam_id', date = '$date', ground = '$ground' WHERE match_id = '$match_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Match updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Match</title>
    <link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
    <div class="taskbar">
        <ul>
            <li><a href="home.html">Home</a></li>
            <li><a href="test1.php">Team</a></li>
            <li><a href="coach.php">Coach</a></li>
            <li><a href="matches.php">Matches</a></li>
            <li><a href="players.php">Players</a></li>
            <li style="float: right;"><a href="logout.php">Logout</a></li>
        </ul>
    </div>

    <div class="content">
        <h2>Update Match</h2>
        <form method="post" action="">
            <label for="match_id">Match ID:</label>
            <input type="text" id="match_id" name="match_id" required>

            <label for="hometeam_id">Home Team ID:</label>
            <input type="text" id="hometeam_id" name="hometeam_id" required>

            <label for="awayteam_id">Away Team ID:</label>
            <input type="text" id="awayteam_id" name="awayteam_id" required>

            <label for="date">Date:</label>
            <input type="text" id="date" name="date" required>

            <label for="ground">Ground:</label>
            <input type="text" id="ground" name="ground" required>

            <input type="submit" value="Update Match">
        </form>
    </div>
</body>
</html>

<?php
$conn->close();
?>

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
    $won_teamname = $_POST['won_teamname'];
    $lost_teamname = $_POST['lost_teamname'];
    $won_teamscore = $_POST['won_teamscore'];
    $lost_teamscore = $_POST['lost_teamscore'];
    $ground = $_POST['ground'];
    $date = $_POST['date'];

    // Perform the SQL query to update data in the 'score' table
    $sql = "UPDATE score SET won_teamname = '$won_teamname', won_teamscore = '$won_teamscore', lost_teamname = '$lost_teamname', lost_teamscore = '$lost_teamscore', ground = '$ground', date = '$date' WHERE match_id = '$match_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Score updated successfully";
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
    <title>Update Score</title>
    <link rel="stylesheet" type="text/css" href="style1.css">
    <style>
        /* Add your custom styles here */
        /* For example: */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        .taskbar {
            background-color: #004080;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .taskbar ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .taskbar li {
            float: left;
        }

        .taskbar li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
            transition: background-color 0.3s, color 0.3s;
        }

        .taskbar li a:hover {
            background-color: #005599;
            color: #fff;
        }

        .taskbar li.logout {
            margin-left: auto;
        }

        .content {
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-top: 20px;
        }

        h2 {
            color: #004080;
            margin-bottom: 20px;
        }

        form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            justify-content: center;
            align-items: center;
            text-align: left;
        }

        label {
            font-size: 16px;
            margin-bottom: 5px;
            color: #333;
        }

        input {
            padding: 10px;
            width: 100%;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .button {
            background-color: #004080;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
            margin-top: 20px;
            padding: 12px;
            border: none;
            border-radius: 5px;
            font-size: 18px;
        }

        .button:hover {
            background-color: #005599;
        }
    </style>
</head>
<body>
    <div class="taskbar">
        <ul>
            <li><a href="home.html">Home</a></li>
            <li><a href="test1.php">Team</a></li>
            <li><a href="coach.php">Coach</a></li>
            <li><a href="matches.php">Matches</a></li>
            <li><a href="players.php">Players</a></li>
            <li><a href="score.php">Scores</a></li>
            <li style="float: right;"><a href="logout.php">Logout</a></li>
        </ul>
    </div>

    <div class="content">
        <h2>Update Score</h2>
        <form method="post" action="">
            <label for="match_id">Match ID:</label>
            <input type="text" id="match_id" name="match_id" required>

            <label for="won_teamname">Won Team Name:</label>
            <input type="text" id="won_teamname" name="won_teamname" required>

            <label for="won_teamscore">Won Team Score:</label>
            <input type="text" id="won_teamscore" name="won_teamscore" required>

            <label for="lost_teamname">Lost Team Name:</label>
            <input type="text" id="lost_teamname" name="lost_teamname" required>

            <label for="lost_teamscore">Lost Team Score:</label>
            <input type="text" id="lost_teamscore" name="lost_teamscore" required>

            <label for="ground">Ground:</label>
            <input type="text" id="ground" name="ground" required>

            <label for="date">Date:</label>
            <input type="text" id="date" name="date" required>

            <input type="submit" value="Update Score" class="button">
        </form>
    </div>
</body>
</html>



<?php
$conn->close();
?>

<?php require_once("auth.php"); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Timeline</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">

            <div class="card">
                <div class="card-body text-center">

                    <img class="img img-responsive rounded-circle mb-3" width="160" src="img/<?php echo $_SESSION['user']['photo'] ?>" />
                    
                    <h3><?php echo  $_SESSION["user"]["name"] ?></h3>

                    <p><?php echo $_SESSION["user"]["email"] ?></p>

                    <p><a href="logout.php">Logout</a></p>
                </div>
            </div>

            
        </div>

        <div class="col-md-8">
            <h2> Add a Note! </h2>
        <form class="form-group" action="process_note.php" method="post">
    <label for="title">Title:</label><br>
    <input type="text" id="title" name="title" required><br><br>

    
    <input type="text" name="userid" placeholder='UserId mentioned below...' >
    <br>
    your user id is : <?php echo $_SESSION["user"]["id"] ?>
    <br>
    
    <br>
    <label for="description">Description:</label><br>
    <textarea id="description" name="description" class="form-control" rows="4" required></textarea>
    <br>
    <input type="submit" value="Save Note">
      </form>
      <br>
      
      <h1>Your Notes</h1>
      <br>
      <?php
           
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "pesbuk";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $user_id = $_SESSION["user"]["id"];

            $sql = "SELECT * FROM user_notes WHERE user_id = $user_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="card mb-3">
                            <div class="card-body">
                                <h3>Title: ' . $row["title"] . '</h3>
                                <p>Description: ' . $row["description"] . '</p>
                            </div>
                          </div>';
                }
            } else {
                echo "<p>No notes found.</p>";
            }

            $conn->close();
            ?>
            

    
            
        </div>
    
    </div>
</div>

</body>
</html>
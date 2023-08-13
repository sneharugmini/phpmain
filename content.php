<!DOCTYPE html>
<html>
<head>
    <title>Website Content</title>
</head>
<body>
    <?php
    // Connect to the database
    $connection = mysqli_connect("localhost", "root", "#u.b?RmR8qs6?B7", "mainproj");

    // Check connection
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Fetch website content from the database
    $query = "SELECT content_id, title, content FROM WebsiteContent";
    $result = mysqli_query($connection, $query);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<h2>" . $row['title'] . "</h2>";
            echo "<p>" . $row['content'] . "</p>";
            echo "<hr>";
        }
        // Free the result set
        mysqli_free_result($result);
    } else {
        echo "Error: " . mysqli_error($connection);
    }

    // Close the database connection
    mysqli_close($connection);
    ?>
</body>
</html>

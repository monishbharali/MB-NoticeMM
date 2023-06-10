<!DOCTYPE html>
<html>
<head>
  <title>Notice Board</title>
</head>
<body>
  <h1>Notice Board</h1>
  
  <!-- Display the existing notices -->
  <h2>Available Notices:</h2>
  <?php
    // Connect to the database
    $conn = mysqli_connect("localhost", "username", "password", "database_name");

    // Check if the connection was successful
    if ($conn) {
      // Check if a notice has been created
      if (isset($_POST['title']) && isset($_POST['description'])) {
        // Retrieve the notice data from the form submission
        $title = $_POST['title'];
        $description = $_POST['description'];

        // Insert the new notice into the database
        $query = "INSERT INTO notices (title, description) VALUES ('$title', '$description')";
        mysqli_query($conn, $query);
      }

      // Query to retrieve notices from the database
      $query = "SELECT * FROM notices";
      $result = mysqli_query($conn, $query);

      // Loop through the query result and display each notice
      while ($row = mysqli_fetch_assoc($result)) {
        $title = $row['title'];
        $description = $row['description'];
        
        echo "<h3>$title</h3>";
        echo "<p>$description</p>";
      }

      // Close the database connection
      mysqli_close($conn);
    }
  ?>

  <!-- Create a new notice form -->
  <h2>Create Notice:</h2>
  <form method="POST" action="create_notice.php">
    <label for="title">Notice Title:</label>
    <input type="text" id="title" name="title" required><br><br>

    <label for="description">Notice Description:</label>
    <textarea id="description" name="description" required></textarea><br><br>

    <input type="submit" value="Create">
  </form>
</body>
</html>








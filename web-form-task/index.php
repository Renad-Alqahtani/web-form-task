<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Form with Toggle</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>


  <form method="POST" action="">
    <input type="text" name="name" placeholder="Name" required>
    <input type="number" name="age" placeholder="Age" required>
    <button type="submit">Submit</button>
  </form>

  
  <?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $conn->query("INSERT INTO users (name, age) VALUES ('$name', $age)");
  }

  
  $result = $conn->query("SELECT * FROM users");
  echo "<table>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Status</th>
            <th>Action</th>
          </tr>";
  while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['name']}</td>
            <td>{$row['age']}</td>
            <td id='status-{$row['id']}'>{$row['status']}</td>
            <td><button onclick='toggleStatus({$row['id']})'>Toggle</button></td>
          </tr>";
  }
  echo "</table>";
  ?>

  <script src="script.js"></script>
</body>
</html>
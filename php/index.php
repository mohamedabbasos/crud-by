<?php 
      
  require 'conn.php';

  $sql = "SELECT * FROM items";

  $result = $conn-> query($sql);

?>

<html>
  <head>
    <title>Items</title>
  </head>
  <body>
    <a href="create.php">Create new item</a>
    <br><br>
    <table border="2">
      <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Edit</td>
        <td>Delete</td>
      </tr>
         <?php
            while($row = $result -> fetch_assoc()) {
              echo "<tr>";
              echo "<td>" . $row['id'] . "</td>";
              echo "<td> <a href='profile.php?id="
                     . $row['id']
                     ."'>".$row['name']."</a></td>";
              echo "<td> <a href='edit.php?id="
                     . $row['id']
                     ."'>Edit</a></td>";
              echo "<td> <a href='delete.php?id="
                     . $row['id']
                     ."'>Delete</a></td>";
              echo "</tr>";
            }
         ?>
    </table>
  </body>
</html> 